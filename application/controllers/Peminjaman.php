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
		$data['title'] = 'Loan Data | Cupo';
        $data['pinjam'] = $this->peminjaman_model->getPinjam();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pinjam/index');
		$this->load->view('templates/footer');
	}

	public function getMitra() 
	{
		$id = $this->session->userdata('user_id');
		$data['title'] = 'Loan Data | Cupo';
        $data['pinjam'] = $this->peminjaman_model->getMitraPinjam($id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pinjam/index');
		$this->load->view('templates/footer');
	}

	public function getMitraAktivasi() 
	{
		$id = $this->session->userdata('user_id');
		$data['title'] = 'Loan Data | Cupo';
        $data['pinjam'] = $this->peminjaman_model->getPinjamActive($id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pinjam/aktivasi');
		$this->load->view('templates/footer');
	}

	public function accPinjam($id)
	{
		$data['title'] = 'Loan Activation | Cupo';
        $data['pinjam'] = $this->peminjaman_model->aktivasiAcc($id);
        if($data['pinjam']){
            redirect('peminjaman/getMitra', 'refresh');
        } else{
            echo 'gagal';
        }
	}

	public function getMitraToday() 
	{
		$id = $this->session->userdata('user_id');
		$data['title'] = 'Loan Data Today | Cupo';
        $data['pinjam'] = $this->peminjaman_model->getMitraPinjamToday($id);
		if($data['pinjam']>0){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pinjam/listToday');
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
		$data['title'] = 'Loan Data | Cupo';
		$data['pinjam'] = $this->peminjaman_model->getPinjamByID($id);
        // var_dump($data['pinjam']); die;
		$this->form_validation->set_rules('id_pinjam', 'ID Pinjam', 'required');
        if ($this->form_validation->run() == true) {
			if($this->peminjaman_model->update()>0){
				echo "yey berhasil";
				redirect('peminjaman/getMitra', 'refresh');
			} else{
				echo "yah gagal";
			}
		} else{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pinjam/edit', $data);
			$this->load->view('templates/footer');
		}
        // redirect('admin/dataMitra', 'refresh');
	}

	public function hapusMitra($id)
	{
		$hapus = $this->peminjaman_model->delete($id);
        if($hapus>0){
            echo 'yey berhasil';
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('peminjaman/getMitra', 'refresh');
        }  else{
            echo 'gagal cuy';
			redirect('peminjaman/getMitra', 'refresh');
        }
	}
}