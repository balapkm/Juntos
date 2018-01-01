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

	public function leatherSummaryReportSearcAjaxAction()
	{
		$this->data['date']        = $this->data['date'];
		$this->data['description'] = implode(',',$this->data['description']);
		return $this->DataEntryQuery->leatherSummaryReport($this->data);
	}

	public function leatherSummaryReportSearcAction()
	{
		$request = $_GET;
		$request['date']        = json_decode($request['date'],1);
		$request['description'] = implode(',',json_decode($request['description'],1));

		$data    = $this->DataEntryQuery->leatherSummaryReport($request);
		$reportData = array();
		foreach ($data as $key => $value) 
		{
			$reportData[$value['description_id']][$value['query']][] = $value;
			$reportData[$value['description_id']]['description_name']= $value['description_name'];
			$reportData[$value['description_id']]['leather']= $value['leather'];
		}
		
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
		        ->setCellValue('C2', 'SHOE '.strtoupper($request['leather']).' UNIT')
		        ->setCellValue('C3', 'RANIPET')
		        ->setCellValue('C5', strtoupper($request['leather']).' LEATHER RECEIVED FOR THE PERIOD FROM   '.date('d/m/Y',strtotime($request['date'][0])).'   TO '.date('d/m/Y',strtotime($request['date'][1])));

		$style = array(
				'font' => array(
			        'bold' => true,
			    ),
		        'alignment' => array(
		            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
		        )
		    );

		//getDefaultStyle
		$spreadsheet->getDefaultStyle()->getFont()->setSize(9.9);
		$spreadsheet->getDefaultStyle()->getFont()->setName('MS Sans Serif');
		// $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(15);

		$getActiveSheet = $spreadsheet->getActiveSheet();

		$getActiveSheet->getStyle('C1:C5')->applyFromArray($style);
		$getActiveSheet->getColumnDimension('A')->setWidth(25);
		$getActiveSheet->getColumnDimension('B')->setWidth(25);
		$getActiveSheet->getColumnDimension('C')->setWidth(15);
		$getActiveSheet->getColumnDimension('D')->setWidth(15);

		$rowCount   = 7;
		$query_details = $this->config->item('query', 'leather_details');
		foreach ($reportData as $key => $value) 
		{
			$getActiveSheet->setCellValue('B'.(string)($rowCount),strtoupper($value['leather']).' LEATHER');
			$getActiveSheet->setCellValue('D'.(string)($rowCount),strtoupper($value['description_name']));
			$getActiveSheet->getStyle('B'.(string)($rowCount))->getFont()->setBold(true);
			$getActiveSheet->getStyle('D'.(string)($rowCount))->getFont()->setBold(true);
			//title
			$rowCount = $rowCount+2;
			$borderStartCount = $rowCount;
			$getActiveSheet->setCellValue('A'.(string)($rowCount),"ART");
			$getActiveSheet->setCellValue('B'.(string)($rowCount),"COL");
			$getActiveSheet->setCellValue('C'.(string)($rowCount),"SEL.");
			$getActiveSheet->setCellValue('D'.(string)($rowCount),"PIECES");
			$getActiveSheet->setCellValue('E'.(string)($rowCount),"SQFT");
			$getActiveSheet->setCellValue('F'.(string)($rowCount),"RATE");
			$getActiveSheet->setCellValue('G'.(string)($rowCount),"AMOUNT");

			$getActiveSheet->getStyle('A'.(string)($rowCount))->getFont()->setBold(true);
			$getActiveSheet->getStyle('B'.(string)($rowCount))->getFont()->setBold(true);
			$getActiveSheet->getStyle('C'.(string)($rowCount))->getFont()->setBold(true);
			$getActiveSheet->getStyle('D'.(string)($rowCount))->getFont()->setBold(true);
			$getActiveSheet->getStyle('E'.(string)($rowCount))->getFont()->setBold(true);
			$getActiveSheet->getStyle('F'.(string)($rowCount))->getFont()->setBold(true);
			$getActiveSheet->getStyle('G'.(string)($rowCount))->getFont()->setBold(true);
			$leatherReceivedCount = 0;
			$leatherReturnedCount = 0;
			$sleatherReceivedCount = 0;
			$sleatherReturnedCount = 0;
			foreach ($value as $k1 => $v1)
			{
				//every query
				if(in_array($k1,$query_details))
				{
					$rowCount = $rowCount+1;
					$getActiveSheet->setCellValue('A'.(string)($rowCount),strtoupper($k1));
					$getActiveSheet->getStyle('A'.(string)($rowCount))->getFont()->setBold(true);
					$getActiveSheet->getStyle('A'.(string)($rowCount))->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
					if($k1 == "Return")
					{
						$styleArray = array(
							'font' => array(
						        'bold' => true,
						    ),
						    'fill' => array(
						        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
						        'color' => array('rgb' => 'FF0000FF')
						    )
						);
						$getActiveSheet->getStyle('A'.(string)($rowCount))->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
						$getActiveSheet->getStyle('A'.(string)($rowCount))->applyFromArray($styleArray);
					}
					//data details
					$startCount = $rowCount+1;
					$piecesCount= 0;
					$sqfeetCount= 0;
					foreach ($v1 as $k2 => $v2) 
					{
						$rowCount = $rowCount+1;
						$getActiveSheet->setCellValue('A'.(string)($rowCount),$v2['article_name']);
						$getActiveSheet->setCellValue('B'.(string)($rowCount),$v2['color_name']);
						$getActiveSheet->setCellValue('C'.(string)($rowCount),$v2['selection_name']);
						$getActiveSheet->setCellValue('D'.(string)($rowCount),$v2['sum_pieces']);
						$getActiveSheet->setCellValue('E'.(string)($rowCount),$v2['sum_sqfeet']);
						$getActiveSheet->setCellValue('F'.(string)($rowCount),"");
						$getActiveSheet->setCellValue('G'.(string)($rowCount),"0.00");
						$piecesCount += $v2['sum_pieces'];
						$sqfeetCount += $v2['sum_sqfeet'];
					}
					$endCount = $rowCount;
					$rowCount = $rowCount+1;
					$getActiveSheet->setCellValue('C'.(string)($rowCount),"TOTAL :");
					$getActiveSheet->setCellValue('D'.(string)($rowCount),"=SUM(D".(string)($startCount).":D".(string)($endCount).")");
					$getActiveSheet->setCellValue('E'.(string)($rowCount),"=SUM(E".(string)($startCount).":E".(string)($endCount).")");
					$getActiveSheet->setCellValue('G'.(string)($rowCount),"=SUM(G".(string)($startCount).":G".(string)($endCount).")");

					$getActiveSheet->getStyle('C'.(string)($rowCount))->getFont()->setBold(true);
					$getActiveSheet->getStyle('D'.(string)($rowCount))->getFont()->setBold(true);
					$getActiveSheet->getStyle('E'.(string)($rowCount))->getFont()->setBold(true);
					$getActiveSheet->getStyle('G'.(string)($rowCount))->getFont()->setBold(true);
					if($k1 != 'Return')
					{
						$leatherReceivedCount  += $piecesCount;
						$sleatherReceivedCount += $sqfeetCount;
					}
					else
					{
						$leatherReturnedCount  += $piecesCount;
						$sleatherReturnedCount += $sqfeetCount;
					}
				}
			}

			$styleArray = array(
				'font' => array(
			        'bold' => true,
			    ),
			    'fill' => array(
			        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
			        'color' => array('rgb' => 'FFFFFF00')
			    )
			);
			$borderEndCount = $rowCount;

			$style = array(
		        'borders' => array(
			        'allBorders' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			        ),
			    )
		    );

		    $getActiveSheet->getStyle('A'.(string)($borderStartCount).':G'.(string)$borderEndCount)->applyFromArray($style);

			$rowCount = $rowCount+1;
			$getActiveSheet->setCellValue('B'.(string)($rowCount),"TOTAL LEATHER RECEIVED :");
			$getActiveSheet->setCellValue('D'.(string)($rowCount),$leatherReceivedCount);
			$getActiveSheet->setCellValue('E'.(string)($rowCount),$sleatherReceivedCount);
			$getActiveSheet->setCellValue('G'.(string)($rowCount),"0.00");

			$getActiveSheet->getStyle('D'.(string)($rowCount))->applyFromArray($styleArray);
			$getActiveSheet->getStyle('E'.(string)($rowCount))->applyFromArray($styleArray);

			$rowCount = $rowCount+1;
			$getActiveSheet->setCellValue('B'.(string)($rowCount),"TOTAL LEATHER RETURNED :");
			$getActiveSheet->setCellValue('D'.(string)($rowCount),$leatherReturnedCount);
			$getActiveSheet->setCellValue('E'.(string)($rowCount),$sleatherReturnedCount);
			$getActiveSheet->setCellValue('G'.(string)($rowCount),"0.00");
			$getActiveSheet->getStyle('D'.(string)($rowCount))->applyFromArray($styleArray);
			$getActiveSheet->getStyle('E'.(string)($rowCount))->applyFromArray($styleArray);

			$rowCount = $rowCount+1;
			$getActiveSheet->setCellValue('B'.(string)($rowCount),"TOTAL");
			$getActiveSheet->setCellValue('D'.(string)($rowCount),$leatherReceivedCount-$leatherReturnedCount);
			$getActiveSheet->setCellValue('E'.(string)($rowCount),$sleatherReceivedCount-$sleatherReturnedCount);
			$getActiveSheet->setCellValue('G'.(string)($rowCount),"0.00");
			$getActiveSheet->getStyle('D'.(string)($rowCount))->applyFromArray($styleArray);
			$getActiveSheet->getStyle('E'.(string)($rowCount))->applyFromArray($styleArray);

			$rowCount = $rowCount+2;
		}

		$rowCount = $rowCount + 1;
		$getActiveSheet->setCellValue('B'.(string)($rowCount),"SUMMARY REPORT");
		$getActiveSheet->getStyle('B'.(string)($rowCount))->getFont()->setBold(true);
		$rowCount = $rowCount + 2;

		$styleArray = array(
						'font' => array(
					        'bold' => true,
					    ),
				        'alignment' => array(
				            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
				        )
				    );
		$borderStartCount = $rowCount;
		$getActiveSheet->mergeCells('B'.(string)($rowCount).':C'.(string)($rowCount))
					   ->setCellValue('B'.(string)($rowCount),"RECEIVED.")
					   ->getStyle('B'.(string)($rowCount))->applyFromArray($styleArray);

		$getActiveSheet->mergeCells('D'.(string)($rowCount).':E'.(string)($rowCount))
					   ->setCellValue('D'.(string)($rowCount),"RETURNED")
					   ->getStyle('D'.(string)($rowCount))->applyFromArray($styleArray);

		$getActiveSheet->mergeCells('F'.(string)($rowCount).':G'.(string)($rowCount))
					   ->setCellValue('F'.(string)($rowCount),"TOTAL")
					   ->getStyle('F'.(string)($rowCount))->applyFromArray($styleArray);

		$rowCount = $rowCount + 1;
		$getActiveSheet->setCellValue('A'.(string)($rowCount),"DESC")
					   ->setCellValue('B'.(string)($rowCount),"PCS")
					   ->setCellValue('C'.(string)($rowCount),"SQFT")
					   ->setCellValue('D'.(string)($rowCount),"PCS")
					   ->setCellValue('E'.(string)($rowCount),"SQFT")
					   ->setCellValue('F'.(string)($rowCount),"PCS")
					   ->setCellValue('G'.(string)($rowCount),"SQFT");

		$getActiveSheet->getStyle('A'.(string)($rowCount))->applyFromArray($styleArray);
		$getActiveSheet->getStyle('B'.(string)($rowCount))->applyFromArray($styleArray);
		$getActiveSheet->getStyle('C'.(string)($rowCount))->applyFromArray($styleArray);
		$getActiveSheet->getStyle('D'.(string)($rowCount))->applyFromArray($styleArray);
		$getActiveSheet->getStyle('E'.(string)($rowCount))->applyFromArray($styleArray);
		$getActiveSheet->getStyle('F'.(string)($rowCount))->applyFromArray($styleArray);
		$getActiveSheet->getStyle('G'.(string)($rowCount))->applyFromArray($styleArray);

		foreach ($reportData as $key => $value) 
		{
			$rowCount = $rowCount + 1;
			$getActiveSheet->setCellValue('A'.(string)($rowCount),strtoupper($value['description_name']));
			$leatherReceivedCount = 0;
			$leatherReturnedCount = 0;
			$sleatherReceivedCount = 0;
			$sleatherReturnedCount = 0;

			foreach ($value as $k1 => $v1)
			{
				//every query
				if(in_array($k1,$query_details))
				{
					$piecesCount= 0;
					$sqfeetCount= 0;
					foreach ($v1 as $k2 => $v2) 
					{
						$piecesCount += $v2['sum_pieces'];
						$sqfeetCount += $v2['sum_sqfeet'];
					}

					if($k1 != 'Return')
					{
						$leatherReceivedCount  += $piecesCount;
						$sleatherReceivedCount += $sqfeetCount;
					}
					else
					{
						$leatherReturnedCount  += $piecesCount;
						$sleatherReturnedCount += $sqfeetCount;
					}
				}
			}
			$getActiveSheet->setCellValue('B'.(string)($rowCount),$leatherReceivedCount);
			$getActiveSheet->setCellValue('C'.(string)($rowCount),$sleatherReceivedCount);
			$getActiveSheet->setCellValue('D'.(string)($rowCount),$leatherReturnedCount);
			$getActiveSheet->setCellValue('E'.(string)($rowCount),$sleatherReturnedCount);
			$getActiveSheet->setCellValue('F'.(string)($rowCount),$leatherReceivedCount - $leatherReturnedCount);
			$getActiveSheet->setCellValue('G'.(string)($rowCount),$sleatherReceivedCount - $sleatherReturnedCount);
		}

		$borderEndCount = $rowCount;

		$style = array(
		        'borders' => array(
			        'allBorders' => array(
			            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			        ),
			    )
		    );

		    $getActiveSheet->getStyle('A'.(string)($borderStartCount).':G'.(string)$borderEndCount)->applyFromArray($style);

		//Download excel
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="LEATHER_SUMMARY_REPORT.xls"');
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
