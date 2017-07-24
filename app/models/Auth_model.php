<?php

class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function create_account($r_data, $activation_code)
    {
        extract($r_data);
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = date('Y-m-d');
        $group = '4';

        $data = array(
            'usr_name'        => $this->db->escape_str($u_name),
            'usr_email'       => $this->db->escape_str($u_email),
            'usr_password'    => $this->db->escape_str(md5($u_password)),
            'usr_group'       => $group,
            'date'            => $time,
            'ip'              => $ip,
            'online'          => time(),
            'activation_code' => $activation_code
        );

        $query = $this->db->insert('users', $data);
        $user_ins_id = $this->db->insert_id();

        $arr = array();
        $arr['uid']   = $user_ins_id;
        $arr['pass']  = $u_password;
        $arr['email'] = $u_email;

        return $arr;
    }

    function check_login($post_data)
    {
        extract($post_data);
        $this->db->select('usr_id, usr_name, usr_fname, usr_email, usr_password, usr_lname, stuts, usr_phone, usr_group');
        $this->db->where('usr_email', $usr_email);
        $this->db->where('usr_password', md5($usr_password)); //password is encrypted with md5-hash

        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            $q = $query->row_array();
            if($q['stuts'] == 1) {
                //set session
                $_SESSION['w3_logged_in']     = true;
                $_SESSION['w3_logged_status'] = true;
                $_SESSION['w3_uname']         = $q['usr_name'];
                $_SESSION['w3_email']         = $q['usr_email'];
                $_SESSION['w3_fname']         = $q['usr_fname'];
                $_SESSION['w3_lname']         = $q['usr_lname'];
                $_SESSION['w3_user_id']       = $q['usr_id'];
                $_SESSION['usr_group']        = $q['usr_group'];
                $_SESSION['usr_phone']        = $q['usr_phone'];
                $_SESSION['status']           = $q['stuts'];
            }
            return $q['stuts'];
        }
        else
        {
            return "3";
        }
    }

    function quick_login($id)
    {
        $this->db->select('usr_id, usr_name, usr_fname, usr_email, usr_password, usr_lname, stuts, usr_phone, usr_group');
        $this->db->where('usr_id', $id);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            $q = $query->row_array();
            //set session
            $_SESSION['w3_logged_in']     = true;
            $_SESSION['w3_logged_status'] = true;
            $_SESSION['w3_uname']         = $q['usr_name'];
            $_SESSION['w3_email']         = $q['usr_email'];
            $_SESSION['w3_fname']         = $q['usr_fname'];
            $_SESSION['w3_lname']         = $q['usr_lname'];
            $_SESSION['w3_user_id']       = $q['usr_id'];
            $_SESSION['usr_group']        = $q['usr_group'];
            $_SESSION['usr_phone']        = $q['usr_phone'];
            $_SESSION['status']           = $q['stuts'];

            return true;
        } else {
            return false;
        }
    }

}