<?php
class Model_Messages extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_order_message($ord_id)
    {
        $logged_id = $_SESSION['w3_admin_id'];

        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('users', 'users.usr_id = orders.usr_id', 'left');
        $this->db->where('id', $ord_id);
        $this->db->order_by('id', 'desc');
        $show = $this->db->get();

        if ($show->num_rows() > 0) {

            $updateData = array(
                'read' => '1'
            );

            $this->db->where('order_id', $ord_id);
            $this->db->where('to_id', $logged_id);
            $this->db->update('message', $updateData);

            return $show->result();
        } else {
            return array();
        }
    }

    public function get_all_my_orders()
    {
        $logged_in = $_SESSION['w3_admin_id'];

        $this->db->select('*');
        $this->db->from('message');
        $this->db->join('orders', 'orders.id = message.order_id', 'left');
        $this->db->where('to_id', $logged_in);
        $this->db->order_by('id', 'desc');
        $show = $this->db->get();

        if ($show->num_rows() > 0) {
            return $show->result();
        } else {
            return array();
        }
    }

}