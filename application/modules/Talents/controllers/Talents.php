<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talents extends MX_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('TalentsDB');
        $this->load->model('PhotoProfileDB');
        $this->load->model('CategoryDB');
    }
    public function dataFaker(){
        include APPPATH . '/third_party/faker/src/autoload.php';
        $faker = Faker\Factory::create('id_ID');
        for($i=0;$i<10;$i++){
            $data['name'] = $faker->name;
            $data['email'] = $faker->email;
            $data['phone_number'] = $faker->phoneNumber;
            $data['age'] = $faker->numberBetween(18,50);
            $data['id_photo_profile'] = $this->PhotoProfileDB->last_id();
            $data['gender'] = $faker->randomElement(['Male','Female']);
            $data['skills'] = $faker->randomElement(['Hunting', 'Drone']);
            $data['location'] = $faker->city;
            $data['id_category'] = $faker->numberBetween(1,10);
            $data['aboutme'] = $faker->text;
            $this->TalentsDB->insert($data);
        }
        $_SESSION['message'] = "Data Faker Success";
        redirect('talents');
    }

    // Index with pagination
    public function index(){
        $this->load->library('pagination');
        $config['base_url'] = base_url().'talents/index';
        $config['total_rows'] = $this->TalentsDB->countRow();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
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
        $data['talents'] = $this->TalentsDB->get_talents($config['per_page'], $this->uri->segment(3));
        $data['start'] = $this->uri->segment(3);
        foreach ($data['talents'] as $talent) {
            $talent->photo_profile = $this->PhotoProfileDB->get_picture($talent->id);
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
        $this->load->view('Index', $data);
    }

    public function details($id){
        $data['talent'] = $this->TalentsDB->get_details($id);
        $data['talent']->photo_profile = $this->PhotoProfileDB->get_picture($id);
        $data['talent']->category = $this->CategoryDB->get_category($data['talent']->id_category);
        $this->load->view('Details', $data);
    }

    public function delete($id){
        $this->TalentsDB->delete($id);
        $_SESSION['message'] = "Data Deleted";
        redirect('talents');
    }

    public function create(){
        $data['categories'] = $this->CategoryDB->get_all_categories();
        $this->load->view('Create', $data);
    }
    public function store(){
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone_number'] = $this->input->post('phone_number');
        $data['age'] = $this->input->post('age');
        $data['id_photo_profile'] = $this->PhotoProfileDB->last_id();
        $data['gender'] = $this->input->post('gender');

        $this->TalentsDB->insert($data);
        redirect('talents');
    }

    public function edit($id){
        $data['talent'] = $this->TalentsDB->get_details($id);
        $data['talent']->photo_profile = $this->PhotoProfileDB->get_picture($id);
        $data['talent']->category = $this->CategoryDB->get_category($data['talent']->id_category);
        $this->load->view('Edit', $data);
    }

    public function update($id){
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone_number'] = $this->input->post('phone_number');
        $data['age'] = $this->input->post('age');
        $data['id_photo_profile'] = $this->PhotoProfileDB->last_id();
        $data['gender'] = $this->input->post('gender');
    }
    
}