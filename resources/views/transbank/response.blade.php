
@include('partials.head')
@include('partials.header')
@include('partials.welcome')
<body>
<div class="modal" id="myModal" tabindex="1" ass="modal fade" tabindex="-1" role="dialog" data-backdrop="static" 
  data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Estado de Pago</h5>
      </div>
      <div class="modal-body text-center">
        @if($estado==1)
        <h3>Pago Aceptado</h3>
        @else
        <h3>Pago Rechazado</h3>
        @endif
      </div>
      <div class="modal-footer">
        <a type="button" href="http://127.0.0.1:8000/" class="btn btn-success" >Aceptar</a>   
      </div>
    </div>
  </div>
</div>
<div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('/js/main.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>

<script>
  $( document ).ready(function() {
    $('#myModal').modal('toggle');
    $('#myModal').modal({backdrop: 'static', keyboard: false});
});
</script>
