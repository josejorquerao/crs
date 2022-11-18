@extends('layouts.app')

@section('template_title')
    Booking
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Booking') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bookings.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Ingress</th>
										<th>Egress</th>
										<th>Status</th>
										<th>Detail Id</th>
										<th>Users Id</th>
										<th>Guest Id</th>
										<th>Cottage Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $booking->ingress }}</td>
											<td>{{ $booking->egress }}</td>
											<td>{{ $booking->status }}</td>
											<td>{{ $booking->detail_id }}</td>
											<td>{{ $booking->users_id }}</td>
											<td>{{ $booking->guest_id }}</td>
											<td>{{ $booking->cottage_id }}</td>

                                            <td>
                                                <form action="{{ route('bookings.destroy',$booking->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bookings.show',$booking->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bookings.edit',$booking->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bookings->links() !!}
            </div>
        </div>
    </div>
@endsection
