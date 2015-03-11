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
                ->join('fees_category', 'std_fee_report.fee_category_id = fees_category.id')
//                ->join('acc_ledger', 'acc_ledger.ledger_id = fees_category.id')
                ->get();

        return $query->result();
    }

    public function approved_salary_sheet($data) {
        $query = $this->db->select('*')
                ->get_where('employee_salary_report', ['month' => $data['month'], 'year' => $data['year'], 'status' => 0]);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $info['status'] = 1;
                // var_dump($value->emp_id); 
                $this->db->where('id', $value->id)->update('employee_salary_report', $info);
            }
            return ['status' => 'success', 'message' => 'Salary paid successfully'];
        } else {
            return ['status' => "errror", 'message' => "salary already paid"];
        }
    }

    public function show_salary_sheet($data) {
        $query = $this->db->select('*')
                ->get_where('employee_salary_report', ['month' => $data['month'], 'year' => $data['year']]);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                // var_dump($value->status); 
                if ($value->status == 0) {
                    $editable = true;
                } else {
                    $editable = false;
                }
                # code...
            }
            return ['editable' => $editable, 'data' => $query->result(), 'total' => $query->num_rows()];
        } else {
            return false;
        }
    }

    public function add($data) {
        unset($data['duty_type']);

        $ledger['ledger_id'] = $data['emp_id'];
        $ledger['name'] = $data['emp_name'];
        $ledger['group_id'] = 5; //Salary and Bonus in acc_group table
        $ledger['is_employee'] = 1; //yes 
        $ledger['user_id'] = $data['user_id'];

        $this->db->insert('acc_ledger', $ledger);
        $this->db->insert('employee', $data);
        return $this->db->insert_id();
    }

    public function update($data) {
        unset($data['duty_type']);
        $this->db->where(['id' => $data['id']])
                ->update('employee', $data);
        return $this->db->insert_id();
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

}

?>