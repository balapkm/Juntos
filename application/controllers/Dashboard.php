<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('commonQuery');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->getInitDetails();
		$this->mysmarty->view('dashboard.tpl',$this->data);
	}

	public function getInitDetails()
	{
		$this->data['menu'] = $this->commonQuery->menu_details();
	}

	public function getComponentDetails()
	{
		return $this->commonQuery->component_details();
	}
}
