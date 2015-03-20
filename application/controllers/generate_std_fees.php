<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_std_fees extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('std_fee_generate_model', 'model');
    }

    public function index() {
        $this->load->view('generate_std_fees');
    }

    public function process() {
        $result = json_decode(file_get_contents('php://input'));
        $info = (array) $result;
        $is_valid = GUMP::is_valid($info, array(
          'std_type' => 'required',
          'fees' => 'required'
          ));
        if($is_valid === true) {

            $data['year'] = date('Y');
            $msg = "For " .  $data['year'] . " year"; 
            $fees = $this->model->get_fees($info);
            if ($fees->fee_type == 1) {
                $data['month'] = date('F');
                $msg = "For " .  $data['month'] . ', ' . $data['year'] . " Month"; 
            }

            $data['fee_category_id'] = $info['fees'];
            if ($this->check_is_already_generate($data)) {
            $students = $this->model->get_std_by_type($info);
            
            foreach ($students as $student) {
                $data['std_id'] = $student->std_id;
                    $data['fee_category_id'] = $info['fees']; //1 == monthly fees
                    // $data['concession_amount'] = $student->concession_amount;

                    if ($student->residential_status == 1) {
                        $data['payable_amount'] = $fees->residential;
                    } elseif ($student->residential_status == 2) {
                        $data['payable_amount'] = $fees->non_residential;
                    }
                    $data['amount'] = $data['payable_amount']; // - $data['concession_amount']
                    $this->db->insert('std_fee_report', $data);
                }
                $feedback= ['status' => 'success', 'msg' => "Fees generated Successfully. "  . $msg ] ;
            } else {
                $feedback= ['status' => 'error', 'msg' => "Fees already generated " . $msg] ;
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
        public function monthly() {
        //validate call request
//        $this->do_check_request(array('cli'));
            $data['month'] = date('F');
            $data['year'] = date('Y');
            if ($this->check_is_already_generate($data)) {
                $students = $this->model->get_active_std();
                $fees = $this->model->get_monthly_fees();

                foreach ($students as $student) {
                    $data['std_id'] = $student->std_id;
                    $data['fee_category_id'] = 1; //1 == monthly fees
                    $data['concession_amount'] = $student->concession_amount;

                    if ($student->residential_status == 1) {
                        $data['payable_amount'] = $fees->residential;
                    } elseif ($student->residential_status == 2) {
                        $data['payable_amount'] = $fees->non_residential;
                    }
                    $data['amount'] = $data['payable_amount'] - $data['concession_amount'];

                    $this->db->insert('std_fee_report', $data);
                }
                echo $data['month'] . " Month Fees generated Successfully. ";
            } else {
                echo $data['month'] . " Month Fees Already generated. ";
            }
        }
        protected function check_is_already_generate($data) {
            if ($this->model->check_is_already_generate($data)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

    }

    ?>