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
                <h3>Products</h3>
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

                        <a href="<?=base_url('admin/admin_products/create');?>" class="btn btn-success"><i class="icon-plus"></i> Add New product</a>
                        <button class="btn btn-default" onclick="reload_table()"><i class="icon-refresh"></i> Reload</button>

                        <br />
                        <br />
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
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
                                    <td><?=  $product->unit_type ?></td>
                                    <td><?=  $product->pro_name  ?></td>
                                    <td><textarea rows="4" disabled><?=  $product->pro_description  ?></textarea></td>
                                    <td><?=  $product->pro_price  ?></td>

                                    <td>
                                        <a href="">
                                            <style>#g {width:50px;height:50px;}</style>
                                            <?php

                                            $product_image =['src'	=>'assets/store/'.$product->pro_image,

                                                'class'=>'img-responsive img-portfolio img-hover',
                                                'id'=>'g'
                                            ];
                                            echo img($product_image);
                                            ?></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_product('<?=$product->pro_id;?>')"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_product('<?=$product->pro_id;?>')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>

                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
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
    var save_method; //for save method string
    var table;

    $(document).ready(function(){
        $('#table').DataTable();

    });

    function edit_product(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('admin/admin_products/pro_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="pro_id"]').val(data.pro_id);
                $('[name="cat_id"]').val(data.cat_id);
                $('[name="brand_id"]').val(data.brand_id);
                $('[name="unit_id"]').val(data.unit_id);
                $('[name="pro_name"]').val(data.pro_name);
                $('[name="pro_price"]').val(data.pro_price);
                $('[name="pro_description"]').val(data.pro_description);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Product Data'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error geting data from ajax');
            }
        });
    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('admin/admin_products/ajax_add_product')?>";
        } else {
            url = "<?php echo site_url('admin/admin_products/ajax_update_product')?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable

            }
        });
    }

    function delete_product(id)
    {
        if(confirm('Are you sure to delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('admin/admin_products/ajax_delete_products')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="pro_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Category</label>
                            <div class="col-md-9">
                                <?php echo form_dropdown('cat_id', $drop_categories, '', 'id="category" class="form-control"');  ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Brand</label>
                            <div class="col-md-9">
                                <?php echo form_dropdown('brand_id', $drop_brands, '', 'id="brand" class="form-control"');  ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Unit</label>
                            <div class="col-md-9">
                                <?php echo form_dropdown('unit_id', $drop_units, '', 'id="unit" class="form-control"');  ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Name</label>
                            <div class="col-md-9">
                                <input id="name" name="pro_name" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Price (&#x20a6;)</label>
                            <div class="col-md-9">
                                <input type="number" id="number" name="pro_price" required="required" class="form-control" >
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea id="textarea" required="required" name="pro_description" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>



                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Bootstrap modal -->