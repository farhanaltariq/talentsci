<?php

class TalentsDB extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data) {
        $this->db->insert('talent', $data);
    }
    public function get_details($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('talent');
        return $query->row();
    }
    public function get_all_talents() {
        return $query = $this->db->get('talent')->result();
    }
    public function get_talents($number, $offset) {
        return $query = $this->db->get('talent',$number,$offset)->result();
    }
    public function countRow(){
        $query = $this->db->get('talent');
        return $query->num_rows();
    }
    public function search($keyword) {
        $query = $this->db->select('*')
        ->from('talent')
        ->join('category', 'talent.id_category = category.id')
        ->like('name_category', $keyword)->or_like('name', $keyword);
        return $query->get()->result();
    }
    public function countSearch($keyword){
        $this->db->like('name', $keyword);
        // $this->db->or_like('category', $keyword);
        $query = $this->db->get('talent');
        return $query->num_rows();
    }
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('talent', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('talent');
    }
}