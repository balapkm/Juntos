<?php
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/excel/src/Bootstrap.php';

class Report extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('commonQuery');
		$this->load->model('DataEntryQuery');
		$this->load->config('application');
		$this->load->model('MasterEntryQuery');
	}

	public function index()
	{
		$this->data['leather']          = $this->config->item('leather', 'leather_details');
		$this->data['query']            = $this->config->item('query', 'leather_details');
		$this->data['serial_no_unique'] = $this->DataEntryQuery->getSerialNumberUnique();
		$this->data['description_data'] = $this->MasterEntryQuery->select_master_entry('description_details');
		return $this->mysmarty->view('Report.tpl',$this->data,TRUE);
	}

	public function searchAction()
	{
		return $this->DataEntryQuery->reportSearchDataEntry($this->data);
	}

	public function leatherSummaryReportSearcAction()
	{
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Maarten Balliauw')
		        ->setLastModifiedBy('Maarten Balliauw')
		        ->setTitle('Office 2007 XLSX Test Document')
		        ->setSubject('Office 2007 XLSX Test Document')
		        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		        ->setKeywords('office 2007 openxml php')
		        ->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		        ->setCellValue('C1', 'Test')
		        ->setCellValue('C2', 'Test')
		        ->setCellValue('C3', 'Chennai')
		        ->setCellValue('C5', 'UPPER LEATHER RECEIVED FOR THE PERIOD FROM    01/11/2017   TO  31/11/2017');

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="01simple.xls"');
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
