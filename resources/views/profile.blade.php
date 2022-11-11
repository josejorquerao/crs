@extends('dashboard')
@section('contenido')
<section class="section dashboard">
    <div class="pagetitle">
        <h1>Ajustes del Perfil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">/ dashboard / profile</li>
            </ol>
        </nav>
    </div>
    @include('dashboard.profile-dashboard')
</section>
@endsection