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

	public function getMitra() 
	{
		$id = $this->session->userdata('user_id');
		$data['title'] = 'Data Pengembalian | Cupo';
        $data['kembali'] = $this->pengembalian_model->getKembaliMitra($id);
		if($data['kembali']>0){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kembali/index');
			$this->load->view('templates/footer');	
		} else{
			$this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('templates/topbar', $data);
		    $this->load->view('produk/404');
		    $this->load->view('templates/footer');
		}
		
	}

	public function editMitra($id)
	{
		$data['title'] = 'Data Peminjaman | Cupo';
		$data['kembali'] = $this->pengembalian_model->getKembaliByID($id);
        $this->form_validation->set_rules('id_kembali', 'ID Kembali', 'required');
        if ($this->form_validation->run() == true) {
			if($this->pengembalian_model->update()>0){
				echo "yey berhasil";
				redirect('pengembalian/getMitra', 'refresh');
			} else{
				echo "yah gagal";
			}
		} else{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kembali/edit', $data);
			$this->load->view('templates/footer');
		}
	}

	public function hapusMitra($id)
	{
		$hapus = $this->pengembalian_model->delete($id);
        if($hapus>0){
            echo 'yey berhasil';
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('pengembalian/getMitra', 'refresh');
        }  else{
            echo 'gagal cuy';
			redirect('pengembalian/getMitra', 'refresh');
        }
	}
}