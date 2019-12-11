$('#recoverform').on("submit" , function(e) {
    e.preventDefault();
    $('#reset-btn').hide();
    $('#reset_loading').fadeIn();
    let url = $('#base_url').val() + 'login/process_reset';
    let formData = $(this).serialize();

    $.ajax({
        method : 'POST',
        url : url,
        data : formData,
        dataType : 'json',
        success : function(response) {
            if (response.form_error) {
                let key = Object.keys(response.form_error);
                $(key).each(function(index , value ) {
                    $("input[name='"+value+"']").next('.redirect').text(response.form_error[value]);
                });
            }else if (response.success) {
                $('#reset-btn').show();
                $('#reset-btn').prop('disabled' , true);
                $('#reset_loading').hide();
                $('.redirect').text('An email has been sent to your email. You will be redirected to the login page.');
                setTimeout(function () {
                    window.location.href = 'http://localhost/bupharco/';
                }, 10000);
            }else{
                $('#reset-btn').show();
                $('#reset_loading').hide();
                $('.redirect').text(response.error);
            }

        },
    })
});

$('#forgotpassword').on('submit' , function(e) {
    e.preventDefault();
    let url = $('#base_url').val() + 'login/updateForgotPassword';
    let formData = $(this).serialize();
    $.ajax({
        url : url ,
        method : 'POST',
        data : formData,
        dataType : 'json',
        success : function(response){
            if(response.form_error){
                let keys = Object.keys(response.form_error);
                $(keys).each(function(index , value ) {
                    $("input[name='"+value+"']").next('.err').text(response.form_error[value]);
                });
            }else if (response.success) {
                Swal.fire({
                    title : "Success",
                    text : response.success,
                    type : "success"
                }).then(function() {
                    window.location.href = 'http://localhost/SP/Sep-153/bupharco/';
                })
            }else {
                Swal.fire("Error",response.error, "error");
            }
        }
    })
});
