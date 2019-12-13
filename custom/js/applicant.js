// $(document).ready(function() {
//   $('#applicant_form').on('submit', function(e) {
//     e.preventDefault();
//   })
//
// })

$(document).ready(function() {

  // MEMBERS REGISTRATION
  $('#member_reg_form').on('submit', function(e) {
    e.preventDefault();
    clearError();
    let url = $('#base_url').val();
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
  })


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
      var url = $('#base_url').val();
      var formdata = $('#applicant_form').serialize();
      $.ajax({
        method: "POST",
        url: url + 'applicants/addApplicants',
        data: formdata,
        dataType: 'json',
        success: function(data) {
          console.log(data);
          if(data) {
            $('#applicant_form')[0].reset();
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
      zip_code: {
        digit: true,
      }
    }
  })

  // CALCULATE MEMBERS AGE
  var membdate = $('#birthdate').val();
  var datenow = new Date().toLocaleDateString();
  alert(Math.floor(membdate - datenow));
  alert(membdate);
})