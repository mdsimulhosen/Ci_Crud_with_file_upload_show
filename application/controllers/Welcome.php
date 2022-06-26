<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data =array();
		$data['header_section'] = $this->load->view('pages/header', '', true);
		$data['footer_section'] = $this->load->view('pages/footer', '', true);
		$this->load->view('login', $data);
	}
	public function profile()
	{
		$this->load->view('pages/profile');
	}
}
