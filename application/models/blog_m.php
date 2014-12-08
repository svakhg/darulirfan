<?php
class blog_m extends CI_Model { 
    public $table = 'std_fee_report';
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
   public function get_all()
    {
        return $this->db->get($this->table)->result();      
    }
    
    public function count_all()
    {
        return $this->db            
            ->count_all_results($this->table);
    }
   function get_single($id) {
        $where_array = array('blogs.active' => 1, 'blogs.id' => $id);
        $this->db->from('blogs');
        $this->db->join('users', 'blogs.user_id = users.id');
        //$this->db->join('courses', 'blogs.course_code = courses.id');
        $this->db->where($where_array);
        $this->db->order_by('blogs.id', 'desc');

        //get the results
        $query = $this->db->get();
        // return results
        return $query->result_array();
    }
}