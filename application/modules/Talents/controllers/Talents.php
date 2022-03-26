<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talents extends MX_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('TalentsDB');
        $this->load->model('PhotoProfileDB');
        $this->load->model('CategoryDB');
        $this->load->helper("file");
    }

    // Index with pagination
    public function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'talents/index';
        $config['total_rows'] = $this->TalentsDB->countRow();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['start'] = $this->uri->segment(3);
        $data['talents'] = $this->TalentsDB->get_talents($config['per_page'], $data['start']);
        foreach ($data['talents'] as $talent) {
            $talent->photo_profile = $this->PhotoProfileDB->get_picture($talent->id_photo_profile);
            $talent->category = $this->CategoryDB->get_category($talent->id_category);
        }
        $this->load->view('Index', $data);
    }

    public function search(){
        $keyword = $this->input->post('search');
        $this->load->library('pagination');
        $data['talents'] = $this->TalentsDB->search($keyword);
        foreach ($data['talents'] as $talent) {
            $talent->photo_profile = $this->PhotoProfileDB->get_picture($talent->id);
            $talent->category = $this->CategoryDB->get_category($talent->id_category);
        }
        if(count($data['talents']) == 0){
            $_SESSION['message'] = "No result found";
        }
        $this->load->view('Index', $data);
    }

    public function details($id){
        $data['talent'] = $this->TalentsDB->get_details($id);
        if(!$data['talent']){
            show_404();
            exit;
        }
        $data['talent']->photo_profile = $this->PhotoProfileDB->get_picture($data['talent']->id_photo_profile);
        $data['talent']->category = $this->CategoryDB->get_category($data['talent']->id_category);
        $this->load->view('Details', $data);
    }

    public function delete($id){
        $pict_name = $this->PhotoProfileDB->get_picture($this->TalentsDB->get_details($id)->id_photo_profile);
        if($pict_name != null && $pict_name != "default.webp"){
            $path = './assets/talent_img/'.$pict_name;
            delete_files($path);
            unlink($path);
        }
        if($this->TalentsDB->get_details($id)->id_photo_profile != 1 && $this->TalentsDB->get_details($id)->id_photo_profile != null)
            $this->PhotoProfileDB->delete($this->TalentsDB->get_details($id)->id_photo_profile);
        $this->TalentsDB->delete($id);
        $_SESSION['message'] = "Data Deleted";
        redirect('talents');
    }

    public function create(){
        $data['categories'] = $this->CategoryDB->get_all_categories();
        $this->load->view('Create', $data);
    }
    public function store(){
        // if has file
        if(!empty($_FILES['photo_profile']['name'])){
            $config['upload_path'] = './assets/talent_img/';
            $config['allowed_types'] = 'jpg|png|jpeg|webp';
            $config['max_size'] = '2048';
            $config['file_name'] = $_FILES['photo_profile']['name'];
            $this->load->library('upload', $config);
            if($this->upload->do_upload('photo_profile')){
                $uploadData = $this->upload->data();
                $img['photo_profile'] = $uploadData['file_name'];
                $this->PhotoProfileDB->insert($img);
                $data['id_photo_profile'] = $this->PhotoProfileDB->last_id();
            }
        }
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone_number'] = $this->input->post('phone_number');
        $data['age'] = $this->input->post('age');
        $data['gender'] = $this->input->post('gender');
        $data['skills'] = $this->input->post('skills');
        $data['location'] = $this->input->post('location');
        $data['aboutme'] = $this->input->post('aboutme');
        $data['id_category'] = $this->input->post('id_category') == null ? 1 : $this->input->post('id_category');

        $this->TalentsDB->insert($data);
        redirect('talents');
    }

    public function edit($id){
        $data['talent'] = $this->TalentsDB->get_details($id);
        if(!$data['talent']){
            show_404();
            exit;
        }
        $data['talent']->photo_profile = $this->PhotoProfileDB->get_picture($data['talent']->id_photo_profile);
        $data['categories'] = $this->CategoryDB->get_all_categories();
        $this->load->view('Edit', $data);
    }

    public function update($id){
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone_number'] = $this->input->post('phone_number');
        $data['age'] = $this->input->post('age');
        $data['gender'] = $this->input->post('gender');
        $data['skills'] = $this->input->post('skills');
        $data['location'] = $this->input->post('location');
        $data['aboutme'] = $this->input->post('aboutme');
        $data['id_category'] = $this->input->post('category');
        $this->TalentsDB->update($id, $data);
        
        if(!empty($_FILES['photo_profile']['name'])){
            $config['upload_path'] = './assets/talent_img/';
            $config['allowed_types'] = 'jpg|png|jpeg|webp';
            $config['max_size'] = '2048';
            $config['file_name'] = $_FILES['photo_profile']['name'];
            $this->load->library('upload', $config);

            $pictId = $this->TalentsDB->get_details($id)->id_photo_profile;
            // if talent already have photo profile
            if($this->PhotoProfileDB->get_picture($pictId) != null && $pictId != 1){
                // if file exists in folder
                $pict_name = $this->PhotoProfileDB->get_picture($pictId);
                $path = './assets/talent_img/'.$pict_name;
                if(file_exists($path) && $pict_name != "default.webp"){
                    delete_files($path);
                    unlink($path);
                }

                // update photo profile
                if($this->upload->do_upload('photo_profile')){
                    $uploadData = $this->upload->data();
                    $img['photo_profile'] = $uploadData['file_name'];
                    $this->PhotoProfileDB->update($pictId, $img);
                }
            } else{
                // insert photo profile
                if($this->upload->do_upload('photo_profile')){
                    $uploadData = $this->upload->data();
                    $img['photo_profile'] = $uploadData['file_name'];
                    $this->PhotoProfileDB->insert($img);
                    $data['id_photo_profile'] = $this->PhotoProfileDB->last_id();
                }
                $this->TalentsDB->update($id, $data);
            }
        }

        $_SESSION['message'] = "Data Updated";
        redirect('talents');
    }
    
}