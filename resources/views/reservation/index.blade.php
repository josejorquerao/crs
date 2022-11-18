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

                             <div class="float-right">
                                <a href="{{ route('reservations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Reserva') }}
                                </a>
                              </div>
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
											<td>{{ $reservation->detail_id }}</td>
											<td>{{ $reservation->user->name }}</td>
											<td>
                                                @if ($reservation->guest_id==1)
                                                    No Aplica
                                                @else
                                                    {{$reservation->guest->name}}
                                                @endif
                                            
                                            </td>
											<td>{{ $reservation->cottage->name }}</td>

                                            <td>
                                                <form action="{{ route('reservations.destroy',$reservation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reservations.show',$reservation->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reservations.edit',$reservation->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
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
