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
		$this->data['max_supplier_id'] = $this->PoMasterEntryQuery->get_max_supplier_id();
		$this->data['material_entry'] = $this->PoMasterEntryQuery->select_material_entry();
		$this->data['unit_of_measurement'] = $this->PoMasterEntryQuery->select_uof_master();
		$this->data['material_master_details'] = $this->PoMasterEntryQuery->select_material_master();
		$this->data['group_master_details'] = $this->PoMasterEntryQuery->select_other_master(array('otherTypeValue'=>"GROUP"));
		return $this->mysmarty->view('poMasterEntry.tpl',$this->data,TRUE);
	}

	public function getOtherMasterData()
	{
		return $this->PoMasterEntryQuery->select_other_master($this->data);
	}

	public function addOtherMasterClickAction()
	{
		$count = count($this->PoMasterEntryQuery->select_other_master_as_per_group_and_name($this->data));
		if($count != 0)return false;
		return $this->PoMasterEntryQuery->insert_supplier_entry($this->data,'other_master_details');
	}

	public function editOtherMasterClickAction()
	{
		$count = count($this->PoMasterEntryQuery->select_other_master_as_per_group_and_name($this->data));
		if($count != 0)return false;
		return $this->PoMasterEntryQuery->update_other_master($this->data);
	}

	public function deleteOtherMasterClickAction()
	{
		return $this->PoMasterEntryQuery->delete_other_master($this->data);
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
		$material_name = $this->data['material_name'];
		$this->data['supplier_id'] = explode("|",$this->data['supplier_id'])[0];
		$this->data['material_name'] = explode("|",$material_name)[0];
		// $this->data['material_master_id'] = explode("|",$material_name)[1];
		/*if($this->data['material_name'] == 'ADD_NEW')
		{*/
			// $this->data['material_name'] = $this->data['add_material_name'];
			$selectData = $this->PoMasterEntryQuery->select_material_master($this->data);
			$count      = count($selectData);
			if($count == 0)
			{
				$data['material_name'] = $this->data['material_name'];
				$this->PoMasterEntryQuery->insert_supplier_entry($data,'material_master');
				$selectData = $this->PoMasterEntryQuery->select_material_master($this->data);
				$this->data['material_master_id'] = $selectData[0]['material_id'];
			}
			else
			{
				$this->data['material_master_id'] = $selectData[0]['material_id'];
			}
			unset($this->data['add_material_name']);
		// }
		$count = count($this->PoMasterEntryQuery->select_material_entry_as_per_supplier_name($this->data));
		if($count != 0)return false;
		return $this->PoMasterEntryQuery->insert_supplier_entry($this->data,'material_details');
	}

	public function addUOfAction()
	{
		/*$count = count($this->PoMasterEntryQuery->select_material_entry_as_per_supplier_name($this->data));
		if($count != 0)return false;*/
		return $this->PoMasterEntryQuery->insert_supplier_entry($this->data,'uof_master');
	}

	public function addMaterialMasterAction()
	{
		$count = count($this->PoMasterEntryQuery->select_material_master($this->data));
		if($count != 0)return false;
		return $this->PoMasterEntryQuery->insert_supplier_entry($this->data,'material_master');
	}

	public function updateUofAction()
	{
		return $this->PoMasterEntryQuery->update_uof_master($this->data);
	}

	public function updateMaterialMasterAction()
	{
		$count = count($this->PoMasterEntryQuery->select_material_master($this->data));
		if($count != 0)return false;
		return $this->PoMasterEntryQuery->update_material_master($this->data);
	}

	public function updateMaterialAction()
	{
		$material_name = $this->data['material_name'];
		$this->data['supplier_id'] = explode("|",$this->data['supplier_id'])[0];
		$this->data['material_name'] = explode("|",$material_name)[0];
		$selectData = $this->PoMasterEntryQuery->select_material_master($this->data);
		$count      = count($selectData);
		if($count == 0)
		{
			$data['material_name'] = $this->data['material_name'];
			$this->PoMasterEntryQuery->insert_supplier_entry($data,'material_master');
			$selectData = $this->PoMasterEntryQuery->select_material_master($this->data);
			$this->data['material_master_id'] = $selectData[0]['material_id'];
		}
		else
		{
			$this->data['material_master_id'] = $selectData[0]['material_id'];
		}
		unset($this->data['add_material_name']);
		unset($this->data['state_code']);
		unset($this->data['supplier_name']);
		unset($this->data['supplier_status']);
		unset($this->data['material_master_name']);
		return $this->PoMasterEntryQuery->update_material_entry($this->data);
	}

	public function deleteMaterialAction()
	{
		return $this->PoMasterEntryQuery->delete_material_entry($this->data);
	}

	public function deleteUofAction()
	{
		return $this->PoMasterEntryQuery->delete_uof_master($this->data);
	}

	public function deleteMaterialMasterAction()
	{
		return $this->PoMasterEntryQuery->delete_material_master($this->data);
	}
}
