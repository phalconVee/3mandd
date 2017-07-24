<?php
class Model_Order extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function save($r_data, $order_no)
    {
        extract($r_data);
        $data = array(
            'usr_id'            => $this->db->escape_str($usr_id),
            'items'             => $this->db->escape_str($item_name),
            'items_unit'        => $this->db->escape_str($unit_type),
            'items_qty'         => $this->db->escape_str($pro_qty),
            'invoice_no'        => $this->db->escape_str($merch_txnref),
            'order_no'          => $order_no,
            'total_cart_qty'    => $this->db->escape_str($total_cart_qty),
            'empty_qty'         => $this->db->escape_str($empty_qty),
            'empty_ret_qty'     => $this->db->escape_str($empty_ret_qty),
            'empty_value'       => $this->db->escape_str($empty_value),
            'full_value'        => $this->db->escape_str($full_value),
            'total_value'       => $this->db->escape_str($total_value),
            'empty_ret_value'   => $this->db->escape_str($empty_ret_value),
            'balance_to_pay'    => $this->db->escape_str($balance_to_pay),
            'host_service'      => $this->db->escape_str($host_service),
            'host_charge'       => $this->db->escape_str($host_charge),
            'delivery_date'     => $this->db->escape_str($delivery_date)
        );

        $query = $this->db->insert('orders', $data);
        $user_ins_id = $this->db->insert_id();

        return true;
    }

    public function my_orders()
    {
        $logged_in = $_SESSION['w3_user_id'];

        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('users', 'users.usr_id = orders.usr_id', 'left');
        $this->db->where('orders.usr_id', $logged_in);
        $this->db->order_by('id', 'desc');
        $show = $this->db->get();

        if ($show->num_rows() > 0) {
            return $show->result();
        } else {
            return array();
        }
    }

}