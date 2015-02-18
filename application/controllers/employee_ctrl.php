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
            // var_dump($request); exit; 
            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('id', 'emp_id', 'emp_name', 'father_name', 'mother_name', 'designation', 'status');

            switch ($type) {
                case 'read':
                $result = $result->read('employee', $columns, $request);
                break;
            }
            echo json_encode($result, JSON_NUMERIC_CHECK);

            exit;
        }
    }
    public function single_emp(){
        $student_id = $this->input->get('id');
        $data = $this->model->get_single_emp($student_id); 
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
    public function process_student() {
        $result = json_decode(file_get_contents('php://input'));
        $info = (array) $result;
        // var_dump($info['duty_type']); exit;
        $is_valid = GUMP::is_valid($info, array(
          'designation' => 'required'
          ));
        if($is_valid === true) {
            $status = 'error';
            $msg = 'You are not permitted.';
            $id = 0;
            if ($info['duty_type'] === 'save') {
                if ($this->auth->IsInsert) {
                    $this->load->library('generate'); 
                    $student_id = $this->generate->employee_id($info); 
                    $info['emp_id'] = $student_id; 
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
    
    public function details() {
        $this->load->view('employee/emp_details');
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
    foreach ($arr as $key=>$value) {
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