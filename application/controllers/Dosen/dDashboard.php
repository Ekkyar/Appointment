<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dDashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Session Login
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        } else {
            $role = $this->session->userdata('id_role');
            if ($role != '2') {
                redirect('Auth/access_blocked');
            }
        }
        $this->load->model('Model_Auth');
    }

    public function index()
    {
        //title
        $data['title'] = 'Dashboard';
        $data['role'] = $this->session->userdata('id_role');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dosen/d_dashboard', $data);
        $this->load->view('templates/footer');
    }
}
