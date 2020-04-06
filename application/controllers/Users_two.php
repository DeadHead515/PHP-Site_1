<?php


class Users extends CI_Controller 
{

// public function show($user_id)
// {
//     //$this->load->model('user_model');
//     //^this is how you manually load the model. we can auto load the model buy adding it to the autoload.php page under config.  

//     //$result = $this->user_model->get_users();

//     $data['result'] = $this->user_model->get_users($user_id);
//     //^ callilng the get_users function from the user_model saving those results in variable $result. 
//     // after making the query in the model the $results variable will now contain an array of objects from the query. 
    
//     //below is how you pass data to views. 
//     $data['welcome'] = 'welcome to the jedit temple...';
//     // ^ for more info => https://codeigniter.com/user_guide/general/views.html?highlight=data
//     $this->load->view('user_view', $data);
    
    
    
    
    
    
    
    /*
    foreach ($result as $object)
    {
        echo $object->name . "<br>";
    }
    */
}

// public function insert()
// {
//     $username = "yoda";
//     $password = "secret";

//     $this->user_model->create_users([
//         'name' => $username,
//         'password' => $password
//     ]); // colum name => input. ^^
// }

// public function update()
// {
//     // need to pass in an id. 
//     $id = 3;
//     $username = "vader";
//     $password = "imperial";

//     $this->user_model->update_users([
//         'name' => $username,
//         'password' => $password
//     ], $id); // colum name => input. ^^
// }

// public function delete()
// {

//     $id = 3;

//     $this->user_model->delete_users($id);

// }





}








?>