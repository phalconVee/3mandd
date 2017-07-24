<?php
class Model_Product extends CI_Model
{
    public function all_products()
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

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by('pro_id','desc');

        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }

        $query = $this->db->get();

        return ($query->num_rows() > 0)?$query->result():FALSE;
    }

    public function pro_details($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'categories.cat_id=products.cat_id', 'left');
        $this->db->join('brands', 'brands.brand_id=products.brand_id', 'left');
        $this->db->join('units', 'units.unit_id=products.unit_id', 'left');
        $this->db->where('admin_id', '0');
        $this->db->where('pro_id', $id);
        $show = $this->db->get();

        if($show->num_rows() > 0 ) {
            return $show->result();
        } else {
            return array();
        }
    }

    /**
     * @return mixed
     * without repeated values
     */
    public function dis_products()
    {
        $this->db->distinct();
        $query = $this->db->query('SELECT DISTINCT pro_name FROM products');
        return $query->result();
    }

    /**
     * @param $pro_name
     * @return mixed
     * use to extract pro id using pro name
     * to be executed on singlepagecheckout
     */
    public function extract_pro_id($pro_name)
    {
        $query = $this->db->get_where('products', array('pro_name' => $pro_name, 'admin_id' => '0'));

        $rec = $query->row_array();

        return $rec['pro_id'];
    }

    /**
     * @param $pro_name
     * @return mixed
     * this will find product and show all same product
     */
    public function showme($pro_name)
    {
        $query = $this->db->get_where('products', array('pro_name' => $pro_name));
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
            ->get('products');
        if ($code->num_rows() > 0 )
        {
            return $code->row();
        }else {
            return array();
        }
    }

    public function get_by_id($id)
    {
        $this->db->from('products');
        $this->db->where('pro_id',$id);
        $this->db->where('admin_id', '0');
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('products', $data, $where);
        return $this->db->affected_rows();
    }

    public function create($data_products)
    {
        $this->db->insert('products',$data_products);
    }

    public function edit($pro_id,$data_products)
    {
        $this->db->where('pro_id',$pro_id)
            ->update('products',$data_products);
    }

    public function delete($pro_id)
    {
        $this->db->where('pro_id',$pro_id)
            ->delete('products');
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

    public function get_category_id()
    {
        $this->db->select('cat_id, cat_name');
        $this->db->from('categories');
        $query = $this->db->get();

        foreach($query->result_array() as $row){
            $data[$row['cat_id']] = $row['cat_name'];
        }
        return $data;
    }

    public function get_brand_id()
    {
        $this->db->select('brand_id, brand_name');
        $this->db->from('brands');
        $query = $this->db->get();

        foreach($query->result_array() as $row){
            $data[$row['brand_id']] = $row['brand_name'];
        }
        return $data;
    }

    public function get_unit_id()
    {
        $this->db->select('unit_id, unit_type');
        $this->db->from('units');
        $query = $this->db->get();

        foreach($query->result_array() as $row){
            $data[$row['unit_id']] = $row['unit_type'];
        }
        return $data;
    }


    public function total_products()
    {
        $result = $this->db->get('products');
        return $result->num_rows();
    }

    public function getFeaturedItems($limit, $start)
    {
        $this->db->order_by('pro_id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('products');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_product($id)
    {
        $this->db->where('pro_id', $id);
        return $this->db->get('products');
    }/* Edit Product*/

    public function getItems($page){
        $offset = 6*$page;
        $limit = 6;
        $sql = "select * from products limit $offset ,$limit";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function stock_return_by_location($state_id, $local_id, $item_name)
    {
        $this->db->select('pro_stock');
        $this->db->from('warehouse');
        $this->db->where('state_id',$state_id);
        $this->db->where('local_id',$local_id);
        $this->db->where('pro_name',$item_name);
        $show = $this->db->get();

        if($show->num_rows() > 0 ) {
            $values = $show->result();

            $sum = 0;
            foreach ($values as $keys => $val) {
                $sum += $val->pro_stock;
            }
            return $sum;
        }
    }

    /**
     * @param $state_id
     * @param $local_id
     * @param $item_name
     * @return int
     * get stock return by location
     */
    public function stock_return($state_id, $local_id, $item_name)
    {
        $this->db->select('pro_stock');
        $this->db->from('warehouse');
        $this->db->where_in("$item_name");
        $this->db->where('state_id', $state_id);
        $this->db->where('local_id', $local_id);
        $show = $this->db->get();

        if($show->num_rows() > 0 ) {
            $values = $show->result();

            $sum = 0;
            foreach ($values as $keys => $val) {
                $sum += $val->pro_stock;
            }
            return $sum;
        }
    }

    public function get_unit_type($state_id, $local_id, $item_name)
    {
        $this->db->select('unit_id');
        $this->db->from('warehouse');
        $this->db->where_in("$item_name");
        $this->db->where('state_id',$state_id);
        $this->db->where('local_id',$local_id);
        $show = $this->db->get();

        if($show->num_rows() > 0 ) {
            $values = $show->result();
            foreach ($values as $keys => $val) {
                $unit = $val->unit_id;
            }
            return $unit;
        }
    }


}