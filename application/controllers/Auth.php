<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Auth');
    }

    public function index()
    {
        //Rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            //form_validasi gagal
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('v_auth/v_login');
            $this->load->view('templates/auth_footer');
        } else {
            //form_validasi berhasil
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        $pass = $this->db->get_where('tb_user', ['password' => $password])->row_array();

        //cek user
        if ($user) {
            //usernya ada

            //cek password
            if ($pass) {
                //password benar
                $data = [
                    'id_user' => $user['id_user'],
                    'email' => $user['email'],
                    'id_role' => $user['id_role']
                ];

                //buat session
                $this->session->set_userdata($data);

                //cek status
                if ($data['id_role'] == '1') {
                    redirect('Admin/aDashboard');
                } else if ($data['id_role'] == '2') {
                    redirect('Dosen/dDashboard');
                } else if ($data['id_role'] == '3') {
                    redirect('Mahasiswa/mDashboard');
                }
            } else {
                // password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Wrong Password!</div>');
                redirect('Auth');
            }
        } else {
            //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Email is not registered!</div>');
            redirect('Auth');
        }
    }

    public function forgot_password()
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('v_auth/v_forgot_password');
        $this->load->view('templates/auth_footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">You have been logged out!</div>');
        redirect('Auth');
    }

    public function access_blocked()
    {
        $this->load->view('v_access_blocked');
    }
}
