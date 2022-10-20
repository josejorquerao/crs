<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@include('partials.head')
<body>
    @yield('contenido')
@include('partials.static-header')
@include('partials.footer')
@stack('script')
</body>
</html>