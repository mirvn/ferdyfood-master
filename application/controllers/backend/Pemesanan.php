<?php
class Pemesanan extends CI_Controller
{
    public function pemesanan()
    {
        $data['pemesanan'] = $this->Model_Pemesanan->get_pemesanan()->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pemesanan',$data);
        $this->load->view('admin/templates/footer');
    }
}