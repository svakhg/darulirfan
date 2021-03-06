<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Voucher_ctrl extends base_ctrl
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function process()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));
            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('id', 'acc_group_id', 'ledger_id', 'debit', 'credit', 'description', 'voucher_type', 'voucher_id', 'date');

            switch ($type) {
                case 'read':
                    $result = $result->read('transaction', $columns, $request);
                    break;
            }
            echo json_encode($result, JSON_NUMERIC_CHECK);

            exit;
        }
    }

    public function save()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'));
        $result = (array)$data;
        // var_dump($result); exit;
        //thos configuration should come from config item
        $cash_in_hand = $this->config->item('cash_in_hand');

        $cash_payment = $this->config->item('cash_payment');
        $cash_receipt = $this->config->item('cash_receipt');
        $bank_payment = $this->config->item('bank_payment');
        $bank_receipt = $this->config->item('bank_receipt');
        $journal_voucher = $this->config->item('journal_voucher');

        // $result['voucher_type'] = (int) $data->voucher_type;
        $is_valid = GUMP::is_valid($result, array(
            'voucher_type' => 'required',
            'invoice_items' => 'required'
        ));

//        var_dump($result);
//      [{"id":"1","name":"Cash Payment"},
        // {"id":"2","name":"Cash Receipt"},
        // {"id":"3","name":"Bank Payment"},
        // {"id":"4","name":"Bank Receipt"},
        // {"id":"5","name":"Journal Voucher"}]
        if ($is_valid === true) {

//        exit;
//            $feedback = ['status' => 'error', 'message' => "Dont try to be so smart, Please give me valid data"];
            $voucher_id = random_string('numeric', 6);
            if ((int)$result['voucher_type'] === $cash_payment) {
                # Cash Payment
                foreach ($result['invoice_items'] as $value) {
                    $debit['ledger_id'] = (int)$value->ledger_id;
                    $debit['description'] = (string)$value->description;
                    $debit['voucher_type'] = (int)$result['voucher_type'];
                    $debit['acc_group_id'] = (int)acc_group_id($value->ledger_id)->acc_group_id;
                    $debit['voucher_id'] = $voucher_id;
                    $debit['debit'] = $value->amount;
                    $debit['date'] = date("Y-m-d");
                    $debit['user_ip'] = $this->input->ip_address();
                    $debit['created_by'] = $this->session->userdata('user')->UserId;

                    $this->db->insert('transaction', $debit);

                    $credit['ledger_id'] = $cash_in_hand; //1 = cash in hand
                    $credit['description'] = (string)$value->description;
                    $credit['voucher_type'] = (int)$result['voucher_type'];
                    $credit['acc_group_id'] = (int)acc_group_id($value->ledger_id)->acc_group_id;
                    $credit['voucher_id'] = $voucher_id;
                    $credit['credit'] = $value->amount;
                    $credit['date'] = date("Y-m-d");
                    $credit['user_ip'] = $this->input->ip_address();
                    $credit['created_by'] = $this->session->userdata('user')->UserId;

                    $this->db->insert('transaction', $credit);

                }
                $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully "];

            } elseif ((int)$result['voucher_type'] === $cash_receipt) {
                # Cash Receipt
                foreach ($result['invoice_items'] as $value) {
                    $debit['ledger_id'] = $cash_in_hand; //1 = cash in hand
                    $debit['description'] = (string)$value->description;
                    $debit['voucher_type'] = (int)$result['voucher_type'];
                    $debit['acc_group_id'] = (int)acc_group_id($value->ledger_id)->acc_group_id;
                    $debit['voucher_id'] = $voucher_id;
                    $debit['debit'] = $value->amount;
                    $debit['date'] = date("Y-m-d");
                    $debit['user_ip'] = $this->input->ip_address();
                    $debit['created_by'] = $this->session->userdata('user')->UserId;

                    $this->db->insert('transaction', $debit);

                    $credit['ledger_id'] = (string)$value->ledger_id;
                    $credit['description'] = (string)$value->description;
                    $credit['voucher_type'] = (int)$result['voucher_type'];
                    $credit['acc_group_id'] = (int)acc_group_id($value->ledger_id)->acc_group_id;
                    $credit['voucher_id'] = $voucher_id;
                    $credit['credit'] = $value->amount;
                    $credit['date'] = date("Y-m-d");
                    $credit['user_ip'] = $this->input->ip_address();
                    $credit['created_by'] = $this->session->userdata('user')->UserId;

                    $this->db->insert('transaction', $credit);
                }
                $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully"];

            } elseif ((int)$result['voucher_type'] === $bank_payment) {
                # Bank Payment
                foreach ($result['invoice_items'] as $value) {
                    $debit['ledger_id'] = (int)$value->ledger_id;
                    $debit['description'] = (string)$value->description;
                    $debit['voucher_type'] = (int)$result['voucher_type'];
                    $debit['acc_group_id'] = (int)acc_group_id($value->ledger_id)->acc_group_id;
                    $debit['voucher_id'] = $voucher_id;
                    $debit['debit'] = $value->amount;
                    $debit['date'] = date("Y-m-d");
                    $debit['user_ip'] = $this->input->ip_address();
                    $debit['created_by'] = $this->session->userdata('user')->UserId;

                    $this->db->insert('transaction', $debit);

                    $credit['ledger_id'] = $cash_in_hand; //1 = cash in hand
                    $credit['description'] = (string)$value->description;
                    $credit['voucher_type'] = (int)$result['voucher_type'];
                    $credit['acc_group_id'] = (int)acc_group_id($value->ledger_id)->acc_group_id;
                    $credit['voucher_id'] = $voucher_id;
                    $credit['credit'] = $value->amount;
                    $credit['date'] = date("Y-m-d");
                    $credit['user_ip'] = $this->input->ip_address();
                    $credit['created_by'] = $this->session->userdata('user')->UserId;

                    $this->db->insert('transaction', $credit);
                }
                $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully "];

            } elseif ((int)$result['voucher_type'] === $bank_receipt) {
                # Bank Receipt
                foreach ($result['invoice_items'] as $value) {
                    $debit['ledger_id'] = $cash_in_hand; //1 = cash in hand
                    $debit['description'] = (string)$value->description;
                    $debit['voucher_type'] = (int)$result['voucher_type'];
                    $debit['acc_group_id'] = (int)acc_group_id($value->ledger_id)->acc_group_id;
                    $debit['voucher_id'] = $voucher_id;
                    $debit['debit'] = $value->amount;
                    $debit['date'] = date("Y-m-d");
                    $debit['user_ip'] = $this->input->ip_address();
                    $debit['created_by'] = $this->session->userdata('user')->UserId;

                    $this->db->insert('transaction', $debit);

                    $credit['ledger_id'] = (int)$value->ledger_id;
                    $credit['description'] = (string)$value->description;
                    $credit['voucher_type'] = (int)$result['voucher_type'];
                    $credit['acc_group_id'] = (int)acc_group_id($value->ledger_id)->acc_group_id;
                    $credit['voucher_id'] = $voucher_id;
                    $credit['credit'] = $value->amount;
                    $credit['date'] = date("Y-m-d");
                    $credit['user_ip'] = $this->input->ip_address();
                    $credit['created_by'] = $this->session->userdata('user')->UserId;

                    $this->db->insert('transaction', $credit);
                }
                $feedback = ['status' => 'success', 'message' => "Voucher (" . $voucher_id . ") Data Inserted Successfully"];

            } elseif ($result['voucher_type'] === $journal_voucher) {
                # Journal Voucher
                $feedback = ['status' => 'error', 'message' => "Journal Voucher is not maintained by system yet"];

            }
            echo json_encode($feedback);
        } else {
            print_r($is_valid);
        }
    }

    public function index()
    {
        $this->load->view('voucher');
    }

    public function list_view()
    {
        $this->load->view('voucher_all');
    }

    public function view()
    {
        $this->load->view('voucher_view');
    }

    public function get_voucher()
    {

        $voucher_id = $this->input->get('id');
        // var_dump($voucher_id);
        $data = $this->db->select('transaction.id, transaction.date, transaction.ledger_id, transaction.voucher_id, transaction.description, transaction.voucher_type, transaction.debit, transaction.credit, transaction.ledger_id')
            ->where(['transaction.voucher_id' => $voucher_id, 'transaction.ledger_id !=' => 1])
            // ->join('acc_ledger', 'acc_ledger.ledger_id = transaction.ledger_id')
            ->get('transaction');
        // var_dump($data->result()); exit;
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $key => $value) {
                $info[$key]['voucher_type'] = $value->voucher_type;
                $info[$key]['description'] = $value->description;
                $info[$key]['credit'] = $value->credit;
                $info[$key]['debit'] = $value->debit;
                $info[$key]['date'] = $value->date;
                // $info[$key]['ledger_name'] = $value->ledger_name;
                $info[$key]['ledger_id'] = $value->ledger_id;

            }

            $response = ['data' => $info, 'status' => "success", 'msg' => ' Voucher Info Found'];
        } else {
            $response = ['data' => null, 'status' => "error", 'msg' => ' Voucher Info not Found'];
        }

        echo json_encode($response);
    }
}
