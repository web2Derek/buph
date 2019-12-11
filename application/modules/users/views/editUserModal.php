
<div class="modal fade bd-example-modal-lg" id="edit_User" tabindex="-1" role="dialog" aria-labelledby="addUser" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="form-horizontal mt-4" id="editeUserForm">
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
                                <option value="1">Administrator</option>
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
                            <input type="email" class="form-control" name="email">
                            <span class="err"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                    <button type="submit" class="btn btn-outline-warning"><i class="far fa-save"></i> Save Changes</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
