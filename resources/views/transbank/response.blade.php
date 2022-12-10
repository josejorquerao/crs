@include('partials.head')
@include('partials.header')
@include('partials.welcome')

<body>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script type="text/javascript">
    (function() {
        emailjs.init("j1RGa_jPjOqjgbWyC");
    })();
</script>
<script>
    var user = <?php echo json_encode($user); ?>;
    var compra = <?php echo json_encode($compra); ?>;
    var reserva = <?php echo json_encode($booking); ?>;
    var cabaña = <?php echo json_encode($cottage); ?>;
    $(document).ready(function() {
        const serviceID = 'default_service';
        const templateID = 'template_q846kln';
        console.log(user)
        var templateParams = {
            name: user.name,
            email: user.email,
            total: compra.total,
            cottage_name: cabaña.name,
            ingress: reserva.ingress,
            egress: reserva.egress
        };

        emailjs.send(serviceID, templateID, templateParams)
            .then(function(response) {
                console.log('SUCCESS!', response.status, response.text);
            }, function(error) {
                console.log('FAILED...', error);
            });
        isCorrectPay()
    });

    function isCorrectPay() {
        if ({{ $estado }} == 1) {
            Swal.fire({
                title: 'Pago Aceptado',
                html: 'Estimado '+ reserva.guest.name +' la Cabaña a sido Reservada. <br> Monto Total :$ '+compra.total +'<br> Cabaña :'+cabaña.name+'<br>  Se envio un correo con la información correspondiente. ',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                $(location).attr('href', 'http://127.0.0.1:8000')
            })
        } else {
            Swal.fire({
                title: 'Pago Rechazado',
                text: 'Estimado usuario la Cabaña no se logro reservar.',
                icon: 'info',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                $(location).attr('href', 'http://127.0.0.1:8000')
            })
        }
    }

    function sendToEmail() {
        var user = <?php echo json_encode($user); ?>;
        var compra = <?php echo json_encode($compra); ?>;
        var cabaña = <?php echo json_encode($booking); ?>;
        const serviceID = 'default_service';
        const templateID = 'template_q846kln';
        var parameters = {
            name_cottage: cabaña.cottage_id,
            email: 'yohani95301@gmail.com',
            name: user.name,
            total: compra.total,
            ingress: cabaña.ingress,
            egress: cabaña.egress,
        }
        emailjs.sendForm(serviceID, templateID, parameters).then(() => {}, (err) => {
            console.log(err)
        });
    }
</script>
