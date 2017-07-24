<?php
class Model_Orders extends CI_Model
{
    public function all_orders()
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('users', 'users.usr_id = orders.usr_id', 'left');
        $this->db->order_by('id', 'desc');
        $show = $this->db->get();

        if ($show->num_rows() > 0) {
            return $show->result();
        } else {
            return array();
        }
    }

    /**
     * @param $id
     * @return array
     * get details of a particular order
     */
    public function show_order_detail($id)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('users', 'users.usr_id = orders.usr_id', 'left');
        $this->db->where('orders.id', $id);
        $this->db->order_by('orders.id', 'desc');
        $show = $this->db->get();

        if ($show->num_rows() > 0) {
            return $show->result();
        } else {
            return array();
        }
    }

    public function get_customer_address($id)
    {
        $this->db->select('usr_id');
        $this->db->from('orders');
        $this->db->where('id', $id);
        $this->db->order_by('id', 'desc');
        $show = $this->db->get();

        if ($show->num_rows() > 0) {

            $query = $show->row_array();
            $usr_id = $query['usr_id'];

            return $this->getData1($usr_id);
        } else {
            return array();
        }
    }

    public function getData1($dat)
    {
        $this->db->select('*');
        $this->db->where('usr_id', $dat);
        $query = $this->db->get('address');

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

    public function get_customer_state($state_id)
    {
        $this->db->select('name');
        $this->db->from('states');
        $this->db->where('state_id', $state_id);
        $show = $this->db->get();

        if ($show->num_rows() > 0) {

            $state = $show->row_array();
            return $state['name'];

        } else {
            return array();
        }
    }

    public function get_customer_lga($local_id)
    {
        $this->db->select('local_name');
        $this->db->from('locals');
        $this->db->where('local_id', $local_id);
        $show = $this->db->get();

        if ($show->num_rows() > 0) {

            $lga = $show->row_array();
            return $lga['local_name'];

        } else {
            return array();
        }
    }

    public function get_customer_id($id)
    {
        $this->db->select('usr_id');
        $this->db->from('users');
        $this->db->where('usr_id', $id);
        $show = $this->db->get();

        if ($show->num_rows() > 0) {

            $usrid = $show->row_array();
            return $usrid['usr_id'];

        } else {
            return array();
        }
    }

    public function get_matching_dist($state_id, $local_id, $item_name)
    {
        $this->db->select('*');
        $this->db->from('warehouse');
        $this->db->join('admin', 'admin.admin_id = warehouse.admin_id', 'left');
        $this->db->where_in("$item_name");
        $this->db->where('warehouse.state_id',$state_id);
        $this->db->where('warehouse.local_id',$local_id);
        $show = $this->db->get();

        if($show->num_rows() > 0 ) {

            echo $show->result();
        }else{
            return array();
        }
    }

    public function getData2($dat)
    {
        $this->db->select('*');
        $this->db->where('admin_id', $dat);
        $query = $this->db->get('admin');

        if($query->num_rows() > 0)
        {
            $user_details = $query->result();
            return $user_details;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $dat
     * @return string
     * send order delivery request to
     * a matching distributor
     */
    function add_order_request($dat)
    {
        extract($dat);
        if(!empty($_SESSION['w3_admin_id'])) {
            $logged_user_id = $_SESSION['w3_admin_id'];

            $query = $this->db->query("SELECT * FROM `message` WHERE (`from_id`= $logged_user_id AND `to_id`= $to AND `order_id` = $divid) ");

            if($query->num_rows() == 0) {

                $data = array(
                    'order_id'   => $divid,
                    'from_id'    => $logged_user_id,
                    'to_id'      => $to,
                    'msg_status' => 1
                );
                $this->db->insert('message', $data);
                echo '<i class="fa fa-check"> Request Sent</i>';
            }
            else{
                echo 'You have already sent request to this distributor
                      <div id="send_request'.$to.'" style="display:inline-block"><a class="btn btn-sm btn-danger" href="javascript:;" onclick="send_request('.$from.', '.$to.', 1, '.$divid.', 0);">Cancel request </a></div>
                     ';
            }
        } else {
            $resp = "Session Expired";
            return $resp;
        }
    }

    /**
     * @param $dat
     * @return string
     * cancel order request
     */
    function decline($dat)
    {
        extract($dat);
        if(!empty($_SESSION['w3_admin_id'])) {
            //change status
            $query = $this->db->query("delete from `message` WHERE (`from_id`= $from AND `to_id`= $to AND `order_id` = $divid) ");
            $resp = "Request cancelled";
            return $resp;
        } else {
            $resp = "Session Expired";
            return $resp;
        }
    }

}