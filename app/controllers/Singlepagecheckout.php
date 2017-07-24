<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Singlepagecheckout extends MY_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model(array('auth_model', 'model_product', 'model_common', 'model_customer', 'model_order'));
    }

    public function index()
    {
        global $data;

        $data['meta_title']      = "Checkout";
        $data['navigation']      = "checkout";
        $data['header']          = '_layout/frontend/checkout_header';
        $data['page_content']    = '_general/new_checkout';
        $data['footer']          = '_general/footer';

        $data['drop_states']     = $this->model_common->getStates();
        $data['drop_lga']        = $this->model_common->getMyLGA();

        if(!empty($_SESSION['w3_user_id'])) {

            $usr_id = $_SESSION['w3_user_id'];
            $address_id = $this->model_customer->check_address($usr_id);
            $data['address_usr_id'] = $address_id['usr_id'];
            $data['address'] = $address_id['address'];
            $data['telephone'] = $address_id['telephone'];
            $data['address_id'] = $address_id['address_id'];

            $state_id = $address_id['state'];
            $local_id = $address_id['lga'];

            $id_address = $this->input->get_post('id_address');
            $type = $this->input->get_post('type');

            if (!empty($id_address) && $type == 2) {

                $i = 1;

                if ($this->cart->total() > 0) {

                    $pro_names = '';
                    $pro_units = '';
                    $pro_qty   = '';
                    $qty = '';

                    foreach ($this->cart->contents() as $items) {

                        $qty = $items['qty'];
                        $name = $items['name'];
                        $r_qty = $items['options']['return_qty'];
                        $units = $items['options']['class'];

                        $pro_names .= $name . ",";
                        $pro_units .= $units . ",";
                        $pro_units .= $units . ",";
                        $pro_qty   .= $qty . ",";
                    }
                }

                $pro_names = trim($pro_names, ",");
                $pro_units = trim($pro_units, ",");
                $pro_qty   = trim($pro_qty, ",");

                $data['type'] = $type;
                $data['id_address'] = $id_address;

                $data['pro_qty']   = $pro_qty;
                $data['item_qty']  = $this->total_cart_qty();
                $data['itemname']  = $pro_names;
                $data['get_stock'] = $this->model_product->stock_return($state_id, $local_id, $pro_names);
                $data['unit_type'] = $pro_units;

                $data['total_cart_qty']   = $this->total_cart_qty();
                $data['emptyQty']         = $this->emptyQty();
                $data['emptyReturn']      = $this->emptyReturns();
                $data['emptyValue']       = $this->emptyValue();
                $data['fullValue']        = $this->fullValue();
                $data['totalValue']       = $this->totalValue();
                $data['emptyReturnValue'] = $this->emptyReturnValue();
                $data['balanceToPay']     = $this->balanceToPay();
            }


            if (!empty($id_address) && $type == 3) {

                if ($this->cart->total() > 0) {
                    $data['id_address'] = $id_address;
                    $data['type'] = $type;
                }else{
                    redirect(base_url());
                }
            }
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

            $login_status = $this->auth_model->check_login($this->input->post());

            if($login_status == 1) {

                if( $this->session->userdata('redirect_back') ) {
                    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                    $this->session->unset_userdata('redirect_back');
                    redirect( $redirect_url );
                }

                redirect('singlepagecheckout', 'refresh');

            }else {
                $data['error_msg'] = $this->msg_status($login_status);
                //$this->load->view('template', $data);
            }
        }

        $this->load->view('template', $data);
    }

    public function pay()
    {
        global $data;

        $id_address = $this->input->get_post('id_address');
        $type       = $this->input->get_post('type');

        $item_name      =  $this->input->get_post('item_name');
        $total_cart_qty  = $this->input->get_post('total_cart_qty');
        $empty_qty       = $this->input->get_post('empty_qty');
        $empty_ret_qty   = $this->input->get_post('empty_ret_qty');
        $empty_value     = $this->input->get_post('empty_value');
        $full_value      = $this->input->get_post('full_value');
        $total_value     = $this->input->get_post('total_value');
        $empty_ret_value = $this->input->get_post('empty_ret_value');
        $balance_to_pay  = $this->input->get_post('balance_to_pay');
        $unit_type       = $this->input->get_post('unit_type');
        $pro_qty         = $this->input->get_post('pro_qty');
        $host_service    = $this->input->get_post('host');
        $host_charge     = 0;
        $delivery_date   = $this->input->get_post('date');

        //apply host charge if host service is selected
        if($host_service != ''): $host_charge    = 500; $balance_to_pay = $this->applyHostCharge();
        endif;

        $invoice_no      = "3MD".strtoupper(uniqid());

        $data['id_address'] = $id_address;
        $data['type']       = $type;

        //do host/hostess charge stuff here

        //grab all params and parse to view via json
        echo json_encode(array(
            "status"             => TRUE,
            'address_id'         => $id_address,
            'type'               => $type,
            'item_name'          => $item_name,
            'total_cart_qty'     => $total_cart_qty,
            'empty_qty'          => $empty_qty,
            'empty_ret_qty'      => $empty_ret_qty,
            'empty_value'        => $empty_value,
            'full_value'         => $full_value,
            'total_value'        => $total_value,
            'empty_ret_value'    => $empty_ret_value,
            'balance_to_pay'     => $balance_to_pay,
            'invoice_no'         => $invoice_no,
            'host_service'       => $host_service,
            'host_charge'        => $host_charge,
            'unit_type'          => $unit_type,
            'pro_qty'            => $pro_qty,
            'delivery_date'      => $delivery_date
        ));
    }

    public function signup()
    {
        global $data;

        $data['meta_title']      = "Checkout";
        $data['navigation']      = "checkout";
        $data['header']          = '_layout/frontend/checkout_header';
        $data['page_content']    = '_general/new_checkout';
        $data['footer']          = '_general/footer';

        $data['drop_states']     = $this->model_common->getStates();
        $data['drop_lga']        = $this->model_common->getMyLGA();

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
            $this->load->view('template', $data);
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

                redirect('singlepagecheckout', 'refresh');

            }
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
