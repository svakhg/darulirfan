<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login', 'refresh');
        }
    }

    public function viewUsers() {
        $data['userList'] = $this->admin_model->selectUsers();
        $data['targetPage'] = $this->load->view('userList', $data, true);
        $this->load->view('index', $data);
    }

    public function createUser() {
        $data['targetPage'] = $this->load->view('create_user', '', true);
        $this->load->view('index', $data);
    }

    public function SaveUser() {
        if ($this->input->post('user_send')) {
            $data['user_name'] = $this->input->post('user_name');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $data['status'] = $this->input->post('status');
            $data['comp_id'] = $this->session->userdata('comp_id');
            if ($this->admin_model->insertData('tbl_users', $data)) {
                $this->Nibid($data['user_name'],$this->input->post('password'),$data['email'],$data['comp_id']);
                $msg['msg'] = '<font color="green">Successfully Inserted</font>';
            }
            $this->session->set_userdata($msg);
        }
        redirect(base_url() . 'users/createUser.php');
    }

}
