<?php
class Product extends CI_Controller
{
    public function refresh()
    {
        $category = $this->input->post('category');
    }
    // public function index(){

    //     $data['product'] = $this->Model_Product->tampil_data()->result();

    //     $this->load->view('backend/templates/header');
    //     $this->load->view('backend/templates/sidebar');
    //     $this->load->view('backend/product',$data);
    //     $this->load->view('backend/templates/footer');
    // }

    public function tambah_aksi()
    {
        $name_product   = $this->input->post('name_product');
        $information    = $this->input->post('information');
        $category       = $this->input->post('category');
        $price          = $this->input->post('price');
        $stock          = $this->input->post('stock');
        $image          = $_FILES['image']['name'];
        if ($image       = '') {
        } else {
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "gambar gagal diupload";
            } else {
                $image = $this->upload->data('file_name');
            }
        }
        $data = array(
            'name_product'  => $name_product,
            'information'   => $information,
            'category'      => $category,
            'price'         => $price,
            'stock'         => $stock,
            'image'         => $image
        );
        $this->Model_Product->tambah_barang($data, 'tb_product');
        $this->session->set_flashdata([
            'type' => 1,
            'message' => 'Berhasil menambah produk'
        ]);
        redirect('admin/produk');
    }

    public function update()
    {
        $id             = $this->input->post('id');
        $name_product   = $this->input->post('name_product');
        $information    = $this->input->post('information');
        $category       = $this->input->post('category');
        $price          = $this->input->post('price');
        $stock          = $this->input->post('stock');
        $image          = $_FILES['image']['name'];

        if ($image       == "") {
            $data = array(
                'name_product'  => $name_product,
                'information'   => $information,
                'category'      => $category,
                'price'         => $price,
                'stock'         => $stock
            );
        } else {
            $config['upload_path'] = './assets/images/uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "gambar gagal diupload";
            } else {
                $image = $this->upload->data('file_name');
            }
            $data = array(
                'name_product'  => $name_product,
                'information'   => $information,
                'category'      => $category,
                'price'         => $price,
                'stock'         => $stock,
                'image'         => $image
            );
        }

        $where = array(
            'id_product' => $id
        );

        $this->Model_Product->update_data($where, $data, 'tb_product');
        $this->session->set_flashdata([
            'type' => 1,
            'message' => 'Berhasil merubah produk'
        ]);
        redirect('admin/produk');
    }

    public function updateStock()
    {
        $id = $this->input->post('id_product');
        $stock = $this->input->post('stock');

        $this->Model_Product->updateStock($stock, $id);
        $this->session->set_flashdata([
            'type' => 1,
            'message' => 'Berhasil menambah stok'
        ]);
        redirect('admin/produk');
    }

    public function hapus($id)
    {
        $where = array('id_product' => $id);
        $this->Model_Product->hapus_data($where, 'tb_product');
        $this->session->set_flashdata([
            'type' => 1,
            'message' => 'Berhasil menghapus produk'
        ]);
        redirect('admin/produk');
    }

    public function detail()
    {
        echo json_encode($this->Model_Product->detail_product($this->input->post('id'))->row_array());
    }
}
