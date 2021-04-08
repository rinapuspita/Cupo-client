<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengembalian_model');
	}

	public function index() 
	{
		$data['title'] = 'Data Pengembalian | Cupo';
        $data['kembali'] = $this->pengembalian_model->getKembali();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kembali/index');
		$this->load->view('templates/footer');
	}
}