<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
    <div class="login-box card">
        <div class="card-body">

          <?php if(isset($_SESSION['error-mem'])){ ?>
                    <div class="alert alert-danger text-center">
                          <?php echo $this->session->flashdata('error-mem');; ?>
                    </div>
          <?php } ?>

            <form class="form-horizontal" id="loginform" method="post" action="<?php echo base_url()?>applicants/member_account">

              <a href="javascript:void(0)" class="text-center img-logo"><img src="<?php echo base_url() ?>assets/images/gallery/logo.jpg" id="img-logo" alt="Home" /></a>

                <h3 class="box-title m-b-20 text-center">Login Member</h3>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <label>Username</label>
                        <input class="form-control" type="text" name="mem-username" value="<?php echo set_value('username'); ?>" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Password</label>
                        <input class="form-control" type="password" name="mem-password" id="mem-password" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                      <div class="custom-control custom-checkbox mr-sm-2">
                           <input type="checkbox" class="custom-control-input" id="checkbox0" value="check">
                           <label class="custom-control-label" for="checkbox0">Show Password!</label>
                       </div>
                    </div>
                  </div>

                <div class="form-group text-center">
                    <div class="col-xs-12 p-b-20">
                        <input class="btn btn-block btn-lg btn-info" id="btn-mem-login" name="btn-login" value="Log In" type="submit">
                    </div>
                </div>

                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        Don't have an account? <a href="<?php echo base_url('applicants/registration'); ?>" class="text-info m-l-5 signup-link"><b>Sign Up</b></a>
                    </div>
                </div>
            </form>

            <!--FORGOT PASSWORD FORM  -->
            <form class="form-horizontal" id="recoverform">
                <input type="hidden" name="" value="">
                <a href="javascript:void(0)" class="text-center img-logo"><img src="<?php echo base_url() ?>assets/images/gallery/logo.jpg" id="img-logo" alt="Home" /></a>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3 class="text-center">Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text"  name="email" placeholder="Email">
                        <span class="redirect"></span>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" id="reset-btn" type="submit">Reset</button>
                        <div class="spinner-border text-dark" role="status" style="display:none" id="reset_loading">
                          <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
