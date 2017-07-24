<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_Model_Product extends CI_Model {

    public function all_products($a_id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'categories.cat_id=products.cat_id', 'left');
        $this->db->join('brands', 'brands.brand_id=products.brand_id', 'left');
        $this->db->join('units', 'units.unit_id=products.unit_id', 'left');
        $this->db->where('admin_id', '0');
        $this->db->order_by('pro_id', 'desc');
        $show = $this->db->get();

        if($show->num_rows() > 0 ) {
            return $show->result();
        } else {
            return array();
        }
    }

    public function admin_store_stock($a_id, $pro_name)
    {
        $this->db->select('*');
        $this->db->from('warehouse');
        $this->db->where('admin_id', $a_id);
        $this->db->where('pro_name', $pro_name);

        $code = $this->db->get();
        if ($code->num_rows() > 0 )
        {
            $row = $code->row_array();
            return $row['pro_stock'];
        }else {
            return '0';
        }
    }

    /**
     * @return mixed
     * without repeated values
     */
    public function dis_products()
    {
        $this->db->distinct();
        $query = $this->db->query('SELECT DISTINCT pro_name FROM warehouse');
        return $query->result();
    }

    /**
     * @param $pro_name
     * @return mixed
     * this will find product and show all same product
     */
    public function showme($pro_name)
    {
        $query = $this->db->get_where('warehouse', array('pro_name' => $pro_name));
        return $query->result();
    }

    /**
     * @param $pro_id
     * @return array
     * this is for find record id->product
     */
    public function find($pro_id)
    {
        $code = $this->db->where('pro_id',$pro_id)
            ->limit(1)
            ->get('warehouse');
        if ($code->num_rows() > 0 )
        {
            return $code->row();
        }else {
            return array();
        }

    }

    public function get_pro_id($pro_id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('pro_id', $pro_id);
        $show = $this->db->get();

        if($show->num_rows() > 0){
            return $show->result();
        }
    }


    /**
     * @param $data_products
     * when a distributor updates stock
     * record it as a new entry for the purpose of
     * checking available stock when matching with a customers order request
     */
    public function updates($data_products)
    {
        $this->db->insert('warehouse',$data_products);
    }

    public function update_stock($a_id, $pro_name, $data_products)
    {
        $this->db->select('*');
        $this->db->from('warehouse');
        $this->db->where('admin_id', $a_id);
        $this->db->where('pro_name', $pro_name);

        $show = $this->db->get();

        if($show->num_rows() > 0){

            $this->db->where('admin_id', $a_id);
            $this->db->where('pro_name', $pro_name);
            $this->db->update('warehouse',$data_products);
        }else{
            $this->db->insert('warehouse',$data_products);
        }

    }


    public function report($report_products)
    {
        $this->db->insert('reports',$report_products);
    }

    public function reports()
    {
        $report = $this->db->get('reports');
        if($report->num_rows() > 0 ) {
            return $report->result();
        } else {
            return array();
        }

    }

    public function del_report($rep_id_product)
    {
        $this->db->where('rep_id_product',$rep_id_product)
            ->delete('reports');
    }




} //end class dist_model_products
///////////////////////////////  Model_products : this is use in controller admin/products + home