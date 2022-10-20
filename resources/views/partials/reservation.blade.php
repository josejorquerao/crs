<section id="services" class="services">
  <div class="container">
    <div class="section-title" data-aos="fade-in" data-aos-delay="100">
      <h2>Reserva tu cabaña con nosotros</h2>
      <p>Contamos con 4 tipos de cabaña que se ajustaran a la medida de tus deseos, para la familia, en pareja o simplemente pasar un fin de semana en solitario para descansa el cuerpo, mente y alma.</p>
    </div>
    <div class="row">
    @foreach($cottages as $cottage)
      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up">
          <h4 class="title"><a></a>{{$cottage->name}}</h4>
          <img src="{{asset('img/'.$cottage->image.'')}}" class="img-fluid mb-3" alt="">
          <p class="description mb-3"></p>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cottageBooking">Reservar</button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section><!-- Fin Seccion de Reserva -->
@include('modals.cottage-booking-form')