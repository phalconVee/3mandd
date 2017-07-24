<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('model_common', 'model_orders', 'model_messages'));
    }

    public function index()
    {
        global $data;
        if(!empty($_SESSION['w3_admin_id'])) {

            $data['meta_title']    = "Distributor | Orders";
            $data['navigation']    = "orders_request";
            $data['top_nav']       = '_layout/backend/top_nav';
            $data['sidebar']       = '_layout/backend/distributor_sidebar';
            $data['page_content']  = '_distributor/request_orders';
            $data['footer']        = '_general/admin_footer';

            $data['orders'] = $this->model_messages->get_all_my_orders();

            //get admin profile
            $user_details        = $this->model_common->get_mini_admin_details($_SESSION['w3_admin_id'], 'admin_id');
            $data['group']       = $user_details['group_id'];
            $data['firstname']	 = $user_details['firstname'];
            $data['lastname']	 = $user_details['lastname'];

            $this->load->view('admin_template', $data);

        }else {
            redirect('admin/', 'refresh');
        }
    }

    public function u($order_id)
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {

            $data['total_unread_msgs'] = $this->model_common->total_unread_msgs();
            $data['meta_title']      = "Distributor | Order request details";
            $data['navigation']      = "order_request";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/distributor_sidebar';
            $data['page_content']    = '_distributor/message';
            $data['footer']          = '_general/admin_footer';

            $data['message']   = $this->model_messages->get_order_message($order_id);

            $customer_address        = $this->model_orders->get_customer_address($order_id);
            $data['address']         = $customer_address['address'];
            $data['telephone']       = $customer_address['telephone'];

            $customer_id = $customer_address['usr_id'];
            $state_id = $customer_address['state'];
            $local_id = $customer_address['lga'];

            $data['customer_state'] = $this->model_orders->get_customer_state($state_id);
            $data['customer_lga']   = $this->model_orders->get_customer_lga($local_id);
            $data['customer_id']    = $this->model_orders->get_customer_id($customer_id);

            //get admin profile
            $user_details        = $this->model_common->get_mini_admin_details($_SESSION['w3_admin_id'], 'admin_id');
            $data['group']       = $user_details['group_id'];
            $data['firstname']	 = $user_details['firstname'];
            $data['lastname']	 = $user_details['lastname'];

            $this->load->view('admin_template', $data);

        }else {
            redirect('admin/', 'refresh');
        }
    }
}
