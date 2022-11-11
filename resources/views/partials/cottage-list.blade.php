@foreach ($cabanas as $cabana)
<div class="col-12 " style="max-width:1000px; margin:auto;">
    <div class="card mb-3 ms-3">
        <div class="row g-0">
            <div class="col-md-12">
                <button type="button" onclick="abrirModal('{{$cabana->id}}')" class="btn btn-light btn-lg float-end mt-3 me-3" data-bs-toggle="modal" data-bs-target="#cottageDelete"><i class="bi bi-trash" style="font-size: 1em;"></i></button>
                <button type="button" onclick="rellenarModal('{{$cabana}}')" class="btn btn-light btn-lg float-end mt-3 me-3" data-bs-toggle="modal" data-bs-target="#cottageEdit"><i class="bi bi-pencil-square" style="font-size: 1em;"></i></button>
                <div class="container mt-3 mb-3">
                    <div class="row">
                        <div class="col">
                            <img src="{{asset('img/'.$cabana->image.'')}}" width="300" class="img-fluid img-thumbnail mb-3 " alt="">
                            <h3 id="precio" style="color:#69a817;"><strong><i class="fa-solid fa-dollar-sign"></i>&nbsp;{{$cabana->price}}</strong></h3>
                        </div>
                        <div class="col">
                            <h4 class="card-title title text-muted"><strong>{{$cabana->name}}</strong></h4>
                            <i class="fa-solid fa-toilet mb-3 fa-lg" style="color:#69a817;"><label>&nbsp;{{$cabana->toilets}}</label> </i>&nbsp;
                            <i class="fa-solid fa-bed fa-lg" style="color:#69a817;"><label>&nbsp;{{$cabana->beedrooms}}</label> </i>
                            <p class="card-parraf" style="text-align:justify;">{{$cabana->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Modal para Borrar Cabaña -->
<div class="modal fade" id="cottageDelete" tabindex="-1" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-trash" style="font-size: 1em;"></i><strong> Se eliminará la cabaña</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-20">
                    <form id="deleteCottage" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="text" id="idCabana3" value="">
                        <p class="text-center">¿Estás seguro(a)?, esta acción no se puede deshacer.</p>
                        <div class="text-center btn-sm mt-3 "><button type="button" onclick="deleteCottage()" class="btnn btn btn-danger btn-sm float-end mt-3 me-3">Eliminar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal para Borrar Cabaña -->


<!-- Modal para Editar Cabaña -->
<div class="modal fade" id="cottageEdit" tabindex="-1" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i><strong> Editar cabaña</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-20">
                    <form id="updateCottage" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <span class="form-label">Nombre de la cabaña*</span>
                            <input type="text" value="" class="form-control" name="txtName2" id="txtName2" required>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 ">
                                <span class="form-label">Descripción*</span>
                                <textarea class="form-control" id="txtDescription2" name="txtDescription2" rows="5" placeholder="" required></textarea>
                            </div>
                            <div class="form-group mt-3 ">
                                <span class="form-label">Dormitorios*</span>
                                <input type="text" value="" class="form-control" name="txtBeedrooms2" id="txtBeedrooms2" required>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <span class="form-label">Baños*</span>
                                <input type="text" value="" class="form-control" name="txtToilets2" id="txtToilets2" required>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <span class="form-label">Precio (CLP La noche)*</span>
                                <input type="text" value="" class="form-control" name="txtPrice2" id="txtPrice2" required>
                            </div>
                            <div class="form-group mt-3">
                                <span class="form-label">Subir imagen</span>
                                <input type="file" class="form-control" name="txtImage2" id="txtImage2">
                            </div>
                            <input type="hidden" id="idCabana2">
                            <div class="text-center btn-sm mt-3 "><button type="button" onclick="editCabana()" class="boton btn btn-success btn-primary float-end">Editar</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modal para Editar Cabaña -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast3" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Cabaña editada correctamente.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!-- Actualizar con AJAX -->
<script>
    const editCabana = () => {
        var _token = $("input[name=_token]").val()
        var name = $('#txtName2').val()
        var description = $('#txtDescription2').val()
        var beedrooms = $('#txtBeedrooms2').val()
        var toilets = $('#txtToilets2').val()
        var price = $('#txtPrice2').val()
        var image = $('#txtImage2')
        var formData = new FormData()
        formData.append('_token', _token);
        formData.append('txtName2', name);
        formData.append('txtDescription2', description);
        formData.append('txtBeedrooms2', beedrooms);
        formData.append('txtToilets2', toilets);
        formData.append('txtPrice2', price);
        formData.append('idCabana', $('#idCabana2').val());
        formData.append('txtImage2', image[0].files[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': _token
            },
            type: "post",
            url: "{{route('cottage.update')}}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#cottageEdit').hide();
                $('.modal-backdrop').remove();
                $('#updateCottage')[0].reset();
                $('#cottageList').empty().html(response)
                $("body").css("overflow", "auto");
                const toastLiveExample = document.getElementById('liveToast3')
                const toast = new bootstrap.Toast(toastLiveExample)
                toast.show()
            }
        });
    }
    const rellenarModal = (cabana) => {
        var cabana = JSON.parse(cabana);
        var name = $('#txtName2').val(cabana.name);
        var description = $('#txtDescription2').val(cabana.description);
        var beedrooms = $('#txtBeedrooms2').val(cabana.beedrooms);
        var toilets = $('#txtToilets2').val(cabana.toilets);
        var price = $('#txtPrice2').val(cabana.price);
        $('#idCabana2').val(cabana.id);
    }
</script>

<!-- Eliminar con AJAX-->
<script>
    const deleteCottage = () => {
        var _token = $("input[name=_token]").val()
        var id = $('#idCabana3').val()
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': _token
            },
            type: "POST",
            url: "{{ route('cottage.destroy')}}",
            data: {
                _token: _token,
                idCabana3: id,
                _method: "DELETE",
            },
            success: function(response) {
                $('#cottageDelete').hide();
                $('.modal-backdrop').remove();
                $('#deleteCottage')[0].reset();
                $('#cottageList').empty().html(response);
                $("body").css("overflow", "auto");
            }
        });
    }
    const abrirModal = (cabana) => {
        var id = $('#idCabana3').val(cabana)
    }
</script>