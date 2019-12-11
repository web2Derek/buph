<!-- Page Title -->
<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor titleheader">Reports</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Withdrawal of Membership</a></li>
            </ol>
        </div>
    </div>
<!-- end Page Titile -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" action="" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title mt-3">Filter By Date:</h4>
                                         <div class='input-group mb-3'>
                                             <input type='text' name="filter_withdraw_date" class="form-control" id="filter_withdraw_date" autocomplete="off"/>
                                             <div class="input-group-append">
                                                 <span class="input-group-text">
                                                     <span class="ti-calendar"></span>
                                                 </span>
                                             </div>
                                         </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4 class="card-title mt-3">Branch:</h4>
                                         <div class='input-group mb-3'>
                                             <select  id="filter_withdraw_branch" name="mem_branch" class="form-control" placeholder="Select Branch">
                                                 <?php foreach ($branch as $key => $list): ?>
                                                   <option value="<?= $list['branch_id'] ?>"><?= $list['branch_name'] ?></option>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""><br><br></label>
                                        <div class='input-group mb-3'>
                                           <button type="button" class="btn btn-primary filter_table_btn fil_clear"  name="filter_withdraw" id="filter_withdraw">
                                             Search
                                           </button>
                                           &nbsp;
                                         <button type="submit" class="btn btn-primary filter_table_btn fil_clear "  name="filter_table">
                                           Clear
                                         </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                        <div class="table-responsive">
                            <table id="withdrawal" class="color-table success-table table display table-bordered table-striped no-wrap" role="">
                                <thead>
                                    <tr>
                                        <th>Branch</th>
                                        <th>Name of Members</th>
                                        <th>Reason of Withdrawal</th>
                                        <th>Date of Withdrawal</th>
                                        <th>CBU</th>
                                        <th>Savings</th>
                                        <th>Sub-Total</th>
                                        <th>Payable Loan</th>
                                        <th>Payable Trade</th>
                                        <th>Interest Loan</th>
                                        <th>Penalty Trade</th>
                                        <th>Sub-Total</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- DATA LOADED FROM AJAX -->
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
