<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./application/libraries/base_ctrl.php');

class Voucher_ctrl extends base_ctrl {
public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function savepdf() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = $_GET['type'];
            if ($type == 'save') {
                $fileName = $_POST['fileName'];
                $contentType = $_POST['contentType'];
                $base64 = $_POST['base64'];

                $data = base64_decode($base64);
                header('Content-Type:' . $contentType);
                header('Content-Length:' . strlen($data));
                header('Content-Disposition: attachment; filename=' . $fileName);

                echo $data;
            }
        }
    }

    public function saveexcel() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = $_GET['type'];
            if ($type == 'save') {
                $fileName = $_POST['fileName'];
                $contentType = $_POST['contentType'];
                $base64 = $_POST['base64'];

                $data = base64_decode($base64);

                header('Content-Type:' . $contentType);
                header('Content-Length:' . strlen($data));
                header('Content-Disposition: attachment; filename=' . $fileName);

                echo $data;
            }
        }
    }

    public function index() {
//        var_dump($this->oisacl->check_hasRole('administrator')); exit; 
//        var_dump($this->oisacl->check_has('student')); exit; 
//        var_dump($this->oisacl->check_isAllowed(33, 'student')); exit; 
        $this->load->view('voucher');
    }
}
