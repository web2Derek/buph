<!-- Page Title -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor titleheader">Membership Statistic</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Membership Statistic</a></li>
            <li class="breadcrumb-item active">Membership Statistic</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-primary filter_table_btn" name="button">
                <a href="<?php echo base_url('reports/getMemberStatistic');?>" class="d-file">
                  GENERATE REPORT
                </a>
              </button>
                <!-- <form class="" action="" method="POST" id="filterMemberStat">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title mt-3">Filter By Date:</h4>
                             <div class='input-group mb-3'>
                                 <input type='text' name="fp_singledate" class="form-control singledate" id="fp_singledate"/>
                                 <div class="input-group-append">
                                     <span class="input-group-text">
                                         <span class="ti-calendar"></span>
                                     </span>
                                 </div>
                             </div>
                        </div>

                        <div class="col-md-4">
                            <h4 class="card-title mt-3">Branch:</h4>
                            <div class='input-group mb-3'>
                              <select class="form-control" name="mem_type" id="mem_type"> -->
                                  <!-- <?php //foreach( $branch as $keys ):?>
                                  <option value="<?php//$keys['branch_id']; ?>"> <?php// $keys['branch_name'];?> </option>
                                  <?php //endforeach;?>
                              </select>

                            </div>
                        </div> -->

                        <!-- <div class="col-md-4">
                            <label for=""><br><br></label>
                            <div class='input-group mb-3'>
                                <button type="submit" class="btn btn-primary filter_table_btn fil_clear" id="filter_table">
                                 Search
                                </button>
                                &nbsp;
                              <button type="submit" class="btn btn-primary filter_table_btn fil_clear" >
                                Clear
                              </button>
                            </div>
                        </div>

                    </div>
                </form> -->
            </div>
        </div>
    </div>
</div>
    <!-- End Page Title -->
    <!-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> -->
                  <!-- DATE AND BRANCH FILTER -->

                       <!-- TABLE FOR NEW MEMBERS -->
                        <!-- <table id="member_stats" class="color-table success-table table display table-bordered table-striped no-wrap" role="">
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Account ID</th>
                                    <th>Member Type</th>
                                    <th>Address</th>
                                    <th>Birth Date</th>
                                    <th>Age</th>
                                    <th>Blood Type</th>
                                    <th>Gender</th>
                                    <th>Civil Status</th>
                                    <th>Religion</th>
                                </tr>
                            </thead>
                            <tbody> -->
                          <!-- DATA RETRIEVE FROM AJAX -->
                            <!-- </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade bd-example-modal-lg" id="viewMember" tabindex="-1" role="dialog" aria-labelledby="viewMember" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Member details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

        </div>
      </div>
    </div>
  </div>
</div>
