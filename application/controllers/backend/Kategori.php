<?php
class Kategori extends CI_Controller
{
    public function nugget()
    {
        $data['nugget'] = $this->Model_Kategori->produk_nugget()->result();
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/nugget', $data);
        $this->load->view('backend/templates/footer');
    }

    public function kentang()
    {
        $data['kentang'] = $this->Model_Kategori->produk_kentang()->result();
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/kentang', $data);
        $this->load->view('backend/templates/footer');
    }

    public function sosis()
    {
        $data['sosis'] = $this->Model_Kategori->produk_sosis()->result();
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/sosis', $data);
        $this->load->view('backend/templates/footer');
    }

    public function bakso()
    {
        $data['bakso'] = $this->Model_Kategori->produk_bakso()->result();
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/bakso', $data);
        $this->load->view('backend/templates/footer');
    }
}
