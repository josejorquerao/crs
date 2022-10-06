<div class="row">
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group" role="group" aria-label="First group">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cottageCreate">Agregar</button>
  </div>
</div>
@forelse ($cabanas as $cabana)
<div class="card mb-3" style="max-width:1000px; margin:auto;">
  <div class="row g-0">
    <div class="col-md-4">
    </div> 
      <div class="col-md-8"> 
          <button data-id="" id="" class="btn btn-light btn-sm" data-toggle="modal" data-target="#">Editar</button>
          <button data-id="" id="" class="btn btn-light btn-sm" data-toggle="modal" data-target="#">Eliminar</button>
          <h5 class="card-title">{{$cabana->name}}</h5>
          <p class="card-text">{{$cabana->description}}</p>
          <p class="card-text"><small class="text-muted">Actualizado hace 3 minutos</small></p>
        </div>     
      </div>
  </div>
</div>
@empty
@endforelse
</div>