@extends('dashboard')
@section('contenido')
<section class="section dashboard">
    <div class="pagetitle">
        <h1>Gestionar Cabañas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">/ dashboard / cottages</li>
            </ol>
        </nav>
    </div>
    @include('dashboard.cottages-dashboard')
</section>
@endsection