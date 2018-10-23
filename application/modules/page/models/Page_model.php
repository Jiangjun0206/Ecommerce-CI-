<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Pages Model
 */
class Page_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('aauth');

    }

    public function get_pages($limit = FALSE, $offset = FALSE, $user_id=FALSE){
        if(!$user_id){
            $user_id = $this->session->userdata('id');
        }
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('pages');
        // limit
        if ($limit) {

            if ($offset == FALSE)
                $this->db->limit($limit);
            else
                $this->db->limit($limit, $offset);
        }


        return ($query->num_rows() > 0)?$query->result():FALSE;

    }
	public function get_pages_funnel_by_id($limit = FALSE, $offset = FALSE, $user_id=FALSE, $funnel_id, $type){
        if(!$user_id){
            $user_id = $this->session->userdata('id');
        }
        $this->db->where('funnel_type',$type);
        $this->db->where('user_id',$user_id);
        $this->db->where('funnel_id',$funnel_id);
        $query = $this->db->get('pages');
        // limit
        if ($limit) {

            if ($offset == FALSE)
                $this->db->limit($limit);
            else
                $this->db->limit($limit, $offset);
        }


        return ($query->num_rows() > 0)?$query->result():FALSE;

    }
    
    public function get_funnel_pages_funnel_by_id($limit = FALSE, $offset = FALSE, $user_id=FALSE, $funnel_id, $type){
        if(!$user_id){
            $user_id = $this->session->userdata('id');
        }
        $this->db->select('id, title, funnel_id, funnel_type');
        $this->db->where('funnel_type',$type);
        $this->db->where('user_id',$user_id);
        $this->db->where('funnel_id',$funnel_id);
        $query = $this->db->get('pages');
        // limit
        if ($limit) {

            if ($offset == FALSE)
                $this->db->limit($limit);
            else
                $this->db->limit($limit, $offset);
        }


        return ($query->num_rows() > 0)?$query->result():FALSE;

    }
    
    public function add_page($data,$user_id=FALSE, $funnel_id, $type){
        if(!$user_id){
            $user_id = $this->session->userdata('id');
        }
        $data['user_id'] = $user_id;
        if(!$this->has_pages($user_id)){
            $data['default_page'] = 1;
        }
        $data['funnel_id'] = $funnel_id;
        $data['funnel_type'] = $type;
        return ($this->db->insert('pages',$data))? $this->db->insert_id() : FALSE;
    }

    public function add_content($data){

        return ($this->db->insert('pages_content',$data))? $this->db->insert_id() : FALSE;
    }

    public function add_plugin($data){

        return ($this->db->insert('pages_plugin',$data))? $this->db->insert_id() : FALSE;
    }

    public function edit_page($id,$data){

        $this->db->where('id', $id);

        return ($this->db->update('pages',$data))? TRUE : FALSE;
    }

	public function IsExistingTitle($title){

        $this->db->where('title', $title);
        //$this->db->where('funnel_id', $funnel_id);
        $query = $this->db->get('pages');
		if($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
    }
    
    public function IsExistingTitle_InEdit($title,$page_id) {
        $this->db->where('title', $title);
        $query = $this->db->get('pages');
        if($query->num_rows() > 0 && $query->result()[0]->id != $page_id)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }        
    }
    
    public function edit_settings($id,$data){

        $this->db->where('id', $id);

        return ($this->db->update('pages',$data))? TRUE : FALSE;
    }



    public function get_page($page_id){
        $query = $this->db->where('id', $page_id);
        $query = $this->db->get('pages');
        return ($query->num_rows() > 0)?$query->row():FALSE;
    }

    public function get_page_type($page_id){
        $query = $this->db->where('id', $page_id);
        $query = $this->db->get('pages');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->funnel_type:FALSE;

    }

    public function get_page_plugin($page_id){
        $query = $this->db->where('page_id', $page_id);
        $query = $this->db->get('pages_plugin');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->plugin_id:FALSE;

    }

    public function get_home_id($user_id=FALSE){
        $query = $this->db->where('home',1);
        if($user_id)
            $query = $this->db->where('user_id',$user_id);
        $query = $this->db->get('pages');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->id:FALSE;

    }

    public function get_default_id($user_id=FALSE){
        $query = $this->db->where('default_page',1);
        if($user_id)
            $query = $this->db->where('user_id',$user_id);
        $query = $this->db->get('pages');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->id:FALSE;

    }

    public function get_page_content($page_id){
        $query = $this->db->where('id', $page_id);
        $query = $this->db->get('pages');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->content:FALSE;

    }

    public function get_page_title($page_id){
        $query = $this->db->where('id', $page_id);
        $query = $this->db->get('pages');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->title:FALSE;

    }


    public function set_home($page_id){
        $this->db->where('id', $page_id);
        $data['home'] = 1;
        return ($this->db->update('pages',$data))? TRUE : FALSE;

    }
    public function set_default($page_id){
        $this->db->where('id', $page_id);
        $data['default_page'] = 1;
        return ($this->db->update('pages',$data))? TRUE : FALSE;

    }

    public function reset_home(){
        $this->db->set('home',0);
        return ($this->db->update('pages'))? TRUE : FALSE;

    }

    public function reset_default($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->set('default_page',0);
        return ($this->db->update('pages'))? TRUE : FALSE;

    }

    public function is_homepage($page_id){

        $this->db->where('id',$page_id);
        $this->db->where('home',1);
        $query = $this->db->get('pages');

        return ($query->num_rows() > 0)? TRUE : FALSE;

    }

    public function has_pages($user_id =FALSE){
        if(!$user_id){
            $user_id = $this->session->userdata('id');
        }
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('pages');

        return ($query->num_rows() > 0)? TRUE : FALSE;

    }

    public function get_first_row(){
        $this->db->limit(1);
        $query = $this->db->get('pages');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->id:FALSE;

    }

    public function get_user_page_id($user_id){
        $this->db->where('default_page',1);
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('pages');
        $row = $query->row();
        return ($query->num_rows() > 0)?$row->id:FALSE;

    }

    public function delete_page($page_id){
        $this->db->where('id', $page_id);

        return ($this->db->delete('pages'))? TRUE : FALSE;

    }

    public function check_perms($page_id,$type){

        $this->db->where('page_id',$page_id);
        $query = $this->db->get('pages_'.$type.'_perm');

        return ($query->num_rows() > 0)? TRUE : FALSE;

    }

    public function delete_page_perm($page_id,$type){
        $this->db->where('page_id', $page_id);
        return ($this->db->delete('pages_'.$type.'_perm'))? TRUE : FALSE;

    }

    public function add_page_perm($data,$type){

        return ($this->db->insert('pages_'.$type.'_perm',$data))? $this->db->insert_id() : FALSE;
    }

    public function get_perms($page_id,$type){
        $query = $this->db->where('page_id', $page_id);
        $query = $this->db->get('pages_'.$type.'_perm');

        return ($query->num_rows() > 0)?$query->result():FALSE;

    }

    public function check_user_perms($page_id,$user){

        $this->db->where('page_id',$page_id);
        $this->db->where('user_id',$user);
        $query = $this->db->get('pages_user_perm');

        return ($query->num_rows() > 0)? TRUE : FALSE;

    }

    public function check_group_perms($page_id,$group){

        $this->db->where('page_id',$page_id);
        $this->db->where('group_id',$group);
        $query = $this->db->get('pages_group_perm');

        return ($query->num_rows() > 0)? TRUE : FALSE;

    }

    public function rename_page($page_id, $title){
        $data = [
            'title' => $title
        ];
        $this->db->where('id', $page_id);

        return ($this->db->update('pages',$data))? TRUE : FALSE;
    }

    public function get_is_disable_fbanner($page_id) {
        $this->db->select('user_id');
        $this->db->where('id',$page_id);
        $user_id = $this->db->get('pages')->result()[0]->user_id;
        $is_disable_fbanner = $this->aauth->get_is_disable_fbanner($user_id);

        return $is_disable_fbanner;
    }


}