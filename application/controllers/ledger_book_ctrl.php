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
    // To test performance through codeigntier profiler
    // $this->output->enable_profiler(TRUE);
    // $sections = array(
    //     'config'  => TRUE,
    //     'queries' => TRUE
    //     );

    // $this->output->set_profiler_sections($sections);


//it is possible to minimize mysql query by loop throught whole output by vouhcer type
    //if application perfomance seems slow then i should find other way to do this
    
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

    //to get opening balance 
    // ------------------------------------------------------------
    $this->benchmark->mark('one');

    $info['startdate'] = "08/03/2000"; 
    $info['enddate'] = $data['startdate']; 
    $info['cash_in_hand'] = $this->config->item('cash_in_hand');

    $info['voucher_type'] = $type['cash_payment'];
    $cash_payment = $this->ledger_book_model->show_data($info);
    $credits_cp = '';
    if (isset($cash_payment) && !empty($cash_payment)) {
      $status = true; 
      foreach ($cash_payment as $key => $value) {
        $credits_cp[$key]['camount'] = $value->credit;
      }
    } else {
      $status = false; 
    }

    $info['voucher_type'] = $type['bank_payment'];
    $bank_payment = $this->ledger_book_model->show_data($info);
    $credits_bp = '';
    if (isset($bank_payment) && !empty($bank_payment)) {
      $status = true; 
      foreach ($bank_payment as $key => $value) {
        $credits_bp[$key]['cbank'] = $value->credit;

        $debits_bp[$key]['damount'] = $value->credit;
      }
    } else {
      $status = false; 
    }

    $info['voucher_type'] = $type['bank_receipt'];
    $bank_receipt = $this->ledger_book_model->show_data($info);
    $credits_br = '';
    if (isset($bank_receipt) && !empty($bank_receipt)) {
      $status = true; 
      foreach ($bank_receipt as $key => $value) {
        $credits_br[$key]['camount'] = $value->debit;

        $debits_br[$key]['dbank'] = $value->debit;
      }
    } else {
      $status = false; 
    }

    $info['voucher_type'] = $type['cash_receipt'];
    $cash_receipt = $this->ledger_book_model->show_data($info);
    $debits_cr = '';
    if (isset($cash_receipt) && !empty($cash_receipt)) {
      $status = true; 
      foreach ($cash_receipt as $key => $value) {
       $debits_cr[$key]['damount'] = $value->debit;
     }
   } else {
    $status = false; 
  }
  // var_dump($status); exit; 
  if ($status === true) {
    $credits_sub = array_merge($credits_bp, $credits_cp);
    $credits = array_merge($credits_sub, $credits_br); 

    $debits_sub = array_merge($debits_bp, $debits_cr);
    $debits = array_merge($debits_sub, $debits_br);

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

   $opening_cash_in_hand = $damount_total - $camount_total; 
   $opening_cash_at_bank = $dbank_total - $cbank_total; 
 } else {
  $opening_cash_in_hand = 0; 
  $opening_cash_at_bank = 0; 
}

$this->benchmark->mark('two');
// -----------------------------------------------------------------------
//end of getting opening balance

$this->benchmark->mark('three');

$status = 'success';
$message = 'operation successful';
$data['voucher_type'] = $type['cash_payment'];

$cash_payment = $this->ledger_book_model->show_data($data);
$credits_cp = '';
if (isset($cash_payment) && !empty($cash_payment)) {
  foreach ($cash_payment as $key => $value) {
    $credits_cp[$key]['date'] = $value->date;
    $credits_cp[$key]['voucher_id'] = $value->voucher_id;
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
if (isset($bank_payment) && !empty($bank_payment)) {
  foreach ($bank_payment as $key => $value) {
    $credits_bp[$key]['date'] = $value->date;
    $credits_bp[$key]['voucher_id'] = $value->voucher_id;
    $credits_bp[$key]['cdescription'] = $value->description;
    $credits_bp[$key]['cbank'] = $value->credit;

    $debits_bp[$key]['date'] = $value->date;
    $debits_bp[$key]['voucher_id'] = $value->voucher_id;
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
if (isset($bank_receipt) && !empty($bank_receipt)) {
  foreach ($bank_receipt as $key => $value) {
    $credits_br[$key]['date'] = $value->date;
    $credits_br[$key]['voucher_id'] = $value->voucher_id;
    $credits_br[$key]['cdescription'] = $value->description;
    $credits_br[$key]['camount'] = $value->debit;

    $debits_br[$key]['date'] = $value->date;
    $debits_br[$key]['voucher_id'] = $value->voucher_id;
    $debits_br[$key]['ddescription'] = $value->description;
    $debits_br[$key]['dbank'] = $value->debit;
  }

} else {
  $status = 'error'; 
  $message = 'Error to read Cash Payment';
}


$data['voucher_type'] = $type['cash_receipt'];
$cash_receipt = $this->ledger_book_model->show_data($data);
$debits_cr = '';
if (isset($cash_receipt) && !empty($cash_receipt)) {
  foreach ($cash_receipt as $key => $value) {
   $debits_cr[$key]['date'] = $value->date;
   $debits_cr[$key]['voucher_id'] = $value->voucher_id;
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


$damount_total = $damount_total + $opening_cash_in_hand; 
$dbank_total = $dbank_total + $opening_cash_at_bank; 

$this->benchmark->mark('four');

//to test execution time
// echo $this->benchmark->elapsed_time('one', 'two');
// echo $this->benchmark->elapsed_time('three', 'four');
// echo $this->benchmark->elapsed_time('one', 'four');


$result = ['status' => $status, 
'message' => $message,
'debits' => $debits,
'credits' => $credits,
'damount_total' => $damount_total,
'dbank_total' => $dbank_total,
'closing_camount' => $damount_total - $camount_total,
'closing_cbank' => $dbank_total - $cbank_total,
'camount_total' => $camount_total,
'cbank_total' => $cbank_total,
'opening_cash_in_hand' => $opening_cash_in_hand,
'opening_cash_at_bank' => $opening_cash_at_bank
]; 

echo json_encode($result);
}
}
