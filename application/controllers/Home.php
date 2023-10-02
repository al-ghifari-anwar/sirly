<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['judul'] = $this->db->get("tb_judul")->result_array();
		$this->load->view('Theme/Header', $data);
		$this->load->view('Theme/Menu');
		$this->load->view('Home/Index');
		$this->load->view('Theme/Scripts');
	}

	public function about()
	{
		$data['judul'] = $this->db->get("tb_judul")->result_array();
		$this->load->view('Theme/Header', $data);
		$this->load->view('Theme/Menu');
		$this->load->view('About/Index');
		$this->load->view('Theme/Scripts');
	}
}
