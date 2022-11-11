@foreach ($services as $service)


<!-- Modal para Editar Servicio -->
<div class="modal fade" id="serviceEdit{{$service->id}}" tabindex="-1" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i><strong> Editar servicio</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-20">
                    <form action="{{route('service.update', $service)}}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group mt-3">
                            <span class="form-label">Título*</span>
                            <input type="text" value="{{$service->name}}" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 ">
                                <span class="form-label">Descripción*</span>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="{{$service->description}}" required>{{$service->description}}</textarea>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <span class="form-label">Precio (CLP)*</span>
                                <input type="text" value="{{$service->price}}" class="form-control" name="price" id="price" required>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <span class="form-label">Subir imagen (Opcional)</span>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="text-center btn-sm mt-3 "><button type="submit" class="boton btn btn-success btn-primary float-end">Editar</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal para Editar Servicio -->

<!-- Modal para Borrar Servicio -->
<div class="modal fade" id="serviceDelete{{$service->id}}" tabindex="-1" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-trash" style="font-size: 1em;"></i><strong> Se eliminará el servicio</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-20">
                    <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p class="text-center">¿Estás seguro(a)?, esta acción no se puede deshacer.</p>
                        <div class="text-center btn-sm mt-3 "><button type="submit" class="btn btn-danger btn-sm float-end mt-3 me-3">Eliminar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal para Borrar Servicio -->
<div class="col-12 " style="max-width:1000px; margin:auto;">
    <div class="card mb-3 ms-3">
        <div class="row g-0">
            <div class="col-md-12">
                <button type="button" class="btn btn-light btn-lg float-end mt-3 me-3" data-bs-toggle="modal" data-bs-target="#serviceDelete{{$service->id}}"><i class="bi bi-trash" style="font-size: 1em;"></i></button>
                <button type="button" class="btn btn-light btn-lg float-end mt-3 me-3" data-bs-toggle="modal" data-bs-target="#serviceEdit{{$service->id}}"><i class="bi bi-pencil-square" style="font-size: 1em;"></i></button>
                <div class="container mt-3 mb-3">
                    <div class="row">
                        <div class="col">
                            <img src="{{asset('img/'.$service->image.'')}}" width="300" class="img-fluid img-thumbnail mb-3" alt="">
                            <h3 id="precio" style="color:#69a817;"><strong><i class="fa-solid fa-dollar-sign"></i>&nbsp;{{$service->price}}</strong></h3>
                        </div>
                        <div class="col">
                            <h5 class="card-title title text-muted"><strong>{{$service->name}}</strong></h5>
                            <p class="card-text">{{$service->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach