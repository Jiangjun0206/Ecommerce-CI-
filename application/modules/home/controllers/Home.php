<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of home
 *
 * @author Admin
 */
class Home extends Public_Controller {

    function __construct() {
        $this->functions->check_session();
        parent::__construct();
        $this->load->library('menu');
        $this->load->library('functions');
    }

    public function index() {

        $css = array('default/css/home/css/content_front.css','default/css/themes/theme-classic.css');

        $data = array(
            'menu' => $this->menu->generate_menu(1),
            //'page' => $this->home_model->get_page(1),
            'css' => $css,
        );

        return $this->load->view('home',$data ,true);
    }



}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */