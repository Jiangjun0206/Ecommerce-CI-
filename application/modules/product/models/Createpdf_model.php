   <?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
 
    /**
     * Description of Createpdf Model: CodeIgniter Createpdf MySQL
     *
     * @author TechArise Team
     *
     * @email  info@techarise.com
     */
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
 
    class Createpdf_model extends CI_Model {
 
        // get content 
        public function getContent() {        
            $this->db->select(array('b.name', 'b.description', 'b.created_date'));
            $this->db->from('blog b');  
            $query = $this->db->get();
           return $query->row_array();
        } 
    }
    ?>