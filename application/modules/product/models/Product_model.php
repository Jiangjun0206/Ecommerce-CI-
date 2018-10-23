
<?php
class Product_model extends CI_Model{
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
    function get_product(){
        $user_id = $this->session->userdata('id');
        $this->db->where('seller_id',$user_id);
        $query = $this->db->get('product');
        $query_result = $query->result();
    
        return $query_result;
    }
}
?>