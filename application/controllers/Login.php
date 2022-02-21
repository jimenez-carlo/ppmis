<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', 'login');
		$this->load->model('Audit_model', 'audit');
		if ($this->session->status) {
			redirect('/');
		}
	}

	public function index()
	{
		$data['response'] = '';
		$post = $this->input->post();
		if (isset($post['btnLogin'])) {
			if (empty($post['user']) || empty($post['pass'])) {
				$data['response'] = $this->error();
			}
			$result = $this->login->login();
			if ($result->num_rows() > 0 && password_verify($post['pass'], $result->row()->salt)) {
				$user_info = array('current' => $result->row(), 'status' => true);
				$this->session->set_userdata($user_info);
				$this->audit->InsertAudit("SYSTEM", "Log In");
				redirect('/');
			}
			$data['response'] = $this->error();
			$this->audit->InsertAudit("SYSTEM", "Log In Error");
		}
		$this->load->view('login', $data);
	}

	private function error()
	{
		return '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
		<div><i class="fa fa-warning"></i><b> Invalid Username/Password!</b></div> 
  	</div>';
	}
}
