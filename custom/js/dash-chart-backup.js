
$(document).ready(function() {
  var url = $('#base_url').val();
  $.ajax({
    method: 'GET',
    url: url + 'home/chartData',
    dataType:"json",
    success:function(data) {
      var branch = [];
      for (var i = 0; i < data.length; i++) {
        branch.push(data[i].branch_name);
      }

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
                  data: [12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3, 8],
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
  });
});



$(document).ready(function() {
  var url = $('#base_url').val();
  $.ajax({
    method: 'GET',
    url: url + 'home/chartData',
    dataType:"json",
    success:function(data) {
      var branch = [];
      for (var i = 0; i < data.length; i++) {
        branch.push(data[i].branch_name);
      }

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
                  data: [12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3, 8],
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
                  borderWidth: 1,
                  responsive:true
              }]
          },
          options: {
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
  });
});

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
