<?php

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('blog_m');
        //$this->load->model('common_m');
    }

    function index() {

        $this->data['results'] = $this->blog_m->get_all();

        $this->load->view('index', $this->data);
    }

    function single() { // load Breadcrumbs
       


        $this->data['singles'] = $this->blog_m->get_single($id);
        
        $this->data['blogs'] = $this->common_m->get_few_blog(5, 0);
        $this->load->view('single', $this->data);
    }

}
