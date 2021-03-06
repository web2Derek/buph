$(document).ready(function() {
 $('#singledate').datepicker({
    format: "mm-dd-yyyy",
    viewMode: "months",
    minViewMode: "months"
 });

 $('#pmesDate').datepicker({
    format: "mm-dd-yyyy",
    viewMode: "months",
    minViewMode: "months"
 });

 $('#filter_withdraw_date').datepicker({
    format: "mm-dd-yyyy",
    viewMode: "months",
    minViewMode: "months"
 });


  filterTable(date_filter = '', to='', branch='');
  fullPledge(date_filter = '', to='', branch='');
  memberStats(date_filter = '', member_type='');

  $(document).on('submit', '#filterMemberStat', function(e) {
    e.preventDefault();
    var date_filter = $('#ms_singledate').val();
    var member_type = $('#mem_type').val();
    $('#member_stats').DataTable().destroy();
    memberStats(date_filter, member_type);
  })

// SEARCH USER BY DATE AND BRANCH IN FULL PLEDGE TABLE
  $(document).on('submit', '#fullPledgeTable', function(e) {
    e.preventDefault();
    var date_filter = $('#fp_singledate').val();
    var mem_branch = $('#fp_mem_branch').val();
    var to = getlastDayOfMonth(date_filter);
    $('#full_pledge').DataTable().destroy();
    fullPledge(date_filter, to,mem_branch);
  })

// SEARCH USER BY DATE AND BRANCH IN NEW MEMBERS
  $(document).on('submit', '#filterTable', function(e) {
    e.preventDefault();
    var date_filter = $('#singledate').val();
    var mem_branch = $('#mem_branch').val();
    var to = getlastDayOfMonth(date_filter);
    $('#newlist').DataTable().destroy();
    filterTable(date_filter, to, mem_branch);
  })

  $(document).on('click' , '#filter_withdraw' , function() {
        let from = $('#filter_withdraw_date').val();
        let branch = $('#filter_withdraw_branch').val();
        withdrawal(from , getlastDayOfMonth(from) ,branch);
  });

  $(document).on('click' , '#filter_pmes' , function(){
      let from = $('#pmesDate').val();
      let to = getlastDayOfMonth(from);
      let branch = $('#pmes_branch').val();
      pmesReport(from,to,branch);
  });

  $(document).on('click' ,'.clr_btn' , function() {
        $('.to_clear') .val('');
  });

  function getlastDayOfMonth(date){
      let mydate = new Date(date);
      let last_day = new Date(mydate.getFullYear(), mydate.getMonth() + 1, 0);
      return last_day.getMonth() + 1 +'/'+ last_day.getDate() + '/' + last_day.getFullYear();
  }

// GET DATA FOR NEW MEMBERS
  function filterTable( date_filter ='', to, branch='') {
      var url = $('#base_url').val();
      var date_filter = date_filter;
      var mem_branch = branch;
      var new_member = $('#newlist').DataTable({
          responsive: true,
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [[11, 'asc']], //Initial no order.
          "columns": [
            {"data": "member_name", render: function(data, type, row, meta) {
              let str = `${row.first_name} ${row.middle_name} ${row.last_name}`;
                  return str;
            }},
            {"data": "member_address", render:function(data, type, row, meta) {
              let address =`${row.barangay_district} ${row.municipality}`;
              return address
            }},
            {"data": "date_added"},
            {"data": "gender"},
            {"data": "birthdate"},
            {"data": "age"},
            {"data": "grand_total"},
            {"data": "savings_deposit"},
            {"data": "title"},
            {"data": "invited_by"},
            {"data": "facilitator"},
            {"data": "branch_name"},
        ],
         // Load data for the table's content from an Ajax source

        "ajax": {
          "url": url + "reports/get_members",
          "type": "POST",
          "data": {date_filter:date_filter, mem_branch:mem_branch, to:to},
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
        "targets": [11],//first column / numbering column
        "orderable": true, //set orderable
        }],
           dom: 'Bfrtip',
           buttons: [{
             text : 'Export to EXCEL',
             extend: 'excel',
             filename: 'New Members Report'
           }]
      });

       $('.buttons-csv, .buttons-excel').addClass('btn btn-primary mr-1');
    }

  // GET DATA FOR FULL PLEDGE TABLE
     function fullPledge( date_filter ='', to,branch='') {
       var date_filter = date_filter;
       var mem_branch = branch;
       var url = $('#base_url').val();
       var new_member = $('#full_pledge').DataTable({
           responsive: true,
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [[11, 'asc']], //Initial no order.
           "columns": [
             {"data": "first_name", render: function(data, type, row, meta) {
               let str = ` ${row.middle_name} ${row.last_name}`;
                   return str;
             }},
             {"data": "barangay_district", render:function(data, type, row, meta) {
               let address =` ${row.municipality}`;
               return address;
             }},
             {"data": "date_added"},
             {"data": "gender"},
             {"data": "birthdate"},
             {"data": "age"},
             {"data": "grand_total"},
             {"data": "savings_deposit"},
             {"data": "title"},
             {"data": "invited_by"},
             {"data": "facilitator"},
             {"data": "branch_name"},
         ],
          // Load data for the table's content from an Ajax source

         "ajax": {
           "url": url + "reports/get_full_pledge",
           "type": "POST",
           "data": {date_filter:date_filter, mem_branch:mem_branch, to:to },
         },
         //Set column definition initialisation properties.
         "columnDefs": [{
           "targets": [11],//first column / numbering column
         "orderable": true, //set orderable
         }],
            dom: 'Bfrtip',
            buttons: [{
              text : 'Export to EXCEL',
              extend: 'excel',
              filename: 'Full Pledge Reports'
            }]
        });

      }


  // GET MEMBERSHIP STATISTIC DATA TABLE
  function memberStats( date_filter ='', mem_type='') {
    var date_filter = date_filter;
    var member_type = mem_type;
    var url = $('#base_url').val();
    var new_member = $('#member_stats').DataTable({
        responsive: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[0, 'asc']], //Initial no order.
        "columns": [
          {"data": "member_name"},
          {"data": "acount_id"},
          {"data": "title"},
          {"data": "member_address"},
          {"data": "birthdate"},
          {"data": "age"},
          {"data": "blood_type"},
          {"data": "civil_status"},
          {"data": "gender"},
          {"data": "religion"},
      ],
       // Load data for the table's content from an Ajax source

      "ajax": {
        "url": url + "reports/get_membership_statistic",
        "type": "POST",
        "data": {date_filter:date_filter, member_type:member_type },
      },
      //Set column definition initialisation properties.
      "columnDefs": [{
        "targets": [9],//first column / numbering column
      "orderable": true, //set orderable
      }],
         dom: 'Bfrtip',
         buttons: [{
           text : 'Export to EXCEL',
           extend: 'excel',
           filename: 'Membership Statistic Report'
         }]
     });

   }

 });


  // PMES REPORT
        pmesReport();
        function pmesReport(from = '' ,to = '', branch = ''){
            var base_url = $('#base_url').val();
            var table_pmes_report = $('#pmes_report').DataTable({
            "processing": true, //Feature control the processing indicator.
            "destroy" : true,
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [[0,'desc']], //Initial no order.
            "dom": 'Bfrtip',
            buttons: [{
              text : 'Export to EXCEL',
              extend: 'excel',
              filename: 'PMES Honorarium Reports'
            }],
            "columns":[
                {"data":"facilitator" , "render" : function(data, type, row, meta){
                    var str = '';
                    if (row.facilitator) {
                        str = row.facilitator;
                    }else {
                        str = row.invited_by;
                    }

                    return str;
                }},
                {"data":"facilitator" , "render" : function(data, type, row, meta){
                    var str  = '';
                    if (row.facilitator) {
                        return str = 'Facilitator';
                    }else if (row.invited_by) {
                        return str = 'Sponsor';
                    }else if (row.invited_by &&  row.facilitator) {
                        return str = 'Facilitator/Sponsor';
                    }
                    return str;
                }},
                {"data":"member"},
                {"data":"branch_name"}
            ],
            // Load data for the table's content from an Ajax source
            "ajax": {
            "url": base_url+"reports/getPmes",
            "type": "POST",
            "data" : {from : from , to:to, branch : branch}
            },
            //Set column definition initialisation properties.
            "columnDefs": [
            {
            "targets": [0], //first column / numbering column
            "orderable": true, //set not orderable
            },
            ],
            });
        }

        withdrawal();
        function withdrawal(from = '' , to = '' , branch ='' ){
            var base_url = $('#base_url').val();
            var withdrawal = $('#withdrawal').DataTable({
            "processing": true, //Feature control the processing indicator.
            "destroy" : true,
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [[0,'desc']], //Initial no order.
            "dom": 'Bfrtip',
            "buttons": [{
                text : 'Export to EXCEL',
                extend: 'excel',
                filename: 'Widrawal of Membership Reports'
              }],
            "columns":[
                {"data":"branch_name"},
                {"data":"first_name" , "render" : function(data, type, row, meta){
                    return  row.first_name+ ' ' +row.last_name+' '+row.middle_name;
                }},
                {"data":"reason"},
                {"data":"date_close"},
                {"data":"date_close" , "render" : function() {
                    return 'N/A';
                }},
                {"data":"savings_deposit"},
                {"data":"sub_total"},
                {"data":"loans_payable"},
                {"data":"credit_on_trade_payable"},
                {"data":"interest_on_loan_payable"},
                {"data":"penalties_on_trade_payable"},
                {"data":"penalties_on_loan_payable_2"},
                {"data":"grand_total"},
            ],
            // Load data for the table's content from an Ajax source
            "ajax": {
            "url": base_url+"reports/getwithdrawalReport",
            "type": "POST",
            "data" : {from : from ,to : to , branch : branch}
            },
            //Set column definition initialisation properties.
            "columnDefs": [
            {
            "targets": [0], //first column / numbering column
            "orderable": true, //set not orderable
            },
            ],
            });
        }

// MEMBERSHIP REPORT

  $(document).on('submit', function(e) {
    e.preventDefault();
    let url = $('#base_url').val();
    let data_r = $('#member_report_date').val();

    $.ajax({
      method: 'POST',
      url: url + 'reports/getMemberStatistic',
      data: {data: data_r},
      dataType: 'json',
      success:function(data) {
          console.log(data);
        }
    })
  })

  /*******************************************/
      // Single Date Range Picker
      /*******************************************/
  // $('.singledate').daterangepicker({
  //     singleDatePicker: true,
  //     showDropdowns: true,
  //     onSelect: function() {
  //       alert('1');
  //   }
  // }).val("");

  // $('#singledate').daterangepicker({
  //   singleDatePicker: true,
  //   showDropdowns: true
  // })

  $('#singledate').datepicker({
      format: "mm-dd-yyyy",
     viewMode: "months",
     minViewMode: "months"
  });

  $('#fp_singledate').datepicker({
      format: "mm-dd-yyyy",
       viewMode: "months",
       minViewMode: "months"
  });

//DATE PICKER FOR MEMBERSHIP STATISTIC REPORT
$('#member_report_date').datepicker({
    format: "mm-dd-yyyy",
    viewMode: "months",
    minViewMode: "months"
});
  // $('#fp_singledate').daterangepicker({
  //   singleDatePicker: true,
  //   showDropdowns: true,
  //   locale: {
  //     format: 'M/YYYY'
  //   }
  // })

  $('#ms_singledate').datepicker({
      format: "mm-dd-yyyy",
     viewMode: "months",
     minViewMode: "months"
  });

  $('#total_mem_sum').datepicker({
    format: "mm-dd-yyyy",
     viewMode: "months",
     minViewMode: "months"
  });

  // $('#ms_singledate').daterangepicker({
  //   singleDatePicker: true,
  //   showDropdowns: true
  //
  // })
