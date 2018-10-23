<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Utilities
 * @property Menu $menu
 * @author Admin
 */
class Funnel extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->functions->check_session();
        $this->load->library('menu');
        $this->load->model('page_model');
        $this->load->library('pagination');
        $this->load->library('functions');
        //$this->load->library('pages');
		$this->fname = $this->aauth->get_user_first_name();
        $this->lname = $this->aauth->get_user_last_name();
        $this->initials = $this->aauth->get_user_name_initials();
        
    }
   public function funnel_list(){

        $offset = $this->input->get("per_page");
        $user_id = $this->session->userdata('id');
        
        if($offset <=0)
            $offset=0;

        $menu_data = array(
            'fname' => $this->fname,
            'initials' => $this->initials,
            'lname' => $this->lname
        );
		
			
			
        $subnav_data = array(
            'megamenus' => $this->menu->get_mega_menus()
            //'controller' => $this->controller,
            //'method' => $this->method
        );

        $data = array(
        	
            'funnels' => $this->funnel_model->get_all_funnel($user_id, 0),
            'menus' => $this->menu->get_main_menu(),
            'main_menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            //'subnav' => $this->load->view('menu/subnav', $subnav_data, TRUE),
			'user_id' =>$user_id
        );

        $this->template->set_template('login_signup');
        $this->template->write('title', 'Funnel', TRUE);
        $this->template->write_view('content', 'funnel_list', $data , false);
        $this->template->render();
    }
    
    public function funnel_list_ready(){

        $offset = $this->input->get("per_page");
        $user_id = $this->session->userdata('id');
        
        if($offset <=0)
            $offset=0;

        $menu_data = array(
            'fname' => $this->fname,
            'initials' => $this->initials,
            'lname' => $this->lname
        );
		
			
			
        $subnav_data = array(
            'megamenus' => $this->menu->get_mega_menus()
            //'controller' => $this->controller,
            //'method' => $this->method
        );

        $data = array(
        	
            'funnels' => $this->funnel_model->get_all_funnel($user_id, 1),
            'menus' => $this->menu->get_main_menu(),
            'main_menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            //'subnav' => $this->load->view('menu/subnav', $subnav_data, TRUE),
			'user_id' =>$user_id
        );

        $this->template->set_template('login_signup');
        $this->template->write('title', 'Funnel', TRUE);
        $this->template->write_view('content', 'funnel_list_ready', $data , false);
        $this->template->render();
    }
    
    public function funnel_club(){

        $offset = $this->input->get("per_page");
        $user_id = $this->session->userdata('id');
        
        if($offset <=0)
            $offset=0;

        $menu_data = array(
            'fname' => $this->fname,
            'initials' => $this->initials,
            'lname' => $this->lname
        );
        
            
            
        $subnav_data = array(
            'megamenus' => $this->menu->get_mega_menus()
            //'controller' => $this->controller,
            //'method' => $this->method
        );

        $data = array(
            
            'funnels' => $this->funnel_model->get_all_funnel($user_id, 2),
            'menus' => $this->menu->get_main_menu(),
            'main_menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            //'subnav' => $this->load->view('menu/subnav', $subnav_data, TRUE),
            'user_id' =>$user_id
        );

        $this->template->set_template('login_signup');
        $this->template->write('title', 'Funnel', TRUE);
        $this->template->write_view('content', 'funnel_club', $data , false);
        $this->template->render();
    }
    
    public function create_funnel()
    {
		$postdata = $this->input->post();
		$user_id = $this->session->userdata('id');
        $data = array();
        $funnel_name = $postdata['funnel_name'];
        $funnel_type = $postdata['funnel_type'];
        $id = $this->funnel_model->add_funnel($user_id, $funnel_name, $funnel_type);
        
        if($funnel_type == 0)
        {
	        redirect('funnel/funnel_list');
        }
        else if($funnel_type == 1)
        {
            redirect('funnel/funnel_list_ready');
        }
        else 
        {
	        redirect('funnel/funnel_club');
        }

    }
    public function delete_page($id)
    {
	    $this->funnel_model->delete_funnel($id);
        $funnel_type = explode('funnel_', $_SERVER['HTTP_REFERER'])[1];
        switch ($funnel_type) {
            case 'list_ready':
                redirect('funnel/funnel_list_ready');
                break;
            case 'club':
                redirect('funnel/funnel_club');
                break;
            default:
                redirect('funnel/funnel_list');
                break;
        }

    }
    
    public function edit_funnel(){
        $id = $this->input->get('id');
        $res = $this->funnel_model->get_all_funnel_By_Id($id);

        $data['funnel'] = $res[0];
        $this->functions->show_view('edit_menu','Edit Menu',$data);

    }
    
    public function save_edit_funnel(){
        $funnel_name = $this->input->post('funnel_name');
        $id = $this->input->post('id');
        $res = $this->funnel_model->updateFunnelById($id, $funnel_name);
        $funnel_type = $this->funnel_model->get_all_funnel_By_Id($id)[0]->funnel_type;
        switch ($funnel_type) {
            case '1':
                redirect('funnel/funnel_list_ready');
                break;
            case '2':
                redirect('funnel/funnel_club');
                break;
            default:
                redirect('funnel/funnel_list');
                break;
        }
    }
    
    // ---- added by sunrise0717 ---------------
    public function funnel_pages(){
        $this->functions->access();
        $funnel_id = $_POST['funnel_id'];
        $funnel = $this->funnel_model->get_all_funnel_By_Id($funnel_id);
        
        $user_id = $this->session->userdata('id');
        
        $funnel_pages = $this->page_model->get_funnel_pages_funnel_by_id(false,false,$user_id,$funnel[0]->id, $funnel[0]->funnel_type); // return : page_id, title, funnel_id, type
        echo json_encode($funnel_pages);
    }
    // -------------------- end ----------------
}