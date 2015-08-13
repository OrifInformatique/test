<?php


/**
 * 
 */
class Comments extends CI_Controller
{
    public function __construct() 
    {
    	parent::__construct();
    }

    private $modelComment;

    public function News()
    {
    	$this->load->helper('url');
    	
    	$this->load->model('Comment_model');

    	$descr=$_POST['descr'];
    	$author=$_POST['author'];
    	$date=$_POST['date'];
    	$type=$_POST['type'];
    	$id=$_POST['id'];
    	
    	if($type=="Project")
    	{

    		$this->Comment_model->set_project_comment($descr,$author,$date,$id);
    	}
    	else
    	{

    		$this->Comment_model->set_task_comment($descr,$author,$date,$id);
    	}
    	
    	redirect(base_url($type."/Detail/".$id));

    }

    public function Update() 
    {
        
    }
    
    public function Delete() 
    {
    	$this->load->helper('url');
    	$this->load->model('Comment_model');
    	 
       	$id=$_POST['id'];
    	$typeId=$_POST['typeId'];
    	$type=$_POST['type'];
    	
    	$this->Comment_model->del_comment($id);
    	
    	 
    	redirect(base_url($type."/Detail/".$typeId));
    }

    public function Lists() 
    {
    	$this->load->model('Comment_model');
    	
    	$data['comment'] = $this->Comment_model->get_comments();
    	
    }
    
    public function Detail() 
    {
        
    }

}