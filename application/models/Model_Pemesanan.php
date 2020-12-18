<?php
class Model_Pemesanan extends CI_Model
{
    public function get_pemesanan()
    {
        $query = "
        SELECT 'tb_invoice'.'id','tb_invoice'.'nama','tb_invoice'.'alamat','tb_invoice'.'tgl_pesan','tb_invoice'.'batas_bayar','tb_pesanan'.'id',
        'tb_pesanan'.'id_invoice','tb_pesanan'.'id_product','tb_pesanan'.'name_product',t'b_pesanan'.'qty','tb_pesanan'.'price','tb_pesanan'.'pilihan'
        FROM 'tb_invoice'
        JOIN 'tb_pesanan' 
        ON 'tb_pesanan'.'id' = 'tb_invoice'.'id'
        ";
        
        return $this->db->query($query)->result_array();
    }

}

