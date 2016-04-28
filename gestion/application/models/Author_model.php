<?php

class Author_model extends CI_Model
{
    public function __construct() 
    {
    	parent::__construct();
    }
    
    public function get_authors() 
    {
    	$this->load->database();
    	
    	$query = $this->db->get('gestion.author');
    	
    	$data=$query->result();
    	
    	return $data;
    }
    
    public function set_author() 
    {
       
    }

    public function del_author() 
    {
        
    }

}