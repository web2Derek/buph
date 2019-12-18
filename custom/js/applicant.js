// $(document).ready(function() {
//   $('#applicant_form').on('submit', function(e) {
//     e.preventDefault();
//   })
//
// })

$(document).ready(function() {
  var url = $('#base_url').val();
// MEMBERS SIGNATURE
  $('#member_signatures').on('submit', function(e) {
      e.preventDefault();
      let formdata = $(this).serializeArray();
    $.ajax({
      method: 'POST',
      url: url + 'applicants/mem_signatures',
      data: formdata,
      success: function(data) {
        Swal.fire('Success', 'Signature Submitted')
        $('#signaturetab').signature('clear');
        $('#signaturetab1').signature('clear');
        $('#signaturetab2').signature('clear');
        $('#signaturetab3').signature('clear');
      }
    })
  })

  // MEMBERS REGISTRATION
    $('#member_reg_form').on('submit', function(e) {
        e.preventDefault();
        clearError();
        let formdata = $(this).serializeArray();
        $.ajax({
            method: "POST",
            url: url + "applicants/members_registration",
            data: formdata,
            dataType: 'json',
            success: function(response) {
                if(response.form_error) {
                    let err = Object.keys(response.form_error);
                    $(err).each(function(index, value) {
                    $('input[name="'+value+'"]').next('.mem-err').text(response.form_error[value]);
                    })
                } else {
                    $('#member_reg_form')[0].reset();
                    Swal.fire(' Successfully Registered!','You can now login');
                }
            },
                error:function(xhr, thrownError, ajaxOptions) {
                Swal.fire(' Error!','Something went Wrong');
            }
        })
    });

    $(document).on('submit' , '#submitAgreement' , function(e) {
        e.preventDefault();
        let formdata = new FormData($(this)[0]);
        $.ajax({
            url : url + 'applicants/submitAgreement',
            method : 'POST',
            data : formdata,
            processData: false,
            contentType: false,
            dataType : 'json',
            success : function(e){
                    console.log(e);
            }
        });
    });

  $(document).on('click' , '#clear_sig' , function() {
    $('#agreementform_sig').signature('clear');
  });

  $(document).on('submit' , '#agreementform' , function(e) {
      e.preventDefault();
      let url = $('#base_url').val();
      let formdata = new FormData($(this)[0]);
      $.ajax({
        url : url + 'applicants/submitAgreement',
        method : 'POST',
        data : formdata,
        processData: false,
        contentType: false,
        success : function(response){
            console.log(response);
        }
      })
  });


  // CLEAR ERROR
  function clearError() {
    $('.mem-err').text('');
  }


  var form = $(".validation-wizard").show();
  $(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
      finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
      return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
      return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
      // Swal.fire("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
      event.preventDefault();
      var url = $('#base_url').val();
      // var formdata = $('#applicant_form').serialize();
      var formdata = new FormData($('#applicant_form')[0]);
      $.ajax({
        method: "POST",
        url: url + 'applicants/addApplicants',
        data: formdata,
        processData: false,
        contentType: false,
        success: function(data) {
          console.log(data);
          if(data) {
            $('#applicant_form')[0].reset();
            $('#signaturetab_form').signature('clear');
            Swal.fire("Registration Form Completed", "Please Proceed to the next Step.");
          }
        }
      })
    }

    // FORM VALIDATION
  }), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
      $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
      $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
      error.insertAfter(element)
    }
    , rules: {
      emailAddress: {
        email: true
      },
      // zip_code: {
      //   digit: true,
      //   required: true
      // }
    }
  })

  // CALCULATE MEMBERS AGE
  var membdate = $('#birthdate').val();
  var datenow = new Date().toLocaleDateString();
  // alert(Math.floor(membdate - datenow));
  // alert(membdate);
});
var count = 0;
function addfields(){
    var html = '';
    count++
    html = `
    <div class="row removedpnd${count}">
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
          <button class="btn btn-success" type="button" onclick="removefields(${count});"><i class="fa fa-minus"></i></button>
        </div>
      </div>
    </div>
    `;

    $('#formdpndents').append(html);
}

function removefields(id){
    $('.removedpnd'+id).remove();
}
