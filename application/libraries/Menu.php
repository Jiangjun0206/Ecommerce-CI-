<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Menu
{

    private $CI;


    public function __construct()
    {
        $this->CI =& get_instance();
        //$this->CI->load->library('aauth');

    }

    public function get_mega_menus(){
        $query = $this->CI->db->get('menu_megamenu');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function get_main_menu($megamenu=1){
        $this->CI->db->where('megamenu',$megamenu);
        $this->CI->db->order_by('position');
        $query = $this->CI->db->get('menu');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function get_first_main_menu($megamenu=1){
        $this->CI->db->where('megamenu',$megamenu);
        $this->CI->db->order_by('position');
        $this->CI->db->limit(1);
        $query = $this->CI->db->get('menu');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function get_home_page($megamenu=1){
        $this->CI->db->where('megamenu',$megamenu);
        $this->CI->db->order_by('position');
        $this->CI->db->limit(1);
        $query = $this->CI->db->get('menu');
        $row = $query->row();
        return ($query->num_rows() > 0)? explode('/',$row->url)[2] :FALSE;

    }



    public function no_of_main_menu_items($megamenu=1){
        $this->CI->db->where('megamenu',$megamenu);
        $query = $this->CI->db->get('menu');

        return ($query->num_rows() > 0)?$query->num_rows():FALSE;

    }

    public function get_front_main_menu($megamenu=1){
        $this->CI->db->where('megamenu',$megamenu);
        $this->CI->db->where('publish',1);
        $this->CI->db->order_by('position');
        $query = $this->CI->db->get('menu');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function get_sub_menu($menu){
        $this->CI->db->where('menu_id',$menu);
        $this->CI->db->where('parent',NULL);
        $query = $this->CI->db->get('menu_subnav');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function get_sub_nav($sub_menu){
        $this->CI->db->where('parent',$sub_menu);
        $query = $this->CI->db->get('menu_subnav');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function has_submenu($menu_id){

        $this->CI->db->where('menu_id',$menu_id);
        $query = $this->CI->db->get('menu_subnav');

        return ($query->num_rows() > 0)? TRUE : FALSE;


    }

    public function has_children($parent){

        $this->CI->db->where('parent',$parent);
        $query = $this->CI->db->get('menu_subnav');

        return ($query->num_rows() > 0)? TRUE : FALSE;


    }

    public function generate_menu($megamenu){
        $menus = $this->get_front_main_menu($megamenu);
        $html = '';
        foreach($menus as $menu){
            if($menu->type == 'external'){
                $html = $html . '<li class="has-dropdown"><a href="' . $menu->url . '" target="_blank">' . $menu->name . '</a>';
            }else {
                $html = $html . '<li class="has-dropdown"><a href="' . site_url($menu->url) . '">' . $menu->name . '</a>';
            }
            if($this->has_submenu($menu->id)){
                $submenus = $this->get_sub_menu($menu->id);
                $html = $html .'<ul>';
                 foreach($submenus as $submenu) {

                     if($menu->type == 'external') {
                         if($this->has_children($submenu->id)) {
                             $html = $html . '<li class="has-dropdown"><a href="' . $submenu->url . '" target= "_blank">' . $submenu->name . '</a>';

                             $html = $html . ' <ul>';
                             $children = $this->get_sub_nav($submenu->id);
                             foreach ($children as $child) {
                                 if($menu->type == 'external') {
                                     $html = $html . '<li><a href="' . $child->url . ' " target="_blank">' . $child->name . '</a></li>';
                                 }else {
                                     $html = $html . '<li><a href="' . site_url($child->url) . '">' . $child->name . '</a></li>';
                                 }
                             }
                             $html = $html . ' </ul></li>';
                         }else {
                             $html = $html . '<li><a href="' . $submenu->url . '" target= "_blank">' . $submenu->name . '</a></li>';
                         }
                     }else {

                         if($this->has_children($submenu->id)) {
                             $html = $html . '<li class="has-dropdown"><a href="' . $submenu->url . '"  class="active">' . $submenu->name . '</a>';
                             $html = $html . ' <ul>';
                             $children = $this->get_sub_nav($submenu->id);
                             foreach ($children as $child) {
                                 if($menu->type == 'external') {
                                     $html = $html . '<li><a href="' . $child->url . ' " target="_blank">' . $child->name . '</a></li>';
                                 }else {
                                     $html = $html . '<li><a href="' . site_url($child->url) . '">' . $child->name . '</a></li>';
                                 }
                             }

                             $html = $html . ' </ul></li>';
                         }else {
                             $html = $html . '<li><a href="' . site_url($submenu->url) . '">' . $submenu->name . '</a></li>';
                         }
                     }



                 }

                $html = $html . ' </ul>';

            }
            $html = $html . ' </li>';

        }

        return $html;

    }

    public function edit_main_menu($menu_id,$data)
    {

        $this->CI->db->where('id', $menu_id);

        return ($this->CI->db->update('menu', $data)) ? TRUE : FALSE;
    }

    public function unpublish_menu($menu_id)
    {
        $data['publish'] = 0;
        $this->CI->db->where('id', $menu_id);

        return ($this->CI->db->update('menu', $data)) ? TRUE : FALSE;
    }

    public function publish_menu($menu_id)
    {
        $data['publish'] = 1;
        $this->CI->db->where('id', $menu_id);

        return ($this->CI->db->update('menu', $data)) ? TRUE : FALSE;
    }

    public function unpublish_sub_menu($menu_id)
    {
        $data['publish'] = 0;
        $this->CI->db->where('id', $menu_id);

        return ($this->CI->db->update('menu_subnav', $data)) ? TRUE : FALSE;
    }

    public function publish_sub_menu($menu_id)
    {
        $data['publish'] = 1;
        $this->CI->db->where('id', $menu_id);

        return ($this->CI->db->update('menu_subnav', $data)) ? TRUE : FALSE;
    }


    public function edit_sub_menu($menu_id,$data){

        $this->CI->db->where('id', $menu_id);

        return ($this->CI->db->update('menu_subnav',$data))? TRUE : FALSE;
    }

    public function get_no_of_main_menu_items(){
        $query = $this->CI->db->get('menu');

        return ($query->num_rows() > 0)? $query->num_rows() : FALSE;

    }

    public function add_menu($data){
        $data['position'] = $this->get_no_of_main_menu_items() + 1;
        return ($this->CI->db->insert('menu',$data))? $this->CI->db->insert_id() : FALSE;
    }

    public function add_sub_menu($data){

        return ($this->CI->db->insert('menu_subnav',$data))? $this->CI->db->insert_id() : FALSE;
    }

    public function get_menu_id_from_parent($parent_id){
        $this->CI->db->where('id', $parent_id);
        $query = $this->CI->db->get('menu_subnav');

        return ($query->num_rows() > 0)? $query->row() : FALSE;

    }

    public function get_single_menu($menu_id,$level){
        $query = $this->CI->db->where('id', $menu_id);
        if($level == 'main')
            $query = $this->CI->db->get('menu');
        else
            $query = $this->CI->db->get('menu_subnav');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row:FALSE;

    }

    public function getSameLevelSubMenus($parent=FALSE){

        if($parent)
            $this->CI->db->where('parent',$parent);
        else
            $this->CI->db->where('parent',NULL);

        $query = $this->CI->db->get('menu_subnav');

        return ($query->num_rows() > 0)?$query->result():FALSE;


    }

    public function get_main_menu_type($menu_id){
        $query = $this->CI->db->where('id', $menu_id);
        $query = $this->CI->db->get('menu');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->type:FALSE;

    }

    public function get_main_menu_position($menu_id){
        $query = $this->CI->db->where('id', $menu_id);
        $query = $this->CI->db->get('menu');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->position:FALSE;

    }

    public function get_main_menu_url($menu_id){
        $query = $this->CI->db->where('id', $menu_id);
        $query = $this->CI->db->get('menu');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->url:FALSE;

    }

    public function get_sub_menu_url($menu_id){
        $query = $this->CI->db->where('id', $menu_id);
        $query = $this->CI->db->get('menu_subnav');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->url:FALSE;

    }

    public function get_sub_menu_parent($menu_id){
        $query = $this->CI->db->where('id', $menu_id);
        $query = $this->CI->db->get('menu_subnav');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->parent:FALSE;

    }

    public function delete_current_menu($id,$type){
        $query = $this->CI->db->where('id', $id);
        if($type == "main"){
            $position = $this->get_main_menu_position($id);
            $this->CI->db->where('position>', $position);
            $this->CI->db->set('position', 'position-1', FALSE);
            $this->CI->db->update('menu');
            $this->CI->db->where('id', $id);
            return ($this->CI->db->delete('menu'))? TRUE : FALSE;
        }else{
            return ($this->CI->db->delete('menu_subnav'))? TRUE : FALSE;
        }
    }

    public function get_internal_main_menu(){
        $this->CI->db->where('type','page');
        $query = $this->CI->db->get('menu');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function get_internal_sub_menu(){
        $this->CI->db->where('type','page');
        $query = $this->CI->db->get('menu_subnav');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function main_has_page($page_id){
        $menu_ids = array();
        //get all menu urls
        $menus = $this->get_internal_main_menu();
        //for each menu url check if the is equal to the page id
        if($menus) {
            foreach ($menus as $menu) {
                $p_id = explode("/", $menu->url)[2];
                if ($p_id == $page_id) {
                    $menu_ids[] = $menu->id;
                }
            }
        }
        return $menu_ids;


    }

    public function sub_has_page($page_id){
        $menu_ids = array();
        //get all menu urls
        $submenus = $this->get_internal_sub_menu();

        if($submenus) {
            foreach ($submenus as $submenu) {
                $p_id = explode("/", $submenu->url)[2];
                if ($p_id == $page_id) {
                    $menu_ids[] = $submenu->id;
                }
            }
        }

        return $menu_ids;
    }

    public function get_id_of_current_position_holder($position){
        $this->CI->db->where('position', $position);
        $query = $this->CI->db->get('menu');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->id:FALSE;

    }

    public function main_has_excess_position(){
        $this->CI->db->where('position >', $this->no_of_main_menu_items());
        $query = $this->CI->db->get('menu');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->id:FALSE;
    }

    public function reorderPostion($newPostion,$currentPosition){
        //moving up
        if($newPostion < $currentPosition) {

                $this->CI->db->where('position>=', $newPostion);
                $this->CI->db->where('position<=', $currentPosition);
                $this->CI->db->set('position', 'position+1', FALSE);

        }else{
            ///moving down
            $this->CI->db->where('position<=', $newPostion);
            $this->CI->db->where('position>=', $currentPosition);
            $this->CI->db->set('position', 'position-1', FALSE);
        }

        return ($this->CI->db->update('menu')) ? TRUE : FALSE;
    }

    public function updatePosition($newPostion,$currentMenuID){
        $data['position'] = $newPostion;
        $this->CI->db->where('id =',$currentMenuID);
        return ($this->CI->db->update('menu',$data)) ? TRUE : FALSE;
    }


}