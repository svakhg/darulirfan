<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class acc_group_model extends CI_Model
{
    public $table = 'acc_group';

	public function get_acc_group_type_list(){
		return $this->db->select('id, name')->get('acc_group_type')->result();
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
			->select('acc_group.id,acc_group.Group_Name,acc_group_type.name as acc_group_type_name,acc_group.Group_Type,status.name as status_name,acc_group.Group_Status,acc_group.create_date,acc_group.modified_date')
			
->join('acc_group_type', 'acc_group.Group_Type = acc_group_type.id', 'left outer')
->join('status', 'acc_group.Group_Status = status.id', 'left outer');
			
		$data=$this->db->get($this->table)->result();
		$total=$this->count_all();
		return array("data"=>$data, "total"=>$total);
	}
	public function get_page_where($size, $pageno, $params){
		$this->db->limit($size, $pageno)
		->select('acc_group.id,acc_group.Group_Name,acc_group_type.name as acc_group_type_name,acc_group.Group_Type,status.name as status_name,acc_group.Group_Status,acc_group.create_date,acc_group.modified_date')
		
->join('acc_group_type', 'acc_group.Group_Type = acc_group_type.id', 'left outer')
->join('status', 'acc_group.Group_Status = status.id', 'left outer');

		if(isset($params->Group_Name) && !empty($params->Group_Name)){
				$this->db->like("acc_group.Group_Name",$params->Group_Name);
			}	
if(isset($params->Group_Type) && !empty($params->Group_Type)){
				$this->db->where("acc_group.Group_Type",$params->Group_Type);
			}	
if(isset($params->Group_Status) && !empty($params->Group_Status)){
				$this->db->where("acc_group.Group_Status",$params->Group_Status);
			}	

		$data=$this->db->get($this->table)->result();
		$total=$this->count_where($params);
		return array("data"=>$data, "total"=>$total);
	}
	public function count_where($params)
	{	
		$this->db
->join('acc_group_type', 'acc_group.Group_Type = acc_group_type.id', 'left outer')
->join('status', 'acc_group.Group_Status = status.id', 'left outer');

		if(isset($params->Group_Name) && !empty($params->Group_Name)){
				$this->db->like("acc_group.Group_Name",$params->Group_Name);
			}	
if(isset($params->Group_Type) && !empty($params->Group_Type)){
				$this->db->where("acc_group.Group_Type",$params->Group_Type);
			}	
if(isset($params->Group_Status) && !empty($params->Group_Status)){
				$this->db->where("acc_group.Group_Status",$params->Group_Status);
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