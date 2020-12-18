<?php
class Model_User extends CI_Model
{
    public function login($username, $password)
    {
        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'id' => $user['id_user'],
                    'nama' => $user['nama'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 1) {
                    $this->session->set_flashdata([
                        'type' => 1,
                        'message' => 'Login Berhasil'
                    ]);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata([
                        'type' => 1,
                        'message' => 'Login Berhasil'
                    ]);
                    redirect('kasir');
                }
            } else {
                $this->session->set_flashdata([
                    'type' => 3,
                    'message' => 'Login Gagal'
                ]);
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata([
                'type' => 3,
                'message' => 'Login Gagal'
            ]);
            redirect('auth');
        }
    }

    public function tambah_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function tampil_user()
    {
        return $this->db->get('tb_user');
    }

    public function detail_user($id)
    {
        return $this->db->get_where('tb_user', array('id_user' => $id));
    }
}
