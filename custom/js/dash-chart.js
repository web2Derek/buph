

$(document).ready(function() {

  var url = $('#base_url').val();
  $.ajax({
    method: "POST",
    url: url + 'home/ageMemRange',
    dataType:"json",
    success: function(data) {
      let table_data = '';
      let mem_count = [];
      console.log(data['members_count']);

        if(data['members_count'].length > 0) {
            generateTr(data);
          } else {
            table_data = `
              <tr><td>No Data Found</td></tr>`;
        }
          $('#range_data_body').prepend(table_data);
        }
      })
          // GENERATE TOTAL MEMBER SUMMARY
      function generateTr(data) {
        let newArr = data['members_count'].reverse();
        for(var i = 0; i < newArr.length; i++) {
          console.log(newArr[i].female);
          table_data = `
              <tr class="${newArr[i].range_data}">
                  <td>${newArr[i].range_data}</td>
                  <td>${newArr[i].female}</td>
                  <td>${newArr[i].male}</td>
              </tr>
                  `;
          $('.table_body_data').prepend(table_data);

        }
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
              responsive:true,
              maintainAspectRatio: true

            }]
          },
          options: {
            tooltip:true,
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
