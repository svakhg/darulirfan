<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fee_category_model extends CI_Model {

    public $table = 'fee_category';

    public function get_acc_ledger_list() {
        return $this->db->select('id, name')->get_where('acc_ledger', ['group_id' => 7])->result();
    }

    public function get_status_list() {
        return $this->db->select('id, yesno')->get('status')->result();
    }

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_page($size, $pageno) {
        $this->db
                ->limit($size, $pageno)
                ->select('fee_category.id, acc_ledger.group_id, acc_ledger.name as acc_ledger_name,fee_category.name,status.yesno as status_yesno,fee_category.is_monthly')
                ->where(['acc_ledger.group_id' => 7])
                ->join('acc_ledger', 'fee_category.name = acc_ledger.id', 'left outer')
                ->join('status', 'fee_category.is_monthly = status.id', 'left outer');

        $data = $this->db->get($this->table)->result();
        $total = $this->count_all();
        return array("data" => $data, "total" => $total);
    }

    public function get_page_where($size, $pageno, $params) {
        $this->db->limit($size, $pageno)
                ->select('fee_category.id,acc_ledger.name as acc_ledger_name,fee_category.name,status.yesno as status_yesno,fee_category.is_monthly')
                ->join('acc_ledger', 'fee_category.name = acc_ledger.id', 'left outer')
                ->join('status', 'fee_category.is_monthly = status.id', 'left outer');

        if (isset($params->name) && !empty($params->name)) {
            $this->db->like("fee_category.name", $params->name);
        }
        if (isset($params->is_monthly) && !empty($params->is_monthly)) {
            $this->db->where("fee_category.is_monthly", $params->is_monthly);
        }

        $data = $this->db->get($this->table)->result();
        $total = $this->count_where($params);
        return array("data" => $data, "total" => $total);
    }

    public function count_where($params) {
        $this->db
                ->join('acc_ledger', 'fee_category.name = acc_ledger.id', 'left outer')
                ->join('status', 'fee_category.is_monthly = status.id', 'left outer');

        if (isset($params->name) && !empty($params->name)) {
            $this->db->like("fee_category.name", $params->name);
        }
        if (isset($params->is_monthly) && !empty($params->is_monthly)) {
            $this->db->where("fee_category.is_monthly", $params->is_monthly);
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