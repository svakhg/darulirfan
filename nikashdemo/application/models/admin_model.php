<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    public function insertData($table_name, $data) {
        if ($this->db->insert($table_name, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function selectData($field, $table, $order = '') {
        if ($order) {
            $this->db->order_by($order, 'ASC');
        }
        $this->db
                ->select($field)
                ->from($table)
                ->where('comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function selectRowById($field, $table, $by, $id) {
        $this->db
                ->select($field)
                ->from($table)
                ->where($by, $id)
                ->where('comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->row();
    }

    public function selectResultById($field, $table, $by, $id) {
        $this->db
                ->select($field)
                ->from($table)
                ->where($by, $id)
                ->where('comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function selectFinancialYear() {
        $this->db
                ->select('fy_begin_date,fy_end_date')
                ->from('tbl_company')
                ->where('comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
//        if
        return $query->row();
    }

    public function updateFY($input) {
        $this->db
                ->where('comp_id', $this->session->userdata('comp_id'))
                ->set($input)
//                ->set(,$input['fy_begin_date'])
//                ->set(,$input['fy_begin_date'])
                ->update('tbl_company');
        return TRUE;
    }

    public function selectDataLevel1($id = '') {
        if ($id) {
            $this->db
                    ->select('ac.account_id,lvl1.id,lvl1.level1_name')
                    ->from('tbl_level1 as lvl1')
                    ->join('tbl_account_type as ac', 'lvl1.account_id = ac.account_id')
                    ->where('lvl1.id', $id)
                    ->where('lvl1.comp_id', $this->session->userdata('comp_id'));
            $query = $this->db->get();
            return $query->row();
        } else {
            $this->db
                    ->select('ac.type as account_type,lvl1.id,lvl1.level1_name')
                    ->from('tbl_level1 as lvl1')
                    ->join('tbl_account_type as ac', 'lvl1.account_id = ac.account_id')
                    ->order_by('ac.type', 'ASC')
                    ->order_by('lvl1.level1_name', 'ASC')
                    ->where('lvl1.comp_id', $this->session->userdata('comp_id'));
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function selectDataLevel2($id = '') {
        if ($id) {
            $this->db
                    ->select('lvl1.level1_name,lvl1.id as level1_id ,lvl2.level2_name,lvl2.id')
                    ->from('tbl_level2 as lvl2')
                    ->join('tbl_level1 as lvl1', 'lvl2.level1_id = lvl1.id')
                    ->where('lvl2.id', $id)
                    ->where('lvl2.comp_id', $this->session->userdata('comp_id'));
            $query = $this->db->get();
            return $query->row();
        } else {
            $this->db
                    ->select('lvl1.level1_name,lvl1.id,lvl2.level2_name,lvl2.id')
                    ->from('tbl_level2 as lvl2')
                    ->join('tbl_level1 as lvl1', 'lvl2.level1_id = lvl1.id')
                    ->order_by('lvl1.level1_name', 'ASC')
                    ->order_by('lvl2.level2_name', 'ASC')
                    ->where('lvl2.comp_id', $this->session->userdata('comp_id'));
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function selectDataLevel3($id = '') {
        if ($id) {
            $this->db
                    ->select('lvl2.level2_name,lvl2.id as level2_id ,lvl3.level3_name,lvl3.id')
                    ->from('tbl_level3 as lvl3')
                    ->join('tbl_level2 as lvl2', 'lvl3.level2_id = lvl2.id')
                    ->where('lvl3.id', $id)
                    ->where('lvl3.comp_id', $this->session->userdata('comp_id'));
            $query = $this->db->get();
            return $query->row();
        } else {
            $this->db
                    ->select('lvl2.level2_name,lvl2.id as level2_id ,lvl3.level3_name,lvl3.id')
                    ->from('tbl_level3 as lvl3')
                    ->join('tbl_level2 as lvl2', 'lvl3.level2_id = lvl2.id')
                    ->order_by('lvl2.level2_name', 'ASC')
                    ->order_by('lvl3.level3_name', 'ASC')
                    ->where('lvl3.comp_id', $this->session->userdata('comp_id'));
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function checkVoucherDate($date) {
        $this->db->select('fy_begin_date,fy_end_date')
                ->from('tbl_company')
                ->where('comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            if ($date >= $query->row()->fy_begin_date && $date <= $query->row()->fy_end_date) {
                return FALSE;
//                echo 'duktono';
            } else {
                return TRUE;
//                echo 'dukbo';
            }
        } else {
            return TRUE;
        }
    }

    public function updateAccountModel($input) {
        $this->db
                ->where('account_id', $input['account_id'])
                ->set('type', $input['type'])
                ->update('tbl_account_type');
        return TRUE;
    }

    public function updateLevel1Model($input) {
        $this->db
                ->where('id', $input['id'])
                ->set('account_id', $input['account_id'])
                ->set('level1_name', $input['level1_name'])
                ->update('tbl_level1');
        return TRUE;
    }

    public function updateLevel2Model($input) {
        $this->db->where('id', $input['id'])
                ->set('level1_id', $input['level1_id'])
                ->set('level2_name', $input['level2_name'])
                ->update('tbl_level2');
        return TRUE;
    }

    public function updateLevel3Model($input) {
        $this->db
                ->where('id', $input['id'])
                ->set('level2_id', $input['level2_id'])
                ->set('level3_name', $input['level3_name'])
                ->update('tbl_level3');
        return TRUE;
    }

    public function udpateVoucherType($input) {
        $this->db->where('id', $input['id'])
                ->set('voucher_type', $input['voucher_type'])
                ->set('details', $input['details'])
                ->update('tbl_vouchertype');
        return TRUE;
    }

    public function selectVoucherOne($id) {
        $result['voucher'] = array();
        $this->db->select('vc.voucher_id,vc.voucher_no,vc.voucher_date,vc.voucher_details,vc.voucher_no_form,vc.voucher_type_id')
                ->where('vc.voucher_id', $id)
                ->from('tbl_voucher as vc')
                ->where('vc.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        $result['voucher'] = $query->row();
        $this->db->select('ch.id,ch.note,ch.debit,ch.credit,lvl3.level3_name')
                ->where('ch.voucher_id', $id)
                ->join('tbl_level3 as lvl3', 'ch.level3_id=lvl3.id', 'left')
                ->from('tbl_voucherchild as ch');
        $query2 = $this->db->get();
        $result['child'] = $query2->result();

        return $result;
    }

    public function selectAllAccount($table, $order = '') {
        if ($order) {
            $this->db->order_by($order, 'ASC');
        }
        $this->db
                ->select('*')
                ->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectVoucherType() {
        $this->db
                ->select('id,voucher_type,details')
                ->from('tbl_vouchertype');
        $query = $this->db->get();
        return $query->result();
    }

    public function voucherViewList() {
        $this->db
                ->select('voucher_id,voucher_no,voucher_date,send_date,voucher_details')
                ->from('tbl_voucher')
                ->order_by('voucher_no', 'DESC')
                ->where('comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function updateVoucher($data, $voucher_id) {
        $this->db->where('voucher_id', $voucher_id)
                ->set($data)
                ->set('send_date', 'NOW()', FALSE)
                ->update('tbl_voucher');
        return TRUE;
    }

    public function updateVoucherChild($id, $debit, $credit) {
        $this->db->where('id', $id)
                ->set('debit', $debit)
                ->set('credit', $credit)
                ->set('send_date', 'NOW()', FALSE)
                ->update('tbl_voucherchild');
        return TRUE;
    }

    public function selectLevel3() {
        $this->db->select('lvl3.id,lvl3.level3_name')
                ->order_by('level3_name', 'ASC')
                ->join('tbl_level2 as lvl2', 'lvl3.level2_id=lvl2.id', 'left')
                ->join('tbl_level1 as lvl1', 'lvl2.level1_id=lvl1.id', 'left')
                ->join('tbl_account_type as ac', 'lvl1.account_id=ac.account_id', 'left')
                ->from('tbl_level3 as lvl3')
                ->where('lvl3.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function selectUsers() {
        $this->db->select('u.u_id,u.user_name,u.status,c.comp_name')
                ->join('tbl_company as c', 'u.comp_id=c.comp_id', 'left')
                ->from('tbl_users as u')
                ->where('u.comp_id', $this->session->userdata('comp_id'));
        $query = $this->db->get();
        return $query->result();
    }

    public function selectCompanyId($comp_name, $email, $cont_name) {
        $this->db->select('comp_id')
                ->from('tbl_company')
                ->where('comp_name', $comp_name)
                ->where('email', $email)
                ->where('cont_name', $cont_name)
                ->limit(1);
        $query = $this->db->get();
        if ($query->row()) {
            return $query->row()->comp_id;
        } else {
            return FALSE;
        }
    }

    public function deleteData($table, $fieldValue) {
        $this->db->delete($table, $fieldValue);
    }

//    public function checkUser($email, $password) {
//        $this->db->select('*');
//        $this->db->from('tbl_users');
//        $this->db->where('user_name', $email);
//        $this->db->where('password', $password);
//        $query = $this->db->get();
//        if ($query->num_rows() >= 1) {
//            return $query->row();
//        } else {
//            return FALSE;
//        }
//    }
//
//    public function selectInfo($field, $table) {
//        $this->db->select($field);
//        $this->db->from($table);
//        $query = $this->db->get();
//        if ($query) {
//            return $query->result();
//        }
//        return 'false';
//    }
//
}
