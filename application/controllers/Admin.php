<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('lokasi_model');
		$this->load->model('produk_model');
		$this->load->model('peminjaman_model');
		$this->load->model('pengembalian_model');
	}

	public function index() 
	{
		$token = $this->session->userdata('token');
		$data['user'] = $this->user_model->getLogin($token);
		$data['produk'] = $this->produk_model->hitungProduk();
		$data['cust'] = $this->user_model->hitungCust();
		$data['user'] = $this->user_model->hitung();
		$data['lokasi'] = $this->lokasi_model->hitung();
		$data['pinjam'] = $this->peminjaman_model->hitungPinjam();
		$data['kembali'] = $this->pengembalian_model->hitungKembali();
		$data['title'] = 'Dashboard';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function dataMitra()
	{
		$data['title'] = 'Partner Data | Cupo';
        $data['user'] = $this->user_model->getUser();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/mitra');
			$this->load->view('templates/footer');
	}

	public function accUser($id)
	{
		$data['title'] = 'Account Activation | Cupo';
        $data['unreg'] = $this->user_model->aktivasiAcc($id);
        if($data['unreg']){
            redirect('admin/dataMitra', 'refresh');
        } else{
            echo 'gagal';
        }
	}

	public function dataMitraActiv()
	{
		$data['title'] = 'Activation Partner Data | Cupo';
		$data['unreg'] = $this->user_model->getUserActive();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/mitraAktif');
		$this->load->view('templates/footer');
	}

	public function dataCust()
	{
		$data['title'] = 'Customer Data | Cupo';
        $data['user'] = $this->user_model->getCust();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/customer');
		$this->load->view('templates/footer');
	}

	public function dataCustActiv()
	{
		$data['title'] = 'Activation Customer Data | Cupo';
		$data['unreg'] = $this->user_model->getCustActive();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/custAktif');
		$this->load->view('templates/footer');
	}

	public function accCust($id)
	{
		$data['title'] = 'Activation Account | Cupo';
        $data['unreg'] = $this->user_model->aktivasiCust($id);
        if($data['unreg']){
            redirect('admin/dataCust', 'refresh');
        } else{
            echo 'gagal';
        }
	}

	public function addMitra()
    {
        $data['title'] = 'Partner Data | Cupo';
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[60]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[25]');
        if ($this->form_validation->run() == true) {
            if($this->user_model->userRegister()>0){
                // echo "yey berhasil";
                redirect('admin/dataMitraActiv', 'refresh');
            } else{
                echo "yah gagal";
            }
        } else {
			echo "kliru rek hara";
            // redirect('admin/dataMitra', 'refresh');
        }
    }

	public function addCust()
    {
        $data['title'] = 'Customer Data | Cupo';
        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == true) {
            if($this->user_model->custRegister()>0){
                // echo "yey berhasil";
                redirect('admin/dataCustActiv', 'refresh');
            } else{
                echo "yah gagal";
            }

          } else {
            redirect('admin/dataCust', 'refresh');
          }
    }

	public function dataAdmin()
	{
		$id = $this->session->userdata('user_id');
		$data['title'] = 'User Profile';
		// $data['user'] = $this->user_model->getLogin();
		$data['user'] = $this->user_model->getUserByID($id);
		$this->session->set_userdata('name',  $data['user']["fullname"]);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function editAdmin($id)
	{
		$data['title'] = 'Edit User Data | Cupo';
		$data['user'] = $this->user_model->getUserByID($id);
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[60]');

        if ($this->form_validation->run() == true) {
            if($this->user_model->editMitra()>0){
                // echo "yey berhasil";
                redirect('admin/dataAdmin', 'refresh');
            } else{
                echo "yah gagal";
            }
        } else {
			// echo "kliru rek hara";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
            // redirect('admin/dataMitra', 'refresh');
        }
	}

	public function editPassword($id)
	{
		$data['title'] = 'Edit Password | Cupo';
		$data['user'] = $this->user_model->getUserByID($id);
		$this->form_validation->set_rules('password', 'Password Lama', 'trim|required'|'callback_cekPwLama');
    	$this->form_validation->set_rules('passwordBaru', 'Password Baru', 'trim|required');
    	$this->form_validation->set_rules('passwordConf', 'Konfirmasi Password', 'trim|required|matches[passwordBaru]');
		if ($this->form_validation->run() == true) {
            if($this->user_model->editMitra()>0){
                // echo "yey berhasil";
                redirect('admin/dataAdmin', 'refresh');
            } else{
                echo "yah gagal";
            }
        } else {
			// echo "kliru rek hara";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changePass', $data);
			$this->load->view('templates/footer');
            // redirect('admin/dataMitra', 'refresh');
        }
	}

	public function cekPwLama()
	{
		$id = $this->session->userdata('user_id');
		$data['user'] = $this->user_model->getUserByID($id);
		// var_dump($dataAdmin[0]->password);
		if ($data['user']['password'] == md5($this->input->post('password'))) {
			return true;
		} else {
			return false;
		}

	}

	public function editMitra($id)
	{
		$data['title'] = 'Partner Data | Cupo';
		$data['user'] = $this->user_model->getUserByID($id);
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[60]');
        if ($this->form_validation->run() == true) {
            if($this->user_model->editMitra()>0){
                // echo "yey berhasil";
                redirect('admin/dataMitra', 'refresh');
            } else{
                echo "yah gagal";
            }
        } else {
			// echo "kliru rek hara";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editMitra', $data);
			$this->load->view('templates/footer');
            // redirect('admin/dataMitra', 'refresh');
        }
	}

	public function editCust($id)
	{
		$data['title'] = 'Customer Data | Cupo';
		$data['user'] = $this->user_model->getCustByID($id);
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[60]');
        if ($this->form_validation->run() == true) {
            if($this->user_model->editCust()>0){
                // echo "yey berhasil";
                redirect('admin/dataCust', 'refresh');
            } else{
                echo "yah gagal";
            }
        } else {
			// echo "kliru rek hara";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/editCust', $data);
			$this->load->view('templates/footer');
            // redirect('admin/dataMitra', 'refresh');
        }
	}

	public function hapusMitra($id)
	{
		$hapus = $this->user_model->hapusMitra($id);
        if($hapus>0){
            // echo 'yey berhasil';
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('admin/dataMitra', 'refresh');
        }  else{
            echo 'gagal cuy';
			redirect('admin/dataMitra', 'refresh');
        }
	}

	public function hapusCust($id)
	{
		$hapus = $this->user_model->hapusCust($id);
        if($hapus>0){
            // echo 'yey berhasil';
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('admin/dataCust', 'refresh');
        }  else{
            echo 'gagal cuy';
			redirect('admin/dataCust', 'refresh');
        }
	}
	
}	