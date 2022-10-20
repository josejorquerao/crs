@extends('layouts.nav')
<br>
<!DOCTYPE html>
<html lang="en">

<body>
  <div id="resumen" class="main">
    @include('partials.sidebar')
    @yield('contenido')
    @include('partials.dashboard-footer')
  </div>

</body>

</html>