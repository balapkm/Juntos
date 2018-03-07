<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use mikehaertl\wkhtmlto\Pdf;

class GeneratePo extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('PoMasterEntryQuery');
		$this->load->model('PoGenerateQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['supplier_entry']    = $this->PoMasterEntryQuery->select_supplier_entry();
		$this->data['po_number_details'] = $this->getHighestIndex();
		$this->data['po_unique_number']  = $this->getUniquePoNumber();
		return $this->mysmarty->view('generatePo.tpl',$this->data,TRUE);
	}

	public function getUniquePoNumber(){
		$data =  $this->PoGenerateQuery->getUniquePoNumber();
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		foreach ($data as $key => $value) {
			$data[$key]['full_po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		return $data;
	}

	public function getHighestIndex()
	{
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		foreach ($po_number_details as $key => $value) {
			foreach ($value as $k => $v) {
				$po_number_details[$key][$k]['po_current_value'] = $this->PoGenerateQuery->getPONumberHighest($key,$k);
			}
		}
		return $po_number_details;
	}

	public function generatePoData()
	{
		$finalInsertData = array();

		$po_raw_number   = $this->data['po_raw_number'];
		unset($this->data['po_raw_number']);
		$this->data['po_number'] = $po_raw_number;
		$material_id = $this->data['material_id'];
		unset($this->data['material_id']);

		$getMaterialdetails = $this->PoMasterEntryQuery->get_material_entry_in_array($material_id);

		foreach ($getMaterialdetails as $key => $value) {
			$finalInsertData[$key]                  = $this->data;
			$finalInsertData[$key]['material_id']       = $value['material_id'];
			$finalInsertData[$key]['material_name']     = $value['material_name'];
			$finalInsertData[$key]['material_hsn_code'] = $value['material_hsn_code'];
			$finalInsertData[$key]['qty'] = 0;
			$finalInsertData[$key]['material_uom'] = $value['material_uom'];
			$finalInsertData[$key]['currency'] = $value['currency'];
			$finalInsertData[$key]['price'] = $value['price'];
			$finalInsertData[$key]['price_status'] = $value['price_status'];
			$finalInsertData[$key]['CGST'] = $value['CGST'];
			$finalInsertData[$key]['IGST'] = $value['IGST'];
			$finalInsertData[$key]['SGST'] = $value['SGST'];
			$finalInsertData[$key]['discount'] = $value['discount'];
			$finalInsertData[$key]['discount_price_status'] = $value['discount_price_status'];
			$finalInsertData[$key]['created_date'] = date('Y-m-d');
		}
		return $this->PoGenerateQuery->insert_po_generated_request_details($finalInsertData);

	}

	public function viewPoData(){
		$po_number = explode("|",$this->data['po_number']);
		$this->data['unit'] = $po_number[0];
		$this->data['type'] = $po_number[1];
		$this->data['po_number']       = $po_number[2];
		$this->data['searchPoData']    =  $this->PoGenerateQuery->getPoDataAsPerPONumber($this->data);
		if(count($this->data['searchPoData']) == 0)
		{
			return false;
		}
		else
		{
			$this->data['searchPoData'][0]['full_po_number'] = $po_number[3];
			return $this->mysmarty->view('poViewTemplate.tpl',$this->data,TRUE);
		}
	}

	public function editPoDetailsAction(){
		return $this->PoGenerateQuery->update_po_generated_request_details($this->data);
	}

	public function deletePoDetailsAction(){
		return $this->PoGenerateQuery->delete_po_generated_request_details($this->data);
	}

	public function downloadAsPdfPODetailsAction()
	{
		$this->data = $_GET;
		$po_number = explode("|",$this->data['po_number']);
		$this->data['unit'] = $po_number[0];
		$this->data['type'] = $po_number[1];
		$this->data['po_number']       = $po_number[2];
		$this->data['view_status']     = 'Download';
		$this->data['searchPoData']    =  $this->PoGenerateQuery->getPoDataAsPerPONumber($this->data);
		$this->data['searchPoData'][0]['full_po_number'] = $po_number[3];
		$filename    = date('YmdHis');
		$folder_name = realpath(APPPATH."../assets/po_html");
		file_put_contents($folder_name."/".$filename.".html",$this->mysmarty->view('poViewTemplate.tpl',$this->data,TRUE));
		chmod($folder_name."/".$filename.".html", 0777);
		$cmd = 'xvfb-run --server-args="-screen 0, 1024x768x24" wkhtmltopdf '.$folder_name.'/'.$filename.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';

		$response = exec($cmd);
		header("Content-Type: application/octet-stream");

		$file = $folder_name.'/'.$filename.'.pdf';
		header("Content-Disposition: attachment; filename=" .$po_number[3].".pdf");   
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Description: File Transfer");            
		header("Content-Length: " . filesize($file));
		flush(); // this doesn't really matter.
		$fp = fopen($file, "r");
		while (!feof($fp))
		{
		    echo fread($fp, 65536);
		    flush(); // this is essential for large downloads
		} 
		fclose($fp); 
	}

	public function getMaterialDetailsAsPerSupplier()
	{
		return $this->PoGenerateQuery->getMaterialDetailsAsPerSupplier($this->data['supplier_id']);
	}
}
