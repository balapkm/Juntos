<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoveringLetter extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('PoGenerateQuery');
		$this->load->model('PaymentStatementQuery');
		$this->load->model('PaymentBookQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['supplier_name_details'] = $this->PoGenerateQuery->getSupplierNameDetails();
		return $this->mysmarty->view('CoveringLetter.tpl',$this->data,TRUE);
	}

	public function searchAction()
	{
		$data       = $this->PaymentStatementQuery->getCoverLetterData($this->data);
		$extraData  = $this->PaymentStatementQuery->getExtraBillAmountData($this->data);
		$chequeData = $this->PaymentStatementQuery->getChequeBillAmountData($this->data);
		$advancePaymentDetails = $this->PaymentBookQuery->getAdvancePaymentDetails($this->data);
		
		$po_number_array = array();
		foreach ($data as $key => $value) 
		{
			$po_number_details       = $this->config->item('po_number_details', 'po_generate_details');
			$data[$key]['po_raw_number'] = $data[$key]['po_number'];
			$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			$po_number_array[]         = $data[$key]['po_number'];
		}

		if(count($data) == 0)
		{
			return false;
		}

		foreach ($advancePaymentDetails as $key => $value) 
		{
			if(!in_array($value['full_po_number'],$po_number_array))
			{
				unset($advancePaymentDetails[$key]);
			}
		}

		$finalResponse         = array();
		$finalResponse['data']       = $data;
		$finalResponse['extraData']  = $extraData;
		$finalResponse['chequeData'] = $chequeData;
		$finalResponse['advancePaymentData'] = $advancePaymentDetails;

		$template_name = 'CoveringLetterPrint.tpl';
		return $this->mysmarty->view($template_name,$finalResponse,TRUE);
	}

	public function downloadAsPdf()
	{
		$this->data = $_GET;

		$data       = $this->PaymentStatementQuery->getCoverLetterData($this->data);
		$extraData  = $this->PaymentStatementQuery->getExtraBillAmountData($this->data);
		$chequeData = $this->PaymentStatementQuery->getChequeBillAmountData($this->data);
		$advancePaymentDetails = $this->PaymentBookQuery->getAdvancePaymentDetails($this->data,"Y");
		
		$po_number_array = array();
		foreach ($data as $key => $value) 
		{
			$po_number_details       = $this->config->item('po_number_details', 'po_generate_details');
			$data[$key]['po_raw_number'] = $data[$key]['po_number'];
			$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			$po_number_array[]         = $data[$key]['po_number'];
		}
		if(count($data) == 0)
		{
			echo "<script>alert('No Data found');window.close();</script>";exit;
		}

		foreach ($advancePaymentDetails as $key => $value) 
		{
			if(!in_array($value['full_po_number'],$po_number_array))
			{
				unset($advancePaymentDetails[$key]);
			}
		}

		$finalResponse         = array();
		$finalResponse['data']       = $data;
		$finalResponse['extraData']  = $extraData;
		$finalResponse['chequeData'] = $chequeData;
		$finalResponse['advancePaymentData'] = $advancePaymentDetails;
		$template_name = 'CoveringLetterPrint_download.tpl';

		$folder_name = realpath(APPPATH."../assets/po_html");
		
		$filename='CoveringLetter';
		
		file_put_contents($folder_name."/".$filename.".html",$this->mysmarty->view($template_name,$finalResponse,TRUE));

		chmod($folder_name."/".$filename.".html", 0777);
	
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
		{
			$cmd = 'cd C:\Program Files\wkhtmltopdf\bin && wkhtmltopdf.exe '.$folder_name.'/'.$filename.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';
		}
		else
		{
			$cmd = 'xvfb-run --server-args="-screen 0, 1024x768x24" wkhtmltopdf '.$folder_name.'/'.$filename.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';
		}
		$response = exec($cmd);

		header("Content-Type: application/octet-stream");
		$paymentBookList = 'CoveringLetter';
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
