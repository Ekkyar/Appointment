<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Session Login
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        } else {
            $role = $this->session->userdata('id_role');
            if ($role == '1') {
                redirect('Auth/access_blocked');
            }
        }
    }

    public function index()
    {
        //title
        $data['title'] = 'Profile';

        //ambil data session login
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/dosen_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['role'] = $this->session->userdata('id_role');

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('nip/nim', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Profile';
            $data['role'] = $this->session->userdata('id_role');
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/dosen_sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $this->input->post('id_user');
            $name = $this->input->post('name');
            $nipnim = $this->input->post('nip/nim');

            //upload if there is an image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('Profile/edit_profile');
                }
            }

            $this->db->set('name', $name);
            $this->db->set('nip/nim', $nipnim);
            $this->db->where('id_user', $id_user);
            $this->db->update('tb_user');


            //notif update sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Profil telah diupdate!</div>');
            redirect('Profile');
        }
    }
}
