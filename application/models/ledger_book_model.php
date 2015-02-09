<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ledger_book_model extends CI_Model
{
    public $table = 'transaction';

    function show_ledger($data) {
    	 $data = $this->db->select('*')
    	 				->get_where('transaction', ['ledger_id' => $data['cash_in_hand'], 'date >' => $data['startdate'], 'voucher_type' => 1])->result(); 
    	 return $data; 
    	 //'date <' => $data['enddate'],
    }
}