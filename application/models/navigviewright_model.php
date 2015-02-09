<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class navigviewright_model extends CI_Model
{
    public $table = 'navigviewright';

	public function get_navigations_list(){
		return $this->db->select('NavigationId, NavName')->get('navigations')->result();
	}public function get_roles_list(){
		return $this->db->select('RoleId, RoleName')->get('roles')->result();
	}public function get_users_list(){
		return $this->db->select('UserId, UserName')->get('users')->result();
	}
    public function get_all()
    {
		return $this->db->get($this->table)->result();		
    }
	public function get_page($size, $pageno){
		$this->db
			->limit($size, $pageno)
			->select('navigviewright.NavgViewId,navigations.NavName as navigations_NavName,navigviewright.navigations,roles.RoleName as roles_RoleName,navigviewright.roles,users.UserName as users_UserName,navigviewright.users')
			
->join('navigations', 'navigviewright.navigations = navigations.NavigationId', 'left outer')
->join('roles', 'navigviewright.roles = roles.RoleId', 'left outer')
->join('users', 'navigviewright.users = users.UserId', 'left outer');
			
		$data=$this->db->get($this->table)->result();
		$total=$this->count_all();
		return array("data"=>$data, "total"=>$total);
	}
	public function get_page_where($size, $pageno, $params){
		$this->db->limit($size, $pageno)
		->select('navigviewright.NavgViewId,navigations.NavName as navigations_NavName,navigviewright.navigations,roles.RoleName as roles_RoleName,navigviewright.roles,users.UserName as users_UserName,navigviewright.users')
		
->join('navigations', 'navigviewright.navigations = navigations.NavigationId', 'left outer')
->join('roles', 'navigviewright.roles = roles.RoleId', 'left outer')
->join('users', 'navigviewright.users = users.UserId', 'left outer');

		if(isset($params->navigations) && !empty($params->navigations)){
				$this->db->where("navigviewright.navigations",$params->navigations);
			}	
if(isset($params->roles) && !empty($params->roles)){
				$this->db->where("navigviewright.roles",$params->roles);
			}	
if(isset($params->users) && !empty($params->users)){
				$this->db->where("navigviewright.users",$params->users);
			}	

		$data=$this->db->get($this->table)->result();
		$total=$this->count_where($params);
		return array("data"=>$data, "total"=>$total);
	}
	public function count_where($params)
	{	
		$this->db
->join('navigations', 'navigviewright.navigations = navigations.NavigationId', 'left outer')
->join('roles', 'navigviewright.roles = roles.RoleId', 'left outer')
->join('users', 'navigviewright.users = users.UserId', 'left outer');

		if(isset($params->navigations) && !empty($params->navigations)){
				$this->db->where("navigviewright.navigations",$params->navigations);
			}	
if(isset($params->roles) && !empty($params->roles)){
				$this->db->where("navigviewright.roles",$params->roles);
			}	
if(isset($params->users) && !empty($params->users)){
				$this->db->where("navigviewright.users",$params->users);
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
        return $this->db->where('NavgViewId', $id)->get($this->table)->row();
    }
  
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        return $this->db->where('NavgViewId', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('NavgViewId', $id)->delete($this->table);
        return $this->db->affected_rows();
    }
	
}

?>