<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class roles_model extends CI_Model
{
    public $table = 'roles';

	public function get_Navigations_list(){
		return $this->db->select('NavigationId, NavName')->get('Navigations')->result();
	}
    public function get_all()
    {
		return $this->db->get($this->table)->result();		
    }
	public function get_page($size, $pageno){
		$this->db
			->limit($size, $pageno)
			->select('roles.RoleId,roles.RoleName,Navigations.NavName as Navigations_NavName,roles.NavigationId,roles.IsRead,roles.IsInsert,roles.IsUpdate,roles.IsDelete')
			
->join('Navigations', 'roles.NavigationId = Navigations.NavigationId', 'left outer');
			
		$data=$this->db->get($this->table)->result();
		$total=$this->count_all();
		return array("data"=>$data, "total"=>$total);
	}
	public function get_page_where($size, $pageno, $params){
		$this->db->limit($size, $pageno)
		->select('roles.RoleId,roles.RoleName,Navigations.NavName as Navigations_NavName,roles.NavigationId,roles.IsRead,roles.IsInsert,roles.IsUpdate,roles.IsDelete')
		
->join('Navigations', 'roles.NavigationId = Navigations.NavigationId', 'left outer');

		if(isset($params->RoleName) && !empty($params->RoleName)){
				$this->db->like("roles.RoleName",$params->RoleName);
			}	
if(isset($params->NavigationId) && !empty($params->NavigationId)){
				$this->db->where("roles.NavigationId",$params->NavigationId);
			}	

		$data=$this->db->get($this->table)->result();
		$total=$this->count_where($params);
		return array("data"=>$data, "total"=>$total);
	}
	public function count_where($params)
	{	
		$this->db
->join('Navigations', 'roles.NavigationId = Navigations.NavigationId', 'left outer');

		if(isset($params->RoleName) && !empty($params->RoleName)){
				$this->db->like("roles.RoleName",$params->RoleName);
			}	
if(isset($params->NavigationId) && !empty($params->NavigationId)){
				$this->db->where("roles.NavigationId",$params->NavigationId);
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
        return $this->db->where('RoleId', $id)->get($this->table)->row();
    }
  
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        return $this->db->where('RoleId', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('RoleId', $id)->delete($this->table);
        return $this->db->affected_rows();
    }
	
}

?>