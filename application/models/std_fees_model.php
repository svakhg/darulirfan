<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class std_fees_model extends CI_Model
{
    public $table = 'std_fees';

	public function get_student_list(){
		return $this->db->select('id, std_name')->get('student')->result();
	}public function get_fee_category_list(){
		return $this->db->select('id, name')->get('fee_category')->result();
	}public function get_status_list(){
		return $this->db->select('id, name')->get('status')->result();
	}
    public function get_all()
    {
		return $this->db->get($this->table)->result();		
    }
	public function get_page($size, $pageno){
		$this->db
			->limit($size, $pageno)
			->select('std_fees.id,student.std_name as student_std_name,std_fees.std_id,fee_category.name as fee_category_name,std_fees.fees_id,status.name as status_name,std_fees.status,std_fees.created,std_fees.user_id,std_fees.modified')
			
->join('student', 'std_fees.std_id = student.id', 'left outer')
->join('fee_category', 'std_fees.fees_id = fee_category.id', 'left outer')
->join('status', 'std_fees.status = status.id', 'left outer');
			
		$data=$this->db->get($this->table)->result();
		$total=$this->count_all();
		return array("data"=>$data, "total"=>$total);
	}
	public function get_page_where($size, $pageno, $params){
		$this->db->limit($size, $pageno)
		->select('std_fees.id,student.std_name as student_std_name,std_fees.std_id,fee_category.name as fee_category_name,std_fees.fees_id,status.name as status_name,std_fees.status,std_fees.created,std_fees.user_id,std_fees.modified')
		
->join('student', 'std_fees.std_id = student.id', 'left outer')
->join('fee_category', 'std_fees.fees_id = fee_category.id', 'left outer')
->join('status', 'std_fees.status = status.id', 'left outer');

		if(isset($params->std_id) && !empty($params->std_id)){
				$this->db->where("std_fees.std_id",$params->std_id);
			}	
if(isset($params->fees_id) && !empty($params->fees_id)){
				$this->db->where("std_fees.fees_id",$params->fees_id);
			}	
if(isset($params->status) && !empty($params->status)){
				$this->db->where("std_fees.status",$params->status);
			}	

		$data=$this->db->get($this->table)->result();
		$total=$this->count_where($params);
		return array("data"=>$data, "total"=>$total);
	}
	public function count_where($params)
	{	
		$this->db
->join('student', 'std_fees.std_id = student.id', 'left outer')
->join('fee_category', 'std_fees.fees_id = fee_category.id', 'left outer')
->join('status', 'std_fees.status = status.id', 'left outer');

		if(isset($params->std_id) && !empty($params->std_id)){
				$this->db->where("std_fees.std_id",$params->std_id);
			}	
if(isset($params->fees_id) && !empty($params->fees_id)){
				$this->db->where("std_fees.fees_id",$params->fees_id);
			}	
if(isset($params->status) && !empty($params->status)){
				$this->db->where("std_fees.status",$params->status);
			}	

		return $this->db->count_all_results($this->table);
	}
    public function count_all()
	{
		return $this->db			
			->count_all_results($this->table);
	}
    public function get($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
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