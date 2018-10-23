<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Utilities
 * @property Menu $menu
 * @author Admin
 */
class Utilities extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->functions->check_session();
        $this->load->library('menu');
        $this->load->library('pagination');
        $this->load->library('functions');
        //$this->load->library('pages');
        $this->functions->access();
        $this->fname = $this->aauth->get_user_first_name();
        $this->lname = $this->aauth->get_user_last_name();
        $this->initials = $this->aauth->get_user_name_initials();
    }

    public function menu_list(){

        $offset = $this->input->get("per_page");

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
            'menus' => $this->menu->get_main_menu(),
            'main_menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            //'subnav' => $this->load->view('menu/subnav', $subnav_data, TRUE),

        );


        $config['base_url']    = base_url().'utilities/menu_list';
        $config['total_rows']  = 3;
        $config['per_page']    = 3;
        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $this->template->set_template('login_signup');
        $this->template->write('title', 'Menu', TRUE);
        $this->template->write_view('content', 'menu/menu_list', $data , TRUE);
        $this->template->render();
    }

    public function menu_details($id){

        $data = array(
            'menus' => $this->menu->get_sub_menu($id),

        );
        $this->load->view('menu/menu_details', $data);
    }

    public function add_menu(){

        $this->functions->show_view('menu/add_menu','Add Menu');

    }

    public function edit_menu(){
        $id = $this->input->get('mid');
        $menu_level = $this->input->get('ml');
        $data['menu'] = $this->menu->get_single_menu($id,$menu_level);

        $data['menu_level'] = $menu_level;
        $this->functions->show_view('menu/edit_menu','Edit Menu',$data);

    }

    public function save_menu(){
        $postdata = $this->input->post();
        $data = array();

        $data['name'] = $postdata['menu_name'];
        $data['url'] = '#';
        $data['type'] = $postdata['type'];


        if($postdata['level'] == 'sub'){
            $id = $this->menu->add_sub_menu($data);
        }else{
            $data['megamenu'] = 1;
            $id = $this->menu->add_menu($data);
        }


        redirect('utilities/url_page/'.$postdata['type'].'/'.$id.'/'.$postdata['level']);
    }

    public  function url_page($type,$id,$level,$main2sub=0){
        $data = array(
            'type' => $type,
            'id' => $id,
            'level' => $level,
            'main2sub' => $main2sub
        );

        if($main2sub > 0){
            $data['main2sub'] = $main2sub;
        }

        if($level == 'sub')
            $data['menus'] = $this->menu->get_main_menu();
        $this->load->model('page/page_model');
        if($type == 'page')
            $data['pages'] = $this->page_model->get_pages();

        $this->functions->show_view('menu/url_page','Add Url',$data);

    }

    public function publish_menu($menu_id){
        $this->menu->publish_menu($menu_id);
        redirect('utilities/menu_list');
    }

    public function unpublish_menu($menu_id){
        $this->menu->unpublish_menu($menu_id);
        redirect('utilities/menu_list');
    }


    public function update_url(){
        $postdata = $this->input->post();
        $data = array();
        $type = $postdata['type'];
        $level = $postdata['level'];
        if($type == 'external'){
            $data['url'] = $postdata['url'];
        }else{
            $data['url'] = 'page/content/'.$postdata['page'];
        }

        if($level == 'sub'){
            $pieces = explode("_", $postdata['parent']);

            if($pieces[0]=='sub'){
                $data['parent'] = $pieces[1];
            }else{
                $data['menu_id'] = $pieces[1];
            }
            //$menu_id = $this->menu->get_menu_id_from_parent($pieces[1]);

            //$data['menu_id'] = $pieces[1];
            $this->menu->edit_sub_menu($postdata['id'],$data);

        }else{

            $this->menu->edit_main_menu($postdata['id'],$data);

        }

        redirect('utilities/menu_list/');

    }

    public function save_edit_menu(){
        $postdata = $this->input->post();
        $data = array();

        $type = $this->menu->get_main_menu_type($postdata['id']);



        $data['name'] = $postdata['menu_name'];
        $data['type'] = $postdata['type'];

        //  die('current =>'.$postdata['current_level'].' , post=> '.$postdata['level']);

        if($postdata['current_level'] != $postdata['level']){
            if($postdata['current_level'] == 'main'){
                if($type != $postdata['type'] ) {
                    $data['url'] = '#';
                }else {
                    $data['url'] = $this->menu->get_main_menu_url($postdata['id']);
                }

                //save the main menu in submenu
                $id = $this->menu->add_sub_menu($data);
                //make all submenus to children
                if($this->menu->has_submenu($postdata['id'])) {
                    $subdata['parent'] = $id;
                    $subdata['menu_id'] = NULL;
                    $submenus = $this->menu->get_sub_menu($postdata['id']);
                    foreach ($submenus as $submenu) {
                        if($this->menu->has_children($submenu->id)) {
                            $children = $this->menu->get_sub_nav($submenu->id);
                            foreach ($children as $child) {
                                //die('toto ->'.$id);
                                $child_data['parent'] = $id;
                                $this->menu->edit_sub_menu($child->id, $child_data);
                            }
                        }

                        $this->menu->edit_sub_menu($submenu->id,$subdata);
                    }
                }
                //delete main menu
                $this->menu->delete_current_menu($postdata['id'],'main');

                redirect('utilities/url_page/'.$postdata['type'].'/'.$id.'/'.$postdata['level'].'/1');


            }else{
                if($type != $postdata['type'] ) {
                    $data['url'] = '#';
                }else {
                    $data['url'] = $this->menu->get_sub_menu_url($postdata['id']);
                }
                $data['megamenu'] = 1;
                $id = $this->menu->add_menu($data);

                if($this->menu->has_children($postdata['id'])){
                    $children = $this->menu->get_sub_nav($postdata['id']);
                    $pdata['parent'] = NULL;
                    $pdata['menu_id'] = $id;
                    foreach($children as $child){
                        $this->menu->edit_sub_menu($child->id,$pdata);
                    }
                }

                $this->menu->delete_current_menu($postdata['id'],'sub');

            }
        }else{
            $id = $postdata['id'];
            if($postdata['level'] == 'main') {
                $this->menu->edit_main_menu($postdata['id'],$data);

            }else{
                $this->menu->edit_sub_menu($postdata['id'],$data);
            }

        }


        redirect('utilities/url_page/'.$postdata['type'].'/'.$id.'/'.$postdata['level']);
    }

    public function delete_menu($id,$menu_level){
        //$id = $this->input->get('mid');
        //$menu_level = $this->input->get('ml');

        if($menu_level == 'main'){
            if($this->menu->has_submenu($id)){
                $submenus = $this->menu->get_sub_menu($id);
                foreach($submenus as $submenu){
                    if($this->menu->has_children($submenu->id)){
                        $children = $this->menu->get_sub_nav($submenu->id);
                        foreach ($children as $child) {
                            $this->menu->delete_current_menu($child->id,'sub');
                        }
                    }
                    $this->menu->delete_current_menu($submenu->id,'sub');
                }
            }

            $this->menu->delete_current_menu($id,'main');
        }else{
            if($this->menu->has_children($id)){
                $children = $this->menu->get_sub_nav($id);
                foreach ($children as $child) {
                    $this->menu->delete_current_menu($child->id,'sub');
                }
            }
            $this->menu->delete_current_menu($id,'sub');
        }

        redirect('utilities/menu_list');
    }

    public function menuReorder(){
        $id = $this->input->get('mid');
        $menu_level = $this->input->get('ml');
        if($menu_level == 'main'){
            $data['sameLevelMenus'] = $this->menu->get_main_menu();
        }else{
            if($this->menu->get_sub_menu_parent($id)){
                $parent = $this->menu->get_sub_menu_parent($id);
                $data['sameLevelMenus'] = $this->menu->getSameLevelSubMenus($parent);
            }else{
                $data['sameLevelMenus'] = $this->menu->getSameLevelSubMenus();
            }
        }

        $data['menu'] = $this->menu->get_single_menu($id,$menu_level);

        $this->functions->show_view('menu/reorderMenu','Reorder Menu',$data);
    }

    public function reorderMenu(){
        $postdata = $this->input->post();

        $before_menu_id = $postdata['position'];

        $before_menu_position = $this->menu->get_main_menu_position($before_menu_id);

        $new_menu_position = $before_menu_position + 1;
        $current_menu_postion = $postdata['current_position'];
        $current_menu_id = $postdata['id'];


        if($this->menu->reorderPostion($new_menu_position,$current_menu_postion)){
            $this->menu->updatePosition($new_menu_position,$current_menu_id);
            if($this->menu->main_has_excess_position()){
                $this->menu->updatePosition($this->menu->no_of_main_menu_items(),$this->menu->main_has_excess_position());
            }
        }


        redirect('utilities/menu_list');

    }

}