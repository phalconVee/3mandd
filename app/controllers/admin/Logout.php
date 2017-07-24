<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

    public function index()
    {
        session_destroy();
        redirect('admin/', 'refresh');
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */