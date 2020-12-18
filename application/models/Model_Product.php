<?php
class Model_Product extends CI_Model
{
    public function tampil_data($category)
    {
        if ($category == '') {
            return $this->db->get('tb_product');
        } else {
            return $this->db->get_where('tb_product', array('category' => $category));
        }
    }

    public function tampil_kategori()
    {
        $this->db->distinct();
        $this->db->select('category');
        return $this->db->get('tb_product');
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_product($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_product', $id)
            ->limit(1)
            ->get('tb_product');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_product($id)
    {
        return $this->db->get_where('tb_product', array('id_product' => $id));
    }

    public function updateStock($stock, $id)
    {
        $query = "
            UPDATE `tb_product` SET `stock` = `stock` + '$stock' WHERE `id_product` = '$id'
        ";

        return $this->db->query($query);
    }
}
