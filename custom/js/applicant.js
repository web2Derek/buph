// $(document).ready(function() {
//   $('#applicant_form').on('submit', function(e) {
//     e.preventDefault();
//   })
//
// })

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
    email: {
      email: true
    }
  }
})
