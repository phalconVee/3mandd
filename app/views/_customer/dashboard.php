<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">

            <h1>Newsletters</h1>
            <h2>Be the first to know</h2>
            <p>Get amazing offers right in your email</p>
            <p>You are currently not subscribed to any newsletter</p>
            <button type="button" class="btn btn-default cart">Subscribe Now!</button>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->

            <img src="<?=base_url();?>assets/theme/images/product-details/new.jpg" class="newarrival" alt="" />

            <h2>Hello <?= $_SESSION['w3_fname']?>&nbsp;<?= $_SESSION['w3_lname']?>!</h2>

            <h3>My Account Details</h3>

            <p><?=$_SESSION['w3_email'];?></p>

								<span>
									<label><a href="">Edit Email</a> | <a href="">Change Password</a></label>

									<button type="button" class="btn btn-default cart">
                                        Add Phone Number
                                    </button>
								</span>

        </div><!--/product-information-->
    </div>
</div><!--/product-details-->