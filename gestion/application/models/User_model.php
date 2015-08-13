<?php

class User_model extends CI_Model
{
    public function __construct() 
    {
    	parent::__construct();
    }
    
    public function get_users() 
    {
    	$this->load->database();
    	 
    	$query = $this->db->get('gestion.user');
    	
    	$data=$query->result();
    	
    	return $data;
    }
    
    public function set_user() 
    {
       
    }

    public function del_user() 
    {
        
    }

}