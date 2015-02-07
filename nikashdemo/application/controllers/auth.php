<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $curUrl = base_url(uri_string());
        if($curUrl !=  base_url()){
            $url = '/index/'.base_url(uri_string());
        }
        else{
            $url = '.php';
        }
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login'.$url, 'refresh');
        }
    }
}