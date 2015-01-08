<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class std_fee_generate_model extends CI_Model
{
    public $table = 'std_fee_report';
    public function get_active_std()
    {	
    	$this->db->select('*');
    	$this->db->from('student');
    	$this->db->where('std_fees.status', 1);
    	$this->db->join('std_fees', 'student.id = std_fees.std_id');
    	$this->db->join('fees', 'std_fees.fees_id = fees.fee_category_id');
        $query = $this->db->get();
        return $query->result();
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
                ->get_where('std_fee_report', ['month' => $data['month']]); 
        if ($query->num_rows() > 0) {
            return FALSE; 
        } else {
            return TRUE; 
        }
    }
}

?>