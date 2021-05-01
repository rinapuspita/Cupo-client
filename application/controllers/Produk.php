<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
        $this->load->model('user_model');
	}

	public function index() 
	{
		$data['title'] = 'Data Produk | Cupo';
        $data['produk'] = $this->produk_model->getProduk();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('produk/index');
		$this->load->view('templates/footer');
	}

    public function dataMitra()
    {
        $id = $this->session->userdata('user_id');
        $data['title'] = 'Data Produk | Cupo';
        $data['produk'] = $this->produk_model->getM_Produk($id);
        if($data['produk']>0){
            $this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('produk/index');
		    $this->load->view('templates/footer');    
        } else{
            $this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('produk/404');
		    $this->load->view('templates/footer');    
        }
    }

    public function dataAdmin()
    {
        $id = 1;
        $data['title'] = 'Data Produk | Cupo';
        $data['produk'] = $this->produk_model->getM_Produk($id);
        $data['mitra'] = $this->user_model->getUser();
        if($data['produk']>0){
            $this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('produk/distribusi');
		    $this->load->view('templates/footer');    
        } else{
            $this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('produk/404');
		    $this->load->view('templates/footer');    
        }
    }

    public function getcupKotor()
    {
        $data['title'] = 'Maintenance Produk | Cupo';
        $data['produk'] = $this->produk_model->getProdukKotor();
        if($data['produk']>0){
            $this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('produk/maintenance');
		    $this->load->view('templates/footer');    
        } else{
            $this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('produk/404');
		    $this->load->view('templates/footer');    
        }
    }

    public function cuciCup($id)
    {
        $data['title'] = 'Data Produk | Cupo';
        $data['produk'] = $this->produk_model->getCuci($id);
        if($data['produk']){
            redirect('produk/getcupKotor', 'refresh');
        } else{
            echo 'gagal';
        }
    }

    public function distribusi()
    {
        $data['title'] = 'Distribusi Produk | Cupo';
        $data['mitra'] = $this->user_model->getUser();
        $id = $this->input->post('id_produk');
        $lokasi = $this->input->post('id_mitra');
        $data['produk'] = $this->produk_model->updateLokasi($lokasi, $id);
        if($data['produk']){
            redirect('produk/dataAdmin', 'refresh');
        } else{
            echo 'gagal';
        }
    }

    public function add()
    {
        $data['title'] = 'Data Produk | Cupo';
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        if ($this->form_validation->run() == true) {
            if($this->produk_model->addProduk()>0){
                echo "yey berhasil";
                redirect('produk', 'refresh');
            } else{
                echo "yah gagal";
            }

          } else {
            redirect('produk', 'refresh');
          }
    }

    public function edit($id)
    {
        $data['title'] = 'Data Produk | Cupo';
        $data['produk'] = $this->produk_model->getProdukByID($id);
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        if ($this->form_validation->run() == true) {
            if($this->produk_model->editProduk()>0){
                // echo "yey berhasil";
                redirect('produk', 'refresh');
            } else{
                echo "yah gagal";
            }
          } else {
            $this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('produk/edit', $data);
		    $this->load->view('templates/footer'); 
          }
    }

    public function hapus($id)
    {
        $hapus = $this->produk_model->delete($id);
        if($hapus>0){
            echo 'yey berhasil';
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('produk');
        }  else{
            echo 'gagal cuy';
            redirect('produk');
        }
    }

	public function qr_pdf($id)
	{
		$this->load->library('pdf');
        $data['produk'] = $this->produk_model->getProdukID($id);
		// $data['produk'] = $this->produk_model->getProduk();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "print_qr.pdf";
		$this->pdf->load_view('produk/print', $data);
	}
}	