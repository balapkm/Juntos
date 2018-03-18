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
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['supplier_entry'] = $this->PoMasterEntryQuery->select_supplier_entry();
		$this->data['material_entry'] = $this->PoMasterEntryQuery->select_material_entry();
		$this->data['unit_of_measurement'] = $this->config->item('UOM', 'material_details');
		return $this->mysmarty->view('poMasterEntry.tpl',$this->data,TRUE);
	}

	public function addSupplierAction()
	{
		$count = count($this->PoMasterEntryQuery->select_supplier_entry_as_per_supplier_name($this->data));
		if($count != 0)return false;
		return $this->PoMasterEntryQuery->insert_supplier_entry($this->data,'supplier_details');
	}

	public function updateSupplierAction()
	{
		return $this->PoMasterEntryQuery->update_supplier_entry($this->data);
	}

	public function deleteSupplierAction()
	{
		return $this->PoMasterEntryQuery->delete_supplier_entry($this->data);
	}

	// function to add supplier profuct data 
	public function addMaterialAction()
	{
		$this->data['supplier_id'] = explode("|",$this->data['supplier_id'])[0];
		$count = count($this->PoMasterEntryQuery->select_material_entry_as_per_supplier_name($this->data));
		if($count != 0)return false;
		return $this->PoMasterEntryQuery->insert_supplier_entry($this->data,'material_details');
	}

	public function updateMaterialAction()
	{
		$this->data['supplier_id'] = explode("|",$this->data['supplier_id'])[0];
		return $this->PoMasterEntryQuery->update_material_entry($this->data);
	}

	public function deleteMaterialAction()
	{
		return $this->PoMasterEntryQuery->delete_material_entry($this->data);
	}
}
