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

		$this->load->library('pdf');
        $data['produk'] = $this->prm->getProduk();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan_produk.pdf";
		$this->pdf->load_view('produk/laporan', $data);
	}

	public function lap_user()
	{
		$this->load->library('pdf');
        $data['user'] = $this->um->getUser();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan_mitra.pdf";
		$this->pdf->load_view('admin/laporanMitra', $data);
	}

	public function lap_cust()
	{
		$this->load->library('pdf');
        $data['user'] = $this->um->getCust();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan_cust.pdf";
		$this->pdf->load_view('admin/laporanCust', $data);
	}

	public function lap_pinjam()
	{
		$this->load->library('pdf');
        $data['pinjam'] = $this->pm->getPinjam();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan_pinjam.pdf";
		$this->pdf->load_view('pinjam/laporan', $data);
	}

	public function lap_kembali()
	{
		$this->load->library('pdf');
        $data['kembali'] = $this->pem->getKembali();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan_kembali.pdf";
		$this->pdf->load_view('kembali/laporan', $data);
	}

}

?>
