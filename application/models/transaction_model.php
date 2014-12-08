<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaction_model extends CI_Model
{
    public $table = 'transaction';

	public function get_payment_type_list(){
		return $this->db->select('id, name')->get('payment_type')->result();
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
			->select('transaction.id,payment_type.name as payment_type_name,transaction.payment_type,transaction.modified_date,status.name as status_name,transaction.status,transaction.create_date,transaction.user_id,transaction.customer_id,transaction.cr_amount,transaction.dr_amount,transaction.acc_to,transaction.acc_from,transaction.description,transaction.approved_by,transaction.approval,transaction.voucher_name,transaction.total')
			
->join('payment_type', 'transaction.payment_type = payment_type.id', 'left outer')
->join('status', 'transaction.status = status.id', 'left outer');
			
		$data=$this->db->get($this->table)->result();
		$total=$this->count_all();
		return array("data"=>$data, "total"=>$total);
	}
	public function get_page_where($size, $pageno, $params){
		$this->db->limit($size, $pageno)
		->select('transaction.id,payment_type.name as payment_type_name,transaction.payment_type,transaction.modified_date,status.name as status_name,transaction.status,transaction.create_date,transaction.user_id,transaction.customer_id,transaction.cr_amount,transaction.dr_amount,transaction.acc_to,transaction.acc_from,transaction.description,transaction.approved_by,transaction.approval,transaction.voucher_name,transaction.total')
		
->join('payment_type', 'transaction.payment_type = payment_type.id', 'left outer')
->join('status', 'transaction.status = status.id', 'left outer');

		if(isset($params->payment_type) && !empty($params->payment_type)){
				$this->db->where("transaction.payment_type",$params->payment_type);
			}	
if(isset($params->status) && !empty($params->status)){
				$this->db->where("transaction.status",$params->status);
			}	
if(isset($params->create_date) && !empty($params->create_date)){
				$this->db->where("transaction.create_date",$params->create_date);
			}	
if(isset($params->user_id) && !empty($params->user_id)){
				$this->db->where("transaction.user_id",$params->user_id);
			}	
if(isset($params->customer_id) && !empty($params->customer_id)){
				$this->db->where("transaction.customer_id",$params->customer_id);
			}	
if(isset($params->cr_amount) && !empty($params->cr_amount)){
				$this->db->where("transaction.cr_amount",$params->cr_amount);
			}	
if(isset($params->dr_amount) && !empty($params->dr_amount)){
				$this->db->where("transaction.dr_amount",$params->dr_amount);
			}	
if(isset($params->acc_to) && !empty($params->acc_to)){
				$this->db->where("transaction.acc_to",$params->acc_to);
			}	
if(isset($params->acc_from) && !empty($params->acc_from)){
				$this->db->where("transaction.acc_from",$params->acc_from);
			}	
if(isset($params->approved_by) && !empty($params->approved_by)){
				$this->db->where("transaction.approved_by",$params->approved_by);
			}	
if(isset($params->approval) && !empty($params->approval)){
				$this->db->where("transaction.approval",$params->approval);
			}	
if(isset($params->voucher_name) && !empty($params->voucher_name)){
				$this->db->where("transaction.voucher_name",$params->voucher_name);
			}	
if(isset($params->total) && !empty($params->total)){
				$this->db->where("transaction.total",$params->total);
			}	

		$data=$this->db->get($this->table)->result();
		$total=$this->count_where($params);
		return array("data"=>$data, "total"=>$total);
	}
	public function count_where($params)
	{	
		$this->db
->join('payment_type', 'transaction.payment_type = payment_type.id', 'left outer')
->join('status', 'transaction.status = status.id', 'left outer');

		if(isset($params->payment_type) && !empty($params->payment_type)){
				$this->db->where("transaction.payment_type",$params->payment_type);
			}	
if(isset($params->status) && !empty($params->status)){
				$this->db->where("transaction.status",$params->status);
			}	
if(isset($params->create_date) && !empty($params->create_date)){
				$this->db->where("transaction.create_date",$params->create_date);
			}	
if(isset($params->user_id) && !empty($params->user_id)){
				$this->db->where("transaction.user_id",$params->user_id);
			}	
if(isset($params->customer_id) && !empty($params->customer_id)){
				$this->db->where("transaction.customer_id",$params->customer_id);
			}	
if(isset($params->cr_amount) && !empty($params->cr_amount)){
				$this->db->where("transaction.cr_amount",$params->cr_amount);
			}	
if(isset($params->dr_amount) && !empty($params->dr_amount)){
				$this->db->where("transaction.dr_amount",$params->dr_amount);
			}	
if(isset($params->acc_to) && !empty($params->acc_to)){
				$this->db->where("transaction.acc_to",$params->acc_to);
			}	
if(isset($params->acc_from) && !empty($params->acc_from)){
				$this->db->where("transaction.acc_from",$params->acc_from);
			}	
if(isset($params->approved_by) && !empty($params->approved_by)){
				$this->db->where("transaction.approved_by",$params->approved_by);
			}	
if(isset($params->approval) && !empty($params->approval)){
				$this->db->where("transaction.approval",$params->approval);
			}	
if(isset($params->voucher_name) && !empty($params->voucher_name)){
				$this->db->where("transaction.voucher_name",$params->voucher_name);
			}	
if(isset($params->total) && !empty($params->total)){
				$this->db->where("transaction.total",$params->total);
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