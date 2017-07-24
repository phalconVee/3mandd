<h3>My orders</h3>
<div class="product-details"><!--product-details-->
    <div class="col-sm-12">

        <p><i class="fa fa-print"></i> Print all orders</p>

        <?php if(!empty($orders)){ ?>

        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>items</th>
                <th>quantity</th>
                <th>order date</th>
                <th>invoice</th>
                <th style="width:125px;">total</th>
                <th>status</th>

                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <!-- load products from table -->

            <?php foreach ($orders as $ord ) : ?>

                <?php $date  = date("F j, Y", strtotime($ord->order_date)); ?>
                <tr>

                    <td><?=$ord->items;?></td>
                    <td><?=$ord->total_cart_qty;?></td>
                    <td><?=$date;?></td>
                    <td><?=$ord->invoice_no;?></td>
                    <td>&#x20a6; <?=number_format($ord->balance_to_pay, 2) ?></td>
                    <td><?=$ord->status;?></td>
                    <td>
                        <a class="btn btn-sm btn-info" href="<?=base_url('customers/order/manage/'.$ord->id);?>" title="Edit">Manage</i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>

            <tfoot>
            <tr>
                <th>items</th>
                <th>quantity</th>
                <th>order date</th>
                <th>invoice</th>
                <th>total</th>
                <th>status</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>

        <?php }else{ ?>

        <div style="text-align: center">You have placed no order.</div>

        <?php } ?>

    </div>
</div><!--/product-details-->