<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');
class fee_category_ctrl extends base_ctrl {
	function __construct() {
		parent::__construct();		
	    $this->load->model('fee_category_model','model');
	}
	function process() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));
            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('id', 'fee_category', 'mother_fee_category', 'description', 'fee_type', 'residential', 'non_residential');

            switch ($type) {
                case 'read':
                $result = $result->read('fees_category', $columns, $request);
                break;
            }
            echo json_encode($result, JSON_NUMERIC_CHECK);

            exit;
        }
    }
    public function edit() {
        $this->load->view('fees_category/edit'); 
    }
    public function add() {
        $this->load->view('fees_category/edit'); 
    }

    public function index() {
        $this->load->view('fees_category/list');
    }
}

?>