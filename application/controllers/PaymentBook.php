<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

require_once APPPATH.'third_party/excel/src/Bootstrap.php';

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
		$this->data['supplier_name_details']  = $this->PoGenerateQuery->getSupplierNameDetails();
		$this->data['advancePaymentDetails']  = $this->PaymentBookQuery->getAdvancePaymentFullDetails();
		$this->data['creditDebitNoteDetails'] = $this->PaymentBookQuery->getCreditDebitNoteDetails();
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

	public function getPoNumberAsPerSupplier()
	{
		$data = $this->PaymentBookQuery->getPoNumberAsPerSupplier($this->data);
		if(count($data) == 0)
		{
			return false;
		}

		foreach ($data as $key => $value) {
			$po_number_details           = $this->config->item('po_number_details', 'po_generate_details');
			$data[$key]['po_raw_number'] = $data[$key]['po_number'];
			$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		return $data;
	}

	public function addAdvancePaymentAction()
	{
		$full_po_number = explode("|",$this->data['full_po_number']);
		$this->data['full_po_number']  = $full_po_number[0];
		$this->data['po_date']         = $full_po_number[1];
		$this->data['unit']            = $full_po_number[2];
		$this->data['type']            = $full_po_number[3];
		$this->data['po_number']       = $full_po_number[4];
		unset($this->data['po_year']);
		return $this->PaymentBookQuery->addAdvancePayment($this->data);
	}

	public function editAdvancePaymentAction(){
		return $this->PaymentBookQuery->editAdvancePayment($this->data);
	}

	public function deleteAdvancePaymentDetails()
	{
		return $this->PaymentBookQuery->deleteAdvancePaymentDetails($this->data);	
	}

	public function deletePaymentList()
	{
		return $this->PaymentBookQuery->deletePaymentList($this->data);
	}

	public function searchPaymentBookAction()
	{
		$finalResponse['supplier_id']     = empty($this->data['supplier_name'])?"":$this->data['supplier_name'];
		$finalResponse['lastDateOfMonth'] = date('Y-m-d',strtotime('last day of this month', time()));
		$this->data['date']               = empty($this->data['date']) ? "" : explode("/",$this->data['date']);

		$data   = $this->PaymentBookQuery->getPaymentBookData($this->data);
		$result = array();
		if(count($data) == 0)
		{
			return false;
		}

		foreach ($data as $key => $value) {
			$po_number_details       = $this->config->item('po_number_details', 'po_generate_details');
			$data[$key]['po_raw_number'] = $data[$key]['po_number'];
			$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		$payable_month_array = array();
		foreach ($data as $key => $value) 
		{
			
			$payable_month_array[] = $value['payable_month'];
			if($value['payable_month'] == '0000-00-00')
			{
				if(in_array($finalResponse['lastDateOfMonth'],$payable_month_array)){
					$result[$finalResponse['lastDateOfMonth']]['paymentBookList'][$value['bill_number']][] = $value;
				}
				else
				{
					$result[$value['payable_month']."_".$value['supplier_id']]['paymentBookList'][$value['bill_number']][] = $value;
					$result[$value['payable_month']]."_".$value['supplier_id']['supplier_name'] = $value['supplier_name'];
					$result[$value['payable_month']."_".$value['supplier_id']]['supplier_id']   = $value['supplier_id'];
					$result[$value['payable_month']."_".$value['supplier_id']]['origin']        = $value['origin'];
				}
			}
			else
			{
				$result[$value['payable_month']."_".$value['supplier_id']]['paymentBookList'][$value['bill_number']][] = $value;
				$result[$value['payable_month']."_".$value['supplier_id']]['supplier_name'] = $value['supplier_name'];
				$result[$value['payable_month']."_".$value['supplier_id']]['supplier_id']   = $value['supplier_id'];
				$result[$value['payable_month']."_".$value['supplier_id']]['origin']        = $value['origin'];
			}
			$result[$value['payable_month']."_".$value['supplier_id']]['payable_month'] = $value['payable_month'];
		}

		$data = $this->PaymentBookQuery->getDebitNoteListData($this->data);
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']."_".$value['supplier_id']]['debitNoteList'][] = $value;
			$result[$value['payable_month']."_".$value['supplier_id']]['supplier_name'] = $value['supplier_name'];
			$result[$value['payable_month']."_".$value['supplier_id']]['supplier_id']   = $value['supplier_id'];
			$result[$value['payable_month']."_".$value['supplier_id']]['origin']        = $value['origin'];
			$result[$value['payable_month']."_".$value['supplier_id']]['payable_month'] = $value['payable_month'];
		}

		$advancePaymentDetails = array();
		$data = $this->PaymentBookQuery->getAdvancePaymentDetails($this->data,"Y");
		foreach ($data as $key => $value) 
		{
			$advancePaymentDetails[] = $value;
		}

		// print_r($advancePaymentDetails);exit;
		foreach ($result as $key1 => $value1) 
		{
			$po_number_array = array();
			$advance_payment_array = array();
			foreach ($value1 as $key2 => $value2) 
			{
				if($key2 == 'paymentBookList')
				{
					foreach ($value2 as $key3 => $value3)
					{
						$full_qty = array_sum(array_column($value3,'received'));
						foreach ($value3 as $key4 => $value4)
						{
							$result[$key1][$key2][$key3][$key4]['avg_cost'] = $this->avgCostCalc($value4,$full_qty,$value3);
							$po_number_array[] = $value4['po_number'];
							$advance_payment_array[] = $value4['advance_payment_id'];
						}
					} 
				}
				
				foreach ($advancePaymentDetails as $Akey => $Avalue)
				{
					if(in_array($Avalue['advance_payment_id'],$advance_payment_array))
					{
						$result[$key1]['advancePaymentDetails'][] = $Avalue;
					}
				}
			}
			if(!empty($result[$key1]['advancePaymentDetails']))
				$result[$key1]['advancePaymentDetails'] = array_map("unserialize", array_unique(array_map("serialize",$result[$key1]['advancePaymentDetails'])));

		}

		

		$finalResponse['result'] = $result;
		
		foreach ($finalResponse['result'] as $key => $value) {
			$totalAmount = 0;
			foreach ($value['paymentBookList'] as $k1 => $v1) {
				$totalAmount += $v1[0]['bill_amount'];
			}
			foreach ($value['debitNoteList'] as $k2 => $v2) {
				if($v2['type'] == 'D' || $v2['type'] == 'T'){
					$totalAmount -= $v2['amount'];
				}
				if($v2['type'] == 'C' || $v2['type'] == 'B'){
					$totalAmount += $v2['amount'];
				}
			}
			$finalResponse['result'][$key]['totalAmount'] = $totalAmount;
		}

		$data = $this->PaymentBookQuery->select_all_cheque_number_details($this->data);
		foreach ($data as $key => $value) 
		{
			$finalResponse['result'][$value['payable_month']."_".$value['supplier_id']]['chequeNumberDetails'][] = $value;
		}
		// print_r($finalResponse);exit;
		$template_name = 'paymentBookList.tpl';
		return $this->mysmarty->view($template_name,$finalResponse,TRUE);
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

	public function avgCostCalc($data,$full_qty,$full_bill_data)
	{
		$totalAmount = 0;
		$totalAmount1 = 0;
		$discountTotalAmt = 0;
		$CGSTTotalAmt = 0;
		$SGSTTotalAmt = 0;
		$IGSTTotalAmt = 0;

		if($data['discount_price_status'] == 'AMOUNT')
		{
			$discountTotalAmt = $data['discount'];
		}
		else
		{
			$discountTotalAmt = (($data['discount']/100) * $data['price']) * $data['qty'];
		}

		if($data['state_code'] == 33)
		{
			$CGSTTotalAmt = ($data['CGST']/100) * (($data['price']*$data['qty']) - $discountTotalAmt);
			$SGSTTotalAmt = ($data['SGST']/100) * (($data['price']*$data['qty']) - $discountTotalAmt);
		}
		else
		{
			$IGSTTotalAmt = ($data['IGST']/100) * (($data['price']*$data['qty']) - $discountTotalAmt);
		}

		$totalAmount = ($data['price'] * $data['qty']) + $CGSTTotalAmt + $SGSTTotalAmt + $IGSTTotalAmt - $discountTotalAmt;

		$qty = $data['qty'];

		/**received**/

		foreach ($full_bill_data as $key => $data) 
		{
			if($data['discount_price_status'] == 'AMOUNT')
			{
				$discountTotalAmt = $data['discount'];
			}
			else
			{
				$discountTotalAmt = (($data['discount']/100) * $data['price']) * $data['received'];
			}

			if($data['state_code'] == 33)
			{
				$CGSTTotalAmt = ($data['CGST']/100) * (($data['price']*$data['received']) - $discountTotalAmt);
				$SGSTTotalAmt = ($data['SGST']/100) * (($data['price']*$data['received']) - $discountTotalAmt);
			}
			else
			{
				$IGSTTotalAmt = ($data['IGST']/100) * (($data['price']*$data['received']) - $discountTotalAmt);
			}

			$totalAmount1 = (($data['price'] * $data['received']) + $CGSTTotalAmt + $SGSTTotalAmt + $IGSTTotalAmt - $discountTotalAmt) + $totalAmount1;
		}
		
		//end
		$result1 = $totalAmount/$qty;
		$result2 = $data['bill_amount'] - $totalAmount1;
		$result3 = $result2/$full_qty;
		$final   = $result1+$result3;
		// return $result1."/".$result2."/".$result3;
		return $final;
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
				$totalAmount -= $value['amount'];
			else
				$totalAmount += $value['amount'];

		}
		$template_name = 'debitNoteList.tpl';
		$outputArray['result'] = $data;
		$outputArray['result'][0]['totalAmount'] = $totalAmount;
		return $this->mysmarty->view($template_name,$outputArray,TRUE);
	}

	public function editChequeNumberDetailsAction()
	{
		$balanceAmt = $this->data['totalAmount'] - $this->data['cheque_amount'];
		
		if(($balanceAmt > 0) && ($this->data['cheque_amount'] != 0))
		{
			$this->PaymentBookQuery->selectCreditDebitNoteDetailsAsPerType($this->data);
			$addData = array(
				"supplier_id" => $this->data['supplier_id'],
				"debit_note_no" =>  "",
				"debit_note_date" => "",
				"type" => "B",
				"division" => $this->data['unit'],
				"supplier_creditnote"   => "",
				"supplier_creditnote_date"     =>"",
				"query"     => "",
				"payable_month"     => date('Y-m-d',strtotime('last day of next month', strtotime($this->data['payable_month']))),
				"amount"     => $balanceAmt
			);
			$this->PaymentBookQuery->insert_debit_note_details($addData);
		}
		unset($this->data['totalAmount']);
		$selectData = $this->PaymentBookQuery->select_cheque_number_details($this->data);
		if(count($selectData) == 0)
		{
			return $this->PaymentBookQuery->insert_cheque_number_details($this->data);
		}
		else
		{
			foreach ($selectData as $key => $value) {
				$this->data['cheque_number_id'] = $value['cheque_number_id'];
				$this->PaymentBookQuery->update_cheque_number_details($this->data);
			}
			return true;
		}
	}

	public function getChequeNumberDetailsAction()
	{
		$selectData = $this->PaymentBookQuery->select_cheque_number_details($this->data);
		if(count($selectData) != 0)
		{
			return $selectData[0];
		}
		return false;
	}

	public function addNoteDetails()
	{
		$addData = array(
				"supplier_id" => $this->data['supplier_id'],
				"debit_note_no" =>  $this->data['debitnote_no'],
				"debit_note_date" => $this->data['debitnote_date'],
				"type" => $this->data['type'],
				"division" => $this->data['division'],
				"supplier_creditnote"   => $this->data['supplier_creditnote_no'],
				"supplier_creditnote_date"     => $this->data['creditnote_date'],
				"query"     => $this->data['query'],
				"payable_month"     => $this->data['payable_month'],
				"amount"     => $this->data['amount']
			);
		return $this->PaymentBookQuery->insert_debit_note_details($addData);
	}

	public function updateNoteDetails()
	{
		$addData = array(
				"id" => $this->data['s_no'],
				"supplier_id" => $this->data['supplier_id'],
				"debit_note_no" =>  $this->data['debitnote_no'],
				"debit_note_date" => $this->data['debitnote_date'],
				"type" => $this->data['type'],
				"division" => $this->data['division'],
				"supplier_creditnote"   => $this->data['supplier_creditnote_no'],
				"supplier_creditnote_date"     => $this->data['creditnote_date'],
				"query"     => $this->data['query'],
				"payable_month"     => $this->data['payable_month'],
				"amount"     => $this->data['amount']
			);
		return $this->PaymentBookQuery->update_debit_note_details($addData);
	}

	public function downloadAsPdfPaymentBookDetails()
	{
		$this->data = $_GET;
		$finalResponse['supplier_id']     = empty($this->data['supplier_name'])?"":$this->data['supplier_name'];
		$finalResponse['lastDateOfMonth'] = date('Y-m-d',strtotime('last day of this month', time()));
		$this->data['date']               = empty($this->data['date']) ? "" : explode("/",$this->data['date']);
		$this->data['supplier_name']      = empty($this->data['supplier_name']) ? "" : $this->data['supplier_name'];
		$this->data['supplier_name']      = ($this->data['supplier_name'] == 'undefined') ? "" : $this->data['supplier_name'];
		$this->data['download_type']      = empty($this->data['download_type']) ? "PDF" : $this->data['download_type'];

		$data   = $this->PaymentBookQuery->getPaymentBookData($this->data);
		$result = array();

		if(count($data) == 0)
		{
			echo "<script>alert('No Data found');window.close();</script>";exit;
		}

		foreach ($data as $key => $value) {
			$po_number_details       = $this->config->item('po_number_details', 'po_generate_details');
			$data[$key]['po_raw_number'] = $data[$key]['po_number'];
			$data[$key]['po_number']     = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}

		foreach ($data as $key => $value) 
		{
			
			$payable_month_array[] = $value['payable_month'];
			if($value['payable_month'] == '0000-00-00')
			{
				if(in_array($finalResponse['lastDateOfMonth'],$payable_month_array)){
					$result[$finalResponse['lastDateOfMonth']]['paymentBookList'][$value['bill_number']][] = $value;
				}
				else
				{
					$result[$value['payable_month']."_".$value['supplier_id']]['paymentBookList'][$value['bill_number']][] = $value;
					$result[$value['payable_month']]."_".$value['supplier_id']['supplier_name'] = $value['supplier_name'];
					$result[$value['payable_month']."_".$value['supplier_id']]['supplier_id']   = $value['supplier_id'];
					$result[$value['payable_month']."_".$value['supplier_id']]['origin']        = $value['origin'];
				}
			}
			else
			{
				$result[$value['payable_month']."_".$value['supplier_id']]['paymentBookList'][$value['bill_number']][] = $value;
				$result[$value['payable_month']."_".$value['supplier_id']]['supplier_name'] = $value['supplier_name'];
				$result[$value['payable_month']."_".$value['supplier_id']]['supplier_id']   = $value['supplier_id'];
				$result[$value['payable_month']."_".$value['supplier_id']]['origin']        = $value['origin'];
			}
			$result[$value['payable_month']."_".$value['supplier_id']]['payable_month'] = $value['payable_month'];
		}

		$data = $this->PaymentBookQuery->getDebitNoteListData($this->data);
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']."_".$value['supplier_id']]['debitNoteList'][] = $value;
			$result[$value['payable_month']."_".$value['supplier_id']]['supplier_name'] = $value['supplier_name'];
			$result[$value['payable_month']."_".$value['supplier_id']]['supplier_id']   = $value['supplier_id'];
			$result[$value['payable_month']."_".$value['supplier_id']]['origin']        = $value['origin'];
			$result[$value['payable_month']."_".$value['supplier_id']]['payable_month'] = $value['payable_month'];
		}

		$advancePaymentDetails = array();
		$data = $this->PaymentBookQuery->getAdvancePaymentDetails($this->data,"Y");
		foreach ($data as $key => $value) 
		{
			$advancePaymentDetails[] = $value;
		}

		foreach ($result as $key1 => $value1) 
		{
			$po_number_array = array();
			foreach ($value1 as $key2 => $value2) 
			{
				if($key2 == 'paymentBookList')
				{
					foreach ($value2 as $key3 => $value3)
					{
						$full_qty = array_sum(array_column($value3,'received'));
						foreach ($value3 as $key4 => $value4)
						{
							$result[$key1][$key2][$key3][$key4]['avg_cost'] = $this->avgCostCalc($value4,$full_qty,$value3);
							$po_number_array[] = $value4['po_number'];
						}
					} 
				}
				foreach ($advancePaymentDetails as $Akey => $Avalue)
				{
					if(in_array($Avalue['full_po_number'],$po_number_array))
					{
						$result[$key1]['advancePaymentDetails'][] = $Avalue;
					}
				}
			}
			if(!empty($result[$key1]['advancePaymentDetails']))
				$result[$key1]['advancePaymentDetails'] = array_map("unserialize", array_unique(array_map("serialize",$result[$key1]['advancePaymentDetails'])));
		}

		$finalResponse['result']          = $result;
		$finalResponse['lastDateOfMonth'] = date('Y-m-d',strtotime('last day of this month', time()));

		foreach ($finalResponse['result'] as $key => $value) {
			$totalAmount = 0;
			foreach ($value['paymentBookList'] as $k1 => $v1) {
				$totalAmount += $v1[0]['bill_amount'];
			}
			foreach ($value['debitNoteList'] as $k2 => $v2) {
				if($v2['type'] == 'D' || $v2['type'] == 'T')
					$totalAmount -= $v2['amount'];
				if($v2['type'] == 'C' || $v2['type'] == 'B')
					$totalAmount += $v2['amount'];
			}
			$finalResponse['result'][$key]['totalAmount'] = $totalAmount;
		}

		$data = $this->PaymentBookQuery->select_all_cheque_number_details($this->data);
		foreach ($data as $key => $value) 
		{
			$finalResponse['result'][$value['payable_month']."_".$value['supplier_id']]['chequeNumberDetails'][] = $value;
		}
		if($this->data['download_type'] == 'PDF'){
			$template_name = 'paymentBookListPrint.tpl';
			$folder_name = realpath(APPPATH."../assets/po_html");
			
			$filename='paymentBookListPrint';
			
			file_put_contents($folder_name."/".$filename.".html",$this->mysmarty->view($template_name,$finalResponse,TRUE));

			chmod($folder_name."/".$filename.".html", 0777);
	
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
			{
				$cmd = 'cd C:\Program Files\wkhtmltopdf\bin && wkhtmltopdf.exe --orientation '.$folder_name.'/'.$filename.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';
			}
			else
			{
				$cmd = 'xvfb-run --server-args="-screen 0, 1024x768x24" wkhtmltopdf --orientation landscape '.$folder_name.'/'.$filename.'.html '.$folder_name.'/'.$filename.'.pdf  2>&1';
			}
			$response = exec($cmd);

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
		else
		{
			$this->downloadAsExcelDetails($finalResponse);
		} 
	}

	public function downloadAsExcelDetails($finalResponse){
		// echo "<pre>";
		// print_r($finalResponse);exit;

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
		$getActiveSheet = $spreadsheet->getActiveSheet();
		$spreadsheet->getDefaultStyle()->getFont()->setSize(11);
		$alignStyleArray = array(
		        'alignment' => array(
		            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
		        )
		);
		$rowCount   = 1;
		$getActiveSheet->mergeCells('I'.(string)($rowCount).':K'.(string)($rowCount))
					   ->setCellValue('I'.(string)($rowCount),"T.M. ABDUL RAHMAN & SONS ");
		$rowCount++;
		$getActiveSheet->mergeCells('J'.(string)($rowCount).':K'.(string)($rowCount))
					   ->setCellValue('J'.(string)($rowCount),strtoupper($this->data['division']).' UNIT');
		$rowCount++;
		$getActiveSheet->mergeCells('J'.(string)($rowCount).':K'.(string)($rowCount))
					   ->setCellValue('J'.(string)($rowCount),"RANIPET");

		$alpha = range('A','U');
		foreach ($alpha as $ak => $av) {
			$getActiveSheet->getStyle((string)$av.(string)(1))->getFont()->setBold(true);
			$getActiveSheet->getStyle((string)$av.(string)(2))->getFont()->setBold(true);
			$getActiveSheet->getStyle((string)$av.(string)(3))->getFont()->setBold(true);
			$getActiveSheet->getStyle($av.(string)(1))->applyFromArray($alignStyleArray);
			$getActiveSheet->getStyle($av.(string)(2))->applyFromArray($alignStyleArray);
			$getActiveSheet->getStyle($av.(string)(3))->applyFromArray($alignStyleArray);
		}
		//getDefaultStyle
		$spreadsheet->getDefaultStyle()->getFont()->setSize(10);
		$spreadsheet->getDefaultStyle()->getFont()->setName('MS Sans Serif');

		$rowCount   = 5;
		foreach ($finalResponse['result'] as $key => $value) {
			if((!empty($value['paymentBookList']) || !empty($value['debitNoteList']))){
				$startCount = $rowCount;
				$getActiveSheet->setCellValue('A'.(string)($rowCount),"PAYABLE_MONTH");
				$getActiveSheet->setCellValue('B'.(string)($rowCount),$value['payable_month']);
				$getActiveSheet->setCellValue('C'.(string)($rowCount),"SUPPLIER NAME");
				$getActiveSheet->setCellValue('D'.(string)($rowCount),$value['supplier_name']);
				$getActiveSheet->setCellValue('E'.(string)($rowCount),"ORIGIN");
				$getActiveSheet->setCellValue('F'.(string)($rowCount),$value['origin']);
			}

			foreach ($alpha as $ak => $av) {
				$getActiveSheet->getStyle((string)$av.(string)($rowCount))->getFont()->setBold(true);
				$getActiveSheet->getColumnDimension($av)->setAutoSize(true);
			}
			if(!empty($value['paymentBookList'])){
				$rowCount++;
				$getActiveSheet->setCellValue('A'.(string)($rowCount),"S.NO");
				$getActiveSheet->setCellValue('B'.(string)($rowCount),"HSN CODE");
				$getActiveSheet->setCellValue('C'.(string)($rowCount),"CGST");
				$getActiveSheet->setCellValue('D'.(string)($rowCount),"SGST");
				$getActiveSheet->setCellValue('E'.(string)($rowCount),"IGST");
				$getActiveSheet->setCellValue('F'.(string)($rowCount),"RECEIVED QTY");
				$getActiveSheet->setCellValue('G'.(string)($rowCount),"UOM");
				$getActiveSheet->setCellValue('H'.(string)($rowCount),"MATERIAL NAME");
				$getActiveSheet->setCellValue('I'.(string)($rowCount),"RATE");
				$getActiveSheet->setCellValue('J'.(string)($rowCount),"PO NUMBER");
				$getActiveSheet->setCellValue('K'.(string)($rowCount),"DC NUMBER");
				$getActiveSheet->setCellValue('L'.(string)($rowCount),"AVG COST");
				$getActiveSheet->setCellValue('M'.(string)($rowCount),"QUERY");
				$getActiveSheet->setCellValue('N'.(string)($rowCount),"BILL NUMBER");
				$getActiveSheet->setCellValue('O'.(string)($rowCount),"BILL DATE");
				$getActiveSheet->setCellValue('P'.(string)($rowCount),"PAYABLE_MONTH");
				$getActiveSheet->setCellValue('Q'.(string)($rowCount),"BILL AMOUNT");
				$getActiveSheet->setCellValue('R'.(string)($rowCount),"CHEQUE NUMBER");
				$getActiveSheet->setCellValue('S'.(string)($rowCount),"CHEQUE DATE");
				$getActiveSheet->setCellValue('T'.(string)($rowCount),"CHEQUE AMOUNT");
				$getActiveSheet->setCellValue('U'.(string)($rowCount),"BALANCE");

				foreach ($alpha as $ak => $av) {
					$getActiveSheet->getStyle((string)$av.(string)($rowCount))->getFont()->setBold(true);
					$getActiveSheet->getColumnDimension($av)->setAutoSize(true);
				}

				foreach ($value['paymentBookList'] as $k1 => $v1) {
					foreach ($v1 as $k2 => $v2) {
						$rowCount++;
						$getActiveSheet->setCellValue('A'.(string)($rowCount),$v2['s_no']);
						$getActiveSheet->setCellValue('B'.(string)($rowCount),$v2['material_hsn_code']);
						$getActiveSheet->setCellValue('C'.(string)($rowCount),$v2['CGST']);
						$getActiveSheet->setCellValue('D'.(string)($rowCount),$v2['SGST']);
						$getActiveSheet->setCellValue('E'.(string)($rowCount),$v2['IGST']);
						$getActiveSheet->setCellValue('F'.(string)($rowCount),$v2['received']);
						$getActiveSheet->setCellValue('G'.(string)($rowCount),$v2['material_uom']);
						$getActiveSheet->setCellValue('H'.(string)($rowCount),$v2['material_name']);
						$getActiveSheet->setCellValue('I'.(string)($rowCount),$v2['price']);
						$getActiveSheet->setCellValue('J'.(string)($rowCount),$v2['po_number']);
						$getActiveSheet->setCellValue('K'.(string)($rowCount),$v2['dc_number']);
						$getActiveSheet->setCellValue('L'.(string)($rowCount),$v2['avg_cost']);
						$getActiveSheet->setCellValue('M'.(string)($rowCount),$v2['query']);
						$getActiveSheet->setCellValue('N'.(string)($rowCount),$v2['bill_number']);
						$getActiveSheet->setCellValue('O'.(string)($rowCount),$v2['bill_date']);
						$getActiveSheet->setCellValue('P'.(string)($rowCount),$v2['payable_month']);
						$getActiveSheet->setCellValue('Q'.(string)($rowCount),$v2['bill_amount']);
					}
				}
			}

			if(!empty($value['debitNoteList'])){
				$rowCount++;
				$getActiveSheet->setCellValue('A'.(string)($rowCount),"S.NO");
				$getActiveSheet->mergeCells('B'.(string)($rowCount).':D'.(string)($rowCount))
						       ->setCellValue('B'.(string)($rowCount),"TYPE");
				$getActiveSheet->setCellValue('E'.(string)($rowCount),"DEBIT NOTE NO");
				$getActiveSheet->setCellValue('F'.(string)($rowCount),"DATE");
				$getActiveSheet->setCellValue('G'.(string)($rowCount),"SUPPLIER CREDIT NOTE	");
				$getActiveSheet->setCellValue('H'.(string)($rowCount),"DATE");
				$getActiveSheet->mergeCells('I'.(string)($rowCount).':O'.(string)($rowCount))
						       ->setCellValue('I'.(string)($rowCount),"QUERY");
				$getActiveSheet->setCellValue('P'.(string)($rowCount),"PAYABLE_MONTH");
				$getActiveSheet->setCellValue('Q'.(string)($rowCount),"AMOUNT");
				if(empty($value['paymentBookList'])){
					$getActiveSheet->setCellValue('R'.(string)($rowCount),"CHEQUE NUMBER");
					$getActiveSheet->setCellValue('S'.(string)($rowCount),"CHEQUE DATE");
					$getActiveSheet->setCellValue('T'.(string)($rowCount),"CHEQUE AMOUNT");
					$getActiveSheet->setCellValue('U'.(string)($rowCount),"BALANCE");
				}

				$getActiveSheet->getStyle('B'.(string)$rowCount)->applyFromArray($alignStyleArray);
				$getActiveSheet->getStyle('I'.(string)$rowCount)->applyFromArray($alignStyleArray);

				foreach ($alpha as $ak => $av) {
					$getActiveSheet->getStyle((string)$av.(string)($rowCount))->getFont()->setBold(true);
					$getActiveSheet->getColumnDimension($av)->setAutoSize(true);
				}

				$debitNoteListCount = 0;
				foreach ($value['debitNoteList'] as $k3 => $v3) {
					$rowCount++;$debitNoteListCount++;
					$getActiveSheet->setCellValue('A'.(string)($rowCount),$debitNoteList);

					if($v3['type'] == 'D') $type = 'DEBIT NOTE';
					if($v3['type'] == 'C') $type = 'CREDIT NOTE';
					if($v3['type'] == 'T') $type = 'TDS';
					if($v3['type'] == 'B') $type = 'BALANCE AMOUNT';
					$getActiveSheet->mergeCells('B'.(string)($rowCount).':D'.(string)($rowCount))
							       ->setCellValue('B'.(string)($rowCount),$type);

					$getActiveSheet->setCellValue('E'.(string)($rowCount),$v3['debit_note_no']);
					$getActiveSheet->setCellValue('F'.(string)($rowCount),$v3['debit_note_date']);
					$getActiveSheet->setCellValue('G'.(string)($rowCount),$v3['supplier_creditnote']);
					$getActiveSheet->setCellValue('H'.(string)($rowCount),$v3['supplier_creditnote_date']);
					$getActiveSheet->mergeCells('I'.(string)($rowCount).':O'.(string)($rowCount))
							       ->setCellValue('I'.(string)($rowCount),$v3['query']);
					$getActiveSheet->setCellValue('P'.(string)($rowCount),$v3['payable_month']);
					$getActiveSheet->setCellValue('Q'.(string)($rowCount),$v3['amount']);

					$getActiveSheet->getStyle('B'.(string)$rowCount)->applyFromArray($alignStyleArray);
					$getActiveSheet->getStyle('I'.(string)$rowCount)->applyFromArray($alignStyleArray);
				}
			}

			if(!empty($value['chequeNumberDetails']) && (!empty($value['paymentBookList']) || !empty($value['debitNoteList']))){
				$rowCount++;
				$getActiveSheet->setCellValue('P'.(string)($rowCount),"TOTAL");
				$getActiveSheet->setCellValue('Q'.(string)($rowCount),$value['totalAmount']);
				$getActiveSheet->setCellValue('R'.(string)($rowCount),$value['chequeNumberDetails'][0]['cheque_no']);
				$getActiveSheet->setCellValue('S'.(string)($rowCount),$value['chequeNumberDetails'][0]['cheque_date']);
				$getActiveSheet->setCellValue('T'.(string)($rowCount),$value['chequeNumberDetails'][0]['cheque_amount']);
				$getActiveSheet->setCellValue('U'.(string)($rowCount),($value['totalAmount'] - $value['chequeNumberDetails'][0]['cheque_amount']));

				$getActiveSheet->getStyle((string)'P'.(string)($rowCount))->getFont()->setBold(true);
			}

			$styleArray = array(
			    'fill' => array(
			        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
			        'color' => array('rgb' => 'FFFFFF00')
			    )
			);

			$style = array(
		        'borders' => array(
			        'allBorders' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			        ),
			    )
		    );

			$getActiveSheet->getStyle('P'.(string)($startCount+1).':P'.(string)($rowCount-1))->applyFromArray($styleArray);
			$getActiveSheet->getStyle('A'.(string)($startCount+1).':U'.(string)($rowCount))->applyFromArray($style);
			$rowCount = $rowCount+3;
		}

		//Download excel
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="PAYMENT_BOOK.xls"');
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
