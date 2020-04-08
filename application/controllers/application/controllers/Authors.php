<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->model('authors_model');
        $this->load->library("pagination");
    }

    public function index() {
        $config = array();
        $config["base_url"] = site_url("authors"); //. "authors";
        $config["total_rows"] = $this->authors_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        //$page, checks if the skip number has been set in the second segment of the URI and if its not set then the value 0 is assigned to the variable $page
        $data["links"] = $this->pagination->create_links();

        $data['authors'] = $this->authors_model->get_authors($config["per_page"], $page);

        $this->load->view('authors/index', $data);
        

        // you have to figure out how to pass in your index.php file. this isn't working becuase it's missing my index.php when it links. 
        // Made a change to Base_URL to resolve this issue. 
    }
}