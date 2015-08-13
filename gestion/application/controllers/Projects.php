<?php

class Projects extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('User_model');
		$this->load->model('Client_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
	} 
	
	public function form($id=0)
	{

		if($id==0)
		{
			
		}
		else
		{
			$data['project'] = $this->Project_model->get_projects($id);  
		}
		 
		
		$data['user'] = $this->User_model->get_users();
		 
		$data['client'] = $this->Client_model->get_clients();
		
		$data['status'] = $this->Project_model->get_status();
		
		// Render the requested view
		$this->load->view('templates/header');
		$this->load->view('project/form_view',$data);
		$this->load->view('templates/footer');
	}
	
    public function add() 
    {    	
    	$this->form_validation->set_rules('title', 'Titre', 'required');
    	$this->form_validation->set_rules('descr', 'description', 'required');
    	
    	if ($this->form_validation->run() === FALSE)
    	{    		
    		   	 
    		redirect(base_url("projects/form/".$this->input->post('id')));
    		
    	}
    	else
    	{
    		$this->Project_model->set_project();
        
     		redirect(base_url());
    	}    	
    }

    public function update() 
    {
        $this->form_validation->set_rules('title', 'Titre', 'required');
    	$this->form_validation->set_rules('descr', 'description', 'required');
    	
    	if ($this->form_validation->run() === FALSE)
    	{    		
    		   	 
    		redirect(base_url("projects/form/".$this->input->post('id')));
    		
    	}
    	else
    	{
    		$this->Project_model->set_project($this->input->post('id'));
        
    		$this->detail($this->input->post('id'));
    	}   
    }
    
    public function delete($id) 
    {
    //id=$_POST['id'];
    	
    	$this->Project_model->del_project($id);
    	
     	redirect(base_url());
    }
   /*
    public function addmanager() 
    {

    	
    	$user_id=0;
    	$project_id=0;
    	
    	$this->Project_model->add_manager($user_id,$project_id);
    	
    	redirect(base_url("Project/Detail/".$project_id));
    }

    public function delmanager()
    {
    	
    	$user_id=0;
        $project_id=0;
        
    	$this->Project_model->del_manager($user_id,$project_id);
    	 
    	redirect(base_url("Project/Detail/".$project_id));
    }*/
    
    public function view() 
    {
    	
    	$data['project'] = $this->Project_model->get_projects();
    	
    	 $this->load->view('templates/header');
    	$this->load->view('project/list_view', $data);
    	 $this->load->view('templates/footer');
    }
    
    public function detail($project_id) 
    {
    	$this->load->model('Project_model');
    	$this->load->model('Task_model');
    	$this->load->model('User_model');
    	$this->load->model('Client_model');
    	$this->load->model('Comment_model');
    	
    	$type="project";
    	
    	$data['project'] = $this->Project_model->get_projects($project_id);    	
    	
    	$data['task'] = $this->Task_model->get_tasks($project_id,$type);
    	
    	$data['user'] = $this->User_model->get_users();
    	
    	$data['client'] = $this->Client_model->get_clients();
    	
    	$data['comment']= $this->Comment_model->get_comments($project_id,$type); 
    	 	
    	$this->load->view('templates/header');
    	$this->load->view('project/detail_view', $data);  
    	$this->load->view('templates/footer');
    }
}