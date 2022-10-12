@extends('dashboard')
<br>
@section('contenido')
 @include('partials.reserves-year-card')
 @include('partials.reserves-month-card')
 @include('partials.reserves-week-card')
 @include('partials.reserves-list-card')
@endsection