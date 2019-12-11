<!-- Page Title -->
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor titleheader">New Members</h3>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">New Members</a></li>
              <li class="breadcrumb-item active">New Members Report</li>
          </ol>
      </div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="" action="" method="POST" id="filterTable">
                        <div class="row">
                            <div class="col-md-4">
                                    <h4 class="card-title mt-3">Filter By Date:</h4>
                                <div class='input-group mb-3'>
                                    <input type='text' name="singledate" class="form-control singledate" id="singledate" autocomplete="off"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <h4 class="card-title mt-3">Branch:</h4>
                                <div class='input-group'>
                                    <select class="form-control" name="mem_branch" id="mem_branch">
                                        <?php foreach($branchList as $keys):?>
                                        <option value="<?=$keys['branch_name']; ?>"> <?= $keys['branch_name'];?> </option>
                                        <?php endforeach;?>
                                    </select>
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for=""><br><br></label>
                                <div class='input-group mb-3'>
                                   <button type="submit" class="btn btn-primary filter_table_btn fil_clear" id="filter_table" name="filter_table">
                                     Search
                                   </button>
                                      &nbsp;
                                   <button type="submit" class="btn btn-primary filter_table_btn fil_clear "  name="filter_table">
                                     Clear
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
                    <div class="table-responsive">
                        <table id="newlist" class="table color-table success-table display table-bordered table-striped no-wrap" role="">
                            <thead>
                                <tr>
                                    <th>Name of Members</th>
                                    <th>Address</th>
                                    <th>Date of Membership</th>
                                    <th>Gender</th>
                                    <th>Birth Date</th>
                                    <th>Age</th>
                                    <th>CBU</th>
                                    <th>Savings</th>
                                    <th>Type of Membership</th>
                                    <th>Sponsor</th>
                                    <th>Facilitator</th>
                                    <th>Branch</th>
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
    <!-- End Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <!-- DATE AND BRANCH FILTER -->

                       <!-- TABLE FOR NEW MEMBERS -->

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade bd-example-modal-lg" id="viewMember" tabindex="-1" role="dialog" aria-labelledby="viewMember" aria-hidden="true">
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
</div> -->

<script>

</script>
