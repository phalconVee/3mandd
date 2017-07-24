<h3>Edit account</h3>
<div class="product-details"><!--product-details-->
    <div class="col-sm-9">
        <?php if(!empty($notice)) { ?><div class="alert-success" style='text-align: center; padding: 10px;'><?php echo $notice; ?></div><br> <?php } ?>

        <?php echo validation_errors('<div class=\'alert-danger\' style=\'text-align: center; padding: 10px;\'>', '</div>'); ?>

        <div class="login-form">

            <?php foreach($profile as $row){
                $uname = $row->usr_name;
                $fname = $row->usr_fname;
                $lname = $row->usr_lname;
                $gender = $row->gender;
                $email  = $row->usr_email;
            }
            ?>

            <form action="<?=base_url('customers/account/update_account/');?>" method="post" id="forms">

                <input type="hidden" name="usr_id" value="<?=$_SESSION['w3_user_id']?>" />

                <div class="form-group">
                    <label>Username *</label>
                    <input type="text" name="usr_name" value="<?=$uname?>" />
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>First Name *</label>
                    <input type="text" name="usr_fname" value="<?=$fname;?>" />
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>Last Name *</label>
                    <input type="text" name="usr_lname" value="<?=$lname?>"/>
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>Gender *</label>
                    <select name="gender" class="form-control" value="<?=$gender?>">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>

                    </select>
                    <span class="help-block"></span>
                </div>

                <div class="form-group">
                    <label>Current Email</label>
                    <input type="text" name="usr_email" value="<?=$email?>" readonly/>
                    <span class="help-block"></span>
                </div>

                *Required fields
                <button type="submit" class="btn btn-primary"> SAVE</button>

            </form>

        </div>

    </div>
</div><!--/product-details-->