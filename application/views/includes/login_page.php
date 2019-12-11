<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon.png">
  <title>BUPHARCO</title>
  <!-- <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" /> -->
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- page css -->
  <link href="<?php echo base_url() ?>assets/css/pages/login-register-lock.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

<!-- CUSTOM COLOR AND CSS -->
  <link href="<?php echo base_url() ?>custom/css/custom.css" rel="stylesheet">

  <!-- You can change the theme colors from here -->
  <link href="<?php echo base_url() ?>assets/css/colors/default.css" id="theme" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
      <div class="loader">
          <div class="loader__figure"></div>
          <p class="loader__label">Admin Wrap</p>
      </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->

  <section id="wrapper">

        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">

                  <?php if(isset($_SESSION['error'])){ ?>
                            <div class="alert alert-danger text-center">
                                  <?php echo $this->session->flashdata('error');; ?>
                            </div>
                  <?php } ?>

                    <form class="form-horizontal" id="loginform" method="post" action="<?php echo base_url()?>login/auth">

                      <a href="javascript:void(0)" class="text-center img-logo"><img src="<?php echo base_url() ?>assets/images/gallery/logo.jpg" id="img-logo" alt="Home" /></a>

                          <h3 class="box-title m-b-20 text-center">Login your Credentials</h3>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label>Username</label>
                                <input class="form-control" type="text" name="username" value="<?php echo set_value('username'); ?>" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" id="password" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-info pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox" class="filled-in chk-col-light-blue">
                                    <label for="checkbox-signup"> Show Password </label>
                                  </div>
                            </div>
                          </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <input class="btn btn-block btn-lg btn-info" id="btn-login" name="btn-login" value="Log In" type="submit">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                 <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5">
                                 </i> Forgot Password?</a> </div>
                        </div>

                    </form>

                    <!--FORGOT PASSWORD FORM  -->
                    <form method="POST" class="form-horizontal" id="recoverform" action="<?php echo base_url('login/process_reset');?>">
                        <a href="javascript:void(0)" class="text-center img-logo"><img src="<?php echo base_url() ?>assets/images/gallery/logo.jpg" id="img-logo" alt="Home" /></a>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3 class="text-center">Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" name="email" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" id="reset-btn" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>


  <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url() ?>assets/node_modules/jquery/jquery.min.js"></script>

  <!-- Bootstrap tether Core JavaScript -->
  <script src="<?php echo base_url() ?>assets/node_modules/bootstrap/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
  <!--Custom JavaScript -->

  <!-- SHOW PASSSWORD -->
  <script type="text/javascript">
      $('document').ready(function(){
        $('#checkbox-signup').on('change',function() {
          let isCheck = $(this).prop('checked');
          if(isCheck) {
            $('#password').attr('type', 'text');
          } else {
            $('#password').attr('type', 'password');
          }
        });
      });

      $(function() {
          $(".preloader").fadeOut();
      });
      $(function() {
          $('[data-toggle="tooltip"]').tooltip()
      });
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
      $('#to-recover').on("click", function() {
          $("#loginform").slideUp();
          $("#recoverform").fadeIn();
      });
  </script>

</body>

</html>
