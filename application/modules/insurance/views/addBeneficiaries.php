<div class="modal fade bd-example-modal-lg long-modal" id="AddBeneficiaries" tabindex="-1" role="dialog" aria-labelledby="Dependent" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add Beneficiaries to receive the benefits</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form id="AddBeneficiariesBenefits">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control custom-select" tabindex="1" name="type" id="type">
                                    <option value="Primary" >Primary</option>
                                    <option value="Secondary">Secondary</option>
                                </select>
                                <span class="err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ben_full_name">Full Name</label>
                                <input type="text" class="form-control" name="ben_full_name" id="ben_full_name">
                                <span class="err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ben_birthdate">Birth Date</label>
                                <input type="text" class="form-control mydatepicker" name="ben_birthdate" id="ben_birthdate" autocomplete="off">
                                <span class="err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ben_relationship">Relationship</label>
                                <input type="text" class="form-control" name="ben_relationship" id="ben_relationship">
                                <span class="err"></span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                <button type="submit" class="btn btn-outline-warning"><i class="far fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
