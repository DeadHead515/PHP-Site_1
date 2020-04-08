<?php


class User_model extends CI_Model 
{



public function get_users($user_id)
{
    //db->helper method. 

    
    // another way: $this->db->where(['id' => $user_id]) this allows you to pass more parameters. 
    // an example would be $this->db-<where(['id' => $user_id,
    // 'username' => $username])
    // you would pass $username into the function call at the top like you did for $user_id. 
    // you also will need to pass it somewhere in the user controller.
    //UDEMY section 2 episode 15 for explanation.  
    
    $this->db->where('id', $user_id); // where ID = $user_id. 

    $query = $this->db->get('users');

    return $query->result();

    //$query =  $this->db->query("SELECT * FROM users"); // this query is the equivelent of get('users') below. 
    
    //$query = $this->db->get('users');
    // since we passed in database to auto load / libraries we have access to CI's db methods. example above.^
    // we passed in our table we are targeting as the argument. 

    
    //return $query->num_rows(); // this give me the number of rows in our database. 

    //return $query->num_fields(); // this gives me the number of columns. 

    //return $query->result();
    // returns query as an array of objects

}


// public function create_users($data)
// {

//     $this->db->insert('users', $data);

// }


// public function update_users($data, $id)
// {

//     $this->db->where(['id'=> $id]);
//     $this->db->update('users', $data);

// }

// public function delete_users($id)
// {

//     //remember syntax Where([column name => data])
//     $this->db->where(['id'=>$id]);
//     $this->db->delete('users');

// }

public function create_user($data)
{
    

    $insert_data = $this->db->insert('users', $data);
    //$data variable passed from the Users controller more specifically the create_user method. 
    return $insert_data;

}

public function login_user($username, $password)
{

//$this->db->where('username'=> $username, 'passowrd'=> $password);
    $this->db->where('name', $username);
    
    $result = $this->db->get('users');
    // give me everyting in users were the condition above is met. 
    
    $db_password = $result->row(2)->password;
    // password will be in the third colum returned from the db. 
    //if($result->num_rows() == 1) // means we have a user. original way to check for user. 
    if(password_verify($password, $db_password)) // param1 = password submitted through the form, param2 = password returend from the db. This is checking if they match. 
    {

        return $result->row(0)->id;
        // returns the ID of the user if something is found. 
    }
    else
    {

        return false;

    }  

}




}





?>