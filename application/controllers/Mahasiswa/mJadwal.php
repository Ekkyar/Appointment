<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mJadwal extends CI_Controller
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
        $this->load->model('Model_FullCalendar');
        $this->load->model('Model_User');
    }

    public function index()
    {
        //title
        $data['title'] = 'Jadwal';
        $data['role'] = $this->session->userdata('id_role');

        //ambil data session login
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        // Tampil Dosen
        $data['mif'] = $this->Model_User->getAllDosenMif();
        $data['tif'] = $this->Model_User->getAllDosenTif();
        $data['tkk'] = $this->Model_User->getAllDosenTkk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/mahasiswa_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/m_jadwal', $data);
        $this->load->view('templates/footer');
    }

    function load()
    {
        $event_data = $this->Model_FullCalendar->fetch_all_event();
        foreach ($event_data->result_array() as $row) {
            $data[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'start' => $row['start_event'],
                'end' => $row['end_event']
            );
        }
        echo json_encode($data);
    }

    function insert()
    {
        if ($this->input->post('title')) {
            $data = array(
                'title'  => $this->input->post('title'),
                'start_event' => $this->input->post('start'),
                'end_event' => $this->input->post('end')
            );
            $this->Model_FullCalendar->insert_event($data);
        }
    }

    function update()
    {
        if ($this->input->post('id')) {
            $data = array(
                'title'   => $this->input->post('title'),
                'start_event' => $this->input->post('start'),
                'end_event'  => $this->input->post('end')
            );

            $this->Model_FullCalendar->update_event($data, $this->input->post('id'));
        }
    }

    function delete()
    {
        if ($this->input->post('id')) {
            $this->Model_FullCalendar->delete_event($this->input->post('id'));
        }
    }
}
