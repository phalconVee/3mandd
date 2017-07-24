<h3>Edit address</h3>
<div class="product-details"><!--product-details-->
    <div class="col-sm-9">
        <?php if(!empty($notice)) { ?><div class="alert-success" style='text-align: center; padding: 10px;'><?php echo $notice; ?></div><br> <?php } ?>

        <?php echo validation_errors('<div class=\'alert-danger\' style=\'text-align: center; padding: 10px;\'>', '</div>'); ?>

        <div class="login-form">

            <form action="<?=base_url('customers/address/edit/');?>" method="post" id="forms">

                <input type="hidden" name="address_id" value="<?=$address_id?>" />

                <div class="form-group">
                    <label>First Name *</label>
                    <input type="text" name="firstname" value="<?=$firstname;?>" />
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>Last Name *</label>
                    <input type="text" name="lastname" value="<?=$lastname?>"/>
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>Telephone *</label>
                    <input type="number" name="telephone" value="<?=$telephone?>"/>
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>Address *</label>
                    <input type="text" name="address" value="<?=$address?>"/>
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>State *</label>
                    <?php echo form_dropdown('state', $drop_states, '', 'id="statesdrp" ');  ?>
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>LGA *</label>
                    <?php echo form_dropdown('lga', $drop_lga, '', 'id="localsDrop" ');  ?>
                    <span class="help-block"></span>
                </div>


                *Required fields
                <button type="submit" class="btn btn-primary"> SAVE</button>

            </form>

        </div>

    </div>
</div><!--/product-details-->