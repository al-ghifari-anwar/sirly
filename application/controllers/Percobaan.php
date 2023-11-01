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
        $data['analisa'] = $this->db->get_where('tb_analisa', ['id_percobaan' => $id_percobaan])->row_array();
        $this->load->view('Theme/Header', $data);
        $this->load->view('Theme/Menu');
        $this->load->view('Percobaan/Index');
        $this->load->view('Theme/Scripts');
    }

    public function post_analisa()
    {
        $post = $this->input->post();

        $data = [
            'id_analisa' => $post['id_analisa'],
            'nama_jawaban' => $post['nama_jawaban'],
            'jawaban' => $post['jawaban']
        ];

        $insert = $this->db->insert('tb_jawaban', $data);

        if ($insert) {
            redirect('percobaan/' . $post['id_percobaan']);
        } else {
            redirect('percobaan/' . $post['id_percobaan']);
        }
    }
}
