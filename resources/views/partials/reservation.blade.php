<section id="services" class="services">
  <div class="container">
    <div class="section-title" data-aos="fade-in" data-aos-delay="100">
      <h2 style="color:#69a817;"><i class="fa-solid fa-map-location-dot"></i> Encuentra tu próxima parada</h2>
      <p>Contamos con 4 tipos de cabaña que se ajustaran a la medida de tus deseos, para la familia, en pareja o simplemente pasar un fin de semana en solitario para descansa el cuerpo, mente y alma.</p>
    </div>
    <div class="row">
      @foreach($cottages as $cottage)
      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box border" data-aos="fade-up">
          <h4 class="title text-muted"><a></a>{{$cottage->name}}</h4>
          <i class="fa-solid fa-toilet" style="color:#69a817;"><label>&nbsp;{{$cottage->toilets}}</label> </i>&nbsp;
          <i class="fa-solid fa-bed" style="color:#69a817;"><label>&nbsp;{{$cottage->beedrooms}}</label> </i>
          <a id="links" href="" class="ms-3">Más detalles</a>
          <img src="{{asset('img/'.$cottage->image.'')}}" class="img-fluid border rounded mb-3 mt-3" alt="">
          <div class="row">
            <div class="col">
              <h3 id="precio" style="color:#69a817;"><strong><i class="fa-solid fa-dollar-sign"></i>&nbsp;{{$cottage->price}}</strong></h3>
            </div>
            <div class="col col-mb">
              <div class="text"> <text class="font-weight-bold">CLP / La noche</text></div>
            </div>
          </div>
          <div class="row">
            <div class="col">

            </div>
          </div>
          <button id="boton" class="btn btn-success col-md-12" data-bs-toggle="modal" data-bs-target="#cottageBooking{{$cottage->id}}" onclick="SetDate({{$cottage->id}})"><strong>RESERVAR</strong></button>
        </div>
      </div>
      <!-- Modal para Reservar Cabaña -->
      <div class="modal fade" id="cottageBooking{{$cottage->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="modal-title" id=""><i class="bi bi-clipboard-check"></i> Tu reserva</h4>
                </div>
                <div class="col">
                  <a>{{$cottage->name}}</a>
                </div>

              </div>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>


            <div class="modal-body" data-aos="fade-up">
              <div class="col-lg-20">
                <form action="{{ route('detail',['cottage'=>$cottage->id])}}" method="POST">
                  @csrf
                  <input id="cottageId" name="cottageId" type="hidden" value="{{$cottage->id}}">
                  <input type="hidden" name="cottageImg" value="{{asset('img/'.$cottage->image.'')}}">
                  <input type="hidden" name="cottageDesc" value="{{$cottage->description}}">
                  <input type="hidden" name="cottageName" value="{{$cottage->name}}">
                  <input type="hidden" name="cottagePrice" value="{{$cottage->price}}">
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <span class="form-label text-muted">¿Desde cuándo?</span>
                        <input type="date" class="form-control" name="ingressReservation" id="ingressReservation" required min="{{$date}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <span class="form-label text-muted">¿Hasta cuándo?</span>
                        <input type="date" class="form-control" name="egressReservation" id="egressReservation" required min="{{$date}}">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6 form-group">
                      <span class="form-label">Nombre(s)*</span>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <span class="form-label">Apellido(s)*</span>
                      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <span class="form-label">Email*</span>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group mt-3">
                      <span class="form-label">Ciudad*</span>
                      <input type="text" name="city" class="form-control" id="city" placeholder="Ciudad" required>
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <span class="form-label">Dirección*</span>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Dirección" required>
                    </div>
                  </div>
                  <div class="form-group mt-3 ">
                    <span class="form-label text-muted">Telefono*</span>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefono ej.(+569xxxxxxxx)" value="+56 " required>
                  </div>
                  <div class="row">
                    <a href="" id="links" class="text-center mt-3">¿Por qué te pedimos estos datos?</a>
                  </div>
                  <div class="row">
                    <div class="col col-md-6 form-group mt-3">
                      <select id="select" name="select" class="form-select" aria-label="Default select example">
                        <option selected>N° de Acompañantes*</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                    <div class="col col-md-12 form-group mt-3" style="text-align:center;">
                      <button id="boton" type="submit" class="btn btn-success btn-primary col-md-12"><strong>Continuar</strong></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Modal para Reservar Cabaña -->
      @endforeach
    </div>
  </div>
</section><!-- Fin Seccion de Reserva -->
<br>
<script>
function SetDate(id) {
  console.log(id)
  var date=<?php echo json_encode($reservation); ?>; 
  var datefilter=date.filter(x=>x.cottage_id==119);
  datefilter
  .map((x, index) => {
    $('·ingress').pickadate({
  disable: [
    { from: [x.ingress], to: [x.egress] }
  ]
})
  })
}
</script>