<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index($u = '') {
        $data['targetPage'] = '';
        if ($this->session->userdata('logged_in')) {
//            if($u){
//                
//            }else{
            redirect(base_url() . 'admin.php', 'refresh');
//            }
        }
        $this->load->view('login', $data);
    }

    public function requestForm() {
        
//        echo hash('adler32', '1');
        $this->load->view('request');
    }

    public function requestFormSend() {
        $input = array(
            'name' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'contact_no' => $this->input->post('contact'),
            'comp_name' => $this->input->post('comp_name'),
            'address' => $this->input->post('address'),
            'country' => $this->input->post('country'),
            'status' => 0,
        );
        $this->db->set('create_date','NOW()', FALSE);
        if ($this->db->insert('tbl_request', $input)) {
            $msg['msg'] = '<h5 class="glyphicon-ok alert-success">Request Sent OK.</h5>';
        } else {
            $msg['msg'] = '<h5 class="alert-warning">Sorry, Not Requested...</h5>';
        }

		$message = ''
                . '<table border="1" rules="rows" width="50%" cellpadding="10">'
                . '<tr><td>Name: </td><td>'.$input['name'].'</td></tr>'
                . '<tr><td>Email: </td><td>'.$input['email'].'</td></tr>'
                . '<tr><td>Contact No: </td><td>'.$input['contact_no'].'</td></tr>'
                . '<tr><td>Company Name: </td><td>'.$input['comp_name'].'</td></tr>'
                . '<tr><td>Company 	Address: </td><td>'.$input['address'].'</td></tr>'
                . '<tr><td>Country: </td><td>'.$input['country'].'</td></tr>'
                . '</table>';
        $this->load->library('email');
		$this->email->set_mailtype("html");

        $this->email->from('nikashinfo@tcl-bd.com', 'NIKASH');
        // $this->email->to('anowar.cst@gmail.com');
        $this->email->to('anowar.cst@gmail.com');
        $this->email->cc('atiquerabbani@yahoo.com');
        $this->email->cc('cst.anowar@gmail.com');
//        $this->email->bcc('them@their-example.com');

        $this->email->subject('New Reg: RQST: for NIKASH Cloud ('.date('d-m-Y').')');
        $this->email->message($message);

        $this->email->send();

        $this->session->set_userdata($msg);
        redirect(base_url() . 'login/requestForm.php');
    }

}
