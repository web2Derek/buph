$(document).ready(function() {
  $('.mydatepicker').datepicker();
  var base_url = $('#base_url').val();

//   var memberlistid = $('#memberlist_id').DataTable({
//     "processing": true, //Feature control the processing indicator.
//     "serverSide": true, //Feature control DataTables' server-side processing mode.
//     "order": [[0,'desc']], //Initial no order.
//     "columns":[
//         {"data" : "first_name" , "render" : function() {
//             var str = '';
//             str = `<input type="checkbox" class="addtolist">`;
//             return str;
//         }},
//         {"data":"first_name" , "render" : function(data, type, row,meta) {
//             var str = row.first_name+ ' ' +row.last_name;
//             return str;
//         }
//         },
//         {"data":"acount_id" , 'render' : function(data, type, row,meta) {
//             var str = '';
//             str += row.first_name;
//             str += `<input type="hidden" class="account_no_generated" value="${row.member_id}">`;
//             return str;
//         }},
//         {"data":"total"},
//         {"data":"date_last_generated"},
//     ],
//   // Load data for the table's content from an Ajax source
//   "ajax": {
//     "url": base_url+"members/getlistid",
//     "type": "POST"
//   },
//   //Set column definition initialisation properties.
//   "columnDefs": [
//     {
//       "targets": [0], //first column / numbering column
//       "orderable": true, //set not orderable
//     },
//   ],
// });

  var memberlist = $('#memberlist').DataTable({
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [[0,'desc']], //Initial no order.
    "columns":[
      {"data":"first_name" , "render" : function(data, type, row,meta) {
        var str = row.first_name+ ' ' +row.last_name;
        return str;
      }
    },
    {"data":"acount_id"},
    {"data":"title"},
    {"data":"birthdate"},
    {"data":"age"},
    {"data":"blood_type"},
    {"data":"gender"},
    {"data":"civil_status"},
    {"data":"religion"},
    {"data":"branch_name"},
    {"data":"acount_id" , "render" : function(data, type, row,meta) {
      var str = '';
      str = `
      <a href="javascript:;" title="Account Information">
      <button type="button" data-toggle="modal" data-target="#accountInfo" class="btn waves-effect waves-light btn-outline-warning btn-sm accountInfo" member-data=${row.member_id} name="accountInfo" ><i class="ti-user"></i></button>
      </a>
      <a title="Edit Member" href="${base_url}members/viewMember/${row.member_id}">
      <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" ><i class="far fa-edit"></i></button>
      </a>
      <a href="javascript:;" title="View Member Details">
      <button type="button" data-toggle="modal" data-target="#viewMember" class="btn waves-effect waves-light btn-outline-warning btn-sm viewMember" name="viewMember" member-data=${row.member_id}><i class="fa fa-eye"></i></button>
      </a>
      `;
      // <a href="javascript:;">
      // <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" name="button"><i class="fa fa-trash"></i></button>
      // </a>
      // <a href="javascript:;" title="Approve Member">
      // <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" name="button"><i class="fa fa-check"></i></button>
      // </a>
      return str;
    }}
  ],
  // Load data for the table's content from an Ajax source
  "ajax": {
    "url": base_url+"members/getMembers",
    "type": "POST"
  },
  //Set column definition initialisation properties.
  "columnDefs": [
    {
      "targets": [10], //first column / numbering column
      "orderable": true, //set not orderable
    },
  ],
});

        // var memberlist = $('#memberlist').DataTable({
        //     "processing": true, //Feature control the processing indicator.
        //     "serverSide": true, //Feature control DataTables' server-side processing mode.
        //     "order": [[0,'desc']], //Initial no order.
        //     "columns":[
        //       {"data":"first_name" , "render" : function(data, type, row,meta) {
        //         var str = row.first_name+ ' ' +row.last_name;
        //         return str;
        //       }
        //     },
        //     {"data":"acount_id"},
        //     {"data":"title"},
        //     {"data":"birthdate"},
        //     {"data":"age"},
        //     {"data":"blood_type"},
        //     {"data":"gender"},
        //     {"data":"civil_status"},
        //     {"data":"religion"},
        //     {"data":"branch_name"},
        //     {"data":"acount_id" , "render" : function(data, type, row,meta) {
        //       var str = '';
        //       str = `
        //       <a href="javascript:;" title="Account Information">
        //       <button type="button" data-toggle="modal" data-target="#accountInfo" class="btn waves-effect waves-light btn-outline-warning btn-sm accountInfo" member-data=${row.member_id} name="accountInfo" ><i class="ti-user"></i></button>
        //       </a>
        //       <a title="Edit Member" href="${base_url}members/viewMember/${row.member_id}">
        //       <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" ><i class="far fa-edit"></i></button>
        //       </a>
        //       <a href="javascript:;" title="View Member Details">
        //       <button type="button" data-toggle="modal" data-target="#viewMember" class="btn waves-effect waves-light btn-outline-warning btn-sm viewMember" name="viewMember" member-data=${row.member_id}><i class="fa fa-eye"></i></button>
        //       </a>
        //       <a href="javascript:;">
        //       <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" name="button"><i class="fa fa-trash"></i></button>
        //       </a>
        //       <a href="javascript:;" title="Approve Member">
        //       <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm" name="button"><i class="fa fa-check"></i></button>
        //       </a>
        //       `;
        //       return str;
        //     }}
        // ],
        //     // Load data for the table's content from an Ajax source
        //     "ajax": {
        //         "url": base_url+"members/getMembers",
        //         "type": "POST"
        //     },
        //     //Set column definition initialisation properties.
        //     "columnDefs": [
        //     {
        //       "targets": [9], //first column / numbering column
        //       "orderable": true, //set not orderable
        //     },
        //     ],
        // });

        var table_branch = $('#tbl_branch').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [[0,'desc']], //Initial no order.
            "columns":[
                {"data":"branch_name"},
                {"data":"branch_code"},
                {"data":"address"},
                {"data":"Status","render": function(data, type, row, meta){
                var str = '';
                if(row.Status == '1'){
                    str += 'Active';
                } else {
                    str += 'In-Active';
                }
                return str;
                }
            },
            {"data":"branch_id","render": function(data, type, row,meta){
            var str = '';
            str += `
                <a href="javascript:;">
                <button branch_id ="${row.branch_id}" type="button" class="btn waves-effect waves-light btn-outline-warning branch_btn_edit btn-sm" data-toggle="modal" data-target="#edit_Branch"><i class="far fa-edit"></i></button>
                </a>
                <a href="javascript:;">
                <button type="button" class="btn waves-effect waves-light btn-outline-warning del-branch btn-sm" id="${row.branch_id}">
                <i class="fas fa-lock"></i>
                </button>
                </a>

            `;
            return str;
            }
            },
            ],
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": base_url+"branch/get_branches",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [
            {
            "targets": [4], //first column / numbering column
            "orderable": true, //set not orderable

            },
            ],
        });


var table_users = $('#userlist').DataTable({

  "processing": true, //Feature control the processing indicator.
  "serverSide": true, //Feature control DataTables' server-side processing mode.
  "order": [[0,'desc']], //Initial no order.
  "columns":[
    {"data":"full_name"},
    {"data":"username"},
    {"data":"email"},
    {"data":"status","render": function(data, type, row,meta){
      var str = '';
      if(row.status == '1'){
        str += 'Active';
      } else {
        str += 'In-Active';
      }
      return str;
    }
  },
  {"data":"user_type" , "render" : function(data,type,row,meta) {
    var str = '';
    switch (row.user_type) {
      case '0':
      return 'Guest';
      break;
      case '1':
      return 'Administrator';
      break;
      case '2':
      return 'Super Admin';
      break;
      default:
      break;
    }
  }},
  {"data" : "branch_name"},
  {"data":"branch_id","render": function(data, type, row,meta){
    var str = '';
    str += `
    <div class="btn-group">
    <button info_id="${row.info_id}" type="button" class="btn_edit btn waves-effect waves-light btn-outline-warning edit-btn btn-sm" data-toggle="modal" data-target="#edit_User">
    <i class="far fa-edit"></i>
    </button>
    </div>`;
    if (row.status == 1) {
      str+= `
      <button type="button" class="btn waves-effect waves-light btn-outline-warning  activate-btn btn-sm" id="${row.info_id}" stats = "inactive">
      <i class=" fas fa-lock"></i>
      </button>
      `;
    }else{
      str+= `
      <button type="button" class="btn waves-effect waves-light btn-outline-warning activate-btn btn-sm" id="${row.info_id}" stats = "active">
      <i class="fas fa-lock-open fas fa-lock"></i>
      </button>
      `;
    }
    return str;
  }
},
],
// Load data for the table's content from an Ajax source
"ajax": {
  "url": base_url+"users/get_users",
  "type": "POST"
},
//Set column definition initialisation properties.
"columnDefs": [
  {
    "targets": [6], //first column / numbering column
    "orderable": false, //set not orderable
  },
],
});



// SMS TEMPLATE DATABLE
var url = $('#base_url').val();
var sms_table =  $('#sms_table').DataTable({
  "processing": true, //Feature control the processing indicator.
  "serverSide": true, //Feature control DataTables' server-side processing mode.
  "order": [[0, 'asc']], //Initial no order.
  "columns": [
    {"data": "sms_title"},
    {"data":"sms_created"},
    {"data":"date_modified"},
    {"data":"added_by"},
    {"data": "sms_id","render": function(data, type, row, meta) {
      let sms_buttons = '';

      sms_buttons += `<div class="btn-group">
      <button id="${row.sms_id}" type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm edit_sms" data-toggle="modal" data-target="#modal_sms">
      <i class="far fa-edit"></i>
      </button>
      <button type="button" name="sms_id" class="btn waves-effect waves-light btn-outline-warning btn-sm delete-sms" id="${row.sms_id}">
      <i class="fas fa-trash-alt"></i>
      </button>
      </div>`;
      return sms_buttons;
    }
  },
],
// Load data for the table's content from an Ajax source

"ajax": {
  "url": url+"sms/fetch_template",
  "type": "POST"
},
//Set column definition initialisation properties.
"columnDefs": [{
  "targets": [2],//first column / numbering column
  "orderable": true, //set orderable
}]
});


$('#btn_create').on('click' , function() {
  enableInputs();
})

//====================================================== ADD USER FORM
$('#createUserForm').on("submit" , function(e) {
  e.preventDefault();
  let url = $('#base_url').val();
  let formData = $(this).serialize();
  console.log(url);
  $.ajax({
    method: 'POST',
    url : url + 'users/createUser',
    data : formData,
    success : function(response) {
      let data = JSON.parse(response);
      if(data.form_error){
        clearError();
        let keyNames = Object.keys(data.form_error);
        $(keyNames).each(function(index , value) {
          $("input[name='"+value+"']").next('.err').text(data.form_error[value]);
        });

      }else if (data.error) {
        Swal.fire("Error",data.error, "error");
      }else {
        $('#add_User').modal('hide');
        Swal.fire("Success",data.success, "success");
        table_users.ajax.reload();
        console.log('Updated table');
      }
    }
  })
})

//==================================================== EDIT USER

$(document).on('click' ,'.btn_edit', function() {
  let info_id = $(this).attr('info_id'),
  url = $('#base_url').val();
  $.ajax({
    method: 'POST',
    url : url + 'users/getSingleUser',
    data :{info_id : info_id},
    dataType:'json',
    success : function(response) {
      AssignSingleUserData(response);
      sessionStorage.setItem("active_edit_user_id", info_id);
    },
  })
})

//======================================================= UPDATE USER
$('#editeUserForm').on("submit" , function(e) {
  e.preventDefault();
  let url = $('#base_url').val();
  let formData = $(this).serializeArray();
  formData.push({name:'info_id' , value : sessionStorage.getItem('active_edit_user_id')});
  $.ajax({
    method : 'POST',
    url : url + 'users/updateUser',
    data : formData,
    success : function(response){
      let data = JSON.parse(response);
      clearError();
      if (data.form_error) {
        let keyNames = Object.keys(data.form_error);
        $(keyNames).each(function(index , value) {
          $("input[name='"+value+"']").next('.err').text(data.form_error[value]);
        });
      }else if (data.error) {
        Swal.fire("Error",data.error, "error");
      }else {
        Swal.fire("Updated!",data.success, "success");
        table_users.ajax.reload();
      }
    }
  })
})

//====================================================================================== ADDING CONTACT GROUP
$('#add-contact-list').on('submit', function(event) {
  event.preventDefault();
  let url = $('#base_url').val();
  let formData = $(this).serializeArray();
  $.ajax({
    method: "POST",
    url: url + 'sms/add_contact',
    data: formData,
    success: function(data) {
      Swal.fire('Success', 'Contact List Created', 'success');
      $('#add-contact-list')[0].reset();
      $('#contact_modal').modal('hide');
    },
    error: function(xhr, ajaxOptions, thrownError) {
      // alert(xhr.responseText);
      // alert(thrownError);
      Swal.fire('Error', 'Something went Wrong', 'error');
    }
  })

})

//======================================================== ADD SMS
$("#form_add_sms").on("submit", function(e) {
  e.preventDefault();
  clearSmsError();
  let url = $('#base_url').val();
  let formData = $(this).serializeArray();

  $.ajax({
    method: "POST",
    url: url + 'sms/add_sms',
    data: formData,
    success: function(response) {
      let data = JSON.parse(response);
      if(data.form_error){
        let keyNames = Object.keys(data.form_error);
        $(keyNames).each(function(index , value) {
          if(value == "sms_message"){
            $("textarea[name='"+value+"']").next('.err-temp').text(data.form_error[value]);
          }
          $("input[name='"+value+"']").next('.err-temp').text(data.form_error[value]);
        });
      } else {
        Swal.fire(
          'SMS Template!',
          'Successfully Added SMS Template.',
          'success'
        );
        $('#form_add_sms')[0].reset();
        sms_table.ajax.reload();
      }
    }
  });
});

//==================================================== EDIT SMS

$(document).on('click', '.edit_sms', function(event) {
  event.preventDefault();
  let id = $(this).attr('id');
  let url = $('#base_url').val();

  $.ajax({
    method: 'POST',
    url: url + 'sms/fetch_sms',
    data: {id: id},
    dataType: 'json',
    success: function(data) {
      $('#edit_sms_form input[name="sms_title"]').val(data.sms_title);
      $('#edit_sms_form textarea[name="sms_message"]').val(data.sms_message);
      $('#hidden_sms_id').val(data.sms_id);
    }
  })
})


//====================================================== UPDATE Sms

$(document).on('submit', '#edit_sms_form', function(event) {
  event.preventDefault();
  clearSmsError();
  let id = $('#hidden_sms_id').val();
  let url = $('#base_url').val();
  let formdata = new FormData($('#edit_sms_form')[0]);

  $.ajax({
    url: url + 'sms/update_sms',
    data: formdata,
    processData: false,
    contentType: false,
    method: 'POST',
    dataType: 'json',
    success: function(response){
      let data = JSON.parse(response);
      console.log(data);
      if(data.form_error){
        let keyNames = Object.keys(data.form_error);

        $(keyNames).each(function(index , value) {
          if(value == "sms_message"){
            $("textarea[name='"+value+"']").next('.err-temp').text(data.form_error[value]);
          }
          $("input[name='"+value+"']").next('.err-temp').text(data.form_error[value]);
        });

      } else {
        $('#edit_sms_form')[0].reset();
        Swal.fire('Update SMS!','Successfully Updated SMS Template!');
        sms_table.ajax.reload();
      }
    }
  });
})

//===================================== SENDING INDIVIUAL SMS
$(document).on('submit', '#sent_individual', function(e) {
  e.preventDefault();
  // let url = 'http://192.168.30.100:1688/services/api/messaging/';
  let formData = $(this).serializeArray();
  let message = $('#message').val();
  let values = $('#to').val();
  let sms_url = $('#sms_ip').val();
  let text_ip =  localStorage.setItem('ip', sms_url);
  console.log(localStorage.getItem('ip'));

  $('.spinner').css('display', 'block');

  values.map((val,idx) => {
    $.ajax({
      method: 'POST',
      url: sms_url,
      data:  {'to':val, 'message':message},
      success:  function(response) {
        if(response.isSuccessful) {
          Swal.fire(
            'Success',
            'Sms sent!!!',
            'success'
          );

          $('.spinner').css('display', 'none');

          jQuery(function ($) {
            $('#sms-template').val('');
            $('#message').val("");
            var selectize = $('#to')[0].selectize;
            selectize.clear();
          })
          $('#sent_individual')[0].reset();
        }
      },
      error: function(response, status) {
        Swal.fire('Error', 'Invalid IP. Please check the IP setup.', 'error');
        $('.spinner').css('display', 'none');
        $(this).modal('hide');
      }
    })
  })
})

//===================================== SENDING GROUP SMS

$('#group_contact').on('submit', function(e) {
  e.preventDefault();

  // let url = 'http://192.168.30.113:1688/services/api/messaging/';
  // let formData = $(this).serializeArray();
  let url = $("#base_url").val();
  let values = $('#group_list').val();
  let group_list = $('#group_list').val();

  $.ajax({
    url: url + 'sms/sent_group',
    method: 'POST',
    data: {group_list: group_list},
    dataType: 'json',
    success: function(data) {
      let num_arr = [];
      $(data).each(function(idx ,val) {
        let tojson = JSON.parse(val);
        // console.log(typeof(tojson));
        // num_arr.push(val);
        // console.log(num_arr);
        // new_arr.map((data) => {
        //   console.log(data);
        // })
        $(tojson).each(function(idx , data) {
          num_arr.push(data);
          console.log(data);
          // $('#group_contact').modal('hide');
        })
      })
      sentToGroup(num_arr);
    }
  }).done(function() {
    Swal.fire(
      'Success',
      'Sms sent to Group!!!',
      'success'
    );
    jQuery(function ($) {
      $('#sms-group-template').val("");
      $('#group_message').val("");
      var selectize = $('#group_list')[0].selectize;
      selectize.clear();
    })
  })
})

function sentToGroup(data) {
  let group_message = $('#group_message').val();
  $(data).each(function(idx, val) {
    $.ajax({
      method: 'POST',
      url: 'http://192.168.30.25:1688/services/api/messaging/',
      data:  {'to':val, 'message':group_message},
      success:  function(response) {
        console.log('success');
      },
      error: function(response, status) {
        Swal.fire('Error', 'Server Error', 'error');
      }
    })
  })
}

// ================================================================================

$(document).on("click",'.delete-sms', function(e) {
  e.preventDefault();
  var url = $('#base_url').val();
  var id = $(this).attr('id');
  var $ele = $(this).parent().parent();
  console.log(id);

  Swal.fire({
    title: 'Are you sure?',
    text: "You want to delete this SMS Template!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#068101',
    confirmButtonText: 'Yes, Delete SMS!'
  }).then((result) => {
    if (result.value) {

      Swal.fire(
        'Deactivate!',
        'Successfully Deleted SMS Template!',
        'success'
      )
      $.ajax({
        type: 'POST',
        url: url + 'sms/delete_sms',
        data: {id: id},
        success:function(data) {
          $ele.closest('tr').fadeOut().remove();
          console.log('Deleted SMS');
        }
      })
    }
  })
});


$(document).on("click", '.activate-btn',function(event) {

  event.preventDefault();
  var url = $('#base_url').val();
  var id = $(this).attr('id');
  let stats = $(this).attr('stats');

  let formData = {
    id : id,
    stats : stats
  };

  Swal.fire({
    title: 'Are you sure?',
    text: "You want to " + (stats === 'active' ? 'Activate' : 'Deactivate') + " this User?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#068101',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Okay'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: 'POST',
        url: url + 'users/deactivateUser',
        data: formData,
        dataType : 'json',
        success:function(data) {
          table_users.ajax.reload();
        }
      })
    }
  })
});


// ========================================================================= DELETE Branch
$(document).on('click', '.del-branch', function() {
  var url = $('#base_url').val();
  var id = $(this).attr('id');
  var $ele = $(this).parent().parent();
  console.log(id);
  Swal.fire({
    title: 'Are you sure?',
    text: "Are you sure you want to Deactivate this Branch?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Deactivate it.'
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        'Deactivate!',
        'Branch Deactivated.',
        'success'
      )

      $.ajax({
        type: 'POST',
        url: url + 'branch/deleteBranch',
        data: {id:id},
        success:function(data) {
          console.log(data);
          if (data.status = 'success') {
            table_branch.ajax.reload();
          }
        }
      })
    }
  })
})
// ========================================================================= END User

// ========================================================================= Branch Section

$('#addBranchForm').on("submit" , function(e) {
  e.preventDefault();
  clearError();
  let url = $('#base_url').val(),
  formData = $(this).serialize();

  $.ajax({
    url : url + 'branch/createBranch',
    method: 'POST',
    data : formData,
    success : function(response){
      let data = JSON.parse(response);
      if (data.form_error) {
        let keyNames = Object.keys(data.form_error);

        $(keyNames).each(function(index , value) {
          $("input[name='"+value+"']").next('.err').text(data.form_error[value]);
        });

      }else if (data.error) {
        Swal.fire("Error",data.error, "error");
      }else {
        $('#add_Branch').modal('hide');
        Swal.fire("Success!",data.success, "success");
        $('#addBranchForm').modal('hide');
        table_branch.ajax.reload();
      }
    }
  })
})

//================================================= EDIT BRANCH
$(document).on('click' ,'.branch_btn_edit', function() {
  let branch_id = $(this).attr('branch_id'),
  url = $('#base_url').val(),
  data = {branch_id : branch_id };
  $.post(url + 'branch/getBranch' , data).done(function(response) {
    sessionStorage.setItem("active_edit_branch_id", branch_id);
    let data = JSON.parse(response);
    AssignSingleBranch(data);
  });
});
//===================================================== UPDATE BRANCH
$('#editBranchForm').on("submit" , function(e) {
  e.preventDefault();
  clearError();
  let url = $('#base_url').val(),
  formData = $(this).serializeArray();
  formData.push({name : 'branch_id' , value : sessionStorage.getItem('active_edit_branch_id')});
  $.post(url + 'branch/updateBranch' , formData).done(function(response) {
    let data = JSON.parse(response);
    if (data.form_error) {
      let keyNames = Object.keys(data.form_error);

      $(keyNames).each(function(index , value) {
        $("input[name='"+value+"']").next('.err').text(data.form_error[value]);
      });
    }else if (data.error) {
      Swal.fire("Error",data.error, "error");
    }else{
      $('#edit_Branch').modal('hide');
      Swal.fire("Success!",data.success, "success");
      table_branch.ajax.reload();
    }
  })
});



// ===================================================================================== END BRANCH SECTION

// ======================================================================================Add New Member Section
memberFormConfig();
$('input[name="source_business"]').click(function() {
  if ($(this).prop('checked') == true) {
    $('#if_business').fadeIn();
  }else{
    $('#if_business').fadeOut();
  }
})

if ($('input[name="source_business"]').prop('checked') == true) {
    $('#if_business').fadeIn();
}
if ($('input[name="source_farmer"]').prop('checked') == true) {
    $('#if_farmer').fadeIn();
}

$('input[name="source_farmer"]').click(function() {
  if ($(this).prop('checked') == true) {
    $('#if_farmer').fadeIn();
  }else{
    $('#if_farmer').fadeOut();
  }
})

$('input[name="source_others"]').click(function() {
  if ($(this).prop('checked') == true) {
    $('#if_others').fadeIn();
  }else{
    $('#if_others').fadeOut();
  }
})

$('input[name="source_others"]').click(function() {
    if ($(this).prop('checked') == true) {
        $('#if_others').fadeIn();
    }else{
        $('#if_others').fadeOut();
    }
})
    $('#add_member').on('submit' , function(e) {
        e.preventDefault();
        clearError();
        let isEdit = $(this).attr('isEdit');
        let url = $('#base_url').val() + 'members/AddNewMember';
        let formData = new FormData(this);
        let profile_new = $('#profile_new').prop('files')[0];
        formData.append('profile_new' , profile_new);
        // $(this).prop('files')[0]);
        $.ajax({
            method : 'POST',
            url : url,
            data : formData,
            processData: false,
            contentType: false,
            dataType : 'json',
            success : function(data) {
                if (data.form_error) {
                    let keys = Object.keys(data.form_error);
                    $(keys).each( function(idx , val){
                        $("input[name='"+val+"']").css('border' , '1px solid red');
                        $("input[name='"+val+"']").next('.err').text(data.form_error[val]);
                    });
                    console.log(keys[0]);
                    $('html, body').animate({
                        scrollTop: $("input[name='"+keys[0]+"']").offset().top - 160
                    }, 2000);

                }else if (data.success) {
                    Swal.fire("Success!",data.success, "success");
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }else {
                    Swal.fire("Error.",data.error, "error");
                }
            },
        })
    });

$('#update_mem').on('submit' , function(e) {
  e.preventDefault();
  clearError();
  let url = $('#base_url').val() + 'members/updateMember';
  let formData = new FormData(this);
  let profile_image = $('#capture_photo').attr('src');
  let member_id = $('input[name="member_id"]').val();
  formData.append('member_id' , member_id);
  if (profile_image) {
    formData.append('profile_image' , profile_image);
    formData.append('is_captured' , true);
  }
  $.ajax({
    method : 'POST',
    url : url,
    data : formData,
    processData: false,
    contentType: false,
    dataType : 'json',
    success : function(data) {
      if (data.form_error) {
        let keys = Object.keys(data.form_error);
        $(keys).each( function(idx , val){
          $("input[name='"+val+"']").next('.err').text(data.form_error[val]);
        })
      }else if (data.success) {
        Swal.fire("Success!",data.success, "success");
        setTimeout(function () {
          location.reload();
        }, 1000);
      }else {
        Swal.fire("Server Error.",data.error, "error");
      }
    },
  })
});
// Member ID Section

// add to list
$(document).on('click' , '.addtolist' , function() {
  let key = $(this).attr('remove_id');
  if ($(this).prop('checked') == true) {
    let clone = $(this).closest('tr').clone();
    $(clone).attr({
      'class' : 'generate remove_selected_'+key,
    });
    $('#selectedmember').append(clone);
  }else {
    remove_selected(key);
  }
})

$(document).on('click' , '.generate_id' , function() {
  let data_array = [];
  let accountID = [];
  // var checked_member = $('#memberlist_id .account_no_generated').parents('tbody').find('input[type="checkbox"]:checked');
  // $.each(checked_member,function(index,element){
  //     var account_no = $(element).parent().parent().find('input[type="hidden"]').val()
  //     console.log(account_no);
  // });
var data_arr = [];
  $('.generate').each(function(idx , val) {
    let html = '';
    let outer =  $('#selectedmember tr td:nth-child(3)')[idx];
    let id = $(outer).attr('account');
    let txt  =  $('#selectedmember tr td:nth-child(3)')[idx].innerText;
    accountID.push(txt)
    data_array.push(id);
  });

  localStorage.setItem('printLogs' , JSON.stringify(data_array));
  let url = $('#base_url').val();
  $.ajax({
    method: 'POST',
    url : url + 'members/getMemberBy_id',
    data : {account_id: data_array},
    dataType : 'json',
    success : function(response) {
      // let data_arr = [];
      var html = '';
      // generateId_html(response);
      // console.log(response);
      $.each(response.data, function(index,element) {
        data_arr.push(element.acount_id);
        console.log(element.acount_id);
        html += `<div id="print_me_plss"><div class="col-md-6 col-sm-12 col-xs-12 animated bounceInLeft">
        <div class="id_wrapper">
        <div class="front">
        <div class="idbackground">
        <figure>
        <img src="${$('#base_url').val()}${'assets/images/id/front2.png'}" alt="">
        </figure>
        </div>
        <div class="iddetails">
        <div class="id_container">
        <img width="102px" height="70px" src="${$('#base_url').val()}${'assets/profile/'}${element.pr_file_name}">
        </div>
        <div class="name_container">
        <h6>${element.last_name}</h6>
        <h6>${element.first_name}</h6>
        <h6>${element.acount_id}</h6>
        </div>
        <div class="signature_container">
        SIGNATURE HERE
        </div>
        </div>
        </div>
        <div class="back">
        <div class="idbackground">
        <figure>
        <img src="${$('#base_url').val()}${'assets/images/id/back2.png'}" alt="Members Image">
        </figure>
        </div>
        <div class="iddetails">
        <div class="personal_info">
        <div class="col">
        <p>Birth Date: ${element.birthdate}</p>
        <p>PhilHealth: ${'na'}</p>
        <p>TIN: ${element.tin}</p>
        </div>
        <div class="col">
        <p>GSIS: ${'na'}</p>
        <p>SSS: ${element.sss}</p>
        <p>Blood type: ${element.blood_type}</p>
        </div>
        <div class="signature" id="qr-code${element.acount_id}"></div>
        <div class="address">
        <p> Address: ${'sample address'} </p>
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
        </div>`;
        // generate_qr(element.acount_id)
      });

      $('.generate_here').html(html)
      // GENERATE QR CODE
      $(data_arr).each(function(idx, val) {
          generate_qr(val);
      })

      $(data_arr).each(function(idx, val) {
        setTimeout(function() {
          save_qr(val);
        }, 1000)
    });

    }
  })


    $(data_arr).each(function(idx, val) {
      setTimeout(function(){
        generate_qr(val);
      },100)
    })

    $(accountID).each(function(idx, val) {
      setTimeout(function() {
        save_qr(val);
      }, 1000)
  });
  //
    get_id_details_ajax(data_array);

})

function generate_qr(data_id) {
  console.log(data_id);
  let qr_code = document.getElementById('qr-code'+data_id);
  let qrcode = new QRCode(qr_code, {
    text: data_id,
    width: 57,
    height: 50,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.M
  });
  return qrcode;
}

// ============== SAVE QR CODE IN DB
function save_qr(qr_id) {
  let mem_id = qr_id;
  let url = $('#base_url').val();
  let src = $('.signature').find('img').attr('src');
  let base64 = src.slice(14);

  $.ajax({
    method: 'POST',
    url: url + 'members/saveQr',
    data: {base64: base64, mem_id: mem_id},
    async:false,
    success: function(data) {

    },
    error: function(xhr, ajaxOptions, thrownError) {
      Swal.fire('Error', 'Server Error', 'error');
    }
  })
}


$(document).on('click' , '.btn_print' , function(){
  $('#generatePrint').printThis({
    debug: false,               // show the iframe for debugging
    importCSS: true,            // import parent page css
    importStyle: false,         // import style tags
    printContainer: true,       // print outer container/$.selector
    loadCSS: "",                // path to additional css file - use an array [] for multiple
    pageTitle: "",              // add title to print page
    removeInline: false,        // remove inline styles from print elements
    removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
    printDelay: 333,            // variable print delay
    header: null,               // prefix to html
    footer: null,               // postfix to html
    base: false,                // preserve the BASE tag or accept a string for the URL
    formValues: true,           // preserve input/form values
    canvas: false,              // copy canvas content
    doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
    removeScripts: false,       // remove script tags from print content
    copyTagClasses: false,      // copy classes from the html & body tag
    beforePrintEvent: null,     // callback function for printEvent in iframe
    beforePrint: null,          // function called before iframe is filled
    afterPrint: function() {
        let json_data = localStorage.getItem('printLogs');
        $.ajax({
            url     : base_url + 'members/idLogs',
            method  : 'POST',
            data    : {value : json_data },
            success : function(e){
                location.reload();
            }
         })
    }
  });

})

// ======================================================================================End Add New Member Section
})

$('input[name="signature_edit"]').on('change' , function() {
  let allowed_types = ['jpg', 'png' , 'jpeg'];
  let file = $(this).val();
  let extension = file.split('.').pop();
  let checkValidation = jQuery.inArray(extension , allowed_types);

  if (checkValidation != -1) {
    let formData = new FormData();
    let url = $('#base_url').val() + 'members/updateSignatureImage';
    formData.append('signature_new' , $(this).prop('files')[0]);
    formData.append('member_id' ,$('.hid_mem_id').val());
    $.ajax({
      method:'POST',
      url : url,
      contentType: false,
      processData: false,
      data : formData,
      dataType : 'json',
      success : function(res) {

        if (res.status == "Success") {
          Swal.fire('Success',res.msg, 'success');
        }else{
          Swal.fire('Error',res.msg, 'error');
        }
      },
    })
  }else{
    Swal.fire('Something went Wrong','Invalid file format.', 'error');
  }
});

$('.profile_edit').on('click' , function() {
  let element = $(this);
  Swal.fire({
    title:'Update profile',
    html:`
    <div class="btn-group btn-group-lg">
    <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm btn_g" id="upload">Upload</button>
    <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm btn_g" id="take_picture">Take picture</button>
    </div>
    `,
    showCloseButton : true,
    showConfirmButton : false
  })
});

$('.profile_edit').on('change' , function() {
  let allowed_types = ['jpg', 'png' , 'jpeg'];
  let file = $(this).val();
  let element = $(this);
  let extension = file.split('.').pop();
  let checkValidation = jQuery.inArray(extension , allowed_types);
  let url = $('#base_url').val();

  if (checkValidation != -1) {
    let formData = new FormData();
    formData.append('profile_new' , $(element).prop('files')[0]);
    formData.append('member_id' ,$('.hid_mem_id').val());
    $.ajax({
      url : url + 'members/updateProfileImage',
      method:'POST',
      contentType: false,
      processData: false,
      data : formData,
      dataType : 'json',
      success : function(res) {
        if (res.status == "Success") {
          Swal.fire('Success',res.msg, 'success');
          location.reload();
        }else{
          Swal.fire('Error',res.msg, 'error');
        }
      }
    })
  }else{
    Swal.fire('Something went Wrong','Invalid file format.', 'error');
  }

})

    $(document).on('click' , '#upload' , function() {
        let element = $('.profile_edit');
        $(element).attr('type' , 'file');
        $(element).click();
        Swal.close();
    });

    $(document).on('click' , '#take_picture' , function() {
        $('#controls').show();
        Webcam.set({
            width: 208,
            height: 190,
            image_format: 'png',
            png_quality: 90
        });
        Webcam.attach( '#photo_container' );
        Swal.close();
    });

$('#message').on('keyup', function() {
  let charLen = 160;
  let count = $(this).val().length;
  $(this).val($(this).val().substring(0, 160));
  let charCount = charLen - count;
  $('#charNum').text(charCount);
  if(charCount < 1) {
    $('#charNum').text("Maximum character has been reached!");
    let limit = charLen - parseInt(count);
    $(this).text(limit);
  }
});


$('#group_message').on('keyup', function() {
  let charLen = 160;
  let count = $(this).val().length;
  $(this).val($(this).val().substring(0, 160));
  let charCount = charLen - count;
  $('#groupcharNum').text(charCount);
  if(charCount < 1) {
    $('#groupcharNum').text("Maximum character has been reached!");
    let limit = charLen - parseInt(count);
    $(this).text(limit);
  }
});

// SUBMIT ACCOUNT INFO FROM MODAL

$(document).on('submit' , '#account_info' , function(e) {
  e.preventDefault();
  let formdata = new FormData($('#account_info')[0]);
  formdata.append('member_id' , sessionStorage.getItem('memberIdModal'));
  formdata.append('total' , $('#total').text());
  let url = $('#base_url').val() + 'members/submit_account_info';

  $.ajax({
    url : url,
    method : 'POST',
    data : formdata,
    processData: false,
    contentType: false,
    dataType: 'json',
    success : function(res){
      if (res.status == 'success') {
        Swal.fire('Success', 'Member Updated', 'success');
      }else{
        Swal.fire('Error', 'Something went wrong. Please try again', 'error');
      }
    },
  })
});

function enableInputs(){
  $('input[name="fname"]').attr('disabled' , false);
  $('input[name="middlename"]').attr('disabled' , false);
  $('input[name="lname"]').attr('disabled' , false);
  $('input[name="username"]').attr('disabled' , false);
  $('select[name="branch"]').attr('disabled' , false);
  $('select[name="user_type"]').attr('disabled' , false);
  $('input[name="password"]').attr('disabled' , false);
  $('#confirm_password').show();
}

function AssignSingleUserData(data){
  $('#editeUserForm input[name="fname"]').val(data.firstname);
  $('#editeUserForm input[name="middlename"]').val(data.middlename);
  $('#editeUserForm input[name="lname"]').val(data.lastname);
  $('#editeUserForm input[name="username"]').val(data.username);
  $('#editeUserForm select[name="branch"]').val(1);
  $('#editeUserForm select[name="user_type"]').val(data.user_type);
  $('#editeUserForm input[name="password"]').val(data.password);
  $('#editeUserForm input[name="email"]').val(data.email);
}

function AssignSingleBranch(data){
  $('#editBranchForm input[name="bname"]').val(data.branch_name);
  $('#editBranchForm input[name="bcode"]').val(data.branch_code);
  $('#editBranchForm input[name="address"]').val(data.address);
  $('#editBranchForm select[name="status"]').val(data.Status);
}


var beneficiaries = 1; // initialize

function add() {

  beneficiaries++;
  let html = '';
  let target = document.getElementById('addMore');
  let div = document.createElement('div');
  div.setAttribute('class' , 'form-group removeMe'+beneficiaries);

  html +=`<div class="row">
  <div class="col-md-4  col-sm-12 col-xs-12">
  <div class="form-group">
  <input type="text" class="form-control" name="ben_fullname[]" placeholder="(Last Name,First, MI)">
  </div>
  </div>
  <div class="col-md-2 col-sm-12 col-xs-12">
  <div class="form-group">
  <input type="text" class="form-control mydatepicker" name="ben_dob[]" placeholder="Date of Birth(mm/dd/yy)">
  </div>
  </div>
  <div class="col-md-2 col-sm-12 col-xs-12">
  <div class="form-group">
  <input type="text" class="form-control" name="ben_relationship[]" placeholder="Relationship">
  </div>
  </div>
  <div class="col-md-2 col-sm-12 col-xs-12">
  <div class="form-group">
  <input type="text" class="form-control" name="ben_education[]" placeholder="Education">
  </div>
  </div>
  <div class="col-md-1 col-sm-12 col-xs-12">
  <div class="form-group">
  <input type="text" class="form-control" name="ben_percentage[]" placeholder="%">
  </div>
  </div>`;

  html += '<div class="col-md-1">';
  html += '<div class="input-group-append">';
  html += '<button class="btn btn-success" type="button" onclick="remove_beneficiaries('+beneficiaries+')"><i class="fa fa-minus"></i></button>';
  html += '</div></div></div>';


  div.innerHTML = html;
  target.appendChild(div);
  $('.mydatepicker').datepicker();

}

function remove_beneficiaries(id) {
  $('.removeMe' + id).remove();
}
// MEMBERS SECTION
function remove_selected(key){
  $('.remove_selected_'+key).remove();
}

function get_id_details_ajax(account){
  $('.generate_here').html('');
  let html ='';
  let url = $('#base_url').val();

  $(account).each(function(idx , val) {
    let formData = {member_id : val};

    $.ajax({
      method: 'POST',
      url : url + 'members/getMemberBy_id',
      data : formData,
      dataType : 'json',
      success : function(response) {
        generateId_html(response);
      }
    })
  })
  $('.btn_for_printing').fadeIn();
}

function generateId_html(info){
  let count = 1;
  count++;
  let html = '';
  html = `<div id="print_me_plss"><div class="col-md-6 col-sm-12 col-xs-12 animated bounceInLeft">
  <div class="id_wrapper">
  <div class="front">
  <div class="idbackground">
  <figure>
  <img src="${$('#base_url').val()}${'assets/images/id/front2.png'}" alt="">
  </figure>
  </div>
  <div class="iddetails">
  <div class="id_container">
  <img width="102px" height="70px" src="${$('#base_url').val()}${'assets/profile/'}${info.data.pr_file_name}">
  </div>
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
  <img src="${$('#base_url').val()}${'assets/images/id/back2.png'}" alt="">
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
  <p> Address: ${'sample address'} </p>
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
  </div>`;
  $('.generate_here').append(html)
}
// END MEMBERS SECTIOn
function memberFormConfig(){
  $('.mydatepicker').datepicker();
  // Initial State;
  $('#if_business').hide();
  $('#if_farmer').hide();
  $('#if_others').hide();
}


function clearError(){
  $('.err').text('');
}

function clearSmsError() {
  $('.err-temp').text("");
}

// function sent_sms_greeting() {
//   let url = $('base_url').val();
//   $.ajax({
//     method: 'POST',
//     url: url + sms/holidaySms,
//     success: function(data) {
//       alert("success");
//     }
//   })
// }

// function chckStatus(data){
//     switch (data) {
//         case '0':
//             return 'Guest';
//             break;
//         case '1':
//             return 'Administrator';
//             break;
//         case '2':
//             return 'Super Admin';
//             break;
//         default:
//
//     }
// }

//==================ADDITIONAL JS FOR SELECTING DATA
//FOR SELECTING
$(".select2").select2();
$('.selectpicker').selectpicker();

jQuery(function ($) {
  var $select = $('#to, #contact_list , #group_list').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    persist: false,
    create: function(input) {
      return {
        value: input,
        text: input
      }
    }
  });
});

$('#sms-template').on('change', function(event){
  event.preventDefault();
  let sms_message = $('#sms-template').val();
  $('#message').val(sms_message);
})

$('#sms-group-template').on('change', function(event){
  event.preventDefault();
  let group_template = $('#sms-group-template').val();
  $('#group_message').val(group_template);
})

$('#btn-clear-group').on('click', function() {
    $('#sms-group-template').val("");
    $('#group_message').val("");
    var selectize = $('#group_list')[0].selectize;
    selectize.clear();
})

$('#btn-clear-single').on('click', function() {
    $('#sms-template').val('');
    $('#message').val("");
    var selectize = $('#to')[0].selectize;
    selectize.clear();
})


// DATE RANGE PICKER
