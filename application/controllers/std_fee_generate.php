<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Std_Fee_Generate extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('std_fee_generate_model', 'model');
    }

    public function index() {
        //validate call request
//        $this->do_check_request(array('cli'));

        $data['month'] = date('F');
        $data['year'] = date('Y');
        if ($this->check_is_already_generate($data)) {
            $students = $this->model->get_active_std();
//            $students = $this->model->get_active_std_class();

            echo "<pre>";
            print_r($students);
            exit;
            foreach ($students as $student) {
                $data['std_id'] = $student->std_id;
                $data['fee_category_id'] = $student->fees_id;
                $data['amount'] = $student->amount;
                $this->db->insert('std_fee_report', $data);
            }

            $students = $this->model->get_active_std_class();
            foreach ($students as $student) {
                $data['std_id'] = $student->id;
                $data['fee_category_id'] = 1;
                $data['amount'] = $student->amount;
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