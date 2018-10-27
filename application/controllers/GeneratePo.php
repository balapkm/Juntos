<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		$this->data['po_unique_number']   = $this->getUniquePoNumber();
		$this->data['unit_of_measurement'] = $this->PoMasterEntryQuery->select_uof_master();
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

	public function getPONumberHighestBasedPODate()
	{
		$year  = date('Y',strtotime($this->data['po_date']));
		$month = (int)date('m',strtotime($this->data['po_date']));
		if($month > 3)
		{
			$startDate = $year.'-04-01';
			$endDate   = ($year+1).'-03-31';
		}
		else
		{
			$startDate = ($year-1).'-04-01';
			$endDate   = $year.'-03-31';
		}

		$number = $this->PoGenerateQuery->getPONumberHighestBasedPODate($this->data['unit'],$this->data['type'],$startDate,$endDate);
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		$format            = $po_number_details[$this->data['unit']][$this->data['type']]['format'];
		$data['po_number']     = $format.$number;
		$data['po_raw_number'] = $number;
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

	public function searchPoBasedOnYear()
	{
		$data =  $this->PoGenerateQuery->getUniquePoNumber($this->data['po_year']);
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		foreach ($data as $key => $value) {
			$data[$key]['full_po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		return $data;
	}

	public function editPoOtherDetailsAction()
	{
		$ids = $this->data['po_ids'];
		unset($this->data['po_ids']);
		foreach ($ids as $key => $value) 
		{
			$data       = $this->data;
			$data['id'] = $value;
			if(!$this->PoGenerateQuery->update_po_generated_request_details($data))
			{
				return false;
			}
		}
		return true;
	}

	public function generatePoData()
	{
		// print_r($this->data);exit;
		$finalInsertData = array();

		$po_raw_number   = $this->data['po_raw_number'];
		unset($this->data['po_raw_number']);
		$this->data['po_number'] = $po_raw_number;
		$material_id = $this->data['material_id'];
		unset($this->data['material_id']);
		if(!empty($this->data['quantity']))
		{
			$quantity = $this->data['quantity'];
			unset($this->data['quantity']);
		}

		$getMaterialdetails = $this->PoMasterEntryQuery->get_material_entry_in_array($material_id);
		$count = 0;
		foreach ($getMaterialdetails as $key => $value) {
			$finalInsertData[$key]                  = $this->data;
			$finalInsertData[$key]['material_id']       = $value['material_id'];
			$finalInsertData[$key]['material_master_id']= $value['material_master_id'];
			$finalInsertData[$key]['material_name']     = $value['material_name'];
			$finalInsertData[$key]['material_hsn_code'] = $value['material_hsn_code'];
			$finalInsertData[$key]['qty'] = empty($quantity[$count])?0:$quantity[$count];
			$finalInsertData[$key]['material_uom'] = $value['material_uom'];
			$finalInsertData[$key]['currency'] = $value['currency'];
			$finalInsertData[$key]['price'] = $value['price'];
			$finalInsertData[$key]['price_status'] = $value['price_status'];
			$finalInsertData[$key]['CGST'] = $value['CGST'];
			$finalInsertData[$key]['IGST'] = $value['IGST'];
			$finalInsertData[$key]['SGST'] = $value['SGST'];
			$finalInsertData[$key]['discount'] = $value['discount'];
			$finalInsertData[$key]['discount_price_status'] = $value['discount_price_status'];
			$finalInsertData[$key]['outstanding_type'] = "M";
			$finalInsertData[$key]['created_date'] = date('Y-m-d');
			$cdata = $this->PoMasterEntryQuery->check_material_exist_for_po_number($finalInsertData[$key]);
			if(count($cdata) != 0)
			{
				return false;
			}
			$count++;
		}

		if($this->data['type'] == 'Import' || $this->data['type'] == 'Sample_Import')
		{
			$this->PoGenerateQuery->insert_import_other_details($finalInsertData[0]);
		}
		return $this->PoGenerateQuery->insert_po_generated_request_details($finalInsertData);

	}

	public function addAdditionalChargesAction()
	{
		return $this->PoGenerateQuery->insert_po_other_additional_charges($this->data);
	}

	public function editImportOtherDetailsAction()
	{
		return $this->PoGenerateQuery->edit_import_other_details($this->data);
	}

	public function deletePoOtherAdditionalCharges()
	{
		return $this->PoGenerateQuery->delete_po_other_additional_charges($this->data);
	}

	public function addOverAllDiscountAction()
	{
		return $this->PoMasterEntryQuery->insert_supplier_entry($this->data,"overall_discount_details");
	}

	public function deleteOverAllDiscountDetails()
	{
		return $this->PoMasterEntryQuery->del_overall_discount_details($this->data);
	}

	public function viewPoData(){
		$po_number = explode("|",$this->data['po_number']);
		$this->data['unit'] = $po_number[0];
		$this->data['type'] = $po_number[1];
		$this->data['po_number']       = $po_number[2];
		$this->data['searchPoData']              =  $this->PoGenerateQuery->getPoDataAsPerPONumber($this->data);
		$this->data['otherAdditionalCharges']    =  $this->PoGenerateQuery->getOtherChargeUsingPoNumber($this->data);
		$this->data['importAdditionalCharges']   =  $this->PoGenerateQuery->getImportChargeUsingPoNumber($this->data);
		$this->data['overAllDiscountDetails']    =  $this->PoGenerateQuery->getOverAllDiscountDetails($this->data);
		if(count($this->data['searchPoData']) == 0)
		{
			return false;
		}
		else
		{
			if($this->data['type'] == 'Indigenous' || $this->data['type'] == 'Sample_Indigenous')
			{
				$template_name = 'Indigenous.tpl';
			}
			else
			{
				$template_name = 'Import.tpl';
			}
			$this->data['searchPoData'][0]['full_po_number'] = $po_number[3];
			return $this->mysmarty->view($template_name,$this->data,TRUE);
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

		foreach ($this->data['searchPoData'] as $key => $value) {
			if($value['qty'] == 0)
			{
				echo "<script>alert('Quantity should be  greater than zero');window.close();</script>";exit;
			}
		}
		

		$this->data['otherAdditionalCharges']    =  $this->PoGenerateQuery->getOtherChargeUsingPoNumber($this->data);
		$this->data['importAdditionalCharges']   =  $this->PoGenerateQuery->getImportChargeUsingPoNumber($this->data);
		$this->data['overAllDiscountDetails']    =  $this->PoGenerateQuery->getOverAllDiscountDetails($this->data);
		$this->data['searchPoData'][0]['full_po_number'] = $po_number[3];
		$filename    = date('YmdHis');
		$footername  = "footer";
		$headername  = "header";

		$folder_name = realpath(APPPATH."../assets/po_html");
		if($this->data['type'] == 'Indigenous' || $this->data['type'] == 'Sample_Indigenous')
		{
			$template_name = 'Indigenous_download.tpl';
			$footer_name   = 'footer_download.tpl';
			$header_name   = 'header_download.tpl';
		}
		else
		{
			$template_name = 'Import_download.tpl';
			$footer_name   = 'footer_download.tpl';
			$header_name   = 'header_download.tpl';
		}
		// print_r($this->data);exit;
		file_put_contents($folder_name."/".$filename.".html",$this->mysmarty->view($template_name,$this->data,TRUE));
		file_put_contents($folder_name."/".$footername.".html",$this->mysmarty->view($footer_name,$this->data,TRUE));
		file_put_contents($folder_name."/".$headername.".html",$this->mysmarty->view($header_name,$this->data,TRUE));

		chmod($folder_name."/".$filename.".html", 0777);
		chmod($folder_name."/".$footername.".html", 0777);
		chmod($folder_name."/".$headername.".html", 0777);
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
		{
			// $cmd = 'cd C:\Program Files\wkhtmltopdf\bin && wkhtmltopdf.exe --header-html '.$folder_name.'/'.$headername.'.html --header-spacing 0 --header-line --footer-html '.$folder_name.'/'.$footername.'.html '.$folder_name.'/'.$filename.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';
			$cmd = 'cd C:\Program Files\wkhtmltopdf\bin && wkhtmltopdf.exe '.$folder_name.'/'.$filename.'.html --header-html '.$folder_name.'/'.$headername.'.html --footer-html '.$folder_name.'/'.$footername.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';
		}
		else
		{
			$cmd = 'xvfb-run --server-args="-screen 0, 1024x768x24" wkhtmltopdf '.$folder_name.'/'.$filename.'.html --header-html '.$folder_name.'/'.$headername.'.html --footer-html '.$folder_name.'/'.$footername.'.html '.$folder_name.'/'.$filename.'.pdf 2>&1';
		}
		// echo $cmd;exit;
		$response = exec($cmd);

		// print_r($response);exit;
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

	public function downloadAsHtmlPdfPODetailsAction()
	{
		$this->data = $_GET;
		$po_number = explode("|",$this->data['po_number']);
		$this->data['unit'] = $po_number[0];
		$this->data['type'] = $po_number[1];
		$this->data['po_number']       = $po_number[2];
		$this->data['view_status']     = 'Download';
		$this->data['searchPoData']    =  $this->PoGenerateQuery->getPoDataAsPerPONumber($this->data);

		foreach ($this->data['searchPoData'] as $key => $value) {
			if($value['qty'] == 0)
			{
				echo "<script>alert('Quantity should be  greater than zero');window.close();</script>";exit;
			}
		}
		

		$this->data['otherAdditionalCharges']    =  $this->PoGenerateQuery->getOtherChargeUsingPoNumber($this->data);
		$this->data['importAdditionalCharges']   =  $this->PoGenerateQuery->getImportChargeUsingPoNumber($this->data);
		$this->data['overAllDiscountDetails']    =  $this->PoGenerateQuery->getOverAllDiscountDetails($this->data);
		$this->data['searchPoData'][0]['full_po_number'] = $po_number[3];
		$filename    = date('YmdHis');
		$footername  = "footer";
		$headername  = "header";

		$folder_name = realpath(APPPATH."../assets/po_html");
		if($this->data['type'] == 'Indigenous' || $this->data['type'] == 'Sample_Indigenous')
		{
			$template_name = 'Indigenous_html_view.tpl';
		}
		else
		{
			$template_name = 'Import_html_view.tpl';
		}

		file_put_contents($folder_name."/".$filename.".html",$this->mysmarty->view($template_name,$this->data,TRUE));
		

		chmod($folder_name."/".$filename.".html", 0777);

		echo $this->mysmarty->view($template_name,$this->data,TRUE);exit;
	}

	public function getMaterialDetailsAsPerSupplier()
	{
		return $this->PoGenerateQuery->getMaterialDetailsAsPerSupplier($this->data['supplier_id']);
	}
}
