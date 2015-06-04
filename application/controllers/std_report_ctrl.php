<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Std_report_ctrl extends base_ctrl
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('utility_helper');
        $this->load->model('std_report_model', 'model');
    }

    public function testReports()
    {

        $data['targetPage'] = $this->load->view('std_fee_report_view', '', true);

        $this->load->view('reports/print_view', $data);

    }

    function process()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));
            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('id', 'std_id', 'std_name', 'father_name', 'mother_name', 'class_id', 'roll_no', 'status');

            switch ($type) {
                case 'read':
                    $result = $result->read('student', $columns, $request);
                    break;
            }
            echo json_encode($result, JSON_NUMERIC_CHECK);

            exit;
        }
    }

    public function single_student()
    {
        $student_id = $this->input->get('id');
        $data = $this->model->get_single_student($student_id);
        echo json_encode($data);
    }

    public function edit()
    {
        $this->load->view('student_edit');
    }

    public function add()
    {
        $this->load->view('student_edit');
    }

    public function index()
    {

        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'student')) {
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $data['read'] = $this->auth->IsRead;
            $this->load->view('std_fee_report_view', $data);
        } else {
            $this->load->view('forbidden');
        }
    }

    public function process_student()
    {
        $result = json_decode(file_get_contents('php://input'));
        $info = (array)$result;
        $is_valid = GUMP::is_valid($info, array(

            'gender' => 'required',
            'residential_status' => 'required',
            'std_type' => 'required',

            'class_id' => 'required'
        ));
        if ($is_valid === true) {
            $status = 'error';
            $msg = 'You are not permitted.';
            $id = 0;
            // need to implement is duplicate check
            // var_dump($info); exit; 
            // if ($this->model->check_duplicate_roll($info)) {
            //     echo json_encode(array('status' => $status, 'message' => "Roll no duplicate, try with another roll no", 'id' => $id));
            //     exit; 
            // }
            if ($info['duty_type'] === 'save') {
                if ($this->auth->IsInsert) {
                    $this->load->library('generate');
                    if ($info['std_type'] === "previous") {
                        $student_id = $info['std_id'];
                    } else {
                        $student_id = $this->generate->student_id($info['gender']);
                    }
                    $info['std_id'] = $student_id;
                    $info['user_id'] = $this->session->userdata('user')->UserId;
                    $id = $this->model->add($info);
                    $msg = 'Data inserted successfully';
                    $status = 'success';
                }
            } elseif ($info['duty_type'] === 'update') {
                if ($this->auth->IsUpdate) {
                    $id = $this->model->update($info);
                    $status = 'success';
                    $msg = 'Data updated successfully';
                }
            }
            echo json_encode(array('status' => $status, 'message' => $msg, 'id' => $id));
        } else {
            $err = error_process($is_valid);
            foreach ($err as $value) {
                $row['message'] = $value;
            }
            $row['status'] = 'error';
            echo json_encode($row);
        }
    }

    public function process_fees()
    {
//        $want = 4;
//        $arr = [1,2,4,5,6,1,2,4,3,5,7,2,1];
//        sort($arr);
//        $result = array();
//        for ($j = 0; $j < count($arr); $j++)
//            for ($n = 0; $n < count($arr); $n++) {
//                $part = array_slice($arr, $j, $n + 1);
//// var_dump($part);echo '<br>';
//                $sum = array_sum($part);
//// echo $sum.'<br>';
//                if (in_array($want - $sum, $arr) && in_array($want - $sum, array_diff_assoc($arr, $part))) {
//                    array_push($part, ($want - $sum));
//                    sort($part);
//                    $result [] = implode(',', $part);
//                }
//            }
//        foreach (array_unique($result) as $value) {
//            echo $value . '<br>';
//        }
//
//        exit;
        $result = json_decode(file_get_contents('php://input'));
        $info = (array)$result;
        $is_valid = GUMP::is_valid($info, array(
            'items' => 'required',
            'student_id' => 'required'
        ));
        if ($is_valid === true) {
            $sum = array();
            foreach ($info['items'] as $key => $val) {
                $sum[] = $val->payable_amount - $val->concession_amount;
            }
            $total = array_sum($sum);
            $data['total'] = $total;
            $student_id = $info['student_id'];
            $fees = $info['items'];
            //it should be randomize inputform codeigniter
            $voucher_id = (int)date('dhms');

            foreach ($fees as $value) {
                $this->db->trans_start();
                $debit[$key]['student_id'] = $student_id;
                $debit[$key]['ledger_id'] = $this->config->item('cash_in_hand'); //1 = cash in hand
                $debit[$key]['description'] = (string)$student_id . '- ' . $value->name . ' (' . $value->id . ')';
                $debit[$key]['voucher_type'] = $this->config->item('cash_receipt');
                $debit[$key]['acc_group_id'] = (int)acc_group_id($student_id)->acc_group_id;
                $debit[$key]['voucher_id'] = $voucher_id;
                $debit[$key]['debit'] = $value->payable_amount - $value->concession_amount;
                $debit[$key]['date'] = date("Y-m-d");
                $debit[$key]['user_ip'] = $this->input->ip_address();
                $debit[$key]['created_by'] = $this->session->userdata('user')->UserId;

                $this->db->insert('transaction', $debit[$key]);

                $credit[$key]['student_id'] = $student_id;
                $credit[$key]['ledger_id'] = (string)$student_id;
                $credit[$key]['description'] = (string)$student_id . '- ' . $value->name . ' (' . $value->id . ')';
                $credit[$key]['voucher_type'] = (int)$this->config->item('cash_receipt');
                $credit[$key]['acc_group_id'] = (int)acc_group_id($student_id)->acc_group_id;
                $credit[$key]['voucher_id'] = $voucher_id;
                $credit[$key]['credit'] = $value->payable_amount - $value->concession_amount;
                $credit[$key]['date'] = date("Y-m-d");
                $credit[$key]['user_ip'] = $this->input->ip_address();
                $credit[$key]['created_by'] = $this->session->userdata('user')->UserId;

                $this->db->insert('transaction', $credit[$key]);
                $std_fee_report = [
                    'modified' => date("Y-m-d"),
                    'concession_amount' => $value->concession_amount,
                    'amount' => $value->payable_amount - $value->concession_amount,
                    'is_active' => 0
                ];
                $this->db->where(['id' => $value->id])->update('std_fee_report', $std_fee_report);
                $this->db->trans_complete();
            }

            if ($this->db->trans_status() === FALSE) {
                $response = ['status' => "error", 'message' => "Data Insert Error, Try again or Contact with Programmer"];
            } else {
                $this->db->db_debug = TRUE;
                $response = ['status' => "success", 'message' => "Student Fees Paid and saved Successfully"];
            }

            echo json_encode($response);
        } else {
            $err = error_process($is_valid);
            foreach ($err as $value) {
                $row['message'] = $value;
            }
            $row['status'] = 'error';
            echo json_encode($row);
        }
    }

    // exit; 
    //     $session = $this->session->userdata('user');
    //     if (!$this->model->get_fees($id)) {
    //         $data['results'] = FALSE;
    //     } else {
    //         $data['results'] = $this->model->get_fees($id);
    //     }
    //     foreach ($data['results'] as $row) {
    //         if (!check_is_voucher_duplicate($voucher_id)) {
    //             $debit['ledger_id'] = $cash_in_hand; //1 = cash in hand
    //             $debit['description'] = (string) $result['description'];
    //             $debit['voucher_type'] = (int) $result['voucher_type'];
    //             $debit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id;
    //             $debit['voucher_id'] = $voucher_id;
    //             $debit['debit'] = $result['amount'];
    //             $debit['date'] = date("Y-m-d");
    //             $debit['user_ip'] = $this->input->ip_address();
    //             $debit['created_by'] = $this->session->userdata('user')->UserId;
    //             $this->db->insert('transaction', $debit);
    //             $credit['ledger_id'] = (int) $result['ledger_id'];
    //             $credit['description'] = (string) $result['description'];
    //             $credit['voucher_type'] = (int) $result['voucher_type'];
    //             $credit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id;
    //             $credit['voucher_id'] = $voucher_id;
    //             $credit['credit'] = $result['amount'];
    //             $credit['date'] = date("Y-m-d");
    //             $credit['user_ip'] = $this->input->ip_address();
    //             $credit['created_by'] = $this->session->userdata('user')->UserId;
    //             $this->db->insert('transaction', $credit);
    //             $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully"];
    //         } else {
    //         }
    //         $info['acc_from'] = $row->fee_category_id;
    //         $info['acc_to'] = 8;
    //         $info['dr_amount'] = 0;
    //         $info['cr_amount'] = $row->amount;
    //         $info['total'] = $row->amount;
    //         $info['customer_id'] = $row->std_id;
    //         $info['user_id'] = $session->UserId;
    //         $info['description'] = $row->name . ', ' . $row->month;
    //         $this->db->insert('transaction', $info);
    //         $arr->is_active = 0;
    //         $this->db->where('id', $row->id);
    //         $this->db->update('std_fee_report', $arr);
    //     }
    //     msg_display('Fees Payment Successfull', 'success');

    public function details()
    {
        $this->load->view('student_details');
    }

    public function details_info()
    {
        $id = $this->input->get('id');
        if (!$id) {
            $msg = '
            <script type="text/javascript"> toastr.'
                . 'error'
                . '("'
                . 'Please Give a Student ID'
                . '");'
                . ' </script>
            ';
            echo $msg;
        }
        $info = $this->model->get_single_student($id);
        $info->gender = ($info->gender == 1) ? "Male" : "Female";

        $info->residential_status = ($info->residential_status == 1) ? "Yes" : "No";
        $info->status = ($info->status == 1) ? "Current Student" : "Previous/Old Student";
        $data['fees'] = null;
        $arr = $this->model->get_fees($id);
        if ($arr !== false) {
            $subArr = [];
            foreach ($arr as $key => $value) {
                $subArr[$key]['id'] = $value->id;
                $subArr[$key]['name'] = $value->fee_category . ', ' . $value->month . '- ' . $value->year;
                $subArr[$key]['payable_amount'] = (int)$value->payable_amount;
                $subArr[$key]['concession_amount'] = (int)$value->concession_amount;
                $subArr[$key]['amount'] = (int)$value->amount;
                $subArr[$key]['created'] = $value->created;
            }
            $data['fees'] = $subArr;
        }

        $data['student'] = $info;
        $data['total'] = $this->model->get_total_fees($id);

        echo json_encode($data);
    }

}
