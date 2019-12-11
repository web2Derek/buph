<!-- Page Title -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor titleheader ">Full Pledge Members</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Full Pledge Members</a></li>
            <li class="breadcrumb-item active">Full Pledge Members Report</li>
        </ol>
    </div>
</div>
<!-- End Page Title -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="" action="" method="POST" id="fullPledgeTable">
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
                                 <!-- <input type='text' id="fp_mem_branch" name="fp_mem_branch" class="form-control" placeholder="Select Branch"/> -->
                                 <select class="form-control" name="fp_mem_branch" id="fp_mem_branch">
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
                        <table id="full_pledge" class="table display color-table success-table table-bordered table-striped no-wrap" role="grid">
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
                          <!-- LOAD FROM AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
