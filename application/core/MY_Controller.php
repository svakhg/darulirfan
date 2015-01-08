<?php

class MY_Controller extends CI_Controller {

    public $data = array();
    public $parser;

    function __construct() {
        parent::__construct();
        $data = new stdClass();
        $this->CI = & get_instance();
        
        require_once 'system/kendo/lib/DataSourceResult.php';
        require_once 'system/kendo/lib/Kendo/Autoload.php';
    }

    /**
     * Set subview and load layout
     * @param string $subview
     */
    public function load_view($subview) {
        $this->data['subview'] = $subview;
        $this->data['site_name'] = config_item('site_name');
        $this->data['site_short_name'] = config_item('site_short_name');
        $this->load->view('public/components/layout', $this->data);
    }

    protected function do_check_request($ar_call_type) {
        foreach ($ar_call_type as $str_call_type) {
            switch (strtolower($str_call_type)) {
                case 'ajax':
                    if (!$this->CI->input->is_ajax_request()) {
                        die('Not a valid AJAX request');
                    }
                    break;
                case 'cli':
                    if (!$this->CI->input->is_cli_request()) {
                        die('Not a valid CLI request');
                    }
                    break;
                case 'get':
                    if ($this->CI->input->server('REQUEST_METHOD') !== 'GET') {
                        die('This is not a valid GET request');
                    }
                    break;
                case 'post':
                    if ($this->CI->input->server('REQUEST_METHOD') !== 'POST') {
                        die('This is not a valid POST request');
                    }
                    break;
                case 'json':
                    if ($this->CI->input->server('REQUEST_METHOD') !== 'JSON') {
                        die('This is not a valid JSON request');
                    }
                    break;
                case 'jsonp':
                    if ($this->CI->input->server('REQUEST_METHOD') !== 'JSONP') {
                        die('This is not a valid JSONP request');
                    }
                    break;
                default:
                    die('Un authorised access detected');
                    break;
            }
        }
    }

}
