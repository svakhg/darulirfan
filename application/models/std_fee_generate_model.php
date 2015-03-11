<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class std_fee_generate_model extends CI_Model
{
    public $table = 'std_fee_report';
    public function get_sdf_active_std()
    {	
    	$this->db->select('*');
    	$this->db->from('student');
    	$this->db->where('std_fees.status', 1);
    	$this->db->join('std_fees', 'student.id = std_fees.std_id');
    	$this->db->join('fees', 'std_fees.fees_id = fees.fee_category_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_active_std()
    {   
        $this->db->select('std_id, status, residential_status,concession_amount');
        $this->db->from('student');
        $this->db->where('student.status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_std_by_type($data)
    {   
        $this->db->select('std_id, status, residential_status,concession_amount');
        $this->db->from('student');
        $this->db->where(['student.status' => 1, 'residential_status' => $data['std_type']]);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_monthly_fees()
    {   
        $this->db->select('*');
        $this->db->from('fees_category');
        $this->db->where('fees_category.status', 1);
        $this->db->where('fees_category.fee_type', 1);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_fees($data)
    {   
        $this->db->select('*');
        $this->db->from('fees_category');
        $this->db->where('fees_category.status', 1);
        $this->db->where('fees_category.id', $data['fees']);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_active_std_class()
    {	
    	$this->db->select('*');
    	$this->db->from('student');
    	$this->db->join('fees', 'fees.class_id = student.class');
        $query = $this->db->get();
        return $query->result();
    }
    public function check_is_already_generate($data){
        $query = $this->db->select('*')
                ->where((isset($data['fee_category_id']) && !empty($data['fee_category_id'])) ? ['fee_category_id' => $data['fee_category_id']] : [])
                ->where((isset($data['month']) && !empty($data['month'])) ? ['month' => $data['month']] : [])
                ->get_where('std_fee_report', ['year' => $data['year']]); 
        if ($query->num_rows() > 0) {
            return FALSE; 
        } else {
            return TRUE; 
        }
    }
}

?>