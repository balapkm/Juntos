<?php

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

require_once __DIR__ . '/../../src/Bootstrap.php';

$helper = new Sample();
if ($helper->isCli()) {
    $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

    return;
}

// Create new Spreadsheet object
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

// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Simple');
$spreadsheet->getActiveSheet()->getStyle("A1:J68")->getFont()->setSize(10)->setBold(true);
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$style = array(
        'alignment' => array(
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ),
        'fill' => array(
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'color' => array('rgb' => 'FF0000')
        )
    );

$spreadsheet->getActiveSheet()->getStyle('C1:C5')->applyFromArray($style);// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(15);

$spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A9', 'ART')
        ->setCellValue('B9', 'COL')
        ->setCellValue('C9', 'SEL')
        ->setCellValue('D9', 'PIECES')
        ->setCellValue('E9', 'SQFT')
        ->setCellValue('F9', 'RATE')
        ->setCellValue('G9', 'AMOUNT');

// Redirect output to a client’s web browser (Xls)
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
