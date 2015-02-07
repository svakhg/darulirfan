<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        
    }

//    public function voucher_select() {
////        $$aColumns = 
//        $rResult = $this->db->query('select * from tbl_level3');
//        $output = array(
//            'sEcho' => intval($sEcho),
//            'iTotalRecords' => $iTotal,
//            'iTotalDisplayRecords' => $iFilteredTotal,
//            'aaData' => array()
//        );
//
//        foreach ($rResult->result_array() as $aRow) {
//            $row = array();
//
//            foreach ($aColumns as $col) {
//                $row[] = $aRow[$col];
//            }
//
//            $output['aaData'][] = $row;
//        }
//
//        echo json_encode($output);
//    }

    public function getTable($table_name) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        if ($table_name == 'chartofaccounts') {
            $aColumns = array('level3_name', 'level2_name', 'level1_name', 'type', 'level3_id');
        } else if ($table_name == 'tbl_voucher') {
            $aColumns = array('voucher_no', 'voucher_date', 'voucher_details', 'send_date', 'voucher_id');
        } else {
            $aColumns = array();
        }


        // DB table to use
//        $sTable = 'chartofaccouts';
        $sTable = $table_name;
        //
        $this->db->where("comp_id", $this->session->userdata('comp_id'));
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);

        // Paging
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }

        // Ordering
        if (isset($iSortCol_0)) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $iSortCol = $this->input->get_post('iSortCol_' . $i, true);
                $bSortable = $this->input->get_post('bSortable_' . intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_' . $i, true);

                if ($bSortable == 'true') {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
//        $this->db->where("level2_id",2);
//        $this->db->where("comp_id", $this->session->userdata('comp_id'));
        if (isset($sSearch) && !empty($sSearch)) {

            for ($i = 0; $i < count($aColumns); $i++) {
                $bSearchable = $this->input->get_post('bSearchable_' . $i, true);

                // Individual column filtering
                if (isset($bSearchable) && $bSearchable == 'true') {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch),$this->db->where("comp_id", $this->session->userdata('comp_id')));
//                    ;
                }
            }
        }

        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $aColumns)), false);
//        $this->db->where("comp_id", $this->session->userdata('comp_id');
        $rResult = $this->db->get($sTable);

        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length
        $iTotal = $this->db->count_all($sTable);

        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );

        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            $c = '';
            foreach ($aColumns as $col) {
//                $row[] = $aRow[$col];
                if ($col == 'voucher_id' && $table_name == 'tbl_voucher') {
                    $row[] = '<a target="_blank" href="' . base_url() . 'reports/printVoucher?voucher_id=' . $aRow[$col] . '" class="icon-share">View </a>'
                            . '<a target="_blank" href="' . base_url() . 'voucher/editVoucher/' . $aRow[$col] . '" class="icon-edit">Edit </a>'
                            . '<a href="' . base_url() . 'admin/delete/voucher/' . $aRow[$col] . '" class="icon-warning-sign">Delete </a>';
                } else if ($col == 'level3_id' && $table_name == 'chartofaccounts') {
                    $row[] = '<a href="' . base_url() . 'admin/level3/edit/' . $aRow[$col] . '" class="icon-edit">Edit </a>'
                            . '<a href="' . base_url() . 'admin/delete/level3/' . $aRow[$col] . '" class="icon-warning-sign" onclick="return confirm(' . "'Are you Want to sure Delete This??'" . ');">Delete </a>';
                } else {
                    $row[] = $aRow[$col];
                }
            }
            $output['aaData'][] = $row;

//            if ($table_name == 'tbl_voucher' && $aRow[$c] == 'voucher_id') {
//                $output['aaData'][] = '1';
//            } else {
//                $output['aaData'][] = $row;
//            }
        }

        echo json_encode($output);
    }

}

?>