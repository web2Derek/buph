  <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
              <div class="login-box card">
                  <div class="card-body">

                    <!-- <?php if(isset($_SESSION['error'])){ ?>
                              <div class="alert alert-danger text-center">
                                    <?php echo $this->session->flashdata('error');; ?>
                              </div>
                    <?php } ?> -->

                      <form class="form-horizontal" id="forgotpassword">
                        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                        <input type="hidden" name="info" value="<?php echo $info_id; ?>">
                        <a href="javascript:void(0)" class="text-center img-logo"><img src="<?php echo base_url() ?>assets/images/gallery/logo.jpg" id="img-logo" alt="Home" /></a>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label>New Password</label>
                                <input class="form-control" type="password" name="new_password" autocomplete="off">
                                <span class="err"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" name="confirm_password"  autocomplete="off">
                                <span class="err"></span>
                            </div>
                        </div>

                          <div class="form-group text-center">
                              <div class="col-xs-12 p-b-20">
                                  <button class="btn btn-block btn-lg btn-info" id="btn-login" type="submit">
                                    Update Password
                                  </button>
                              </div>
                          </div>

                      </form>

                  </div>
              </div>
          </div>
