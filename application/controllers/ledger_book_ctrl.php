<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class ledger_book_ctrl extends base_ctrl {
public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('ledger_book_model');

    }
    public function index() {
        $this->load->view('ledger_book');
    }

    public function show_ledger() {
      $type['cash_payment'] = $this->config->item('cash_payment'); 
      $type['cash_receipt'] = $this->config->item('cash_receipt'); 
      $type['bank_payment'] = $this->config->item('bank_payment');
      $type['bank_receipt'] = $this->config->item('bank_receipt'); 
      $type['journal_voucher'] = $this->config->item('journal_voucher');

      header('Content-Type: application/json');

      $request = json_decode(file_get_contents('php://input'));

      $data['startdate'] = $request->startdate; 
      $data['enddate'] = $request->enddate; 

      $data['cash_in_hand'] = $this->config->item('cash_in_hand');
      $data['cash_payment'] = $this->config->item('cash_payment');

      $info = $this->ledger_book_model->show_ledger($data);
      // var_dump($info); exit;
      foreach ($info as $key => $value) {
              $array[$key]['date'] = $value->date;
              $array[$key]['ddescription'] = $value->description;
              $array[$key]['damount'] = $value->credit;
          }
       
      $result = ['status' => 'success', 'data' => $array]; 
      echo json_encode($result);
    }
}
