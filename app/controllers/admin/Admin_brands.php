<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Brands extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_common', 'model_brands'));
    }

    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {

            $data['meta_title']      = "Administrator | Brands";
            $data['navigation']      = "brands";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/admin_sidebar';
            $data['page_content']    = '_admin/v_brands';
            $data['footer']          = '_general/admin_footer';

            $data['drop_categories'] = $this->model_brands->get_category_id();

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

    public function brands_list()
    {
        $list = $this->model_brands->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $brand) {
            $no++;
            $row   = array();
            $row[] = $brand->brand_id;
            $row[] = $brand->cat_id;
            $row[] = $brand->brand_name;
            $row[] = $brand->brand_description;


            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_brands('."'".$brand->brand_id."'".')"><i class="fa fa-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_brands('."'".$brand->brand_id."'".')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->model_brands->count_all(),
            "recordsFiltered" => $this->model_brands->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_brands()
    {
        $this->_validate();
        $data = array(
            'cat_id'            => $this->input->post('cat_id'),
            'brand_name'        => $this->input->post('brand_name'),
            'brand_description' => $this->input->post('brand_description')
        );
        $insert = $this->model_brands->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function brands_edit($id)
    {
        $data = $this->model_brands->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update_brands()
    {
        $this->_validate();
        $data = array(
            'cat_id'            => $this->input->post('cat_id'),
            'brand_name'        => $this->input->post('brand_name'),
            'brand_description' => $this->input->post('brand_description')
        );

        $this->model_brands->update(array('brand_id' => $this->input->post('brand_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_brands($id)
    {
        $this->model_brands->delete_by_id($id);
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
            $data['error_string'][] = 'Category is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('brand_name') == '')
        {
            $data['inputerror'][] = 'brand_name';
            $data['error_string'][] = 'Brand Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('brand_description') == '')
        {
            $data['inputerror'][] = 'brand_description';
            $data['error_string'][] = 'Brand Description is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}