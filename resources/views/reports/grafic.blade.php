<div class="col-12" style="max-width:1000px; margin:auto;">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h4 class="tittle"> Graficos y Estadísticas</h4>
        <div class="row">
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>

<script>
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  
</script>


