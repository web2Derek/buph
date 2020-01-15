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
              <form id="insuranceform" class="insuranceform-wizard wizard-circle">
                <!-- step 1 -->
                <h6>Personal Information</h6>
                <section class="section-app">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="l_name" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="f_name" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Middle Name</label>
                            <input type="text" class="form-control" name="m_name" required>
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
                            <input type="text" class="form-control mydatepicker" required>
                          </div>
                        </div>

<<<<<<< HEAD
    <div class="row">
        <div class="col-md-12">
            <div class="card wizard-content">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form id="insuranceform" class="insuranceform-wizard validation-wizard wizard-circle">
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
                                                <input type="radio" class="check" id="diagnosed_cancer_1" name="cancer" data-radio="iradio_flat-green">
                                                <label for="diagnosed_cancer_1">Yes</label>

                                                <input type="radio" class="check" id="diagnosed_cancer_2" name="cancer" data-radio="iradio_flat-green">
                                                <label for="diagnosed_cancer_2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p> Have you ever been diagnosed of HIV or AIDS? </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="diagnosed_hiv_aids_1" name="hiv_aids" data-radio="iradio_flat-green">
                                                <label for="diagnosed_hiv_aids_1">Yes</label>

                                                <input type="radio" class="check" id="diagnosed_hiv_aids_2" name="hiv_aids" data-radio="iradio_flat-green">
                                                <label for="diagnosed_hiv_aids_2">No</label>
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
                                                <input type="radio" class="check" id="long_1_1" name="long_1" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_1">Yes</label>

                                                <input type="radio" class="check" id="long_1_2" name="long_1" data-radio="iradio_flat-green" value="No">
                                                <label for="long_1">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>2.) Are you mentally and / or physically able to perform the usual duties of your livelihood? </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_2_1" name="long_2" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_2">Yes</label>

                                                <input type="radio" class="check" id="long_2_2" name="long_2" data-radio="iradio_flat-green" value="No">
                                                <label for="long_2">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>3.) Have you been medically examined, received medical advice or treatment, or hospitalized, or surgery within the last five (5) years?. </p>
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_3_1" name="long_3" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_3">Yes</label>

                                                <input type="radio" class="check" id="long_3_2" name="long_3" data-radio="iradio_flat-green" value="No">
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
                                            <p>a.)</p>
                                            <ul>
                                                <li>epilepsy</li>
                                                <li>fainting attacks</li>
                                                <li>any mental disorder</li>
                                                <li>any mental disorder</li>
                                                <li>any nervous system disorder or breakdown?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_a_1" name="4_a" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_a">Yes</label>

                                                <input type="radio" class="check" id="4_a_2" name="4_a" data-radio="iradio_flat-green" value="No">
                                                <label for="4_a">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>b.)</p>
                                            <ul>
                                                <li>asthma</li>
                                                <li>bronchitis</li>
                                                <li>pneumonia</li>
                                                <li>tuberculosis</li>
                                                <li>any other lung complains?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_b_1" name="4_b" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_b">Yes</label>

                                                <input type="radio" class="check" id="4_b_2" name="4_b" data-radio="iradio_flat-green" value="No">
                                                <label for="4_b">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>c.)</p>
                                            <ul>
                                                <li>chest pain</li>
                                                <li>high blood pressure</li>
                                                <li>palpitations</li>
                                                <li>shortness of breath</li>
                                                <li>stroke</li>
                                                <li>any heart problem</li>
                                                <li>circulatory problem</li>
                                                <li>disease of arteries or veins?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_c_1" name="4_c" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_c">Yes</label>

                                                <input type="radio" class="check" id="4_c_2" name="4_c" data-radio="iradio_flat-green" value="No">
                                                <label for="4_c">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>d.)</p>
                                            <ul>
                                                <li>indigestion</li>
                                                <li>gastric or duodenal ulcer</li>
                                                <li>chronic or recurrent diarrhea</li>
                                                <li>any problems of the stomach or bowels?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_d_1" name="4_d" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_d">Yes</label>

                                                <input type="radio" class="check" id="4_d_2" name="4_d" data-radio="iradio_flat-green" value="No">
                                                <label for="4_d">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>e.)</p>
                                            <ul>
                                                <li>diabetes</li>
                                                <li>kidneys disorder</li>
                                                <li>liver disorder</li>
                                                <li>bladder disorder</li>
                                                <li>urinary system disorder?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_e_1" name="4_e" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_e">Yes</label>

                                                <input type="radio" class="check" id="4_e_2" name="4_e" data-radio="iradio_flat-green" value="No">
                                                <label for="4_e">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>f.)</p>
                                            <ul>
                                                <li>rheumatic feverrheumatic fever</li>
                                                <li>arthritis</li>
                                                <li>gout</li>
                                                <li>any joint or bone disease?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_f_1" name="4_f" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_f">Yes</label>

                                                <input type="radio" class="check" id="4_f_2" name="4_f" data-radio="iradio_flat-green" value="No">
                                                <label for="4_f">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>g.)</p>
                                            <ul>
                                                <li>any form of cancer</li>
                                                <li>tumor</li>
                                                <li>blood disorder</li>
                                                <li>spleen disorder</li>
                                                <li>enlarged glands?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_g_1" name="4_g" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_g">Yes</label>

                                                <input type="radio" class="check" id="4_g_2" name="4_g" data-radio="iradio_flat-green" value="No">
                                                <label for="4_g">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>h.)</p>
                                            <ul>
                                                <li>unexplained recurrent or persistent fever</li>
                                                <li>dengue</li>
                                                <li>weight loss</li>
                                                <li>any skin disorder?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_h_1" name="4_h" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_h">Yes</label>

                                                <input type="radio" class="check" id="4_h_2" name="4_h" data-radio="iradio_flat-green" value="No">
                                                <label for="4_h">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>i.)</p>
                                            <ul>
                                                <li>unexplainedany sexually transmitted disease (such as syphilis or gonorrhea) </li>
                                                <li>ever sought medical advice, treatment,</li>
                                                <li>had a blood test or been diagnose in connection with a viral disease (such as hepatitis B or AIDS or HIV), or other Venereal diseases?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_i_1" name="4_i" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_i">Yes</label>

                                                <input type="radio" class="check" id="4_i_2" name="4_i" data-radio="iradio_flat-green" value="No">
                                                <label for="4_i">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                any disease or disorder of the
                                            </p>
                                            <p>j.)</p>
                                            <ul>
                                                <li>eyes</li>
                                                <li>ears</li>
                                                <li>nose</li>
                                                <li>throat</li>
                                                <li>mouth</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_j_1" name="4_j" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_j">Yes</label>

                                                <input type="radio" class="check" id="4_j_2" name="4_j" data-radio="iradio_flat-green" value="No">
                                                <label for="4_j">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <p>k.)</p>
                                            <ul>
                                                <li>unexplained night sweat</li>
                                                <li>unexplained infections or swollen glands?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_k_1" name="4_k" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_k">Yes</label>

                                                <input type="radio" class="check" id="4_k_2" name="4_k" data-radio="iradio_flat-green" value="No">
                                                <label for="4_k">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>l.) any illness, injury, or disability not mentioned above?</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="4_l_1" name="4_l" data-radio="iradio_flat-green" value="Yes">
                                                <label for="4_l">Yes</label>

                                                <input type="radio" class="check" id="4_l_2" name="4_l" data-radio="iradio_flat-green" value="No">
                                                <label for="4_l">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>5.) Are you taking medication of any kind? If YES, for what? </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_5_1" name="long_5" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_5">Yes</label>

                                                <input type="radio" class="check" id="long_5_2" name="long_5" data-radio="iradio_flat-green" value="No">
                                                <label for="long_5">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>6.) Have any of your natural parents, brothers, or sisters died from or suffered from  </p>
                                            <ul>
                                                <li>diabetes</li>
                                                <li>stroke</li>
                                                <li>heart disease</li>
                                                <li>cancer</li>
                                                <li>tuberculosis</li>
                                                <li>mental illness?</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_6_1" name="long_6" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_6">Yes</label>

                                                <input type="radio" class="check" id="long_6_2" name="long_6" data-radio="iradio_flat-green" value="No">
                                                <label for="long_6">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>7.) Have you smoked any cigarettes in the past 12 months?  </p>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_7_1" name="long_7" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_7">Yes</label>

                                                <input type="radio" class="check" id="long_7_2" name="long_7" data-radio="iradio_flat-green" value="No">
                                                <label for="long_7">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>8.) Has any proposal for life assurance on your life ever been declined, postponed, or accepted on special terms?  </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_8_1" name="long_8" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_8">Yes</label>

                                                <input type="radio" class="check" id="long_8_2" name="long_8" data-radio="iradio_flat-green" value="No">
                                                <label for="long_8">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>9.) Have you ever been received or receiving disability benefit?  </p>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="radio" class="check" id="long_9_1" name="long_9" data-radio="iradio_flat-green" value="Yes">
                                                <label for="long_9">Yes</label>

                                                <input type="radio" class="check" id="long_9_2" name="long_9" data-radio="iradio_flat-green" value="No">
                                                <label for="long_9">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>10.) Please provide the name and address of your attending physician  </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="long_10">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
=======
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="place_of_birth">Gender</label>
                            <select class="form-control custom-select" tabindex="1" name="gender" required>
                              <option value="Male" >Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="place_of_birth">Civil Status</label>
                            <select class="form-control custom-select" tabindex="1" name="gender" required>
                              <option value="Male" >Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="place_of_birth">Civil Status</label>
                            <select class="form-control custom-select" tabindex="1" name="emp_type" required>
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
>>>>>>> e709c61c4e96566b4d4a3e00f2aaa6138f000e64
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
                        <input type="radio" class="check" id="diagnosed_cancer_1" name="cancer" data-radio="iradio_flat-green">
                        <label for="diagnosed_cancer_1">Yes</label>

                        <input type="radio" class="check" id="diagnosed_cancer_2" name="cancer" data-radio="iradio_flat-green">
                        <label for="diagnosed_cancer_2">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p> Have you ever been diagnosed of HIV or AIDS? </p>
                      <div class="form-group">
                        <input type="radio" class="check" id="diagnosed_hiv_aids_1" name="hiv_aids" data-radio="iradio_flat-green">
                        <label for="diagnosed_hiv_aids_1">Yes</label>

                        <input type="radio" class="check" id="diagnosed_hiv_aids_2" name="hiv_aids" data-radio="iradio_flat-green">
                        <label for="diagnosed_hiv_aids_2">No</label>
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
                        <input type="radio" class="check" id="long_1_1" name="long_1" data-radio="iradio_flat-green" value="Yes">
                        <label for="long_1">Yes</label>

                        <input type="radio" class="check" id="long_1_2" name="long_1" data-radio="iradio_flat-green" value="No">
                        <label for="long_1">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>2.) Are you mentally and / or physically able to perform the usual duties of your livelihood? </p>
                      <div class="form-group">
                        <input type="radio" class="check" id="long_2_1" name="long_2" data-radio="iradio_flat-green" value="Yes">
                        <label for="long_2">Yes</label>

                        <input type="radio" class="check" id="long_2_2" name="long_2" data-radio="iradio_flat-green" value="No">
                        <label for="illness">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <p>3.) Have you been medically examined, received medical advice or treatment, or hospitalized, or surgery within the last five (5) years?. </p>
                      <div class="form-group">
                        <input type="radio" class="check" id="long_3_1" name="long_3" data-radio="iradio_flat-green" value="Yes">
                        <label for="long_3">Yes</label>

                        <input type="radio" class="check" id="long_3_2" name="long_3" data-radio="iradio_flat-green" value="No">
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
                      <p>a.)</p>
                      <ul>
                        <li>epilepsy</li>
                        <li>fainting attacks</li>
                        <li>any mental disorder</li>
                        <li>any mental disorder</li>
                        <li>any nervous system disorder or breakdown?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_a_1" name="4_a_" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_a">Yes</label>

                        <input type="radio" class="check" id="4_a_2" name="4_a" data-radio="iradio_flat-green" value="No">
                        <label for="4_a">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>b.)</p>
                      <ul>
                        <li>asthma</li>
                        <li>bronchitis</li>
                        <li>pneumonia</li>
                        <li>tuberculosis</li>
                        <li>any other lung complains?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_b_1" name="4_b" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_b">Yes</label>

                        <input type="radio" class="check" id="4_b_2" name="4_b" data-radio="iradio_flat-green" value="No">
                        <label for="4_b">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>c.)</p>
                      <ul>
                        <li>chest pain</li>
                        <li>high blood pressure</li>
                        <li>palpitations</li>
                        <li>shortness of breath</li>
                        <li>stroke</li>
                        <li>any heart problem</li>
                        <li>circulatory problem</li>
                        <li>disease of arteries or veins?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_c_1" name="4_c" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_c">Yes</label>

                        <input type="radio" class="check" id="4_c_2" name="4_c" data-radio="iradio_flat-green" value="No">
                        <label for="4_c">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>d.)</p>
                      <ul>
                        <li>indigestion</li>
                        <li>gastric or duodenal ulcer</li>
                        <li>chronic or recurrent diarrhea</li>
                        <li>any problems of the stomach or bowels?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_d_1" name="4_d" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_d">Yes</label>

                        <input type="radio" class="check" id="4_d_2" name="4_d" data-radio="iradio_flat-green" value="No">
                        <label for="4_d">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>e.)</p>
                      <ul>
                        <li>diabetes</li>
                        <li>kidneys disorder</li>
                        <li>liver disorder</li>
                        <li>bladder disorder</li>
                        <li>urinary system disorder?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_e_1" name="4_e" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_e">Yes</label>

                        <input type="radio" class="check" id="4_e_2" name="4_e" data-radio="iradio_flat-green" value="No">
                        <label for="4_e">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>f.)</p>
                      <ul>
                        <li>rheumatic feverrheumatic fever</li>
                        <li>arthritis</li>
                        <li>gout</li>
                        <li>any joint or bone disease?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_f_1" name="4_f" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_f">Yes</label>

                        <input type="radio" class="check" id="4_f_2" name="4_f" data-radio="iradio_flat-green" value="No">
                        <label for="4_f">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>g.)</p>
                      <ul>
                        <li>any form of cancer</li>
                        <li>tumor</li>
                        <li>blood disorder</li>
                        <li>spleen disorder</li>
                        <li>enlarged glands?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_g_1" name="4_g" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_g">Yes</label>

                        <input type="radio" class="check" id="4_g_2" name="4_g" data-radio="iradio_flat-green" value="No">
                        <label for="4_g">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>h.)</p>
                      <ul>
                        <li>unexplained recurrent or persistent fever</li>
                        <li>dengue</li>
                        <li>weight loss</li>
                        <li>any skin disorder?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_h_1" name="4_h" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_h">Yes</label>

                        <input type="radio" class="check" id="4_h_2" name="4_h" data-radio="iradio_flat-green" value="No">
                        <label for="4_h">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>i.)</p>
                      <ul>
                        <li>unexplainedany sexually transmitted disease (such as syphilis or gonorrhea) </li>
                        <li>ever sought medical advice, treatment,</li>
                        <li>had a blood test or been diagnose in connection with a viral disease (such as hepatitis B or AIDS or HIV), or other Venereal diseases?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_i_1" name="4_i" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_i">Yes</label>

                        <input type="radio" class="check" id="4_i_2" name="4_i" data-radio="iradio_flat-green" value="No">
                        <label for="4_i">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>
                        any disease or disorder of the
                      </p>
                      <p>j.)</p>
                      <ul>
                        <li>eyes</li>
                        <li>ears</li>
                        <li>nose</li>
                        <li>throat</li>
                        <li>mouth</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_j_1" name="4_j" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_j">Yes</label>

                        <input type="radio" class="check" id="4_j_2" name="4_j" data-radio="iradio_flat-green" value="No">
                        <label for="4_j">No</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">

                      <p>k.)</p>
                      <ul>
                        <li>unexplained night sweat</li>
                        <li>unexplained infections or swollen glands?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_k_1" name="4_k" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_k">Yes</label>

                        <input type="radio" class="check" id="4_k_2" name="4_k" data-radio="iradio_flat-green" value="No">
                        <label for="4_k">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>l.) any illness, injury, or disability not mentioned above?</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="4_l_1" name="4_l" data-radio="iradio_flat-green" value="Yes">
                        <label for="4_l">Yes</label>

                        <input type="radio" class="check" id="4_l_2" name="4_l" data-radio="iradio_flat-green" value="No">
                        <label for="4_l">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>5.) Are you taking medication of any kind? If YES, for what? </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="long_5_1" name="long_5" data-radio="iradio_flat-green" value="Yes">
                        <label for="long_5">Yes</label>

                        <input type="radio" class="check" id="long_5_2" name="long_5" data-radio="iradio_flat-green" value="No">
                        <label for="long_5">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>6.) Have any of your natural parents, brothers, or sisters died from or suffered from  </p>
                      <ul>
                        <li>diabetes</li>
                        <li>stroke</li>
                        <li>heart disease</li>
                        <li>cancer</li>
                        <li>tuberculosis</li>
                        <li>mental illness?</li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="long_6_1" name="long_6" data-radio="iradio_flat-green" value="Yes">
                        <label for="long_6">Yes</label>

                        <input type="radio" class="check" id="long_6_2" name="long_6" data-radio="iradio_flat-green" value="No">
                        <label for="long_6">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>7.) Have you smoked any cigarettes in the past 12 months?  </p>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="long_7_1" name="long_7" data-radio="iradio_flat-green" value="Yes">
                        <label for="long_7">Yes</label>

                        <input type="radio" class="check" id="long_7_2" name="long_7" data-radio="iradio_flat-green" value="No">
                        <label for="long_7">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>8.) Has any proposal for life assurance on your life ever been declined, postponed, or accepted on special terms?  </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="long_8_1" name="long_8" data-radio="iradio_flat-green" value="Yes">
                        <label for="long_8">Yes</label>

                        <input type="radio" class="check" id="long_8_2" name="long_8" data-radio="iradio_flat-green" value="No">
                        <label for="long_8">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>9.) Have you ever been received or receiving disability benefit?  </p>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="radio" class="check" id="long_9_1" name="long_9" data-radio="iradio_flat-green" value="Yes">
                        <label for="long_9">Yes</label>

                        <input type="radio" class="check" id="long_9_2" name="long_9" data-radio="iradio_flat-green" value="No">
                        <label for="long_9">No</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p>10.) Please provide the name and address of your attending physician  </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" name="long_10">
                      </div>
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
