<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Cash_Payment_ctrl extends base_ctrl {

    function __construct() {
        parent::__construct();
        $this->load->model('Cash_Payment_model', 'model');
    }

    public function index() {
//        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'Users')) {
//            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
//            $data['read'] = $this->auth->IsRead;
//            $this->load->view('Cash_Payment_view', $data);
//        } else {
//            $this->load->view('forbidden');
//        }
        $this->load->view('cash_payment_view');
    }

    public function payment() {
        $this->load->helper('form');
        $this->load->view('cash_payment_view');
    }

    public function cp_save() {
        $this->load->library('generate');
        $voucher_no = $this->generate->voucher_no();

        $result = json_decode(file_get_contents('php://input'));
        //server side validation 
        $data['branch_id'] = $result->branch;
        $data['acc_from'] = '1000';
        $data['acc_to'] = $result->acc_ledger;
        $data['employee_id'] = $result->employee;
        $data['description'] = $result->description;
        $data['total'] = $result->totalamount;
        $data['cr_amount'] = $result->paidamount;
        $data['voucher_name'] = 'Cash Payment';
        $data['voucher_no'] = $voucher_no;
        $data['payment_type'] = $result->paytype;
        $data['create_date'] = date("Y:m:d H:m:i");
        $data['user_ip'] = $this->input->ip_address();
        $this->db->insert('transaction', $data);

        if ($this->db->affected_rows() !== -1) {
            $request['status'] = true;
        } else {
            $request['status'] = false;
        }

        echo json_encode($request);
    }

    public function cr_save() {
        $this->load->library('generate');
        $voucher_no = $this->generate->voucher_no();

        $result = json_decode(file_get_contents('php://input'));
        var_dump($result);
        exit;
        //server side validation 
        $data['branch_id'] = $result->branch;
        $data['acc_from'] = '1000';
        $data['acc_to'] = $result->acc_ledger;
        $data['employee_id'] = $result->employee;
        $data['description'] = $result->description;
        $data['total'] = $result->totalamount;
        $data['cr_amount'] = $result->paidamount;
        $data['voucher_name'] = 'Cash Payment';
        $data['voucher_no'] = $voucher_no;
        $data['payment_type'] = $result->paytype;
        $this->db->insert('transaction', $data);

        if ($this->db->affected_rows() !== -1) {
            $request['status'] = true;
        } else {
            $request['status'] = false;
        }

        echo json_encode($request);
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