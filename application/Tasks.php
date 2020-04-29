<?php

class Tasks extends CI_Controller{

    public function display($task_id)
    {

        $data['task'] = $this->task_model->get_task($task_id);
        $data['main_view'] = "tasks/display";

        $this->load->view('layouts/main', $data);

        // $this->load->view('admin_view');
    
    }

    // public function index()
    // {
    //     echo 'this is the right page';
    // }
    // initial test to hit controller. ^^
}


?>