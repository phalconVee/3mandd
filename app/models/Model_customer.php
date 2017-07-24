<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model {
    var $table = 'users';
    var $column_order = array('usr_group', 'usr_fname', 'usr_lname', 'usr_email', 'usr_phone', 'gender', null);
    var $column_search = array('usr_group', 'usr_fname', 'usr_lname', 'gender');
    var $order = array('usr_id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_user_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('usr_id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save_user($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_user($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_user_by_id($id)
    {
        $this->db->where('usr_id', $id);
        $this->db->delete($this->table);
    }

    /** DB queries for address table **/
    public function save($data)
    {
        $this->db->insert('address', $data);
        //return $this->db->insert_id();
        return $data['usr_id'];
    }

    public function update($where, $data)
    {
        $this->db->update('address', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('studid', $id);
        $this->db->delete('address');
    }

    public function check_address($customer_id)
    {
        $this->db->select('address_id, usr_id, firstname, lastname, telephone, address, state, lga');
        $this->db->where('usr_id', $customer_id);
        $query = $this->db->get('address');

        if($query->num_rows() > 0)
        {
            $q = $query->row_array();

            $arr = array();
            $arr['usr_id']      = $q['usr_id'];
            $arr['address_id']  = $q['address_id'];
            $arr['address']     = $q['address'];
            $arr['telephone']   = $q['telephone'];
            $arr['state']       = $q['state'];
            $arr['lga']         = $q['lga'];
            $arr['firstname']   = $q['firstname'];
            $arr['lastname']    = $q['lastname'];

            return $arr;

            //return $q['usr_id'];
        }
        else{
            return false;
        }
    }

    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('address');
        $this->db->where('address_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_profile($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('usr_id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function update_bio($where, $data)
    {
        $this->db->update('users', $data, $where);
        return $this->db->affected_rows();
    }



}///end class  ///

