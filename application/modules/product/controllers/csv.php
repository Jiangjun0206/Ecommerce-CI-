<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Csv extends Public_Controller {
    function __construct() {
        parent::__construct();
        $this->functions->check_session();
        $this->functions->access();
        $this->load->model('product_model');
        $this->load->library('Pdf');
        $this->load->model('Createpdf_model', 'createpdf');
        $this->load->library('table');


    }
public function generate_xlsx_report() {
	//load xlsx library
	$this->load->library('Excel');
	
	//define column headers
	$headers = array('Product Id' => 'integer', 'Price' => 'price', 'Sale Price' => 'price', 'Sales Count' => 'integer', 'Sale Date' => 'string');
	
	//fetch data from database
	$salesinfo = $this->product_model->get_salesinfo();
	
	//create writer object
	$writer = new Excel();
	
        //meta data info
	$keywords = array('xlsx','MySQL','Codeigniter');
	$writer->setTitle('Sales Information for Products');
	$writer->setSubject('Report generated using Codeigniter and XLSXWriter');
	$writer->setAuthor('https://www.roytuts.com');
	$writer->setCompany('https://www.roytuts.com');
	$writer->setKeywords($keywords);
	$writer->setDescription('Sales information for products');
	$writer->setTempDir(sys_get_temp_dir());
	
	//write headers
	$writer->writeSheetHeader('Sheet1', $headers);
	
	//write rows to sheet1
	foreach ($salesinfo as $sf):
		$writer->writeSheetRow('Sheet1',array($sf->id, $sf->price, $sf->sale_price, $sf->sales_count, $sf->sale_date));
	endforeach;
	
	$fileLocation = 'salesinfo.xlsx';
	
	//write to xlsx file
	$writer->writeToFile($fileLocation);
	//echo $writer->writeToString();
	
	//force download
	header('Content-Description: File Transfer');
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment; filename=".basename($fileLocation));
	header("Content-Transfer-Encoding: binary");
	header("Expires: 0");
	header("Pragma: public");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header('Content-Length: ' . filesize($fileLocation)); //Remove

	ob_clean();
	flush();

	readfile($fileLocation);
	unlink($fileLocation);
	exit(0);
}
}