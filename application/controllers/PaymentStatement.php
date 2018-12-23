<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentStatement extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('PoGenerateQuery');
		$this->load->model('PaymentStatementQuery');
		$this->load->config('application');
	}

	public function index()
	{
		$this->data['supplier_name_details'] = $this->PoGenerateQuery->getSupplierNameDetails();
		return $this->mysmarty->view('PaymentStatement.tpl',$this->data,TRUE);
	}

	public function searchAction()
	{
		$this->data['payment_statement_month'] = explode('/',$this->data['payment_statement_month']);
		$data = $this->PaymentStatementQuery->getSearchActionAsPerRequest($this->data);
		if(count($data) == 0)
		{
			return false;
		}

		$data[]['total_amount'] = array_sum(array_column($data,'total_amount'));
		// print_r($data);exit;
		return $data;
	}

	public function updateEditPaymentStatement()
	{
		return $this->PaymentStatementQuery->updateEditPaymentStatement($this->data);
	}
}
