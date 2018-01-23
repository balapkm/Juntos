<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PoMasterEntry extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('MasterEntryQuery');
	}

	public function index()
	{
		return $this->mysmarty->view('poMasterEntry.tpl',$this->data,TRUE);
	}
}
