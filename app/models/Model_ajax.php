<?php

class Model_ajax extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insert_temp_cart($val)
    {
        $query = $this->db->insert('temp_cart', $val);

        return true;
    }

}