<?php

//session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author nibid
 */
//include_once (dirname(__FILE__) . "/auth.php");

class Admin extends CI_Controller {

//put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login.php', 'refresh');
        }
    }

    public function index() {
        $data['financialYear'] = $this->admin_model->selectFinancialYear();
        $data['targetPage'] = $this->load->view('home_content', $data, true);
        $this->load->view('index', $data);
    }

    public function home() {
        $this->index();
    }

    public function accountType($mode = '', $id = '') {
        $data['selectAccountType'] = $this->admin_model->selectAllAccount('tbl_account_type');
        if ($id != '') {
            $data['selectRowAccount'] = $this->admin_model->selectRowById('account_id,type', 'tbl_account_type', 'account_id', $id);
            $data['mode'] = $mode;
        }

        $data['targetPage'] = $this->load->view('account_type', $data, true);
        $this->load->view('index', $data);
    }

    public function financialYear() {
        $data['targetPage'] = $this->load->view('financialyear', '', true);
        $this->load->view('index', $data);
    }

    public function financialYearSave() {
        $input['fy_begin_date'] = $this->input->get_post('fy_begin_date');
        $input['fy_end_date'] = $this->input->get_post('fy_end_date');
       If($this->admin_model->updateFY($input)){
           echo 'Success';
       }
    }

    public function SaveAccountType() {
        $input['type'] = $this->input->post('accout_type');
        $this->admin_model->insertData('tbl_account_type', $input);
        $msg['msg'] = '<font color="green">Successfully Inserted.</font>';
        $this->session->set_userdata($msg);
        $this->accountType();
    }

    public function level1($mode = '', $id = '') {
        $data['accountType'] = $this->admin_model->selectAllAccount('tbl_account_type', 'type');
        $data['selectData'] = $this->admin_model->selectDataLevel1();
        if ($id != '') {
            $data['selectRow'] = $this->admin_model->selectDataLevel1($id);
            $data['mode'] = $mode;
        }

        $data['targetPage'] = $this->load->view('level1', $data, true);
        $this->load->view('index', $data);
    }

    public function SaveLevel1() {
        $input['account_id'] = $this->input->post('account_id');
        $input['level1_name'] = $this->input->post('level1_name');
        $input['comp_id'] = $this->session->userdata('comp_id');
        $this->admin_model->insertData('tbl_level1', $input);
        $msg['msg'] = '<font color="green">Successfully Inserted.</font>';
        $this->session->set_userdata($msg);
        redirect("admin/level1");
    }

    public function level2($mode = '', $id = '') {
        $data['level1'] = $this->admin_model->selectData('*', 'tbl_level1', 'level1_name');
        $data['selectData'] = $this->admin_model->selectDataLevel2();
        if ($id != '') {
            $data['selectRow'] = $this->admin_model->selectDataLevel2($id);
            $data['mode'] = $mode;
        }
        $data['sliceNav'] = $this->load->view('slice_navigation', '', true);
        $data['targetPage'] = $this->load->view('level2', $data, true);
        $this->load->view('index', $data);
    }

    public function SaveLevel2() {
        $input['level1_id'] = $this->input->post('level1_id');
        $input['level2_name'] = $this->input->post('level2_name');
        $input['comp_id'] = $this->session->userdata('comp_id');
        $this->admin_model->insertData('tbl_level2', $input);
        $msg['msg'] = '<font color="green">Successfully Inserted.</font>';
        $this->session->set_userdata($msg);
        $this->level2();
    }

    public function level3($mode = '', $id = '') {
        $data['level2'] = $this->admin_model->selectData('*', 'tbl_level2', 'level2_name');
        $data['selectData'] = $this->admin_model->selectDataLevel3();
        if ($id != '') {
            $data['selectRow'] = $this->admin_model->selectDataLevel3($id);
            $data['mode'] = $mode;
        }
        $data['targetPage'] = $this->load->view('level3', $data, true);
        $this->load->view('index', $data);
    }

    public function SaveLevel3() {
        $input['level2_id'] = $this->input->post('level2_id');
        $input['level3_name'] = $this->input->post('level3_name');
        $input['comp_id'] = $this->session->userdata('comp_id');
        $this->admin_model->insertData('tbl_level3', $input);
        $msg['msg'] = '<font color="green">Successfully Inserted.</font>';
        $this->session->set_userdata($msg);
        $this->level3();
    }

    public function updateAccountType() {
        $input['account_id'] = $this->input->post('account_id');
        $input['type'] = $this->input->post('type');
        $this->admin_model->updateAccountModel($input);
        $msg['msg'] = '<font color="green">Update Successful.</font>';
        $this->session->set_userdata($msg);
        redirect(base_url() . 'admin/accountType.php');
    }

    public function updateLevel1() {
        $input['id'] = $this->input->post('id');
        $input['account_id'] = $this->input->post('account_id');
        $input['level1_name'] = $this->input->post('level1_name');
        $this->admin_model->updateLevel1Model($input);
        $msg['msg'] = '<font color="green">Update Successful.</font>';
        $this->session->set_userdata($msg);
        redirect(base_url() . 'admin/level1.php');
    }

    public function updateLevel2() {
        $input['id'] = $this->input->post('id');
        $input['level1_id'] = $this->input->post('level1_id');
        $input['level2_name'] = $this->input->post('level2_name');
        $this->admin_model->updateLevel2Model($input);
        $msg['msg'] = '<font color="green">Update Successful.</font>';
        $this->session->set_userdata($msg);
        redirect(base_url() . 'admin/level2.php');
    }

    public function updateLevel3() {
        $input['id'] = $this->input->post('id');
        $input['level2_id'] = $this->input->post('level2_id');
        $input['level3_name'] = $this->input->post('level3_name');
        $this->admin_model->updateLevel3Model($input);
        $msg['msg'] = '<font color="green">Update Successful.</font>';
        $this->session->set_userdata($msg);
        redirect(base_url() . 'admin/level3.php');
    }

    public function addCompany() {
        $data['targetPage'] = $this->load->view('new_company', '', true);
        $this->load->view('index', $data);
    }

    public function settings() {
        $data['selectCompany'] = $this->admin_model->selectRowById('*', 'tbl_company', 'comp_id', $this->session->userdata('comp_id'));
        $data['targetPage'] = $this->load->view('setting', $data, true);
        $this->load->view('index', $data);
    }

    public function saveCompany() {
        $msg['msg'] = '<font color="red">Error.</font>';
        if ($this->input->post('from_send')) {
            $input = array(
                'comp_name' => $this->input->post('comp_name'),
                'mobile1' => $this->input->post('mobile1'),
                'mobile2' => $this->input->post('mobile2'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'website' => $this->input->post('website'),
                'cont_name' => $this->input->post('cont_name'),
                'cont_desi' => $this->input->post('cont_desi'),
                'cont_mobile' => $this->input->post('cont_mobile'),
                'cont_email' => $this->input->post('cont_email'),
                'fy_begin_date' => '',
                'fy_end_date' => '',
                'status' => $this->input->post('status')
            );

            $user = array(
                'email' => $this->input->post('email'),
                'user_name' => trim($this->input->post('user_name')),
                'password' => md5($this->input->post('password')),
                'status' => "Admin",
                'user_name' => trim($this->input->post('user_name')),
                'password' => md5($this->input->post('password')),
                'status' => "Admin"
            );

            if (!$this->admin_model->selectCompanyId($input['comp_name'], $input['email'], $input['cont_name'])) {

                $fileField = 'comp_logo';
                if ($_FILES[$fileField]['name'] && $_FILES[$fileField]['size']) {
                    $result = $this->fileUpload('user_upload/', $fileField, 'png|jpg|gif');
                    if ($result['file_name']) {
                        list($folder, $comp_logo['comp_logo']) = explode('/', $result['file_name']);

//                        array_push($input, "comp_logo" => "$comp_logo");
//                        $a['comp_logo'] =$comp_logo; 
//                        array_push($input['comp_name'], $comp_logo);
                        $input = $input + $comp_logo;
                        $insert = $this->admin_model->insertData('tbl_company', $input);
                        $comp_id['comp_id'] = $this->admin_model->selectCompanyId($input['comp_name'], $input['email'], $input['cont_name']);
                        $user = $user + $comp_id;

                        $insert2 = $this->admin_model->insertData('tbl_users', $user);
                        if ($insert && $insert2) {
                            $msg['msg'] = '<font color="green">Inserted OK</font>';
                        } else {
                            $msg['msg'] = '<font color="red">Data Not Inserted.</font>';
                        }
                    } else {
                        $msg['msg'] = $result['error'];
                    }
                }
            } else {
                $msg['msg'] = '<font color="red">Already Inserted.</font>';
            }


//        $this->admin_model->insertData('tbl_company', $input);

            $this->session->set_userdata($msg);
        }
        $this->addCompany();
    }

    public function delete($name, $id) {
        if (isset($id)) {
            switch ($name) {
                case 'account_type':
                    $return = $this->admin_model->deleteData('tbl_account_type', array('account_id' => $id));
                    if ($return) {
                        $msg['msg'] = "<font color=\"red\">This Information is already in used. So you Can't delte it.</font>";
                    } else {
                        $msg['msg'] = "<font color=\"green\">Data Successfully Deleted.</font>";
                    }
                    $this->session->set_userdata($msg);
                    redirect(base_url() . 'admin/accountType.php');
                    break;

                case 'level1':
                    $return = $this->admin_model->deleteData('tbl_level1', array('id' => $id));
                    if ($return) {
                        $msg['msg'] = "<font color=\"red\">This Information is already in used. So you Can't delte it.</font>";
                    } else {
                        $msg['msg'] = "<font color=\"green\">Data Successfully Deleted.</font>";
                    }
                    $this->session->set_userdata($msg);
                    redirect(base_url() . 'admin/level1.php');
                    break;
                case 'level2':
                    $return = $this->admin_model->deleteData('tbl_level2', array('id' => $id));
                    if ($return) {
                        $msg['msg'] = "<font color=\"red\">This Information is already in used. So you Can't delte it.</font>";
                    } else {
                        $msg['msg'] = "<font color=\"green\">Data Successfully Deleted.</font>";
                    }
                    $this->session->set_userdata($msg);
                    redirect(base_url() . 'admin/level2.php');
                    break;
                case 'level3':
                    $return = $this->admin_model->deleteData('tbl_level3', array('id' => $id));
                    if ($return) {
                        $msg['msg'] = "<font color=\"red\">This Information is already in used. So you Can't delte it.</font>";
                    } else {
                        $msg['msg'] = "<font color=\"green\">Data Successfully Deleted.</font>";
                    }
                    $this->session->set_userdata($msg);
                    redirect(base_url() . 'admin/level3.php');
                    break;
                case 'voucherType':
                    $return = $this->admin_model->deleteData('tbl_voucherType', array('id' => $id));
                    if ($return) {
                        $msg['msg'] = "<font color=\"red\">This Information is already in used. So you Can't delte it.</font>";
                    } else {
                        $msg['msg'] = "<font color=\"green\">Data Successfully Deleted.</font>";
                    }
                    $this->session->set_userdata($msg);
                    redirect(base_url() . 'admin/voucherType.php');
                    break;
                case 'voucher':
                    $return = $this->admin_model->deleteData('tbl_voucher', array('voucher_id' => $id));
                    $return1 = $this->admin_model->deleteData('tbl_voucherchild', array('voucher_id' => $id));
                    if ($return && $return1) {
                        $msg['msg'] = "<font color=\"red\">This Information is already in used. So you Can't delte it.</font>";
                    } else {
                        $msg['msg'] = "<font color=\"green\">Data Successfully Deleted.</font>";
                    }
                    $this->session->set_userdata($msg);
                    redirect(base_url() . 'voucher/voucherForm.php');
                    break;
            }
        }
    }

}
