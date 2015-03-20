<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class std_report_model extends CI_Model {

    public function add($data) {
        unset($data['duty_type']);
        $ledger['ledger_id'] = $data['std_id']; 
        $ledger['name'] = $data['std_name']; 
        $ledger['group_id'] = 7;//student fees 
        $ledger['is_student'] = 1; //yes 
        $ledger['user_id'] = $data['user_id'];         
        
        $this->db->insert('acc_ledger', $ledger);
        $this->db->insert('student', $data);
        return $this->db->insert_id();
    }

    public function update($data) {
        unset($data['duty_type']);
        $this->db->where(['id' => $data['id']])
                ->update('student', $data);
        return $this->db->insert_id();

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


    public function check_duplicate_roll($data){
        if ($data['duty_type'] === "update") {
            $this->db->where(["std_id !=" => $data['std_id']]); 
        } 
        $this->db->where(['class_id' => $data['class_id'], "roll_no" => $data['roll_no']]);
        $query =  $this->db->get('student'); 

        if ($query->num_rows() > 0){
            return true; 
        } else {
            return false; 
        }
    }


    public function get_fees($id) {

        $query = $this->db->select('student.std_id as student_id, std_fee_report.id, std_fee_report.amount, std_fee_report.created, acc_ledger.id as acc_ledger_id, acc_ledger.name')
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

    public function get_single_student($id) {
        $query = $this->db->select('*')
        ->get_where('student', ['std_id' => $id]);
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