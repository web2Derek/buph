$(document).ready(function() {
    var url = $('#base_url').val();

    $(document).on('click' ,'.getInsurance',function() {
        let getInsuranceById = $(this).attr('member-data');
        sessionStorage.setItem('getInsuranceById', getInsuranceById );
    });

    var insurance_list = $('#insurance_list').DataTable({
        responsive: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[0, 'asc']], //Initial no order.
        "columns": [
        {"data" : "first_name" , "render" : function(data, type, row, meta) {
            return  row.first_name+ ' ' +row.last_name+' '+row.middle_name;
        }},
        {"data" : "branch_name"},
        {"data" : "date_approve"},
        {"data" : "last_name" , "render" : function() {
            return '';
        }},
        {"data" : "date_added"},
        {"data" : "date_added" , "render" : function(data, type, row, meta) {
            var str = 'test';
            str = `
            <a href="${url+'insurance/memberInsurance/'+row.member_id}" title="Insurance" getInsurance = ${row.member_id}>
                <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm getInsurance" member-data=${row.member_id}  ><i class="fa fa-medkit"></i></button>
            </a>
            `;

            return str;
        }}
      ],

      "ajax": {
        "url": url + "insurance/getInsurancelist",
        "type" : "POST"
      },
      //Set column definition initialisation properties.
      "columnDefs": [{
      "targets": [0],//first column / numbering column
      "orderable": true, //set orderable
      }],
         dom: 'Bfrtip',
         buttons: ['csv', 'excel']
    });

    var ins_dependents = $('#co_insured_dependents').DataTable({
        responsive: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[0, 'asc']], //Initial no order.
        "columns": [
            {"data" : "full_name"},
            {"data" : "birthdate"},
            {"data" : "age"},
            {"data" : "relationship"},
            {"data" : "relationship" , "render" : function(data, type, row, meta) {
                var str = '';
                    str = `
                        <a href="javascript:;" title="Edit">
                            <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm editDependent" edit_id = ${ row.ins_id }><i class="fas fa-pencil-alt"></i></button>
                        </a>
                        <a href="javascript:;" title="Remove">
                            <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm remove_dpendent" del_id = ${ row.ins_id }><i class="fas fa-trash"></i></button>
                        </a>
                    `;
                    return str;
            }},
        ],

      "ajax": {
        "url": url + "insurance/insured_dependents/" + sessionStorage.getItem('getInsuranceById'),
        "type" : "POST"
      },
      //Set column definition initialisation properties.
      "columnDefs": [{
      "targets": [0],//first column / numbering column
      "orderable": true, //set orderable
      }],
         dom: 'Bfrtip',
         buttons: [
             {
                 text : 'New',
                 action : function(e, dt, node, config) {
                    $('#Dependent').modal('show');
                }
             }
         ]
    });

    var ben_benefits = $('#ben_benefits').DataTable({
        responsive: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[0, 'asc']], //Initial no order.
        "columns": [
            {"data" : "type"},
            {"data" : "full_name"},
            {"data" : "birthdate"},
            {"data" : "age"},
            {"data" : "relationship"},
            {"data" : "age" , "render" : function(data, type, row, meta) {
                var str = '';
                    str = `
                        <a href="javascript:;" title="Edit">
                            <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm editBeneficaries" edit_id = ${ row.benefit_id }><i class="fas fa-pencil-alt"></i></button>
                        </a>
                        <a href="javascript:;" title="Remove">
                            <button type="button" class="btn waves-effect waves-light btn-outline-warning btn-sm removeBeneficaries" del_id = ${ row.benefit_id }><i class="fas fa-trash"></i></button>
                        </a>
                    `;
                    return str;
            }}
        ],

      "ajax": {
        "url": url + "insurance/getben_benefits/" + sessionStorage.getItem('getInsuranceById'),
        "type" : "POST"
      },
      //Set column definition initialisation properties.
      "columnDefs": [{
      "targets": [0],//first column / numbering column
      "orderable": true, //set orderable
      }],
         dom: 'Bfrtip',
         buttons: [
             {
                 text : 'New',
                 action : function(e, dt, node, config) {
                    $('#AddBeneficiaries').modal('show');
                    $('#AddBeneficiariesBenefits').attr('isEdit' , false)
                }
             }
         ]
    });

    $(document).on('click' , '.remove_dpendent' , function() {
        let id = $(this).attr('del_id');
        Swal.fire({
              title: 'Are you sure?',
              text: "This will delete the record permanently.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#137E09',
              cancelButtonColor: '#20AEE3',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                    $.ajax({
                        method : 'POST',
                        url : url + 'insurance/remove_dpendentById/' + id,
                        dataType : 'json',
                        success : function(stats){
                            if (stats.status == 'success') {
                                Swal.fire('Success',stats.msg,'success');
                                ins_dependents.ajax.reload();
                            }else{
                                Swal.fire('Error',stats.msg,'error');
                            }
                        }
                    });
              }
        })
    })

    $(document).on('submit' ,'#addNewDependents' ,function(e) {
        e.preventDefault();
        let formdata = new FormData($('#addNewDependents')[0]);
        formdata.append('member_id' , sessionStorage.getItem('getInsuranceById'));
        $.ajax({
            method : 'POST',
            url : url + 'insurance/addNewDependents',
            data : formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            success : function(res) {
                if (res.form_error) {
                    let keyNames = Object.keys(res.form_error);
                    $(keyNames).each(function(index , value) {
                        $("input[name='"+value+"']").next('.err').text(res.form_error[value]);
                    });
                }else if (res.status == 'success') {
                    Swal.fire("Success","New Dependent Addedd", "success");
                    ins_dependents.ajax.reload();
                }else{
                    Swal.fire("Error","Something went wrong. Please try again.", "error");
                }

            }
        })
    });

    $(document).on('click' , '.editDependent' , function() {
        var id = $(this).attr('edit_id');
        sessionStorage.setItem('edit_dpndents' , id);
        $('#editDependent').modal('show');
        $.ajax({
            method : 'GET',
            url : url + 'insurance/getdependentsById/' + id,
            dataType : 'json',
            success : function(res) {
                renderhtmlDpendnts(res);
            }
        });
    });

    $(document).on('submit' , '#EditDependents' , function(e) {
        e.preventDefault();
        let formdata = new FormData($(this)[0]);
        formdata.append('ins_id' , sessionStorage.getItem('edit_dpndents'));
        $.ajax({
            url : url + 'insurance/EditDependents',
            method : 'POST',
            data : formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            success : function(r){
                if (r.form_error) {
                    let keyNames = Object.keys(r.form_error);
                    $(keyNames).each(function(index , value) {
                        $("input[name='"+value+"']").next('.err').text(r.form_error[value]);
                    });
                }else if (r.status == 'success') {
                    Swal.fire("Success",r.msg, "success");
                    ins_dependents.ajax.reload();
                }else {
                    Swal.fire("Error",r.msg, "error");
                }
            }
        })
    });

    $(document).on('click' , '.removeBeneficaries' , function() {
        let id = $(this).attr('del_id');
        Swal.fire({
              title: 'Are you sure?',
              text: "This will delete the record permanently.",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#137E09',
              cancelButtonColor: '#20AEE3',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                $.ajax({
                    url : url + 'insurance/deleteben_beneficiaries/' + id,
                    method : 'GET',
                    dataType : 'json',
                    success : function(e) {
                        if (e.status == 'success') {
                            Swal.fire("Success",e.msg, "success");
                            ben_benefits.ajax.reload();
                        }else{
                            Swal.fire("Error",e.msg, "error");
                        }
                    }
                })
              }
        })
    });

    $(document).on('submit' , '#AddBeneficiariesBenefits' , function(e) {
        e.preventDefault();
        let formdata = new FormData($(this)[0]);
        formdata.append('member_id' , sessionStorage.getItem('getInsuranceById'));
        $.ajax({
            url : url + 'insurance/AddBeneficiaries',
            method : 'POST',
            processData: false,
            contentType: false,
            data : formdata,
            dataType : 'json',
            success : function(r) {
                if (r.form_error) {
                    let keyNames = Object.keys(r.form_error);
                    $(keyNames).each(function(index , value) {
                        $("input[name='"+value+"']").next('.err').text(r.form_error[value]);
                    });
                }else if (r.status == 'success') {
                    Swal.fire("Success",r.msg, "success");
                    ben_benefits.ajax.reload();
                }else{
                    Swal.fire("Error",r.msg, "error");
                }
            }
        })
    });

    $(document).on('click' , '.editBeneficaries' , function() {
        var id = $(this).attr('edit_id');
        sessionStorage.setItem('beneficiariesId' , id);
        $.ajax({
            url : url + 'insurance/getBeneficiariesById/' + id,
            method: 'GET',
            dataType : 'json',
            success : function(r){
                if (r.status == 'success') {
                    $('#e_type').val(r.row.type);
                    $('#e_ben_full_name').val(r.row.full_name);
                    $('#e_ben_birthdate').val(r.row.birthdate);
                    $('#e_ben_relationship').val(r.row.relationship);
                    $('#EditBeneficiaries').modal('show');
                }else{
                    Swal.fire("Error",r.msg, "error");
                }
            },
        });
    });

    $(document).on('submit' , '#EditBeneficiariesBenefits' , function(e) {
        e.preventDefault();
        var benefit_id = sessionStorage.getItem('beneficiariesId');
        var formdata = new FormData($(this)[0]);
        formdata.append('benefit_id' ,benefit_id );
        $.ajax({
            url : url + 'insurance/EditBeneficiaries',
            method : 'POST',
            processData:false,
            contentType:false,
            data :formdata,
            dataType : 'json',
            success : function(res) {
                if (res.status == 'success') {
                    Swal.fire("Success",res.msg, "success");
                    ben_benefits.ajax.reload();
                }else{
                    Swal.fire("Error",res.msg, "error");
                }
            }
        })
    });
    function renderhtmlDpendnts(res) {
        $('#e_fullname').val(res.full_name);
        $('#e_birth_date').val(res.birthdate);
        $('#e_Relationship').val(res.relationship);
    }
});
