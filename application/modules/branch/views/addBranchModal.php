
<div class="modal fade bd-example-modal-lg" id="add_Branch" tabindex="-1" role="dialog" aria-labelledby="add_Branch" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="form-horizontal mt-4" id="addBranchForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="bname">
                            <span class="err"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Branch Code</label>
                            <input type="text" class="form-control" name="bcode">
                            <span class="err"></span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address">
                            <span class="err"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control custom-select" name="status">
                                <option value="0">In-Active</option>
                                <option value="1">Active</option>
                            </select>
                            <span class="err"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                    <button type="submit" class="btn btn-outline-warning btn-sm"><i class="fa fa-plus-circle"></i> Create Branch</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
