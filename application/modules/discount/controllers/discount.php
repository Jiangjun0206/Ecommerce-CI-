<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Discount extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->functions->check_session();
        $this->functions->access();
        $this->load->library('Pdf');
        $this->load->library('table');
        $this->load->model('discount_model');


    }

    public function index() {
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
            $this->template->write_view('content', 'discount', $data, TRUE);
            $this->template->render();

        } else {

         
                redirect('/user', 'refresh');
                return false;
           
        }
    }   

    // Delete Coupon
      public function delete_coupon($id){
        // $ids = $this->input->post('ids');
      
        $this->db->where('coupon_id', $id);
        $this->db->delete('coupon');
         redirect('/discount', 'refresh');
     }
    public function fetch(){
      $output = '';
      $query = '';
      
      if($this->input->post('query'))
      {
       $query = $this->input->post('query');
      }
      $data = $this->discount_model->fetch_data($query);
      $output .= '
         <table class="table table-responsive table-bordered table-striped">
          <tr>
           <th>No</th>
           <th>Title</th>
           <th>Code</th>
           <th>Added by</th>
           <th>Total</th>
           <th>Delivery Time</th>
           <th>Payment Status</th>
           <th>Option</th>
          </tr>
      ';
      if($data->num_rows() > 0)
      { $i=0;
       foreach($data->result() as $row)
       {
        $i++;
        $output .= '
          <tr>
           <td>'.$i.'</td>
           <td>'.$row->title.'</td>
           <td>'.$row->code.'</td>
           <td>'.$row->added_by.'</td>
           <td>'.$row->spec.'</td>
           <td>'.$row->till.'</td>
           <td>'.$row->status.'</td>
           <td><a href="'.base_url('discount/delete_coupon/'.$row->coupon_id).'" class="btn btn-danger btn-sm"><i class="fa fa-trush"></i>Delete Coupon</a></td>
          </tr>
        ';
       }
      }
      else
      {
       $output .= '<tr>
           <td colspan="5">No Data Found</td>
          </tr>';
      }
      $output .= '</table>';
      echo $output;
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

    $this->table->set_heading('No', 'Title','Code','Added By','Total','Delivery Time','Payment Status');
    
    $salesinfo = $this->discount_model->get_coupon();
        $i=0;
    foreach ($salesinfo as $sf):
        $i++;
        $this->table->add_row($i, $sf->title,$sf->code, $sf->added_by, $sf->spec,$sf->till,
        $sf->status);
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
    $headers = array('No' => 'integer', 'Title' => 'string', 'Code' => 'string', 'added_by' => 'string', 'Total' => 'price', 'Delivery Time' => 'string','Payment Status' => 'string');
    
    //fetch data from database
    $salesinfo = $this->discount_model->get_coupon();
    
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
        $writer->writeSheetRow('Sheet1',array($i, $sf->title,$sf->code, $sf->added_by, $sf->spec,$sf->till,
        $sf->status));
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
        $product_details = $this->discount_model->get_coupon();
        $title = array('No', 'Title','Code','Added By','Total','Delivery Time','Payment Status');
        array_push($export_arr, $title);
        $i=0;
        if (!empty($product_details)) {
            foreach ($product_details as $sf){
                $i++;
                // $status = $sf->status == "A" ? "Active" : "Inactive";
                array_push($export_arr, array($i, $sf->title,$sf->code, $sf->added_by, $sf->spec,$sf->till,
        $sf->status));
            }
        }
        convert_to_csv($export_arr, 'Products' . date('F d Y') . '.csv', ',');
    }

}