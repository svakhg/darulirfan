<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employee_model extends CI_Model
{
    public $table = 'employee';

	public function get_designation_list(){
		return $this->db->select('id, Designation_Name')->get('designation')->result();
	}
    public function get_all()
    {
		return $this->db->get($this->table)->result();		
    }
	public function get_page($size, $pageno){
		$this->db
			->limit($size, $pageno)
			->select('employee.id,employee.name,employee.father_name,employee.mother_name,designation.Designation_Name as designation_Designation_Name,employee.designation,employee.contact_no,employee.address,employee.created_date')
			
->join('designation', 'employee.designation = designation.id', 'left outer');
			
		$data=$this->db->get($this->table)->result();
		$total=$this->count_all();
		return array("data"=>$data, "total"=>$total);
	}
	public function get_page_where($size, $pageno, $params){
		$this->db->limit($size, $pageno)
		->select('employee.id,employee.name,employee.father_name,employee.mother_name,designation.Designation_Name as designation_Designation_Name,employee.designation,employee.contact_no,employee.address,employee.created_date')
		
->join('designation', 'employee.designation = designation.id', 'left outer');

		if(isset($params->name) && !empty($params->name)){
				$this->db->like("employee.name",$params->name);
			}	
if(isset($params->father_name) && !empty($params->father_name)){
				$this->db->like("employee.father_name",$params->father_name);
			}	
if(isset($params->mother_name) && !empty($params->mother_name)){
				$this->db->like("employee.mother_name",$params->mother_name);
			}	
if(isset($params->designation) && !empty($params->designation)){
				$this->db->where("employee.designation",$params->designation);
			}	
if(isset($params->contact_no) && !empty($params->contact_no)){
				$this->db->like("employee.contact_no",$params->contact_no);
			}	
if(isset($params->address) && !empty($params->address)){
				$this->db->like("employee.address",$params->address);
			}	

		$data=$this->db->get($this->table)->result();
		$total=$this->count_where($params);
		return array("data"=>$data, "total"=>$total);
	}
	public function count_where($params)
	{	
		$this->db
->join('designation', 'employee.designation = designation.id', 'left outer');

		if(isset($params->name) && !empty($params->name)){
				$this->db->like("employee.name",$params->name);
			}	
if(isset($params->father_name) && !empty($params->father_name)){
				$this->db->like("employee.father_name",$params->father_name);
			}	
if(isset($params->mother_name) && !empty($params->mother_name)){
				$this->db->like("employee.mother_name",$params->mother_name);
			}	
if(isset($params->designation) && !empty($params->designation)){
				$this->db->where("employee.designation",$params->designation);
			}	
if(isset($params->contact_no) && !empty($params->contact_no)){
				$this->db->like("employee.contact_no",$params->contact_no);
			}	
if(isset($params->address) && !empty($params->address)){
				$this->db->like("employee.address",$params->address);
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