<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function tambah_aksi()
    {
        $nama   = $this->input->post('nama');
        $username    = $this->input->post('username');
        $password       = $this->input->post('password');
        $role          = $this->input->post('role');

        $data = array(
            'nama'  => $nama,
            'username'   => $username,
            'password'      => $password,
            'role'         => $role
        );
        $this->Model_User->tambah_user($data, 'tb_user');
        $this->session->set_flashdata([
            'type' => 1,
            'message' => 'Berhasil menambah user'
        ]);
        redirect('admin/user');
    }

    public function update()
    {

        $id = $this->input->post('id');
        $nama   = $this->input->post('nama');
        $username    = $this->input->post('username');
        $password       = $this->input->post('password');
        $role          = $this->input->post('role');

        $data = array(
            'nama'  => $nama,
            'username'   => $username,
            'password'      => $password,
            'role'         => $role
        );

        $where = array(
            'id_user' => $id
        );
        $this->Model_User->update_user($where, $data, 'tb_user');
        $this->session->set_flashdata([
            'type' => 1,
            'message' => 'Berhasil merubah user'
        ]);
        redirect('admin/user');
    }

    public function hapus($id)
    {
        $where = array('id_user' => $id);
        $this->Model_User->hapus_user($where, 'tb_user');
        $this->session->set_flashdata([
            'type' => 1,
            'message' => 'Berhasil menghapus user'
        ]);
        redirect('admin/user');
    }

    public function detail()
    {
        echo json_encode($this->Model_User->detail_user($this->input->post('id'))->row_array());
    }
}
