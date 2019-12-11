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
                      <div class="custom-control custom-checkbox mr-sm-2">
                           <input type="checkbox" class="custom-control-input" id="checkbox0" value="check">
                           <label class="custom-control-label" for="checkbox0">Show Password!</label>
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
                         </i> Forgot Password?</a>
                       </div>
                       <div class="col-md-12 mt-5">
                          <button type="button" class="btn btn-sm btn-qr" name="button"
                          data-toggle="modal" data-target="#open-cam">
                          Use QR code</button>
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


<div class="modal" id="qr-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="contact_header">Login Member</h4></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="add-contact-list">
                  <div class="form-group ">
                      <div class="col-xs-12">
                          <label>Username</label>
                          <input class="form-control" type="text" name="username-mem" value="<?php echo set_value('username'); ?>" autocomplete="off" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-xs-12">
                          <label>Password</label>
                          <input class="form-control" type="password" name="password-mem" id="password-mem" autocomplete="off" required>
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary btn-sm open_camera" name="btn-group" id="open_camera" data-toggle="modal"  data-target="#open-cam">
                        Scan QR
                      </button>
                      <button type="submit" class="btn btn-primary btn-sm" name="btn-group">
                        Login Member
                      </button>
                  </div>
            </form>
          </div>
        </div>
    </div>
</div>

<div class="modal" id="open-cam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="modal_content">
            <div class="modal-header">
                <h4 class="modal-title" id="contact_header">SCAN QR CODE</h4></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="alert alert danger" id="err">
            </div>
            <div class="modal-body">
                <video id="preview"></video>
                <h3 class="text-center">OPENING CAMERA...</h3>
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close Cam</button>
              </div>
          </div>
      </div>
  </div>
