
<div class="modal fade bd-example-modal-lg long-modal" id="accountInfo" tabindex="-1" role="dialog" aria-labelledby="accountInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Account Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="account_info">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="accountNumber"><strong>Account Number</strong></label>
                    <input type="text" id="accountNumber" disabled placeholder="Auto Number" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="resolutionNo"><strong>Resolution No.</strong></label>
                    <input type="text" id="resolutionNo" name="resolutionNo" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="branch"><strong>Branch</strong></label>
                    <select class="form-control custom-select" tabindex="1" id="branch" name="branch">
                        <?php foreach ($others[0] as $key => $branch): ?>
                            <option value="<?=  $branch['branch_id']?>"><?= $branch['branch_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="member_type">Member Type</label>
                    <select class="form-control custom-select" tabindex="1" id="member_type" name="member_type">
                        <?php foreach ($others[1] as $key => $type): ?>
                            <option value="<?=  $type['type_id']?>"><?= $type['title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dateApplied">Date Applied</label>
                    <input type="text" readonly id="dateApplied"  name="dateApplied" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dateApprove">Date Approve by BOD</label>
                    <input type="text" id="dateApprove" name="dateApprove"class="form-control mydatepicker">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4>Monetary Requirements <span class="formula">(membership fee + mortuary premium + savings deposit + paid-up capital)</span> </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="membershipFee">Membership Fee</label>
                    <input type="number" id="membershipFee" name="membershipFee" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="mortuaryPrem">Mortuary Premium</label>
                    <input type="number" id="mortuaryPrem" name="mortuaryPrem" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="savingsDeposit">Savings Deposit</label>
                    <input type="number" id="savingsDeposit" name="savingsDeposit" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="paidup_capital">Paid-up Capital</label>
                    <input type="number" id="paidup_capital" name="paidup_capital" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Total: <span id="total"></span></h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="subs_share">Subscriber Share</label>
                    <input type="text" name="subs_share" class="form-control" id="subs_share">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input id="amount" name="amount" step="any" type="number" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="noOfshares">No. of Shares</label>
                    <input id="noOfshares" name="noOfshares" type="number" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="depositedForSubs">Deposited for Subsription</label>
                    <input id="depositedForSubs" name="depositedForSubs" type="number" class="form-control">
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="capitalShareDeposit">Capital Share Deposit</label>
                    <input type="number" readonly id="capitalShareDeposit" name="capitalShareDeposit" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="loansPayable">Loans Payable</label>
                    <input type="number" id="loansPayable" name="loansPayable" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="CreditoTrade">Credit on Trade Payable</label>
                    <input type="number" id="CreditoTrade" name="CreditoTrade" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="savingsDeposit_2">Savings Deposit</label>
                    <input type="number" readonly id="savingsDeposit_2" name="savingsDeposit_2" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="interestOnLoanPayable">Interest on Loans Payable</label>
                    <input type="number" id="interestOnLoanPayable" name="interestOnLoanPayable" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="penaltiesOnTrade">Penalties on Trade Payable</label>
                    <input type="number" id="penaltiesOnTrade" name="penaltiesOnTrade" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="time_deposit">Time Deposit</label>
                    <input type="number" id="time_deposit" name="time_deposit" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="penalties_on_loan">Interest on Loans Payable</label>
                    <input type="number" id="penalties_on_loan" name="penalties_on_loan" class="form-control">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sub_total">Sub-Total</label>
                    <input type="number" readonly id="sub_total" name="sub_total" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="deduction">Deduction</label>
                    <input type="number" readonly id="deduction" name="deduction" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="grand_total">Grand Total</label>
                    <input type="number" readonly id="grand_total" name="grand_total" class="form-control">
                </div>
            </div>
        </div>
        <hr>
        <!-- FOR CLOSE ACCOUNT -->
        <div id="closeAccount" style="display:none; border: 1px solid #068101; padding: 5px;border-radius: 3px">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date_close">Date Closed</label>
                        <input type="text" name="date_close" value="" id="date_close" class="form-control mydatepicker">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date_close_approve">Date Close App. BOD</label>
                        <input type="text" name="date_close_approve" value="" id="date_close_approve" class="form-control mydatepicker">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="w_resolution_no">W.Resolution No.</label>
                        <input type="text" name="w_resolution_no" value="" id="w_resolution_no" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="close_reason">Reason</label>
                    <textarea id="close_reason" name="close_reason" rows="5" cols="100" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <!-- END -->
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Classification</label>
                    <select class="form-control custom-select" tabindex="1" id="classification" name="classification">
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="facilitator">Facilitator</label>
                    <input type="text" class="form-control" name="facilitator" id="facilitator">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="encoded_by">Encoded By</label>
                    <input type="text" class="form-control" name="encoded_by" id="encoded_by">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="invited_by">Invited by</label>
                    <input type="text" class="form-control" name="invited_by" id="invited_by">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date_of_pmes">Date of PMES</label>
                    <input type="text" class="form-control mydatepicker" name="date_of_pmes" id="date_of_pmes">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="date_encoded">Encoded Date</label>
                    <input type="text" class="form-control mydatepicker" name="date_encoded" id="date_encoded">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <input type="text" name="remarks" class="form-control" id="remarks">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
            <button type="submit" class="btn btn-success" id="account_info_btn_save"><i class="far fa-save"></i> Save Changes</button>
        </div>
      </div>
      </form>
    </div>
</div>
