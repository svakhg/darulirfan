<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fees_model extends CI_Model
{
    public $table = 'fees';

	public function get_acc_ledger_list(){
		return $this->db->select('id, name')->get('acc_ledger')->result();
	}public function get_class_list(){
		return $this->db->select('id, class_name')->get('class')->result();
	}public function get_status_list(){
		return $this->db->select('id, yesno')->get('status')->result();
	}
    public function get_all()
    {
		return $this->db->get($this->table)->result();		
    }
	public function get_page($size, $pageno){
		$this->db
			->limit($size, $pageno)
			->select('fees.id,acc_ledger.name as acc_ledger_name,fees.fee_category_id,class.class_name as class_class_name,fees.class_id,fees.amount,status.yesno as status_yesno,fees.is_current,fees.created,fees.modified,fees.user_id')
			
->join('acc_ledger', 'fees.fee_category_id = acc_ledger.id', 'left outer')
->join('class', 'fees.class_id = class.id', 'left outer')
->join('status', 'fees.is_current = status.id', 'left outer');
			
		$data=$this->db->get($this->table)->result();
		$total=$this->count_all();
		return array("data"=>$data, "total"=>$total);
	}
	public function get_page_where($size, $pageno, $params){
		$this->db->limit($size, $pageno)
		->select('fees.id,acc_ledger.name as acc_ledger_name,fees.fee_category_id,class.class_name as class_class_name,fees.class_id,fees.amount,status.yesno as status_yesno,fees.is_current,fees.created,fees.modified,fees.user_id')
		
->join('acc_ledger', 'fees.fee_category_id = acc_ledger.id', 'left outer')
->join('class', 'fees.class_id = class.id', 'left outer')
->join('status', 'fees.is_current = status.id', 'left outer');

		if(isset($params->fee_category_id) && !empty($params->fee_category_id)){
				$this->db->where("fees.fee_category_id",$params->fee_category_id);
			}	
if(isset($params->class_id) && !empty($params->class_id)){
				$this->db->where("fees.class_id",$params->class_id);
			}	
if(isset($params->amount) && !empty($params->amount)){
				$this->db->where("fees.amount",$params->amount);
			}	
if(isset($params->is_current) && !empty($params->is_current)){
				$this->db->where("fees.is_current",$params->is_current);
			}	

		$data=$this->db->get($this->table)->result();
		$total=$this->count_where($params);
		return array("data"=>$data, "total"=>$total);
	}
	public function count_where($params)
	{	
		$this->db
->join('acc_ledger', 'fees.fee_category_id = acc_ledger.id', 'left outer')
->join('class', 'fees.class_id = class.id', 'left outer')
->join('status', 'fees.is_current = status.id', 'left outer');

		if(isset($params->fee_category_id) && !empty($params->fee_category_id)){
				$this->db->where("fees.fee_category_id",$params->fee_category_id);
			}	
if(isset($params->class_id) && !empty($params->class_id)){
				$this->db->where("fees.class_id",$params->class_id);
			}	
if(isset($params->amount) && !empty($params->amount)){
				$this->db->where("fees.amount",$params->amount);
			}	
if(isset($params->is_current) && !empty($params->is_current)){
				$this->db->where("fees.is_current",$params->is_current);
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