<?php 
class Invoice extends CI_Controller{
    public function index(){
        $data['invoice']=$this->Model_Invoice->tampil_data();
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/invoice',$data);
        $this->load->view('backend/templates/footer');
    }

    public function detail($id_invoice){
        $data['invoice']=$this->Model_Invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->Model_Invoice->ambil_id_pesanan($id_invoice);

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/detail_invoice', $data);
        $this->load->view('backend/templates/footer');
    }
}