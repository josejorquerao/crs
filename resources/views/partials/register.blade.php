<div id="modalRegistrar" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="formRegister" action="">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Apellidos</label>

                        <div class="col-md-6">
                            <input id="lastname" type="text" class="form-control" name="lastname" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ciudad" class="col-md-4 col-form-label text-md-end">Ciudad</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control" name="city" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                            <label id="error-email"></label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            <label id="error-password"></label>
                        </div>

                    </div>


                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar
                            Contraseña</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button id="addUser" type="button" onclick="verificarUser()" class="boton btn btn-success">Registrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('/js/register.js')}}"></script>