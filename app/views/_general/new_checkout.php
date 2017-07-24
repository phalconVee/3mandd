<section id="cart_items" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->


        <!--4. PAYMENT-->
        <?php if(!empty($_SESSION['w3_user_id']) && !empty($id_address) && $type == 3) { ?>

            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check-circle-o fa-1x"></i> STEP1: YOUR EMAIL</h2>
            </div>

            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check-circle-o fa-1x"></i> STEP2: YOUR ADDRESS</h2>
            </div>

            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check-circle-o fa-1x"></i> STEP3: ORDER SUMMARY</h2>
            </div>

            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP4: PAYMENT</h2>
            </div>

            <?php if($_SESSION['usr_group'] == 3){  ?>

        <form action="<?=base_url();?>payment" method="post" class="form-horizontal">

            <?php
            $itemname          = $this->input->get_post('item_name');
            $total_cart_qty    = $this->input->get_post('total_cart_qty');
            $host_charge       = $this->input->get_post('host_charge');
            $host_service      = $this->input->get_post('host_service');
            $emptyQty          = $this->input->get_post('empty_qty');
            $emptyReturn       = $this->input->get_post('empty_ret_qty');
            $invoice_no        = $this->input->get_post('invoice_no');
            $emptyValue        = $this->input->get_post('empty_ret_value');
            $fullValue         = $this->input->get_post('full_value');
            $totalValue        = $this->input->get_post('total_value');
            $emptyReturnValue  = $this->input->get_post('empty_ret_value');
            $balanceToPay      = $this->input->get_post('balance_to_pay');
            $delivery_date     = $this->input->get_post('delivery_date');
            $unit_type         = $this->input->get_post('unit_type');
            $pro_qty           = $this->input->get_post('pro_qty');
            ?>

            <input type="hidden" name="usr_id" value="<?=$_SESSION['w3_user_id'];?>"/>

            <input id="item_name" type="hidden" name="item_name" value="<?=$itemname;?>"/>
            <input id="total_cart_qty" type="hidden" name="total_cart_qty" value="<?=$total_cart_qty;?>"/>
            <input id="empty_qty" type="hidden" name="empty_qty" value="<?=$emptyQty;?>"/>
            <input id="empty_ret_qty" type="hidden" name="empty_ret_qty" value="<?=$emptyReturn;?>"/>
            <input id="empty_value" type="hidden" name="empty_value" value="<?=$emptyValue;?>"/>
            <input id="full_value" type="hidden" name="full_value" value="<?=$fullValue;?>"/>
            <input id="total_value" type="hidden" name="total_value" value="<?=$totalValue;?>"/>
            <input id="empty_ret_value" type="hidden" name="empty_ret_value" value="<?=$emptyReturnValue;?>"/>
            <input id="balance_to_pay" type="hidden" name="balance_to_pay" value="<?=$balanceToPay;?>"/>
            <input type="hidden" name="host_charge" value="<?=$host_charge?>" />
            <input type="hidden" name="host_service" value="<?=$host_service?>" />
            <input type="hidden" name="currency" value="NGN"/>
            <input type="hidden" name="merch_txnref"  value="<?=$invoice_no?>" />
            <input type="hidden" name="current_url" value="<?=current_url();?>"/>
            <input type="hidden" name="delivery_date" value="<?=$delivery_date;?>"/>
            <input id="unit_type" type="hidden" name="unit_type" value="<?=$unit_type?>"/>
            <input id="pro_qty" type="hidden" name="pro_qty" value="<?=$pro_qty?>"/>


            <div class="payment-options">

                <span>
					<label>Extra Charges:</label>
                    <p>Host/Hostess Charge: &#x20a6;<?=$host_charge;?></p>

                    <p>Total:  &#x20a6;<?=number_format($balanceToPay, 2);?></p>
				</span>

                <span style="float: right;margin-top: -65px;">
					<strong style="font-size: 28px;"> &#x20a6;<?=number_format($balanceToPay, 2);?></strong>
				</span>

                <hr>
                <br>

					<span>
						<label><input type="radio" name="payment_option" value="paystack"/>  Paystack</label>
					</span>
					<span style="float: right;">
						<img src="<?=base_url('assets/theme/images/pay/Paystack.png');?>" />
					</span>
                <hr>

                <br>

					<span>
						<label><input type="radio" name="payment_option" value="bank_transfer"/>  Direct Bank Transfer</label>
					</span>
					<span style="float: right;">
						<img src="<?=base_url('assets/theme/images/pay/bank-trans.jpg');?>" />
					</span>
                <hr>

                <br>

					<span>
						<label><input type="radio" name="payment_option" value="pay_later"/>  Pay Later</label>
					</span>
					<span style="float: right;">
						Pay Later
					</span>
                <hr>

                <br>

					<span>
						<label for="box"><input id="box" type="checkbox" required name="terms" value="yes"> I have read and accepted the <a href="">terms and conditions</a></label>
					</span>

					<span style="float: right;">
                        <button class="btn btn-primary" name="submit" type="submit"> PAY NOW</button>
					</span>

            </div>

            </form>

                <?php }else{ ?>

        <form action="<?=base_url();?>payment" method="post" class="form-horizontal">

            <?php
            $itemname          = $this->input->get_post('item_name');
            $total_cart_qty    = $this->input->get_post('total_cart_qty');
            $host_charge       = $this->input->get_post('host_charge');
            $emptyQty          = $this->input->get_post('empty_qty');
            $emptyReturn       = $this->input->get_post('empty_ret_qty');
            $invoice_no        = $this->input->get_post('invoice_no');
            $emptyValue        = $this->input->get_post('empty_ret_value');
            $fullValue         = $this->input->get_post('full_value');
            $totalValue        = $this->input->get_post('total_value');
            $emptyReturnValue  = $this->input->get_post('empty_ret_value');
            $balanceToPay      = $this->input->get_post('balance_to_pay');
            $delivery_date     = $this->input->get_post('delivery_date');
            $unit_type         = $this->input->get_post('unit_type');
            $pro_qty           = $this->input->get_post('pro_qty');
            ?>

            <input type="hidden" name="usr_id" value="<?=$_SESSION['w3_user_id'];?>"/>

            <input id="item_name" type="hidden" name="item_name" value="<?=$itemname;?>"/>
            <input id="total_cart_qty" type="hidden" name="total_cart_qty" value="<?=$total_cart_qty;?>"/>
            <input id="empty_qty" type="hidden" name="empty_qty" value="<?=$emptyQty;?>"/>
            <input id="empty_ret_qty" type="hidden" name="empty_ret_qty" value="<?=$emptyReturn;?>"/>
            <input id="empty_value" type="hidden" name="empty_value" value="<?=$emptyValue;?>"/>
            <input id="full_value" type="hidden" name="full_value" value="<?=$fullValue;?>"/>
            <input id="total_value" type="hidden" name="total_value" value="<?=$totalValue;?>"/>
            <input id="empty_ret_value" type="hidden" name="empty_ret_value" value="<?=$emptyReturnValue;?>"/>
            <input id="balance_to_pay" type="hidden" name="balance_to_pay" value="<?=$balanceToPay;?>"/>
            <input type="hidden" name="host_charge" value="<?=$host_charge?>" />
            <input type="hidden" name="currency" value="NGN"/>
            <input type="hidden" name="merch_txnref"  value="<?=$invoice_no?>" />
            <input type="hidden" name="current_url" value="<?=current_url();?>"/>
            <input id="unit_type" type="hidden" name="unit_type" value="<?=$unit_type?>"/>
            <input id="pro_qty" type="hidden" name="pro_qty" value="<?=$pro_qty?>"/>

            <div class="payment-options">

                <span>
					<label>Extra Charges:</label>
                    <p>Host/Hostess Charge: &#x20a6;<?=$host_charge;?></p>

                    <p>Total:  &#x20a6;<?=number_format($balanceToPay, 2);?></p>
				</span>

                <span style="float: right;margin-top: -65px;">
					<strong style="font-size: 28px;"> &#x20a6;<?=number_format($balanceToPay, 2);?></strong>
				</span>

                <hr>
                <br>



					<span>
						<label><input type="checkbox"> Paystack</label>
					</span>
					<span style="float: right;">
						<img src="<?=base_url('assets/theme/images/pay/Paystack.png');?>" />
					</span>
                    <hr>

                    <br>

					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span style="float: right;">
						<img src="<?=base_url('assets/theme/images/pay/bank-trans.jpg');?>" />
					</span>
                    <hr>

                    <br>

					<span>
						<label><input type="checkbox"> SimplePay</label>
					</span>
					<span style="float: right;">
						<img src="<?=base_url('assets/theme/images/pay/simplepay.png');?>" />
					</span>
                    <hr>

                    <br>

					<span>
						<label for="box"><input id="box" type="checkbox" required name="terms" value="yes"> I have read and accepted the <a href="">terms and conditions</a></label>
					</span>

					<span style="float: right;">
                        <button class="btn btn-primary" name="submit" type="submit"> PAY NOW</button>
					</span>

                </div>

            </form>

                <?php } ?>

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


        <!--CHECK IF ACTUAL STOCK QUANTITY OF ITEM IS LESS/MORE THAN CART QUANTITY-->
            <?php if($get_stock < $item_qty){ ?>

            <div class="table-responsive cart_info">

                <p style="text-align: center;">
                    <code>This item is Out of Stock in your location, please try again later.</code><br>
                    <a type="button" href="<?php echo site_url('home'); ?>" class="btn btn-primary">Back to store</a>
                </p>

            </div>

                <div class="step-one">
                    <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP4: PAYMENT</h2>
                </div>

            <?php }else{ ?>

            <h3>Select your shipping preference:</h3>

            <form action="#" id="form2" class="form-horizontal">

                <input type="hidden" name="usr_id" value="<?=$_SESSION['w3_user_id'];?>"/>
                <input type="hidden" name="addressid" value="<?=$id_address?>"/>
                <input type="hidden" name="typeid" value="3"/>

                <p>
                 <label for="bc">
                     <input id="bc" type="checkbox" name="i_want_host" value="yes" /> I require host/hostess service (if it's an occasion)
                 </label>
                </p>
                <br/>

                <p>
                 <label>Select your preferred date of delivery<br>
                     <input id="date" name="date_of_delivery" placeholder="yyyy-mm-dd" class="datepicker" type="text" required>
                 </label>
                </p>
                <br/>

                <p><i class="fa fa-truck fa-2x"></i> You will receive your order in 1 shipment</p>

            <div>&nbsp;</div>

            <h3>Your order</h3>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <!--<td class="price"></td>-->
                        <td class="image">ITEM</td>
                        <td class="description"></td>
                        <td class="price">CLASS</td>
                        <td class="quantity">QUANTITY</td>
                        <td class="price">UNIT PRICE</td>
                        <td class="total">SUBTOTAL</td>
                        <td></td>
                    </tr>
                    </thead>

                    <?php $i = 1; ?>

                    <?php if($this->cart->total()>0){  foreach ($this->cart->contents() as $items): ?>

                    <input id="item_name" type="hidden" name="item_name" value="<?=$itemname;?>"/>
                    <input id="total_cart_qty" type="hidden" name="total_cart_qty" value="<?=$total_cart_qty;?>"/>
                    <input id="empty_qty" type="hidden" name="empty_qty" value="<?=$emptyQty;?>"/>
                    <input id="empty_ret_qty" type="hidden" name="empty_ret_qty" value="<?=$emptyReturn;?>"/>
                    <input id="empty_value" type="hidden" name="empty_value" value="<?=$emptyValue;?>"/>
                    <input id="full_value" type="hidden" name="full_value" value="<?=$fullValue;?>"/>
                    <input id="total_value" type="hidden" name="total_value" value="<?=$totalValue;?>"/>
                    <input id="empty_ret_value" type="hidden" name="empty_ret_value" value="<?=$emptyReturnValue;?>"/>
                    <input id="balance_to_pay" type="hidden" name="balance_to_pay" value="<?=$balanceToPay;?>"/>
                    <input id="unit_type" type="hidden" name="unit_type" value="<?=$unit_type?>"/>
                    <input id="pro_qty" type="hidden" name="pro_qty" value="<?=$pro_qty?>"/>

                        <tbody>
                        <tr>

                            <td class="cart_product">
                                <a href="">
                                    <img src="<?=base_url()?>image.php/<?=$items['options']['image'];?>.png?width=120&height=120&cropratio=1:1&image=<?=base_url();?>assets/store/<?=$items['options']['image'];?>" alt="<?=$items['name']?>">
                                </a>
                            </td>

                            <td class="cart_description">
                                <?php echo $items['name']; ?>
                            </td>

                            <td class="cart_description">
                                <?php $class = $items['options']['class']; ?>
                                <?php if($class == 1){echo 'Crate'; }elseif($class == 2){ echo 'Can';}else{ echo 'Pet';} ?>
                            </td>

                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <?=$items['qty']?>
                                </div>
                            </td>

                            <td class="cart_price">
                                <p>&#x20a6;<?php echo $this->cart->format_number($items['price']); ?></p>
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
                                        <td>Empty Quantity:</td>
                                        <td><?=$emptyQty;?></td>
                                        <td>Empty Value:</td>
                                        <td>&#x20a6;<?=number_format($emptyValue, 2);?></td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>Full Value Total:</td>
                                        <td>&#x20a6;<?=number_format($fullValue, 2);?></td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>Total Value:</td>
                                        <td>&#x20a6;<?=number_format($totalValue, 2);?></td>
                                    </tr>

                                    <tr>
                                        <td>Empty Return Quantity:</td>
                                        <td><?=$emptyReturn;?></td>
                                        <td>Empty Return Value:</td>
                                        <td>&#x20a6;<?=number_format($emptyReturnValue, 2);?></td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><strong>Balance To Pay:</strong></td>
                                        <td><span>&#x20a6;<?=number_format($balanceToPay, 2);?></span></td>
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
                                <strong>Total:</strong> <span style="font-size: 32px;" id="n_total">&#x20a6; <?=number_format($balanceToPay, 2);?></span>
                            </td>
                        </tr>
                        </tbody>

            </form>

                    <?php }else{ ?>

                        <tbody>
                        <tr>&nbsp;</tr>
                        <tr>
                            <td colspan="5" align='center'>Cart is empty</td>
                        </tr>

                        <tr>
                            <td colspan="5" align='center'>
                                <a type="button" href="<?php echo site_url(); ?>"class="btn btn-primary">Back to store</a>
                            </td></tr>
                        </tbody>
                    <?php } ?>

                </table>
            </div>


                <?php } ?>

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

            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP3: ORDER SUMMARY</h2>
            </div>

            <div class="step-one">
                <h2 class="heading"> <i class="fa fa-check fa-1x"></i> STEP4: PAYMENT</h2>
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

            <?php echo validation_errors("<div class='alert-danger' style='text-align: center; padding: 10px;'>", "</div>"); ?>

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

                                <form action="<?=base_url();?>singlepagecheckout/signup" method="post" id="form2">
                                    <input type="text" name="u_name" placeholder="Username"/>
                                    <input type="email" name="u_email" placeholder="Email Address"/>
                                    <input type="password" name="u_password" placeholder="Password"/>
                                    <!--<button type="submit" class="btn btn-default">Signup</button>-->

                                    <input type="submit" class="btn btn-default" value="Signup"/>
                                </form>

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





