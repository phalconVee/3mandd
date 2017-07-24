<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Warehouse extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        global $data;
        $this->load->library('pagination');
        $this->load->model(array('admin_auth_model', 'model_common'));

    }

    public function index()
    {
        if(empty($_SESSION['w3_admin_id'])) {
            redirect('admin/', 'refresh');
        }

        $data['total_unread_msgs'] = $this->model_common->total_unread_msgs();
        $data['meta_title']      = "Distributor | Dashboard";
        $data['navigation']      = "dashboard";
        $data['top_nav']         = '_layout/backend/top_nav';
        $data['sidebar']         = '_layout/backend/distributor_sidebar';
        $data['page_content']    = '_distributor/dashboard';
        $data['footer']          = '_general/admin_footer';

        $this->load->view('admin_template', $data);

    }


}