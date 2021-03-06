<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Ledger_report_ctrl extends base_ctrl {
  public function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->load->helper('url');
    // $this->load->model('ledger_book_model');

  }
  public function index() {
    $this->load->view('ledger_report');
  }

  public function view () {
    $ledger_id = $this->uri->segment(3); 
    // var_dump($ledger_id);
    $this->load->view('ledger_report', $ledger_id);
  }
  function show_ledger() {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'));
          // var_dump($data); exit; 
    
    $result = (array) $data;
    $is_valid = GUMP::is_valid($result, array(
          'startdate' => 'required',
          'ledger_id' => 'required',
          'enddate' => 'required'
      ));
      if($is_valid === true) {
        $query = $this->db->select('*')
                    ->where('ledger_id', $result['ledger_id'])
                    ->get('transaction');
        if ($query->num_rows() > 0) {
          $data = $query->result();
          // var_dump($data); exit; 
          $debit_total = 0;
        $credit_total = 0;
        foreach($data as $row) {
            $debit = $row->debit;
            $credit = $row->credit;

            $debit_total += $debit;
            $credit_total += $credit;
        }

        } else {
          $data = null; 
          $debit_total = null; 
          $credit_total = null; 
        }
        
        $info = ['status' => 'success', 'message' => 'operation successful', 'data' => $data, 'debit_total' => $debit_total, 'credit_total' => $credit_total];
        echo json_encode($info);
      }  else {
            $err = error_process($is_valid);
            foreach ($err as $value) {
                $row['message'] = $value;
            }
            $row['status'] = 'error';
            echo json_encode($row);
    }

}
}