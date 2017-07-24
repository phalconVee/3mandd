<div class="right_col" role="main">
    <br/>
    <!--display global alert messages -->
    <?php if(!empty($notice)) { ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Success:</strong> <?php echo $notice; ?>
    </div>
    <?php } ?>

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Warehouse</h3>
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
                        <h2>Plain Page</h2>
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
                        <button class="btn btn-default" onclick="reload_table()"><i class="icon-refresh"></i> Reload</button>

                        <br />
                        <br />
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Units</th>
                                <th>Product Name</th>
                                <th>Product Price (&#x20a6;)</th>
                                <th>Product Image</th>

                                <th style="width:125px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- load products from table -->
                            <?php foreach ($products as $product ) : ?>
                                <tr>
                                    <td><?=  $product->pro_id  ?></td>
                                    <td><?=  $product->cat_name  ?></td>
                                    <td><?=  $product->brand_name  ?></td>
                                    <td><?=  $product->unit_type  ?></td>
                                    <td><?=  $product->pro_name  ?></td>
                                    <td><?=  number_format($product->pro_price)  ?></td>

                                    <td>
                                        <a href="">
                                            <style>#g {width:50px;height:50px;}</style>
                                            <?php

                                            $product_image =['src'	=>'assets/store/'.$product->pro_image,

                                                'class'=>'img-responsive img-portfolio img-hover',
                                                'id'=>'g'
                                            ];
                                            echo img($product_image);
                                            ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="<?=base_url('distributor/distributor_products/update?pro_id='.$product->pro_id.'&pro_name='.$product->pro_name);?>" title="Edit"> View &amp; Update Stock</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>

                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Units</th>
                                <th>Product Name</th>
                                <th>Product Price (&#x20a6;)</th>
                                <th>Product Image</th>

                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>

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
<!--DataTables-->
<script src="<?php echo base_url('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.js')?>"></script>

<!-- FastClick -->
<script src="<?=base_url('assets/admin/vendors/fastclick/lib/fastclick.js');?>"></script>
<!-- NProgress -->
<script src="<?=base_url('assets/admin/vendors/nprogress/nprogress.js');?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?=base_url('assets/admin/build/js/custom.min.js');?>"></script>


<script>
    $(document).ready(function(){
        $('#table').DataTable();

    });

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }
</script>