@extends('dashboard')
@section('contenido')
<section class="section dashboard">
    <div class="pagetitle">
        <h1>Reportes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">/ dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="col-12" style="max-width:1000px; margin:auto;">
    @include('reports.grafic')
    @include('partials.reserves-list-card')
    </div>
</section>
@endsection