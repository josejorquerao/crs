<!-- ======= Sidebar ======= -->
<div id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('dashboard') }}"><i class="fa-solid fa-chart-line"></i><span>Resumen</span></a>
    </li>

    <li class="nav-heading">Turista</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Perfil</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('bookings') }}"><i class="fa-solid fa-calendar-check"></i></i><span>Mis Reservas</span></a>
    </li>
    </li>

    <li class="nav-heading">Administrador</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('cottages') }}"><i class="fa-solid fa-house-chimney"></i><span>Cabañas</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('services') }}"><i class="fa-solid fa-truck-fast"></i><span>Servicios</span></a>
    </li>
  </ul>
</div>
<!-- End Sidebar-->