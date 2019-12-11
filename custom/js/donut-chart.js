$(document).ready(function() {
  var url = $('#base_url').val();
  $.ajax({
    method: 'GET',
    url: url + 'home/chartData',
    dataType:"json",
    success:function(data) {
      var branch = [];
      var dataset = []
      for (var i = 0; i < data.length; i++) {
        branch.push(data[i].branch_name);
        dataset.push(data[i].member_per_branch);
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
                backgroundColor: createBarColor(),
                data: dataset,
                responsive: true
              }]
            }
          });
          console.log("LOADED Donut Chart");
        } else {
          console.log("No Canvas Selected");
        }
      // END FILE FOR CHART
    }
  });
});

function createBarColor() {
  var color = [];
  for(var i = 0;  i < 13; i++) {
    var c = '#'+Math.random().toString(16).substr(-6);
    color.push(c);
  }
  return color;
}
