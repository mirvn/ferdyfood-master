<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('id')) {

            if ($this->session->userdata('role') == 2) {
                redirect('kasir');
            } else {
                redirect('admin');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->Model_User->login($username, $password);
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->set_flashdata([
            'type' => 1,
            'message' => 'Berhasil Logout'
        ]);

        redirect('auth');
    }
}
