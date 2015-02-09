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
    	// var_dump($data); 
    	echo json_encode($data);
    }

    function voucher_type() {
        $data = $this->db->select('id, name, acc_group_type_id')->get('voucher_type')->result();
    	echo json_encode($data);
    }

    function acc_ledger() {
        $post = $this->input->post();
        if ($post) {
            $voucher_type_id = (int) $post['filter']['filters'][0]['value'];
            //3 and 4 should come from config item ; 

            if ($voucher_type_id === $this->config->item('bank_payment') OR $voucher_type_id === $this->config->item('bank_receipt')) {
                //it should be ledger of bank account of which bank 
                //example islamic bank account 1546654
                //example estern bank account 45455456
                echo json_encode($this->db->select('id, name')->get_where('acc_ledger', ['group_id' => 2])->result()); 
                //here 2 must come from config item;
                //2 = cash at bank in account group table ; 
            } else {
                $acc_group_type_id = acc_group_type_id($voucher_type_id)->acc_group_type_id;
                    echo json_encode($this->db->select('id, name')
                    ->like('acc_group_type_id', $acc_group_type_id)
                    ->get('acc_ledger')
                    ->result());
            }
        } else {
            echo json_encode($this->db->select('id, name, acc_group_type_id')->get('acc_ledger')->result());
        }
    }

}
