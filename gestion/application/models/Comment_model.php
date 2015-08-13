<?php

class Comment_model extends CI_Model
{

    public function __construct() 
    {
    	parent::__construct();
    }

    public function get_comments($id,$type) 
    {

    	$this->load->database();
    	if($id==0)
    	{
    		$query = $this->db->get('gestion.comment');
    		$data=$query->result();    	
    	}
    	else
    	{
    		if($type=="project")
    		{
	    		$query = $this->db->get_where('gestion.comment',array('project_id' => $id));
	    		$data=$query->result();    	   		
    		}
    		else 
    		{
    			$query = $this->db->get_where('gestion.comment',array('task_id' => $id));
    			$data=$query->result();
    		}
    	}
    	 
    	return $data;
    }

    public function set_project_comment($descr,$author,$date,$id) 
    {
    	$this->load->database();
    	
    		    	$data = array(	 
	    			'text'=>$descr,
	    			'date'=>$date,
	    			'author'=>$author,
	    			'project_id'=>$id
	    	);
    	
    	
    	$this->db->insert('gestion.comment', $data);
    	

    }

    public function set_task_comment($descr,$author,$date,$id) 
    {
    	$this->load->database();
    	
    	$data = array(
    			'text'=>$descr,
    			'date'=>$date,
    			'author'=>$author,
    			'task_id'=>$id
    	);
    	
    	$this->db->insert('gestion.comment', $data);
    	

    }
    
    public function del_comment($id)
    {
    	$this->load->database();

    	 
    	$this->db->delete('gestion.comment', array('comment_id' => $id));
    }

}