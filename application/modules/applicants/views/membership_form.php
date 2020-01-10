<!-- Validation wizard -->
<div class="row" id="validation">
  <div class="col-12">
    <div class="card wizard-content">
      <div class="card-body">
        <h4 class="card-title">Membership Form</h4>
        <form action="#" id="applicant_form" class="validation-wizard wizard-circle" enctype="multipart/form-data">
          <!-- Step 1 -->
          <h6>Personal Information</h6>
          <section>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class=" col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="">Last name</label>
                      <input type="text" class="form-control" name="lastname" value="" required>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="">First Name</label>
                      <input type="text" class="form-control" name="firstname" value="" required>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="">Middle Name</label>
                      <input type="text" class="form-control" name="middlename" value="" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                      <label for="">Birthdate</label>
                      <input type="text" class="form-control mydatepicker" id="birthdate" name="birthdate" value="" required>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                      <label for="">Age</label>
                      <input type="text" class="form-control" id="members_age" name="age" value="" readonly>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                      <label for="">Blood type</label>
                      <input type="text" class="form-control" name="blood_type" value="">

                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12">
                    <div class="form-group">
                      <label for="">Birth Place</label>
                      <input type="text" class="form-control mydatepicker" name="birthplace" value="">

                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="">Religion</label>
                      <input type="text" class="form-control" name="religion" value="">

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="">Email Address</label>
                      <input type="text" class="form-control" name="emailAddress" id="emailAddress" value="" required>

                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label for="">Nationality</label>
                      <input type="text" class="form-control" name="nationality" value="" required>

                    </div>
                  </div>
                  <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                      <label for="">Civil Status</label>
                      <select class="form-control custom-select" tabindex="1" name="civilStatus">
                        <option value="Single" >Single</option>
                        <option value="Married" selected="selected">Married</option>
                      </select>

                    </div>
                  </div>
                  <div class="col-md-2 col-sm-6">
                    <div class="form-group">
                      <label for="">Sex</label>
                      <select class="form-control custom-select" tabindex="1" name= "sex" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>

                    </div>
                  </div>

                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="">Mobile No.</label>
                      <input type="text" class="form-control" name="mobile_no" value="" required>

                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="">Tin</label>
                      <input type="text" class="form-control" name="Tin" value="">

                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="">SSS</label>
                      <input type="text" class="form-control" name="SSS" value="">
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12">
                    <div class="form-group">
                      <label for="">Pag-Ibig No.</label>
                      <input type="text" class="form-control" name="pag_ibig" value="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <label for="signature"><h4>Members Profile Photo:</h4></label>
                      <input type="file" name="member_profile" id="member_profile" class="dropify member_profile"  data-max-file-size-preview="5M" data-allowed-file-extensions="jpg png jpeg" data-default-file="<?php echo base_url() ?>assets/profile/profile.jpg"/>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>
          <!-- Step 2 -->
          <h6>Residence</h6>
          <section>
            <div class="row">
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="">Type of Residence</label>
                  <select class="form-control custom-select" tabindex="1" name= "typeOfResidence" required>
                    <option value="Owned">Owned</option>
                    <option value="Renting">Renting</option>
                    <option value="Living w/ Parents">Living w/ Parents</option>
                  </select>

                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="">Street</label>
                  <input type="text" class="form-control" name="Street" value="" required>

                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="">Barangay/District</label>
                  <input type="text" class="form-control" name="Barangay_District"  value="" required>

                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="">Municipality</label>
                  <input type="text" class="form-control" name="Municipality" value="" required>

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Province</label>
                  <input type="text" class="form-control" name="province" value="" required>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Zip Code</label>
                  <input type="text" class="form-control" name="zip_code" id="zip_code" value="" required>
                </div>
              </div>
            </div>
          </section>
          <!-- Step 3 -->
          <h6>Employment Information</h6>
          <section>
            <div class="row">
              <div class="col-md-2 col-sm-12">
                <div class="form-group">
                  <label for="">Type of Employment</label>
                  <select class="form-control custom-select" tabindex="1" name= "employment_info">
                    <option value="Student">Student</option>
                    <option value="Private Employee">Private Employee</option>
                    <option value="Government Employee">Government Employee</option>
                    <option value="Farmer">Farmer</option>
                    <option value="OFW">OFW</option>
                    <option value="Retire/Pensioner">Retire/Pensioner</option>
                    <option value="Self-Employed">Self-Employed</option>
                  </select>

                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="">Company name</label>
                  <input type="text" class="form-control" name="empinfo_companyName" value="">
                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Company's Contact No.</label>
                  <input type="text" class="form-control" name="emp_company_contactNo" value="">

                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" value="">

                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="">Designation</label>
                    <input type="text" name="Designation" class="form-control" value="">

                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="">Employment Status</label>
                    <input type="text" name="employment_status" class="form-control"  value="" required>

                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Step 4 -->
          <h6>Education Attainment</h6>
          <section>
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <select class="form-control custom-select" tabindex="1" name= "edu_attainment">
                    <option value="College Grad">College Grad</option>
                    <option value="College Level">College Level</option>
                    <option value="Secondary">Secondary</option>
                    <option value="Elementary">Elementary</option>
                  </select>

                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <input type="text" placeholder="Name Of School" name="name_of_school" class="form-control" value="" required>

                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <input type="text" placeholder="Course & Year Graduated" name="course_year_graduated" class="form-control mydatepicker" value="" required>

                </div>
              </div>
            </div>
          </section>
          <h6>Spouse Information</h6>
          <section>
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" name="spouse_lname" class="form-control" value="">

                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" name="spouse_fname" class="form-control" value="">

                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Middle Name</label>
                  <input type="text" name="spouse_mname" class="form-control" value="">

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="">Birthday</label>
                  <input type="text" name="spouse_bday" class="form-control mydatepicker" value="">

                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="">Mobile No.</label>
                  <input type="text" name="spouse_mobile" class="form-control" value="">

                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="">Nationality</label>
                  <input type="text" name="spouse_nationality" class="form-control" value="">

                </div>
              </div>
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label for="">Tin</label>
                  <input type="text" name="spouse_tin" class="form-control" value="">

                </div>
              </div>
            </div>
          </section>
          <h6>Spouse Employment Information</h6>
          <section>
            <div class="row">
              <div class="col-md-2 col-sm-12">
                <div class="form-group">
                  <label for="">Type</label>
                  <select class="form-control custom-select" tabindex="1" name= "spouse_employment_info">
                    <option value="Student">Student</option>
                    <option value="Private Employee">Private Employee</option>
                    <option value="Government Employee">Government Employee</option>
                    <option value="Farmer">Farmer</option>
                    <option value="OFW">OFW</option>
                    <option value="Retire/Pensioner">Retire/Pensioner</option>
                    <option value="Self-Employed">Self-Employed</option>
                  </select>

                </div>
              </div>

              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="">Company Name</label>
                  <input type="text" class="form-control" name="spouse_company_name" value="">

                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Company's Contact No. </label>
                  <input type="text" class="form-control" name="spouse_company_no" value="">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" name="spouse_company_address" class="form-control" value="">

                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Designation</label>
                  <input type="text" name="spouse_designation" class="form-control" value="">

                </div>
              </div>

              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="">Employment Status</label>
                  <input type="text" name="spouse_employment_status" class="form-control" value="">

                </div>
              </div>
            </div>
          </section>
          <h6>Financial Information</h6>
          <section>
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <div class="col-md-12">
                    <label for=""><h5>Source Of Income</h5></label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="source_salary_honorarium" name="source_salary_honorarium">
                      <label class="custom-control-label" for="source_salary_honorarium">Salary/Honorarium</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="source_interest_commision" name="source_interest_commision">
                      <label class="custom-control-label" for="source_interest_commision">Interest/Commision</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="source_business" name="source_business">
                      <label class="custom-control-label" for="source_business">Business</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="source_farmer" id="source_farmer" id="source_farmer">
                      <label class="custom-control-label" for="source_farmer">Farmer</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <div class="col-md-12">
                    <label for=""></label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="source_ofw_remittance" name="source_ofw_remittance">
                      <label class="custom-control-label" for="source_ofw_remittance">OFW Remittance</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="source_other_remittance" name="source_other_remittance">
                      <label class="custom-control-label" for="source_other_remittance">Other Remittance</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="source_pension" name="source_pension">
                      <label class="custom-control-label" for="source_pension">Pension</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="source_others" id="source_others" id="source_others">
                      <label class="custom-control-label" for="source_others">Others, Specify</label>
                    </div>
                  </div>

                  <div class="col-md-12" id="if_others">
                    <div class="form-group">
                      <div class="form-group">
                        <input type="text" name="source_others_input" class="form-control">

                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="row" id="if_business">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Company Name</label>
                    <input type="text" name="source_business_company_name" class="form-control">

                  </div>
                  <div class="form-group">
                    <input type="text" name="source_business_emplymentStatus" class="form-control" placeholder="Employment Status">

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Office Address</label>
                    <input type="text" name="source_business_officeAddress" class="form-control">

                  </div>
                  <div class="form-group">

                    <input type="text" name="source_business_contactNo" class="form-control" placeholder="Contact Number">

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Job Title</label>
                    <input type="text" name="source_business_jobTitle" class="form-control">

                  </div>
                  <div class="form-group">
                    <input type="text" name="source_business_gross_income" class="form-control" placeholder="Gross Income per Month">

                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Monthly Gross Income</label>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="under_10k" name="monthly_gross_income" class="custom-control-input" value="10000">
                    <label class="custom-control-label" for="under_10k">Under ₱ 10,000</label>
                  </div>

                  <div class="custom-control custom-radio">
                    <input type="radio" id="100001" name="monthly_gross_income" class="custom-control-input" value="10001 - 20000">
                    <label class="custom-control-label" for="100001">₱ 10,001 - 20,000</label>
                  </div>

                  <div class="custom-control custom-radio">
                    <input type="radio" id="200001" name="monthly_gross_income" class="custom-control-input" value="20001 - 30000">
                    <label class="custom-control-label" for="200001">₱ 20,001 - 30,000</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <div class="col-md-12">
                    <label for=""><h5></h5></label>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="30001" name="monthly_gross_income" value="30001 - 40000">
                      <label class="custom-control-label" for="30001">₱ 30,001 - 40,000</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="40001" name="monthly_gross_income" value="40000 - 50000">
                      <label class="custom-control-label" for="40001">₱ 40,001 - 50,000</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="50000" name="monthly_gross_income" value="Above 50000">
                      <label class="custom-control-label" for="50000">Above ₱ 50,000</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" id="if_farmer">
              <div class="col-md-4">
                <div class="form-group row">
                  <label class="control-label text-right col-md-3"><h5>Corn</h5></label>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="corn1" name="corn" class="custom-control-input" value="owned">
                      <label class="custom-control-label" for="corn1">Owned</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="corn2" name="corn" class="custom-control-input" value="rented">
                      <label class="custom-control-label" for="corn2">Rented</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label text-right col-md-3"><h5>Sugarcane</h5></label>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="cane1" name="sugarcane" class="custom-control-input" value="owned">
                      <label class="custom-control-label" for="cane1">Owned</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="cane2" name="sugarcane" class="custom-control-input" value="rented">
                      <label class="custom-control-label" for="cane2">Rented</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label text-right col-md-3"><h5>Rice</h5></label>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="rice1" name="rice" class="custom-control-input" value="owned">
                      <label class="custom-control-label" for="rice1">Owned</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="rice2" name="rice" class="custom-control-input" value="rented">
                      <label class="custom-control-label" for="rice2">Rented</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="control-label text-right col-md-3"><h5>Fruits</h5></label>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="fruits1" name="fruits" class="custom-control-input" value="owned">
                      <label class="custom-control-label" for="fruits1">Owned</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="fruits2" name="fruits" class="custom-control-input" value="rented">
                      <label class="custom-control-label" for="fruits2">Rented</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label text-right col-md-3"><h5>Cash Crop</h5></label>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="cash1" name="cash" class="custom-control-input" value="owned">
                      <label class="custom-control-label" for="cash1">Owned</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="cash2" name="cash" class="custom-control-input" value="rented">
                      <label class="custom-control-label" for="cash2">Rented</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label text-right col-md-3"><h5>Livestock</h5></label>
                  <div class="col-md-9">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="live1" name="livestock" class="custom-control-input" value="owned">
                      <label class="custom-control-label" for="live1">Owned</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="live2" name="livestock" class="custom-control-input" value="rented">
                      <label class="custom-control-label" for="live2">Rented</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for=""><h5>Gross Income per year</h5></label>
                  <input type="text" class="form-control" name="grossyear"  value="" required>
                </div>
              </div>
            </div>
          </section>

          <h6>Beneficiaries</h6>
          <section>
            <div class="row">
              <div class="col-md-4  col-sm-12 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control" id="ben_fullname" name="ben_fullname[]" placeholder="(Last Name,First, MI)" >

                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control mydatepicker" id="ben_dob" name="ben_dob[]" placeholder="Date of Birth(mm/dd/yy)" >

                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control" id="ben_relationship" name="ben_relationship[]" placeholder="Relationship" >

                </div>
              </div>
              <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control" id="ben_education" name="ben_education[]" placeholder="Education">

                </div>
              </div>
              <div class="col-md-1 col-sm-12 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control" id="ben_percentage" name="ben_percentage[]" placeholder="%" >

                </div>
              </div>
              <div class="col-md-1">
                <div class="input-group-append">
                  <button class="btn btn-success" type="button" onclick="add();"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
            <!-- BENIFIACIRIES FIELD -->
            <div id="addMore">
            </div>
          </section>

          <h6>Signature</h6>
          <section>
            <div class="row">
              <div class="col-md-6">
                <h4>I attest that the information are true, correct and voluntarily given</h4>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" class="form-control mydatepicker"  name="date_applied" value="" required>
                </div>
              </div>
            </div>

            <div class="row">
              <h4 class="mb-3">Please Sign Below:</h3><br>
                <div class="col-md-4 col-sm-12">
                  <input type="hidden" id="testsignature_form" name="mem_sign" required/>
                  <div id="signaturetab_form" style="width:400px; height: 200px"></div>
                  <!-- <label for="input-file-now">Attach signature here:</label> -->
                  <!-- <input type="file" name="signature_edit" id="signature_edit" class="dropify" data-max-file-size-preview="5M" data-allowed-file-extensions="jpg png jpeg" data-default-file=""/>
                  <input type="file" name="signature" id="signature" class="dropify"/> -->
                </div>
              </div>
            </section>
          </form>
        </div>
      </div>
    </div>
