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
class Upgrade extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->functions->check_session();
        $this->functions->access();


    }

    public function index() {

        if(!$this->aauth->is_loggedin()){
            redirect('/user', 'refresh');
            return false;
        }else{

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
    
    public function key_setting(){
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
        $this->template->write_view('content', 'keySettings', $data, TRUE);
        $this->template->render();
    }

    public function key_confirm() {
        if (isset($_POST['key_type']) && ($_POST['key_type'] == 'ready')) {
            if (isset($_POST['key_ready'])) {
                if ( $this->aauth->set_key_ready($_POST['key_ready'])) {
                    // create session
                    $data = array( 
                        'funnel_ready' => '1'
                    );
                    $this->session->set_flashdata('success_ready', 'Key has been setted successfully');
                } else {
                    $this->session->set_flashdata('error_ready', 'Required Access Key For Funnels Ready');
                }
            } else {
                $this->session->set_flashdata('error_ready', 'Invalid Access Key For Funnels Ready');
            }
        } else if (isset($_POST['key_type']) && ($_POST['key_type'] == 'club')){
            if (isset($_POST['key_club'])) {
                if ( $this->aauth->set_key_club($_POST['key_club'])) {
                    // create session
                    $data = array(
                        'funnel_club' => '1'
                    );
                    $this->session->set_flashdata('success_club', 'Key has been setted successfully');
                } else {
                    $this->session->set_flashdata('error_club', 'Required Access Key For Funnels Club');
                }
            } else {
                $this->session->set_flashdata('error_club', 'Invalid Access Key For Funnels Club');
            }
        }
        $this->session->set_userdata($data);
        redirect('upgrade/key_setting');
    }

}

/* End of file dashboard.php */
/* Location: ./application/modules/dashboard/controllers/dashboard_model.php */