<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('id_user') == null) {
            redirect('home');
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $this->load->view('Theme/Header', $data);
        $this->load->view('Theme/MenuAdmin');
        $this->load->view('Dashboard/Index');
        $this->load->view('Theme/Scripts');
    }
}
