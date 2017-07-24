<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$meta_title;?></title>

    <!-- Bootstrap -->
    <link href="<?=base_url();?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url();?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url();?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url();?>assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url();?>assets/admin/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>


    <div class="login_wrapper">

        <!--display global alert messages -->
        <?php if(!empty($notice)) { ?><div class="alert-danger"><?php echo $notice; ?></div><br/> <?php } ?>

        <div class="animate form login_form">
            <section class="login_content">

                <?php if(!empty($error_msg)) { echo  "<div class='alert-danger'>$error_msg</div>"; } ?>

                <?php echo validation_errors('<div class="alert-danger">', '</div>'); ?>

                <form method="post" action="<?=current_url()?>" autocomplete="off">

                    <h1>Login Form</h1>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Username" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div>

                        <input type="submit" class="btn btn-default submit" value="Login" />
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> 3m&amp;d</h1>
                            <p>©2016 All Rights Reserved</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">

                <?php echo validation_errors('<div class="alert-danger">', '</div>'); ?>

                <form method="post" action="<?=base_url('admin/create/save');?>">

                    <h1>Create Admin</h1>
                    <div>
                        <?php echo form_dropdown('group_id', $drop_group, '', 'class="form-control"');  ?>
                    </div>

                    <div>&nbsp;</div>

                    <div>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name" />
                    </div>
                    <div>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name"/>
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Email" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div>
                        <input type="number" name="telephone" class="form-control" placeholder="Telephone" />
                    </div>

                    <div>&nbsp;</div>

                    <div>
                       <?php echo form_dropdown('state_id', $drop_states, '', 'id="statesdrp" class="form-control"');  ?>
                    </div>

                    <div>&nbsp;</div>

                    <div>
                         <?php echo form_dropdown('local_id', $drop_lga, '', 'id="localsDrop" class="form-control"');  ?>
                    </div>

                    <div>&nbsp;</div>

                    <div>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div>&nbsp;</div>

                    <div>
                        <textarea name="address" placeholder="Your place of residence" rows="8"></textarea>
                    </div>

                    <div>&nbsp;</div>

                    <div>
                        <button type="submit" class="btn btn-default submit">Save</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> 3m&amp;d</h1>
                            <p>©2016 All Rights Reserved.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<script src="<?=base_url();?>assets/admin/vendors/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#statesdrp").change(function(){
            $.ajax({
                type: "POST",
                url:  '<?php echo site_url("ajax_controller/populateLGA")?>',
                data: {id: $(this).val()},
                success: function(data){
                    $("#localsDrop").html(data);
                }

            });

        });
    });

</script>


</body>
</html>
