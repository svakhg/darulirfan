<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Employee_ctrl extends base_ctrl {

    function __construct() {
        parent::__construct();
        $this->load->helper('utility_helper');
        $this->load->model('employee_model', 'model');
    }

    function process() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));
            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('id', 'emp_id', 'emp_name', 'father_name', 'mother_name', 'designation', 'contact_no', 'status');

            switch ($type) {
                case 'read':
                    $result = $result->read('employee', $columns, $request);
                    break;
            }
            echo json_encode($result, JSON_NUMERIC_CHECK);

            exit;
        }
    }

    public function single_emp() {
        $emp_id = $this->input->get('id');
        $data = $this->model->get_single_emp($emp_id);
        echo json_encode($data);
    }

    public function edit() {
        $this->load->view('employee/edit');
    }

    public function add() {
        $this->load->view('employee/edit');
    }

    public function index() {
        $this->load->view('employee/list');
    }

    public function process_employee() {
        $result = json_decode(file_get_contents('php://input'));
        $info = (array) $result;
        $is_valid = GUMP::is_valid($info, array(
                    'designation' => 'required',
                    'salary_amount' => 'required',
                    'status' => 'required',
                    'gender' => 'required'
        ));
        if ($is_valid === true) {
            $status = 'error';
            $msg = 'You are not permitted.';
            $id = 0;
            if ($info['duty_type'] === 'save') {
                if ($this->auth->IsInsert) {
                    $this->load->library('generate');
                    $student_id = $this->generate->employee_id($info);
                    if (!empty($student_id)) {
                        $info['emp_id'] = $student_id;
                        $info['user_id'] = $this->session->userdata('user')->UserId;
                        $id = $this->model->add($info);
                        $msg = 'Data inserted successfully';
                        $status = 'success';
                    } else {
                        $status = 'error';
                        $msg = "Employee ID Generate Error";
                    }
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
    }

    public function salary_sheet() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));

            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('id', 'emp_id', 'emp_name', 'month', 'year', 'amount', 'remarks', 'status', 'created_by');

            switch ($type) {
                case 'create':
                    $result = $result->create('employee_salary_report', $columns, $request->models, 'id');
                    break;
                case 'read':
                    $result = $result->read('employee_salary_report', $columns, $request);
                    break;
                case 'update':
                    $result = $result->update('employee_salary_report', $columns, $request->models, 'id');
                    break;
                case 'destroy':
                    $result = $result->destroy('employee_salary_report', $request->models, 'id');
                    break;
            }

            echo json_encode($result, JSON_NUMERIC_CHECK);

            exit;
        }

        $this->load->view('employee/salary_sheet');
    }

    public function generate_salary_sheet() {
        
    }

    public function details() {
        $this->load->view('employee/details');
    }

    public function approved_salary_sheet() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'));
        $result = (array) $data;
        $is_valid = GUMP::is_valid($result, array(
                    'month' => 'required'
        ));
        if ($is_valid === true) {
            $arr['month'] = (int) date("m", strtotime($result['month']));
            $arr['year'] = (int) date("Y", strtotime($result['month']));
            $response = $this->model->approved_salary_sheet($arr);
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

    public function show_salary_sheet() {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'));
        $result = (array) $data;

        $is_valid = GUMP::is_valid($result, array(
                    'month' => 'required'
        ));
        if ($is_valid === true) {
            $arr['month'] = (int) date("m", strtotime($result['month']));
            $arr['year'] = (int) date("Y", strtotime($result['month']));
            $response = $this->model->show_salary_sheet($arr);
            // var_dump($response); exit;  
            if ($response != false) {
                $feedback = ['editable' => $response['editable'], 'status' => 'success', 'message' => "Data found Successfully"];
            } else {
                $request_month = date("m-Y", strtotime($result['month']));
                $current_month = date("m-Y");
                // var_dump($request_month);
                // var_dump($current_month);
                // exit;
                if ($request_month == $current_month) {
                    $this->load->library('generate');
                    $response = $this->generate->salary_sheet($arr);
                    $feedback = ['status' => $response['status'], 'message' => $response['message'], 'editable' => true];
                } else {
                    $feedback = ['status' => 'error', 'message' => "Data not Found. Unable to Generate Future or Past Salary Sheet"];
                }
                // var_dump($response); exit; 
                // $feedback = ['status' => 'error', 'message' => "No Data Found"]; 
            }
            echo json_encode($feedback);
        } else {
            $err = error_process($is_valid);
            foreach ($err as $value) {
                $row['message'] = $value;
            }
            $row['status'] = 'error';
            echo json_encode($row);
        }
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

        $arr = $this->model->get_fees($id);
        $subArr = [];
        foreach ($arr as $key => $value) {
            $subArr[$key]['name'] = $value->name;
            $subArr[$key]['amount'] = (int) $value->amount;
            $subArr[$key]['created'] = $value->created;
            $subArr[$key]['isSelected'] = (bool) false;
        }
        $data['fees'] = $subArr;
        $data['student'] = $info;
        $data['total'] = $this->model->get_total_fees($id);


        echo json_encode($data);
    }

}

?>