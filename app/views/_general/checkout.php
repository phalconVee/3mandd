<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <?php if(empty($_SESSION['w3_user_id'])) { ?>

            <div class="step-one">
                <h2 class="heading">STEP1: YOUR EMAIL</h2>
            </div>

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->

                      <!-- display global alert messages -->
            <?php if(!empty($notice)) { ?><div class="alert-danger"><?php echo $notice; ?></div> <?php } ?>
            <!--end global message-->

            <?php if(!empty($error_msg)) { echo  "<div class='alert-danger' style='text-align: center; padding: 10px;'>$error_msg</div>"; } ?>

            <section id="form" style="margin-top: 10px;"><!--form-->
                <div class="container">

                    <div class="row">

                        <div class="col-sm-4 col-sm-offset-1">
                            <div class="login-form"><!--login form-->

                                <h2>Login to your account</h2>

                                <form action="<?=current_url();?>" method="post">

                                    <input type="email" name="usr_email" placeholder="Email Address" value="<?php echo set_value('usr_email'); ?>"/> <span class="help-block"></span>
                                    <input type="password" name="usr_password" placeholder="Password" /> <span class="help-block"></span>

                                    <button type="submit" class="btn btn-default">PROCEED</button>

                                </form>
                            </div><!--/login form-->
                        </div>
                        <div class="col-sm-1">
                            <h2 class="or">OR</h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="signup-form"><!--sign up form-->
                                <h2>New User! Create your account</h2>

                                <a href="<?=base_url();?>customer/register"><button class="btn btn-default cart">CREATE ACCOUNT</button></a>

                            </div><!--/sign up form-->
                        </div>
                    </div>
                </div>
            </section><!--/form-->

            <div class="step-one">
                <h2 class="heading">STEP2: YOUR ADDRESS</h2>
            </div>
            <div class="step-one">
                <h2 class="heading">STEP3: ORDER SUMMARY</h2>
            </div>
            <div class="step-one">
                <h2 class="heading">STEP4: PAYMENT</h2>
            </div>

        <?php }else{ ?>

        <!--use this to check if logged_in user has set an address book-->
        <?php if(!empty($address_usr_id) && $type = ''){ ?>
            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP1: YOUR EMAIL</h2>
            </div>

            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check-circle-o fa-1x"></i> STEP2: YOUR ADDRESS</h2>
            </div>

        <div class="shopper-informations">
            <div class="row">

            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="<?=base_url();?>assets/theme/images/product-details/new.jpg" class="newarrival" alt="" />
                    <h2>
                        <?=$_SESSION['w3_fname']?> <?=$_SESSION['w3_lname']?>

                        <span style="float: right;">

                            <a href="javascript:void(0)" title="Edit" onclick="delete_address_book('<?=$address_id?>')"><i class="fa fa-trash-o"></i></a>

                            <a href="javascript:void(0)" title="Edit" onclick="edit_address_book('<?=$address_id?>')"><i class="fa fa-edit"></i></a>
                        </span>
                    </h2>

                    <p><?=$address?></p><hr>

                    <p><?=$telephone?></p><hr>

                    <p>
                        <button type="button" id="btnUse" onclick="use_address('<?=$address_id?>', '2')" class="btn btn-primary"> USE THIS ADDRESS </button>
                        <!--<span style="float: right;"> <a href="javascript:void(0)" class="btn btn-default add-to-cart" title="Edit" onclick="add_new_address()">ADD NEW ADDRESS</a>-->
                    </p>



                </div><!--/product-information-->
            </div>

                </div>
            </div>


        <?php }else{ ?>

            <!--check if (1)user is logged_in, (2)address is set, (3)type is order summary i.e.type = 2-->
            <?php if(!empty($id_address) && $type != ''){?>

                <div class="step-one">
                    <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP1: YOUR EMAIL</h2>
                </div>

                <div class="step-one">
                    <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP2: YOUR ADDRESS</h2>
                </div>

                <div class="step-one">
                    <h2 class="heading"> <i class="fa fa-check-circle-o fa-1x"></i> STEP3: ORDER SUMMARY</h2>
                </div>


            <?php } ?>

        <div class="step-one">
            <h2 class="heading"> <i class="fa fa-check-circle fa-1x"></i> STEP1: YOUR EMAIL</h2>
        </div>

        <div class="step-one">
            <h2 class="heading"> STEP2: YOUR ADDRESS</h2>
        </div>

        <div class="shopper-informations">
            <div class="row">

                <div class="col-sm-8 clearfix">
                    <div class="bill-to">
                        <div class="login-form"><!--login form-->

                            <form action="#" id="forms">

                                <input type="hidden" name="usr_id" value="<?=$_SESSION['w3_user_id']?>" />

                                <div class="form-group">
                                    <label>First Name</label>
                                <input type="text" name="firstname" placeholder="First Name" value="<?=$_SESSION['w3_fname']?>" /> <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                <input type="text" name="lastname" placeholder="Last Name" value="<?=$_SESSION['w3_lname']?>"/> <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label>Telephone</label>
                                <input type="text" name="telephone" placeholder="Telephone" /> <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label>Select State</label>
                                <?php echo form_dropdown('state', $drop_states, '', 'id="statesdrp" ');  ?>
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label>Select LGA</label>
                                <select name="lga" id="localsDrop">

                                </select>
                                    <span class="help-block"></span>
                                 </div>

                                <div class="form-group">
                                    <label>Address</label>
                                <textarea name="address"  placeholder="Your place of residence or billing address" rows="8"></textarea>
                                <span class="help-block"></span>
                                </div>

                                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"> SAVE &amp; CONTINUE </button>

                                </form>


                        </div><!--/login form-->


                    </div>
                </div>

            </div>
        </div>

        <?php } ?>

        <div class="step-one">
            <h2 class="heading">Step3: ORDER SUMMARY</h2>
        </div>

        <div class="step-one">
            <h2 class="heading">Step4: PAYMENT</h2>
        </div>


    </div>
</section> <!--/#cart_items-->


<?php } ?>


