<?php 

class Dashboard extends CI_Controller{
    public function index(){
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/dashboard');
        $this->load->view('backend/templates/footer');

    }
}