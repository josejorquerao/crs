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
										<th>Detalle Id</th>
										<th>Users Id</th>
										<th>Invitado Id</th>
										<th>Cabaña Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reservation->ingress }}</td>
											<td>{{ $reservation->egress }}</td>
											<td>{{ $reservation->status }}</td>
											<td>{{ $reservation->detail_id }}</td>
											<td>{{ $reservation->users_id }}</td>
											<td>{{ $reservation->guest_id }}</td>
											<td>{{ $reservation->cottage_id }}</td>

                                            <td>
                                                <form action="{{ route('admin.cancelar',$reservation->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Cancelar Reserva</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reservations->links() !!}
            </div>
        </div>
    </div>
</section>
@endsection
