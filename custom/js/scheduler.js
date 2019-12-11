function scheduler(){
    $.ajax({
        method : 'GET',
        url : $('#base_url').val() + 'sms/SchedulerSMS',
        dataType : 'json',
        success : function(response) {
            if (response.remind) {
                let number = response.data
                let template = response.template['message']['sms_message'];

                $(number).each(function(idx , val) {
                    sendSchedulesms(val.mobile_no , template);
                })
            }else{
                console.log('no schedule sms');
            }
        }
    })
}

function sendSchedulesms(to , message){
    $.ajax({
        method: 'POST',
        url: 'http://192.168.30.25:1688/services/api/messaging/',
        data:  {'to': to, 'message': message},
        success: function(response){
            console.log(response);
        },
        error : function(e){
            console.log('error');
        }
    })
}

scheduler();
