<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @property Login_control $Login_control
 * @property Aauth $aauth Description
 * @property Functions $functions
 * @version 1.0
 */
class User extends  Public_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('pagination');
        $this->load->library('functions');
        $this->UserperPage = $this->settings->get('no_of_items');
        $this->GroupperPage = $this->settings->get('no_of_items');;
        $this->controller = $this->uri->segment(1);
        $this->method = $this->uri->segment(2);
        $this->no_of_groups = $this->aauth->get_number_of_groups();
        $this->no_of_users = $this->aauth->get_number_of_users();
        $this->fname = $this->aauth->get_user_first_name();
        $this->lname = $this->aauth->get_user_last_name();
        $this->initials = $this->aauth->get_user_name_initials();
    }

    function index() {
        if($this->aauth->is_loggedin()){
            redirect('/dashboard', 'refresh');
        }else {


            $this->template->set_template('login_signup');
            $this->template->write('title', 'Login', TRUE);
            $this->template->write_view('content', 'login', Null , TRUE);
            $this->template->render();
        }


    }

    //*****************************//
    //   USERS                     //
    //*****************************//


    public function add_user(){
        $this->functions->check_session();
        $this->functions->access();
        $request = json_decode(file_get_contents('php://input'));
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $password = $this->randomPassword();




        if($this->aauth->is_loggedin()){


            if ($this->aauth->create_user($email,$password,$fname,$lname)){
                $data = array(
                    'password' => $password,
                    'user' => $fname
                );



                $view = 'emails/password_sent';

                $this->functions->sendmail($email,$view, $data);

                echo $result = '{"status" : "success"}';
            }
            else {
                echo $result = '{"status" : "failure"}';
            }
//
        }else{

            redirect('/user', 'refresh');
        }


    }

    public function edit_user(){
        $this->functions->check_session();
        $this->functions->access();
        $form_data = $this->input->post();

        $fname = $this->input->post("fname");
        $lname = $this->input->post("lname");
        $email = $this->input->post("email");
        $group = $this->input->post("group");
        $id = $this->input->post("id");

        if($this->aauth->config_vars['demo'] && $this->aauth->config_vars['super_admin_email']==$email){
            $this->user_list(2);
            return;
        }

          if($this->aauth->is_loggedin()){
                if ($this->aauth->update_user($id,$email,false,$fname,$lname)){
                  $this->aauth->remove_member_from_all($id);
                  $this->aauth->add_member($id,$group);

                }
              redirect('/user/user_list', 'refresh');
         }else{

             redirect('/user', 'refresh');
         }
    }

    public function delete_user($id){
        $this->functions->check_session();
        $this->functions->access();
        if($this->aauth->config_vars['demo'] && $this->aauth->config_vars['super_admin_email'] == $this->aauth->get_user_email($id)){
            $this->user_list(3);
            return;
        }

        if($this->aauth->config_vars['super_admin_email'] == $this->aauth->get_user_email($id)){
            $this->user_list(4);
            return;
        }
        if(!$this->aauth->is_loggedin()){
            redirect('/user', 'refresh');
            return false;
        }
         if ($this->aauth->delete_user($id)) {
                redirect('/user/user_list', 'refresh');
            }

    }

    function login(){
        $this->functions->access();
        $request = json_decode(file_get_contents('php://input'));
        $email = $request->email;
        $password = $request->password;

        if(!$this->aauth->is_loggedin()){

            if ($this->aauth->login($email, $password)){
                echo $result = '{"status" : "success"}';
            }
            else {
                echo $result = '{"status" : "failure"}';
            }
//
        }else{
            if ($_SESSION['id']== 2) {
                redirect('/dashboard', 'refresh');
            } else {
                redirect('/funnel/funnel_list', 'refresh');
            }
        }
    }

    function front_end_login(){

        $postdata = $this->input->post();
        $email = $postdata['email'];
        $password = $postdata['password'];
        $url= $postdata['refer_from'];

        if(!$this->aauth->is_loggedin()) {

            if ($this->aauth->login($email, $password)) {
                redirect($url, 'refresh');
                return;
            }

        }

        redirect($url, 'refresh');

    }

    function logout(){
        $this->aauth->logout();
        redirect('/user', 'refresh');
    }

    function front_logout(){
        $this->load->library('user_agent');
        $this->aauth->logout();
        redirect($this->agent->referrer(), 'refresh');
    }

    public function register(){

        if($this->aauth->is_loggedin()){
            redirect('/dashboard', 'refresh');
        }else {

            $this->template->set_template('login_signup');
            $this->template->write('title', 'Register', TRUE);
            $this->template->write_view('content', 'registration', Null , TRUE);
            $this->template->render();
        }

    }

    function sign_up(){

        $request = json_decode(file_get_contents('php://input'));
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $password = $request->password;
        if($this->settings->get('require_username') == 'on'){
            $username = $request->username;
        }else{
            $username = FALSE;
        }

        if(!$this->aauth->is_loggedin()){
            if ($this->aauth->exist_email($email)) {
                if ($this->aauth->update_user_by_email($email,$password,$fname,$lname,$username)){
                    echo $result = '{"status" : "success"}';
                }
                else {
                    echo $result = '{"status" : "failure"}';
                }
            } else {
                if ($this->aauth->create_user($email,$password,$fname,$lname,$username)){
    
                    require(APPPATH . 'aweber/aweber_api/aweber_api.php');
    
                    $consumerKey = 'AkrNAelGKKsmvpDIWa4BHhen';
                    $consumerSecret = '6HP1KJqgaH9slWSJAza8QCWA9ZG4tOoTX10l7oW1';
                    $accessKey      = 'Ag3hKBTdoSLGvqNJ1Y1tmXc3'; # put your credentials here
                    $accessSecret   = '7Xt71rAjWojmBkcdlRw4zGB4zC53aw22WUhtm4Ei'; # put your credentials here
                    $account_id     = '1243456'; # put the Account ID here
                    $list_id        = '5065444'; # put the List ID here
                    //error_log(APPPATH);
    
                    $aweber = new AWeberAPI($consumerKey, $consumerSecret);
                        $account = $aweber->getAccount($accessKey, $accessSecret);
                        $listURL = "/accounts/{$account_id}/lists/{$list_id}";
                        $list = $account->loadFromUrl($listURL);
                        # create a subscriber
                        $params = array(
                            'email' => $email,
                            'name' => $fname . ' ' . $lname,
                        );
                        $subscribers = $list->subscribers;
                        $new_subscriber = $subscribers->create($params);
    
                    echo $result = '{"status" : "success"}';
                }
                else {
                    echo $result = '{"status" : "failure"}';
                }
            }
//
        }else{

            redirect('/dashboard', 'refresh');
        }
    }

    public function user_list($msg=0){
        $this->functions->check_session();
        $this->functions->access();

        $fname = $this->aauth->get_user_first_name();
        $lname = $this->aauth->get_user_last_name();
        $initials = $this->aauth->get_user_name_initials();
        $no_of_users = $this->aauth->get_number_of_users();
        $offset = $this->input->get("per_page");
        $no_of_groups = $this->aauth->get_number_of_groups();

        switch($msg){
            case 1:
                $data['msg'] = $this->functions->show_msg('User has been added and generated password sent to the given email address','info');

                break;
            case 2:
                $data['msg'] = $this->functions->show_msg('Editing admin details is not available on the demo version','info');
                break;
            case 3:
                $data['msg'] = $this->functions->show_msg('Deleting admin details is not available on the demo version','info');
                break;
            case 4:
                $data['msg'] = $this->functions->show_msg('You cannot delete super admin unless you assign another super admin in the aauth config file','info');
                break;
        }

        if($offset <=0)
            $offset=0;

        $menu_data = array(
            'fname' => $fname,
            'initials' => $initials,
            'lname' => $lname
        );

        $subnav_data = array(
            'no_of_users' => $no_of_users,
            'no_of_groups' => $no_of_groups,
            'controller' => $this->controller,
            'subgroups' => $this->settings->get_setting_subgroup('user'),
            'method' => $this->method
        );


        $data['users'] = $this->aauth->list_users(FALSE,$this->UserperPage,$offset,TRUE);
        $data['menu'] = $this->load->view('menu/admin_main', $menu_data, TRUE);
        $data['subnav'] = $this->load->view('menu/subnav', $subnav_data, TRUE);
        $data['set_menu'] = 1;



        //pagination configuration
        //$config['target']      = '#list';
        $config['base_url']    = base_url().'user/user_list';
        $config['total_rows']  = $no_of_users;
        $config['per_page']    = $this->UserperPage;
        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $this->template->set_template('login_signup');
        $this->template->write('title', 'Users', TRUE);
        $this->template->write_view('content', 'users', $data , TRUE);
        $this->template->render();


    }
    public function ready_list() {
        $this->session->set_userdata('search','');
        echo 'true';
    }




    public function user_details($id){
        $this->functions->check_session();
        $this->functions->access();
        $group_id = $this->aauth->get_user_group($id);

        $data = array(
            'user' => $this->aauth->get_user($id),
            'groups' => $this->aauth->list_groups(),
            'group_id' => $group_id,
            'initials' => $this->aauth->get_user_name_initials($id),
            'user_group' => $this->aauth->get_group($group_id)
        );

        $this->load->view('user_details', $data);


    }

    public function profile($id=false){
        $this->functions->check_session();
        $this->functions->access();
        

        $menu_data = array(
            'fname' => $this->fname,
            'initials' => $this->initials,
            'lname' => $this->lname
        );

        $data = array(
            'user' => $this->aauth->get_user($id),
            'menu' => $this->load->view('menu/admin_main', $menu_data, TRUE)
        );

        $this->functions->show_view('profile','', $data);


    }

    public function save_profile(){
        $this->functions->check_session();
        $this->functions->access();

        $postdata = $this->input->post();


        if(strlen($postdata['cpassword']) > 0){
            if(strlen($postdata['npassword']) > 0){
                $pass = $this->aauth->hash_password($postdata['cpassword'],$postdata['id']);
                if($this->aauth->verify_password($pass,$this->aauth->get_user_pass())){
                    $this->aauth->update_user($postdata['id'],FALSE,$postdata['npassword'],$postdata['fname'], $postdata['lname'],FALSE);
                    $data['msg'] = $this->functions->show_msg('Profile Updated','info');
                }else{
                    $data['msg'] = $this->functions->show_msg('Current password is incorrect','error');
                }
            }else{
                $data['msg'] = $this->functions->show_msg('You have to enter the new password to change password','error');//msg: u
            }
        }

        $menu_data = array(
            'fname' => $this->fname,
            'initials' => $this->initials,
            'lname' => $this->lname
        );

        $data['user'] = $this->aauth->get_user($postdata['id']);
        $data['menu'] = $this->load->view('menu/admin_main', $menu_data, TRUE);
        $this->functions->show_view('profile','', $data);


    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function forgot_password(){

        if($this->aauth->is_loggedin()){
            redirect('/dashboard', 'refresh');
        }else {

            $this->template->set_template('login_signup');
            $this->template->write('title', 'Forgot Password', TRUE);
            $this->template->write_view('content', 'forgot_password', Null, TRUE);
            $this->template->render();
        }

    }

    public function password_link(){
        $request = json_decode(file_get_contents('php://input'));
        $email = $request->email;
        $id =  $this->aauth->get_user_id($email);

        if(!$this->aauth->remind_password($email)) {
            echo $result = '{"status" : "failure"}';
        }else{

        $data = array(
            'code' => $this->aauth->remind_password($email),
            'user' => $this->aauth->get_user_first_name($id)
        );

        $view = 'emails/forgot';

        $this->functions->sendmail($email,$view, $data);
            echo $result = '{"status" : "success"}';
        }

    }

    public function forgot_password_sent(){

        if($this->aauth->is_loggedin()){
            redirect('/dashboard', 'refresh');
        }else {

            $this->template->set_template('login_signup');
            $this->template->write('title', 'Forgot Password', TRUE);
            $this->template->write_view('content', 'forgot_password_sent', Null, TRUE);
            $this->template->render();
        }

    }

    public function forgot_reset($code){

        $newpassword = $this->aauth->reset_password($code);

        if(!$newpassword) {
            echo $result = '{"status" : "failure"}';
        }else{

            $data = array(
                'password' => $newpassword['password'],
                'user' => $newpassword['name']
            );

            $view = 'emails/password_sent';

            $this->functions->sendmail($newpassword['email'],$view, $data);

            $this->template->set_template('login_signup');
            $this->template->write('title', 'New Password', TRUE);
            $this->template->write_view('content', 'change_password', $data , TRUE);
            $this->template->render();
        }
    }

    public function ban_user(){
        $this->functions->check_session();
        $this->functions->access();
        $user_id = $this->input->get('uid');
        if(!$this->aauth->is_the_only_admin($user_id))
            $this->aauth->ban_user($user_id);

        redirect('/user/user_list', 'refresh');



    }

    public function unban_user(){
        $this->functions->check_session();
        $this->functions->access();
        $user_id = $this->input->get('uid');

        if($this->aauth->unban_user($user_id)){
            redirect('/user/user_list', 'refresh');
        }


    }



    //*****************************//
    //   USER GROUPS              //
    //*****************************//

    public function user_groups($msg=0){
        $this->functions->check_session();

        $this->functions->access();
        $fname = $this->aauth->get_user_first_name();
        $lname = $this->aauth->get_user_last_name();
        $initials = $this->aauth->get_user_name_initials();
        $offset = $this->input->get("per_page");

        if($offset <=0)
            $offset=0;

        $menu_data = array(
            'fname' => $fname,
            'initials' => $initials,
            'lname' => $lname
        );

        $subnav_data = array(
            'no_of_users' => $this->no_of_users,
            'no_of_groups' => $this->no_of_groups,
            'controller' => $this->controller,
            'subgroups' => $this->settings->get_setting_subgroup('user'),
            'method' => $this->method
        );

        $data['groups'] = $this->aauth->list_groups($this->GroupperPage,$offset);
        $data['subnav'] = $this->load->view('menu/subnav', $subnav_data, TRUE);
        $data['menu'] = $this->load->view('menu/admin_main', $menu_data, TRUE);
        $data['no_of_groups'] = $this->no_of_groups;
        $data['set_menu'] = 1;

        if($this->aauth->config_vars['demo']){
            switch($msq){
                case 1:
                    $data['msg'] = $this->functions->show_msg('Editing admin details is not available on the demo version','info');
                    break;
            }
        }

        //pagination configuration
        $config['base_url']    = base_url().'user/user_groups';
        $config['total_rows']  = $this->no_of_groups;
        $config['per_page']    = $this->GroupperPage;
        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $this->template->set_template('login_signup');
        $this->template->write('title', 'User Groups', TRUE);
        $this->template->write_view('content', 'user_groups', $data , TRUE);
        $this->template->render();

    }

    public function add_user_group(){
        $this->functions->check_session();
        $this->functions->access();
        $request = json_decode(file_get_contents('php://input'));
        $gname = $request->gname;
        $description = $request->description;



        if($this->aauth->is_loggedin()){

            if ($this->aauth->create_group($gname,$description)){
                echo $result = '{"status" : "success"}';
            }
            else {
                echo $result = '{"status" : "failure"}';
            }
//
        }else{

            redirect('/user', 'refresh');
        }


    }

    public function group_details($id){
        $this->functions->check_session();
        $this->functions->access();

        $data = array(
            'group' => $this->aauth->get_group($id)
        );

        $this->load->view('group_details', $data);


    }

    public function edit_group(){
        $this->functions->check_session();
        $this->functions->access();
        $form_data = $this->input->post();

        $gname = $this->input->post("gname");
        $definition = $this->input->post("definition");
        $id = $this->input->post("id");

        if($this->aauth->is_loggedin()){

                if ($this->aauth->update_group($id,$gname,$definition)){
                    redirect('/user/user_groups', 'refresh');
                }

        }else{

            redirect('/user', 'refresh');
        }
    }

    public function delete_group($id){
        $this->functions->check_session();
        $this->functions->access();

            if ($this->aauth->delete_group($id)) {
                redirect('/user/user_groups', 'refresh');
            }

    }

    public function ban_group(){
        $this->functions->check_session();
        $this->functions->access();
        $group_id = $this->input->get('uid');

        if($this->aauth->ban_user($group_id)){
            redirect('/user/user_groups', 'refresh');
        }


    }

    //*****************************//
    //   USER PERMISSIONS          //
    //*****************************//



    public function user_permissions($user_id=FALSE){
        $this->functions->check_session();
        $this->functions->access();
        if(!$user_id)
            $user_id = $this->input->get('uid');

        $controller_id = $this->input->get('cont');
        $controller = $this->uri->segment(1);

        if(strlen($controller_id)<=0){
            $controller_id = $this->aauth->get_controller_id($controller);
        }


        $fname = $this->aauth->get_user_first_name($user_id);
        $lname = $this->aauth->get_user_last_name($user_id);
        $m_fname = $this->aauth->get_user_first_name();
        $m_lname = $this->aauth->get_user_last_name();
        $initials = $this->aauth->get_user_name_initials($user_id);


        $no_of_users = $this->aauth->get_number_of_users();
        $no_of_groups = $this->aauth->get_number_of_groups();


        $menu_data = array(
            'fname' => $m_fname,
            'initials' => $initials,
            'lname' => $m_lname
        );

        $subnav_data = array(
            'no_of_users' => $no_of_users,
            'no_of_groups' => $no_of_groups,
            'controller' => $this->controller,
            'subgroups' => $this->settings->get_setting_subgroup('user'),
            'method' => $this->method,
            'controllers' => $this->aauth->get_controller_names()
        );

        $data = array(
            'methods' => $this->aauth->get_all_methods($controller_id),
            'subnav' => $this->load->view('menu/subnav', $subnav_data, TRUE),
            'menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            'controller' => $this,
            'user_id' => $user_id,
            'fname' => $fname,
            'lname' => $lname

        );

        $this->template->set_template('login_signup');
        $this->template->write('title', 'User Permissions', TRUE);
        $this->template->write_view('content', 'user_perms', $data , TRUE);
        $this->template->render();


    }

    public function has_access($perm_id,$user_id){
        $this->functions->check_session();
        $this->functions->access();
        if($this->aauth->is_allowed($perm_id,$user_id)){
            return true;
        }

        $groups = $this->aauth->get_user_groups($user_id);

        foreach ($groups as $group) {

            if($this->aauth->is_group_allowed($perm_id, $group->group_id)){
                return true;

            }
        }

        return false;

    }

    public function group_has_access($perm_id,$group_id){
        $this->functions->check_session();
        $this->functions->access();
        if($this->aauth->is_group_allowed($perm_id,$group_id)){
            return true;
        }

        return false;

    }


    public function change_user_permissions(){
        $this->functions->check_session();
        $this->functions->access();

        $perms = $this->input->post('perms');
        $user_id = $this->input->post('user_id');
        $controller_id = $this->input->post('controller_id');
        $current_perms = $this->aauth->get_user_perms($user_id,$controller_id);


        if(empty($current_perms)){
            if(!empty($perms)){
                foreach($perms as $perm){
                    $this->aauth->add_user_perms($user_id,$perm);
                }
            }
        }else{

            foreach($current_perms as $current_perm){
                $this->aauth->delete_user_perms($user_id,$current_perm->perm_id);
            }

            foreach($perms as $perm){
                $this->aauth->add_user_perms($user_id,$perm);
            }
        }

        redirect('user/user_permissions?uid='.$user_id.'&cont='.$controller_id);


    }

    public function group_permissions($group_id=FALSE){
        $this->functions->check_session();
        $this->functions->access();

        if(!$group_id)
            $group_id = $this->input->get('gid');

        $controller_id = $this->input->get('cont');
        $controller = $this->uri->segment(1);

        if(strlen($controller_id)<=0){
            $controller_id = $this->aauth->get_controller_id($controller);
        }


        $fname = $this->aauth->get_user_first_name();
        $lname = $this->aauth->get_user_last_name();
        $initials = $this->aauth->get_user_name_initials();
        $group = $this->aauth->get_group($group_id);


        $no_of_users = $this->aauth->get_number_of_users();
        $no_of_groups = $this->aauth->get_number_of_groups();


        $menu_data = array(
            'fname' => $fname,
            'initials' => $initials,
            'lname' => $lname
        );

        $subnav_data = array(
            'no_of_users' => $no_of_users,
            'no_of_groups' => $no_of_groups,
            'controller' => $this->controller,
            'subgroups' => $this->settings->get_setting_subgroup('user'),
            'method' => $this->method,
            'controllers' => $this->aauth->get_controller_names()
        );

        $data = array(
            'methods' => $this->aauth->get_all_methods($controller_id),
            'subnav' => $this->load->view('menu/subnav', $subnav_data, TRUE),
            'home' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            'controller' => $this,
            'group_id' => $group_id,
            'group' => $group->name,

        );


        $this->template->set_template('login_signup');
        $this->template->write('title', 'Group Permissions', TRUE);
        $this->template->write_view('content', 'group_perms', $data , TRUE);
        $this->template->render();


    }


    public function change_group_permissions(){
        $this->functions->check_session();
        $this->functions->access();

        $perms = $this->input->post('perms');
        $group_id = $this->input->post('group_id');
        $controller_id = $this->input->post('controller_id');
        $current_perms = $this->aauth->get_group_perms($group_id,$controller_id);

        if(empty($current_perms)){
            foreach($perms as $perm){
                $this->aauth->add_group_perms($group_id,$perm);
            }
        }else{
            foreach($current_perms as $current_perm){
                $this->aauth->delete_group_perms($group_id,$current_perm->perm_id);
            }
            if(!empty($perms)) {
                foreach($perms as $perm){
                    $this->aauth->add_group_perms($group_id,$perm);
                }
            }

        }

        redirect('user/group_permissions?gid='.$group_id.'&cont='.$controller_id);


    }

    public function settings(){
        $this->functions->check_session();
        $this->functions->access();
        $fname = $this->aauth->get_user_first_name();
        $lname = $this->aauth->get_user_last_name();
        $initials = $this->aauth->get_user_name_initials();


        $menu_data = array(
            'fname' => $fname,
            'initials' => $initials,
            'lname' => $lname
        );
        $subnav_data = array(
            'no_of_users' => $this->no_of_users,
            'no_of_groups' => $this->no_of_groups,
            'controller' => $this->controller,
            'method' => $this->method,
            'subgroups' => $this->settings->get_setting_subgroup('user'),
        );

        $data = array(
            'initials' => $initials,
            'fname' => $fname,
            'lname' => $lname,
            'menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            'subnav' => $this->load->view('menu/subnav',$subnav_data,TRUE),
            'group' => 'user'

        );


        $this->template->set_template('login_signup');
        $this->template->write('title', 'Settings Page', TRUE);
        $this->template->write_view('content', 'settings', $data, TRUE);
        $this->template->render();

    }

    public function save_settings(){
        $this->functions->check_session();
        $this->functions->access();
        $postdata = $this->input->post();

        foreach($postdata as $key => $value){
            $this->settings->save_settings($key,$value);
        }



        redirect('user/settings');
    }

    public function unauthorized(){
        echo $this->functions->unauthorized();
    }
    
    public function save_fbanner_state(){
        $this->aauth->save_fbanner_state();
        redirect('user/profile');
    }

}
