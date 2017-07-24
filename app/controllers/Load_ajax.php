<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Load_ajax extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_common', 'model_messages'));
    }

    function check_new_msg()
    {
        global $data;
        if(!empty($_SESSION['w3_admin_id'])) {
            echo $this->model_common->get_unread_msgs();
            exit;
        } else {
            echo "Session Expired";
        }
    }


}
