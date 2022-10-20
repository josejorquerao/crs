@extends('dashboard')
@section('contenido')
<section class="section dashboard">
    <div class="pagetitle">
        <h1>Gestionar Servicios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">/ dashboard / services</li>
            </ol>
        </nav>
    </div>
    @include('forms.services-form')
</section>
@endsection