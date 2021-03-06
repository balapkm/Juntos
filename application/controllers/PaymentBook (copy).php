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

		//check balance amount
		
		foreach ($finalResponse['result'] as $key => $value) {
			$totalAmount = 0;
			foreach ($value['paymentBookList'] as $k1 => $v1) {
				$totalAmount += $v1[0]['bill_amount'];
			}
			foreach ($value['debitNoteList'] as $k2 => $v2) {
				if($v2['type'] == 'D' || $v2['type'] == 'T')
					$totalAmount -= $v1[0]['amount'];
				if($v2['type'] == 'C' || $v2['type'] == 'B')
					$totalAmount += $v1[0]['amount'];
			}
			$finalResponse['result'][$key]['totalAmount'] = $totalAmount;
		}

		foreach ($finalResponse['result'] as $key => $value) {
			$data = array();
			$data['supplier_name'] = $value['supplier_id'];
			$data['division']    = $this->data['division'];
			$data['date'][0] = date('Y-m-d',strtotime('first day of last month', strtotime($value['payable_month'])));
			$data['date'][1] = date('Y-m-d',strtotime('last day of last month', strtotime($value['payable_month'])));

			$paymentBookData   = $this->PaymentBookQuery->getPaymentBookData($data,'Y');
			$result = array();
			foreach ($paymentBookData as $k1 => $v1) 
			{
				$result[$v1['payable_month']."_".$v1['supplier_id']]['paymentBookList'][$v1['bill_number']][] = $v1;
				$result[$v1['payable_month']."_".$v1['supplier_id']]['supplier_name'] = $v1['supplier_name'];
				$result[$v1['payable_month']."_".$v1['supplier_id']]['supplier_id']   = $v1['supplier_id'];
				$result[$v1['payable_month']."_".$v1['supplier_id']]['origin']        = $v1['origin'];
			}

			$getDebitNoteListData = $this->PaymentBookQuery->getDebitNoteListData($data);
			foreach ($getDebitNoteListData as $k1 => $v1) 
			{
				$result[$v1['payable_month']."_".$v1['supplier_id']]['debitNoteList'][] = $v1;
			}

			$chequeData = $this->PaymentBookQuery->select_all_cheque_number_details($data);
			foreach ($chequeData as $k1 => $v1) 
			{
				$result[$v1['payable_month']."_".$v1['supplier_id']]['chequeNumberDetails'][] = $v1;
			}

			foreach ($result as $k1 => $v1) {
				$totalAmount = 0;
				foreach ($v1['paymentBookList'] as $k2 => $v2) {
					$totalAmount += $v2[0]['bill_amount'];
				}
				foreach ($v1['debitNoteList'] as $k2 => $v2) {
					if($v2['type'] == 'D' || $v2['type'] == 'T')
						$totalAmount -= $v1[0]['amount'];
					if($v2['type'] == 'C' || $v2['type'] == 'B')
						$totalAmount += $v1[0]['amount'];
				}
				$result[$k1]['totalAmount'] = $totalAmount;
				$result[$k1]['balanceAmount'] = $totalAmount - $v1['chequeNumberDetails'][0]['cheque_amount'];
			}
			$finalResponse['result'][$key]['balanceAmount'] = 0;
			foreach ($result as $k1 => $v1) {
				if(!empty($v1['chequeNumberDetails'][0]['cheque_amount']) && !empty($v1['chequeNumberDetails'][0]['cheque_no'])){
					$finalResponse['result'][$key]['balanceAmount'] += $v1['balanceAmount'];
				}
			}
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
		// print_r($this->data);exit;
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
					$totalAmount -= $v1[0]['amount'];
				if($v2['type'] == 'C' || $v2['type'] == 'B')
					$totalAmount += $v1[0]['amount'];
			}
			$finalResponse['result'][$key]['totalAmount'] = $totalAmount;
		}

		foreach ($finalResponse['result'] as $key => $value) {
			$data = array();
			$data['supplier_name'] = $value['supplier_id'];
			$data['division']    = $this->data['division'];
			$data['date'][0] = date('Y-m-d',strtotime('first day of last month', strtotime($value['payable_month'])));
			$data['date'][1] = date('Y-m-d',strtotime('last day of last month', strtotime($value['payable_month'])));
			$paymentBookData   = $this->PaymentBookQuery->getPaymentBookData($data);
			$result = array();
			foreach ($paymentBookData as $k1 => $v1) 
			{
				$result[$v1['payable_month']."_".$v1['supplier_id']]['paymentBookList'][$v1['bill_number']][] = $v1;
				$result[$v1['payable_month']."_".$v1['supplier_id']]['supplier_name'] = $v1['supplier_name'];
				$result[$v1['payable_month']."_".$v1['supplier_id']]['supplier_id']   = $v1['supplier_id'];
				$result[$v1['payable_month']."_".$v1['supplier_id']]['origin']        = $v1['origin'];
			}

			$getDebitNoteListData = $this->PaymentBookQuery->getDebitNoteListData($data);
			foreach ($getDebitNoteListData as $k1 => $v1) 
			{
				$result[$v1['payable_month']."_".$v1['supplier_id']]['debitNoteList'][] = $v1;
			}

			$chequeData = $this->PaymentBookQuery->select_all_cheque_number_details($data);
			foreach ($chequeData as $k1 => $v1) 
			{
				$result[$v1['payable_month']."_".$v1['supplier_id']]['chequeNumberDetails'][] = $v1;
			}

			foreach ($result as $k1 => $v1) {
				$totalAmount = 0;
				foreach ($v1['paymentBookList'] as $k2 => $v2) {
					$totalAmount += $v2[0]['bill_amount'];
				}
				foreach ($v1['debitNoteList'] as $k2 => $v2) {
					if($v2['type'] == 'D' || $v2['type'] == 'T')
						$totalAmount -= $v1[0]['amount'];
					if($v2['type'] == 'C' || $v2['type'] == 'B')
						$totalAmount += $v1[0]['amount'];
				}
				$result[$k1]['totalAmount'] = $totalAmount;
				$result[$k1]['balanceAmount'] = $totalAmount - $v1['chequeNumberDetails'][0]['cheque_amount'];
			}
			$finalResponse['result'][$key]['balanceAmount'] = 0;
			foreach ($result as $k1 => $v1) {
				if(!empty($v1['chequeNumberDetails'][0]['cheque_amount']) && !empty($v1['chequeNumberDetails'][0]['cheque_no'])){
					$finalResponse['result'][$key]['balanceAmount'] += $v1['balanceAmount'];
				}
			}
		}

		$data = $this->PaymentBookQuery->select_all_cheque_number_details($this->data);
		foreach ($data as $key => $value) 
		{
			$finalResponse['result'][$value['payable_month']."_".$value['supplier_id']]['chequeNumberDetails'][] = $value;
		}

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
