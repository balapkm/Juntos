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
		$this->data['advancePaymentDetails'] = $this->PaymentBookQuery->getAdvancePaymentFullDetails();
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
		$finalResponse['supplier_id']     = $this->data['supplier_name'];
		$finalResponse['lastDateOfMonth'] = date('Y-m-d',strtotime('last day of this month', time()));
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
					$result[$value['payable_month']]['paymentBookList'][$value['bill_number']][] = $value;
					$result[$value['payable_month']]['supplier_name'] = $value['supplier_name'];
					$result[$value['payable_month']]['supplier_id']   = $value['supplier_id'];
					$result[$value['payable_month']]['origin']        = $value['origin'];
				}
			}
			else
			{
				$result[$value['payable_month']]['paymentBookList'][$value['bill_number']][] = $value;
				$result[$value['payable_month']]['supplier_name'] = $value['supplier_name'];
				$result[$value['payable_month']]['supplier_id']   = $value['supplier_id'];
				$result[$value['payable_month']]['origin']        = $value['origin'];
			}
		}

		$data = $this->PaymentBookQuery->getDebitNoteListData($this->data);
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']]['debitNoteList'][] = $value;
		}

		$advancePaymentDetails = array();
		$data = $this->PaymentBookQuery->getAdvancePaymentDetails($this->data);
		foreach ($data as $key => $value) 
		{
			$advancePaymentDetails[] = $value;
		}


		$data = $this->PaymentBookQuery->select_all_cheque_number_details($this->data);
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']]['chequeNumberDetails'][] = $value;
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
		// print_r($result);exit;
		$finalResponse['result']          = $result;
		
		$template_name = 'paymentBookList.tpl';
		return $this->mysmarty->view($template_name,$finalResponse,TRUE);
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
				$totalAmount += $value['amount'];
			else
				$totalAmount -= $value['amount'];

		}
		$template_name = 'debitNoteList.tpl';
		$outputArray['result'] = $data;
		$outputArray['result'][0]['totalAmount'] = $totalAmount;
		return $this->mysmarty->view($template_name,$outputArray,TRUE);
	}

	public function editChequeNumberDetailsAction()
	{
		$selectData = $this->PaymentBookQuery->select_cheque_number_details($this->data);
		if(count($selectData) == 0)
		{
			return $this->PaymentBookQuery->insert_cheque_number_details($this->data);
		}
		else
		{
			$this->data['cheque_number_id'] = $selectData[0]['cheque_number_id'];
			return $this->PaymentBookQuery->update_cheque_number_details($this->data);
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
		$this->data['type'] = "";
		$finalResponse['suplier_id']  = $this->data['supplier_name'];
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
					$result[$value['payable_month']]['paymentBookList'][$value['bill_number']][] = $value;
					$result[$value['payable_month']]['supplier_name'] = $value['supplier_name'];
					$result[$value['payable_month']]['supplier_id']   = $value['supplier_id'];
					$result[$value['payable_month']]['origin']        = $value['origin'];
				}
			}
			else
			{
				$result[$value['payable_month']]['paymentBookList'][$value['bill_number']][] = $value;
				$result[$value['payable_month']]['supplier_name'] = $value['supplier_name'];
				$result[$value['payable_month']]['supplier_id']   = $value['supplier_id'];
				$result[$value['payable_month']]['origin']        = $value['origin'];
			}
		}

		$data = $this->PaymentBookQuery->getDebitNoteListData($this->data);
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']]['debitNoteList'][] = $value;
		}

		$advancePaymentDetails = array();
		$data = $this->PaymentBookQuery->getAdvancePaymentDetails($this->data);
		foreach ($data as $key => $value) 
		{
			$advancePaymentDetails[] = $value;
		}

		$data = $this->PaymentBookQuery->select_all_cheque_number_details($this->data);
		foreach ($data as $key => $value) 
		{
			$result[$value['payable_month']]['chequeNumberDetails'][] = $value;
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
