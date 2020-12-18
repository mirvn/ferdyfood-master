<?php 
class Model_Kategori extends CI_Model{
    public function produk_nugget(){
        return $this->db->get_where("tb_product", array('category'=>'nugget'));
    }
    public function produk_kentang()
    {
        return $this->db->get_where("tb_product", array('category' => 'kentang'));
    }
    public function produk_sosis()
    {
        return $this->db->get_where("tb_product", array('category' => 'sosis'));
    }
    public function produk_bakso()
    {
        return $this->db->get_where("tb_product", array('category' => 'bakso'));
    }

}