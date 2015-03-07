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
    // $data['bank_type'] = $type['bank_payment'];
    $cash_payment = $this->ledger_book_model->show_data($data);
    // var_dump($cash_payment); exit; 
    $credits_cp = '';
    // $cash_payment_total = '';
    if (isset($cash_payment) && !empty($cash_payment)) {
      // $cash_payment_total = $this->ledger_book_model->show_total($data); 
      foreach ($cash_payment as $key => $value) {
        $credits_cp[$key]['date'] = $value->date;
          $credits_cp[$key]['cdescription'] = $value->description;
          $credits_cp[$key]['camount'] = $value->credit;
      }
    } else {
      $status = 'error'; 
      $message = 'Error to read Cash Payment';
    }

    $data['voucher_type'] = $type['bank_payment'];
    $bank_payment = $this->ledger_book_model->show_data($data);
    $credits_bp = '';
    // $bank_payment_total = '';
    if (isset($bank_payment) && !empty($bank_payment)) {
      // $bank_payment_total = $this->ledger_book_model->show_total($data); 
      foreach ($bank_payment as $key => $value) {
          $credits_bp[$key]['date'] = $value->date;
          $credits_bp[$key]['cdescription'] = $value->description;
          $credits_bp[$key]['cbank'] = $value->credit;

          $debits_bp[$key]['date'] = $value->date;
         $debits_bp[$key]['ddescription'] = $value->description;
         $debits_bp[$key]['damount'] = $value->credit;
      }
      
    } else {
      $status = 'error'; 
      $message = 'Error to read Cash Payment';
    }

    $data['voucher_type'] = $type['bank_receipt'];
    $bank_receipt = $this->ledger_book_model->show_data($data);
    $credits_br = '';
    // $bank_receipt_total = '';
    if (isset($bank_receipt) && !empty($bank_receipt)) {
      // $bank_receipt_total = $this->ledger_book_model->show_total($data); 
      foreach ($bank_receipt as $key => $value) {
          $credits_br[$key]['date'] = $value->date;
          $credits_br[$key]['cdescription'] = $value->description;
          $credits_br[$key]['camount'] = $value->debit;

          $debits_br[$key]['date'] = $value->date;
         $debits_br[$key]['ddescription'] = $value->description;
         $debits_br[$key]['dbank'] = $value->debit;
      }
      
    } else {
      $status = 'error'; 
      $message = 'Error to read Cash Payment';
    }


    $data['voucher_type'] = $type['cash_receipt'];
    // $data['bank_type'] = $type['bank_receipt'];
    $cash_receipt = $this->ledger_book_model->show_data($data);
    // var_dump($cash_receipt); exit; 
    $debits_cr = '';
    // $cash_receipt_total = '';
    if (isset($cash_receipt) && !empty($cash_receipt)) {
      // $cash_receipt_total = $this->ledger_book_model->show_total($data); 
      foreach ($cash_receipt as $key => $value) {
         $debits_cr[$key]['date'] = $value->date;
         $debits_cr[$key]['ddescription'] = $value->description;
         $debits_cr[$key]['damount'] = $value->debit;
       }
     
   } else {
    $status = 'error'; 
    $message = 'Error to read Cash Receipt, ' . $this->config->item('contact');
  }
  $credits_sub = array_merge($credits_bp, $credits_cp);
  $credits = array_merge($credits_sub, $credits_br); 

  $debits_sub = array_merge($debits_bp, $debits_cr);
  $debits = array_merge($debits_sub, $debits_br);

  $data['voucher_type'] = $type['bank_payment'];
  $bank_payment = $this->ledger_book_model->show_data($data);

$damount_total = 0;
foreach($debits as $key=>$value)
{
   $damount_total+= (isset($value['damount'])) ? $value['damount'] : 0;
}

$dbank_total = 0;
foreach($debits as $key=>$value)
{
   $dbank_total+= (isset($value['dbank'])) ? $value['dbank'] : 0;
}

$camount_total = 0;
foreach($credits as $key=>$value)
{
   $camount_total+= (isset($value['camount'])) ? $value['camount'] : 0;
}

$cbank_total = 0;
foreach($credits as $key=>$value)
{
   $cbank_total+= (isset($value['cbank'])) ? $value['cbank'] : 0;
}



  $result = ['status' => $status, 
  'message' => $message,
  'debits' => $debits,
  'credits' => $credits,
  'damount_total' => $damount_total,
  'dbank_total' => $dbank_total,
  'closing_camount' => $damount_total - $camount_total,
  'closing_cbank' => $dbank_total - $cbank_total,
  'camount_total' => $camount_total,
  'cbank_total' => $cbank_total
  ]; 

  echo json_encode($result);
}
}
