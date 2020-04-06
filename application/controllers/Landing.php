<?php


class Landing extends CI_Controller
{

    public function index()
	{
        $this->load->view('header');
        $this->load->view('landing_view');
        $this->load->view('footer');
	}

}










?>