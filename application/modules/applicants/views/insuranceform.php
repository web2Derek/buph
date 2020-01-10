<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor titleheader">Applicantion for Family Insurance</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Insurance Form</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card wizard-content">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form id="insuranceform" class="validation-wizard wizard-circle">
                                <!-- step 1 -->
                                <h6>Personal Information</h6>
                                <section>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Last Name</label>
                                                        <input type="text" class="form-control" name="l_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">First Name</label>
                                                        <input type="text" class="form-control" name="f_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Middle Name</label>
                                                        <input type="text" class="form-control" name="m_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="dob">Date Of Birth</label>
                                                        <input type="text" class="form-control mydatepicker">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="place_of_birth">Place of Birth</label>
                                                        <input type="text" class="form-control mydatepicker">
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="place_of_birth">Gender</label>
                                                        <select class="form-control custom-select" tabindex="1" name="gender">
                                                          <option value="Male" >Male</option>
                                                          <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="place_of_birth">Civil Status</label>
                                                        <select class="form-control custom-select" tabindex="1" name="gender">
                                                          <option value="Male" >Male</option>
                                                          <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="place_of_birth">Civil Status</label>
                                                        <select class="form-control custom-select" tabindex="1" name="emp_type">
                                                          <option value="Private">Private</option>
                                                          <option value="Government">Government</option>
                                                          <option value="Retired">Retired</option>
                                                          <option value="Self-employed">Self-employed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label for="occupation">Occupation</label>
                                                    <input type="text" name="occupation" value="" class="form-control">
                                                  </div>
                                                </div>
                                                <div class="col-md-2">
                                                  <div class="form-group">
                                                    <label for="religion">Religion</label>
                                                    <input type="text" name="religion" value="" class="form-control">
                                                  </div>
                                                </div>
                                                <div class="col-md-2">
                                                  <div class="form-group">
                                                    <label for="height">Height</label>
                                                    <input type="text" name="height" value="" class="form-control">
                                                  </div>
                                                </div>
                                                <div class="col-md-2">
                                                  <div class="form-group">
                                                    <label for="weight">Weight</label>
                                                    <input type="text" name="weight" value="" class="form-control">
                                                  </div>
                                                </div>
                                                <div class="col-md-2">
                                                  <div class="form-group">
                                                    <label for="blood_type">Blood Type</label>
                                                    <input type="text" name="blood_type" value="" class="form-control">
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <h6>Co-insured Dependents</h6>
                                <section>
                                    <div class="row">
                                      <div class="col-md-4  col-sm-12 col-xs-12">
                                        <div class="form-group">
                                          <input type="text" class="form-control" id="ben_fullname" name="ben_fullname[]" placeholder="(Last Name,First, MI)" >
                                          <span class="err"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-2col-sm-12 col-xs-12">
                                        <div class="form-group">
                                          <input type="text" class="form-control mydatepicker" id="ben_dob" name="ben_dob[]" placeholder="Date of Birth(mm/dd/yy)" >
                                          <span class="err"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                          <input type="text" class="form-control" id="age" name="age[]" placeholder="Age" >
                                          <span class="err"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                          <input type="text" class="form-control" id="ben_relationship" name="ben_relationship[]" placeholder="Relationship" >
                                          <span class="err"></span>
                                        </div>
                                      </div>
                                      <div class="col-md-1">
                                        <div class="input-group-append">
                                          <button class="btn btn-success" type="button" onclick="addfields();"><i class="fa fa-plus"></i></button>
                                        </div>
                                      </div>
                                    </div>
                                    <div id="formdpndents">

                                    </div>

                                    <h6> <strong>Beneficiary(ies) to received the Benefits</strong> </h6>
                                    <p>Primary</p>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <input type="text" name="p_fullname" value="" class="form-control" placeholder="Full Name">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <input type="text" name="p_dob" value="" class="form-control mydatepicker" placeholder="Date of Birth">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <input type="text" name="p_relationship" value="" class="form-control" placeholder="Relationship">
                                          </div>
                                      </div>
                                    </div>
                                    <p>Secondary</p>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <input type="text" name="s_fullname" value="" class="form-control" placeholder="Full Name">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <input type="text" name="s_dob" value="" class="form-control mydatepicker" placeholder="Date of Birth">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <input type="text" name="s_relationship" value="" class="form-control" placeholder="Relationship">
                                          </div>
                                      </div>
                                    </div>
                                </section>

                                <h6>HEALTH DECLARATION</h6>
                                <section>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p> Have you ever been diagnosed of cancer? </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="diagnosed_cancer" name="cancer" data-radio="iradio_flat-green">
                                                <label for="diagnosed_cancer">Yes</label>

                                                <input type="radio" class="check" id="diagnosed_cancer" name="cancer" data-radio="iradio_flat-green">
                                                <label for="diagnosed_cancer">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p> Have you ever been diagnosed of HIV or AIDS? </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="diagnosed_hiv_aids" name="hiv_aids" data-radio="iradio_flat-green">
                                                <label for="diagnosed_hiv_aids">Yes</label>

                                                <input type="radio" class="check" id="diagnosed_hiv_aids" name="hiv_aids" data-radio="iradio_flat-green">
                                                <label for="diagnosed_hiv_aids">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <p> At present, are you aware of or have received advice from your doctor that you are suffering from any illness?  </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="illness_yes" name="illness" data-radio="iradio_flat-green" value="Yes">
                                                <label for="illness_yes">Yes</label>

                                                <input type="radio" class="check" id="illness" name="illness" data-radio="iradio_flat-green" value="No">
                                                <label for="illness">No</label>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">If Yes, please specify</label>
                                                <input type="text" class="form-control" name="illness_specify">
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <h6>Long Health Declaration</h6>
                                <section>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>1.) Are you presently in good health and entirely free from any mental or physical impairment and/or deformities? </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_1" name="long_1" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_1">Yes</label>

                                                <input type="radio" class="check" id="long_1" name="long_1" data-radio="iradio_flat-green" value="No">
                                                <label for="long_1">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>2.) Are you mentally and / or physically able to perform the usual duties of your livelihood? </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_2" name="long_2" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_2">Yes</label>

                                                <input type="radio" class="check" id="long_2" name="long_2" data-radio="iradio_flat-green" value="No">
                                                <label for="illness">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>3.) Have you been medically examined, received medical advice or treatment, or hospitalized, or surgery within the last five (5) years?. </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_3" name="long_3" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_3">Yes</label>

                                                <input type="radio" class="check" id="long_3" name="long_3" data-radio="iradio_flat-green" value="No">
                                                <label for="illness">No</label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for=""></label>
                                                <input type="text" class="form-control" name="long_3_yes" placeholder="If Yes, for what reason">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>4.) Have you ever suffered from any of the following?</p>
                                            <ul>
                                                <li>Test</li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
