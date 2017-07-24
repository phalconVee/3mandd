<div class="left-sidebar">

    <div class="brands_products"><!--brands_products-->
        <h2>My Account</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">

                <?php if($navigation == 'account'){ ?>
                    <li><a href="<?=base_url('customers/account/');?>" style="color: #272f6d;"> Account Dashboard</a></li>
                <?php }else{ ?>
                    <li><a href="<?=base_url('customers/account/');?>"> Account Dashboard</a></li>
                <?php } ?>

                <?php if($navigation == 'edit'){ ?>
                    <li><a href="<?=base_url('customers/account/edit');?>" style="color: #272f6d;"> Personal Information</a></li>
                <?php }else{ ?>
                    <li><a href="<?=base_url('customers/account/edit');?>"> Personal Information </a></li>
                <?php } ?>

                <?php if($navigation == 'address'){ ?>
                    <li><a href="<?=base_url('customers/address/');?>" style="color: #272f6d;">Address Book </a></li>
                <?php }else{ ?>
                    <li><a href="<?=base_url('customers/address/');?>"> Address Book</a></li>
                <?php } ?>

                <?php if($navigation == 'orders'){ ?>
                    <li><a href="<?=base_url('customers/order/');?>" style="color: #272f6d;"> My Orders</a></li>
                <?php }else{ ?>
                    <li><a href="<?=base_url('customers/order/');?>"> My Orders</a></li>
                <?php } ?>

                <?php if($navigation == 'newsletter'){ ?>
                    <li><a href="<?=base_url('customers/verification/');?>" style="color: #272f6d;">Verify Payment </a></li>
                <?php }else{ ?>
                    <li><a href="<?=base_url('customers/verification/');?>"> Verify Payment </a></li>
                <?php } ?>

                <li><a href="<?=base_url();?>customer/logout">Logout </a></li>

            </ul>
        </div>
    </div><!--/brands_products-->



</div>