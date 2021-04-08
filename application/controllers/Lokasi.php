<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('lokasi_model');
	}

	public function index() 
	{
		$data['title'] = 'Lokasi Mitra | Cupo';
        $data['lokasi'] = $this->produk_model->getProduk();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('produk/index');
		$this->load->view('templates/footer');
	}
}