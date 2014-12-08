<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class std_report_model extends CI_Model
{
    public $table = 'std_fee_report';

	
    public function get_all()
    {
		$this->db->select('*');
    	$this->db->from('std_fee_report');
    	//$this->db->where('std_fees.status', 1);
    	$this->db->join('student', 'std_fee_report.std_id = student.id');
    	$this->db->join('fee_category', 'std_fee_report.fee_category_id = fee_category.id');
        $query = $this->db->get();
        return $query->result();		
    }
	
    public function count_all()
	{
		return $this->db			
			->count_all_results($this->table);
	}
    public function get($id)
    {
        $this->db->select('*');
        $this->db->from('std_fee_report');
        $this->db->where('std_fee_report.std_id', $id);
        $this->db->join('student', 'std_fee_report.std_id = student.id');
        $this->db->join('fee_category', 'std_fee_report.fee_category_id = fee_category.id');
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
        return $this->db->where('UserId', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('UserId', $id)->delete($this->table);
        return $this->db->affected_rows();
    }
	
}

?>