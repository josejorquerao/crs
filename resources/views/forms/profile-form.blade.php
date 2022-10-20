<div class="col-12" style="max-width:1000px; margin:auto;">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h4 class="tittle"> Ajustes del Perfil</h4>
        <div class="row">

          <div class="col-md-6 form-group mt-3 md-0">
            <label for="">Nombre</label>
            <input type="text" value="{{$profile->name}}" name="name" class="form-control" id="name" required>

          </div>

          <div class="col-md-6 form-group mt-3 md-0">
            <label for="">Apellido</label>
            <input type="text" value="{{$profile->lastname}}" name="lastname" class="form-control" id="lastname" required>
          </div>

        </div>


        <div class="row">

          <div class="col-md-6 form-group mt-3 md-0">
            <label for="">Email</label>
            <input type="text" value="{{$profile->email}}" class="form-control" name="email" id="email" required>
          </div>

          <div class="col-md-6 form-group mt-3 md-0">
            <label for="">Ciudad</label>
            <input type="text" value="{{$profile->contact->city}}" class="form-control" name="city" id="city" required>
          </div>

        </div>

        <div class="row">
          <div class="mt-3 md-0">
            <button type="button" class="btn btn-success btn-primary float-end mt-3 me-3">Guardar</button>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>

<div class="col-12" style="max-width:1000px; margin:auto;">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h4 class="tittle"> Actualizar Contraseña</h4>
        <div class="row">

          <div class="col-md-6 form-group mt-3 md-0">

            <label>Contraseña Actual</label>
            <input type="text" name="password" class="form-control" id="password" placeholder="Ingrese la nueva contraseña" required>

          </div>

          <div class="col-md-6 form-group mt-3 md-0">
            <label>Contraseña Nueva</label>
            <input type="text" name="newpassword" class="form-control" id="newpassword" placeholder="Repita la nueva contraseña" required>
          </div>

        </div>

        <div class="row">

          <div class="mt-3 md-0">
            <button type="button" class="btn btn-success float-end mt-3 me-3">Guardar</button>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>