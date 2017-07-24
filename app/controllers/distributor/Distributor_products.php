<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor_Products extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_common', 'dist_model_product', 'model_product'));
    }

    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {

            $notice = $this->session->userdata('notice');
            $this->session->set_userdata('notice', '');

            if(!empty($notice)) {
                $data['notice'] = $notice;
            }

            $data['total_unread_msgs'] = $this->model_common->total_unread_msgs();
            $data['meta_title']      = "My Warehouse";
            $data['navigation']      = "my_store";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/distributor_sidebar';
            $data['page_content']    = '_distributor/store';
            $data['footer']          = '_general/admin_footer';

            $data['products'] = $this->dist_model_product->all_products($_SESSION['w3_admin_id']);

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

    public function update()
    {
        if(empty($_SESSION['w3_admin_id'])) {
            redirect('admin/', 'refresh');
        }
        $data['total_unread_msgs'] = $this->model_common->total_unread_msgs();
        $data['meta_title']      = "Distributor | Stock Update";
        $data['navigation']      = "update_stock";
        $data['top_nav']         = '_layout/backend/top_nav';
        $data['sidebar']         = '_layout/backend/distributor_sidebar';
        $data['page_content']    = '_distributor/update_stock';
        $data['footer']          = '_general/admin_footer';

        //get admin profile
        $user_details        = $this->model_common->get_mini_admin_details($_SESSION['w3_admin_id'], 'admin_id');
        $data['group']       = $user_details['group_id'];
        $data['firstname']	 = $user_details['firstname'];
        $data['lastname']	 = $user_details['lastname'];
        $data['state_id']	 = $user_details['state_id'];
        $data['local_id']	 = $user_details['local_id'];


        $pro_id   = $this->input->get_post('pro_id');
        $pro_name = $this->input->get_post('pro_name');

        $data['products'] = $this->dist_model_product->get_pro_id($pro_id);
        $data['stock']    = $this->dist_model_product->admin_store_stock($_SESSION['w3_admin_id'], $pro_name);

        $data['drop_categories'] = $this->model_product->get_category_id();
        $data['drop_brands']     = $this->model_product->get_brand_id();
        $data['drop_units']      = $this->model_product->get_unit_id();



        $this->load->library('form_validation');
        $this->form_validation->set_rules('pro_stock','Available Stock','required|integer');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin_template', $data);
        }else
        {
          $data_products = array(
                    'cat_id'            => $this->input->post('cat_id'),
                    'brand_id'          => $this->input->post('brand_id'),
                    'admin_id'          => $this->input->post('admin_id'),
                    'state_id'          => $this->input->post('state_id'),
                    'local_id'          => $this->input->post('local_id'),
                    'unit_id'           => $this->input->post('unit_id'),
                    'pro_name'			=> $this->input->post('pro_name'),
                    'pro_price'			=> $this->input->post('pro_price'),
                    'pro_stock'			=> $this->input->post('pro_stock'),
                    'pro_image'			=> $this->input->post('pro_image'),
                    'pro_description'	=> $this->input->post('pro_description')
                );

          $this->dist_model_product->update_stock($_SESSION['w3_admin_id'], $pro_name, $data_products);

          $this->session->set_userdata('notice', 'Your stock has been updated successfully.');
          redirect('distributor/distributor_products', 'refresh');
        }
    }



}