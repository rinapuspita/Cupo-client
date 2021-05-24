<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('user_model');
		$this->load->model('produk_model');
		$this->load->model('peminjaman_model');
		$this->load->model('pengembalian_model');
	}
	public function index() 
	{
		$id = $this->session->userdata('user_id');
		$data['title'] = 'Dashboard';
		$data['produk'] = $this->produk_model->hitung($id);
		$data['pinjam'] = $this->peminjaman_model->hitung($id);
		$data['kembali'] = $this->pengembalian_model->hitung($id);
		$data['user'] = $this->user_model->getUserByID($id);
		$this->session->set_userdata('name',  $data['user']["fullname"]);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('templates/footer');
	}	
	
	
	public function changePassword() 
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]',[
			'matches' => 'Password dont matched...!',
			'min_length' => 'Password too sort!'
			]);		
		$this->form_validation->set_rules('new_password2', 'New Password', 'required|trim|min_length[3]|matches[new_password1]',[
			'matches' => 'Password dont matched...!',
			'min_length' => 'Password too sort!'
			]);		
		if($this->form_validation->run() == false) {		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong current password!</div>');
				redirect('user/changepassword');
			} else {
				if($current_password == $new_password) {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
					redirect('user/changepassword');
				} else {
					// password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">password changed</div>');
					redirect('user/changepassword');
				}
			}
		}
	}	
}	