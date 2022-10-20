@extends('dashboard')
@section('contenido')
<section class="section dashboard">
    <div class="pagetitle">
        <h1>Mis Reservas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">/ dashboard / bookings</li>
            </ol>
        </nav>
    </div>
    @include('forms.bookings-form')
</section>
@endsection