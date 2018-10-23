<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->functions->check_session();
        $this->functions->access();


    }
    public function index(){

    }
    public function send_message() {
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
            $this->template->write_view('content', 'send_message', $data, TRUE);
            $this->template->render();

        } else {

         
                redirect('/user', 'refresh');
                return false;
           
        }
    }

    public function message_templates(){
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
            $this->template->write_view('content', 'message_templates', $data, TRUE);
            $this->template->render();

        } else {

         
                redirect('/user', 'refresh');
                return false;
           
        }
    }

}