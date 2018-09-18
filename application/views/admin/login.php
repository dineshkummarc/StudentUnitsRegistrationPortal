<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>

<title>Log In</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <style>

/* ---------------------------------------------------------------------- */
/*  Login
/* ---------------------------------------------------------------------- */
.main-login {
  margin-top: 65px;
  position: relative;
}
@media (max-width: 991px) {
  .main-login {
    margin-top: 65px;
  }
}
.main-login .logo {
  padding: 0 10px;
}
.main-login .box-login, .main-login .box-forgot, .main-login .box-register {
 // background: #FFFFFF;
   background: #eee;
  border-radius: 5px;
  overflow: hidden;
  padding: 15px;
  margin: 15px 0 65px 0;
}
.main-login .form fieldset {
  border: none;
  margin: 0;
  padding: 10px 0 0;
}
.main-login a.forgot {
  color: #909090;
  font-size: 12px;
  position: absolute;
  right: 10px;
  text-shadow: 1px 1px 1px #FFFFFF;
  top: 9px;
}
.main-login input.password {
  padding-right: 130px;
}
.main-login label {
  color: #7F7F7F;
  font-size: 14px;
  margin-top: 5px;
}
.main-login .copyright {
  font-size: 11px;
  margin: 0 auto;
  padding: 10px 10px 0;
  text-align: center;
}
.main-login .form-actions:before, .main-login .form-actions:after {
  content: "";
  display: table;
  line-height: 0;
}
.main-login .form-actions:after {
  clear: both;
}
.main-login .form-actions {
  margin-top: 15px;
  padding-top: 10px;
  display: block;
}
.main-login .new-account {
  border-top: 1px dotted #EEEEEE;
  margin-top: 15px;
  padding-top: 10px;
  display: block;
}
p {
    margin: 0;
    margin-bottom: 20px !important;
}
.error{
  color:darkred;
}
</style>

  <!-- Bootstrap -->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href=" <?php echo base_url();?> assets/css/font-awesome.min.css">
      <link rel="stylesheet" href=" <?php echo base_url();?> assets/css/animate.css">
      <link rel="stylesheet" href=" <?php echo base_url();?> assets/css/overwrite.css">
      <link href=" <?php echo base_url();?> assets/css/animate.min.css" rel="stylesheet"> 
      <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" /> 
     <link href=" <?php echo base_url();?> assets/css/wizard.css" rel="stylesheet" /> 
</head>


<body style="" >

     <!-- start: LOGIN -->
     <div class="col-md-12">
        <div class="row">
            <div class="main-login col-xs-10 background-dark col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
             
                <!-- start: LOGIN BOX -->
                <div class="box-login text-dark">

                    <form class="form-login" action="<?php echo base_url() ?>index.php/Home/admin" method="POST">
                        <fieldset>
                            <legend>
                                Sign in
                            </legend>
                           <!-- <p>
                                Please enter your Username and password to log in.
                            </p>-->
                             <p style="color:darkred"><?php echo $this->session->flashdata('login_err');?></p>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="text" class="form-control" autocomplete="off" name="username" id ="username" placeholder="Username">
                                     <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                                </span>
                            </div>
                            <div class="form-group form-actions">
                                <span class="input-icon">
                                    <input type="password" class="form-control password" autocomplete="off" name="password" id="password" placeholder="Password">
                                  <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                 </span>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Login <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                    <!-- start: COPYRIGHT -->
                    <div class="copyright">
                        &copy; <span class="current-year"></span><span class="text-bold text-capitalize">2018 </span>. <span>All rights reserved</span>
                    </div>
                    <!-- end: COPYRIGHT -->
                </div>
                <!-- end: LOGIN BOX -->
            </div>
        </div>
      </div>

</body>
</html>	




