<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class acc_ledger_model extends CI_Model {

    public $table = 'acc_ledger';

    public function get_acc_group_list() {
        return $this->db->select('id, Group_Name')->get('acc_group')->result();
    }

    public function get_status_list() {
        return $this->db->select('id, name')->get('status')->result();
    }

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_page($size, $pageno) {
        $this->db
                ->limit($size, $pageno)
                ->select('acc_ledger.id,acc_ledger.name,acc_group.Group_Name as acc_group_Group_Name,acc_ledger.group_id,status.name as status_name,acc_ledger.status,acc_ledger.create_date')
                ->join('acc_group', 'acc_ledger.group_id = acc_group.id', 'left outer')
                ->join('status', 'acc_ledger.status = status.id', 'left outer');

        $data = $this->db->get($this->table)->result();
        $total = $this->count_all();
        return array("data" => $data, "total" => $total);
    }

    public function get_page_where($size, $pageno, $params) {
        $this->db->limit($size, $pageno)
                ->select('acc_ledger.id,acc_ledger.name,acc_group.Group_Name as acc_group_Group_Name,acc_ledger.group_id,status.name as status_name,acc_ledger.status,acc_ledger.create_date')
                ->join('acc_group', 'acc_ledger.group_id = acc_group.id', 'left outer')
                ->join('status', 'acc_ledger.status = status.id', 'left outer');

        if (isset($params->name) && !empty($params->name)) {
            $this->db->like("acc_ledger.name", $params->name);
        }
        if (isset($params->group_id) && !empty($params->group_id)) {
            $this->db->where("acc_ledger.group_id", $params->group_id);
        }
        if (isset($params->status) && !empty($params->status)) {
            $this->db->where("acc_ledger.status", $params->status);
        }
        if (isset($params->create_date) && !empty($params->create_date)) {
            $this->db->where("acc_ledger.create_date", $params->create_date);
        }

        $data = $this->db->get($this->table)->result();
        $total = $this->count_where($params);
        return array("data" => $data, "total" => $total);
    }

    public function count_where($params) {
        $this->db
                ->join('acc_group', 'acc_ledger.group_id = acc_group.id', 'left outer')
                ->join('status', 'acc_ledger.status = status.id', 'left outer');

        if (isset($params->name) && !empty($params->name)) {
            $this->db->like("acc_ledger.name", $params->name);
        }
        if (isset($params->group_id) && !empty($params->group_id)) {
            $this->db->where("acc_ledger.group_id", $params->group_id);
        }
        if (isset($params->status) && !empty($params->status)) {
            $this->db->where("acc_ledger.status", $params->status);
        }
        if (isset($params->create_date) && !empty($params->create_date)) {
            $this->db->where("acc_ledger.create_date", $params->create_date);
        }

        return $this->db->count_all_results($this->table);
    }

    public function count_all() {
        return $this->db
                        ->count_all_results($this->table);
    }

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