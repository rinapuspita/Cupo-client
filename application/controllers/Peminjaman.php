<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peminjaman_model');
	}

	public function index() 
	{
		$data['title'] = 'Data Peminjaman | Cupo';
        $data['pinjam'] = $this->peminjaman_model->getPinjam();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pinjam/index');
		$this->load->view('templates/footer');
	}
}