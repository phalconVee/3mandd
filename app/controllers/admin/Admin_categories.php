<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Categories extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_common', 'model_categories'));
    }

    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {

            $data['meta_title']      = "Administrator | Categories";
            $data['navigation']      = "categories";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/admin_sidebar';
            $data['page_content']    = '_admin/v_categories';
            $data['footer']          = '_general/admin_footer';

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

    public function categories_list()
    {
        $list = $this->model_categories->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $cat) {
            $no++;
            $row   = array();
            $row[] = $cat->cat_id;
            $row[] = $cat->cat_name;
            $row[] = $cat->cat_description;


            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_categories('."'".$cat->cat_id."'".')"><i class="fa fa-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_categories('."'".$cat->cat_id."'".')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->model_categories->count_all(),
            "recordsFiltered" => $this->model_categories->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_categories()
    {
        $this->_validate();
        $data = array(
            'cat_name'        => $this->input->post('cat_name'),
            'cat_description' => $this->input->post('cat_description')
        );
        $insert = $this->model_categories->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function categories_edit($id)
    {
        $data = $this->model_categories->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update_categories()
    {
        $this->_validate();
        $data = array(
            'cat_name'        => $this->input->post('cat_name'),
            'cat_description' => $this->input->post('cat_description')
        );

        $this->model_categories->update(array('cat_id' => $this->input->post('cat_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_categories($id)
    {
        $this->model_categories->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('cat_name') == '')
        {
            $data['inputerror'][] = 'cat_name';
            $data['error_string'][] = 'Category Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('cat_description') == '')
        {
            $data['inputerror'][] = 'cat_description';
            $data['error_string'][] = 'Category Description is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}