
<div>
    <!-- Page Title -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor titleheader">Member List</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master Files</a></li>
                <li class="breadcrumb-item active">Member List </li>
            </ol>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="button-group ">
                        <a href="<?php echo base_url('members/form') ?>" class="btn waves-effect waves-light btn-outline-warning btn-sm" ><i class="fa fa-plus-circle"></i> Create</a>
                    </div>
                        <div class="table-responsive">
                            <table id="memberlist" class="table  color-table success-table tablesaw table-bordered table-hover table no-wrap">
                                <thead>
                                    <tr>
                                        <th>Account ID</th>
                                        <th>Member Name</th>
                                        <th>Gender</th>
                                        <th>Birth Date</th>
                                        <th>Age</th>
                                        <th>Branch</th>
                                        <th>Member Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DATA LOADED VIA AJAX -->
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('viewMemberModal'); ?>
<?php $this->load->view('accountInformationModal' , $others); ?>
