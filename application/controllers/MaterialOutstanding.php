<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaterialOutstanding extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->library('Logwrite');
		$this->load->model('PoGenerateQuery');
		$this->load->model('PoMasterEntryQuery');
		$this->load->model('PaymentBookQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['supplier_name_details'] = $this->PoGenerateQuery->getSupplierNameDetails();
		$this->data['trash_details']         = $this->getTrashData();
		$this->data['material_name_details'] = $this->PoMasterEntryQuery->select_material_master();
		$this->data['po_unique_number']      = $this->getUniquePoNumber();
		return $this->mysmarty->view('MaterialOutstanding.tpl',$this->data,TRUE);
	}

	public function getTrashData(){
		$data =  $this->PoGenerateQuery->selectTrashData();
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		foreach ($data as $key => $value) {
			$data[$key]['full_po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		$this->logwrite->logWrite("getTrashData",print_r($data,1),"getTrashData","a+");
		return $data;
	}

	public function getUniquePoNumber(){
		$data =  $this->PoGenerateQuery->getUniquePoNumber();
		$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
		foreach ($data as $key => $value) {
			$data[$key]['full_po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
		}
		$this->logwrite->logWrite("getUniquePoNumber",print_r($data,1),"getUniquePoNumber","a+");
		return $data;
	}

	public function searchMaterialOutstandingAction()
	{
		if(!empty($this->data['po_number']))
		{
			$this->data['po_number'] = explode("|",$this->data['po_number']);
		}
		
		$this->data['date_range'] = explode("/",$this->data['date_range']);
		$data = $this->PoGenerateQuery->getMaterialOutStandingDataNew($this->data);
		foreach ($data as $key => $value) {
			$po_number_details       = $this->config->item('po_number_details', 'po_generate_details');
			$data[$key]['po_raw_number'] = $data[$key]['po_number'];
			$data[$key]['po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			/*$data[$key]['unit'] = strtoupper($value['unit']);
			$data[$key]['type'] = strtoupper($value['type']);*/

			$totalAmount = 0;
			$discountTotalAmt = 0;
			$CGSTTotalAmt = 0;
			$SGSTTotalAmt = 0;
			$IGSTTotalAmt = 0;
			$value['qty'] = $value['received'];

			if($value['discount_price_status'] == 'AMOUNT')
			{
				$discountTotalAmt = $value['discount'];
			}
			else
			{
				$discountTotalAmt = (($value['discount']/100) * $value['price']) * $value['qty'];
			}

			if($value['state_code'] == 33)
			{
				$CGSTTotalAmt = ($value['CGST']/100) * (($value['price']*$value['qty']) - $discountTotalAmt);
				$SGSTTotalAmt = ($value['SGST']/100) * (($value['price']*$value['qty']) - $discountTotalAmt);
			}
			else
			{
				$IGSTTotalAmt = ($value['IGST']/100) * (($value['price']*$value['qty']) - $discountTotalAmt);
			}

			$data[$key]['totalAmount'] = ($value['price'] * $value['qty']) + $CGSTTotalAmt + $SGSTTotalAmt + $IGSTTotalAmt - $discountTotalAmt;
		}
		$this->logwrite->logWrite("searchMaterialOutstandingAction",print_r($data,1),"searchMaterialOutstandingAction","a+");
		return $data;
	}

	public function cancelMaterialOutstandingAction()
	{
		$this->data['outstanding_type'] = 'T';
		return $this->PoGenerateQuery->moveTotrash($this->data);
	}

	public function addBackTrashIntoMaterial()
	{
		if($this->data['outstanding_type'] != 'T')
		{
			return false;
		}
		return $this->PoGenerateQuery->addBackTrashIntoMaterial($this->data);
	}

	public function updateMaterialOutstandingAction()
	{

		if($this->data['outstanding_type'] == 'M')
		{
			$received      = $this->data['received'];
			$received_data = $this->data['received_data'];
			$cal_rec_data  = $received_data + $received;
			$balance       = $this->data['qty'] - $cal_rec_data;

			$editData = array(
					"received" => $cal_rec_data,
					"id" => $this->data['po_generated_request_id'],
					"received_date" => date('Y-m-d'),
					"bill_amount"   => $this->data['bill_amount'],
					"dc_number"     => $this->data['dc_number']
				);
			$po_raw_number = $this->data['po_raw_number'];

			$this->data['parent_po_generated_request_id'] = $this->data['po_generated_request_id'];
			$this->data['po_number'] = $po_raw_number;
			$this->data['unit'] = strtoupper($this->data['unit']);
			$this->data['type'] = strtoupper($this->data['type']);
			$this->data['editType'] = strtoupper($this->data['editType']);
			// $this->data['balance'] = $balance;
			$this->data['created_date'] = date('Y-m-d');

			unset($this->data['po_generated_request_id']);
			unset($this->data['supplier_name']);
			unset($this->data['delay_day']);
			unset($this->data['$$hashKey']);
			unset($this->data['po_raw_number']);
			unset($this->data['received_data']);
			unset($this->data['material_master_name']);
			unset($this->data['state_code']);

			if ($this->data['editType'] == 'EDIT') {
				$this->data['outstanding_type'] = 'B';
			}else{
				$this->data['outstanding_type'] = 'T';
			}
			unset($this->data['editType']);
			
			$data    = array();
			$data[0] = $this->data;
			
			$this->PoGenerateQuery->update_po_generated_request_details($editData);
			$this->logwrite->logWrite("updateMaterialOutstandingAction",print_r($editData,1),"updateMaterialOutstandingAction","a+");
			$this->logwrite->logWrite("updateMaterialOutstandingAction",print_r($data,1),"insertMaterialOutstandingAction","a+");
			return $this->PoGenerateQuery->insert_po_generated_request_details($data);
		}
		else
		{
			$lastDateOfMonth = date('Y-m-d',strtotime('last day of this month', time()));
			unset($this->data['editType']);
			$this->data['payable_month'] = $lastDateOfMonth;

			$advancePaymentDetails = array();
			$data = $this->PaymentBookQuery->getAdvancePaymentDetails($this->data,"N");
			foreach ($data as $key => $value) 
			{
				$advancePaymentDetails[] = $value;
			}

			$po_data = $this->PaymentBookQuery->getPODetails($this->data['checkEditBoxBillOutStandingArray'][0]);

			$data = $this->PoGenerateQuery->getPoDataAsPerId($this->data['checkEditBoxBillOutStandingArray']);
			$po_number_details = $this->config->item('po_number_details', 'po_generate_details');
			foreach ($data as $key => $value) {
				$data[$key]['full_po_number'] = $po_number_details[$value['unit']][$value['type']]['format'].$value['po_number'];
			}
			// foreach ($advancePaymentDetails as $k2 => $v2) {
			// 	foreach ($data as $k1 => $v1) {
			// 		if($v1['full_po_number'] == $v2['full_po_number']){

			// 			$Udata['advance_payment_id'] = $v2['advance_payment_id'];
			// 			$Udata['used_status']        = 'Y';

			// 			$this->PaymentBookQuery->editAdvancePayment($Udata);
			// 			$data[$k1]['advance_payment_id'] = $v2['advance_payment_id'];
			// 			continue 2;
			// 		}
			// 	}
			// }
			// print_r($advancePaymentDetails);//exit;
			// print_r($data);exit;
			$this->data['checkEditBoxBillOutStandingArray'] = $data;
			foreach ($this->data['checkEditBoxBillOutStandingArray'] as $key => $value) 
			{
				$this->data['id']                 = $value['po_generated_request_id'];
				// $this->data['advance_payment_id'] = empty($value['advance_payment_id'])?0:$value['advance_payment_id'];
				unset($this->data['checkEditBoxBillOutStandingArray']);
				$this->PoGenerateQuery->update_po_generated_request_details($this->data);
			}
			$data = array();
			$data['payable_month'] = $lastDateOfMonth;
			$data['unit'] = $po_data[0]['unit'];
			$data['supplier_id'] = $po_data[0]['supplier_id'];
			$this->logwrite->logWrite("insert_cheque_number_details",print_r($data,1),"MaterialOutstandingAction","a+");
			$this->PaymentBookQuery->insert_cheque_number_details($data);
			return true;
		}
	}

	public function deleteMaterialOutstandingAction()
	{
		$this->PoGenerateQuery->updateReceivedDataWithPrevData($this->data);
		return $this->PoGenerateQuery->delete_po_generated_request_details($this->data);
		// print_r($this->data);exit();
	}
}
