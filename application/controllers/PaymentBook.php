<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentBook extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('PoGenerateQuery');
		$this->load->model('PaymentBookQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['supplier_name_details'] = $this->PoGenerateQuery->getSupplierNameDetails();
		return $this->mysmarty->view('PaymentBook.tpl',$this->data,TRUE);
	}

	public function getUniquePoNumber(){
		$data =  $this->PoGenerateQuery->getUniquePoNumber();
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		foreach ($data as $key => $value) {
			$data[$key]['full_po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		return $data;
	}

	public function searchPaymentBookAction()
	{
		$data   = $this->PaymentBookQuery->getPaymentBookData($this->data);
		$result = array();
		if(count($data) == 0)
		{
			return false;
		}
		
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']]['paymentBookList'][$value['bill_number']][] = $value;
		}

		$data = $this->PaymentBookQuery->getDebitNoteListData($this->data);
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']]['debitNoteList'][] = $value;
		}
		$finalResponse['result']          = $result;
		$finalResponse['lastDateOfMonth'] = date('Y-m-d',strtotime('last day of this month', time()));
		$template_name = 'paymentBookList.tpl';
		return $this->mysmarty->view($template_name,$finalResponse,TRUE);
	}

	public function updatePaymentBookDetails()
	{
		return $this->PaymentBookQuery->updatePaymentListData($this->data);
	}

	public function deleteDepositDetails()
	{
		return $this->PaymentBookQuery->deleteDebitNoteData($this->data);	
	}

	public function debitNoteList()
	{
		$data = $this->PaymentBookQuery->getDebitNoteListData();
		$totalAmount = 0;
		foreach ($data as $key => $value) {
			if($value['type']=='D' || $value['type']=='T')
				$totalAmount += $value['amount'];
			else
				$totalAmount -= $value['amount'];

		}
		$template_name = 'debitNoteList.tpl';
		$outputArray['result'] = $data;
		$outputArray['result'][0]['totalAmount'] = $totalAmount;
		return $this->mysmarty->view($template_name,$outputArray,TRUE);
	}

	public function addNoteDetails()
	{
		$addData = array(
				"supplier_id" => $this->data['supplier_id'],
				"debit_note_no" =>  $this->data['debitnote_no'],
				"debit_note_date" => $this->data['debitnote_date'],
				"type" => $this->data['type'],
				"supplier_creditnote"   => $this->data['supplier_creditnote_no'],
				"supplier_creditnote_date"     => $this->data['creditnote_date'],
				"query"     => $this->data['query'],
				"payable_month"     => $this->data['payable_month'],
				"amount"     => $this->data['amount']
			);
		return $this->PaymentBookQuery->insert_debit_note_details($addData);
	}

	public function downloadAsPdfPaymentBookDetails()
	{
		$this->data = $_GET;
		$data   = $this->PaymentBookQuery->getPaymentBookData($this->data);
		$result = array();

		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']]['paymentBookList'][$value['bill_number']][] = $value;
		}

		$data = $this->PaymentBookQuery->getDebitNoteListData($this->data);
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']]['debitNoteList'][] = $value;
		}
		$finalResponse['result']          = $result;
		$finalResponse['lastDateOfMonth'] = date('Y-m-d',strtotime('last day of this month', time()));
		$template_name = 'paymentBookListPrint.tpl';
		$folder_name = realpath(APPPATH."../assets/po_html");
		
		$filename='paymentBookListPrint';
		
		file_put_contents($folder_name."/".$filename.".html",$this->mysmarty->view($template_name,$finalResponse,TRUE));

		chmod($folder_name."/".$filename.".html", 0777);
	
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
		{
			$cmd = 'cd C:\Program Files\wkhtmltopdf\bin && wkhtmltopdf.exe --header-html '.$folder_name.'/'.$filename.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';
		}
		else
		{
			$cmd = 'xvfb-run --server-args="-screen 0, 1024x768x24" wkhtmltopdf --orientation landscape '.$folder_name.'/'.$filename.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';
		}
		$response = exec($cmd);

		// print_r($response);exit;
		header("Content-Type: application/octet-stream");
		$paymentBookList = 'paymentBookList';
		$file = $folder_name.'/'.$filename.'.pdf';
		header("Content-Disposition: attachment; filename=" .$paymentBookList.".pdf");   
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

}
