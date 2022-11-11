<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group" role="group" aria-label="First group">
    <button id="boton" type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#serviceCreate"><i class="bi bi-pencil-square" style="font-size: 1em;"></i> Agregar</button>
  </div>
</div>
<div id="serviceList">
  @include('partials.service-list')
</div>
<!-- Modal para Crear Servicio -->
<div class="modal fade" id="serviceCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square"></i><strong> Registrar servicio</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-lg-20">
          <form id="createService" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group mt-3">
              <span class="form-label">Título*</span>
              <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Nombre">
              @error('txtName')
              <br>
              {{$message}}
              <br>
              @enderror
            </div>
            <div class="row">
              <div class="form-group mt-3 ">
                <span class="form-label">Descripción*</span>
                <textarea class="form-control" id="txtDescription" name="txtDescription" rows="5" placeholder="Descripción"></textarea>
                @error('txtDescription')
                <br>
                {{$message}}
                <br>
                @enderror
              </div>
              <div class="col-md-6 form-group mt-3">
                <span class="form-label">Precio (CLP)*</span>
                <input type="text" class="form-control" name="txtPrice" id="txtPrice" placeholder="Precio">
                @error('txtPrice')
                <br>
                {{$message}}
                <br>
                @enderror
              </div>
              <div class="col-md-6 form-group mt-3">
                <span class="form-label">Subir imagen (Opcional)</span>
                <input type="file" class="form-control" name="txtImage" id="txtImage">
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!-- Fin Modal para Crear Servicio -->
<script>
  $('#createService').on('submit', function(e) {
    e.preventDefault();
    var _token = $("input[name=_token]").val();
    var name = $('#txtName').val();
    var description = $('#txtDescription');
    var price = $('#txtPrice');
    var image = $('#txtImage');
    var formData = new FormData();
    formData.append('_token', _token);
    formData.append('txtName', name);
    formData.append('txtDescription', name);
    formData.append('txtPrice', name);
    formData.append('txtImage', image[0].files[0]);
    $.ajax({
      type: "POST",
      url: "{{ route('service.create') }}",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        $('#serviceCreate').hide();
        $('.modal-backdrop').remove();
        $('#createService')[0].reset();
        $('#serviceList').empty().html(response);
        $("body").css("overflow", "auto");
      }
    });
  });
</script>