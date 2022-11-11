<div class="col-12" style="max-width:1000px; margin:auto;">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h5 class="tittle"> <i class="fa-solid fa-user text-muted"></i> <strong> Información</strong></h5>
        <form id="editProfile" method="POST">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-md-6 form-group mt-3 md-0">
              <label for="">Nombre(s)*</label>
              <input type="text" value="{{$profile->name}}" name="txtName" class="form-control" id="txtName">
            </div>
            <div class="col-md-6 form-group mt-3 md-0">
              <label for="">Apellido(s)*</label>
              <input type="text" value="{{$profile->lastname}}" name="txtLastname" class="form-control" id="txtLastname">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group mt-3 md-0">
              <label for="">Email*</label>
              <input type="text" value="{{$profile->email}}" class="form-control" name="txtEmail" id="txtEmail">
            </div>
            <div class="col-md-6 form-group mt-3 md-0">
              <label for="">Ciudad*</label>
              <input type="text" value="{{$profile->contact->city}}" class="form-control" name="txtCity" id="txtCity">
            </div>
          </div>
          <div class="row">
            <div class="mt-3 md-0">
              <button type="submit" class="boton btn btn-success float-end mt-3 me-3">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>