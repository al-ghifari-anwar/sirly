<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('pass_user', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = $this->db->get("tb_judul")->result_array();
            $this->load->view('Theme/Header', $data);
            $this->load->view('Auth/Index');
            $this->load->view('Theme/Scripts');
        } else {
            $post = $this->input->post();
            $email_user = $post['email_user'];
            $pass_user = md5($post['pass_user']);
            $cekUser = $this->db->get_where("tb_user", ['email_user' => $email_user, 'pass_user' => $pass_user])->row_array();

            if ($cekUser) {
                $data = [
                    'id_user' => $cekUser['id_user'],
                    'nama_user' => $cekUser['nama_user'],
                    'email_user' => $cekUser['email_user']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                redirect('login');
            }
        }
    }
}
