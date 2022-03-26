<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faker extends MX_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('TalentsDB');
        $this->load->model('PhotoProfileDB');
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