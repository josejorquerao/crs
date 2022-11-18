@extends('layouts.app')

@section('template_title')
    {{ $booking->name ?? 'Show Booking' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Booking</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bookings.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ingress:</strong>
                            {{ $booking->ingress }}
                        </div>
                        <div class="form-group">
                            <strong>Egress:</strong>
                            {{ $booking->egress }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $booking->status }}
                        </div>
                        <div class="form-group">
                            <strong>Detail Id:</strong>
                            {{ $booking->detail_id }}
                        </div>
                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $booking->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>Guest Id:</strong>
                            {{ $booking->guest_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cottage Id:</strong>
                            {{ $booking->cottage_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
