<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Global_data extends base_ctrl {
public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('utility_helper');
    }

    function all() {
    	$data['voucher_type'] = $this->db->get('voucher_type')->result();
        $data['ledger_info'] = $this->db->select('id as value, name as text')->get('acc_ledger')->result();
        $data['acc_group_info'] = $this->db->select('id as value, group_name as text')->get('acc_group')->result();
        $data['class_info'] = $this->class_info();
        $data['fee_type'] = $this->fee_type();
        $data['fees_category'] = $this->fees_category(); 
        $data['std_type'] = $this->std_type();
        $data['month_info'] = $this->month_info();
        $data['designation'] = $this->designation();
        $data['active_status'] = $this->status(); 
        // $data['fees_category'] = $this->fees_category();

    	echo json_encode($data);
    }

    function fees_category() {
        $data = $this->db->select('id as value, fee_category as text')->get('fees_category')->result();
    	return $data;
    }

    function designation() {
        $data = $this->db->select('id as value, designation_name as text')->get('designation')->result();
        return $data;
    }

    public function status() {
        return [['value' => 1, 'text' => "Active"], ['value' => 2, 'text' => "Inactive"]];
    }


    function voucher_type() {
        $data = $this->db->select('id, name, acc_group_type_id')->get('voucher_type')->result();
        echo json_encode($data);
    }
    
    function fee_type() {
        $data = [['fee_type_name' => 'Monthly', 'fee_type_id' => 1], ['fee_type_name' => 'Yearly', 'fee_type_id' => 2], ['fee_type_name' => 'One Time', 'fee_type_id' => 3]];
        return $data;  
    }

    function std_type() {
        $data = [['text' => 'All', 'value' => 1], ['text' => 'Residential', 'value' => 2], ['text' => 'Non-Residential', 'value' => 3]];
        return $data;  
    }

    function month_info() {
        $data = [['text' => 'January', 'value' => 1], ['text' => 'February', 'value' => 2], ['text' => 'March', 'value' => 3], ['text' => 'April', 'value' => 4], ['text' => 'May', 'value' => 5], ['text' => 'June', 'value' => 6], ['text' => 'July', 'value' => 7], ['text' => 'August', 'value' => 8], ['text' => 'September', 'value' => 9], ['text' => 'Octobar', 'value' => 10], ['text' => 'November', 'value' => 11], ['text' => 'December', 'value' => 12]];
        return $data;  
    }

    function class_info() {
        return $data = $this->db->select('id, class_name as name')->get('class')->result();
        // echo json_encode($data);
    }

    function acc_group() {
        $data = $this->db->select('id, group_name as name')->get_where('acc_group', ['group_status' => 1])->result();
        echo json_encode($data);
    }

    function acc_ledger() {
        $post = $this->input->post();
        if ($post) {
            $acc_group_id = (int) $post['filter']['filters'][0]['value'];
            //3 and 4 should come from config item ; 
            //if ($acc_group_id === $this->config->item('bank_payment') OR $acc_group_id === $this->config->item('bank_receipt')) {
                //it should be ledger of bank account of which bank 
                //example islamic bank account 1546654
                //example estern bank account 45455456
                // echo json_encode($this->db->select('id, name')->get_where('acc_ledger', ['group_id' => $acc_group_id])->result()); 
                //here 2 must come from config item;
                //2 = cash at bank in account group table ; 
            //} else {
                // $acc_group_type_id = acc_group_type_id($voucher_type_id)->acc_group_type_id;
                    // var_dump($acc_group_id); 
                    
                    echo json_encode($this->db->select('ledger_id, name')
                    ->where('group_id', $acc_group_id)
                    ->get('acc_ledger')
                    ->result());
            //}
        } 
        else {
            echo json_encode($this->db->select('ledger_id, name, acc_group_type_id')->get('acc_ledger')->result());
        }
    }

}
