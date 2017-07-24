<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('admin_auth_model', 'model_common'));
    }

    public function index()
    {
        if(empty($_SESSION['w3_admin_id'])) {
            redirect('admin/', 'refresh');
        }

        $data['meta_title']      = "Dashboard";
        $data['navigation']      = "dashboard";
        $data['top_nav']         = '_layout/backend/top_nav';
        $data['sidebar']         = '_layout/backend/admin_sidebar';
        $data['page_content']    = '_admin/dashboard';
        $data['footer']          = '_general/admin_footer';

        $data['total_users']        = $this->model_common->total_users();
        $data['total_distributors'] = $this->model_common->total_distributors();
        $data['total_products']     = $this->model_common->total_products();
        $data['total_sales']        = $this->model_common->total_sales();

        $this->load->view('admin_template', $data);
    }



}