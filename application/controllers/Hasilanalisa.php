<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasilanalisa extends CI_Controller
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
        $data['judul'] = 'Hasil Analisa';
        $data['percobaan'] = $this->db->get('tb_percobaan')->result_array();
        $this->load->view('Theme/Header', $data);
        $this->load->view('Theme/MenuAdmin');
        $this->load->view('Hasilanalisa/Index');
        $this->load->view('Theme/Scripts');
    }

    public function jawaban($id_percobaan)
    {
        $data['judul'] = 'Jawaban Analisa';
        $data['percobaan'] = $this->db->get_where('tb_percobaan', ['id_percobaan' => $id_percobaan])->row_array();
        $this->db->join('tb_analisa', 'tb_analisa.id_analisa = tb_jawaban.id_analisa');
        $this->db->join('tb_percobaan', 'tb_percobaan.id_percobaan = tb_analisa.id_percobaan');
        $data['jawaban'] = $this->db->get_where('tb_jawaban', ['tb_analisa.id_percobaan' => $id_percobaan])->result_array();
        $this->load->view('Theme/Header', $data);
        $this->load->view('Theme/MenuAdmin');
        $this->load->view('Hasilanalisa/Jawaban');
        $this->load->view('Theme/Scripts');
    }
}
