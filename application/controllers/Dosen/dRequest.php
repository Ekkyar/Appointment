<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dRequest extends CI_Controller
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
        $this->load->model('Model_User');
    }

    public function index()
    {
        //title
        $data['title'] = 'Request';

        //ambil data session login
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['mRequest'] = $this->db->get_where('tb_event', ['id_dosen' => $data['user']['id_user'], 'status' => 'waiting'])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/dosen_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dosen/d_request', $data);
        $this->load->view('templates/footer');
    }

    public function accept() {
        $id = $this->uri->segment(4);
        $data = [
            'status' => 'accept'
        ];
        $this->db->where('id', $id);
        $this->db->update('tb_event', $data);
        redirect('Dosen/dRequest');
    }
    public function reject(){
        $id = $this->uri->segment(4);
        $data = [
            'status' => 'reject'
        ];
        $this->db->where('id', $id);
        $this->db->update('tb_event', $data);
        redirect('Dosen/dRequest');
    }
}
