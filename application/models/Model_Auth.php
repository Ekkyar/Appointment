<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Auth extends CI_Model
{
    //------------------------------ ROLE ------------------------------
    public function getAllRole()
    {
        return $this->db->get('tb_role')->result_array();
    }

    //------------------------------ Prodi ------------------------------
    public function getAllProdi()
    {
        return $this->db->get('tb_prodi')->result_array();
    }
}
