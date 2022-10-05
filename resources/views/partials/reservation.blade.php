<!-- ======= Seccion de Reserva ======= -->
<section id="services" class="services">
  <div class="container">
    <div class="section-title" data-aos="fade-in" data-aos-delay="100">
      <h2>Reserva tu cabaña con nosotros</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up">
          <div class="icon"><i class="bx bxl-dribbble"></i></div>
          <h4 class="title"><a>Cabaña 1</a></h4>
          <img src="{{asset('/img/cabaña1.jpg')}}" class="img-fluid" alt="">
          <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cottageBooking">Reservar</button>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="icon"><i class="bx bx-file"></i></div>
          <h4 class="title"><a>Cabaña 2</a></h4>
          <img src="{{asset('/img/cabaña2.jpg')}}" class="img-fluid" alt="">
          <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cottageBooking">Reservar</button>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
          <div class="icon"><i class="bx bx-tachometer"></i></div>
          <h4 class="title"><a>Cabaña 3</a></h4>
          <img src="{{asset('/img/cabaña3.jpg')}}" class="img-fluid" alt="">
          <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cottageBooking">Reservar</button>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
          <div class="icon"><i class="bx bx-world"></i></div>
          <h4 class="title"><a>Cabaña 4</a></h4>
          <img src="{{asset('/img/cabaña4.jpg')}}" class="img-fluid" alt="">
          <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cottageBooking">Reservar</button>
        </div>
      </div>
    </div>
  </div>
</section><!-- Fin Seccion de Reserva -->
@include('modals.cottage-booking-form')