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
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['supplier_name_details'] = $this->PoGenerateQuery->getSupplierNameDetails();
		$this->data['material_name_details'] = $this->PoGenerateQuery->getMaterialNameDetails();
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
			$data[$key]['po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		return $data;
	}

	public function updateMaterialOutstandingAction()
	{
		return $this->PoGenerateQuery->update_po_generated_request_details($this->data);
	}
}
