
$(document).on('change' ,'#member_type', function() {
    let data = $(this).val();
    if (data == 4) {
        $('#closeAccount').fadeIn();
    }else{
        $('#closeAccount').fadeOut();
    }
})
$(document).on('click' , '.accountInfo' , function() {
    let id = $(this).attr('member-data');
    sessionStorage.setItem('memberIdModal' , id);
    let url = $('#base_url').val() + 'members/getInfoData';
    let data = {id : id};

    $.ajax({
        method : 'POST',
        url : url ,
        data : data,
        dataType : 'json',
        success : function(res) {
            if (res.status == 'success') {
                renderhtmlData(res);
            }
        }
    })
});

$('#membershipFee, #mortuaryPrem, #savingsDeposit, #paidup_capital').on('keyup' , function() {
    let member_fee     = $('#membershipFee').val();
    let mortuary_prem  = $('#mortuaryPrem').val();
    let savingsDeposit = $('#savingsDeposit').val();
    let paid_up        = $('#paidup_capital').val();
    let total = 0;
    $('#total').text(parseFloat(total));
    total = Number(member_fee) + Number(mortuary_prem) + Number(savingsDeposit) + Number(paid_up);

    $('#total').text(parseFloat(total));
    computeSubTotal();
    computeGrandTotal();
});



$('#savingsDeposit').on('keyup' , function() {
    let sub = $(this).val();
    let deductions = $('#deduction').val();
    let g_total = 0 ;

    g_total = Number(sub) - Number(deductions);

    $('#savingsDeposit_2').val(parseFloat(g_total));
    computeSubTotal();
    computeGrandTotal();
});

$('#amount').on('keyup' , function() {
    let vl = $(this).val();
    $('#capitalShareDeposit').val(vl);
    computeSubTotal();
    computeGrandTotal();
});

$('#time_deposit').on('keyup' , function() {
    computeSubTotal();
    computeGrandTotal();
});

$('#loansPayable , #CreditoTrade , #interestOnLoanPayable , #penaltiesOnTrade , #penalties_on_loan').on('keyup' , function() {
    computeDeductions();
    computeGrandTotal();
});

function computeSubTotal(){
    let capitalShareDeposit = $('#capitalShareDeposit').val();
    let savingsDeposit_2 = $('#savingsDeposit_2').val();
    let time_deposit = $('#time_deposit').val();
    let total = 0;

    total = Number(capitalShareDeposit) + Number(savingsDeposit_2) + Number(time_deposit);

    $('#sub_total').val(parseFloat(total));
}

function computeDeductions(){
    let loansPayable          = $('#loansPayable').val();
    let creditoTrade          = $('#CreditoTrade').val();
    let interestOnLoanPayable = $('#interestOnLoanPayable').val();
    let penaltiesOnTrade      = $('#penaltiesOnTrade').val();
    let penalties_on_loan     = $('#penalties_on_loan').val();
    let total = 0;

    total = Number(loansPayable) + Number(creditoTrade) + Number(interestOnLoanPayable) + Number(penaltiesOnTrade) + Number(penalties_on_loan);
    $('#deduction').val(parseFloat(total));
}

function computeGrandTotal(){
    let sub_total = $('#sub_total').val();
    let deduction = $('#deduction').val();
    let grand_total;

    grand_total = Number(sub_total) - Number(deduction);

    $('#grand_total').val(parseFloat(grand_total));
}

function renderhtmlData(res){
    $('#accountNumber').val(res.data.acount_id);
    $('#resolutionNo').val(res.data.ac_resolution_no);
    $('#member_type').val(res.data.member_type_id);
    if (res.data.member_type_id == 4) {
        $('#closeAccount').fadeIn();
        $('#date_close').val(res.closedata.date_close);
        $('#date_close_approve').val(res.closedata.date_approve);
        $('#w_resolution_no').val(res.closedata.wt_resolution_no);
        $('#close_reason').val(res.closedata.reason);
        $('#account_info_btn_save').prop('disabled' , true);
        $('#account_info_btn_save').hide();
    }else{
        $('#account_info_btn_save').prop('disabled' , false);
        $('#account_info_btn_save').show();
        $('#closeAccount').fadeOut();
    }
    $('#branch').val(res.data.branch);
    $('#dateApprove').val(res.data.date_approve);
    $('#dateApplied').val(res.data.date_added);
    $('#member_type').val(res.data.member_type_id);
    $('#membershipFee').val(res.data.membership_fee);
    $('#mortuaryPrem').val(res.data.mortuary_prem);
    $('#savingsDeposit').val(res.data.savings_deposit);
    $('#paidup_capital').val(res.data.paid_up_capital);
    $('#total').text(res.data.total);
    $('#amount').val(res.data.amount);
    $('#noOfshares').val(res.data.no_of_shares);
    $('#depositedForSubs').val(res.data.deposited_for_subs);
    $('#capitalShareDeposit').val(res.data.capital_share_deposit);
    $('#loansPayable').val(res.data.loans_payable);
    $('#CreditoTrade').val(res.data.credit_on_trade_payable);
    $('#savingsDeposit_2').val(res.data.savings_deposit);
    $('#interestOnLoanPayable').val(res.data.interest_on_loan_payable);
    $('#penaltiesOnTrade').val(res.data.penalties_on_trade_payable);
    $('#time_deposit').val(res.data.time_deposit);
    $('#penalties_on_loan').val(res.data.penalties_on_loan_payable_2);
    $('#sub_total').val(res.data.sub_total);
    $('#deduction').val(res.data.deductions);
    $('#grand_total').val(res.data.grand_total);
    $('#classification').val(res.data.classifications);
    $('#facilitator').val(res.data.facilitator);
    $('#encoded_by').val(res.data.firstname + ' ' + res.data.middlename + ' ' + res.data.lastname);
    $('#invited_by').val(res.data.invited_by);
    $('#date_of_pmes').val(res.data.date_of_pmes);
    $('#date_encoded').val(res.data.encoded_date);
    $('#remarks').val(res.data.remarks);
}
