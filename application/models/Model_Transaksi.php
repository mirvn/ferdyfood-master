<?php
class Model_Transaksi extends CI_Model
{
    // public function tampil_data($category)
    // {
    //     if ($category == '') {
    //         return $this->db->get('tb_product');
    //     } else {
    //         return $this->db->get_where('tb_product', array('category' => $category));
    //     }
    // }

    public function transaksi($type, $x, $y)
    {
        $query = "
            SELECT
            `tb_transaksi`.`id_transaksi`, `tb_transaksi`.`tanggal`, `tb_user`.`nama`,
            `tb_product`.`id_product`, `tb_product`.`name_product`, `tb_detail_transaksi`.`qty`, `tb_product`.`price`, `tb_detail_transaksi`.`subtotal`
            FROM `tb_user`
            JOIN `tb_transaksi`
            ON `tb_user`.`id_user` = `tb_transaksi`.`kasir_id`
            JOIN `tb_detail_transaksi`
            ON `tb_detail_transaksi`.`transaksi_id` = `tb_transaksi`.`id_transaksi`
            JOIN `tb_product`
            ON `tb_product`.`id_product` = `tb_detail_transaksi`.`produk_id`
        ";

        if ($type == 'date') {
            return $this->db->query($query . "WHERE `tb_transaksi`.`tanggal` BETWEEN '$x' AND '$y'");
        } else {
            return $this->db->query($query);
        }
    }

    public function filter_transaksi($from, $to)
    {
        $query = "
        SELECT
        `tb_transaksi`.`id_transaksi`, `tb_transaksi`.`tanggal`, `tb_user`.`nama`,
        `tb_product`.`id_product`, `tb_product`.`name_product`, `tb_detail_transaksi`.`qty`, `tb_product`.`price`, `tb_detail_transaksi`.`subtotal`
        FROM `tb_user`
        JOIN `tb_transaksi`
        ON `tb_user`.`id_user` = `tb_transaksi`.`kasir_id`
        JOIN `tb_detail_transaksi`
        ON `tb_detail_transaksi`.`transaksi_id` = `tb_transaksi`.`id_transaksi`
        JOIN `tb_product`
        ON `tb_product`.`id_product` = `tb_detail_transaksi`.`produk_id`
        WHERE `tb_transaksi`.`tanggal` BETWEEN '$from' AND '$to'
        ";

        return $this->db->query($query);
    }

    public function nota_transaksi()
    {
        $id = $this->getLastId();
        $query = "
            SELECT
            `tb_transaksi`.`id_transaksi`, `tb_transaksi`.`tanggal`, `tb_transaksi`.`total`, `tb_user`.`id_user`, `tb_user`.`nama`
            FROM `tb_transaksi`
            JOIN `tb_user`
            ON `tb_transaksi`.`kasir_id` = `tb_user`.`id_user`
            WHERE `tb_transaksi`.`id_transaksi` = '$id'
        ";

        return $this->db->query($query);
    }

    public function nota_detail_transaksi()
    {
        $id = $this->getLastId();
        $query = "
            SELECT
            `tb_product`.`id_product`, `tb_product`.`name_product`, `tb_detail_transaksi`.`qty`, `tb_product`.`price`, `tb_detail_transaksi`.`subtotal`
            FROM `tb_user`
            JOIN `tb_transaksi`
            ON `tb_user`.`id_user` = `tb_transaksi`.`kasir_id`
            JOIN `tb_detail_transaksi`
            ON `tb_detail_transaksi`.`transaksi_id` = `tb_transaksi`.`id_transaksi`
            JOIN `tb_product`
            ON `tb_product`.`id_product` = `tb_detail_transaksi`.`produk_id`
            WHERE `tb_transaksi`.`id_transaksi` = '$id'
        ";

        return $this->db->query($query);
    }

    public function getLastId()
    {
        $this->db->select_max('id_transaksi', 'id');
        $query = $this->db->get('tb_transaksi')->row_array();

        return $query['id'];
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function jumlah_transaksi($type, $date)
    {
        $query = "SELECT SUM(`total`) AS 'total', COUNT(`total`) AS 'jumlah' FROM `tb_transaksi` ";
        if ($type == 1) {
            $query = $query . "WHERE `tanggal` = '$date'";
        } else if ($type == 2) {
            $query = $query . "WHERE MONTH(`tanggal`) = MONTH('$date')";
        } else {
            $query;
        }
        return $this->db->query($query);
    }

    public function produk_terjual($type, $date)
    {
        $query = "SELECT COUNT(`tb_detail_transaksi`.`subtotal`) AS 'jumlah' 
                FROM `tb_detail_transaksi` 
                JOIN `tb_transaksi`
                ON `tb_transaksi`.`id_transaksi` = `tb_detail_transaksi`.`transaksi_id` 
        ";

        if ($type == 1) {
            $query = $query . "WHERE `tb_transaksi`.`tanggal` = '$date'";
        } else if ($type == 2) {
            $query = $query . "WHERE MONTH(`tb_transaksi`.`tanggal`) = MONTH('$date')";
        } else {
            $query;
        }
        return $this->db->query($query);
    }

    public function chart()
    {
        $date = date('Y-m-d');

        $query = "
            SELECT DAY(`tanggal`) AS 'tanggal', SUM(`total`) AS 'total' FROM `tb_transaksi` WHERE MONTH(`tanggal`) = MONTH('$date') GROUP BY `tanggal`
        ";

        return $this->db->query($query);
    }
}
