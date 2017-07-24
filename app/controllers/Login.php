<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('auth_model','model_product', 'model_common', 'model_customer'));
    }

    public function myAccount()
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
            redirect('customers/account/', 'refresh');
        }

    }

    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_user_id'])) {
            redirect('customers/account', 'refresh');
        }

        $data['meta_title'] = 'Login | Create Account';
        $data['menu']       = '_general/header';
        $data['footer']     = '_general/footer';

        $notice = $this->session->userdata('notice');
        $this->session->set_userdata('notice', '');

        if(!empty($notice)) {
            $data['notice'] = $notice;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('usr_password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('_general/login', $data);
        }
        else {

            $this->load->library('user_agent');
            $this->session->set_userdata('redirect_back', $this->agent->referrer() );

            $login_status = $this->auth_model->check_login($this->input->post());

            if($login_status == 1) {

                if( $this->session->userdata('redirect_back') ) {
                    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                    $this->session->unset_userdata('redirect_back');
                    redirect( $redirect_url );
                }

                redirect('customers/account/', 'refresh');

            }else {
                $data['error_msg'] = $this->msg_status($login_status);
                $this->load->view('_general/login', $data);
            }
        }
    }

    public function signup()
    {
        global $data;

        if(!empty($_SESSION['w3_user_id'])) {
            redirect('customers/account', 'refresh');
        }

        $data['meta_title'] = 'Login | Create Account';
        $data['menu']       = '_general/header';
        $data['footer']     = '_general/footer';

        $notice = $this->session->userdata('notice');
        $this->session->set_userdata('notice', '');

        if(!empty($notice)) {
            $data['notice'] = $notice;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('u_name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('u_email', 'Email', 'required|trim|valid_email|is_unique[users.usr_email]');
        $this->form_validation->set_rules('u_password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('_general/login', $data);
        }
        else {

            $this->load->library('user_agent');
            $this->session->set_userdata('redirect_back', $this->agent->referrer() );

            $this->load->helper('string');
            $activation_code = random_string('unique');

            $reg_status = $this->auth_model->create_account($this->input->post(), $activation_code);

            $uid = $reg_status['uid'];

            if($reg_status) {

                $logon = $this->auth_model->quick_login($uid);

                if( $this->session->userdata('redirect_back') ) {
                    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                    $this->session->unset_userdata('redirect_back');
                    redirect( $redirect_url );
                }

                redirect('customers/account/', 'refresh');

            }
        }
    }

    public function ajax_add_address_book()
    {
        $this->_validate();
        $data = array(
            'usr_id'     => $this->input->post('usr_id'),
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'telephone'  => $this->input->post('telephone'),
            'state'      => $this->input->post('state'),
            'lga'        => $this->input->post('lga'),
            'address'    => $this->input->post('address')
        );
        $insert = $this->model_customer->save($data);

        //$id = $insert->id;

        echo json_encode(array("status" => TRUE, 'address_id' => $insert));
    }

    public function edit_address($id)
    {
        $data = $this->model_customer->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update_address_book()
    {
        $this->_validate();
        $data = array(
            //'usr_id'     => $this->input->post('usr_id'),
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'telephone'  => $this->input->post('telephone'),
            'state'      => $this->input->post('state'),
            'lga'        => $this->input->post('lga'),
            'address'    => $this->input->post('address')
        );

        $address_id =  $this->input->post('address_id');

        $this->model_customer->update(array('address_id' => $this->input->post('address_id')), $data);

        echo json_encode(array("status" => TRUE, 'id' => $address_id));
    }

    public function ajax_delete_address_book($id)
    {
        $this->model_customer->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
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

    public function logout()
    {
        session_destroy();
        redirect('', 'refresh');
    }


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */