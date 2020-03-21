<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('commonQuery');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->mysmarty->view('login.tpl');
	}

	public function loginAction()
	{
		$data = $this->commonQuery->loginUser($this->data['username'],md5($this->data['password']));
		if(count($data) == 1)
		{
			// server should keep session data for AT LEAST 1 hour
			ini_set('session.gc_maxlifetime', 18000);

			// each client should remember their session id for EXACTLY 1 hour
			session_set_cookie_params(18000);
			session_id(md5($this->data['username'].$this->data['password']));
			session_start();
			$_SESSION['user_group_id']   = $data[0]['user_group_id'];
			$_SESSION['user_login_name'] = $data[0]['user_login_name'];
			$_SESSION['user_login_id']   = $data[0]['user_login_id'];
			$data[0]['session_id'] = session_id();

			$this->commonQuery->getActions();
			return $data[0];
		}
		else
		{
			return "Invalid User";
		}
	}
}
