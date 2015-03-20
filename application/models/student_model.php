<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class student_model extends CI_Model {

    public $table = 'student';

    public function get($id) {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function add($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id)->delete($this->table);
        return $this->db->affected_rows();
    }

}

?>