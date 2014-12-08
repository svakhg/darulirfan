<?php


class MY_Controller extends CI_Controller {

    public $data = array();
    public $parser;
    function __construct() {
        parent::__construct();
            $data = new stdClass();
            $data->site_name = config_item('site_name');
            $this->load->vars($data);
            require_once 'system/kendo/lib/DataSourceResult.php';
            require_once 'system/kendo/lib/Kendo/Autoload.php';
    }
    /**
     * Set subview and load layout
     * @param string $subview
     */
    public function load_view($subview) {
        $this->data['subview'] = $subview;

        $this->load->view('include/layout', $this->data);
    }
}
