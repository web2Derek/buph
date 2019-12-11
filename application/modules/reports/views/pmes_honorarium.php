<!-- Page Title -->
<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor titleheader">Reports</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">PMES Honorarium</a></li>
            </ol>
        </div>
    </div>
<!-- End Page Title -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="" action="" method="POST" id="filterTable">
                    <div class="row">

                        <div class="col-md-4">
                            <h4 class="card-title mt-4">Filter By Date:</h4>
                             <div class='input-group mb-3'>
                                 <input type='text' name="singledate" class="form-control singledate" id="pmesDate" autocomplete="off"/>
                                 <div class="input-group-append">
                                     <span class="input-group-text">
                                         <span class="ti-calendar"></span>
                                     </span>
                                 </div>
                             </div>
                        </div>

                        <div class="col-md-4">
                            <h4 class="card-title mt-4">Branch:</h4>
                             <div class='input-group '>
                                 <select  id="pmes_branch" name="pmes_branch" class="form-control" placeholder="Select Branch">
                                     <?php foreach ($branch as $key => $list): ?>
                                       <option value="<?= $list['branch_id'] ?>"><?= $list['branch_name'] ?></option>
                                     <?php endforeach; ?>
                                 </select>
                             </div>
                        </div>

                        <div class="col-md-4">
                            <h4 class="card-title mt-4"> <br> </h4>
                             <div class='input-group mb-3'>
                                <button type="button" class="btn btn-primary filter_table_btn fil_clear" id="filter_pmes" name="filter_pmes">
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
                    <table id="pmes_report" class="color-table success-table table display table-bordered table-striped no-wrap" role="">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Sponsor/Facilitator</th>
                                <th>Member</th>
                                <th>Branch</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- DATA LOADED FROM AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
