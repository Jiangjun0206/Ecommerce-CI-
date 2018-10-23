<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends Public_Controller {
    function __construct() {
        parent::__construct();
        $this->functions->check_session();
        $this->functions->access();
        $this->load->model('product_model');
        $this->load->library('Pdf');
        $this->load->model('Createpdf_model', 'createpdf');
        $this->load->library('table');


    }
   
    public function insert_product(){
        $config['upload_path']          = './uploads/product_image';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload('product_image')){
				$image = "123";
            }
            else{
				$upload_data = $this->upload->data();
                 $image = $upload_data['file_name'];
                 $url = $upload_data['file_path'];
            }  
       
        $data = array(
            'name' => $this->input->post('name'),
            'tag' => $this->input->post('tag'),
            'real_price' => $this->input->post('real_price'),
            'deal_price' => $this->input->post('deal_price'),
            'color' => $this->input->post('color'),
            'size' => $this->input->post('size'),
            'price_x' => $this->input->post('price_x'),
            'category' => $this->input->post('category'),
            'discount' => $this->input->post('discount'),
            'description' => $this->input->post('description'),
            'seller_id' => $user_id = $this->session->userdata('id'),
            'image' => $image
            // 'image' => $this->input->post('file')
        );
       
         $this->product_model->product_insert($data);
             redirect('/product', 'refresh');
     
    }
    public function delete_product(){
        $ids = $this->input->post('ids');
      
        $this->db->where_in('product_id', explode(",", $ids));
        $this->db->delete('product');
 
        echo json_encode(['success'=>"Item Deleted successfully."]);
    }
    public function index() {
       if (!$this->aauth->is_user_allowed('user/user_list')) {

            $fname = $this->aauth->get_user_first_name();
            $lname = $this->aauth->get_user_last_name();
            $initials = $this->aauth->get_user_name_initials();
            $count = $this->product_model->product_count();
            $product = $this->product_model->get_product();
            $menu_data = array(
                'fname' => $fname,
                'initials' => $initials,
                'lname' => $lname,    
            );
           
           
            $data = array(
                'menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
                'count' => $count,
                'product' =>$product
            );
          
            $this->template->set_template('login_signup');
            $this->template->write('title', 'Dashboard Page', TRUE);
            $this->template->write_view('content', 'product', $data, TRUE);
            $this->template->render();

        } else {

         
                redirect('/user', 'refresh');
                return false;
           
        }
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

    $this->table->set_heading('No', 'Name','Real Price','Deal Price','Discount','Price_X2','Size','Color');
    
    $salesinfo = $this->product_model->get_product();
        $i=0;
    foreach ($salesinfo as $sf):
        $i++;
        $this->table->add_row($i, $sf->name,$sf->real_price, $sf->deal_price, $sf->discount,$sf->price_x,
        $sf->size, $sf->color);
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

   // Xls Create and download code

   public function generate_xlsx_report() {
    //load xlsx library
    $this->load->library('Excel');
    
    //define column headers
    $headers = array('No' => 'integer', 'Name' => 'string', 'Real Price' => 'price', 'Deal Price' => 'price', 'Discount' => 'string', 'Price_X2' => 'string','Size' => 'string','Color' => 'string');
    
    //fetch data from database
    $salesinfo = $this->product_model->get_product();
    
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
        $i++;
        $writer->writeSheetRow('Sheet1',array($i, $sf->name,$sf->real_price, $sf->deal_price, $sf->discount,$sf->price_x,
        $sf->size, $sf->color));
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
        $product_details = $this->product_model->get_product();
        $title = array("No", "Name", "Real Price", "Deal Price", "Discount", "Price_X2","Size","Color");
        array_push($export_arr, $title);
        $i=0;
        if (!empty($product_details)) {
            foreach ($product_details as $sf){
                $i++;
                // $status = $sf->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($i, $sf->name,$sf->real_price, $sf->deal_price, $sf->discount,$sf->price_x,
        $sf->size, $sf->color));
            }
        }
        convert_to_csv($export_arr, 'Products' . date('F d Y') . '.csv', ',');
    }

}