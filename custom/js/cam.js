$('.btn-qr').on('click', function(e) {
  console.log('Opening Camera...');
  useQr();
})


function useQr() {
  try {
    let scanner = new Instascan.Scanner(
         {
             video: document.getElementById('preview')
         }
     );
     //  OPEN CAMERA SCANNER
     scanner.addListener('scan', function(content) {
         // alert('Do you want to open this page?: ' + content);
         alert(content);
         console.log(content);
         loginQr(content);
         scanner.stop();
     });
     setTimeout(function() {
      document.getElementById('err').innerHTML = "Please make sure that camera is enabled";
    },10000)
     Instascan.Camera.getCameras().then(cameras =>
     {
         if(cameras.length > 0){
             scanner.start(cameras[0]);
         } else {
             console.error("Please enable Camera!");
             alert("Please enable Camera!");
         }
     });
  } catch (e) {
    alert(e);
    console.log(e);
    document.getElementById('err').innerHTML = e.message;
  }
}


function loginQr(data) {
  let url = $('#base_url').val();
  let account = data;
  $.ajax({
    method: 'POST',
    url: url + 'applicants/member_page',
    data: {account: account},
    dataType: 'json',
    success: function(data) {
      console.log(data[0]);
      console.log(typeof(data));
      Swal.fire({
          title: 'Login?',
          text: "You'll login to your Account!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#068101',
          confirmButtonText: 'Yes, log me in!'
        }).then(function(result) {
          if(result.value) {
          window.location = 'http://localhost/SP/Sep-153/bupharco/applicants/members_load_account';
          }
        });
        $('#open-cam').modal('hide');
    },
    error: function(xhr, ajaxOptions, thrownError) {
      Swal.fire('Error', 'No Data Exist!!!', 'error');
      $('#open-cam').modal('hide');
      }
  })
}
