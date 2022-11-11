@extends('layouts.nav')

<body>
  <div id="resumen" class="main">
    @yield('contenido')
    @include('partials.dashboard-footer')
  </div>

</body>