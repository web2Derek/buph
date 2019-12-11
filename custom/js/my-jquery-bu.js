$(document).ready(function() {
    $('#userlist').DataTable({
        responsive: true
    });
    $('#sms_table').DataTable({
        responsive: true
    });
    $('#btn_create').on('click' , function() {
        enableInputs();
    })
    // add form Submit
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
                }
            }
        })
    })



    $('.btn_edit').on('click' , function() {

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
                }
            }
        })
    })

$("#add_sms").on("submit", function(e) {
  e.preventDefault();
  let url = $('#base_url').val();
  let formData = $(this).serializeArray();

  $.ajax({
    method: "POST",
    url: url + 'sms/add_sms',
    data: formData,
    success: function(data) {
      alert(data);
      $('#add_sms').modal('hide');
    }
  });
})

  // ========================================================================= DELETE USER

    $('.activate-btn').on("click", function(event) {
        event.preventDefault();
        var url = $('#base_url').val();
        var id = $(this).attr('id');
        let stats = $(this).attr('stats');
        var $ele = $(this).parent().parent();
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
                    // if (data.success) {
                    //     Swal.fire("User Updated.", data.success, "success");
                    Swal.fire(
                        'User Updated',
                        data.success,
                        'success'
                    )
                    // }else{
                    //     Swal.fire("Error", data.success, "error");
                    // }
                // $ele.closest('tr').fadeOut().remove();
                // console.log('Deactivated');
              }
            })
          }
        })
      });


    // ========================================================================= DELETE Branch
    $('.del-branch').on('click', function() {
      var url = $('#base_url').val();
      var id = $(this).attr('id');
      var $ele = $(this).parent().parent();
      console.log(id);
      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
        if (result.value) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        $.ajax({
          type: 'POST',
          url: url + 'branch/deleteBranch',
          data: {id:id},
          success:function(data) {
          $ele.closest('tr').fadeOut().remove();
          console.log('deleted an item');
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
                    }
            }
        })
    })

    $('.branch_btn_edit').on('click' , function() {
        let branch_id = $(this).attr('branch_id'),
            url = $('#base_url').val(),
            data = {branch_id : branch_id };
            $.post(url + 'branch/getBranch' , data).done(function(response) {
                sessionStorage.setItem("active_edit_branch_id", branch_id);
                let data = JSON.parse(response);
                AssignSingleBranch(data);
            });
    });

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
        $('#add_member').on('submit' , function(e) {
            e.preventDefault();
            let url = $('#base_url').val() + 'members/AddNewMember';
            let formData = $(this).serialize();

            $.ajax({
                method : 'POST',
                url : url,
                data : formData,
                success : function(response) {
                    console.log(response);
                },
            })
        });


    // ======================================================================================End Add New Member Section
})

$('#sms_message').on('keyup', function() {
  var charLen = 250;
  let count = $(this).val().length;
  let charCount = charLen - count;
  $('#charNum').text(charCount);
  if(count === charLen) {
    $('#charNum').text("Characted Limit has been reach!!!");
  }
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

function memberFormConfig(){
    $('.mydatepicker').datepicker();
    // Initial State;
    $('#if_business').hide();
    $('#if_farmer').hide();
}

function clearError(){
    $('.err').text('');
}

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
