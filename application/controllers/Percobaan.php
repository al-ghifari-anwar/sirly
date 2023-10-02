<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Percobaan extends CI_Controller
{
    public function index($id_percobaan)
    {
        $data['judul'] = $this->db->get("tb_judul")->result_array();
        $data['percobaan'] = $this->db->get_where('tb_percobaan', ['id_percobaan' => $id_percobaan])->row_array();
        $data['materi'] = $this->db->get_where('tb_materi', ['id_percobaan' => $id_percobaan])->row_array();
        $data['petunjuk'] = $this->db->get_where('tb_petunjuk', ['id_percobaan' => $id_percobaan])->row_array();
        $this->load->view('Theme/Header', $data);
        $this->load->view('Theme/Menu');
        $this->load->view('Percobaan/Index');
        $this->load->view('Theme/Scripts');
    }
}
