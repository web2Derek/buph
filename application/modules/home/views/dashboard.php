
    <div class="row">
      <div class="col-lg-8 col-md-12">
          <div class="card">
              <div class="card-body">
                <div class="d-flex m-b-30 no-block">
                    <h5 class="card-title m-b-0 align-self-center">New Member (<?php echo date("M-Y");?>)</h5>
                        <div class="ml-auto col-md-4">
                            <select class="custom-select" name="group-type" id="group-type">
                                <option value="Regular">Regular</option>
                                <option value="Associate">Associate</option>
                                <option value="Smart Teens/Young Save">Smart Teens/Young Save</option>
                              </select>
                          </div>
                      </div>

                    <canvas id="myChart"></canvas>
                  </div>
              </div>
            </div>

        <div class="col-lg-4 col-md-12">
              <div class="row card">
                   <div class="card-body">
                  <div class="col-md-12">
                    <h4 class="card-title">Total Member Summary</h4>
                       <div class="table-responsive">
                             <table class="table color-table table-striped success-table" id="members_range">
                                 <thead>
                                     <tr>
                                         <th>Member</th>
                                         <th>Female</th>
                                         <th>Male</th>
                                     </tr>
                                 </thead>
                                 <tbody class="table_body_data">
                                      <!-- <tr class="18-30">
                                         <td>18-30 years old</td>
                                     </tr>
                                     <tr class="31-35">
                                         <td>31-35 years old</td>
                                     </tr>
                                     <tr class="36-40">
                                         <td>36-40 years old</td>
                                     </tr>
                                     <tr class="31-50">
                                         <td>31-50 years old</td>
                                     </tr>
                                     <tr class="51-60">
                                         <td>51-60 years old</td>
                                     </tr>
                                     <tr class="61-70">
                                         <td>61-70 years old</td>
                                     </tr> -->
                                     <!-- </tr>
                                         <td>71 and above years old</td>
                                         <td>10</td>
                                         <td>10</td>
                                     </tr> -->
                                 </tbody>
                             </table>
                         </div>
                      </div>
                </div>
            </div>
        </div>
      </div>


        <div class="row">
          <div class="col-lg-4 col-md-12">
              <div class="card">
                  <div class="card-body">
                    <div class="d-flex m-b-30 no-block">
                        <h5 class="card-title m-b-0 align-self-center">New Member (<?php echo date("M-Y");?>)</h5>
                          </div>
                        <canvas id="donutChart" height="400px"></canvas>
                      </div>
                  </div>
                </div>

            <div class="col-lg-8 col-md-12">
                    <div class="card">
                    <div class="card-body">
                      <div class="col-md-12">
                        <div class="d-flex m-b-30 no-block">
                            <h4 class="card-title">Total Member Summary</h4>
                             <div class="ml-auto col-md-4">
                                    <select class="custom-select" name="alltype" id="alltype">
                                          <option value="Regular Male">Regular Male</option>
                                          <option value="Regular Female">Regular Female</option>
                                          <option value="Associate Male">Associate Male</option>
                                          <option value="Associate Female">Associate Female</option>
                                          <option value="Smart Teens/Young Savers Male">Smart Teens/Young Savers Male</option>
                                          <option value="Smart Teens/Young Savers Female">Smart Teens/Young Savers Female</option>
                                      </select>
                                </div>
                            </div>
                            <canvas id="myNewChart"></canvas>
                        </div>
                    </div>
                  </div>
            </div>
