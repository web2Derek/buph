
<div>
    <!-- Page Title -->
    <div class="row page-titles" style="">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor titleheader">User List</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">System</a></li>
                <li class="breadcrumb-item active">User List </li>
            </ol>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="button-group ">
                        <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" data-toggle="modal" data-target="#add_User"><i class="fa fa-plus-circle"></i> Create</button>
                    </div>

                        <table id="userlist" class="color-table  success-table tablesaw table-bordered table-hover table no-wrap">
                            <thead>
                                <tr>
                                    <th>Complete Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Branch</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

<!-- MODAL -->
<div class="modal fade bd-example-modal-lg" id="add_User" tabindex="-1" role="dialog" aria-labelledby="addUser" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUser">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="form-horizontal mt-4" id="createUserForm">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname">
                            <span class="err"></span>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middlename">
                            <span class="err"></span>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname">
                            <span class="err"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                            <span class="err"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group test">
                            <label>Branch</label>
                            <select class="form-control custom-select" name="branch">
                                <?php foreach ($branch_list as $key => $branch): ?>
                                    <option value="<?= $branch['branch_id']; ?>"><?= $branch['branch_name'];  ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="err"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>User Type</label>
                            <select class="form-control custom-select" name="user_type">
                                <option value="0">Guest</option>
                                <option value="1">Staff</option>
                                <option value="2">Super Admin</option>
                            </select>
                            <span class="err"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                            <span class="err"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                            <span class="err"></span>
                        </div>
                    </div>

                    <div class="col-md-3" id="confirm_password">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
                            <span class="err"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                    <button type="submit" class="btn btn-outline-warning" id="btn_create"><i class="fa fa-plus-circle"></i> Create User</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- END Create MODAL -->

  <!-- EDIT MODAL -->
  <?php $class->load_modal('editUserModal' , $branch_list); ?>
  <!-- END EDIT MODAL -->
</div>
