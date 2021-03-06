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
		$this->data['order_reference_details'] = $this->PoGenerateQuery->getOrderReferenceDetails();
		$this->data['po_unique_number']      = $this->getUniquePoNumber();
		return $this->mysmarty->view('PoReport.tpl',$this->data,TRUE);
	}

	public function getUniquePoNumber(){
		$data =  $this->PoGenerateQuery->getUniquePoNumber();
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		foreach ($data as $key => $value) {
			$data[$key]['full_po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		return $data;
	}

	public function poDownloadAction(){
		if(empty($this->data))
			$this->data = $_GET;

		if(!empty($this->data['po_number']))
		{
			$this->data['po_number'] = explode("|",$this->data['po_number']);
		}

		if($this->data['report_type'] == "report_1"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_1($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}
			foreach ($data as $key => $value) {

				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				
				$data[$key]['po_date']       = date('d-m-Y',strtotime($value['po_date']));
				$data[$key]['delivery_date'] = date('d-m-Y',strtotime($value['delivery_date']));

				$data[$key]['incoterms'] = "NIL";
				$data[$key]['payment_terms'] = "NIL";
				$data[$key]['Shipment'] = "NIL";
				if($value['type'] == 'Import' || $value['type'] == 'Sample_Import'){
					$importData = $this->PoGenerateQuery->getImportChargeUsingPoNumber($value,'N');
					$data[$key]['incoterms'] = $importData[0]['incoterms'];
					$data[$key]['payment_terms'] = $importData[0]['payment_terms'];
					$data[$key]['Shipment'] = $importData[0]['Shipment'];
				}

				$data[$key]['po_number']    = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","ORD REF","MATERIAL NAME","DESCRIPTION","HSN CODE","QTY","UOM","PRICE","CURRENCY","DISCOUNT %","CGST %","SGST %","IGST %","DELIVERY DATE","INCOTERMS","PAYMENT_TERMS","SHIPMENT");
		}

		if($this->data['report_type'] == "report_2"){
			$data = $this->PoReportQuery->fetch_po_report_2($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}
			$columArray = array("SUPPLIER_NAME","SUPPLIER_ADDRESS","CONTACT_NO","ORIGIN","GST NO","STATE_CODE","SUPPLIER_TAX_STATUS","SUPPLIER_STATUS","PAYMENT_TO","PAYMENT_TYPE");
		}

		if($this->data['report_type'] == "report_3"){
			$data = $this->PoReportQuery->fetch_po_report_3($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}
			$columArray = array("MATERIAL_NAME","MATERIAL_HSN_CODE","GROUP","MATERIAL_UOM","PRICE","DISCOUNT","SGST","CGST","IGST","CURRENCY","PRICE_STATUS","DISCOUNT_PRICE_STATUS");
		}

		if($this->data['report_type'] == "report_4"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_4($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}

			foreach ($data as $key => $value) {
				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				$data[$key]['po_date']       = date('d-m-Y',strtotime($value['po_date']));
				$data[$key]['balance']       = round($value['balance'],2);
				$data[$key]['received']      = round($value['received'],2);
				if($value['delivery_date'] != '0000-00-00'){
					$data[$key]['delivery_date'] = date('d-m-Y',strtotime($value['delivery_date']));
				}else{
					$data[$key]['delivery_date'] = "";
				}
				if($value['received_date'] != '0000-00-00'){
					$data[$key]['received_date'] = date('d-m-Y',strtotime($value['received_date']));
				}else{
					$data[$key]['received_date'] = "";
				}
				$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","MATERIAL NAME","DESCRIPTION","QTY","UOM","RECEIVED","RECEIVED DATE","BALANCE","DELIVERY DATE");
		}

		if($this->data['report_type'] == "report_5"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_5($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}
			foreach ($data as $key => $value) {
				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				$data[$key]['po_date']       = date('d-m-Y',strtotime($value['po_date']));
				$data[$key]['excess']        = ($value['excess'] < 0) ? 0 : $value['excess'];
				$data[$key]['excess']        = round($value['excess'],2);
				$data[$key]['received']      = round($value['received'],2);
				// $data[$key]['delivery_date'] = date('d-m-Y',strtotime($value['delivery_date']));\
				
				if($value['received_date'] != '0000-00-00'){
					$data[$key]['received_date'] = date('d-m-Y',strtotime($value['received_date']));
				}else{
					$data[$key]['received_date'] = "";
				}
				$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","MATERIAL NAME","DESCRIPTION","QTY","UOM","RECEIVED","RECEIVED DATE","EXCESS");
		}

		if($this->data['report_type'] == "report_6"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_6($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}
			foreach ($data as $key => $value) {
				$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
				$data[$key]['po_date']       = date('d-m-Y',strtotime($value['po_date']));
				// $data[$key]['excess']        = ($value['excess'] < 0) ? 0 : $value['excess'];
				// $data[$key]['balance']       = ($value['balance'] < 0) ? 0 : $value['balance'];
				$data[$key]['received']       = round($value['received'],2);
				if($value['delivery_date'] != '0000-00-00'){
					$data[$key]['delivery_date'] = date('d-m-Y',strtotime($value['delivery_date']));
				}else{
					$data[$key]['delivery_date'] = "";
				}
				if($value['received_date'] != '0000-00-00'){
					$data[$key]['received_date'] = date('d-m-Y',strtotime($value['received_date']));
				}else{
					$data[$key]['received_date'] = "";
				}
				if($value['dc_date'] != '0000-00-00'){
					$data[$key]['dc_date'] = date('d-m-Y',strtotime($value['dc_date']));
				}else{
					$data[$key]['dc_date'] = "";
				}

				$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			$columArray = array("UNIT","TYPE","PO NO","PO DATE","SUPPLIER NAME","ORIGIN","MATERIAL NAME","DESCRIPTION","QTY","UOM","RECEIVED","RECEIVED DATE","DC NO","DC DATE","DELIVERY DATE");
		}

		if($this->data['report_type'] == "report_7"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_7($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}

			foreach ($data as $key => $value) {
				$data[$key]['payable_month'] = date('d-m-Y',strtotime($value['payable_month']));
			}
			
			$columArray = array("S NO","SUPPLIER_NAME","ORIGIN","BILL NO","BILL DATE","BILL AMOUNT","PAYABLE MONTH");
		}

		if($this->data['report_type'] == "report_8"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_8($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}

			foreach ($data as $key => $value) {
				if($value['type'] == 'D')
					$data[$key]['type'] = 'DEBIT NOTE';
				if($value['type'] == 'C')
					$data[$key]['type'] = 'CREDIT NOTE';
				if($value['type'] == 'B')
					$data[$key]['type'] = 'BALANCE AMOUNT';
				if($value['type'] == 'T')
					$data[$key]['type'] = 'TDS';

				$data[$key]['payable_month'] = date('d-m-Y',strtotime($value['payable_month']));
			}
			
			$columArray = array("SUPPLIER_NAME","ORIGIN","TYPE","DEBIT NOTE NO","DATE","SUPPLIER CREDIT NOTE","DATE","QUERY","PAYABLE MONTH","AMOUNT");
		}

		if($this->data['report_type'] == "report_9"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_9($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}

			foreach ($data as $key => $value) {
				$data[$key]['payable_month'] = date('d-m-Y',strtotime($value['payable_month']));
			}
			
			$columArray = array("DIVISION","SUPPLIER_NAME","ORIGIN","S.NO","BILL NO","BILL DATE","BILL AMOUNT","DEBIT/CREDIT/TDS","DEBIT_CREDIT_AMOUNT","ADVANCE PAYMENT AMOUNT","TOTAL AMOUNT","CHEQUE NO","CHEQUE DATE","CHEQUE AMOUNT","BALANCE","PAYABLE MONTH");
		}

		if($this->data['report_type'] == "report_10"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_10($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}

			foreach ($data as $key => $value) {
				$data[$key]['payable_month'] = date('d-m-Y',strtotime($value['payable_month']));
				$data[$key]['pi_date']       = date('d-m-Y',strtotime($value['pi_date']));
				$data[$key]['cheque_date']   = date('d-m-Y',strtotime($value['cheque_date']));
			}
			
			$columArray = array("DIVISION","SUPPLIER_NAME","ORIGIN","PO NUMBER","PO DATE","PI NUMBER","PI DATE","PI AMOUNT","QUERY","PAYABLE MONTH","CHEQUE AMOUNT","CHEQUE DATE","CHEQUE NUMBER");
		}

		if($this->data['report_type'] == "report_11"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_11($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}

			foreach ($data as $key => $value) {
				$data[$key]['payable_month'] = date('d-m-Y',strtotime($value['payable_month']));
				$data[$key]['total_amount']  = round($value['total_amount'],2);
			}
			
			$columArray = array("DIVISION","PAGE NO","SUPPLIER_NAME","ORIGIN","PAYMENT MODE","PAYABLE MONTH","AMOUNT");
		}

		if($this->data['report_type'] == "report_12"){
			$this->data['date_range'] = explode("/",$this->data['date_range']);
			$data = $this->PoReportQuery->fetch_po_report_12($this->data);
			if(count($data) == 0){
				if($this->data['action'] != 'view'){
					echo "<script>alert('No Data found');window.close();</script>";exit;
				}
				else{
					return false;
				}
			}

			foreach ($data as $key => $value) {
				$data[$key]['payable_month'] = date('d-m-Y',strtotime($value['payable_month']));
				$data[$key]['total_amount']  = round($value['total_amount'],2);
			}
			
			$columArray = array("DIVISION","PAGE NO","SUPPLIER_NAME","ORIGIN","PAYMENT MODE","PAYABLE MONTH","AMOUNT");
		}

		if($this->data['action'] == 'view')
		return array("data"=>$data,"columns"=>$columArray);

		array_unshift($data , $columArray);

		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('T.M. ABDUL RAHMAN & SONS')
		        ->setLastModifiedBy('T.M. ABDUL RAHMAN & SONS')
		        ->setTitle('Office 2007 XLSX Test Document')
		        ->setSubject('Office 2007 XLSX Test Document')
		        ->setDescription('T.M. ABDUL RAHMAN & SONS')
		        ->setKeywords('T.M. ABDUL RAHMAN & SONS')
		        ->setCategory('T.M. ABDUL RAHMAN & SONS');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		        ->setCellValue('C1', 'T.M. ABDUL RAHMAN & SONS ')
		        ->setCellValue('D2', 'RANIPET');

		$columns = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

		$spreadsheet->getDefaultStyle()->getFont()->setSize(9.9);
		$spreadsheet->getDefaultStyle()->getFont()->setName('MS Sans Serif');

		$getActiveSheet = $spreadsheet->getActiveSheet();
		// echo "<pre>";print_r($data);exit;
		$rowCount       = 4;
		foreach ($data as $key => $value) {
			$count = 0;
			foreach ($value as $k1 => $v1) {
				if($key == 0)
				$getActiveSheet->getStyle((string)($columns[$count].$rowCount))->getFont()->setBold(true);
				$getActiveSheet->setCellValue((string)($columns[$count].$rowCount),$v1);
				$count++;
			}
			$rowCount++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="REPORT.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xls');
		$writer->save('php://output');
		exit;
	}
}

