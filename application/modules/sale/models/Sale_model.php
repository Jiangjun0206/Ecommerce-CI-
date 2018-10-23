
<?php
class Sale_model extends CI_Model{
  public function __construct()
    {
        parent::__construct();
        $this->load->library('aauth');

    }
    public function record_count() {
       $user_id = $this->session->userdata('id');
        $this->db->select('s.*,a.username');
        $this->db->from('sale as s');
        $this->db->where(array('s.seller'=>$user_id));  
        $this->db->join('aauth_users as a', 'a.id = s.buyer');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_sales($limit, $start){
        $this->db->limit($limit, $start);
        $user_id = $this->session->userdata('id');
        $this->db->select('s.*,a.username');
        $this->db->from('sale as s');
        $this->db->where(array('s.seller'=>$user_id));  
        $this->db->join('aauth_users as a', 'a.id = s.buyer');
        $query = $this->db->get();

        // $query_result = $query->result();
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
        }
        return false;

       

         return $query_result;
    }

    public function did_delete_row($id){
      $this -> db -> where('sale_id', $id);
      $this -> db -> delete('sale');
    }
}
?>