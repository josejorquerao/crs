<!-- Modal para Reservar Cabaña -->
<div class="modal fade" id="cottageBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Reserva tu Cabaña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" data-aos="fade-up">
        <div class="col-lg-20">
          <form action="" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="email" id="email" placeholder="Apellidos" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Email" required>
            </div>
            <div class="row">
              <div class="col-md-6 form-group mt-3">
                <input type="text" name="name" class="form-control" id="name" placeholder="Ciudad" required>
              </div>
              <div class="col-md-6 form-group mt-3">
                <input type="text" class="form-control" name="email" id="email" placeholder="Dirección" required>
              </div>
            </div>
            <div class="form-group mt-3 ">
              <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono ej.(+569xxxxxxxx)" required>
            </div>
            <div class="row ">
              <div class="col-md-6 form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Llegada" required>
              </div>
              <div class="col-md-6 form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Salida" required>
              </div>
            </div>
            <div class="text-center mt-3"><button type="button" class="btn btn-success btn-primary">Continuar</button></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal para Reservar Cabaña -->