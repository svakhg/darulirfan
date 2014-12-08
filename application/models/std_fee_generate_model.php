<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class std_fee_generate_model extends CI_Model
{
    public $table = 'std_fee_report';

	
    public function get_all()
    {
		return $this->db->get($this->table)->result();		
    }
	
    public function count_all()
	{
		return $this->db			
			->count_all_results($this->table);
	}
    public function get($id)
    {
        $query = $this->db->where('id', $id)->get($this->table);
        return $query->result();
    }

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
    	//$this->db->where('std_fees.status', 1);
    	//$this->db->join('std_fees', 'student.id = std_fees.std_id');
    	$this->db->join('fees', 'fees.class_id = student.class');
        $query = $this->db->get();
        return $query->result();
    }
  
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->table);
        return $this->db->affected_rows();
    }
	
}

?>