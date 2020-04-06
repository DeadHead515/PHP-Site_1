<?php
// you moved the original users controller file to User_two. if you want to switch pack for testing you will need to update names again. 

class Users extends CI_Controller 
{
    
    public function register()
    {
       

        // set_rules(value = attribute, value = human readable, rules)
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
        
        if($this->form_validation->run()== FALSE)
        {
            $data = array(
                'errors' => validation_errors()
            );

            $this->session->set_flashdata($data); 
            //this set_flashdata will set and unset our session.  find more https://codeigniter.com/user_guide/libraries/sessions.html?highlight=set%20flashdata#flashdata          
            $data['main_view'] = 'users/register_view';
            $this->load->view('layouts/main', $data);
            // could this be why my flash data shows up on the log in form section of the home_view? 

        } else 
        {

            // $data = array(
            //     $first_name = $this->input->post('first_name'),
            //     $last_name = $this->input->post('last_name'),
            //     $email = $this->input->post('email'),
            //     $username = $this->input->post('username'),
            //     $password = $this->input->post('password')
            //    );
            
            $option = ['cost'=> 12]; //something to do with number of times it encrypts your password. 
            //also the amount of times between try? ^^ look it up. 
            $encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $option);

               $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'name' => $this->input->post('username'),
                'password' => $encripted_pass
               );
               //attempting to pass this data array to the User_model. 
               //This array will be used to create the user in the users table in our data base.

            if($this->user_model->create_user($data))
            {
                $this->session->set_flashdata('user_registered', "User has been registered. ");
                //session data. param1 => flash_data name, param2 => message you want displayed. 
                redirect('home/index');
            
            }
            else
            {

                

            }
           // echo var_dump($_POST);
            
           

            //echo "this is being dumped from data array " . var_dump($data);
        }
        /*
        $data['main_view'] = 'users/register_view';
        $this->load->view('layouts/main', $data);
        */
    }




    public function login()
    {

        // echo $_POST['username'];
        // echo "\n";
        // echo $_POST['password'];

        //echo $this->input->post('username');
        // using the name attribute value^
        // to look at more information in the documentation. look up form validation. 
     
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

        if($this->form_validation->run()== FALSE)
        {
            $data = array(
                'errors' => validation_errors()
            );

            $this->session->set_flashdata($data); 
            //this set_flashdata will set and unset our session.  find more https://codeigniter.com/user_guide/libraries/sessions.html?highlight=set%20flashdata#flashdata          
            redirect('home');
            // redirecting to the home view. find more https://codeigniter.com/user_guide/helpers/url_helper.html?highlight=redirect#redirect
        } else 
        {

            $username = $this->input->post('username');
            $password = $this->input->post('password');


            $user_id = $this->user_model->login_user($username, $password); //if the login_user method does not return data then $user_id will be false.
            // therefore your if statement below will not run. 

                if($user_id)
                {
                   $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true 

                   ); 
                    
                   $this->session->set_userdata($user_data);
                   
                   $this->session->set_flashdata('login_success', 'You are now logged in.');
                   
                //    $data['main_view'] = "admin_view";

                //     $this->load->view('layouts/main', $data);
                   
                    redirect('home/index'); //commented out so we could redirect to an admin view instead. 
                }
                    else
                    {

                        $this->session->set_flashdata('login_failed', 'Sorry you are not logged in.');
                        redirect('home/index');
                    
                    }

        }
    
    }

public function logout()
{
    
    $this->session->sess_destroy();
    redirect('home/index');
}





}








?>