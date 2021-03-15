<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() 
	{
		$token = $this->session->userdata('token');
		$data['user'] = $this->user_model->getLogin($token);
		$data['title'] = 'Dashboard';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function dataMitra()
	{
		$data['title'] = 'Data Mitra | Cupo';
        $data['user'] = $this->user_model->getUser();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/mitra');
		$this->load->view('templates/footer');
	}

	public function dataCust()
	{
		$data['title'] = 'Data Customer | Cupo';
        $data['user'] = $this->user_model->getCust();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/customer');
		$this->load->view('templates/footer');
	}

	public function addMitra()
    {
        $data['title'] = 'Data Mitra | Cupo';
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[user.username]|alpha_numeric',
        array('is_unique' => 'This %s already exists please enter another username'));
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[60]|is_unique[user.email]',
        array('is_unique' => 'This %s already exists please enter another email address'));
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[25]');
        if ($this->form_validation->run()==true) {
            if($this->user_model->userRegister()>0){
                echo "yey berhasil";
                redirect('admin/dataMitra', 'refresh');
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
        $data['title'] = 'Data Customer | Cupo';
        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == true) {
            if($this->user_model->custRegister()>0){
                echo "yey berhasil";
                redirect('admin/dataCust', 'refresh');
            } else{
                echo "yah gagal";
            }

          } else {
            redirect('admin/dataCust', 'refresh');
          }
    }

	
}	