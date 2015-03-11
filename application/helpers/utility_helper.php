<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function error_process($is_valid) {
    foreach ($is_valid as $key => $value) {
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function msg_display($msg = false, $type = false) {
$msg = '<script type="text/javascript"> toastr.'
        . $type
        . '("'
        . $msg
        . '");'
        . ' </script>';
echo $msg;
}

function acc_group_type_id($voucher_type_id = null) {
	$CI = get_instance();
    $CI->load->database();
	if ($voucher_type_id !== null) {
		return $CI->db->select('acc_group_type_id')->get_where('voucher_type', ['id' => $voucher_type_id])->row();
	}
}

function acc_group_id($ledger_id = null) {
    $CI = get_instance();
    $CI->load->database();
    if ($ledger_id !== null) {
        return $CI->db->select('group_id as acc_group_id')->get_where('acc_ledger', ['ledger_id' => $ledger_id])->row();
    }
}

function check_is_voucher_duplicate($voucher_id = null) {
    $CI = get_instance();
    $CI->load->database();
    if ($voucher_id !== null) {
        $result = $CI->db->select('id')->get_where('transaction', ['voucher_id' => $voucher_id]);
        if ($result->num_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
}

