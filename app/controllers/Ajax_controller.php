
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_controller extends MY_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model(array('model_product', 'model_common', 'model_ajax'));
    }


    public function add_to_cart($pid, $qty, $return_qty)
    {
        $query = $this->model_product->get_product($pid);

        $this->load->helper('string');
        $user_code = random_string('unique');

        foreach ($query->result() as $row)
        {
            $name  = $row->pro_name;
            $price = $row->pro_price;
            $img   = $row->pro_image;
            $class = $row->unit_id;
        }

        $data = array(
            'id'      => $pid,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name,
            'options' => array('image' => $img, 'return_qty' => $return_qty, 'user_code' => $user_code, 'class' => $class)
        );

        $this->cart->insert($data);

        /*foreach ($this->cart->contents() as $items):

            $code  = $items['options']['user_code'];
            $r_qty = $items['options']['return_qty'];
            $image = $items['options']['image'];
            $class = $items['options']['class'];

        endforeach;


        $values = array(
            'temp_usr_code'   => $code,
            'temp_pro_id'     => $pid,
            'temp_pro_qty'    => $qty,
            'temp_pro_price'  => $price,
            'temp_pro_name'   => $name,
            'temp_unit_id '   => $class,
            'temp_return_qty' => $r_qty,
            'temp_pro_image'  => $image
        );

        $this->model_ajax->insert_temp_cart($values);*/
        echo count($this->cart->contents());

    }

    public function view_cart()
    {
        ?>

        <table class="table table-striped table-bordered">

            <tr>
                <th></th>
                <th>Quantity</th>
                <th>Item Name</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
            </tr>

            <?php $i = 1; ?>

            <?php foreach ($this->cart->contents() as $items): ?>
                <tr>
                    <td>
                        <button class="btn btn-danger " onclick="remove_cart('<?=$items['rowid'];?>')" title="delete item"><i class="fa fa-trash-o"></i></button>
                        <button class="btn btn-success " onclick="update_cart('<?=$items['rowid'];?>')" title="update quantity"><i class="fa fa-refresh"></i></button>
                    </td>
                    <td>
                        <?php echo form_input(array('name' => $items['rowid']."_qty",'id' => $items['rowid']."_qty", 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                    </td>
                    <td>
                        <?php echo $items['name']; ?>
                    </td>
                    <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                    <td style="text-align:right">&#x20a6;<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

                <?php $i++; ?>

            <?php endforeach; ?>

            <tr>
                <?php if($this->cart->total()>0){?>
                <td colspan="3"><input  class="btn btn-info" type="button" value="Clear Cart" onclick="clear_cart()"> </td>
                <?php }else{ ?>
                <td colspan="3"></td>
                <?php } ?>

                <td class="right"><strong>Total</strong></td>
                <td class="right">&#x20a6;<?php echo $this->cart->format_number($this->cart->total()); ?></td>
            </tr>

        </table>


        <?php
    }


    public function clear_cart($rowid)
    {
        if ($rowid==="all"){
        // Destroy data which store in session.
            $this->cart->destroy();
        }
    }

    public function remove_cart($id)
    {
        $data = array(
            'rowid' => $id,
            'qty'   => 0
        );

        $this->cart->update($data);
        $this->view_cart();
    }

    public function update_cart($id, $qty)
    {
        $data = array(
            'rowid' => $id,
            'qty'   => $qty
        );

        $this->cart->update($data);
        $this->view_cart();
    }

    public function update_cart_item($id, $qty)
    {
        $data = array(
            'rowid' => $id,
            'qty'   => $qty
        );

        $this->cart->update($data);
    }

    public function populateLGA()
    {
        $id_states  = $this->input->post('id',TRUE);
        $localsData = $this->model_common->getLGA($id_states);
        $output = null;

        foreach ($localsData as $row){
            $output .= "<option value='".$row->local_id."'>".$row->local_name."</option>";
        }

        echo  $output;
    }

    function add_cart_item($pid, $qty, $return_qty)
    {
        $query = $this->model_product->get_product($pid);

        $this->load->helper('string');
        $user_code = random_string('unique');

        foreach ($query->result() as $row)
        {
            $name  = $row->pro_name;
            $price = $row->pro_price;
            $img   = $row->pro_image;
            $class = $row->unit_id;
        }

        $data = array(
            'id'      => $pid,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name,
            'options' => array('image' => $img, 'return_qty' => $return_qty, 'user_code' => $user_code, 'class' => $class)
        );

        $id     = $data['id'];             //get new product id
        $qty    = $data['qty'];            //get quantity if that item
        $cart   = $this->cart->contents(); //get all items in the cart
        $exists = false;                   //lets say that the new item we're adding is not in the cart
        $rowid  = '';

        foreach($cart as $item){
            if($item['id'] == $id)     //if the item we're adding is in cart add up those two quantities
            {
                $exists = true;
                $rowid = $item['rowid'];
                $qty = $item['qty'] + $qty;
            }
        }

        if($exists)
        {
            $this->update_cart_item($rowid, $qty);
            echo count($this->cart->contents());
        }
        else
        {
            $this->cart->insert($data);
            echo count($this->cart->contents());
        }

    }

}

/* End of file Ajax_controller.php */
/* Location: ./application/controllers/Ajax_controller.php */

?>