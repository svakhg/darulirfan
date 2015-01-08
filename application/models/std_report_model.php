<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class std_report_model extends CI_Model {

    public $table = 'std_fee_report';

    public function get_all() {
        $query = $this->db->select('*')
                ->from('std_fee_report')
                ->group_by('std_fee_report.std_id')
                ->select_sum('std_fee_report.amount')
                ->where(['std_fee_report.is_active' => 1])
                ->join('student', 'std_fee_report.std_id = student.id')
                ->join('fee_category', 'std_fee_report.fee_category_id = fee_category.id')
                ->join('acc_ledger', 'acc_ledger.id = fee_category.id')
                ->get();

        return $query->result();
    }

    public function get($id) {
        $query = $this->db->select('student.id as student_id, std_fee_report.*, acc_ledger.id as acc_ledger_id, acc_ledger.name')
                ->from('std_fee_report')
                ->where(['std_fee_report.std_id' => $id, 'std_fee_report.is_active' => 1])
                ->join('student', 'std_fee_report.std_id = student.id')
//                ->join('fee_category', 'std_fee_report.fee_category_id = fee_category.id')
                ->join('acc_ledger', 'acc_ledger.id = std_fee_report.fee_category_id')
                ->get();
        if (!$query->num_rows() > 0) {
            return false;
        } else {
            return $query->result();
        }
    }

    public function get_single_student($id) {
        $query = $this->db->select('*')
                ->get_where('student', ['id' => $id]);
        if (!$query->num_rows() > 0) {
            return false;
        } else {
            return $query->row();
        }
    }

    public function get_total_fees($id) {
        $query = $this->db->select_sum('amount')
                ->get_where('std_fee_report', ['std_id' => $id, 'is_active' => 1]);
        if (!$query->num_rows() > 0) {
            return false;
        } else {
            return $query->row();
        }
    }

}

?>