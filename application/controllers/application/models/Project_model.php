<?php


class Project_model extends CI_Model//don't forget to add your model to the autoloader file, all lowercase!!!!
{

    public function get_project($id)
    {
        // where statement needs to be on top. 
        $this->db->where('id', $id );
        $query = $this->db->get('projects');
        
        

        return $query->row();

    }
    public function get_all_projects($user_id)
    {

        $this->db->where('project_user_id', $user_id);
        $query = $this->db->get('projects');
        return $query->result();
    }


    public function get_projects()
    {

        $query = $this->db->get('projects');//this query calls the projects table in our db and pulls all the data returned. we then return that data. 
        return $query->result();

    }

    public function create_project($data)
    {

        $insert_data = $this->db->insert('projects', $data);
        return $insert_data;

    }

    public function edit_project($project_id, $data)
    {

        $this->db->where('id', $project_id);
        $this->db->update('projects', $data);
        return true;

    }

    public function delete_project($project_id)
    {

        $this->db->where('id', $project_id);
        $this->db->delete('projects');
        

    }

    public function get_project_info($project_id)
    {

        $this->db->where('id', $project_id);
        $get_data = $this->db->get('projects');

        return $get_data->row();

    }

    

}




?>