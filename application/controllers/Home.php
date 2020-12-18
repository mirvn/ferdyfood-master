<?php
class Home extends CI_Controller
{
    public function index()
    {

        $data['product'] = $this->Model_Product->tampil_data(null)->result();

        $this->load->view('templates/header');
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }

    public function addcart($id)
    {
        $product = $this->Model_Product->find($id);

        $data = array(
            'id' => $product->id_product,
            'name' => $product->name_product,
            'price' => $product->price,
            'qty' => 1,
            'image' => $product->image
        );
        $this->cart->insert($data);
        redirect('home');
    }

    public function detailcart()
    {

        $this->load->view('templates/header');
        $this->load->view('cart');
        $this->load->view('templates/footer');
    }

    public function deletecart()
    {
        $this->cart->destroy();
        redirect('home');
    }
    public function deleteitem($id = '')
    {
        $this->cart->remove($id);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
    public function checkout()
    {
        $this->load->view('templates/header');
        $this->load->view('checkout');
        $this->load->view('templates/footer');
    }

    public function proses()
    {

        $is_processed = $this->Model_Invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('proses');
            $this->load->view('templates/footer');
        } else {
            echo "pesanan gagal diproses";
        }
    }
    public function detail($id_product)
    {
        $data['product'] = $this->Model_Product->detail_product($id_product);

        $this->load->view('templates/header');
        $this->load->view('product_single', $data);
        $this->load->view('templates/footer');
    }

    public function shop()
    {

        $data['product'] = $this->Model_Product->tampil_data(null)->result();

        $this->load->view('templates/header');
        $this->load->view('product', $data);
        $this->load->view('templates/footer');
    }
}
