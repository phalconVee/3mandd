<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->


        <!--4. PAYMENT-->
        <?php if(!empty($_SESSION['w3_user_id']) && !empty($id_address) && $type == 3) { ?>



        <!--3. ORDER SUMMARY-->
        <?php } elseif(!empty($_SESSION['w3_user_id']) && !empty($id_address) && $type == 2){ ?>

             <div class="step-one">
                    <h2 class="heading"> <i class="fa fa-check-circle-o fa-1x"></i> STEP1: YOUR EMAIL</h2>
             </div>

             <div class="step-one">
                    <h2 class="heading"> <i class="fa fa-check-circle-o fa-1x"></i> STEP2: YOUR ADDRESS</h2>
             </div>

             <div class="step-one">
                    <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP3: ORDER SUMMARY</h2>
             </div>

            <h3>Select your shipping preference:</h3>
            <form action="#" id="forms" class="form-horizontal">
                <input type="hidden" value="" />

                <div class="form-body">
                    <div class="form-group">
                         <div class="col-md-9">
                            <input name="i_have_crate" type="radio"/>
                            <span> I am buying with my own crate/bottles </span>
                         </div>
                    </div>

                 <div>&nbsp;</div>

                <div class="form-group">
                    <div class="col-md-9">
                        <input name="i_want_host" type="radio"/>
                        <span> I require host/hostess service (if it's an occasion)  </span>
                    </div>
                </div>

                    <div>&nbsp;</div>

                    <div class="form-group">
                        <div class="col-md-9">
                            <span> Select your preferred date of delivery</span>
                            <input name="date_of_delivery" placeholder="yyyy-mm-dd" class="datepicker" type="text">
                        </div>
                    </div>

                </div>

                <p><i class="fa fa-truck fa-2x"></i> You will receive your order in 1 shipment</p>

            </form>

            <div>&nbsp;</div>

            <h3>Your order</h3>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <!--<td class="price"></td>-->
                        <td class="image">ITEM</td>
                        <td class="description"></td>
                        <td class="price">UNIT PRICE</td>
                        <td class="quantity">QUANTITY</td>
                        <td class="total">SUBTOTAL</td>
                        <td></td>
                    </tr>
                    </thead>

                    <?php $i = 1; ?>

                    <?php if($this->cart->total()>0){  foreach ($this->cart->contents() as $items): ?>

                    <tbody>
                    <tr>

                        <td class="cart_product">
                            <a href=""><img src="<?=base_url()?>image.php/<?=$items['name']?>.png?width=120&height=120&cropratio=1:1&image=<?=base_url();?>assets/store/<?=$items['name']?>.png" alt="<?=$items['name']?>"></a>
                        </td>

                        <td class="cart_description">
                            <?php echo $items['name']; ?>

                            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                    <?php endforeach; ?>
                                </p>

                            <?php endif; ?>
                        </td>

                        <td class="cart_price">
                            <p>&#x20a6;<?php echo $this->cart->format_number($items['price']); ?></p>
                        </td>

                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <?php echo form_input(array('name' => $items['rowid']."_qty",'id' => $items['rowid']."_qty", 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'readonly' => true)); ?>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">&#x20a6;<?php echo $this->cart->format_number($items['subtotal']); ?></p>
                        </td>

                    </tr>

                    <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">

                                <tr>
                                    <td>V.A.T</td>
                                    <td>&#x20a6;50</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><span>&#x20a6;<?php echo $this->cart->format_number($this->cart->total()); ?></span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                        <tr>
                            <td class="cart_description">
                                <button type="button" id="btnUse" onclick="proceed_2_pay('<?=$address_id?>', 3)" class="btn btn-primary">
                                    SAVE &amp; CONTINUE
                                </button>

                            </td>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <strong>Total:</strong> <span style="font-size: 32px;">&#x20a6; <?php echo $this->cart->format_number($this->cart->total()); ?></span>
                            </td>
                        </tr>
                    </tbody>

                    <?php }else{ ?>

                        <tbody>
                        <tr>&nbsp;</tr>
                        <tr>
                            <td colspan="5" align='center'>Cart is empty</td>
                        </tr>

                        <tr>
                            <td colspan="5" align='center'>
                                <a type="button" href="<?php echo site_url('home'); ?>"class="btn btn-primary">Back to store</a>
                            </td></tr>
                        </tbody>
                    <?php } ?>

                </table>
            </div>


        <!--2. YOUR ADDRESS-->
        <?php } elseif(!empty($_SESSION['w3_user_id']) && !empty($address_usr_id) ){ ?>

        <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check-circle-o fa-1x"></i> STEP1: YOUR EMAIL</h2>
            </div>

            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP2: YOUR ADDRESS</h2>
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

                    <p><button type="button" id="btnUse" onclick="use_address('<?=$address_id?>', 2)" class="btn btn-primary"> USE THIS ADDRESS </button></p>



                </div><!--/product-information-->
            </div>

                </div>
            </div>


         <!--1. YOUR EMAIL-->
         <?php } elseif(!empty($_SESSION['w3_user_id'])){ ?>

         <div class="step-one">
            <h2 class="heading"> <i class="fa fa-check-circle fa-1x"></i> STEP1: YOUR EMAIL</h2>
        </div>

        <div class="step-one">
            <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP2: YOUR ADDRESS</h2>
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
                                    <?php echo form_dropdown('lga', $drop_lga, '', 'id="localsDrop" ');  ?>
                                <!--<select name="lga" id="localsDrop">

                                </select>-->
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

        <!--0. LOGIN FORM-->
        <?php } else { ?>

        <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP1: YOUR EMAIL</h2>
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
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP2: YOUR ADDRESS</h2>
            </div>
            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP3: ORDER SUMMARY</h2>
            </div>
            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP4: PAYMENT</h2>
            </div>

        <?php } ?>        

    </div>
</section> <!--/#cart_items-->





