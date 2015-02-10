<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Account_report_ctrl extends base_ctrl {
  public function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');
    // $this->load->model('ledger_book_model');

  }
  public function index() {
    $this->load->view('account_report');
  }

}
