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
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/gallery/icon.png">
    <title>AdminWrap - Easy to Customize Bootstrap 4 Admin Template</title>
	   <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
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

<body class="fix-header card-no-border fix-sidebar">
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

          <div class="select-branch" style="background-image:url(../assets/images/background/login-register.jpg);">
              <div class="login-box card">
                  <div class="card-body">

                    <?php if(isset($_SESSION['error'])){ ?>
                              <div class="alert alert-danger text-center">
                                    <?php echo $this->session->flashdata('error');; ?>
                              </div>
                    <?php } ?>

                      <form class="form-horizontal" id="loginform" method="POST" action="<?php echo base_url('applicants/selectedBranch'); ?>">

                        <a href="javascript:void(0)" class="text-center img-logo"><img src="<?php echo base_url() ?>assets/images/gallery/logo.jpg" id="img-logo" alt="Home" /></a>

                          <h3 class="box-title m-b-20 text-center">Please Select Branch</h3>

                          <div class="form-group ">
                              <div class="col-xs-12">
                                  <select class="form-control" name="branch_name">

                                      <?php foreach($branch as $values => $keys):?>

                                      <option value="<?=$keys['branch_id']; ?>"> <?= $keys['branch_name'];?> </option>

                                      <!-- <option value="Aglanyan">Aglanyan</option>
                                      <option value="BMBL Aglanyan">BMBL Aglanyan</option>
                                      <option value="BMBL Valencia">BMBL Valencia</option>
                                      <option value="Calinan">Calinan</option>
                                      <option value="Don Carlos">Don Carlos</option>
                                      <option value="Kisolon">Kisolon</option> -->
                                    <?php endforeach;?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group text-center">
                              <div class="col-xs-12 p-b-20">
                                  <input class="btn btn-block btn-lg btn-info" id="btn-login" name="mem-btn-branch" value="Select Branch" type="submit">
                              </div>
                          </div>

                      </form>
                  </section>
          <!-- ============================================================== -->
          <!-- End Page wrapper  -->
          <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Wrapper -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- All Jquery -->
      <!-- ============================================================== -->
      <script src="<?php echo base_url()?>assets/node_modules/jquery/jquery.min.js"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="<?php echo base_url()?>assets/node_modules/bootstrap/js/popper.min.js"></script>
      <script src="<?php echo base_url()?>assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="<?php echo base_url()?>assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
      <!--Wave Effects -->
      <script src="<?php echo base_url()?>assets/js/waves.js"></script>
      <!--Menu sidebar -->
      <script src="<?php echo base_url()?>assets/js/sidebarmenu.js"></script>
      <!--stickey kit -->
      <script src="<?php echo base_url()?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
      <script src="<?php echo base_url()?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
      <!--Custom JavaScript -->
      <script src="<?php echo base_url()?>assets/js/custom.min.js"></script>
      <!-- ============================================================== -->
      <!-- Style switcher -->
      <!-- ============================================================== -->
      <script src="<?php echo base_url()?>assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
  </body>

  </html>
