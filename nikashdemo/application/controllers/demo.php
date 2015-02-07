<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Demo extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $data['targetPage'] = '';
        if ($this->session->userdata('logged_in')) {
            redirect(base_url() . 'admin.php', 'refresh');
        }
        $this->load->view('reg_demo_user', $data);
    }

    public function DemoUser() {
        $input['name'] = $this->input->post('username');
        $input['email'] = $this->input->post('email');
        $input['contact'] = $this->input->post('contact');
        $input['password'] = $this->input->post('password');
        $input['status'] = 0;
        $input['create_date'] = date('Y-m-d H:i:s');
        $this->load->model('admin_model');
        if ($this->admin_model->insertData('tbl_demousers', $input)) {
            $sess_array = array(
                'u_id' => 1,
                'user_name' => $input['name'],
                'email' => $input['email'],
                'status' => 'Admin',
                'power' => 0,
                'comp_name' => 'Demo Company Ltd',
                'comp_id' => 5
            );
            $this->session->set_userdata('comp_id', 5);
            $this->session->set_userdata('logged_in', $sess_array);
            redirect(base_url() . 'admin.php', 'refresh');
        } else {
            redirect($this->index(), 'refresh');
        }
    }

    public function DemoUserLogin() {
        if ($this->input->post('email')) {
            $useremail = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('user');
            $result = $this->user->DemoCheckLogin($useremail, $password);
            if ($result) {
                foreach ($result as $row) {
                    $sess_array = array(
                        'u_id' => $row->id,
                        'user_name' => $row->name,
                        'email' => $row->email,
                        'status' => $row->status,
                        'power' => 0,
                        'comp_name' => 'Demo Company Ltd.',
                        'comp_id' => 5
                    );
                    $this->session->set_userdata('comp_id', 5);
                    $this->session->set_userdata('logged_in', $sess_array);
                }
                redirect(base_url() . 'admin.php', 'refresh');
            } else {
                $msg['message'] = "Invalid Username Or Password";
                $this->session->set_userdata($msg);
                redirect($this->index(), 'refresh');
            }
        } else {
            redirect($this->index(), 'refresh');
        }
    }

    public function requestForm() {
        $this->load->view('request');
    }

    public function requestFormSend() {
//        echo '<pre>';
//        print_r($this->input->post());
//        echo '</pre>';
        $input = array(
            'name' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'contact_no' => $this->input->post('contact'),
            'comp_name' => $this->input->post('comp_name'),
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'status' => 0
        );
        if ($this->db->insert('tbl_request', $input)) {
            $msg['msg'] = '<h5 class="glyphicon-ok alert-success">Inserted Ok</h5>';
        } else {
            $msg['msg'] = '<h5 class="alert-warning">Sorry Data Not Inserted...</h5>';
        }

        $this->load->library('email');

        $this->email->from('nikashinfo@tcl-bd.com', 'NIKASH');
        $this->email->to('anowar.cst@gmail.com');
        $this->email->cc('cst.anowar@gmail.com');
//        $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        $this->session->set_userdata($msg);
        redirect(base_url() . 'demo/requestForm.php');
    }

}
