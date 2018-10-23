<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2/16/2017
 * Time: 5:51 PM
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of dashboard
 *
 * @author Admin
 */
class Dashboard extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->functions->check_session();
        $this->functions->access();


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
            $this->template->write_view('content', 'welcome', $data, TRUE);
            $this->template->render();

        } else {

            if(!$this->aauth->is_loggedin()){
                redirect('/user', 'refresh');
                return false;
            }else{
                if ($_SESSION['id']!= 2) {
                    redirect('/funnel/funnel_list', 'refresh');
                } else {
    
                    $fname = $this->aauth->get_user_first_name();
                    $lname = $this->aauth->get_user_last_name();
                    $initials = $this->aauth->get_user_name_initials();
        
        
                    $menu_data = array(
                        'fname' => $fname,
                        'initials' => $initials,
                        'lname' => $lname
                    );
                    
        
                    $data = array(
                        'initials' => $initials,
                        'fname' => $fname,
                        'lname' => $lname,
                        'total_users' => $this->aauth->get_number_of_users(),
                        'total_groups' => $this->aauth->get_number_of_groups(),
                        'total_banned_users' => $this->aauth->get_number_of_banned_users(),
                        'menu' => $this->load->view('menu/admin_main', $menu_data, TRUE)
                    );
        
                    $this->template->set_template('login_signup');
                    $this->template->write('title', 'Dashboard Page', TRUE);
                    $this->template->write_view('content', 'dashboard', $data, TRUE);
                    $this->template->render();
                }
            }
        }
    }


    public function gen_settings(){
        $fname = $this->aauth->get_user_first_name();
        $lname = $this->aauth->get_user_last_name();
        $initials = $this->aauth->get_user_name_initials();


        $menu_data = array(
            'fname' => $fname,
            'initials' => $initials,
            'lname' => $lname
        );

        $data = array(
            'initials' => $initials,
            'fname' => $fname,
            'lname' => $lname,
            'menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            'subgroup_menu' => $this->load->view('menu/settings'),
            'subgroups' => $this->settings->get_setting_subgroup('general'),
            'group' => 'general'

        );


        $this->template->set_template('login_signup');
        $this->template->write('title', 'Settings Page', TRUE);
        $this->template->write_view('content', 'settings', $data, TRUE);
        $this->template->render();

    }

    public function save_settings(){
        $postdata = $this->input->post();

        foreach($postdata as $key => $value){
            $this->settings->save_settings($key,$value);
        }

        redirect('dashboard/gen_settings');
    }

}

/* End of file dashboard.php */
/* Location: ./application/modules/dashboard/controllers/dashboard_model.php */