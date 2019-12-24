

$(document).ready(function() {

  var url = $('#base_url').val();
  $.ajax({
    method: "POST",
    url: url + 'home/ageMemRange',
    dataType:"json",
    success: function(data) {
      let table_data = '';
      let male_count = [];
      let range = [];
      var female_count = [];
      // console.log(data['female']);
      // for(var i=0;i<data.length;i++){
      //   if(data[i].gender === "Male")
      //   {
      //     male_count.push(data[i].count);// for(var i=0;i<data.length;i++){
      //   if(data[i].gender === "Male")
      //   {
      //     male_count.push(data[i].count);
      //   }
      //   if(data[i].gender === "Female")
      //   {
      //     female_count.push(data[i].count);
      //   }
      //   range.push(data[i].range_data);
      // }
      //
      // for(var i = 0; i < female_count.length; i++) {
      //   table_data = `
      //       <td>${female_count[i]}</td>
      //     `;
      //   $('.table_body_data').next('#range_data_body').append(table_data);
      // }
      //   }
      //   if(data[i].gender === "Female")
      //   {
      //     female_count.push(data[i].count);
      //   }
      //   range.push(data[i].range_data);
      // }
      //
      // for(var i = 0; i < female_count.length; i++) {
      //   table_data = `
      //       <td>${female_count[i]}</td>
      //     `;
      //   $('.table_body_data').next('#range_data_body').append(table_data);
      // }

      // for(var i = 0; i < data['female'].length; i++) {
      //   range.push(data['female'][i]);
      // }

      for(var i = 0; i < data['female'].length; i++) {
          console.log(data['female'][i].range_data)
      }

      // REMOVE REDUNDANT RANGE

      // let newSet = [...new Set(range)];
      // console.log(newSet);
      //
        if(data['female'].length > 0) {
            generateTr(data);
          } else {
            table_data = `
              <tr><td>No Data Found</td></tr>`;
        }
              // <td>${[i].count}</td>
              // <td>${[i].count}</td>
          $('#range_data_body').prepend(table_data);
        }
      })

          // GENERATE TABLE DATA
      function generateTr(data) {
        let newArr = data['female'].reverse();
        let maleData = data['male'];
        let mcount;

        for(var i = 0; i < maleData.length; i++) {
          if(maleData[i].range_data = '') {

          }
        }

        for(var i = 0; i < newArr.length; i++) {

          table_data = `
              <tr class="${newArr[i].range_data}">
                  <td>${newArr[i].range_data} Years Old</td>
                  <td>${newArr[i].count}</td>
                  <td>${mcount}</td>
              </tr>
                  `;
          $('.table_body_data').prepend(table_data);
          // for(let arr in maleData) {
          //   console.log(maleData.count);
          //   if(arr.length <= i) {
          //     mcount = '0';
          //   } else {
          //     mcount = maleData[arr].count;
          //   }
          // }
          // if(newArr.count = '18-30 years old') {
            // console.log('1');
            // table_data = `
            //     <td >${newArr[i].count}</td>
            //     <td >${mcount}</td>
            //   `;
            // $('.18-30').prepend(table_data);
          // }

        }
        // for(var i= 0; i < data['male'].length; i++) {
        //    maletd = `<td>${data['male'][i].count}</td>`;
        //  ('#mem_data_range').append(maletd);
        // }

      }


// FETCH DATA
  $(document).on('change','#group-type', function(e) {
    var url = $('#base_url').val();
    var member_type = $(this).val();
    $.ajax({
      method: "POST",
      url: url + 'home/getDataType',
      data: { member_type:member_type },
      dataType:"json",
      success: function(data) {
          // Swal.fire("Success", "", "success");
          // console.log(data);
          let branches = [];
          let dataset = [];
          for(var i = 0; i < data.length; i++) {
            branches.push(data[i].branch_name);
            dataset.push(data[i].member_per_branch);
          }
          // console.log(branches);
          // console.log(dataset);
          generateChart(branches, dataset);
      },
      error: function(xhr, ajaxOptions, thrownError) {
            Swal.fire("Error","Server Error", "error");
      }
    })
  })

// AJAX CALL FOR GETTING ALL MEMBER TYPE AND DISPLAY IN CHART
    $('#alltype').on('change', function(e) {
      e.preventDefault();
      var url = $('#base_url').val();
      var member_type = $(this).val();
      $.ajax({
        method: "POST",
        url: url + 'home/getAllType',
        data: { member_type:member_type },
        dataType:"json",
        success: function(data) {
            // Swal.fire("Success", "", "success");
            // console.log(data);
            let branches = [];
            let dataset = [];
            for(var i = 0; i < data.length; i++) {
              branches.push(data[i].branch_name);
              dataset.push(data[i].member_per_branch);
            }
            // console.log(branches);
            // console.log(dataset);
            getAllMember(branches, dataset);
        },
        error: function(xhr, ajaxOptions, thrownError) {
              Swal.fire("Error","Server Error", "error");
        }
      })
    })


  function generateChart(branch, dataset) {
    // var url = $('#base_url').val();
    // $.ajax({
    //   method: 'POST',
    //   url: url + 'home/chartData',
    //   dataType:"json",
    //   success:function(data) {
    //     var branch = [];
    //     for (var i = 0; i < data.length; i++) {
    //       branch.push(data[i].branch_name);
    //     }

        // CHART START
        var myChart = document.getElementById('myChart');
        if(myChart !== null) {
          var ctx = myChart.getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: branch,
                datasets: [{
                    label: '# of Members',
                    data: dataset,
                    backgroundColor: [
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101',
                        '#068101'
                    ],
                    borderWidth: 2,
                    responsive:true
                }]
            },
            options: {
              events: ['hover'],
                scales: {
                  xAxes: [{
                    barPercentage: 0.4
                  }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
          });
          console.log("LOADED CHART DATA");
        } else {
          console.log("No Canvas Selected");
        }
        // END FILE FOR CHART
      }

function getAllMember(branch, dataset) {
  // var url = $('#base_url').val();
  // $.ajax({
  //   method: 'GET',
  //   url: url + 'home/chartData',
  //   dataType:"json",
  //   success:function(data) {
  //     var branch = [];
  //     for (var i = 0; i < data.length; i++) {
  //       branch.push(data[i].branch_name);
  //     }
      // CHART START
      var myNewChart = document.getElementById('myNewChart');
      if(myNewChart !== null) {
        var ctx = myNewChart.getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: branch,
            datasets: [{
              label: '# of Members',
              data: dataset,
              backgroundColor:[
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101',
                '#068101'
              ],
              borderWidth: 1,
              responsive:true
            }]
          },
          options: {
            events: ['hover'],
            scales: {
              xAxes: [{
                barPercentage: 0.4
              }],
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
        console.log("Loaded Chart");
      } else {
        console.log("No Canvas Selected");
        }
        // END FILE FOR CHART
      }


//SELECT DEFAULT DATA IN DROPDOWN
      $('select#group-type').trigger('change');
      $('select#alltype').trigger('change');
});
  // function createBarColor() {
  //   var color = [];
  //   for(var i = 0;  i < 13; i++) {
  //     var c = '#'+Math.random().toString(16).substr(-6);
  //     color.push(c);
  //   }
  //   return color;
  // }


  // $(document).ready(function() {
  //   var url = $('#base_url').val();
  //   $.ajax({
  //     method: 'GET',
  //     url: url + 'home/chartData',
  //     dataType:"json",
  //     success:function(data) {
  //       var branch = [];
  //
  //       console.log(data);
  //       for (var i = 0; i < data.length; i++) {
  //         branch.push(data[i].branch_name);
  //       }
  //       console.log(branch);
  //
  //     }
  // });
  //
  //   var ctx = document.getElementById('myNewChart').getContext('2d');
  //   var myChart = new Chart(ctx, {
  //     type: 'bar',
  //     data: {
  //         labels: ['Branch1', 'Branch2', 'Branch3', 'Branch4', 'Branch5', 'Branch6'],
  //         datasets: [{
  //             label: '# of Members',
  //             data: [12, 19, 3, 5, 2, 3],
  //             backgroundColor: [
  //                 '#068101',
  //                 '#068101',
  //                 '#068101',
  //                 '#068101',
  //                 '#068101',
  //                 '#068101'
  //             ],
  //             borderWidth: 1
  //         }]
  //     },
  //     options: {
  //         scales: {
  //           xAxes: [{
  //             barPercentage: 0.2
  //           }],
  //             yAxes: [{
  //                 ticks: {
  //                     beginAtZero: true
  //                 }
  //             }]
  //         }
  //     }
  //   });
