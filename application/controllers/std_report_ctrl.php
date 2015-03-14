<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Std_report_ctrl extends base_ctrl {

    function __construct() {
        parent::__construct();
        $this->load->helper('utility_helper');
        $this->load->model('std_report_model', 'model');
    }

    function process() {
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
    public function single_student(){
        $student_id = $this->input->get('id');
        $data = $this->model->get_single_student($student_id); 
        echo json_encode($data);
    }
    public function edit() {
        // $id = $this->input->get('id');
        // $data = $this->model->get_single_student($id); 
        $this->load->view('student_edit'); 
        // echo "edit";
    }
    public function add() {
        $this->load->view('student_edit'); 
    }

    // public function details() {
    //     $this->load->view('student_details'); 
    // }

    public function index() {
        // $data['results'] = $this->model->get_all();
        $this->load->view('std_fee_report_view');
    }
    public function process_student() {
        $result = json_decode(file_get_contents('php://input'));
        $info = (array) $result;
        $is_valid = GUMP::is_valid($info, array(
          'gender' => 'required',
          'residential_status' => 'required',
          'class_id' => 'required'
          ));
        if($is_valid === true) {
            $status = 'error';
            $msg = 'You are not permitted.';
            $id = 0;
            if ($this->model->check_duplicate_roll($info)) {
                echo json_encode(array('status' => $status, 'message' => "Roll no duplicate, try with another roll no", 'id' => $id));
                exit; 
            }
            if ($info['duty_type'] === 'save') {
                if ($this->auth->IsInsert) {
                    $this->load->library('generate'); 
                    $student_id = $this->generate->student_id($info['gender']); 
                    $info['std_id'] = $student_id; 
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
    public function process_fees() {
        $result = json_decode(file_get_contents('php://input'));
        $info = (array) $result;
        $is_valid = GUMP::is_valid($info, array(
          'discount' => 'required',
          'items' => 'required',
          'student_id' => 'required'
          ));
        if($is_valid === true) {
            $sum = array();
            foreach($info['items'] as $key => $value)
                {
                    $sum[] = $value->amount;
                }
                $total = array_sum($sum);
            $data['total'] = $total;
            $data['student_id'] = $info['student_id'];
            $data['discount'] = $info['discount']; 
            $data['grand_total'] = $total - $info['discount']; 
            $data['fees'] = $info['items']; 
            var_dump($data); 

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

    public function details() {
        $this->load->view('student_details');
    }

    public function details_info() {
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
        foreach ($arr as $key=>$value) {
            $subArr[$key]['id'] = $value->id;  
            $subArr[$key]['name'] = $value->name;  
            $subArr[$key]['amount'] = (int) $value->amount;  
            $subArr[$key]['created'] = $value->created;  
            $subArr[$key]['isSelected'] = (bool) false;  
        }
    $data['fees'] = $subArr;
    }
    
    $data['student'] = $info; 
    $data['total'] = $this->model->get_total_fees($id);

    echo json_encode($data); 
}

public function data_report() {
    $this->load->library('Datatables');
    $this->datatables
    ->select('*')
    ->from('std_fee_report');

    echo $this->datatables->generate();
}

public function save() {
    $data = $this->post();
    $success = FALSE;
    $msg = 'You are not permitted.';
    $id = 0;
    if (!isset($data->UserId)) {
        if ($this->auth->IsInsert) {
            $id = $this->model->add($data);
            $msg = 'Data inserted successfully';
            $success = TRUE;
        }
    } else {
        if ($this->auth->IsUpdate) {
            $id = $this->model->update($data->UserId, $data);
            $success = TRUE;
            $msg = 'Data updated successfully';
        }
    }
    print json_encode(array('success' => $success, 'msg' => $msg, 'id' => $id));
}

public function delete() {
    if ($this->auth->IsDelete) {
        $data = $this->post();
        print json_encode(array("success" => TRUE, "msg" => $this->model->delete($data->UserId)));
    } else {
        print json_encode(array("success" => FALSE, "msg" => "You are not permitted"));
    }
}

public function get_Roles_list() {
    print json_encode($this->model->get_Roles_list());
}

public function get_Navigations_list() {
    print json_encode($this->model->get_Navigations_list());
}

public function get() {
    $data = $this->post();
    print json_encode($this->model->get($data->UserId));
}

public function get_all() {
    print json_encode($this->model->get_all());
}

public function get_page() {
    $data = $this->post();
    print json_encode($this->model->get_page($data->size, $data->pageno));
}

public function get_page_where() {
    $data = $this->post();
    print json_encode($this->model->get_page_where($data->size, $data->pageno, $data));
}

}

?>