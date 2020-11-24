<?php
defined('BASEPATH') or exit('No direct script access allowed');

class aDataMahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Session Login
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        } else {
            $role = $this->session->userdata('id_role');
            if ($role != '1') {
                redirect('Auth/access_blocked');
            }
        }
        $this->load->model('Model_Auth');
        $this->load->model('Model_User');
    }
    public function index()
    {
        //title
        $data['title'] = 'Data Mahasiswa';

        //ambil data session login
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();

        //model
        $data['mahasiswa_mif'] = $this->Model_User->getAllMahasiswaMif();
        $data['mahasiswa_tif'] = $this->Model_User->getAllMahasiswaTif();
        $data['mahasiswa_tkk'] = $this->Model_User->getAllMahasiswaTkk();
        $data['getrole'] = $this->Model_Auth->getAllRole();
        $data['getprodi'] = $this->Model_Auth->getAllProdi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/a_data_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function insert_mahasiswa_mif()
    {
        //Rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nip/nim', 'Nim', 'required|trim');
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
            //notif gagal form
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data mahasiswa gagal ditambahkan!</div>');
            redirect('Admin/aDataMahasiswa');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nip/nim' => htmlspecialchars($this->input->post('nip/nim', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => $this->input->post('password1'),
                'id_role' => 3,
                'id_prodi' => 1,
                'image' => 'default.png',
                'date_created' => time(),
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mahasiswa berhasil ditambahkan!</div>');
            redirect('Admin/aDataMahasiswa');
        }
    }

    public function insert_mahasiswa_tif()
    {
        //Rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nip/nim', 'Nip', 'required|trim');
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
            //notif gagal form
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data mahasiswa gagal ditambahkan!</div>');
            redirect('Admin/aDataMahasiswa');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nip/nim' => htmlspecialchars($this->input->post('nip/nim', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => $this->input->post('password1'),
                'id_role' => 3,
                'id_prodi' => 2,
                'image' => 'default.png',
                'date_created' => time(),
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mahasiswa berhasil ditambahkan!</div>');
            redirect('Admin/aDataMahasiswa');
        }
    }

    public function insert_mahasiswa_tkk()
    {
        //Rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nip/nim', 'Nip', 'required|trim');
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
            //notif gagal form
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data mahasiswa gagal ditambahkan!</div>');
            redirect('Admin/aDataMahasiswa');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nip/nim' => htmlspecialchars($this->input->post('nip/nim', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => $this->input->post('password1'),
                'id_role' => 3,
                'id_prodi' => 3,
                'image' => 'default.png',
                'date_created' => time(),
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mahasiswa berhasil ditambahkan!</div>');
            redirect('Admin/aDataMahasiswa');
        }
    }

    public function ubah_user($id_user)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nip/nim', 'Nip', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            //notif gagal form
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data mahasiswa gagal diupdate!</div>');
            redirect('Admin/aDataMahasiswa');
        } else {
            //form validasi sukses
            //model edit mahasiswa
            $this->Model_User->editUser($id_user);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mahasiswa telah diupdate..</div>');
            redirect('Admin/aDataMahasiswa');
        }
    }

    public function delete_user($id_user)
    {
        //model delete
        $this->Model_User->deleteUser($id_user);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data mahasiswa berhasil dihapus..</div>');
        redirect('Admin/aDataMahasiswa');
    }
}
