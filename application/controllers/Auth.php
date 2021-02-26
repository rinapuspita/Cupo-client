<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}
	
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if($this->form_validation->run() == false) {		
			$data['title'] = 'CUPO User Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$data['user'] = $this->user_model->userLogin();
			$this->session->set_userdata('token',  $data['user']["token"]);
			$this->session->set_userdata('name',  $data['user']["full_name"]);
			$this->session->set_userdata('email',  $data['user']["email"]);
			$this->session->set_userdata('level',  $data['user']["level"]);
			$this->session->set_userdata('created',  $data['user']["created_at"]);
			// var_dump($data['user']);
			// die;
			if($data['user']["level"] == 1) {
				redirect('admin');
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Success Login Admin !	</div>');
				// echo 'Berhasil Login';
			} else {
				redirect('user');
				// echo 'Berhasil Login';
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Success Login Mitra !	</div>');
			}					
		}
	}

	public function registration()
	{
		$data['title'] = 'User Registration';
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric',
        array('is_unique' => 'This %s already exists please enter another username'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[60]',
        array('is_unique' => 'This %s already exists please enter another email address'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[25]');

		if($this->form_validation->run() == false) {		
			$data['title'] = 'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'fullname' => htmlspecialchars($this->input->post('fullname', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'email' => htmlspecialchars($email),
				// 'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];

			$this->user_model->userRegister($data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('token');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You has been logout!</div>');
			redirect('auth');
	}

}
