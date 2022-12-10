<section id="contact" class="contact section-bg mt-3">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2><i class="fa-solid fa-location-dot"></i> Contacto</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="info-box mb-4 border">
          <i class="bi bi-pin-map"></i>
          <h3>Dirección</h3>
          <p>Callejón interior Puente Don Domingo s/n Caunahue, Futrono,</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="info-box mb-4 border">
          <i class="bi bi-envelope-paper"></i>
          <h3>Nuestro Email</h3>
          <p>altosdelchucao@gmail.com</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="info-box mb-4 border">
          <i class="bi bi-telephone-inbound"></i>
          <h3>LLamanos al</h3>
          <p>+56 9 6160 7574</p>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-lg-6">
        <x-maps-leaflet class="mb-4 mb-lg-0 border" style="border:0; width: 100%; height: 384px;" :centerPoint="['lat' => -40.15812846341708, 'long' => -72.24895481715583]" :zoomLevel="10" :markers="[['lat' => -40.15812846341708, 'long' => -72.24895481715583]]">
        </x-maps-leaflet>
      </div>

      <div class="col-lg-6">
        <form action="" id="formEmail" mame="formEmail" method="post" role="form" class="php-email-form border">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Tu Nombre" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Tu mejor email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Encabezado" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center">
            <button id="botonMensaje" class="btn btn-success col-md-12">Enviar mensaje</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</section>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init("j1RGa_jPjOqjgbWyC");
   })();
</script>
<script>
 document.getElementById('formEmail')
 .addEventListener('submit', function(event) {
   event.preventDefault();  
   const btn = document.getElementById('botonMensaje');   
   btn.innerHTML =
  '<span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span> Enviando mensaje ...';        
   btn.disabled=true;

   const serviceID = 'default_service';
   const templateID = 'template_xz7ql1t';
   emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      Swal.fire({
                    title:'Mensaje Enviado',
                    text:'Estimado usuario tu mensaje a sido enviado Correctamente',
                    icon:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result)=>{
                  console.log(result)
                  btn.innerHTML ='Enviar Mensaje';
                  btn.disabled=false;
                })
    }, (err) => {
      Swal.fire({
                    title:'Error al enviar Mensaje',
                    text:'Pronto Solucionaremos el error, trabajamos en ello.',
                    icon:'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result)=>{
                  console.log(JSON.stringify(err.text))
                  btn.innerHTML ='Enviar Mensaje';
                  btn.disabled=false; 
                })
    }); 
    this.reset()
});
</script>