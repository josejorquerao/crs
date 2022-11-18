@extends('dashboard')
@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reservation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary m-2" href="{{ route('reservations.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ingreso:</strong>
                            {{ $reservation->ingress }}
                        </div>
                        <div class="form-group">
                            <strong>Salida:</strong>
                            {{ $reservation->egress }}
                        </div>
                        <div class="form-group">
                            <strong>Estadp:</strong>
                            {{ $reservation->status }}
                        </div>
                        <div class="form-group">
                            <strong>Detail Id:</strong>
                            {{ $reservation->detail_id }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Id:</strong>
                            {{ $reservation->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>Invitado Id:</strong>
                            {{ $reservation->guest_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cabaña Id:</strong>
                            {{ $reservation->cottage_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
