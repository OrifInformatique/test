<?php

class Projects extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('Author_model');
		$this->load->model('Client_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}
	
	public function form($id = 0)
	{
		if($id === 0)
		{
			$header['title'] = 'Ajouter un projet';
		}
		else
		{
			$data['project'] = $this->Project_model->get_projects($id);
			
			foreach ($data['project'] as $projet)
			{
				$header['title'] = 'Modifier "' . $projet->name . '"';
			}
		}
		
		$data['author'] = $this->Author_model->get_authors();
		$data['client'] = $this->Client_model->get_clients();
		$data['status'] = $this->Project_model->get_statuses();
		
		$header['description'] = "Page permettant de modifier ou d'ajouter un projet";
		$header['keywords']    = 'CodeIgniter, CRUD';
		$header['refresh']     = FALSE;
		
		//Render the requested view
		$this->load->view('templates/header', $header);
		$this->load->view('project/form_view', $data);
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
    //$id=$_POST['id'];
    	
    	$this->Project_model->del_project($id);
    	
     	redirect(base_url());
    }
   /*
    public function addmanager() 
    {

    	
    	$author_id=0;
    	$project_id=0;
    	
    	$this->Project_model->add_manager($author_id,$project_id);
    	
    	redirect(base_url("Project/Detail/".$project_id));
    }

    public function delmanager()
    {
    	
    	$author_id=0;
        $project_id=0;
        
    	$this->Project_model->del_manager($author_id,$project_id);
    	 
    	redirect(base_url("Project/Detail/".$project_id));
    }*/
    
    public function view() 
    {
    	$data['project'] = $this->Project_model->get_projects();
    	
		$header['description'] = 'Liste de projets';
		$header['title']       = 'Liste des projets';
		$header['keywords']    = 'CodeIgniter, CRUD';
		$header['refresh']     = FALSE;
		
    	$this->load->view('templates/header', $header);
    	$this->load->view('project/list_view', $data);
    	$this->load->view('templates/footer');
    }
    /*
    public function detail($project_id) 
    {
    	$this->load->model('Project_model');
    	$this->load->model('Task_model');
    	$this->load->model('author_model');
    	$this->load->model('Client_model');
    	$this->load->model('Comment_model');
    	
    	$type="project";
    	
    	$data['project'] = $this->Project_model->get_projects($project_id);    	
    	
    	$data['task'] = $this->Task_model->get_tasks($project_id,$type);
    	
    	$data['author'] = $this->author_model->get_authors();
    	
    	$data['client'] = $this->Client_model->get_clients();
    	
    	$data['comment']= $this->Comment_model->get_comments($project_id,$type); 
    	 	
    	$this->load->view('templates/header');
    	$this->load->view('project/detail_view', $data);  
    	$this->load->view('templates/footer');
    }*/
}
