<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Products extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_common', 'model_product'));
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

            $data['meta_title']      = "Administrator | Products";
            $data['navigation']      = "products";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/admin_sidebar';
            $data['page_content']    = '_admin/v_products';
            $data['footer']          = '_general/admin_footer';

            $data['products'] = $this->model_product->all_products();

            $data['drop_categories'] = $this->model_product->get_category_id();
            $data['drop_brands']     = $this->model_product->get_brand_id();
            $data['drop_units']      = $this->model_product->get_unit_id();

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

    public function create()
    {
        if(empty($_SESSION['w3_admin_id'])) {
            redirect('admin/', 'refresh');
        }

        $data['meta_title']      = "Administrator | products";
        $data['navigation']      = "add_products";
        $data['top_nav']         = '_layout/backend/top_nav';
        $data['sidebar']         = '_layout/backend/admin_sidebar';
        $data['page_content']    = '_admin/v_add_products';
        $data['footer']          = '_general/admin_footer';

        $data['drop_categories'] = $this->model_product->get_category_id();
        $data['drop_brands']     = $this->model_product->get_brand_id();
        $data['drop_units']      = $this->model_product->get_unit_id();

        //get admin profile
        $user_details        = $this->model_common->get_mini_admin_details($_SESSION['w3_admin_id'], 'admin_id');
        $data['group']       = $user_details['group_id'];
        $data['firstname']	 = $user_details['firstname'];
        $data['lastname']	 = $user_details['lastname'];

        //$this->load->view('admin_template', $data);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('pro_name','Product Name','required');
        $this->form_validation->set_rules('pro_price','Product Title','required');
        //$this->form_validation->set_rules('pro_stock','Available Stock','required|integer');
        $this->form_validation->set_rules('pro_description','Product Description','required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin_template', $data);
        }else{

            $this->load->library('upload');
            $this->load->library('image_lib');

            $upload_conf = array(
                'upload_path'   => realpath('assets/store/'),
                'allowed_types' => 'png|jpg|jpeg',
                'encrypt_name'  => TRUE,
                'max_size'      => ''
            );

            $this->upload->initialize($upload_conf);

            if ( ! $this->upload->do_upload())
            {
                $data['error'] = array('error' => $this->upload->display_errors());

                $this->load->view('admin_template', $data);
            }else{

                $upload_image = $this->upload->data();

                //set the resize config
                $resize_conf = array(
                    'image_library'  => 'gd2',
                    'source_image'   => $upload_image['full_path'],
                    'quality'        => '100%',
                    'maintain_ratio' => FALSE,
                    'width'          => 268,
                    'height'         => 249,
                    'wm_type'          => 'overlay',
                    'wm_overlay_path'  => './assets/theme/images/brand-icon.png',
                    'wm_opacity'       => 50,
                    'wm_vrt_alignment' => 'middle',
                    'wm_hor_alignment' => 'center'
                );
                //initializing
                $this->image_lib->clear();
                $this->image_lib->initialize($resize_conf);
                $this->image_lib->resize();
                $this->image_lib->watermark();

                $data_products = array
                (
                    'cat_id'            => $this->input->post('cat_id'),
                    'brand_id'          => $this->input->post('brand_id'),
                    'unit_id'           => $this->input->post('unit_id'),
                    'pro_name'			=> $this->input->post('pro_name'),
                    'pro_price'			=> $this->input->post('pro_price'),
                    'pro_image'			=> $upload_image['file_name'],
                    'pro_description'	=> $this->input->post('pro_description')
                );//end array data_products

                $this->model_product->create($data_products);

                $this->session->set_userdata('notice', 'Your product has been added successfully.');
                redirect('admin/admin_products', 'refresh');
            }
        }
    }

    public function pro_edit($id)
    {
        $data = $this->model_product->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update_product()
    {
        $this->_validate();

        $data = array(
            'cat_id'          => $this->input->post('cat_id'),
            'brand_id'        => $this->input->post('brand_id'),
            'unit_id'         => $this->input->post('unit_id'),
            'pro_name'        => $this->input->post('pro_name'),
            'pro_price'       => $this->input->post('pro_price'),
            'pro_description' => $this->input->post('pro_description')
        );

        $this->model_product->update(array('pro_id' => $this->input->post('pro_id'), 'admin_id' => '0'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_product($id)
    {
        $this->model_product->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('cat_id') == '')
        {
            $data['inputerror'][] = 'cat_id';
            $data['error_string'][] = 'Category required';
            $data['status'] = FALSE;
        }

        if($this->input->post('brand_id') == '')
        {
            $data['inputerror'][] = 'brand_id';
            $data['error_string'][] = 'Brand is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('unit_id') == '')
        {
            $data['inputerror'][] = 'unit_id';
            $data['error_string'][] = 'Unit is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('pro_name') == '')
        {
            $data['inputerror'][] = 'pro_name';
            $data['error_string'][] = 'Product Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('pro_price') == '')
        {
            $data['inputerror'][] = 'pro_price';
            $data['error_string'][] = 'Price is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('pro_description') == '')
        {
            $data['inputerror'][] = 'pro_description';
            $data['error_string'][] = 'Description is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}