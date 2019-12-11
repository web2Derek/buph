
              <div class="col-12">
                   <div class="card">
                       <div class="card-body">
                         <div class="button-group ">
                             <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" data-toggle="modal" data-target="#add_sms"><i class="fa fa-plus-circle"></i> Create</button>
                         </div>

                           <div class="table-responsive">
                               <table id="sms_table" class="display table table-hover table-striped table-bordered">
                                   <thead>
                                       <tr>
                                           <th>SMS Title</th>
                                           <th>Date Created:</th>
                                           <th>Date Modified:</th>
                                           <th>Added By:</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                    <!-- DATA RETRIEVE VIA AJAX -->
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>

                   <!-- MODAL -->
                   <div class="modal fade bd-example-modal-lg" id="add_sms" tabindex="-1" role="dialog" aria-labelledby="add_sms" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="addUser">Add SMS Template</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body">
                               <form class="form-horizontal" id="form_add_sms">
                                   <div class="row">
                                       <div class="col-md-12 ">
                                           <div class="form-group">
                                               <label>SMS Title</label>
                                               <input type="text" class="form-control" name="sms_title" id="sms_title" >
                                               <span class="err-temp"></span>
                                           </div>
                                       </div>
                                       <div class="col-md-12 ">
                                           <div class="form-group">
                                               <label>SMS Message</label>
                                               <textarea type="text" class="form-control" name="sms_message" ></textarea> <span class="err-temp"></span>

                                           </div>
                                       </div>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                                       <button type="submit" class="btn btn-outline-warning" id="btn-sms"><i class="fa fa-plus-circle"></i> Create SMS Template</button>
                                   </div>
                                 </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- END MODAL -->

                          <!-- EDIT MODAL -->
                          <div class="modal fade bd-example-modal-lg" id="modal_sms" tabindex="-1" role="dialog" aria-labelledby="edit_sms" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="edit_sms_template">Edit SMS Template</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                      <form class="form-horizontal" id="edit_sms_form">
                                          <div class="row">
                                              <div class="col-md-12 ">
                                                  <div class="form-group">
                                                      <label>SMS Title</label>
                                                      <input type="hidden" class="form-control" id="hidden_sms_id" name="hidden_sms_id" value="">
                                                      <input type="text" class="form-control" id="sms_title" name="sms_title" value="" />
                                                      <span class="err-temp"></span>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 ">
                                                  <div class="form-group">
                                                      <label>SMS Message</label>
                                                      <textarea type="text" class="form-control" id="sms_message" name="sms_message" value="">
                                                      </textarea><span class="err-temp"></span>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                                              <button type="submit" class="btn btn-outline-warning" id="update-sms"><i class="fa fa-plus-circle"></i> Update SMS</button>
                                          </div>
                                        </form>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
