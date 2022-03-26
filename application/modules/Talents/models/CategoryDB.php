<?php

class CategoryDB extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_categories() {
        return $query = $this->db->get('category')->result();
    }
    public function get_category($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('category');
        if(isset($query->row()->name_category))
            return $query->row()->name_category;
        return "";
    }
}

?>