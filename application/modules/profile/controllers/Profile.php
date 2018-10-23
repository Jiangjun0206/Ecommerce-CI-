<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Pages
 * @author Admin
 * @property Page_model $page_model
 * @property Aauth $aauth
 */
class Profile extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->functions->check_session();
        $this->load->model('page/page_model');
        $this->load->library('functions');
    }

    public function _remap($method, $params = array())
    {
        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }

        if($this->aauth->user_exist_by_username($method)){
            $this->load->library('menu');
            $user_id = $this->aauth->get_user_id_from_username($method);
            $page_id = $this->page_model->get_user_page_id($user_id);
           if($page_id) {
               $css = array('default/css/home/css/content_front.css','default/css/themes/theme-classic.css');
               $data = array(
                   'menu' => $this->menu->generate_menu(1),
                   'logged_in' => $this->aauth->is_loggedin(),
                   'page' => $this->page_model->get_page($page_id),
                   'css' => $css,
               );
               $data['title'] = $this->page_model->get_page_title($page_id);
               $this->functions->show_frontend_view('content','Page Content',$data);
               return;
           }

        }

        //show_404();
    }

    public function index(){
        $method = $this->uri->segment(1);

        if($method=='profile'){

        }else{
            if($this->aauth->user_exist_by_username($method)) {
                $this->load->library('menu');
                $user_id = $this->aauth->get_user_id_from_username($method);
                $page_id = $this->page_model->get_user_page_id($user_id);
                if ($page_id) {
                    $css = array('default/css/home/css/content_front.css', 'default/css/themes/theme-classic.css');
                    $data = array(
                        'menu' => $this->menu->generate_menu(1),
                        'logged_in' => $this->aauth->is_loggedin(),
                        'page' => $this->page_model->get_page($page_id),
                        'css' => $css,
                    );
                    $data['title'] = $this->page_model->get_page_title($page_id);
                    $this->functions->show_frontend_view('content', 'Page Content', $data);
                    return;
                }
            }else{
                show_404();
            }
        }
        //redirect('user');
    }
}