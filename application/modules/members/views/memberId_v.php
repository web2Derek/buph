<div>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor titleheader">Transactions</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Member ID</a></li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <h5 class="card-header ">Member list</h5>
                <div class="card-body">
                    <div class="table-responsive">
                      <div class="table-responsive">
                          <table id="memberlist_id" class="color-table success-table tablesaw table-bordered table-hover table no-wrap">
                              <thead>
                                  <tr>
                                      <th></th>
                                      <th>Name of Member</th>
                                      <th>Account No.</th>
                                      <th>#</th>
                                      <th>Last Printed</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <!-- <1?php foreach ($list as $key => $value): ?>
                                      <tr class="parent">
                                        <td>
                                          <input type="checkbox" class="addtolist" remove_id ="<1?php echo $key; ?>">
                                          </td>
                                          <td><1?php echo $value['membername']; ?></td>
                                          <td account="<1?php echo $value['member_id'] ?>"><1?php echo $value['acount_id']; ?></td>
                                          <td>1</td>
                                          <td>Oct 15 2019</td>
                                      </tr>
                                  <1?php endforeach; ?> -->
                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <h5 class="card-header ">Selected Member for ID</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="selectedmember" class="color-table success-table tablesaw table-bordered table-hover table no-wrap">
                            <thead>
                                <tr>
                                    <th>Name of Member</th>
                                    <th>Account No.</th>
                                    <th>#</th>
                                    <th>Last Printed</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn waves-effect waves-light btn-outline-warning btn-sm generate_id" >Generate ID</button>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-10">
            <h1>Generated ID </h1>
            <!-- <input id="btn-Preview-Image" type="button" class="btn btn-primary btn-sm" value="Preview" /> -->
        </div>
        <div class="col-md-2 btn_for_printing" style="">
            <button class="btn waves-effect waves-light btn-outline-warning btn-sm btn_print">Print</button>
        </div>
    </div>
    <!-- <div class="row col-6" id="qr-code"></div> -->
    <div class="row generate_here" id="generatePrint">
      <!-- <div id="print_me_plss"><div class="col-md-6 col-sm-12 col-xs-12 animated bounceInLeft">
          <div class="id_wrapper">
            <img src="<?php //echo base_url() ?>assets/images/id/front2.png" alt="">
              <div class="front">
                  <div class="idbackground">
                      <figure>
                          <img src="<?php echo base_url(); ?>assets/images/id/front2.png" alt="">
                      </figure>
                  </div>
                  <div class="iddetails">
                      <div class="id_container"></div>
                      <div class="name_container">
                         <h6>${info.data.last_name}</h6>
                         <h6>${info.data.first_name}</h6>
                         <h6>${info.data.acount_id}</h6>
                      </div>
                      <div class="signature_container">
                          SIGNATURE HERE
                      </div>
                  </div>
              </div>
              <div class="back">
                  <div class="idbackground">
                      <figure>
                          <img src="<?php echo base_url(); ?>assets/images/id/back2.png" alt="">
                      </figure>
                  </div>
                  <div class="iddetails">
                      <div class="personal_info">
                          <div class="col">
                              <p>Birth Date: ${info.data.birthdate}</p>
                              <p>PhilHealth: ${'na'}</p>
                              <p>TIN: ${info.data.tin}</p>
                          </div>
                          <div class="col">
                              <p>GSIS: ${'na'}</p>
                              <p>SSS: ${info.data.sss}</p>
                              <p>Blood type: ${info.data.blood_type}</p>
                          </div>
                          <div class="signature" id="qr-code${info.data.acount_id}"></div>
                          <div class="address">
                              <p> Address: </p>
                          </div>
                      </div>
                      <div class="ft">
                          <div class="emergency">
                              <h5>IN CASE OF EMERGENCY, PLEASE CONTACT: </h5>
                              <p>Name:</p>
                              <p>Contact No.:</p>
                          </div>
                          <div class="board">
                              <p>EUGENE M. PABUALAN</p>
                              <p>Chairperson Board of Director</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div> -->
    </div>
    <div id="previewImage"></div>
</div>
