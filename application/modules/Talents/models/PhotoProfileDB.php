<?php

class PhotoProfileDB extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert($data) {
        $this->db->insert('photo_profile', $data);
    }
    public function get_picture($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('photo_profile');
        if(isset($query->row()->photo_profile))
            return $query->row()->photo_profile;
        return "";
    }
    public function last_id() {
        $this->db->select_max('id');
        $query = $this->db->get('photo_profile');
        return $query->row()->id;
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('photo_profile');
    }
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('photo_profile', $data);
    }
}

?>