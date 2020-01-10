<div class="container" style="">
    <div class="card alert alert-danger vid_error_warning">
        <div class="card-body">
            <h2>Please Complete the Video to complete the Registration.
            Click on the link.</h2>
        </div>
    </div>
</div>

<div>
  <!-- Page Title -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor titleheader"><?php //echo ($isEdit ? 'Update' : 'Add') ?> PMES</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Master Files</a></li>
        <li class="breadcrumb-item active"> Seminar</li>
      </ol>
    </div>
  </div>
  <!-- End Page Title -->

  <div class="row">
    <div class="col-12">
      <div class="card wizard-content">
        <div class="card-body">
          <h6>PMES VIDEO</h6>
          <section>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class=" col-md-12 col-sm-12 ">
                    <!-- HIDDE USER ID TO USE WHEN UPDATE USER -->
                    <input type="hidden" name="members_id" id="members_id" value="<?php echo $_SESSION['member_id'];?>">
                    <input type="hidden" name="prev_time" id="prev_time" value="<?php echo $_SESSION['previous_session'];?>">

                    <video id="pmesVid" width="100%" height="500" controls>
                      <source src="<?php echo base_url()?>assets/pmes_video/pmes.mp4" type="video/mp4">
                      Your browser does not support HTML5 video.
                    </video>

                    <button type="button" class="btn btn-primary btn-md nextStep" name="nextStep">
                      <a href="<?php echo base_url('applicants/paymentPage'); ?>" class="pay_link">
                        Next Step
                      </a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- REMIND USER NOT TO CLOSE BROWSER -->
<div class="modal fade in" id="pmes_notif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">NOTIFICATION</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
                <div class="modal-body">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="text-justify">Please don't close the Browser or refresh the Page.
                      This will not save your progress.</h3>
                    </div>
                  </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>

        </div>
    </div>
</div>

<!-- MODAL TO WARN USER TO COMPLETE THE VIDEO -->
<div class="modal fade in" id="vid_error_warning" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">WARNING</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
                <div class="modal-body">
                  <h3 class="text-justify">Complete the video to proceed to the Next Step.</h3>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>

        </div>
    </div>
</div>
