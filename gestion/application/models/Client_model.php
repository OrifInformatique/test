<?php

class Client_model extends CI_Model
{
    public function __construct() 
    {
    	parent::__construct();
    }

    public function get_clients() 
    {
    	$this->load->database();
    	
		$query = $this->db->get('gestion.client');
		
		$data=$query->result();
		
		return $data;
    }

    public function set_client() 
    {
        
    }

    public function del_client() 
    {
        
    }
}