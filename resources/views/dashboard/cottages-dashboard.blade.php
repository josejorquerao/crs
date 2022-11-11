<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group" role="group" aria-label="First group">
    <button id="boton" type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#cottageCreate" data-backdrop="false" data-dismiss="modal"><i class="bi bi-pencil-square" style="font-size: 1em;"></i> Agregar</button>
  </div>
</div>
<div id="cottageList">
  @include('partials.cottage-list')
</div>
<!-- Modal para Crear Cabaña -->
<div class="modal fade" id="cottageCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square"></i><strong> Registrar cabaña</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-lg-20">
          <form id="createCottage" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group mt-3">
              <span class="form-label">Nombre de la cabaña*</span>
              <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Nombre">
            </div>
            @error('txtName')
            <br>
            {{$message}}
            <br>
            @enderror
            <div class="row">
              <div class="form-group mt-3 ">
                <span class="form-label">Descripción*</span>
                <textarea class="form-control" id="txtDescription" name="txtDescription" rows="5" placeholder="Descripción"></textarea>
                @error('txtDescription')
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
              </div>
              <div class="form-group mt-3 ">
                <span class="form-label">Dormitorios*</span>
                <input type="text" class="form-control" name="txtBeedrooms" id="txtBeedrooms" placeholder="Dormitorios">
                @error('txtBeedrooms')
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
              </div>
              <div class="col-md-6 form-group mt-3">
                <span class="form-label">Baños*</span>
                <input type="text" class="form-control" name="txtToilets" id="txtToilets" placeholder="Baños">
                @error('txtToilets')
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
              </div>

              <div class="col-md-6 form-group mt-3">
                <span class="form-label">Precio (CLP La noche)*</span>
                <input type="text" class="form-control" name="txtPrice" id="txtPrice" placeholder="Precio">
                @error('txtPrice')
                <br>
                <small>*{{$message}}</small>
                <br>
                @enderror
              </div>
              <div class="form-group mt-3">
                <span class="form-label">Subir imagen</span>
                <input type="file" class="form-control" name="txtImage" id="txtImage" required>
              </div>
              <div class="text-center btn-sm mt-3 ">
                <button type="submit" class="boton btn btn-success btn-primary float-end"><i class="bi bi-pencil-square" style="font-size: 1em;"></i> Registrar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast2" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Cabaña creada correctamente.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!-- Fin Modal para Crear Cabaña -->

<!-- Insertar con AJAX-->
<script>
  $('#createCottage').on('submit', function(e) {
    console.log(e)
    e.preventDefault();
    var _token = $("input[name=_token]").val()
    var name = $('#txtName').val()
    var description = $('#txtDescription').val()
    var beedrooms = $('#txtBeedrooms').val()
    var toilets = $('#txtToilets').val()
    var price = $('#txtPrice').val()
    var image = $('#txtImage')
    var formData = new FormData();
    formData.append('_token', _token);
    formData.append('txtName', name);
    formData.append('txtDescription', description);
    formData.append('txtBeedrooms', beedrooms);
    formData.append('txtToilets', toilets);
    formData.append('txtPrice', price);
    formData.append('txtImage', image[0].files[0]);
    $.ajax({
      type: "POST",
      url: "{{route('cottage.create')}}",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        $('#cottageCreate').hide();
        $('.modal-backdrop').remove();
        $('#createCottage')[0].reset();
        $('#cottageList').empty().html(response);
        $("body").css("overflow", "auto");
        const toastLiveExample = document.getElementById('liveToast2')
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
      }
    });
  });
</script>