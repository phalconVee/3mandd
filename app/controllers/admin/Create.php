<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends MY_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('admin_auth_model','model_common', 'model_admin'));
    }

    public function save()
    {
        global $data;

        $ip = $_SERVER['REMOTE_ADDR'];
        $time = date('Y-m-d');

        $data = array(
                'firstname'  => $this->input->post('firstname'),
                'lastname'   => $this->input->post('lastname'),
                'email'      => $this->input->post('email'),
                'password'   => md5($this->input->post('password')),
                'telephone'  => $this->input->post('telephone'),
                'address'    => $this->input->post('address'),
                'group_id'   => $this->input->post('group_id'),
                'state_id'   => $this->input->post('state_id'),
                'local_id'   => $this->input->post('local_id'),
                'store_no'   => $this->generate_store_no(),
                'date'       => $time,
                'ip'         => $ip,
                'gender'     => $this->input->post('gender')
            );

        $insert = $this->model_admin->create_admin($data);
        $this->session->set_userdata('notice', 'Account successfully created.');
        redirect('admin/login', 'refresh');

    }

    function generate_store_no()
    {
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 10; $i++)
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }

        return implode($pass);
    }



}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */