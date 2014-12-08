<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class student_model extends CI_Model
{
    public $table = 'student';

	public function get_status_list(){
		return $this->db->select('id, name')->get('status')->result();
	}public function get_class_list(){
		return $this->db->select('id, class_name')->get('class')->result();
	}
    public function get_all()
    {
		return $this->db->get($this->table)->result();		
    }
	public function get_page($size, $pageno){
		$this->db
			->limit($size, $pageno)
			->select('student.id,status.name as status_name,student.status,student.std_name,student.father_name,student.mother_name,class.class_name as class_class_name,student.class,student.roll_no,student.father_mobile_no,student.mather_mobile_no,student.address,student.create_date')
			
->join('status', 'student.status = status.id', 'left outer')
->join('class', 'student.class = class.id', 'left outer');
			
		$data=$this->db->get($this->table)->result();
		$total=$this->count_all();
		return array("data"=>$data, "total"=>$total);
	}
	public function get_page_where($size, $pageno, $params){
		$this->db->limit($size, $pageno)
		->select('student.id,status.name as status_name,student.status,student.std_name,student.father_name,student.mother_name,class.class_name as class_class_name,student.class,student.roll_no,student.father_mobile_no,student.mather_mobile_no,student.address,student.create_date')
		
->join('status', 'student.status = status.id', 'left outer')
->join('class', 'student.class = class.id', 'left outer');

		if(isset($params->status) && !empty($params->status)){
				$this->db->where("student.status",$params->status);
			}	
if(isset($params->std_name) && !empty($params->std_name)){
				$this->db->like("student.std_name",$params->std_name);
			}	
if(isset($params->father_name) && !empty($params->father_name)){
				$this->db->like("student.father_name",$params->father_name);
			}	
if(isset($params->mother_name) && !empty($params->mother_name)){
				$this->db->like("student.mother_name",$params->mother_name);
			}	
if(isset($params->class) && !empty($params->class)){
				$this->db->where("student.class",$params->class);
			}	
if(isset($params->roll_no) && !empty($params->roll_no)){
				$this->db->where("student.roll_no",$params->roll_no);
			}	
if(isset($params->father_mobile_no) && !empty($params->father_mobile_no)){
				$this->db->like("student.father_mobile_no",$params->father_mobile_no);
			}	
if(isset($params->mather_mobile_no) && !empty($params->mather_mobile_no)){
				$this->db->like("student.mather_mobile_no",$params->mather_mobile_no);
			}	
if(isset($params->address) && !empty($params->address)){
				$this->db->like("student.address",$params->address);
			}	

		$data=$this->db->get($this->table)->result();
		$total=$this->count_where($params);
		return array("data"=>$data, "total"=>$total);
	}
	public function count_where($params)
	{	
		$this->db
->join('status', 'student.status = status.id', 'left outer')
->join('class', 'student.class = class.id', 'left outer');

		if(isset($params->status) && !empty($params->status)){
				$this->db->where("student.status",$params->status);
			}	
if(isset($params->std_name) && !empty($params->std_name)){
				$this->db->like("student.std_name",$params->std_name);
			}	
if(isset($params->father_name) && !empty($params->father_name)){
				$this->db->like("student.father_name",$params->father_name);
			}	
if(isset($params->mother_name) && !empty($params->mother_name)){
				$this->db->like("student.mother_name",$params->mother_name);
			}	
if(isset($params->class) && !empty($params->class)){
				$this->db->where("student.class",$params->class);
			}	
if(isset($params->roll_no) && !empty($params->roll_no)){
				$this->db->where("student.roll_no",$params->roll_no);
			}	
if(isset($params->father_mobile_no) && !empty($params->father_mobile_no)){
				$this->db->like("student.father_mobile_no",$params->father_mobile_no);
			}	
if(isset($params->mather_mobile_no) && !empty($params->mather_mobile_no)){
				$this->db->like("student.mather_mobile_no",$params->mather_mobile_no);
			}	
if(isset($params->address) && !empty($params->address)){
				$this->db->like("student.address",$params->address);
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