<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_Model extends CI_Model {

    public function selectLevel1Level2() {
        $this->db
                ->select('tbl_level1.level1_name,tbl_level2.level2_name')
                ->from('tbl_level2')
                ->join('tbl_level1', 'tbl_level2.level1_id = tbl_level1.id', 'right')
                ->where('tbl_level1.comp_id', $this->session->userdata('comp_id'))
                ->where('tbl_level2.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function selectLevel1ToPosting() {
        echo '<h1>asdf sadfsdf sdf<hr><br>sdfasdfas<hr></h1>';
        $this->db
                ->select('tbl_level3.level3_name,tbl_level1.level1_name,tbl_level2.level2_name')
                ->from('tbl_level2,tbl_level1')
                ->join('tbl_level3', 'tbl_level3.level2_id=tbl_level2.id AND tbl_level2.level1_id = tbl_level1.id')
                ->where('tbl_level1.comp_id', $this->session->userdata('comp_id'))
                ->where('tbl_level2.comp_id', $this->session->userdata('comp_id'))
                ->where('tbl_level3.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function slelectVoucherById($Vid) {
        $this->db
                ->select('voucher_no,voucher_no_form,voucher_date,voucher_details,t.voucher_type,t.details')
                ->from('tbl_voucher as v')
                ->join('tbl_vouchertype as t', 'v.voucher_type_id = t.id')
                ->where('v.voucher_id', $Vid)
                ->where('v.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        if ($query->row()) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function slelectVoucherChildById($Vid) {
        $this->db
                ->select('c.debit,c.credit,l.level3_name')
                ->from('tbl_voucherchild as c')
                ->join('tbl_level3 as l', 'c.level3_id = l.id')
                ->where('c.voucher_id', $Vid)
                ->where('c.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
//        echo '<pre>';
//        print_r($query->result());
        return $query->result();
    }

    public function selectPostingLevel() {
        $this->db
                ->select('id,level3_name')
                ->from('tbl_level3')
                ->where('comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function selectVoucherByIdChild($lid, $date_from, $date_to) {
        $this->db
                ->select('c.note,c.debit,c.credit,v.voucher_no,v.voucher_date')
                ->from('tbl_voucherchild as c')
                ->join('tbl_voucher as v', 'c.voucher_id=v.voucher_id', 'right')
                ->where('c.level3_id', $lid)
                ->where("v.voucher_date BETWEEN '$date_from' AND '$date_to'")
                ->where('v.comp_id', $this->session->userdata('comp_id'))
                ->where('c.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
//        echo '<pre>';
//        print_r($query->result());
    }

    public function openingBalance($AccountHead, $date_to) {
        $this->db
                ->select('SUM(c.debit) AS t_debit,SUM(c.credit) as t_credit')
                ->from('tbl_voucherchild as c')
                ->where('c.level3_id', $AccountHead)
                ->join('tbl_voucher as v', 'c.voucher_id=v.voucher_id')
                ->where("v.voucher_date BETWEEN '0000-00-00' AND '$date_to'")
                ->where('c.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->row();
    }

    public function selectLevel3Balance() {
        $this->db
                ->select('lvl3.level3_name,SUM(ch.debit)-SUM(ch.credit) as balance')
                ->from('tbl_voucherchild as ch')
                ->join('tbl_level3 as lvl3', 'ch.level3_id=lvl3.id', 'left')
                ->join('tbl_level2 as lvl2', 'lvl3.level2_id=lvl2.id', 'left')
                ->join('tbl_level1 as lvl1', 'lvl2.level1_id=lvl1.id', 'left')
                ->join('tbl_account_type as ac', 'lvl1.account_id=ac.account_id', 'left')
                ->order_by('ac.account_id', 'ASC')
                ->order_by('lvl3.level3_name', 'ASC')
                ->where('ch.comp_id', $this->session->userdata('comp_id'))
                ->group_by('ch.level3_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function selectAllLevelBalance() {
        $this->db
                ->select('lvl1.level1_name,lvl3.level3_name,lvl2.level2_name,SUM(ch.debit)-SUM(ch.credit) as balance')
                ->from('tbl_voucherchild as ch')
                ->join('tbl_level3 as lvl3', 'ch.level3_id=lvl3.id', 'left')
                ->join('tbl_level2 as lvl2', 'lvl3.level2_id=lvl2.id', 'left')
                ->join('tbl_level1 as lvl1', 'lvl2.level1_id=lvl1.id', 'left')
                ->join('tbl_account_type as ac', 'lvl1.account_id=ac.account_id', 'left')
                ->where('ch.comp_id', $this->session->userdata('comp_id'))
                ->group_by('ch.level3_id')
                ->order_by('ac.account_id', 'ASC')
                ->order_by('lvl1.level1_name', 'ASC')
                ->order_by('lvl2.level2_name', 'ASC')
                ->order_by('lvl3.level3_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function selectBalanceSheetHead($expList) {
        $this->db->select("level3_name,balance")
                ->from('vw_voucher_bal')
                ->where('type', $expList)
                ->where('comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function selectBalanceSheetHeadAll($expList) {
        $this->db
                ->select('lvl1.level1_name,lvl2.level2_name,lvl3.level3_name,SUM(ch.debit)- SUM(ch.credit) as balance')
                ->from('tbl_voucherchild as ch')
                ->where('ac.type', $expList)
                ->join('tbl_voucher as v', 'ch.voucher_id=v.voucher_id', 'left')
                ->join('tbl_level3 as lvl3', 'ch.level3_id=lvl3.id', 'left')
                ->join('tbl_level2 as lvl2', 'lvl3.level2_id=lvl2.id', 'left')
                ->join('tbl_level1 as lvl1', 'lvl2.level1_id=lvl1.id', 'left')
                ->join('tbl_account_type as ac', 'lvl1.account_id=ac.account_id', 'left')
                ->where('ch.comp_id', $this->session->userdata('comp_id'))
                ->group_by('ch.level3_id')
                ->order_by('lvl3.level3_name ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeExpenditureBalance($AccountHead, $date_from, $date_to) {
        $this->db
                ->select('ac.type,lvl3.level3_name,SUM(ch.debit)- SUM(ch.credit) as balance')
                ->from('tbl_voucherchild as ch')
                ->where('ac.type', $AccountHead)
                ->join('tbl_voucher as v', 'ch.voucher_id=v.voucher_id', 'left')
                ->join('tbl_level3 as lvl3', 'ch.level3_id=lvl3.id', 'left')
                ->join('tbl_level2 as lvl2', 'lvl3.level2_id=lvl2.id', 'left')
                ->join('tbl_level1 as lvl1', 'lvl2.level1_id=lvl1.id', 'left')
                ->join('tbl_account_type as ac', 'lvl1.account_id=ac.account_id', 'left')
                ->where("v.voucher_date BETWEEN '$date_from' AND '$date_to'")
                ->where('ch.comp_id', $this->session->userdata('comp_id'))
                ->group_by('ch.level3_id')
                ->order_by('lvl3.level3_name ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function incomeEBallLevel($AccountHead, $date_from, $date_to) {
        $this->db
                ->select('lvl1.level1_name,lvl2.level2_name,lvl3.level3_name,SUM(ch.debit)- SUM(ch.credit) as balance')
                ->from('tbl_voucherchild as ch')
                ->where('ac.type', $AccountHead)
                ->join('tbl_voucher as v', 'ch.voucher_id=v.voucher_id', 'left')
                ->join('tbl_level3 as lvl3', 'ch.level3_id=lvl3.id', 'left')
                ->join('tbl_level2 as lvl2', 'lvl3.level2_id=lvl2.id', 'left')
                ->join('tbl_level1 as lvl1', 'lvl2.level1_id=lvl1.id', 'left')
                ->join('tbl_account_type as ac', 'lvl1.account_id=ac.account_id', 'left')
                ->where("v.voucher_date BETWEEN '$date_from' AND '$date_to'")
                ->where('ch.comp_id', $this->session->userdata('comp_id'))
                ->group_by('ch.level3_id')
                ->order_by('lvl3.level3_name ASC');
        $query = $this->db->get();
        return $query->result();
    }

}
