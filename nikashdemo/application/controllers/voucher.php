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
class Voucher extends CI_Controller {

//put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login.php', 'refresh');
        }
    }

    function vTime() {
        $hour = gmdate("H") + 6;
        $minute = gmdate("i");
        $second = gmdate("s");
        $year = gmdate("Y");
        $month = gmdate("m");
        $day = gmdate("d");
        return date("Y-m-d h:i:s", mktime($hour, $minute, $second, $month, $day, $year));
    }

    function vDate() {
        $hour = gmdate("H") + 6;
        $minute = gmdate("i");
        $second = gmdate("s");
        $year = gmdate("Y");
        $month = gmdate("m");
        $day = gmdate("d");
        return date("Y-m-d", mktime($hour, $minute, $second, $month, $day, $year));
    }

    public function index() {
        $data['targetPage'] = '';
        $this->load->view('login', $data);
    }

    public function voucherType($mode = '', $id = '') {
        $data['selectData'] = $this->admin_model->selectData('id,voucher_type,details', 'tbl_vouchertype');
        if ($id != '') {
            $data['selectRow'] = $this->admin_model->selectRowById('id,voucher_type,details,', 'tbl_vouchertype', 'id', $id);
            $data['mode'] = $mode;
        }
        $data['targetPage'] = $this->load->view('voucherType', $data, true);
        $this->load->view('index', $data);
    }

    public function SaveVoucherType() {
        $input['voucher_type'] = $this->input->post('voucher_type');
        $input['details'] = $this->input->post('details');
        $this->admin_model->insertData('tbl_vouchertype', $input);
        $msg['msg'] = '<font color="green">Successfully Inserted.</font>';
        $this->session->set_userdata($msg);
        redirect(base_url() . 'admin/voucherType.php');
    }

    public function updateVoucherType() {
        $input['id'] = $this->input->post('id');
        $input['voucher_type'] = $this->input->post('voucher_type');
        $input['details'] = $this->input->post('details');
        $this->admin_model->udpateVoucherType($input);
        $msg['msg'] = '<font color="green">Successfully Inserted.</font>';
        $this->session->set_userdata($msg);
        redirect(base_url() . 'admin/voucherType.php');
    }

    public function voucherForm() {
        $data['VoucherType'] = $this->admin_model->selectVoucherType();
        $data['level3'] = $this->admin_model->selectLevel3();
        $data['targetPage'] = $this->load->view('voucherForm', $data, true);
        $this->load->view('index', $data);
    }

    public function saveVoucherRow() {
        $data = array();
        $row = $this->input->post('row');
        $input['voucher_id'] = $this->input->post('voucher_no');
        $input['level3_id'] = $this->input->post('level3');
        $input['debit'] = $this->input->post('debit');
        $input['credit'] = $this->input->post('credit');
        $input['note'] = $this->input->post('note');
        $input['send_date'] = date('Y-m-d h:i:s');
        $input['status'] = 1;
//        $this->admin_model->insertData('tbl_temp_voucher', $input);
        $data['v_row'] = $this->session->userdata('v_row');
        $data['v_row'][$row] = $input;
        $this->session->set_userdata($data);
    }

    public function saveVoucher() {
        $inputV['voucher_no_form'] = $this->input->post('v_no');
        $inputV['voucher_date'] = $this->input->post('v_date');
        $inputV['voucher_type_id'] = $this->input->post('v_type');
        $inputV['voucher_details'] = $this->input->post('v_details');
        $inputV['status'] = 1;
        $inputV['send_date'] = $this->vTime();
        $inputV['comp_id'] = $this->session->userdata('comp_id');
//
        $chkDate = $this->admin_model->checkVoucherDate($inputV['voucher_date']);
//        exit();
        if ($chkDate) {
            echo 'Invalid Voucher Date - Outside Financial Year';
            ?>
            <hr><button onclick="$('#dialog-modal').dialog('close');" class="btn">Cancel</button>
            <?php
            exit();
        }

        $query = $this->db->query("select count(v.voucher_id) as total,t.voucher_type "
                . "from tbl_voucher as v,tbl_vouchertype as t "
                . "where t.id=$inputV[voucher_type_id] "
//                . "where t.id=$inputV[voucher_type_id] AND "
//                . "v.comp_id=$this->session->userdata('comp_id') AND "
//                . "v.voucher_type_id=$inputV[voucher_type_id] "
                . "limit 1");
        if ($query) {
            $slectRow = $query->row();
            $new_row = $slectRow->total + 1;
            $inputV['voucher_no'] = $slectRow->voucher_type;
            $inputV['voucher_no'] .= $new_row;

            $this->db->insert('tbl_voucher', $inputV);
            $input['voucher_id'] = $this->db->insert_id();
            if ($this->session->userdata('v_row')) {
                foreach ($this->session->userdata('v_row') as $row) {

                    $input['level3_id'] = $row['level3_id'];
                    $input['note'] = $row['note'];
                    $input['debit'] = $row['debit'];
                    $input['credit'] = $row['credit'];
                    $input['status'] = $row['status'];
                    $input['comp_id'] = $this->session->userdata('comp_id');
                    $input['send_date'] = $this->vDate();
                    $this->db->insert('tbl_voucherchild', $input);
//                print_r($input);
                }
                $this->session->unset_userdata('v_row');
            }
            echo 'Successfully Save. <br>Your Voucher No is: <font color="green">' . $inputV['voucher_no'] . '</font>';
        }
        ?>
        <hr><a href="<?php echo base_url(); ?>voucher/voucherForm.php"><u>Click to New Voucher</u></a>
        <hr><button onclick="$('#dialog-modal').dialog('close');" class="btn">Ok</button>
        <?php
    }

    public function voucherView() {
        $data['VoucherType'] = $this->admin_model->selectVoucherType();

        $data ['targetPage'] = $this->load->view('voucherView', $data, true);
        $this->load->view('index', $data);
    }

    public function voucherViewTable() {
//        $data ['targetPage'] = $this->load->view('voucherViewTable', '', true);
        $data['voucherList'] = $this->admin_model->voucherViewList();
        $this->load->view('voucherViewTable', $data);
    }

    public function typeChange($type_id) {
        $VoucherNo = $this->admin_model->selectResultById('voucher_id,voucher_no', 'tbl_voucher', 'voucher_type_id', $type_id);
        ?>
        <select required="1" name="voucher_id">
            <option value=""></option>
            <?php
            foreach ($VoucherNo as $vt) {
                ?>
                <option value="<?php echo $vt->voucher_id; ?>"><?php echo $vt->voucher_no; ?></option>
                <?php
            }
            ?>
        </select>
        <?php
    }

    public function editVoucher($voucher_id) {
        $data = $this->admin_model->selectVoucherOne($voucher_id);
        $data['VoucherType'] = $this->admin_model->selectVoucherType();
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        $data ['targetPage'] = $this->load->view('voucherEdit', $data, true);
        $this->load->view('index', $data);
    }

    public function UpdateVoucher() {

        $voucher_id = $this->input->post('voucher_id');
        $inputV['voucher_date'] = $this->input->post('voucher_date');
        $inputV['voucher_type_id'] = $this->input->post('voucher_type');
        $inputV['voucher_details'] = $this->input->post('voucher_details');
        $inputV['status'] = 1;
//        $inputV['send_date'] = $this->vTime();

        $child = $this->input->post('child');
        foreach ($child as $id => $amount) {
            if ($amount['debit'] > 0 && $amount['credit'] > 0) {
                $msg = 'There is a Problem.';
                echo $msg;
            } else {
                $this->admin_model->updateVoucher($inputV, $voucher_id);
                $this->admin_model->updateVoucherChild($id, $amount['debit'], $amount['credit']);
                echo $msg = 'Success';
            }
        }
    }

}
