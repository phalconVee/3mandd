<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_common', 'model_customer'));
    }

    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {

            $data['meta_title']      = "Administrator | Customers";
            $data['navigation']      = "customers";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/admin_sidebar';
            $data['page_content']    = '_admin/v_customer';
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

    public function customer_list()
    {
        $list = $this->model_customer->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customer) {
            $no++;
            $row   = array();
            $row[] = $customer->usr_group;
            $row[] = $customer->usr_fname;
            $row[] = $customer->usr_lname;
            $row[] = $customer->usr_email;
            $row[] = $customer->usr_phone;
            $row[] = $customer->gender;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_customer('."'".$customer->usr_id."'".')"><i class="fa fa-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_customer('."'".$customer->usr_id."'".')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->model_customer->count_all(),
            "recordsFiltered" => $this->model_customer->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_customer()
    {
        $this->_validate();
        $data = array(
            'usr_fname'    => $this->input->post('usr_fname'),
            'usr_lname'    => $this->input->post('usr_lname'),
            'usr_name'     => $this->input->post('usr_name'),
            'usr_email'    => $this->input->post('usr_email'),
            'usr_password' => md5($this->input->post('usr_password')),
            'usr_phone'    => $this->input->post('usr_phone'),
            'usr_group'    => $this->input->post('usr_group'),
            'gender'       => $this->input->post('gender')
        );
        $insert = $this->model_customer->save_user($data);
        echo json_encode(array("status" => TRUE));
    }

    public function customer_edit($id)
    {
        $data = $this->model_customer->get_user_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update_customer()
    {
        $this->_validate();

        $data = array(
            'usr_fname'    => $this->input->post('usr_fname'),
            'usr_lname'    => $this->input->post('usr_lname'),
            'usr_name'     => $this->input->post('usr_name'),
            'usr_email'    => $this->input->post('usr_email'),
            'usr_password' => md5($this->input->post('usr_password')),
            'usr_phone'    => $this->input->post('usr_phone'),
            'usr_group'    => $this->input->post('usr_group'),
            'gender'       => $this->input->post('gender')
        );
        $this->model_customer->update_user(array('usr_id' => $this->input->post('usr_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_customer($id)
    {
        $this->model_customer->delete_user_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('usr_fname') == '')
        {
            $data['inputerror'][] = 'usr_fname';
            $data['error_string'][] = 'First Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('usr_lname') == '')
        {
            $data['inputerror'][] = 'usr_lname';
            $data['error_string'][] = 'Last Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('usr_name') == '')
        {
            $data['inputerror'][] = 'usr_name';
            $data['error_string'][] = 'Username is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('usr_email') == '')
        {
            $data['inputerror'][] = 'usr_email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('usr_password') == '')
        {
            $data['inputerror'][] = 'usr_password';
            $data['error_string'][] = 'Password is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('usr_phone') == '')
        {
            $data['inputerror'][] = 'usr_phone';
            $data['error_string'][] = 'Telephone is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('usr_group') == '')
        {
            $data['inputerror'][] = 'usr_group';
            $data['error_string'][] = 'Please select customers group';
            $data['status'] = FALSE;
        }

        if($this->input->post('gender') == '')
        {
            $data['inputerror'][] = 'gender';
            $data['error_string'][] = 'Please select gender';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}