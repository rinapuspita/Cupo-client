<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peminjaman_model', 'pm');
		$this->load->model('pengembalian_model', 'pem');
		$this->load->model('produk_model', 'prm');
		$this->load->model('user_model', 'um');
		$this->load->model('laporan_model', 'lm');
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

	public function lap_produk()
	{
		$data['laporan'] = $this->lm->laporanProduk();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-dosen.pdf";
		$this->pdf->load_view('siakad/laporandosen', $data);
	}

	public function lap_user()
	{
		# code...
	}

}

?>
