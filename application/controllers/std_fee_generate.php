<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Std_Fee_Generate extends CI_controller {
	function __construct() {
		parent::__construct();		
	    $this->load->model('std_fee_generate_model','model');
	}
	public function index()
	{
		
		$data['month'] = date('F');
		$data['year'] = date('Y');

		$students = $this->model->get_active_std();
		//var_dump($students);
		
		foreach ($students as $student) {
		  $data['std_id'] = $student->std_id;
		  $data['fee_category_id'] = $student->fees_id;
		  $data['amount'] = $student->amount; 

		  // $class_id = $student->class_id;
		   var_dump($data);

		  $this->db->insert('std_fee_report', $data);

		}

		$students = $this->model->get_active_std_class();
		//var_dump($students); 
		foreach ($students as $student) {
		  $data['std_id'] = $student->id;
		  $data['fee_category_id'] = 1;
		  $data['amount'] = $student->amount; 
		  //var_dump($data);
		   
		  // $class_id = $student->class_id;
		  // var_dump($class_id);
		  $this->db->insert('std_fee_report', $data);
		}
		
		
	}


	public function save()
	{
		$data=$this->post();
		
	}

	public function delete()
	{
		
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