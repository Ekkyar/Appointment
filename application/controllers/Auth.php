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
            if ($user['is_active'] == 1) {
                //sudak aktifasi
                //...
                //cek password
                if ($pass) {
                    //password benar
                    $data = [
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
                //belum aktifasi
                //..
            }
        } else {
            //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Email is not registered!</div>');
            redirect('Auth');
        }
    }

    public function register()
    {
        //Rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[tb_user.name]', [
            'is_unique' => 'Name is already registered'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Email is already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'min_length' => 'Password is too short!',
            'matches' => 'Password doesnt match'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //Register
        if ($this->form_validation->run() == False) {

            $data['role'] = $this->Model_Auth->getAllRole();
            $data['title'] = 'Register';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('v_auth/v_register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => $this->input->post('password1'),
                'id_role' => $this->input->post('id_role'),
                'is_active' => 1,
                'date_created' => time(),
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Your account has been created. Please login</div>');
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
