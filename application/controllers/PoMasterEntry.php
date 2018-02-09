<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PoMasterEntry extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('PoMasterEntryQuery');
	}

	public function index()
	{
		$this->data['supplier_entry'] = $this->PoMasterEntryQuery->select_supplier_entry();
		return $this->mysmarty->view('poMasterEntry.tpl',$this->data,TRUE);
	}

	public function addSupplierAction()
	{
		return $this->PoMasterEntryQuery->insert_supplier_entry($this->data);
	}

	public function updateSupplierAction()
	{
		return $this->PoMasterEntryQuery->update_supplier_entry($this->data);
	}

	public function deleteSupplierAction()
	{
		return $this->PoMasterEntryQuery->delete_supplier_entry($this->data);
	}
}
