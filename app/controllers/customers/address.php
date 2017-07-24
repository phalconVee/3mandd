<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('auth_model', 'model_product', 'model_common', 'model_customer'));
    }

    public function index()
    {
        global $data;

        //redirect to homepage If user logged in
        if(empty($_SESSION['w3_user_id'])) {
            redirect('login', 'refresh');
        }

        $data['meta_title']   = "My Address Book";
        $data['navigation']   = "address";
        $data['header']       = '_general/header';
        $data['left_sidebar'] = '_layout/frontend/account_sidebar';
        $data['page_content'] = '_customer/address';
        $data['footer']       = '_general/footer';

        $logged_in = $_SESSION['w3_user_id'];
        $address   = $this->model_customer->check_address($logged_in);
        $data['address_usr_id'] = $address['usr_id'];
        $data['address'] = $address['address'];
        $data['telephone'] = $address['telephone'];
        $data['address_id'] = $address['address_id'];


        $this->load->view('template', $data);

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

        $data['meta_title']   = "Edit address";
        $data['navigation']   = "address";
        $data['header']       = '_general/header';
        $data['left_sidebar'] = '_layout/frontend/account_sidebar';
        $data['page_content'] = '_customer/edit_address';
        $data['footer']       = '_general/footer';

        $data['drop_states']  = $this->model_common->getStates();
        $data['drop_lga']     = $this->model_common->getMyLGA();

        $logged_in = $_SESSION['w3_user_id'];
        $address   = $this->model_customer->check_address($logged_in);
        $data['address_usr_id'] = $address['usr_id'];
        $data['address']        = $address['address'];
        $data['telephone']      = $address['telephone'];
        $data['address_id']     = $address['address_id'];
        $data['firstname']      = $address['firstname'];
        $data['lastname']       = $address['lastname'];

        $post = $this->input->post();

        //check if form has been submitted
        if($post){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('template', $data);
            }
            else {
                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname'  => $this->input->post('lastname'),
                    'telephone' => $this->input->post('telephone'),
                    'address'   => $this->input->post('address'),
                    'state'     => $this->input->post('state'),
                    'lga'       => $this->input->post('lga'),
                );

                $update = $this->model_customer->update(array('address_id' => $this->input->post('address_id')), $data);

                if($update){
                    $this->session->set_userdata('notice', 'Address book successfully updated');
                    redirect('customers/address/edit', 'refresh');

                }else{
                    echo $data['error_msg'] = 'Oops! an error was encountered while updating your records, try again.';
                }
            }
        }

        $this->load->view('template', $data);
    }
}
