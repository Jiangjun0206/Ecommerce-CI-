<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */



class Functions
{

private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('email');
        $this->CI->load->library('settings');


        $this->fname = $this->CI->aauth->get_user_first_name();
        $this->lname = $this->CI->aauth->get_user_last_name();
        $this->initials = $this->CI->aauth->get_user_name_initials();
    }

    public function sendmail($email,$view, $data=Null){

        $this->CI->email->from($this->CI->settings->get('no_reply_email'), $this->CI->settings->get('website_name') );
        $this->CI->email->to($email);
        $this->CI->email->subject($this->CI->settings->get('forgot_email_subject'));
        $this->CI->email->message($this->CI->load->view($view, $data, true));
        $this->CI->email->set_mailtype('html');
        $this->CI->email->set_crlf( "\r\n" );

        // send email
        $this->CI->email->send();
    }

    public function access(){

        $controller = $this->CI->uri->segment(1);
        $method = $this->CI->uri->segment(2);

        if(strlen($method) > 0) {

            $perm_id = $this->CI->aauth->get_perm_id($method);



            if (in_array($method, $this->all_methods_array())) {


                if (!$this->CI->aauth->is_loggedin()) {
                    redirect('/user', 'refresh');
                    return false;
                }

                $groups = $this->CI->aauth->get_user_groups();



                foreach ($groups as $group) {

                    if (!$this->CI->aauth->is_allowed($perm_id)){


                        if (!$this->CI->aauth->is_group_allowed($perm_id, $group->group_id)) {
                           redirect('user/unauthorized', 'refresh');
                        }
                    }

                }
            }
        }
    }

    public function unauthorized(){
        $html = '<div class="row-col amber h-v">
                      <div class="row-cell v-m">
                        <div class="text-center col-sm-6 offset-sm-3 p-y-lg">
                          <h1 class="display-3 m-y-lg">Sorry! You are unauthorized to access this page.</h1>
                          <p class="m-y text-muted h4">
                            -- 404 --
                          </p>
                        </div>
                      </div>
                    </div>';

        return $html;
    }

    public function all_methods_array(){
        $methods_arr = array();

        $methods = $this->CI->aauth->get_all_methods();

        foreach($methods as $method){

            $methods_arr[] = $method->methods;

        }

        return $methods_arr;

    }

    public function show_view($view,$title,$custom_data = NULL){
        $data=array();

        $menu_data = array(
            'fname' => $this->fname,
            'initials' => $this->initials,
            'lname' => $this->lname
        );

        $default_data = array(
            'main_menu' => $this->CI->load->view('menu/admin_main', $menu_data, TRUE)

        );

        if(count($custom_data) > 0){
            $data = array_merge($custom_data,$default_data);
        }else{
            $data = $default_data;
        }


        $this->CI->template->set_template('login_signup');
        $this->CI->template->write('title', $title , TRUE);
        $this->CI->template->write_view('content', $view , $data , TRUE);
        $this->CI->template->render();
    }

    public function show_frontend_view($view,$title,$data = NULL){
        $this->CI->template->set_template('public');
        $this->CI->template->write('title', $title , TRUE);
        $this->CI->template->write_view('content', $view , $data , TRUE);
        $this->CI->template->render();
    }

    public function show_alert($msg){
        echo '<script language="javascript">';
        echo 'alert('.$msg.')';
        echo '</script>';
    }

    public function show_msg($msg,$type){
        $alert = "";
        switch ($type) {
            case 'info':
                $alert = '<div class="alert alert-info alert-dismissable"><a href="#" class="close" data-dismiss="alert">&times;</a>'.$msg.'</div>';
        break;
            case 'error':
                $alert = '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert">&times;</a>'.$msg.'</div>';
        break;

        }

        return $alert;
    }

    public  function show_menu(){
        $this->load->view('menu/menu');
    }

    function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

    function  sort_date_array($array,$format){
        foreach ($array as $key => $part) {
            $sort[$key] = strtotime($part);
        }
        array_multisort($sort, SORT_DESC, $array);

        foreach ($sort as $item){
            $sortedarray[] = date($format,$item);
        }

        return $sortedarray;
    }

    function initials($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }

    function download_redirect($filename) {
        if (!headers_sent())
            header('Location: '.$filename);
        else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$filename.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
            echo '</noscript>';
        }
    }
    
    function check_session() {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            redirect('/user', 'refresh');
        }
    }


}