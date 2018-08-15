<?php
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/excel/src/Bootstrap.php';

class PoReport extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('PoReportQuery');
		$this->load->model('PoGenerateQuery');
		$this->load->model('PoMasterEntryQuery');
		$this->load->model('PaymentBookQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['material_name_details'] = $this->PoMasterEntryQuery->select_material_master();
		$this->data['supplier_name_details'] = $this->PoGenerateQuery->getSupplierNameDetails();
		return $this->mysmarty->view('PoReport.tpl',$this->data,TRUE);
	}

	public function poDownloadAction(){
		$this->data = $_GET;
		if($this->data['report_type'] == "report_1"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_1($this->data);
			if(count($data) == 0){
				echo "<script>alert('No Data found');window.close();</script>";exit;
			}
			foreach ($data as $key => $value) {
				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","ORD REF","DESCRIPTION","QUERY","HSN CODE","QTY","UOM","PRICE","DISCOUNT %","CGST %","SGST %","IGST %","DELIVERY DATE");
		}

		if($this->data['report_type'] == "report_2"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_2($this->data);
			if(count($data) == 0){
				echo "<script>alert('No Data found');window.close();</script>";exit;
			}
			foreach ($data as $key => $value) {
				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","ORD REF","DESCRIPTION","QUERY","HSN CODE","QTY","UOM","PRICE","DISCOUNT %","CGST %","SGST %","IGST %","DELIVERY DATE");
		}

		if($this->data['report_type'] == "report_3"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_3($this->data);
			if(count($data) == 0){
				echo "<script>alert('No Data found');window.close();</script>";exit;
			}
			foreach ($data as $key => $value) {
				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","ORD REF","DESCRIPTION","QUERY","HSN CODE","QTY","UOM","PRICE","DISCOUNT %","CGST %","SGST %","IGST %","DELIVERY DATE");
		}

		if($this->data['report_type'] == "report_4"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_4($this->data);
			if(count($data) == 0){
				echo "<script>alert('No Data found');window.close();</script>";exit;
			}
			foreach ($data as $key => $value) {
				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","ORD REF","DESCRIPTION","QUERY","HSN CODE","QTY","UOM","PRICE","DISCOUNT %","CGST %","SGST %","IGST %","DELIVERY DATE");
		}

		if($this->data['report_type'] == "report_5"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_5($this->data);
			if(count($data) == 0){
				echo "<script>alert('No Data found');window.close();</script>";exit;
			}
			foreach ($data as $key => $value) {
				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","ORD REF","DESCRIPTION","QUERY","HSN CODE","QTY","UOM","PRICE","DISCOUNT %","CGST %","SGST %","IGST %","DELIVERY DATE");
		}

		array_unshift($data , $columArray);
		header("Content-Disposition: attachment; filename=\"Report.xls\"");
		header("Content-Type: application/vnd.ms-excel;");
		header("Pragma: no-cache");
		header("Expires: 0");
		$out = fopen("php://output", 'w');
		foreach ($data as $value)
		{
		    fputcsv($out, $value,"\t");
		}
		fclose($out);
		// echo "<script>window.close();</script>";exit;
	}
}

