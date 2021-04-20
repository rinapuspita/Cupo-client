<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() 
	{
		$data['title'] = 'Data Laporan | Cupo';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan');
		$this->load->view('templates/footer');
	}

}

?>
