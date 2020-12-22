<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dChat extends CI_Controller
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
        $data['title'] = 'Chat';

        //ambil data session login
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $list = $this->db->get_where('tb_chat', ['id_dosen' => $data['user']['id_user']])->result_array();
        $arr2 = array_map(function($person) {
            $detailUser = $this->db->get_where('tb_user', ['id_user' => $person['id_user']])->row_array();
            $fromBy = $detailUser['name'];
            $idChat = $person['id'];
            $detailChat = $this->db->query("SELECT * FROM tb_reply_chat WHERE id_chat = '$idChat' ORDER BY id DESC")->row_array();
            return [
                    "id" => $person['id'],
                    "id_user" => $fromBy,
                    "topic" => $person['topic'],
                    "update_time" => $detailChat['update_time']
            ];
        }, $list);

        $data['chatList'] = $arr2;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/dosen_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dosen/d_chat', $data);
        $this->load->view('templates/footer_dosen',$data);
    }

    public function sendReply() 
    {
        $data = [
            'id_chat' => $this->input->post('id_chat'),
            'id_role' => $this->session->userdata('id_role'),
            'from_by' => $this->input->post('id_user'),
            'message' => $this->input->post('message')
        ];
        
        return $this->db->insert('tb_reply_chat', $data);
    }

    public function show($id) 
    {
        $data['title'] = "Chat Pribadi";
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_role', ['id_role' => $this->session->userdata('id_role')])->row_array();
        $data['chatList'] = $this->db->get_where('tb_chat', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/dosen_sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dosen/d_show', $data);
        $this->load->view('templates/footer_dosen');
    }

    public function chat_ajax($id) {
        $data = $this->db->get_where('tb_reply_chat', ['id_chat' => $id])->result_array();
        $arr2 = array_map(function($person) {
            $idChat = $person['id_chat'];
            $detailUser = $this->db->get_where('tb_user', ['id_user' => $person['from_by']])->row_array();
            $fromBy = $detailUser['name'];
            return [
                    "id_role" => $person['id_role'],
                    "from_by" => $fromBy,
                    "message" => $person['message'],
                    "update_time" => $person['update_time']
            ];
        }, $data);
        echo json_encode($arr2);
    }
    

}
