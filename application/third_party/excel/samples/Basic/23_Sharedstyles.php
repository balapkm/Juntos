<?php
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\IOFactory;
require_once __DIR__ . '/../../src/Bootstrap.php';

// require __DIR__ . '/../Header.php';

// Create new Spreadsheet object
$helper = new Sample();
$helper->log('Create new Spreadsheet object');
$spreadsheet = new Spreadsheet();

// Set document properties
$helper->log('Set document properties');
$spreadsheet->getProperties()->setCreator('Maarten Balliauw')
        ->setLastModifiedBy('Maarten Balliauw')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

// Add some data
$helper->log('Add some data');
$spreadsheet->setActiveSheetIndex(0);

$sharedStyle1 = new Style();
$sharedStyle2 = new Style();

$sharedStyle1->applyFromArray(
    ['fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFCCFFCC'],
            ],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'right' => ['borderStyle' => Border::BORDER_MEDIUM],
            ],
        ]
);

$sharedStyle2->applyFromArray(
    ['fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFFFFF00'],
            ],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'right' => ['borderStyle' => Border::BORDER_MEDIUM],
            ],
        ]
);

$spreadsheet->getActiveSheet()->duplicateStyle($sharedStyle1, 'A1:T100');
$spreadsheet->getActiveSheet()->duplicateStyle($sharedStyle2, 'C5:R95');
$spreadsheet->setActiveSheetIndex(0);
// Save
// $helper->write($spreadsheet, __FILE__);

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
