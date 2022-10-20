<!-- ======= Sidebar ======= -->
<div id="sidebar" class="sidebar">
  <br><br>
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('dashboard') }}"><span>Resumen</span></a>
    </li>

    <li class="nav-heading">Turista</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('profile') }}"><i class="bi bi-1-square"></i><span>Perfil</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('bookings') }}"><span>Mis Reservas</span></a>
    </li>
    </li>

    <li class="nav-heading">Administrador</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('cottages') }}"><span>Cabañas</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('services') }}"><span>Servicios</span></a>
    </li>
  </ul>
</div>

<!-- End Sidebar-->