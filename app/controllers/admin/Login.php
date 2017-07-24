<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_admin','model_common', 'admin_auth_model'));
    }

    public function index()
    {
        global $data;

        if(!empty($_SESSION['w3_admin_id'])) {
            redirect('admin/dashboard', 'refresh');
        }

        $data['meta_title'] = 'Administrator';

        $data['drop_states'] = $this->model_common->getStates();
        $data['drop_lga']    = $this->model_common->getMyLGA();
        $data['drop_group']  = $this->model_common->getGroups();

        $notice = $this->session->userdata('notice');
        $this->session->set_userdata('notice', '');

        if(!empty($notice)) {
            $data['notice'] = $notice;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('_admin/login', $data);
        }
        else {

            $role = $this->admin_auth_model->validate($this->input->post());

            if($role == 1) {

                redirect('admin/dashboard', 'refresh');

            }elseif($role == 2){

                redirect('distributor/warehouse', 'refresh');

            }else {
                $data['error_msg'] = $this->msg_status($role);
                $this->load->view('_admin/login', $data);
            }
        }

    }

    function msg_status($status)
    {
        if($status == 0)
        {
            $msg = "Account has not been activated. Please check your email";
        } else if($status == 2) {
            $msg = "Account has been banned. Please contact administrator";
        } else {
            $msg = "Invalid Login Details";
        }
        return $msg;
    }


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */