<!-- page title -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor titleheader">Total Member Summary</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Total Member Summary</a></li>
            <li class="breadcrumb-item active">Membership Statistic Report</li>
        </ol>
    </div>
</div>
<!-- end Page Title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <!-- DATE AND BRANCH FILTER -->
                    <form class="" action="" method="POST" id="filterMemberStat">
                      <div class="col-md-12 row pt-3">
                          <div class="col-3">
                             <div class='input-group mb-3'>
                                 <input type='text' name="total_mem_sum" class="form-control singledate" id="total_mem_sum"/>
                                 <div class="input-group-append">
                                     <span class="input-group-text">
                                         <span class="ti-calendar"></span>
                                     </span>
                                 </div>
                             </div>
                           </div>
                           <div class="col-3">
                              <div class='input-group mb-3'>
                                  <!-- <input type='text' id="ms_mem_branch" name="mem_branch" class="form-control" placeholder="Select Branch"/> -->
                                <select class="form-control" name="mem_summary" id="mem_summary">
                                    <?php foreach( $branch as $keys => $value ):?>
                                    <option value="<?=$value['branch_id']; ?>"> <?= $value['branch_name'];?> </option>
                                    <?php endforeach;?>
                                </select>

                                  <div class="input-group-append">
                                  </div>
                              </div>
                            </div>
                            <div class="col-3">
                               <div class='input-group mb-3'>
                                  <button type="submit" class="btn btn-primary filter_table_btn" id="filter_table" name="filter_table">
                                    Search
                                  </button>
                               </div>
                             </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- TABLE FOR NEW MEMBERS -->
                    <div class="table-responsive">
                      <table id="member_stats" class="table color-table success-table display table-bordered table-striped no-wrap" role="">
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
                          <tbody>
                        <!-- DATA RETRIEVE FROM AJAX -->
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
