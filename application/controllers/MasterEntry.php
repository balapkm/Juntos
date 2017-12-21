<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterEntry extends CI_Controller 
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
		$this->getInitDetails();
		return $this->mysmarty->view('masterEntry.tpl',$this->data,TRUE);
	}

	public function getInitDetails()
	{
		$this->data['description_data'] = $this->MasterEntryQuery->select_master_entry('description_details');
		$this->data['article_data']     = $this->MasterEntryQuery->select_master_entry('article_details');
		$this->data['selection_data']   = $this->MasterEntryQuery->select_master_entry('selection_details');
		$this->data['color_data']       = $this->MasterEntryQuery->select_master_entry('color_details');
	}

	public function addAction()
	{
		return $this->MasterEntryQuery->insert_master_entry($this->data);
	}

	public function editAction()
	{
		return $this->MasterEntryQuery->update_master_entry($this->data);
	}

	public function deleteAction()
	{
		return $this->MasterEntryQuery->delete_master_entry($this->data);
	}
}
