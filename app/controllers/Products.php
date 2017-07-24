<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_product', 'model_common', 'model_customer'));
    }

    function singlepagecheckout()
    {
        global $data;

        $data['meta_title']      = "Checkout";
        $data['navigation']      = "checkout";
        $data['header']          = '_layout/frontend/checkout_header';
        $data['page_content']    = 'new_checkout';
        $data['footer']          = '_general/footer';

        $data['drop_states'] = $this->model_common->getStates(); //load states via ajax
        $data['drop_lga']    = $this->model_common->getMyLGA(); //load lga via ajax

        $notice = $this->session->userdata('notice');
        $this->session->set_userdata('notice', '');

        //if(!empty($_SESSION['w3_user_id'])) {

            $usr_id                 = $_SESSION['w3_user_id'];
            $address_id             = $this->model_customer->check_address($usr_id);
            $data['address_usr_id'] = $address_id['usr_id'];
            $data['address']        = $address_id['address'];
            $data['telephone']      = $address_id['telephone'];
            $data['address_id']     = $address_id['address_id'];
        //}

        if(!empty($_SESSION['w3_user_id']) && !empty($_POST['id_address']) && ($_POST['type'] == 2)){
            $data['id_address'] = $_POST['id_address'];
            $data['type']       = $_POST['type'];
        }

        if(!empty($notice)) {
            $data['notice'] = $notice;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('usr_email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('usr_password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template', $data);
        }
        else {

            $this->load->library('user_agent');
            $this->session->set_userdata('redirect_back', $this->agent->referrer() );

            $this->load->model('auth_model');
            $login_status = $this->auth_model->check_login($this->input->post());

            if($login_status == 1) {

                if( $this->session->userdata('redirect_back') ) {
                    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                    $this->session->unset_userdata('redirect_back');
                    redirect( $redirect_url );
                }

                redirect('customers/singlepagecheckout', 'refresh');

            }else {
                $data['error_msg'] = $this->msg_status($login_status);
                $this->load->view('template', $data);
            }
        }
    }

    public function pro_details()
    {
        global $data;

        $pro_id   = $this->input->get_post('pro_id');
        $pro_name = $this->input->get_post('pro_name');

        $data['web_id'] = $this->input->get_post('source');

        $data['meta_title']      = $pro_name;
        $data['navigation']      = "product_details";
        $data['header']          = '_general/header';
        $data['left_sidebar']    = '_layout/frontend/left_sidebar';
        $data['page_content']    = '_general/product_details';
        $data['footer']          = '_general/footer';

        $data['get_details'] = $this->model_product->pro_details($pro_id);

        $this->load->view('template', $data);
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
