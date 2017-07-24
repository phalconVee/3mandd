<?php

class Model_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function create_admin($data)
    {
        $this->db->insert('admin', $data);
        return $this->db->insert_id();
    }



}