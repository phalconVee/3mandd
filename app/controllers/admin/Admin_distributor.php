<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Distributor extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_common', 'model_distributor'));
    }

    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {

            $data['meta_title']      = "Administrator | Distributor";
            $data['navigation']      = "distributors";
            $data['top_nav']         = '_layout/backend/top_nav';
            $data['sidebar']         = '_layout/backend/admin_sidebar';
            $data['page_content']    = '_admin/v_distributor';
            $data['footer']          = '_general/admin_footer';

            $data['drop_states'] = $this->model_common->getStates(); //load states via ajax
            $data['drop_lga']    = $this->model_common->getMyLGA(); //load lga via ajax

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

    public function distributor_list()
    {
        $list = $this->model_distributor->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dist) {
            $no++;
            $row   = array();
            $row[] = $dist->group_id;
            $row[] = $dist->state_id;
            $row[] = $dist->local_id;
            $row[] = $dist->firstname;
            $row[] = $dist->lastname;
            $row[] = $dist->email;
            $row[] = $dist->gender;
            $row[] = $dist->telephone;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_distributor('."'".$dist->admin_id."'".')"><i class="fa fa-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_distributor('."'".$dist->admin_id."'".')"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->model_distributor->count_all(),
            "recordsFiltered" => $this->model_distributor->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add_distributor()
    {
        $this->_validate();
        $data = array(
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'email'      => $this->input->post('email'),
            'password'   => md5($this->input->post('password')),
            'telephone'  => $this->input->post('telephone'),
            'group_id'   => $this->input->post('group_id'),
            'gender'     => $this->input->post('gender'),
            'state_id'   => $this->input->post('state_id'),
            'local_id'   => $this->input->post('local_id'),
            'address'    => $this->input->post('address')
        );
        $insert = $this->model_distributor->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function distributor_edit($id)
    {
        $data = $this->model_distributor->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update_distributor()
    {
        $this->_validate();
        $data = array(
            'firstname'  => $this->input->post('firstname'),
            'lastname'   => $this->input->post('lastname'),
            'email'      => $this->input->post('email'),
            'password'   => md5($this->input->post('password')),
            'telephone'  => $this->input->post('telephone'),
            'group_id'   => $this->input->post('group_id'),
            'gender'     => $this->input->post('gender'),
            'state_id'   => $this->input->post('state_id'),
            'local_id'   => $this->input->post('local_id'),
            'address'    => $this->input->post('address')
        );

        $this->model_distributor->update(array('admin_id' => $this->input->post('admin_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete_distributor($id)
    {
        $this->model_distributor->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('firstname') == '')
        {
            $data['inputerror'][] = 'firstname';
            $data['error_string'][] = 'First Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('lastname') == '')
        {
            $data['inputerror'][] = 'lastname';
            $data['error_string'][] = 'Last Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('password') == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Password is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('telephone') == '')
        {
            $data['inputerror'][] = 'telephone';
            $data['error_string'][] = 'Telephone is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('group_id') == '')
        {
            $data['inputerror'][] = 'group_id';
            $data['error_string'][] = 'Please select _distributor group';
            $data['status'] = FALSE;
        }

        if($this->input->post('gender') == '')
        {
            $data['inputerror'][] = 'gender';
            $data['error_string'][] = 'Please select gender';
            $data['status'] = FALSE;
        }

        if($this->input->post('state_id') == '')
        {
            $data['inputerror'][] = 'state_id';
            $data['error_string'][] = 'Please select state';
            $data['status'] = FALSE;
        }

        if($this->input->post('local_id') == '')
        {
            $data['inputerror'][] = 'gender';
            $data['error_string'][] = 'Please select LGA';
            $data['status'] = FALSE;
        }

        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


}