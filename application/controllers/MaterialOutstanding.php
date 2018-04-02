<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaterialOutstanding extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('PoGenerateQuery');
		$this->load->model('PoMasterEntryQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['supplier_name_details'] = $this->PoGenerateQuery->getSupplierNameDetails();
		$this->data['material_name_details'] = $this->PoMasterEntryQuery->select_material_master();
		$this->data['po_unique_number']      = $this->getUniquePoNumber();
		return $this->mysmarty->view('MaterialOutstanding.tpl',$this->data,TRUE);
	}

	public function getUniquePoNumber(){
		$data =  $this->PoGenerateQuery->getUniquePoNumber();
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		foreach ($data as $key => $value) {
			$data[$key]['full_po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		return $data;
	}

	public function searchMaterialOutstandingAction()
	{
		if(!empty($this->data['po_number']))
		{
			$this->data['po_number'] = explode("|",$this->data['po_number']);
		}
		$data = $this->PoGenerateQuery->getMaterialOutStandingData($this->data);
		foreach ($data as $key => $value) {
			$po_number_details       = $this->config->item('po_number_details', 'po_generate_details');
			$data[$key]['po_raw_number'] = $data[$key]['po_number'];
			$data[$key]['po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		return $data;
	}

	public function updateMaterialOutstandingAction()
	{
		if($this->data['outstanding_type'] == 'M')
		{
			$received      = $this->data['received'];
			$received_data = $this->data['received_data'];
			$cal_rec_data  = (int)$received_data + (int)$received;
			$balance       = $this->data['qty'] - $cal_rec_data;

			$editData = array(
					"received" => $cal_rec_data,
					"id" => $this->data['po_generated_request_id'],
					"received_date" => date('Y-m-d'),
					"bill_amount"   => $this->data['bill_amount'],
					"dc_number"     => $this->data['dc_number']
				);
			$po_raw_number = $this->data['po_raw_number'];

			$this->data['parent_po_generated_request_id'] = $this->data['po_generated_request_id'];
			$this->data['po_number'] = $po_raw_number;
			// $this->data['balance'] = $balance;
			$this->data['created_date'] = date('Y-m-d');

			unset($this->data['po_generated_request_id']);
			unset($this->data['supplier_name']);
			unset($this->data['delay_day']);
			unset($this->data['$$hashKey']);
			unset($this->data['po_raw_number']);
			unset($this->data['received_data']);
			unset($this->data['material_master_name']);

			$this->data['outstanding_type'] = 'B';
			$data    = array();
			$data[0] = $this->data;

			$this->PoGenerateQuery->update_po_generated_request_details($editData);
			return $this->PoGenerateQuery->insert_po_generated_request_details($data);
		}
		else
		{
			foreach ($this->data['checkEditBoxBillOutStandingArray'] as $key => $value) 
			{
				$this->data['id'] = $value;
				unset($this->data['checkEditBoxBillOutStandingArray']);
				$this->PoGenerateQuery->update_po_generated_request_details($this->data);
			}
			return true;
		}
	}

	public function deleteMaterialOutstandingAction()
	{
		$this->PoGenerateQuery->updateReceivedDataWithPrevData($this->data);
		return $this->PoGenerateQuery->delete_po_generated_request_details($this->data);
		// print_r($this->data);exit();
	}
}
