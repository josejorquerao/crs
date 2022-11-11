<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')

<body>
    @yield('contenido')
    @include('partials.detail-header')
    @include('partials.dashboard-footer')
</body>



</html>