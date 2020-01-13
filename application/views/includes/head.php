<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="<?php echo base_url() ?>assets/node_modules/jquery/jquery.min.js"></script>
    <!-- SELECTIZE THEME -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/node_modules/selectize/selectize.bootstrap2.css">
    <script src="<?php echo base_url() ?>assets/node_modules/jqueryui/jquery-ui.js"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
    <!-- FOR SIGNATURE -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>custom/signature/css/jquery.signature.css">
    <script src="<?php echo base_url(); ?>custom/signature/js/jquery.signature.min.js" charset="utf-8">
    </script>
    <!-- END SIGNATURE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- date picker -->
    <link href="<?php echo base_url(); ?>assets/node_modules/daterangepicker/daterangepicker.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/node_modules/icheck/skins/all.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/gallery/icon.png">
    <title>BUPHARCO</title>

    <script src="<?php echo base_url(); ?>assets/node_modules/Chart.js/Chart.bundle.js"></script>
    <script src="https://www.jsdelivr.com/package/npm/chart.js?path=dist" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css"
       href="<?php echo base_url() ?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link href="<?php echo base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/pages/table-pages.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/pages/dashboard1.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/colors/default.css" id="theme" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/pages/icon-page.css" rel="stylesheet">
     <link href="<?php echo base_url()?>assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>custom/css/custom.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/dropify/dist/css/dropify.min.css">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <input id="base_url" type="hidden"  value="<?php echo base_url(); ?>">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" >
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading...</p>
        </div>
    </div>

    <div id="main-wrapper">

        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>home">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url(); ?>assets/images/gallery/icon.png" alt="homepage" class="ilogo" />
                            <!-- Light Logo icon -->
                             <img src="<?php echo base_url(); ?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="<?php echo base_url(); ?>assets/images/gallery/text.png" alt="homepage" class="blogo"/>
                         <!-- Light Logo text -->
                         <img src="<?php echo base_url(); ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item hidden-xs-down">
                            <a href="#" class="nav-link btn waves-effect waves-light ">Create</a>
                        </li>

                        <li class="nav-item hidden-xs-down">
                            <a href="#" class="nav-link btn waves-effect waves-light ">Edit</a>
                        </li>

                        <li class="nav-item hidden-xs-down">
                            <a href="#" class="nav-link btn waves-effect waves-light ">Delete</a>
                        </li>

                        <li class="nav-item hidden-xs-down">
                            <a href="#" class="nav-link btn waves-effect waves-light ">Print</a>
                        </li> -->

                        <!-- <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="icon-Magnifi-Glass2"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-Box-Close"></i></a> -->
                            <div class="dropdown-menu animated bounceInDown">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="<?php echo base_url(); ?>assets/images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                        <!-- Accordian -->
                                        <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Collapsible Group Item #1
                                                </a>
                                              </h5> </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Collapsible Group Item #2
                                                </a>
                                              </h5> </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Collapsible Group Item #3
                                                </a>
                                              </h5> </div>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/profile/profile.jpg" alt="user" class="" /> <span class="hidden-md-down"><?php echo sesdata('username'); ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo base_url(); ?>assets/profile/profile.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION['email'] ;?></h4>
                                              </div>
                                        </div>

                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo base_url();?>home"><i class="ti-user"></i> My Profile</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo base_url()?>logout/logout_user"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    <li> <a class=" waves-effect waves-dark" href="<?php echo base_url('home') ?>" aria-expanded="false">
                      <i class="fas fa-chart-area"></i><span class="hide-menu">Dashboard</span></a></li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Dashboard"></i><span class="hide-menu">System</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('users') ?>"><i class="ti-user"></i> User List </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Master Files</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('branch'); ?>"><i class="ti-list"></i> Branch List</a></li>
                                <li><a href="<?php echo base_url('members'); ?>"><i class="ti-list"></i> Member List</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Box-Full"></i><span class="hide-menu">Transactions</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('insurance'); ?>"><i class="ti-list"></i> Member Insurance List</a></li>
                                <li><a href="<?php echo base_url('members/member_id') ?>"><i class="icon-ID-3"></i> Member ID</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="ti-mobile"></i><span class="hide-menu">SMS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>sms">SMS Template</a></li>
                                <li><a href="<?php echo base_url()?>sms/create_sms">Create SMS</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-small-cap">- FORMS, TABLE &amp; WIDGETS</li> -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Receipt-4"></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('reports'); ?>">New Members</a></li>
                                <li><a href="<?php echo base_url('reports/full_pledge'); ?>">Full Pledge Members</a></li>
                                <li><a href="<?php echo base_url('reports/pmesReport'); ?>">PMES Honorarium</a></li>
                                <li><a href=" <?php echo base_url('reports/membership_statistic'); ?>">Membership Statistics</a></li>
                                <li><a href="<?php echo base_url('reports/withdrawalReport') ?>">Withdrawal of Membership</a></li>
                                <li><a href="<?php echo base_url('reports/get_summary'); ?>">Total Member Summary</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
