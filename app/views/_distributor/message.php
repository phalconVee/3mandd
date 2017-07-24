<div class="right_col" role="main">


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Order Delivery Request Details </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Message</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <?php foreach($message as $row): ?>

                            <?php $date  = date("F j, Y", strtotime($row->order_date)); ?>

                            <section class="content invoice">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-xs-12 invoice-header">
                                        <h1>
                                            <i class="fa fa-globe"></i> Order.
                                            <small class="pull-right">Order Date: <?= $date;?></small>
                                        </h1>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong><?=$row->usr_fname?>&nbsp;<?=$row->usr_lname?>.</strong>
                                            <br><?=$address?>
                                            <br><?=$customer_lga?>, <?=$customer_state?>
                                            <br>Phone: <?=$telephone?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                        <b>Order ID:</b> <?=$row->order_no?>
                                        <br>
                                        <b>Payment Due:</b> <?=$row->delivery_date?>
                                        <br>
                                        <b>Account:</b> N/A
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-xs-12 table">

                                        <h2>Item Details</h2>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>Items Qty Ordered </th>
                                                <th>Total Cart Qty</th>
                                                <th>Empty Qty</th>
                                                <th>Empty Return Qty</th>
                                                <th>Host Charge</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td><?=$row->items;?></td>
                                                <td><?=$row->items_qty;?></td>
                                                <td><?=$row->total_cart_qty?></td>
                                                <td><?=$row->empty_qty?></td>
                                                <td><?=$row->empty_ret_qty?></td>
                                                <td><?=$row->host_charge?></td>
                                                <td>&#x20a6; <?=number_format($row->balance_to_pay, 2) ?></td>
                                            </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- /.col -->
                                    <!-- /.row -->

                                    <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-xs-6">

                                        </div>
                                        <!-- /.col -->
                                        <div class="col-xs-6">
                                            <?php $delivery_date = date("F j, Y", strtotime($row->delivery_date)); ?>
                                            <p class="lead">Delivery Date <?=$delivery_date?></p>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <th style="width:50%">Empty Return Value:</th>
                                                        <td>&#x20a6;<?=number_format($row->empty_ret_value, 2);?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Full Value</th>
                                                        <td>&#x20a6;<?=number_format($row->full_value, 2);?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Total Value</th>
                                                        <td>&#x20a6;<?=number_format($row->total_value, 2);?></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Balance To Pay:</th>
                                                        <td><strong>&#x20a6;<?=number_format($row->balance_to_pay, 2);?></strong></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class="col-xs-12">
                                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                                        </div>
                                    </div>
                            </section>

                        <?php endforeach; ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?=base_url('assets/admin/vendors/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?=base_url('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<!-- FastClick -->
<script src="<?=base_url('assets/admin/vendors/fastclick/lib/fastclick.js');?>"></script>
<!-- NProgress -->
<script src="<?=base_url('assets/admin/vendors/nprogress/nprogress.js');?>"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?=base_url('assets/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js');?>"></script>
<script src="<?=base_url('assets/admin/vendors/jquery.hotkeys/jquery.hotkeys.js');?>"></script>
<script src="<?=base_url('assets/admin/vendors/google-code-prettify/src/prettify.js');?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?=base_url('assets/admin/build/js/custom.min.js');?>"></script>



