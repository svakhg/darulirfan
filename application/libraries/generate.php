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

    function student_id($gender = null) {
        $s = ($gender == 1) ? 'M' : 'F';  
        $year = date('y'); 
        $id = $s . $year;
            $query = $this->db->select('std_id')
                    ->like('std_id', $id)
                    ->order_by('std_id', 'DESC')
                    ->get('student');
            if ($query->num_rows() > 0) {
                $student_id = $query->row()->std_id;
            } else {
                //if student table is empty start counting from first 0000
                $student_id = 000;
            }
            // var_dump($student_id); exit; 
            //plus 1 
            //add zero if needed
            $std_id = $id . sprintf("%03s", substr($student_id, -3) + 1);

        return $std_id;
    }

    function employee_id() {
        $s = 'E';  
        $year = date('y'); 
        $id = $s . $year;
            $query = $this->db->select('emp_id')
                    ->like('emp_id', $id)
                    ->order_by('emp_id', 'DESC')
                    ->get('employee');
            if ($query->num_rows() > 0) {
                $emp_id = $query->row()->emp_id;
            } else {
                //if employee table is empty start counting from first 0000
                $emp_id = 000;
            }
            //plus 1 
            //add zero if needed
            $employee_id = $id . sprintf("%03s", substr($emp_id, -3) + 1);

        return $employee_id;
    }
    //@param : month, year
    function salary_sheet($data) {
        $status = 'error'; 
        $message = 'Please give me Month & Year'; 
        if (array_key_exists('month' ,$data)) {
            //get active employee list
            $query = $this->db->select('emp_id, emp_name, salary_amount')
                    ->order_by('emp_id', 'DESC')
                    ->get_where('employee', ['status' => 1]);
            if ($query->num_rows() > 0) {
                $emp_data = $query->result();
                //insert foreach employee into employee_salary_report table as unpaid salary
                foreach ($emp_data as $key => $value) {
                    $info[$key]['emp_id'] = $value->emp_id; 
                    $info[$key]['emp_name'] = $value->emp_name; 
                    $info[$key]['month'] = $data['month']; 
                    $info[$key]['year'] = $data['year']; 
                    $info[$key]['status'] = 0; //unpaid 
                    $info[$key]['amount'] = $value->salary_amount; 
                    $info[$key]['remarks'] = ''; 
                    $this->db->insert('employee_salary_report', $info[$key]); 
                }
                //return success 
                $status = 'success'; 
                $message = 'Salary Sheet Generated Successfully'; 
            } else {
                $status = 'error'; 
                $message = 'No active Employee Found'; 
            }
        } else {
            return ['status' => $status, 'message' => $message]; 
        }
        
        //return
        return ['status' => $status, 'message' => $message]; 
    }

}
