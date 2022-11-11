const ponerPrecio = (boton) => {
    var hidden = $('#hiddenServicio').val();

    if (boton.checked == true) {
        var calculo = parseInt(hidden) + parseInt(boton.value);
    } else {
        var calculo = parseInt(hidden) - parseInt(boton.value);
    }

    $('#subtotalServicio').empty().html(calculo)
    $('#hiddenServicio').val(calculo)

    var total = $('#total').val()
    var calculoTotal = parseInt(total) + parseInt(calculo)
    $('#totalSpan').empty().html(calculoTotal)
    $('#botonTotal').empty().html(calculoTotal)
    total = calculoTotal
}