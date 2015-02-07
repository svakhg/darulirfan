<?php

//session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends CI_Controller {

    var $company_name;
    var $address;

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('report_model');
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login.php', 'refresh');
        }

        $this->company_name = $this->company('comp_name');
        $this->address = $this->company('address');
    }

    public function company($field) {
//        print_r ($this->session->userdata('comp_id'));
        $result = $this->admin_model->selectRowById($field, 'tbl_company', 'comp_id', $this->session->userdata('comp_id'));
//        var $company_name = 'asdfsddfas';
//        print_r($result);
        return $result->$field;
    }

//    var $company_name;


    public function index() {
        $data['targetPage'] = $this->load->view('report', '', true);
        $this->load->view('index', $data);
    }

    public function testReports() {
        $data['targetPage'] = $this->load->view('reports/level1ToPostingLevel', '', true);
        $this->load->view('reports/print_view', $data);
    }

    public function level1ToLevel2($call_type = '') {
        $data['title'] = 'Chart of Account Second Level';
        $data['select_result'] = $this->report_model->selectLevel1Level2();
        $data['report_page'] = $this->load->view('reports/level1Tolevel2', $data, true);
        $data['targetPage'] = $this->load->view('report', $data, true);
        $data['pdf_view'] = $this->load->view('reports/report_pdf', $data, true);

        if ($call_type == 'for_pdf_view') {
            return $data['pdf_view'];
        } else {
            $this->load->view('index', $data);
        }
    }

    public function level1ToPosting($call_type = '') {
        $data['title'] = 'Chart of Accounts <br>(Account Type,Level 1-2-3)';
//        $data['select_result'] = $this->report_model->selectLevel1ToPosting();
        $data['accountHead'] = $this->admin_model->selectAllAccount('tbl_account_type');
//        echo '<pre>';
        foreach ($data['accountHead'] as $acc) {
            $data['level1'][$acc->account_id] = $this->admin_model->selectResultById('id,level1_name', 'tbl_level1', 'account_id', $acc->account_id);
            foreach ($data['level1'][$acc->account_id] as $lvl1) {
                $data['level2'][$lvl1->id] = $this->admin_model->selectResultById('id,level2_name', 'tbl_level2', 'level1_id', $lvl1->id);
                foreach ($data['level2'][$lvl1->id] as $lvl2) {
                    $data['level3'][$lvl2->id] = $this->admin_model->selectResultById('id,level3_name', 'tbl_level3', 'level2_id', $lvl2->id);
                }
            }
        }
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        $data['accountType'] = $this->report_model->selectResultById('', $table, $by, $id);
//        echo '</pre>';
        $data['report_page'] = $this->load->view('reports/level1ToPostingLevel', $data, true);
        $data['targetPage'] = $this->load->view('report', $data, true);
        $data['pdf_view'] = $this->load->view('reports/report_pdf', $data, true);
        if ($call_type == 'for_pdf_view') {
            return $data['pdf_view'];
        } else {
            $this->load->view('index', $data);
        }
    }

    public function printVoucher($call_type = '') {

        $id = @$this->uri->segment('4');

        if ($this->input->get('voucher_id')) {
            $id = $this->input->get('voucher_id');
        }
        if ($this->input->post('voucher_id')) {
            $id = $this->input->post('voucher_id');
        }
        $data['print_element'] = $id;
        if ($id) {
            $data['selectVoucher'] = $this->report_model->slelectVoucherById($id);
            if (!$data['selectVoucher']) {
                redirect(base_url() . 'voucher/voucherView.php');
            }
            $data['selectVoucherChild'] = $this->report_model->slelectVoucherChildById($id);

            $data['title'] = '<h4>' . $data['selectVoucher']->details . ' (' . $data['selectVoucher']->voucher_type . ') Voucher </h4>';

            $data['report_page'] = $this->load->view('reports/voucher_print', $data, true);
            $data['targetPage'] = $this->load->view('report', $data, true);
        } else {
            $data['targetPage'] = 'Voucher Id Not Found.';
        }
        $data['pdf_view'] = $this->load->view('reports/report_pdf', $data, true);
        if ($call_type == 'for_pdf_view') {
            return $data['pdf_view'];
        } else {
            $this->load->view('index', $data);
        }
    }

    public function printVoucherInner($id) {
        
    }

    public function ledger() {
        $data['postingLevel'] = $this->report_model->selectPostingLevel();
        $data['targetPage'] = $this->load->view('reports/ledger_list', $data, true);
        $this->load->view('index', $data);
    }

    public function ledgerView($call_type = '', $id = '', $date_from = '', $date_to = '') {
        $id = @$this->uri->segment(4);
        $date_from = @$this->uri->segment(5);
        $date_to = @$this->uri->segment(6);

//        $level3_name = 'tesssssssssst';
        if ($this->input->post('posting_send')) {
            $level3 = $this->input->post('postingLevel');
            $date_from = $this->input->post('date_from');
            $date_to = $this->input->post('date_to');

            list($id, $level3_name) = explode('-', $level3);
        }
        if ($id) {
            $data = array(
                'title' => '<h4>Ledger: ' . $level3_name . '</h4>',
                'subTitle2' => '<font size="3">For The Period From <i>' . $date_from . '</i> To <i>' . $date_to . '</i></font>',
                'print_element' => $id . '/' . $date_from . '/' . $date_to,
                'level3_name' => $level3_name,
                'date_from' => $date_from,
                'date_to' => $date_to
            );

            $data['openingBalance'] = $this->report_model->openingBalance($id, $date_from);
            $data['selectVoucher'] = $this->report_model->selectVoucherByIdChild($id, $date_from, $date_to);
            $data['report_page'] = $this->load->view('reports/ledger_print', $data, true);
            $data['targetPage'] = $this->load->view('report', $data, true);

            $data['pdf_view'] = $this->load->view('reports/report_pdf', $data, true);
            if ($call_type == 'for_pdf_view') {
                return $data['targetPage'];
            } else {
                $this->load->view('index', $data);
            }
        } else {
            redirect(base_url() . 'reports/ledger.php');
        }
    }

    public function printAsPDF($report_type) {

        $this->load->helper('dompdf_helper');
        $this->load->helper(array('dompdf', 'file'));
        $pdf_view = $this->$report_type('for_pdf_view');

        pdf_create($pdf_view, $report_type);
    }

    public function saveAsExcel() {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-disposition: attachment; filename=spreadsheet.xls");

// print your data here. note the following:
// - cells/columns are separated by tabs ("\t")
// - rows are separated by newlines ("\n")
// for example:
        echo 'First Name' . "\t" . 'Last Name' . "\t" . 'Phone' . "\n";
        for ($i = 1; $i <= 10; $i++) {
            echo 'John' . "\t" . 'Doe' . "\t" . '555-5555' . "\n";
        }
    }

    function trialBalance($call_type = '', $level) {
        if ($level == 'allLevel') {
            $data['AllLable'] = $this->report_model->selectAllLevelBalance();
//            echo '<pre>';
//            print_r($data['AllLable']);
//            echo '</pre>';
        } elseif ($level == 'postingLevel') {
//            $data['level3_id'] = $this->admin_model->selectData('id,level3_name', 'tbl_level3');
            $data['level3'] = $this->report_model->selectLevel3Balance();
//            print_r($data['level3']);
        } else {
            redirect(base_url() . 'admin.php');
        }
        $data = array_merge($data, array(
//        $data = array(
            'title' => '<h4>Trial Balance as at ' . date('Y-m-d') . '</h4>',
            'level' => $level,
        ));
        $data['report_page'] = $this->load->view('reports/trialBalance', $data, true);
        $data['targetPage'] = $this->load->view('report', $data, true);
        $data['pdf_view'] = $this->load->view('reports/report_pdf', $data, true);

        if ($call_type == 'for_pdf_view') {
            return $data['pdf_view'];
        } else {
            $this->load->view('index', $data);
        }
    }

    public function incomeExpenditure($call_type = '') {
        $data['targetPage'] = $this->load->view('reports/incomeList', '', true);
        $this->load->view('index', $data);
    }

    public function incomeExpandSubmit() {
        if ($this->input->post('level')) {
//            $data['account_head'] = $this->input->post('head');
            $data['date_from'] = $this->input->post('date_from');
            $data['date_to'] = $this->input->post('date_to');
            $data['level'] = $this->input->post('level');
            $data['account_head'] = array("Direct Income","Direct Expenses", "Indirect Income", "Indirect Expenses");
            foreach ($data['account_head'] as $expList) {
                $data['accountType'][] = $expList;
                if ($data['level'] == 'postingLevel') {
                    $data['accountType_bal'][] = $this->report_model->incomeExpenditureBalance($expList, $data['date_from'], $data['date_to']);
                } else {
                    $data['EBdata'][$expList] = $this->report_model->incomeEBallLevel($expList, $data['date_from'], $data['date_to']);
//                    foreach ($data['EBdata'] as $value) {
//                        echo '<pre>';
//                        foreach ($value as $value1) {
//
////                            print_r($value1);
//                            if (isset($value1->level1_name)) {
//                                $data['EBdata']['level1'][] = $value1->level1_name;
//                            }
//                        }
//                        print_r($data['EBdata']['level1']);
//                        echo '</pre>';
//                    }
                }
            }
            $data['title'] = 'Income & Expenditure Account';
            $data['subTitle2'] = 'for period From &nbsp;&nbsp;' . $data['date_from'] . '&nbsp; to &nbsp;&nbsp;' . $data['date_to'];
            $data['report_page'] = $this->load->view('reports/incomeExpend', $data, true);
            $data['targetPage'] = $this->load->view('report', $data, true);
            $data['pdf_view'] = $this->load->view('reports/report_pdf', $data, true);

//            if ($call_type == 'for_pdf_view') {
//                return $data['pdf_view'];
//            } else {
            $this->load->view('index', $data);
//            }
        } else {
            redirect(base_url() . 'reports/incomeExpenditure.php');
        }
    }

    public function balanceSheet() {
        $data['account_head'] = array("Fixed Assets", "Current Assets", "Current Liabilities", "Retained Earnings");
        foreach ($data['account_head'] as $expList) {
            $data['accountType'][] = $expList;
            $data['AccType'][$expList] = $this->report_model->selectBalanceSheetHead($expList);
        }
        $data['title'] = 'Balance Sheet as at ' . date('Y-m-d');
//        $data['subTitle2'] = '';
        $data['report_page'] = $this->load->view('reports/balanceSheet', $data, true);
        $data['targetPage'] = $this->load->view('report', $data, true);
        $data['pdf_view'] = $this->load->view('reports/report_pdf', $data, true);

//            if ($call_type == 'for_pdf_view') {
//                return $data['pdf_view'];
//            } else {
        $this->load->view('index', $data);
    }
    public function balanceSheetAllLevel(){
        $data['account_head'] = array("Fixed Assets","Accumulated Depreciation", "Current Assets", "Current Liabilities", "Share Capital","Reserves","Retained Earnings","Long Term Liability");
        foreach ($data['account_head'] as $expList) {
            $data['accountType'][] = $expList;
            $data['AccType'][$expList] = $this->report_model->selectBalanceSheetHeadAll($expList);
        }
        $data['title'] = 'Balance Sheet as at ' . date('Y-m-d');
//        $data['subTitle2'] = '';
        $data['report_page'] = $this->load->view('reports/balanceSheetAll', $data, true);
        $data['targetPage'] = $this->load->view('report', $data, true);
        $data['pdf_view'] = $this->load->view('reports/report_pdf', $data, true);

//            if ($call_type == 'for_pdf_view') {
//                return $data['pdf_view'];
//            } else {
        $this->load->view('index', $data);
    }

}
