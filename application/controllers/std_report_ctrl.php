<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Std_report_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('utility_helper');
        $this->load->model('std_report_model', 'model');
    }

    public function index() {
        $data['results'] = $this->model->get_all();
        var_dump($data);
        //exit; 
        $this->load->view('std_fee_report_view', $data);
    }

    public function pay_fees() {
        $id = $this->uri->segment(3);
        $session = $this->session->userdata('user');

        if (!$this->model->get($id)) {
            $data['results'] = FALSE;
        } else {
            $data['results'] = $this->model->get($id);
        }

        foreach ($data['results'] as $row) {

            $info['acc_from'] = $row->fee_category_id;
            $info['acc_to'] = 8;
            $info['dr_amount'] = 0;
            $info['cr_amount'] = $row->amount;
            $info['total'] = $row->amount;
            $info['customer_id'] = $row->std_id;
            $info['user_id'] = $session->UserId;
            $info['description'] = $row->name . ', ' . $row->month;
            
            
            $this->db->insert('transaction', $info);
            
            $arr->is_active = 0; 
            $this->db->where('id', $row->id);
            $this->db->update('std_fee_report', $arr);
        }

        msg_display('Fees Payment Successfull', 'success');
    }

    public function single() {
        $id = $this->uri->segment(3);
        if (!$id) {
            $msg = '<script type="text/javascript"> toastr.'
                    . 'error'
                    . '("'
                    . 'Please Give a Student ID'
                    . '");'
                    . ' </script>';
            echo $msg;
        }
        if (!$this->model->get($id)) {
            $data['results'] = FALSE;
        } else {
            $data['results'] = $this->model->get($id);
        }
        if ($this->model->get_single_student($id)) {
            $data['student'] = $this->model->get_single_student($id);
        } else {
            $data['student'] = false;
        }
        if ($this->model->get_total_fees($id)) {
            $data['total'] = $this->model->get_total_fees($id);
        } else {
            $data['total'] = false;
        }
        $this->load->view('std_report_single_view', $data);
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