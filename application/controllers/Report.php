<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('commonQuery');
		$this->load->model('DataEntryQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['leather']          = $this->config->item('leather', 'leather_details');
		$this->data['query']            = $this->config->item('query', 'leather_details');
		$this->data['serial_no_unique'] = $this->DataEntryQuery->getSerialNumberUnique();
		return $this->mysmarty->view('Report.tpl',$this->data,TRUE);
	}

	public function searchAction()
	{
		return $this->DataEntryQuery->reportSearchDataEntry($this->data);
	}
}
