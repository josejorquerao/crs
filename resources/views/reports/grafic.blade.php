<div class="row">
<div class="col-sm-4 center text-center">
<div class="card-body">
 <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h4 class="tittle"> Graficos y Estadísticas</h4>

        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-sm-4 center text-center" style="max-width:500px; margin:auto;">
<div class="card recent-sales overflow-auto">
    <div class="card-body">
        <h4 class="tittle"> Graficos y Estadísticas</h4>

        <canvas id="ciudad" width="400" height="400"></canvas>
    </div>
  </div>
</div>
<div class="col-sm-4 center text-center" style="max-width:500px; margin:auto;">
<div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h4 class="tittle"> Graficos y Estadísticas</h4>

        <canvas id="cabaña" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-12" style="max-width:500px; margin:auto;">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h4 class="tittle"> Graficos y Estadísticas</h4>

        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>


<script>
   $(document).ready(function(){
    fillMonths();
    FillChartClients();
    FillChartHouse();
        });


  function fillMonths(){
    const months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    ];

    const data = {
    labels: months,
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
    const myChart = new Chart(
      document.getElementById('myChart'),
    config
    );
  }
   
  
  function FillChartHouse(){
    const ctx = document.getElementById('cabaña').getContext('2d');
    const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Solicitado', 'Despachado', 'No Despachado'],
        datasets: [{
            label: 'Solicitado',
            data: [ 1,2,3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        },]
    },

});
}
function FillChartClients(){
    const ctx = document.getElementById('viudad').getContext('2d');
    var arrayName=['a','b'];
    var arrayCalculo=[1,2];
    for(item of clients){
    arrayName.push(item.nom_clie.trim());
    arrayCalculo.push(Number(item.calculo).toFixed(1));
    }
    const myChartr = new Chart(ctx , {
    type: 'bar',
    data: {
        labels: arrayName,
        datasets: [{
            label: ['Porcentaje %'],
            data:  arrayCalculo,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        },]
    },
    
});
}
</script>


