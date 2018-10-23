
<?php
class Discount_model extends CI_Model{
  public function __construct()
    {
        parent::__construct();
        $this->load->library('aauth');

    }
    function product_insert($data){
    // Inserting in Table(students) of Database(college)
    
        $this->db->insert('product', $data);
    }
    function product_count(){
        $user_id = $this->session->userdata('id');
     
        $this->db->where('seller_id',$user_id);
        $result = $this->db->get('product')->num_rows();
        return $result;
    }
    function get_coupon(){
        // $user_id = $this->session->userdata('id');
        // $this->db->where('seller_id',$user_id);
        $query = $this->db->get('coupon');
        $query_result = $query->result(); 
    
        return $query_result;
    }
    function fetch_data($query)
     {
      $this->db->select("*");
      $this->db->from("coupon");
      if($query != '')
      {
       $this->db->like('title', $query);
       $this->db->or_like('spec', $query);
       $this->db->or_like('added_by', $query);
       $this->db->or_like('till', $query);
       $this->db->or_like('code', $query);
       $this->db->or_like('status', $query);
      }
      $this->db->order_by('coupon_id', 'DESC');
      return $this->db->get();
     }
}
?>