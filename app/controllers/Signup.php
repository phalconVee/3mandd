<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('auth_model', 'model_common', 'model_customer'));
    }

    public function index()
    {

    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror']   = array();
        $data['status']       = TRUE;

        if($this->input->post('firstname') == '')
        {
            $data['inputerror'][]   = 'firstname';
            $data['error_string'][] = 'First name is required';
            $data['status']         = FALSE;
        }

        if($this->input->post('lastname') == '')
        {
            $data['inputerror'][]   = 'lastname';
            $data['error_string'][] = 'Last name is required';
            $data['status']         = FALSE;
        }

        if($this->input->post('telephone') == '')
        {
            $data['inputerror'][]   = 'telephone';
            $data['error_string'][] = 'Telephone number is required';
            $data['status']         = FALSE;
        }

        if($this->input->post('state') == '')
        {
            $data['inputerror'][] = 'state';
            $data['error_string'][] = 'Please select your state of residence';
            $data['status'] = FALSE;
        }

        if($this->input->post('lga') == '')
        {
            $data['inputerror'][] = 'lga';
            $data['error_string'][] = 'Please select your LGA';
            $data['status'] = FALSE;
        }

        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }



    function msg_status($status)
    {
        if($status == 0)
        {
            $msg = "Account has not been activated. Please check your email";
        } else if($status == 2) {
            $msg = "Account has been banned. Please contact administrator";
        } else {
            $msg = "Invalid Email and/or Password Details";
        }
        return $msg;
    }
}
