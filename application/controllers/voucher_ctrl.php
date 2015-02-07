<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Voucher_ctrl extends base_ctrl {
public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function save() {
      header('Content-Type: application/json');
      $data = json_decode(file_get_contents('php://input'));
      $result = (array) $data; 
      $is_valid = GUMP::is_valid($result, array(
          'voucher_type' => 'required',
          'ledger_id' => 'required',
          'amount' => 'required'
      ));
//      [{"id":"1","name":"Cash Payment"},
      // {"id":"2","name":"Cash Receipt"},
      // {"id":"3","name":"Bank Payment"},
      // {"id":"4","name":"Bank Receipt"},
      // {"id":"5","name":"Journal Voucher"}]
      if($is_valid === true) {
          if ($result['voucher_type'] === 1) {
            # Cash Payment
            
          } elseif ($result['voucher_type'] === 2) {
            # Cash Receipt
          } elseif ($result['voucher_type'] === 3) {
            # Bank Payment
          } elseif ($result['voucher_type'] === 4) {
            # Bank Receipt
          } elseif ($result['voucher_type'] === 5) {
            # Journal Voucher
          }
           
      } else {
          print_r($is_valid);
      }
    }
    public function index() {
//        var_dump($this->oisacl->check_hasRole('administrator')); exit; 
//        var_dump($this->oisacl->check_has('student')); exit; 
//        var_dump($this->oisacl->check_isAllowed(33, 'student')); exit; 
        $this->load->view('voucher');
    }
}
