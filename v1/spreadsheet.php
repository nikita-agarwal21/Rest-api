<?php
require "D:/xampp/phpMyAdmin/vendor/autoload.php";

use \phpoffice\phpspreadsheet\src\PhpSpreadsheet\Spreadsheet ;
use \phpoffice\phpspreadsheet\src\PhpSpreadsheet\Writer\Xlsx ;

$spreadsheet=new Spreadsheet();
$sheet=$spreadsheet->getActiveSheet();
$sheet->setCellValue('A1','Hello world');

$writer=new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');


 ?>
