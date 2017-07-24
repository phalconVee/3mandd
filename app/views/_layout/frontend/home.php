<div class="features_items" id="postList"><!--features_items-->
    <h2 class="title text-center">Featured Items</h2>

    <?php $i=0;  if(!empty($featured_items)) { ?>

    <?php foreach($featured_items as $row): ?>

    <div class="col-sm-4">
        <div class="product-image-wrapper" id="td_<?php echo $row->pro_id; ?>">
            <div class="single-products">
                <div class="productinfo text-center">

                    <a href="<?=base_url('products/pro_details')."?source=3MD".strtoupper(uniqid())."&pro_name=".$row->pro_name."&pro_id=".$row->pro_id;?> ">
                    <img src="<?php echo base_url("assets/store")."/".$row->pro_image; ?>" alt="<?php  echo $row->pro_name ;?>" />
                    </a>

                    <h2>&#x20a6;<?=number_format($row->pro_price);?></h2>

                    <p><?=$row->pro_name;?></p>

                    <a id="edit_product" data-id="<?php echo $row->pro_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                </div>

            </div>

            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <?php if($row->unit_id == 1){ ?>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>Quantity:</td>
                            <td><input type="number" min="0" value="" id="item_qty_<?php echo $row->pro_id; ?>" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td>Return Quantity:</td>
                            <td><input type="number" min="0" value="" id="item_r_qty_<?php echo $row->pro_id; ?>" class="form-control" /></td>
                        </tr>
                    </table>
                    <?php }else{ ?>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Quantity:</td>
                                <td><input type="number" min="0" value="" id="item_qty_<?php echo $row->pro_id; ?>" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Return Quantity:</td>
                                <td>N/A</td>
                            </tr>
                        </table>

                    <?php } ?>
                </ul>
            </div>

        </div>
    </div>

    <?php endforeach; ?>

    <?php }else { ?>
    <div class="col-sm-4"> <h2> No items available at the moment</h2> </div>
    <?php } ?>

    <ul class="pagination"><?php echo $this->ajax_pagination->create_links(); ?></ul>


</div><!--features_items-->


<div class="loading" style="display: none;">
    <div class="content"><img src="<?php echo base_url().'assets/theme/images/gif/1.gif'; ?>"/>
    </div>
</div>