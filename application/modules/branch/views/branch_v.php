
<div>
    <!-- Page Title -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor titleheader">Branch List</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master Files</a></li>
                <li class="breadcrumb-item active">Branch List</li>
            </ol>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="button-group ">
                        <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" data-toggle="modal" data-target="#add_Branch"><i class="fa fa-plus-circle"></i> Create</button>
                    </div>
                        <div class="table-responsive">
                            <table id="tbl_branch" class="color-table success-table table-bordered table-hover table">
                                <thead>
                                    <tr>
                                        <th>Branch</th>
                                        <th>Branch Code</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- DATA SOURCE ON my-jquery.js var table_branch -->
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD BRANCH MODAL -->
    <?php $class->load_modal('addBranchModal'); ?>
    <!-- END ADD BRANCH MODAL -->

    <!-- EDIT BRANCH MODAL -->
    <?php $class->load_modal('editBranchModal'); ?>
    <!-- END EDIT MODAL -->
</div>
