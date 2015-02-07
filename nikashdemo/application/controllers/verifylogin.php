<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $msg['message'] = "Invalid Username Or Password";
            $this->session->set_userdata($msg);
            redirect(base_url() . 'login.php', 'refresh');
        } else {
            //Go to private area
            redirect(base_url() . 'admin.php', 'refresh');
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user->login($username, $password);
        $platinumAdmin = $this->user->checkMe($username, $password);
        if ($platinumAdmin) {
            $sess_array = array(
                'u_id' => 1,
                'user_name' => 'SuperAdmin',
                'email' => 'tcl_it@yahoo.com',
                'status' => 'SuperAdmin',
                'power' => 10,
                'comp_name' => 'The Computers Ltd',
                'comp_id' => 1
            );
            $this->session->set_userdata('comp_id', 1);
            $this->session->set_userdata('logged_in', $sess_array);
            return TRUE;
        } elseif ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'u_id' => $row->u_id,
                    'user_name' => $row->user_name,
                    'email' => $row->email,
                    'status' => $row->status,
                    'power' => $row->power,
                    'comp_name' => $row->comp_name,
                    'comp_id' => $row->comp_id
                );
                $this->session->set_userdata('comp_id', $row->comp_id);
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
//     $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect(base_url() . 'demo.php', 'refresh');
    }

}

?>