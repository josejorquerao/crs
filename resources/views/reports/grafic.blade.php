@extends('dashboard')
@section('contenido')
<section class="section dashboard">
    <div class="pagetitle">
        <h1>Resumen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">/ dashboard / Resumen</li>
            </ol>
        </nav>
    </div>
<div class="row">
<div class="col-sm-4 center text-center" style="max-width:600px; margin:auto;">
<div class="card-body">
 <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h4 class="tittle"> Graficos por meses</h4>
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-sm-4 center text-center" style="max-width:600px; margin:auto;">
<div class="card recent-sales overflow-auto">
    <div class="card-body">
        <h4 class="tittle">Grafico por Ciudad</h4>
        <canvas id="ciudad" width="400" height="400"></canvas>
    </div>
  </div>
</div>

<div class="col-sm-4 center text-center" style="max-width:600px; margin:auto;">
<div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h4 class="tittle"> Grafico por numero de reservas</h4>

        <canvas id="cabaña" width="400" height="400"></canvas>
      </div>
    </div>
    </div>
</div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
    fillMonths();
    FillChartClients();
    FillChartHouse();

  function fillMonths(){
    var month= <?php echo json_encode($month); ?>; 
    console.log(month);
    var arrayCalculo=[];
    var arrayName=[];
     for(item of month){
    arrayName.push(item.mes.trim());
     arrayCalculo.push(Number(item.cantidad).toFixed(1));
     }
    const months = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
    ];
    const data = {
    labels: arrayName,
    datasets: [{
      label: 'Arriendos según mes',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: arrayCalculo,
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
    var cottage= <?php echo json_encode($countHouse); ?>; 
    var arrayName=[];
    var arrayCalculo=[];
    console.log(cottage);
     for(item of cottage){
    arrayName.push(item.name.trim());
     arrayCalculo.push(Number(item.cantidad).toFixed(1));
     }
    const ctx = document.getElementById('cabaña');
    const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: arrayName,
        datasets: [{
            label: 'Cabaña',
            data: arrayCalculo,
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
    const ctx = document.getElementById('ciudad');
    var city= <?php echo json_encode($countcity); ?>;
    console.log(city); 
    var arrayName=[];
    var arrayCalculo=[];
     for(item of city){
    arrayName.push(item.city.trim());
     arrayCalculo.push(Number(item.cantidad).toFixed(1));
     }
    const myChartr = new Chart(ctx , {
    type: 'bar',
    data: {
        labels: arrayName,
        datasets: [{
            label: ['Ciudades Visitadas'],
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
    options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});
}
</script>
@endsection