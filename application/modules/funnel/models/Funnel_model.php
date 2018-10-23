<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Pages Model
 */
class Funnel_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();

    }

    public function add_funnel($user_id, $funnel_name, $funnel_type){
        $data['user_id'] = $user_id;
        $data['funnel_name'] = $funnel_name;
        $data['funnel_type'] = $funnel_type;
        return ($this->db->insert('funnel',$data))? $this->db->insert_id() : FALSE;
    }
	
	public function get_all_funnel($user_id, $type)
	{
        $this->db->where('user_id', $user_id);
        $this->db->where('funnel_type', $type);
        $query = $this->db->get('funnel');
        return ($query->num_rows() > 0)?$query->result():FALSE;
	}
	public function get_all_funnel_By_Id($id)
	{
        $this->db->where('id', $id);
        $query = $this->db->get('funnel');
        return ($query->num_rows() > 0)?$query->result():FALSE;
	}
	public function delete_funnel($id)
	{
        
        
        $this->db->where('id', $id);
        return ($this->db->delete('funnel'))? TRUE : FALSE;

	}
	public function updateFunnelById($id, $funnel_name)
	{
        $this->db->where('id', $id);
        $data['funnel_name'] = $funnel_name;
	    return ($this->db->update('funnel',$data))? TRUE : FALSE;

	}




}