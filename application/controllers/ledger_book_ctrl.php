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
    
    // $data['cash_receipt'] = $type['cash_receipt'];
    // $data['bank_payment'] = $type['bank_payment'];
    // $data['bank_receipt'] = $type['bank_receipt'];
    // $data['journal_voucher'] = $type['journal_voucher'];
    $status = 'success';
    $message = 'operation successful';
    $data['voucher_type'] = $type['cash_payment'];
    $data['bank_type'] = $type['bank_payment'];
    $cash_payment = $this->ledger_book_model->show_data($data);
    $credits = '';
    $cash_payment_total = '';
    if (isset($cash_payment) && !empty($cash_payment)) {
      $cash_payment_total = $this->ledger_book_model->show_total($data); 
      foreach ($cash_payment as $key => $value) {
        if ($value->voucher_type == 3) {
          if ($value->credit !== NULL) {
          $credits[$key]['date'] = $value->date;
          $credits[$key]['cdescription'] = $value->description;
          $credits[$key]['cbank'] = $value->credit;
        }
      } else {
        $credits[$key]['date'] = $value->date;
          $credits[$key]['cdescription'] = $value->description;
          $credits[$key]['camount'] = $value->credit;
      }
      }
    } else {
      $status = 'error'; 
      $message = 'Error to read Cash Payment';
    }

    $data['voucher_type'] = $type['cash_receipt'];
    $cash_receipt = $this->ledger_book_model->show_data($data);
    // var_dump($cash_receipt); exit; 
    $debits = '';
    $cash_receipt_total = '';
    if (isset($cash_receipt) && !empty($cash_receipt)) {
      $cash_receipt_total = $this->ledger_book_model->show_total($data); 
      foreach ($cash_receipt as $key => $value) {
        if ($value->voucher_type == 3) {
          if ($value->debit !== NULL) {
            $debits[$key]['date'] = $value->date;
            $debits[$key]['ddescription'] = $value->description;
            $debits[$key]['dbank'] = $value->debit;
          }
        } else {
         $debits[$key]['date'] = $value->date;
         $debits[$key]['ddescription'] = $value->description;
         $debits[$key]['damount'] = $value->debit;
       }
     }
   } else {
    $status = 'error'; 
    $message = 'Error to read Cash Receipt, ' . $this->config->item('contact');
  }

  $data['voucher_type'] = $type['bank_payment'];
  $bank_payment = $this->ledger_book_model->show_data($data);



  $result = ['status' => $status, 
  'message' => $message,
  'debits' => $debits,
  'credits' => $credits,
  'debit_total' => $cash_receipt_total,
  'credit_total' => $cash_payment_total]; 
  echo json_encode($result);
}
}
