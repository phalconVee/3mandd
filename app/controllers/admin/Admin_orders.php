<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_orders extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_common', 'model_orders'));
    }

    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {

            $data['meta_title']      = "Administrator | Orders";
            $data['navigation']      = "orders";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/admin_sidebar';
            $data['page_content']    = '_admin/v_orders';
            $data['footer']          = '_general/admin_footer';

            $data['orders'] = $this->model_orders->all_orders();

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

    public function order_details()
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {

            $data['meta_title']      = "Administrator | Order Detail";
            $data['navigation']      = "order details";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/admin_sidebar';
            $data['page_content']    = '_admin/v_order_detail';
            $data['footer']          = '_general/admin_footer';

            $order_id  = $this->input->get_post('order_id');
            $item_name = $this->input->get_post('item_name');

            $data['order_details'] = $this->model_orders->show_order_detail($order_id);
            $customer_address      = $this->model_orders->get_customer_address($order_id);
            $data['address']       = $customer_address['address'];
            $data['telephone']     = $customer_address['telephone'];

            $customer_id           = $customer_address['usr_id'];

            $state_id = $customer_address['state'];
            $local_id = $customer_address['lga'];

            $data['customer_state'] = $this->model_orders->get_customer_state($state_id);
            $data['customer_lga']   = $this->model_orders->get_customer_lga($local_id);
            $data['customer_id']    = $this->model_orders->get_customer_id($customer_id);

            $data['matching_dist']  = $this->model_orders->get_matching_dist($state_id, $local_id, $item_name);

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

    public function send_request()
    {
        global $data;
        if(!empty($_SESSION['w3_admin_id']) && !empty($_POST['from']) && !empty($_POST['to']) && ($_POST['type'] != '' && $_POST['divid'] != ''))
        {
            $from  = $_POST['from'];   // admin that sent the message id
            $to    = $_POST['to'];    // recipient distributor
            $divid = $_POST['divid']; //order id
            $read  = $_POST['read']; //order id

            if($_POST['type'] == 0)
            {
                echo $this->model_orders->add_order_request($_POST);
            } else {
                $this->model_orders->decline($_POST);
                echo '<div id="send_request'.$to.'" style="display:inline-block"><a class="btn btn-sm btn-warning" href="javascript:;" onclick="send_request('.$from.', '.$to.', 0, '.$divid.', 0);">Send order request </a></div>';
            }
        }
    }

}
