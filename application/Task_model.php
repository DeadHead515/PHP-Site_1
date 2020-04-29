<?php

class Task_model extends CI_Model
{

    public function get_task($task_id)
    {
        $this->db->where('id', $task_id );
        $query = $this->db->get('tasks');

        return $query->row();
    }

}






?>