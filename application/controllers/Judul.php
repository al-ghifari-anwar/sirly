<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Judul extends CI_Controller
{
    public function index($id_judul)
    {
        $data['judul'] = $this->db->get("tb_judul")->result_array();
        $data['percobaan'] = $this->db->get_where('tb_percobaan', ['id_judul' => $id_judul])->result_array();
        $this->load->view('Theme/Header', $data);
        $this->load->view('Theme/Menu');
        $this->load->view('Judul/Index');
        $this->load->view('Theme/Scripts');
    }
}
