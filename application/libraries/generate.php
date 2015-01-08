<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generate extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function voucher_no() {
        $query = $this->db->select('voucher_no')
                ->order_by('voucher_no', 'desc')
                ->limit(1, 0)
                ->get('transaction');
        $id = (int) $query->row()->voucher_no;

        $voucher_no = $id + 1;
        return $voucher_no;
    }

}
