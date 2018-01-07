<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataEntry extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('commonQuery');
		$this->load->model('MasterEntryQuery');
		$this->load->model('DataEntryQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->getInitDetails();
		return $this->mysmarty->view('dataEntry.tpl',$this->data,TRUE);
	}

	public function getInitDetails()
	{
		$this->data['description_data'] = $this->MasterEntryQuery->select_master_entry('description_details');
		$this->data['article_data']     = $this->MasterEntryQuery->select_master_entry('article_details');
		$this->data['selection_data']   = $this->MasterEntryQuery->select_master_entry('selection_details');
		$this->data['color_data']       = $this->MasterEntryQuery->select_master_entry('color_details');
		$this->data['highest_serial_no']= $this->DataEntryQuery->getSerialNumberHighest();
		$this->data['serial_no_unique'] = $this->DataEntryQuery->getSerialNumberUnique();
		$this->data['leather'] = $this->config->item('leather', 'leather_details');
		$this->data['query']   = $this->config->item('query', 'leather_details');
	}

	public function updateDataEntryForAllSerialNo()
	{
		return $this->DataEntryQuery->updateDataEntryForAllSerialNo($this->data);
	}

	public function getAddTableData()
	{
		$this->data['add_table_data'] = $this->DataEntryQuery->getAddTableData($this->data);
		return $this->mysmarty->view('addTableData.tpl',$this->data,TRUE);
	}

	public function addAction()
	{
		return $this->DataEntryQuery->insertDataEntry($this->data);
	}

	public function editAction()
	{
		return $this->DataEntryQuery->updateDataEntry($this->data);
	}

	public function searchAction()
	{
		return $this->DataEntryQuery->searchDataEntry($this->data);
	}

	public function deleteAction()
	{
		return $this->DataEntryQuery->deleteDataEntry($this->data);
	}
}
