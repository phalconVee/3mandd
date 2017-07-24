<h3>Address Book</h3>

<div class="product-details"><!--product-details-->
    <div class="col-sm-9">

        <div class="view-product">

            <p>Your Address</p><hr>
            <p>Billing Address</p>
            <p><?=$_SESSION['w3_fname'].' '.$_SESSION['w3_lname']?> </p>
            <p><i class="fa fa-address"></i> <?=$address?></p>
            <p><i class="fa fa-phone"></i> <?=$telephone?></p>
            <p><i class="fa fa-info"></i> <a href="<?=base_url('customers/address/edit');?>" title="Edit">Edit address</a></p>
        </div>

    </div>
</div><!--/product-details-->