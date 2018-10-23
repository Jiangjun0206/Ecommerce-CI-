<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sale extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->functions->check_session();
        $this->functions->access();
        $this->load->model('sale_model');
        $this->load->library('Pdf');
        // $this->load->model('Createpdf_model', 'createpdf');
        $this->load->library('table');
        $this->load->library('lib_pagination');
        $this->load->helper("url");


    }
    public function index($page=0) {
       if (!$this->aauth->is_user_allowed('user/user_list')) {

            $fname = $this->aauth->get_user_first_name();
            $lname = $this->aauth->get_user_last_name();
            $initials = $this->aauth->get_user_name_initials();
                    
            $menu_data = array(
                'fname' => $fname,
                'initials' => $initials,
                'lname' => $lname
            );

             $config = array();
            $config["base_url"] = base_url()."sale";
            $config["total_rows"] = $this->sale_model->record_count();  
            $config["per_page"] =3; 
            $this->pagination->initialize($config);
            if($this->uri->segment(1)){
            $page = $this->uri->segment(1);}
            else {
            $page = 0;
            }
            // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $sale = $this->sale_model->get_sales($config["per_page"], $page);
            $links = $this->pagination->create_links();

            $data = array(
                'menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
                'sale' =>$sale,
                'links' =>$links
            );
            // $this->load->view('sale',$data);
            $this->template->set_template('login_signup');
            $this->template->write('title', 'Dashboard Page', TRUE);
            $this->template->write_view('content', 'sale', $data, TRUE);
            $this->template->render();

        } else {

         
                redirect('/user', 'refresh');
                return false;
           
        }
    }


    public function delete_product(){
        $ids = $this->input->post('ids');
      
        $this->db->where_in('product_id', explode(",", $ids));
        $this->db->delete('product');
 
        echo json_encode(['success'=>"Item Deleted successfully."]);
    }
   

    public function add_product(){
         if (!$this->aauth->is_user_allowed('user/user_list')) {

            $fname = $this->aauth->get_user_first_name();
            $lname = $this->aauth->get_user_last_name();
            $initials = $this->aauth->get_user_name_initials();


            $menu_data = array(
                'fname' => $fname,
                'initials' => $initials,
                'lname' => $lname
            );
            

            $data = array(
                'menu' => $this->load->view('menu/admin_main', $menu_data, TRUE)
            );
            $this->template->set_template('login_signup');
            $this->template->write('title', 'Dashboard Page', TRUE);
            $this->template->write_view('content', 'add_product', $data, TRUE);
            $this->template->render();

        } else {

         
                redirect('/user', 'refresh');
                return false;
           
        }
    }


    // Create and download PDF

     public function generate_pdf() {
    
    //load pdf library
    $this->load->library('Pdf');
    
    $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('https://www.roytuts.com');
    $pdf->SetTitle('Product Items');
    $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
    $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

    // set default header data
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set font
    $pdf->SetFont('times', 'BI', 12);
    
    // ---------------------------------------------------------
    
    
    //Generate HTML table data from MySQL - start
    $template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
    );
    
    $this->table->set_template($template);

    $this->table->set_heading('No', 'Sale Code','Buyer','Date','Total');
    
    $salesinfo = $this->sale_model->get_sales();
        $i=0;


    foreach ($salesinfo as $sf):
            $date = date_create();
           date_timestamp_set($date, $sf->sale_datetime);
           $sale_date = date_format($date, ' m-d-Y');
        $i++;
        $this->table->add_row($i, $sf->sale_code,$sf->username,$sale_date ,'$'.$sf->grand_total);
    endforeach;
     
    $html = $this->table->generate();
    //Generate HTML table data from MySQL - end
    
    // add a page
    $pdf->AddPage();
    
    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // reset pointer to the last page
    $pdf->lastPage();
    ob_end_clean();
    //Close and output PDF document
    $pdf->Output(md5(time()).'.pdf', 'D');
   }


   // Delete sale

   public function delete_sale($sale_id) {   

    $this->sale_model->did_delete_row($sale_id);
       redirect('/sale', 'refresh');
    }


    // xlsx file create and download
   public function generate_xlsx_report() {
    //load xlsx library
    $this->load->library('Excel');
    
    //define column headers
    $headers = array('No' => 'integer', 'Sale Code' => 'string', 'Buyer' => 'string', 'Date' => 'string', 'Total' => 'string');
    
    //fetch data from database
    $salesinfo = $this->sale_model->get_sales();
    
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
    $i=0;
    foreach ($salesinfo as $sf):
        $date = date_create();
        date_timestamp_set($date, $sf->sale_datetime);
        $sale_date = date_format($date, ' m-d-Y');
        $i++;
        $writer->writeSheetRow('Sheet1',array($i, $sf->sale_code,$sf->username, $sale_date,'$'.$sf->grand_total));
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

    // CSV file Report

    public function exportCSV(){ 
        $this->load->helper('csv');
        $export_arr = array();
        $product_details = $this->sale_model->get_sales();
        $title = array("No", "Sale Code", "Buyer", "Date", "Total");
        array_push($export_arr, $title);
        $i=0;
        if (!empty($product_details)) {
            foreach ($product_details as $sf){
            $date = date_create();
           date_timestamp_set($date, $sf->sale_datetime);
           $sale_date = date_format($date, ' m-d-Y');
                $i++;
                // $status = $sf->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($i, $sf->sale_code,$sf->username, $sale_date,'$'.$sf->grand_total));
            }
        }
        convert_to_csv($export_arr, 'Products' . date('F d Y') . '.csv', ',');
    }

}