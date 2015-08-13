<?php

class Task_model extends CI_Model
{
    public function __construct() 
    {
    	parent::__construct();
    }

    public function get_tasks($id,$type) 
    {
    	$this->load->database();
    	if($id==0)
    	{
    		$query = $this->db->get('gestion.task');
    		$data=$query->result();
    	
    		foreach ($data as $row)
    		{
    			//avoir le status
    			$statusId=$row->status_id;
    			$query = $this->db->get_where('gestion.task_status',array('status_id'=>$statusId));
    			$status=$query->row();
    			$row->status_id=$status->status;
    			//////////////////////////////////
    			 
    			//avoir auteur
    			$userId=$row->author_user_id;
    			$query = $this->db->get_where('gestion.user',array('user_id'=>$userId));
    			$author=$query->row();
    			$row->author_user_id=$author->prename." ".$author->name;
    			//////////////////
    		}
    	}
    		else
    		{
    			
    			if($type=="project")
    			{
    				$query = $this->db->get_where('gestion.task',array('project_id' => $id));
    				$data=$query->result();
    				
    				foreach ($data as $row)
    				{
    					//avoir le status
    					$statusId=$row->status_id;
    					$query = $this->db->get_where('gestion.task_status',array('status_id'=>$statusId));
    					$status=$query->row();
    					$row->status_id=$status->status;
    					//////////////////////////////////
    				
    					//avoir auteur
    					$userId=$row->author_user_id;
    					$query = $this->db->get_where('gestion.user',array('user_id'=>$userId));
    					$author=$query->row();
    					$row->author_user_id=$author->prename." ".$author->name;
    					//////////////////
    				}
    			}
    			else 
    			{
	    			$query = $this->db->get_where('gestion.task',array('task_id' => $id));
	    			$data=$query->result();
	    		
	    			foreach ($data as $row)
	    			{
	    				//avoir le status
	    				$statusId=$row->status_id;
	    				$query = $this->db->get_where('gestion.task_status',array('status_id'=>$statusId));
	    				$status=$query->row();
	    				$row->status_id=$status->status;
	    				//////////////////////////////////
	    		
	    				//avoir auteur
	    				$userId=$row->author_user_id;
	    				$query = $this->db->get_where('gestion.user',array('user_id'=>$userId));
	    				$author=$query->row();
	    				$row->author_user_id=$author->prename." ".$author->name;
	    				//////////////////
	    			}
    			}    			
    		}   		 
    		return $data;
    }

    public function set_task($title,$descr,$author,$date,$status,$allowed,$estimated,$project)
    {
    	$this->load->database();
    	$this->load->helper('url');
    	

    	$data = array(
    			'title'=>$title,
    			'description'=>$descr,
    			'create_date'=>$date,
    			'author_user_id'=>$author,
    			'status_id'=>$status,
    			'time_allowed'=>$allowed,
    			'project_id'=>$project,
    			'time_estimate'=>$estimated
    	);
    	$this->db->insert('gestion.task', $data);
    }
    
    public function del_task($id) 
    {
    	$this->load->database();

    	 
    	$this->db->delete('gestion.task', array('task_id' => $id));
    }
  
    public function add_manager() 
    {
       
    }

    public function del_manager() 
    {
       
    }
}