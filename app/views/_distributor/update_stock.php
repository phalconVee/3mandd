<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Stock Update</h3>
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
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add New Product </h2>
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

                        <?php echo validation_errors('<div class="alert-danger">', '</div>'); ?>

                        <?php if(!empty($error)) { echo  "<div class='alert-danger'>$error</div>"; } ?>


                        <?php foreach($products as $product): ?>

                        <form action="<?=base_url('distributor/distributor_products/update/'.$product->pro_id);?>" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>

                            <input type="hidden" name="admin_id" value="<?=$_SESSION['w3_admin_id'];?>" />

                                <input type="hidden" name="cat_id" value="<?=$product->cat_id?>" />
                                <input type="hidden" name="brand_id" value="<?=$product->brand_id?>" />

                                <input type="hidden" name="state_id" value="<?=$state_id?>" />
                                <input type="hidden" name="local_id" value="<?=$local_id?>" />

                                <input type="hidden" name="unit_id" value="<?=$product->unit_id?>" />
                                <input type="hidden" name="pro_name" value="<?=$product->pro_name?>" />
                                <input type="hidden" name="pro_price" value="<?=$product->pro_price?>" />
                                <input type="hidden" name="pro_description" value="<?=$product->pro_description?>" />
                                <input type="hidden" name="pro_image" value="<?=$product->pro_image?>" />


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Available Stock for this product is:</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                   <code><?=$stock?></code>

                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Enter New Stock <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="number" name="pro_stock" required="required" class="form-control col-md-7 col-xs-12" value="<?= set_value('pro_stock') ?>" style="width: 20%">
                                </div>
                            </div>


                            <?php endforeach; ?>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- jQuery -->
<script src="<?=base_url('assets/admin/vendors/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?=base_url('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/admin/vendors/fastclick/lib/fastclick.js');?>"></script>
<!-- NProgress -->
<script src="<?=base_url('assets/admin/vendors/nprogress/nprogress.j');?>"></script>
<!-- validator -->
<script src="<?=base_url('assets/admin/vendors/validator/validator.js');?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?=base_url('assets/admin/build/js/custom.min.js');?>"></script>

<!-- validator -->
<script>
    // initialize the validator function
    validator.message.date = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
    });

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();

        return false;
    });
</script>
<!-- /validator -->
</body>
</html>