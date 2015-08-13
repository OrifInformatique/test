<?php



class Tasks extends CI_Controller
{
	
    public function __construct() 
    {
    	parent::__construct();
    }
    
    private $modelTask;

    public function News() 
    {
    	$this->load->helper('url');
    	$this->load->model('Task_model');
    	 
    	$title=$_POST['title'];
    	$descr=$_POST['descr'];
    	$author=$_POST['author'];
    	$date=$_POST['date'];
    	$status=$_POST['status'];
    	$allowed=$_POST['allowed'];
    	$estimated=$_POST['estimated'];
    	$project=$_POST['project'];
    	
    	$this->Task_model->set_task($title,$descr,$author,$date,$status,$allowed,$estimated,$project);
    	
    	redirect(base_url("Project/Detail/".$project));
    }

    public function Update() 
    {
        
    }

    public function Delete() 
    {
    	$this->load->model('Task_model');
    	$this->load->helper('url');

    	$id=$_POST['id'];
    	$project=$_POST['project'];
    	
    	$this->Task_model->del_task($id); 
    	
    	redirect(base_url("Project/Detail/".$project));
    }

    public function AddManager() 
    {
        
    }

    public function DelManager() 
    {
       
    }

    public function Lists()
    {
       
    }

    public function Detail($id) 
    {
    	$this->load->model('Task_model');
    	$this->load->model('Comment_model');
    	$this->load->model('User_model');
    	 
    	$type="task";
 	 
    	$data['task'] = $this->Task_model->get_tasks($id,$type);
    	 
    	$data['comment']= $this->Comment_model->get_comments($id,$type);
    	 
    	$data['user'] = $this->User_model->get_users();
    	
    	$this->load->view('Task_view', $data);
    }
}