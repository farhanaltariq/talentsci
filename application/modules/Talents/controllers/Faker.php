<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faker extends MX_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('TalentsDB');
        $this->load->model('PhotoProfileDB');
        $this->load->database();
    }

    public function dataFaker(){
        include APPPATH . '/third_party/faker/src/autoload.php';
        $faker = Faker\Factory::create('id_ID');

        // set default avatar
        $this->db->where('id', 1);
        $query = $this->db->get('photo_profile');
        if ($query->num_rows() == 0){
            $pict = [
                'id' => 1,
                'photo_profile' => 'default.webp',
            ];
            $this->db->insert('photo_profile', $pict);
        }

        // insert category
        $categories = ['Chess', 'Fashion', 'Photography', 'Programming', 'Swimming'];
        // echo "HERE"; exit();
        for($i=1; $i<=5; $i++){
            $this->db->where('id',$i);
            $query = $this->db->get('category');
            if ($query->num_rows() == 0){
                $ctg = [
                    'id' => $i,
                    'name_category' => $categories[$i-1],
                ];
                $this->db->insert('category', $ctg);
            }
        }

        // insert talent
        for($i=0;$i<10;$i++){
            $data['name'] = $faker->name;
            $data['email'] = $faker->email;
            $data['phone_number'] = $faker->phoneNumber;
            $data['age'] = $faker->numberBetween(18,50);
            $data['id_photo_profile'] = 1;
            $data['gender'] = $faker->randomElement(['Male','Female']);
            $data['location'] = $faker->city;
            $data['id_category'] = $faker->numberBetween(1,5);
            switch($data['id_category']){
                case 1 :
                    $data['skills'] = $faker->randomElement(['Grandmaster', 'Master', 'Expert']);
                    break;
                case 2 :
                    $data['skills'] = $faker->randomElement(['Vintage', 'Modern', 'Contemporary']);
                    break;
                case 3 :
                    $data['skills'] = $faker->randomElement(['Portrait', 'Landscape', 'Fashion']);
                    break;
                case 4 :
                    $data['skills'] = $faker->randomElement(['JavaScript', 'PHP', 'Python']);
                    break;
                case 5 :
                    $data['skills'] = $faker->randomElement(['Butterfly', 'Backstroke', 'Breaststroke']);
                    break;
            }
            $data['aboutme'] = $faker->text;
            $this->TalentsDB->insert($data);
        }
        $_SESSION['message'] = "Data Faker Success";
        redirect('talents');
    }
}