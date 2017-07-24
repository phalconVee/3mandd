<?php

class Admin_auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function validate($post_data)
    {
        extract($post_data);
        $this->db->select('admin_id, group_id, store_no, status, email, firstname, lastname');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));

        $query = $this->db->get('admin');

        if ($query->num_rows() > 0) {
            $q = $query->row_array();
            if ($q['status'] == 1) {
                //set session
                $_SESSION['w3_logged_in']      = true;
                $_SESSION['w3_logged_status']  = true;
                $_SESSION['w3_email']          = $q['email'];
                $_SESSION['w3_admin_fname']    = $q['firstname'];
                $_SESSION['w3_admin_lname']    = $q['lastname'];
                $_SESSION['w3_admin_id']       = $q['admin_id'];
                $_SESSION['admin_group']       = $q['group_id'];
                $_SESSION['status']            = $q['status'];
            }
            return $q['group_id'];
        } else {
            return "3";
        }
    }


}