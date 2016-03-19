<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->view('login', array("message"=>""));
	}

	public function login_in() {
		$login = trim($this->input->post('login'));
		$password = trim($this->input->post('password'));
		//if($login=="admin" and $password=="1") {
		$login_in = $this->db->get_where('users', array('login' => $login, 'pass' => $password, 'active' => 1));
		if($login_in->result()) {
			$this->session->set_userdata('user_id', 1);
			$this->session->set_userdata('user_name', $login_in->row("name"));
			redirect('Main/index');
		} else { 
			$this->load->view('login', array("message"=>"Логин или пароль не совпадают"));	
		}
	}
	
	public function logout() {
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		redirect('Login');
	}
	
	
}

