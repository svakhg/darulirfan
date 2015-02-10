<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ledger_book_model extends CI_Model
{
	public $table = 'transaction';

	function show_data($data) {
		$data = $this->db->select('*')
		->where(['ledger_id' => $data['cash_in_hand'], 'date >' => $data['startdate'], 'date <' => $data['enddate'], 'voucher_type' => $data['voucher_type']])
		->or_where(['voucher_type' => $data['bank_type']])
		->get('transaction')->result();
		return $data; 
	}

	function show_total($data) {
		if ($data['voucher_type'] === 1){
			$sum = 'credit'; 
		} else {
			$sum = 'debit'; 
		}
		$this->db->select_sum($sum); 
		$data = $this->db->get_where('transaction', ['ledger_id' => $data['cash_in_hand'], 'date >' => $data['startdate'], 'date <' => $data['enddate'], 'voucher_type' => $data['voucher_type']]); 

		return $data->row()->$sum; 
	}
}