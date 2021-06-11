<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('lokasi_model');
		$this->load->model('user_model');
	}

	public function index() 
	{
		$data['title'] = 'Partner Location | Cupo';
		$data['mitra'] = $this->user_model->getUser();
        $data['lokasi'] = $this->lokasi_model->getLokasi();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('lokasi/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Location Data | Cupo';
		$data['mitra'] = $this->user_model->getUser();
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == true) {
            if($this->lokasi_model->addLokasi()>0){
                // echo "yey berhasil";
                redirect('lokasi', 'refresh');
            } else{
                echo "yah gagal";
            }
        } else {
			echo "kliru rek hara";
            // redirect('admin/dataMitra', 'refresh');
        }
	}

	public function edit($id)
	{
		$data['title'] = 'Location Data | Cupo';
		$data['mitra'] = $this->user_model->getUser();
		$data['lokasi'] = $this->lokasi_model->getLokasibyID($id);
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        if ($this->form_validation->run() == true) {
            if($this->lokasi_model->editLokasi()>0){
                // echo "yey berhasil";
                redirect('lokasi', 'refresh');
            } else{
                echo "yah gagal";
            }
        } else {
			// echo "kliru rek hara";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('lokasi/edit', $data);
			$this->load->view('templates/footer');
            // redirect('admin/dataMitra', 'refresh');
        }
	}

	public function hapus($id)
	{
		$hapus = $this->lokasi_model->hapusLokasi($id);
        if($hapus>0){
            // echo 'yey berhasil';
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('lokasi', 'refresh');
        }  else{
            echo 'gagal cuy';
			redirect('lokasi', 'refresh');
        }
	}
}