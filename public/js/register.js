/* Ajax CSRF token */
/* $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 */
/* Verificar Usuario */
const verificarUser = async () => {

    $('#addUser').prop('disabled', true)
    let sw = true

    let array = ['nameRegister', 'lastnameRegister', 'cityRegister', 'emailRegister', 'passwordRegister', 'password-confirm']
    var pre = array.map(async function (datos) {
        var dato = $('#' + datos)
        var datoValue = dato.val()
        if (datoValue.length === 0) {
            dato.css('border-color', 'red')
            sw = false
        } else {
            switch (datos) {
                case 'password-confirm':
                    var valpass = checkPass($('#passwordRegister'), $('#password-confirm'))
                    if (valpass == false) { sw = false }
                    break
                case 'email':
                    var valEmail = await checkEmail($('#emailRegister'), $('#error-email'))
                    if (valEmail == false) { sw = false }
                    break
                default:
                    dato.css('border-color', '')
            }
        }
    })
    const resolved = await Promise.all(pre)

    //verificar pass mayor a 8 caracteres

    if (sw) {
        agregarUser()
    }

    $('#addUser').prop('disabled', false)

}


/* Verificar Contraseña */
function checkPass(pass, passConfirm) {
    if (pass.val() == passConfirm.val()) {
        pass.css('border-color', '')
        passConfirm.css('border-color', '')
        $('#error-password').text('')
        return true
    } else {
        pass.css('border-color', 'red')
        passConfirm.css('border-color', 'red')
        $('#error-password').text('No coinciden')
        return false
    }

}

/* Verificar email*/
var checkEmail = async (email, label) => {

    if (/^\w+([.-]?\w+)*@(?:|hotmail|outlook|yahoo|live|gmail|msn).(?:|com|es|cl)+$/.test(email.val())) {

        var res = await $.ajax({
            type: 'GET',
            url: 'validateEmail',
            data: { email: email.val() }
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

}

/*REGISTRAR*/
const agregarUser = async () => {
    $('#addUser').prop('disabled', true)
    let token = $("input[name=_token]").val()
    let form = $('#formRegister')
    let route = 'userStore'
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: route,
        data: form.serialize(),
        success: function (data) {
            if (data.success == 'true') {
                Swal.fire({
                    title:'Bienvenido',
                    text:'Serás redirigido',
                    icon:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result)=>{
                    if (result.isConfirmed){
                        $(location).attr('href','http://127.0.0.1:8000/prelogin')
                    }
                })
                
            } else {
                Swal.fire({
                    title:'Error',
                    text:'ocurrio un problema al registrase',
                    icon:'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then((result)=>{
                    if (result.isConfirmed){
                        $(location).attr('href','http://127.0.0.1:8000/')
                    }
                })
            }
        }
    });

}