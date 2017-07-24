<?php
class Model_Payment extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function save($r_data, $date)
    {
        extract($r_data);
        $data = array(
            'usr_id'      => $this->db->escape_str($usr_id),
            'items'       => $this->db->escape_str($item_name),
            'items_unit'  => $this->db->escape_str($unit_type),
            'txnref'      => $this->db->escape_str($merch_txnref),
            'currency'    => $this->db->escape_str($currency),
            'total'       => $this->db->escape_str($balance_to_pay),
            'host_charge' => $this->db->escape_str($host_charge),
            'status'      => 'pending',
            'pay_option'  => $this->db->escape_str($payment_option),
            'date'        => $date
        );

        $query = $this->db->insert('payment', $data);
        $user_ins_id = $this->db->insert_id();

        return $user_ins_id;
    }

    function update($id, $data)
    {
        $this->db->where('pay_id', $id);
        $this->db->update('payment', $data);
        return true;
    }

}