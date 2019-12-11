$(document).ready(function() {
  let base_url = $('#base_url').val();

      $(document).on('click' , '.viewMember' , function() {
          let id = $(this).attr('member-data');
          let url = $('#base_url').val() + 'members/ajaxViewMember';

          $.ajax({
              url : url,
              method : 'POST',
              data : {id : id},
              dataType : 'json',
              success : function(res){
                  renderHtmlData(res);
              }
          })
      });
})

function renderHtmlData(data){
    let base_url = $('#base_url').val();
    let obj = data.data;

    // member information.
    var pic = `<input disabled="disabled"  data-default-file="${base_url + 'assets/profile/' + obj.pr_file_name }" type="file"  id="profile_view" class="dropify" />`;
    var signature = `<input disabled="disabled"  data-default-file="${base_url + 'assets/signatures/members/' + obj.sg_file_name }" type="file"  id="sig_view" class="dropify" />`;
    // var pic = `<input data-default-file="'+ base_url + 'assets/profile/' + obj.pr_file_name'" type="file" name="profile_view" id="profile_view" class="dropify" />`
    $('#testing_pic').html(pic);
    $('#view_details_signature').html(signature);
    // $('#profile_view').attr('data-default-file' , base_url + 'assets/profile/' + obj.pr_file_name );
    $('#lname').text(obj.last_name);
    $('#fname').text(obj.first_name);
    $('#mname').text(obj.middle_name);
    $('#bdate').text(obj.birthdate);
    $('#age').text(obj.age);
    $('#bloodtype').text(obj.blood_type);
    $('#birthplace').text(obj.birth_place);
    $('#religion').text(obj.religion);
    $('#emailAddress').text(obj.email);
    $('#nationality').text(obj.nationality);
    $('#civilstatus').text(obj.civil_status);
    $('#sex').text(obj.gender);
    $('#mobilno').text(obj.mobile_no);
    $('#tin').text(obj.tin);
    $('#sss').text(obj.sss);
    $('#pagIbig').text(obj.pag_ibig);

    // residence
    $('#typeOfResidence').text(obj.type_of_residence);
    $('#street').text(obj.street);
    $('#barangaydistrict').text(obj.barangay_district);
    $('#municipality').text(obj.municipality);
    $('#province').text(obj.province);
    $('#zipcode').text(obj.zip_code);

    // employment info
    $('#TypeofEmployment').text(obj.type_of_employment);
    $('#companyname').text(obj.company_name);
    $('#compContact').text(obj.company_contact_no);
    $('#address').text(obj.address);
    $('#designation').text(obj.designation);
    $('#employmentStatus').text(obj.employmentStatus);

    // education attainment
    $('#level').text(obj.attainment);
    $('#nameofSchool').text(obj.name_of_school);
    $('#courseYearGrad').text(obj.course_year_graduated);

    // spouse information
    $('#sp_lastname').text(obj.sp_last_name);
    $('#sp_firstname').text(obj.sp_first_name);
    $('#sp_middlename').text(obj.sp_middle_name);
    $('#sp_Birthday').text(obj.sp_birthdate);
    $('#sp_mobileno').text(obj.sp_mobile_no);
    $('#sp_Nationality').text(obj.sp_nationality);
    $('#sp_tin').text(obj.sp_tin);

    // spouse employment info
    $('#sp_type').text(obj.type_of_employment);
    $('#sp_compName').text(obj.sp_company_name);
    $('#sp_compContactNo').text(obj.sp_company_contact_no);
    $('#sp_Address').text(obj.sp_comp_address);
    $('#sp_Designation').text(obj.sp_designation);
    $('#sp_EmploymentStatus').text(obj.sp_employmentStatus);

    // financial information
    let data_array = JSON.parse(obj.sourceOf_income);
    let keys = Object.keys(JSON.parse(obj.sourceOf_income));
    let html = '';
    $(keys).each(function( i , val ) {
        if (data_array[val] == "on") {
            html += `<li>${val.replace("_" , " ")}</li>`;
        }
    })

    $('#fin_info_list').html(html);
    $('#monthlyGrossIncome').html(obj.fi_gross_income_month);
    $('#monthlyGrossYear').html(obj.fi_gross_income_year);

    $('.dropify').dropify({
      messages: {
         'default': 'Drag and drop an image here or click',
         'replace': 'Drag and drop or click to replace',
         'remove':  'Change',
         'error':   'Something went wrong. Please try again.'
       }
    });

}
