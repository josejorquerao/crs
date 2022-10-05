<!-- Modal RESERVAR -->
<div class="modal fade" id="cottageCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="">Crear cabaña</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >     
            <div class="col-lg-20">
                <form action="{{('cottage.create')}}" method:="post">
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                  </div>
                  <div class="row">

                  <div class="form-group mt-3 ">
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" required>
                  </div>
                  <div class="form-group mt-3 ">
                    <input type="text" class="form-control" name="beedrooms" id="beedrooms" placeholder="Baños" required>
                  </div>
                    <div class="col-md-6 form-group mt-3">
                        <input type="text" class="form-control" name="toilets" id="toilets" placeholder="toilets" required>
                    </div>

                    <div class="col-md-6 form-group mt-3">
                        <input type="text" class="form-control" name="price" id="price" placeholder="price" required>
                    </div>
    
                  
                  <div class="text-center mt-3"><button type="submit" class="btn btn-success btn-primary">Crear</button></div>
                </form>
            </div>
        </div> 

        </div>
    </div>
</div>