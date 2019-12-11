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
        var donutChart = document.getElementById("donutChart");
        if(donutChart !== null) {
          var ctx = donutChart.getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: branch,
              datasets: [{
                backgroundColor: [
                  "#95DC3B",
                  "#068101",
                  "#cccccc",
                  "#95DC3B",
                  "#068101",
                  "#cccccc",
                  "#95DC3B",
                  "#068101",
                  "#cccccc",
                  "#95DC3B",
                  "#068101",
                  "#cccccc",
                  "#95DC3B",
                  "#068101",
                  "#cccccc"
                ],
                data: [12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3, 8],
                responsive: true
              }]
            }
          });
          console.log("LOADED CHART Donut");
        } else {
          console.log("No Canvas Selected");
        }
      // END FILE FOR CHART
    }
  });
});
