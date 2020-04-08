<?php


class Projects extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
    // checking if a user is loged in by checking the status of their logged in session. 
    //Users.php / login method for more information on the sessions. 
        if(!$this->session->userdata('logged_in'))
        {

            $this->session->set_flashdata('no_access','Sorry you are not allowed or not logged in.');
            redirect('home/index');

        }
    }
    
    public function index()
	{
       // we query the project_model for our project information then pass that to the front end in the data array.  
       $data['projects'] = $this->project_model->get_projects();
        
       $data['main_view'] = "projects/index";

       $this->load->view('layouts/main', $data); 
        
        
        
    }
    
    public function display($project_id)
    {
        $data['project_data'] = $this->project_model->get_project($project_id);
        $data['main_view'] = "projects/display";

       $this->load->view('layouts/main', $data);

    }

    public function create()
    {
       //setting validation for our form that wil be collecting the new project data. 
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
        $this->form_validation->set_rules('project_body', 'Project Description', 'trim|required');

        // checking to make sure there are no errors in our form validation. 
        if($this->form_validation->run() == FALSE)
        {
            $data['main_view'] = 'projects/create_project';
            $this->load->view('layouts/main', $data);
        }
        else
        {

            $data = array(

                'project_user_id'=>$this->session->userdata('user_id'), // how we identify users_id.  
                'project_name'=>$this->input->post('project_name'),
                'project_body'=>$this->input->post('project_body')

            );

            if($this->project_model->create_project($data))
            {

                $this->session->set_flashdata('project_created', "Your Project has been created. ");
                redirect('projects/index');

            }
            else
            {
                echo log_message('info', 'There was an issue with creating the project.');
            }
      

        }

    }
    
    public function edit($project_id)
    {
       //setting validation for our form that wil be collecting the new project data. 
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
        $this->form_validation->set_rules('project_body', 'Project Description', 'trim|required');

        // checking to make sure there are no errors in our form validation. 
        if($this->form_validation->run() == FALSE)
        {
            
            $data['project_data'] = $this->project_model->get_project_info($project_id);    
            
            $data['main_view'] = 'projects/edit_project';
            $this->load->view('layouts/main', $data);
        
        }
        else
        {

            $data = array(

                'project_user_id'=>$this->session->userdata('user_id'), // how we will identify users_id.  
                'project_name'=>$this->input->post('project_name'),
                'project_body'=>$this->input->post('project_body')

            );

            if($this->project_model->edit_project($project_id, $data))
            {

                $this->session->set_flashdata('project_updated', "Your Project has been updated. ");
                redirect('projects/index');

            }
            else
            {
                echo log_message('info', 'There was an issue editing the project.');
            }
      

        }

    }

    public function delete($project_id)
    {

        $this->project_model->delete_project($project_id);

        $this->session->set_flashdata('project_deleted', "Your Project has been deleted. ");
        redirect('projects/index');


    }









}
?>