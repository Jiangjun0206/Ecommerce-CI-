<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Pages
 * @property Page_model $page_model
 * @author Admin
 */
class Landing_page extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('page/page_model');
    }

    public function index(){
        $page_id = $this->page_model->get_landing_page();

        redirect('page/content/'.$page_id);
    }
}