<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Global_data extends base_ctrl {
public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function all() {
    	$data['voucher_type'] = $this->db->get('voucher_type')->result();
    	// var_dump($data); 
    	echo json_encode($data);
    }

}
