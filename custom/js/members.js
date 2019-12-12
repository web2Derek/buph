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
        });
    })

    $()


// CLEAR ERROR

function clearError() {
   $('.mem-err').text('');
 }
