<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group" role="group" aria-label="First group">
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#cottageCreate">Agregar</button>
  </div>
</div>
<div class="container">
  @foreach ($cabanas as $cabana)
  <div class="card mb-3 ms-3">
    <div class="row g-0">
      <div class="col-md-12">
        <button type="button" class="btn btn-danger btn-sm float-end mt-3 me-3" data-bs-toggle="modal" data-bs-target="#cottageDelete{{$cabana->id}}">Eliminar</button>
        <button type="button" class="btn btn-success btn-sm float-end mt-3 me-3" data-bs-toggle="modal" data-bs-target="#cottageEdit{{$cabana->id}}">Editar</button>
        <h5 class="card-title ps-3 pb-3">{{$cabana->name}}</h5>
        <p class="card-text ps-3 pb-3">{{$cabana->description}}</p>
        <p class="card-text ps-3 pb-3"><small class="text-muted">Actualizado hace 3 minutos</small></p>
      </div>
    </div>
  </div>

  <!-- Modal para Editar Cabaña -->
  <div class="modal fade" id="cottageEdit{{$cabana->id}}" tabindex="-1" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{$cabana->id}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-lg-20">
            <form action="{{route('cottage.update', $cabana)}}" method="POST">
              @method('PUT')
              @csrf
              <div class="form-group mt-3">
                <input type="text" value="{{$cabana->name}}" class="form-control" name="name" id="name" required>
              </div>
              <div class="row">
                <div class="form-group mt-3 ">
                  <input type="text" value="{{$cabana->description}}" class="form-control" name="description" id="description" required>
                </div>
                <div class="form-group mt-3 ">
                  <input type="text" value="{{$cabana->beedrooms}}" class="form-control" name="beedrooms" id="beedrooms" required>
                </div>
                <div class="col-md-6 form-group mt-3">
                  <input type="text" value="{{$cabana->toilets}}" class="form-control" name="toilets" id="toilets" required>
                </div>
                <div class="col-md-6 form-group mt-3">
                  <input type="text" value="{{$cabana->price}}" class="form-control" name="price" id="price" required>
                </div>
                <div class="text-center btn-sm mt-3 "><button type="submit" class="btn btn-success btn-primary float-end">Editar</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin Modal para Editar Cabaña -->

  <!-- Modal para Borrar Cabaña -->
  <div class="modal fade" id="cottageDelete{{$cabana->id}}" tabindex="-1" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{$cabana->id}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col-lg-20">
            <form action="{{ route('cottage.destroy', $cabana->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <p class="text-center">Se eliminara la cabaña, esta acción no se puede deshacer.</p>
              <div class="text-center btn-sm mt-3 "><button type="submit" class="btn btn-danger btn-sm float-end mt-3 me-3">Eliminar</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin Modal para Borrar Cabaña -->
  @endforeach