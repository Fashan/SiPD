<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Saran_model extends CI_Model {
                        
public function get_all_saran(){
	$this->db->select('saran.*,users.username');
	$this->db->from('saran');
	$this->db->join('users','saran.user_id = users.user_id');
	$this->db->order_by('saran_id', 'asc');
	$query = $this->db->get()->result();
	return $query;
	
}
                        
                            
                        
}
                        
/* End of file saran_model.php */
    
                        