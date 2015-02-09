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
      //thos configuration should come from config item
      $cash_in_hand = $this->config->item('cash_in_hand'); 

      $cash_payment = $this->config->item('cash_payment'); 
      $cash_receipt = $this->config->item('cash_receipt'); 
      $bank_payment = $this->config->item('bank_payment');
      $bank_receipt = $this->config->item('bank_receipt'); 
      $journal_voucher = $this->config->item('journal_voucher');

      $result['voucher_type'] = (int) $data->voucher_type;
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
        $feedback = ['status' => 'error', 'message' => "Dont try to be so smart, Please give me valid data"];
        $voucher_id = (int) date('dhms'); 
          if ($result['voucher_type'] === $cash_payment) {
            # Cash Payment
            if (!check_is_voucher_duplicate($voucher_id)) {
              $debit['ledger_id'] = (int) $result['ledger_id'];
              $debit['description'] = (string) $result['description']; 
              $debit['voucher_type'] = (int) $result['voucher_type']; 
              $debit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id; 
              $debit['voucher_id'] = $voucher_id; 
              $debit['debit'] = $result['amount'];
              $debit['date'] = date ("Y-m-d");
              $debit['user_ip'] = $this->input->ip_address();
              $debit['created_by'] = $this->session->userdata('user')->UserId; 
              
              $this->db->insert('transaction', $debit); 

              $credit['ledger_id'] = $cash_in_hand; //1 = cash in hand
              $credit['description'] = (string) $result['description']; 
              $credit['voucher_type'] = (int) $result['voucher_type']; 
              $credit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id; 
              $credit['voucher_id'] = $voucher_id; 
              $credit['credit'] = $result['amount'];
              $credit['date'] = date ("Y-m-d");
              $credit['user_ip'] = $this->input->ip_address();
              $credit['created_by'] = $this->session->userdata('user')->UserId;

              $this->db->insert('transaction', $credit); 

              $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully "];
            } else {
              $feedback = ['status' => 'error', 'message' => "Voucher (" . $voucher_id . ") is duplicate"];
            }
            
          } elseif ($result['voucher_type'] === $cash_receipt) {
            # Cash Receipt
            if (!check_is_voucher_duplicate($voucher_id)) {
              $debit['ledger_id'] = $cash_in_hand; //1 = cash in hand
              $debit['description'] = (string) $result['description']; 
              $debit['voucher_type'] = (int) $result['voucher_type']; 
              $debit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id; 
              $debit['voucher_id'] = $voucher_id; 
              $debit['debit'] = $result['amount'];
              $debit['date'] = date ("Y-m-d");
              $debit['user_ip'] = $this->input->ip_address();
              $debit['created_by'] = $this->session->userdata('user')->UserId; 
              
              $this->db->insert('transaction', $debit); 

              $credit['ledger_id'] = (int) $result['ledger_id'];
              $credit['description'] = (string) $result['description']; 
              $credit['voucher_type'] = (int) $result['voucher_type']; 
              $credit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id; 
              $credit['voucher_id'] = $voucher_id; 
              $credit['credit'] = $result['amount'];
              $credit['date'] = date ("Y-m-d");
              $credit['user_ip'] = $this->input->ip_address();
              $credit['created_by'] = $this->session->userdata('user')->UserId;

              $this->db->insert('transaction', $credit); 

              $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully"];
            } else {
              $feedback = ['status' => 'error', 'message' => "Voucher (" . $voucher_id . ") is duplicate"];
            }

          } elseif ($result['voucher_type'] === $bank_payment) {
            # Bank Payment
            if (!check_is_voucher_duplicate($voucher_id)) {
              $debit['ledger_id'] = (int) $result['ledger_id'];
              $debit['description'] = (string) $result['description']; 
              $debit['voucher_type'] = (int) $result['voucher_type']; 
              $debit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id; 
              $debit['voucher_id'] = $voucher_id; 
              $debit['debit'] = $result['amount'];
              $debit['date'] = date ("Y-m-d");
              $debit['user_ip'] = $this->input->ip_address();
              $debit['created_by'] = $this->session->userdata('user')->UserId; 
              
              $this->db->insert('transaction', $debit); 

              $credit['ledger_id'] = $cash_in_hand; //1 = cash in hand
              $credit['description'] = (string) $result['description']; 
              $credit['voucher_type'] = (int) $result['voucher_type']; 
              $credit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id; 
              $credit['voucher_id'] = $voucher_id; 
              $credit['credit'] = $result['amount'];
              $credit['date'] = date ("Y-m-d");
              $credit['user_ip'] = $this->input->ip_address();
              $credit['created_by'] = $this->session->userdata('user')->UserId;

              $this->db->insert('transaction', $credit); 

              $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully "];
            } else {
              $feedback = ['status' => 'error', 'message' => "Voucher (" . $voucher_id . ") is duplicate"];
            }

          } elseif ($result['voucher_type'] === $bank_receipt) {
            # Bank Receipt
            if (!check_is_voucher_duplicate($voucher_id)) {
              $debit['ledger_id'] = $cash_in_hand; //1 = cash in hand
              $debit['description'] = (string) $result['description']; 
              $debit['voucher_type'] = (int) $result['voucher_type']; 
              $debit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id; 
              $debit['voucher_id'] = $voucher_id; 
              $debit['debit'] = $result['amount'];
              $debit['date'] = date ("Y-m-d");
              $debit['user_ip'] = $this->input->ip_address();
              $debit['created_by'] = $this->session->userdata('user')->UserId; 
              
              $this->db->insert('transaction', $debit); 

              $credit['ledger_id'] = (int) $result['ledger_id'];
              $credit['description'] = (string) $result['description']; 
              $credit['voucher_type'] = (int) $result['voucher_type']; 
              $credit['acc_group_id'] = (int) acc_group_id($result['ledger_id'])->acc_group_id; 
              $credit['voucher_id'] = $voucher_id; 
              $credit['credit'] = $result['amount'];
              $credit['date'] = date ("Y-m-d");
              $credit['user_ip'] = $this->input->ip_address();
              $credit['created_by'] = $this->session->userdata('user')->UserId;

              $this->db->insert('transaction', $credit); 

              $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully"];
            } else {
              $feedback = ['status' => 'error', 'message' => "Voucher (" . $voucher_id . ") is duplicate"];
            }

          } elseif ($result['voucher_type'] === $journal_voucher) {
            # Journal Voucher
          }
          echo json_encode($feedback);
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
