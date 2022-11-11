<!-- Formulario Editar Información -->
<div id="profileInfo">
  @include('dashboard.info-profile-dashboard')
</div>
<!-- Fin Formulario Editar Información -->

<!-- Formulario Editar Contraseña -->
<div class="col-12" style="max-width:1000px; margin:auto;">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="col-lg-20">
        <h5 class="tittle"><i class="fa-solid fa-key text-muted"></i><strong> Actualizar Contraseña</strong></h5>
        <form>
          <div class="row">
            <div class="col-md-6 form-group mt-3 md-0">
              <label>Contraseña Nueva*</label>
              <input type="text" name="password" class="form-control" id="password" placeholder="Ingrese la nueva contraseña" required>
            </div>
            <div class="col-md-6 form-group mt-3 md-0">
              <label>Repetir Contraseña*</label>
              <input type="text" name="newpassword" class="form-control" id="newpassword" placeholder="Repita la nueva contraseña" required>
            </div>
          </div>
          <div class="row">
            <div class="mt-3 md-0">
              <!-- <button id="editProfile" type="button" onclick="verificarUser()" class="boton btn btn-success float-end mt-3 me-3">Guardar</button>-->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Fin Formulario Editar Contraseña -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Usuario modificado correctamente.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Verificar email -->
<script>
  $('#editProfile').on('submit', function(e) {
    e.preventDefault();
    var _token = $("input[name=_token]").val();
    var name = $('#txtName').val();
    var lastname = $('#txtLastname').val();
    var email = $('#txtEmail').val();
    var city = $('#txtCity').val();

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': _token
      },
      type: "PUT",
      url: "{{route('profile.update', $profile)}}",
      data: {
        _token: _token,
        txtName: name,
        txtLastname: lastname,
        txtEmail: email,
        txtCity: city,
        _method: "POST"
      },
      success: function(response) {
        $('#editProfile')[0].reset();
        $('#profileInfo').empty().html(response);
        const toastLiveExample = document.getElementById('liveToast')
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
      }

    });
  });
  /*const verifyEditProfile = async (id_profesor) => {
    $('#editProfile').prop('disabled', true)
    console.log();
    let array = ['names', 'surnames', 'emailProfesor']
    let sw = true

    var pre = array.map(async function(datos) {
      var dato = $('#' + datos)
      var datoValue = dato.val()
      if (datoValue.length === 0) {
        dato.css('border-color', 'red')
        sw = false
      } else {
        //verificar Correo repetido
        if (datos == 'emailProfesor') {
          var valEmail = await checkEmail($('#emailProfesor'), $('#error-email-edit'), id_profesor)
          if (valEmail == false) {
            sw = false
          }
        }
      }

    })
    const resolved = await Promise.all(pre)
    if (sw) {
      editarProfesor(id_profesor)
    }
    $('#saveProfile').prop('disabled', false)
  }

  var checkEmail = async (email, label) => {

    if (/^\w+([.-]?\w+)*@(?:|hotmail|outlook|yahoo|live|gmail|msn).(?:|com|es|cl)+$/.test(email.val())) {

      var res = await $.ajax({
        type: 'GET',
        url: 'validateEmail',
        data: {
          email: email.val()
        }
      })
      if (res == 'true') {
        email.css('border-color', '');
        label.text('');
        return true
      } else {
        email.css('border-color', 'red')
        label.text('Email ya registrado')
        return false
      }
    } else {
      email.css('border-color', 'red')
      label.text('Formato inválido')
      return false
    }
  }*/
</script>