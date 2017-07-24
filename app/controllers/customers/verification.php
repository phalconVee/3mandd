<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('model_common', 'model_customer', 'model_order'));
    }


    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_user_id'])) {

            $data['meta_title']    = "My Orders";
            $data['navigation']    = "orders";
            $data['header']        = '_general/header';
            $data['left_sidebar']  = '_layout/frontend/account_sidebar';
            $data['page_content']  = '_customer/orders';
            $data['footer']        = '_customer/foot_nav';

            $data['orders'] = $this->model_order->my_orders();

            $this->load->view('template', $data);

        }else {
            redirect('login', 'refresh');
        }
    }


}
