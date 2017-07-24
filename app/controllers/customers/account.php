<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('auth_model', 'model_product', 'model_common', 'model_customer'));
    }

    public function index()
    {
        global $data;

        //redirect to homepage If user logged in
        if(!empty($_SESSION['w3_user_id'])) {

            $data['meta_title']      = "My Account";
            $data['navigation']      = "account";
            $data['header']          = '_general/header';
            $data['left_sidebar']    = '_layout/frontend/account_sidebar';
            $data['page_content']    = '_customer/dashboard';
            $data['footer']          = '_general/footer';

            $this->load->view('template', $data);

        }else {
            redirect('login', 'refresh');
        }

    }

    public function edit()
    {
        global $data;
        if(empty($_SESSION['w3_user_id'])) {
            redirect('login', 'refresh');
        }

        $notice = $this->session->userdata('notice');
        $this->session->set_userdata('notice', '');

        if(!empty($notice)) {
            $data['notice'] = $notice;
        }

        $data['meta_title']      = "Personal Information";
        $data['navigation']      = "edit";
        $data['header']          = '_general/header';
        $data['left_sidebar']    = '_layout/frontend/account_sidebar';
        $data['page_content']    = '_customer/edit';
        $data['footer']          = '_general/footer';

        $logged_in = $_SESSION['w3_user_id'];
        $data['profile'] = $this->model_customer->get_profile($logged_in);

        $this->load->view('template', $data);
    }

    function update_account()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usr_name', 'Username', 'required|trim');
        $this->form_validation->set_rules('usr_fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('usr_lname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->edit();
        }
        else {
            $data = array(
                'usr_name'  => $this->input->post('usr_name'),
                'usr_fname' => $this->input->post('usr_fname'),
                'usr_lname' => $this->input->post('usr_lname'),
                'gender'    => $this->input->post('gender'),
            );

            $update = $this->model_customer->update_bio(array('usr_id' => $this->input->post('usr_id')), $data);

            if($update){
                $this->session->set_userdata('notice', 'Record successfully updated');
                redirect('customers/account/edit', 'refresh');

            }else{
                echo $data['error_msg'] = 'Oops! an error was encountered while updating your records, try again.';
            }
        }
    }
}