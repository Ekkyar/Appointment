<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_User extends CI_Model
{
    //------------------------------ Dosen ------------------------------
    // Dosen MIF
    public function getAllDosenMif()
    {
        $id_role = 2;
        $id_prodi = 1;
        $this->db->where('id_role', $id_role);
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->get('tb_user')->result_array();
    }

    // Dosen TIF
    public function getAllDosenTif()
    {

        $id_role = 2;
        $id_prodi = 2;
        $this->db->where('id_role', $id_role);
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->get('tb_user')->result_array();
    }

    // Dosen TIF
    public function getAllDosenTkk()
    {

        $id_role = 2;
        $id_prodi = 3;
        $this->db->where('id_role', $id_role);
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->get('tb_user')->result_array();
    }

    //---------------------------- Mahasiswa ----------------------------
    // Mahasiswa MIF
    public function getAllMahasiswaMif()
    {
        $id_role = 3;
        $id_prodi = 1;
        $this->db->where('id_role', $id_role);
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->get('tb_user')->result_array();
    }

    // Mahasiswa TIF
    public function getAllMahasiswaTif()
    {

        $id_role = 3;
        $id_prodi = 2;
        $this->db->where('id_role', $id_role);
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->get('tb_user')->result_array();
    }

    // Mahasiswa TIF
    public function getAllMahasiswaTkk()
    {

        $id_role = 3;
        $id_prodi = 3;
        $this->db->where('id_role', $id_role);
        $this->db->where('id_prodi', $id_prodi);
        return $this->db->get('tb_user')->result_array();
    }

    // ---------------------------- Public ----------------------------
    public function editUser($id_user)
    {
        $data = [
            "name" => $this->input->post('name', true),
            "nip/nim" => $this->input->post('nip/nim', true),
            "id_role" => $this->input->post('id_role', true),
            "id_prodi" => $this->input->post('id_prodi', true),
        ];
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $data);
    }

    public function deleteUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');
    }
}
