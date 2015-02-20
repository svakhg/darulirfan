<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class employee_model extends CI_Model {

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

    public function show_salary_sheet($data) {
         $query = $this->db->select('*')
                ->get_where('employee_salary_report', ['month' => $data['month'], 'year' => $data['year']]);
        if ($query->num_rows() > 0) {
            return ['data' => $query->result(), 'total' => $query->num_rows()];  
        } else {
            return false;
        }
    }
    public function add($data){
        unset($data['duty_type']);
        $this->db->insert('employee', $data); 
        return $this->db->insert_id(); 
    }

    public function update($data){
            unset($data['duty_type']);
        $this->db->where(['id' => $data['id']])
            ->update('employee', $data); 
        return $this->db->insert_id(); 
    }
    public function get_fees($id) {
        $query = $this->db->select('student.std_id as student_id, std_fee_report.amount, std_fee_report.created, acc_ledger.id as acc_ledger_id, acc_ledger.name')
                ->from('std_fee_report')
                ->where(['std_fee_report.std_id' => $id, 'std_fee_report.is_active' => 1])
                ->join('student', 'std_fee_report.std_id = student.std_id')
                ->join('acc_ledger', 'acc_ledger.id = std_fee_report.fee_category_id')
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_single_emp($id) {
        $query = $this->db->select('*')
                ->get_where('employee', ['emp_id' => $id]);
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