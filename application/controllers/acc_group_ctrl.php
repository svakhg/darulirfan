<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');
class acc_group_ctrl extends base_ctrl {
	function __construct() {
		parent::__construct();		
	    $this->load->model('acc_group_model','model');
	}
	public function index()
	{
		if($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'acc_group')){
			$data['fx']='return '.json_encode(array("insert"=>$this->auth->IsInsert==="1","update"=>$this->auth->IsUpdate==="1","delete"=>$this->auth->IsDelete==="1"));
			$data['read']=$this->auth->IsRead;
			$this->load->view('acc_group_view', $data);
		}
		else
		{
			$this->load->view('forbidden');
		}
	}
public function view () {
    $id = $this->uri->segment(3); 
    $this->load->view('acc_group/single', $id);
  }
  function show_acc_group() {
    header('Content-Type: application/json');
    $receive = json_decode(file_get_contents('php://input'));
    $result = (array) $receive;
    $is_valid = GUMP::is_valid($result, array(
          'startdate' => 'required',
          'group_id' => 'required',
          'enddate' => 'required'
      ));
      if($is_valid === true) {
        $data = $this->db->select('*')
                    ->where('group_id', $result['group_id'])
                    ->get('acc_ledger')->result();
        foreach($data as $key => $row) {
          	$transaction[$key] = $this->db->select('ledger_id, debit, credit')
          	        			->select_sum('debit')
        			->select_sum('credit')
        			->where(['ledger_id' => $row->id])->get('transaction'); 

          	if ($transaction[$key]->num_rows() > 0) {
          		$arr[$key] = $transaction[$key]->row(); 
          	} else {
          		$arr[$key] = null; 
          	}
          	// var_dump($arr); 
          	
        }
        $info = ['status' => 'success', 'message' => 'operation successful', 'data' => $arr];
        echo json_encode($info);
      }  else {
            $err = error_process($is_valid);
            foreach ($err as $value) {
                $row['message'] = $value;
            }
            $row['status'] = 'error';
            echo json_encode($row);
    }
}

	public function save()
	{
		$data=$this->post();
		$success=FALSE;
		$msg= 'You are not permitted.';
		$id=0;
		if(!isset($data->id))
		{
			if($this->auth->IsInsert){
				$id=$this->model->add($data);
				$msg='Data inserted successfully';
				$success=TRUE;
			}
					
		}
		else{
			if($this->auth->IsUpdate){
				$id=$this->model->update($data->id, $data);
				$success=TRUE;
				$msg='Data updated successfully';				
			}		
		}
		print json_encode(array('success'=>$success, 'msg'=>$msg, 'id'=>$id));
	}

	public function delete()
	{
		if($this->auth->IsDelete){
			$data=$this->post();
			print json_encode( array("success"=>TRUE,"msg"=>$this->model->delete($data->id)));
		}
		else{
			print json_encode( array("success"=>FALSE,"msg"=>"You are not permitted"));
		}
	}
	public function get_acc_group_type_list(){
		print  json_encode($this->model->get_acc_group_type_list());
	}
public function get_status_list(){
		print  json_encode($this->model->get_status_list());
	}
	
	public function get()
	{	
		$data=$this->post();
		print json_encode($this->model->get($data->id));
	}
	public function get_all()
	{		
		print json_encode($this->model->get_all());
	}
	public function get_page()
	{	
		$data=$this->post();
		print json_encode($this->model->get_page($data->size, $data->pageno));
	}
	public function get_page_where()
	{	
		$data=$this->post();
		print json_encode($this->model->get_page_where($data->size, $data->pageno, $data));
	}	
}

?>