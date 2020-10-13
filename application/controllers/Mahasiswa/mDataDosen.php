<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDataDosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Session Login
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        } else {
            $role = $this->session->userdata('id_role');
            if ($role != '3') {
                redirect('Auth/access_blocked');
            }
        }
        $this->load->model('Model_Auth');
    }

    public function index()
    {
        //title
        $data['title'] = 'Data Dosen';
        $data['role'] = $this->session->userdata('id_role');

        //ambil data session login
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/m_data_dosen', $data);
        $this->load->view('templates/footer');
    }
}
