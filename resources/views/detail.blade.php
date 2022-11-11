@extends('layouts.layout')

<body>
  <div id="resumen" class="main">
    <div class="row">
      <div class="col-md-5 " style="margin:left;">
        <div class="card">
          <div class="card-header">
            <h4 class="text mt-2"><i class="bi bi-clipboard-check"></i> Tu viaje</h4>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              @csrf
              <div class="col">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom mb-3"></div>
                <h5> Información de la reserva</h5>
              </div>
              <div class="col-md-6 form-group mt-3">
                <span class="form-label">Acompañantes</span>
                <select class="form-select" aria-label="Default select example">
                  <option selected>{{$request->get('select')}}</option>
                </select>
              </div>
              <div class="row">
                <div class="col-sm-6">

                  <div class="form-group">
                    <span class="form-label">Llegada</span>
                    <input type="date" value="{{$request->ingress}}" class="form-control" name="ingress" id="ingress" required readonly>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <span class="form-label">Salida</span>
                    <input type="date" value="{{$request->egress}}" class="form-control" name="egress" id="egress" required readonly>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom mb-3"></div>
                <h5> Información del turista</h5>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 form-group">
                  <span class="form-label">Nombre</span>
                  <input type="text" value="{{$request->name}}" name="name" class="form-control" id="name" placeholder="Nombre" required readonly>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <span class="form-label">Apellido</span>
                  <input type="text" value="{{$request->lastname}}" class="form-control" name="email" id="email" placeholder="Apellidos" required readonly>
                </div>
              </div>
              <div class="form-group mt-3">
                <span class="form-label">Email</span>
                <input type="text" value="{{$request->email}}" class="form-control" name="email" id="email" placeholder="Email" required readonly>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <span class="form-label">Ciudad</span>
                  <input type="text" value="{{$request->city}}" name="city" class="form-control" id="city" placeholder="Ciudad" required readonly>
                </div>
                <div class="col-md-6 form-group mt-3">
                  <span class="form-label">Dirección</span>
                  <input type="text" value="{{$request->address}}" class="form-control" name="address" id="address" placeholder="Dirección" required readonly>
                </div>
              </div>
              <div class="form-group mt-3 ">
                <span class="form-label">Telefono</span>
                <input type="text" value="{{$request->phone}}" class="form-control" name="phone" id="phone" placeholder="Telefono ej.(+569xxxxxxxx)" required readonly>
              </div>
            </form>
          </div>
          <div class="card-footer text-muted">
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="col-md-12 form-group mt-3">
              <h5>Servicios adicionales</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 " style="margin:left;">
        <div class="card">
          <div class="card-body">
            <div class="col">
              <h5 class="ps-3 pb-3 title text-muted mt-3"><strong> {{$request->cottageName}}</strong></h5>
            </div>
            <div class="col">
              <img src="{{$request->cottageImg}}" class="img-fluid mb-3 border" alt="">
              <h3 class="ps-3 pb-3" style="color:#69a817;"><i class="bi bi-currency-dollar"></i><strong>{{$request->cottagePrice}}</strong></h3>
              <p class="card-text ps-3 pb-3">{{$request->cottageDesc}}</p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="col-md-12 form-group mt-3">
              <h5>Servicios adicionales</h5>
              @foreach ($services as $service)
              <div class="form-check form-switch">
                <input value="{{$service->price}}" class="form-check-input" type="checkbox" onChange="ponerPrecio(this)">
                <label class="form-check-label" for="flexSwitchCheckDefault">{{$service->name}}</label><label>&nbsp;(s$</label><label id="precioServicio{{$service->id}}">{{$service->price}})</label>
              </div>
              @endforeach
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom mb-3"></div>
              <div class="row form-group">
                <div class="col-6"><span data-bind="">Total Días ({{$dias}})</span></div>
                <div class="col-6 text-right"><span>&nbsp;${{$preciototal}}</span></div>
              </div>
              <div class="row form-group">
                <div class="col-6"><span data-bind="">Total Servicios</span></div>
                <div class="col-6 text-right"><span>&nbsp;$</span><span id="subtotalServicio">0</span></div>
                <input type="hidden"id="hiddenServicio" value = "0">
              </div>
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom mb-3"></div>
              <div class="row form-group">
                <div class="col-6"><span data-bind="">Total (CLP)</span></div>
                <div class="col-6 text-right"><span>&nbsp;$</span><span id="totalSpan">{{$preciototal}}</span></div>
                <input type="hidden" value="{{$preciototal}}" id="total">
              </div>
              <div class=" col-md-12 form-group mt-3">
                <button id="boton" type="submit" class="btn btn-success btn-primary col-md-12"><strong><span>PAGAR $</span><span id="botonTotal">{{$preciototal}}</span></strong></button>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</body>
<script src="{{asset('/js/precio.js')}}"></script>