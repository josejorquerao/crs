@extends('dashboard')
@section('contenido')
<section class="section dashboard">
<div class="pagetitle">
    <h1>Lista de Reservas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">/ dashboard / Reservas</li>
        </ol>
    </nav>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reservas') }}
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Ingreso</th>
										<th>Salida</th>
										<th>Estado</th>
										<th>Cabaña</th>
                                        <th>Accion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $reservation->ingress }}</td>
                                        <td>{{ $reservation->egress }}</td>
                                        <td>
                                            @if ($reservation->status=='0')
                                                Pendiente
                                            @endif
                                            @if ($reservation->status=='1')
                                                Aceptado
                                            @endif
                                            @if ($reservation->status=='2')
                                                Cancelado
                                            @endif
                                        </td>
                                        <td>{{ $reservation->cottage->name }}</td>

                                        <td>
                                            @if ($reservation->status=='2' )
                                                No Aplica
                                            @else
                                            <form action="{{ route('admin.cancelar',$reservation->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Cancelar Reserva</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($reservations->count()<=0)
                                Sin Datos
                                @endif
                        </div>
                    </div>
                </div>
                {!! $reservations->links() !!}
            </div>
        </div>
    </div>
</section>
@endsection
