<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Fees_ctrl extends base_ctrl {

    function __construct() {
        parent::__construct();
        $this->load->model('Fees_model', 'model');
    }

    public function index() {
        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'Fees')) {
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $data['read'] = $this->auth->IsRead;
            $this->load->view('Fees_view', $data);
        } else {
            $this->load->view('forbidden');
        }
    }

    public function save() {
        $data = $this->post();
        $success = FALSE;
        $msg = 'You are not permitted.';
        $id = 0;
        if (!isset($data->id)) {
            if ($this->auth->IsInsert) {
                $id = $this->model->add($data);
                $msg = 'Data inserted successfully';
                $success = TRUE;
            }
        } else {
            if ($this->auth->IsUpdate) {
                $id = $this->model->update($data->id, $data);
                $success = TRUE;
                $msg = 'Data updated successfully';
            }
        }
        print json_encode(array('success' => $success, 'msg' => $msg, 'id' => $id));
    }

    public function delete() {
        if ($this->auth->IsDelete) {
            $data = $this->post();
            print json_encode(array("success" => TRUE, "msg" => $this->model->delete($data->id)));
        } else {
            print json_encode(array("success" => FALSE, "msg" => "You are not permitted"));
        }
    }

    public function get_acc_ledger_list() {
        print json_encode($this->model->get_acc_ledger_list());
    }

    public function get_class_list() {
        print json_encode($this->model->get_class_list());
    }

    public function get_status_list() {
        print json_encode($this->model->get_status_list());
    }

    public function get() {
        $data = $this->post();
        print json_encode($this->model->get($data->id));
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