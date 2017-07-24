<?php
class Model_common extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*function used to  update online status*/
    function update_online_status()
    {
        $time = time();
        $uid = $_SESSION['w3_user_id'];
        $this->db->query("update users SET `online` = $time  WHERE `usr_id`= $uid");
        return true;
    }

    function total_users()
    {
        $this->db->select('*');
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    function total_distributors()
    {
        $this->db->select('*');
        $this->db->where('group_id', 2);
        $this->db->from('admin');
        return $this->db->count_all_results();
    }

    function total_products()
    {
        $this->db->select('*');
        $this->db->from('products');
        return $this->db->count_all_results();
    }

    function total_sales()
    {
        $this->db->select('*');
        $this->db->from('orders');
        return $this->db->count_all_results();
    }

    function get_unread_msgs()
    {
        $logged_user_id = $_SESSION['w3_admin_id'];
        $query = $this->db->query("SELECT count(message.msg_id) as no, orders.order_no, message.time, message.order_id FROM `message`, `orders` WHERE `to_id`=$logged_user_id AND `read`=0 AND orders.id = message.order_id GROUP BY message.from_id");

        if($query->num_rows() > 0) {
            $alts = '';
            foreach($query->result_array() as $row) {
                $date  = date("F j, Y", strtotime($row['time']));
                $alts .= '<a href="'.base_url().'distributor/message/u/'.$row['order_id'].'">
                         <span>
                          <span>Administrator</span>
                          <span class="time">'.$date.'</span>
                        </span>
                        <span class="message">
                          You have new order delivery request, with order no <strong>'.$row['order_no'].'</strong>
                        </span>
                        </a>
                         ';
            }
             return $alts;
        } else {
            return "No New Messages";
        }
    }

    function total_unread_msgs()
    {
        $logged_user_id = $_SESSION['w3_admin_id'];
        $this->db->where('to_id', $logged_user_id);
        $this->db->where('read', 0);
        $this->db->from('message');
        return $this->db->count_all_results();
    }

    /*used to update new password */
    function update_password($dat, $key)
    {

    }

    /* get user details for email purpose */
    function get_mini_admin_details($dat, $type)
    {
        $this->db->select('admin_id, firstname, lastname, group_id, state_id, local_id');
        $this->db->where($type,$dat);
        $query = $this->db->get('admin');

        if($query->num_rows() > 0)
        {
            $user_details = $query->row_array();
            return $user_details;
        }
        else
        {
            return false;
        }
    }

    public function getStates()
    {
        $this->db->select('state_id, name');
        $this->db->from('states');
        $query = $this->db->get();

        foreach($query->result_array() as $row){
            $data[$row['state_id']] = $row['name'];
        }
        return $data;
    }

    public function getMyLGA()
    {
        $this->db->select('local_id, local_name');
        $this->db->from('locals');
        $query = $this->db->get();

        /*$q = $query->row_array();
        return $q['local_name'];*/
        foreach($query->result_array() as $row){
            $data[$row['local_id']] = $row['local_name'];
        }
        return $data;

    }

    public function getLGA($id_state=string)
    {
        $this->db->select('local_id, local_name');
        $this->db->from('locals');
        $this->db->where('state_id', $id_state);
        $query = $this->db->get();

        return $query->result();
    }

    public function getGroups()
    {
        $this->db->select('gro_id, gro_name');
        $this->db->from('groups');
        $query = $this->db->get();

        foreach($query->result_array() as $row){
            $data[$row['gro_id']] = $row['gro_name'];
        }
        return $data;
    }


}