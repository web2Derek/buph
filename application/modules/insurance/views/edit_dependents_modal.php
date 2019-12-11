<div class="modal fade bd-example-modal-lg long-modal" id="editDependent" tabindex="-1" role="dialog" aria-labelledby="Dependent" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Edit Dependent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form id="EditDependents">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name(Last,First,Middle)</label>
                                <input type="text" name="e_fullname" id="e_fullname" class="form-control">
                                <span class="err"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Birth Date</label>
                                <input type="text" name="e_birth_date" id="e_birth_date" class="form-control mydatepicker" autocomplete="off">
                                <span class="err"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Relationship</label>
                                <input type="text" name="e_Relationship" id="e_Relationship" class="form-control" autocomplete="off">
                                <span class="err"></span>
                            </div>
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
