<!-- ======= Sidebar ======= -->
<div id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    @role('turista')
    <li class="nav-heading">Turista</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Perfil</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.index') }}"><i class="fa-solid fa-calendar-check"></i></i><span>Mis Reservas</span></a>
    </li>
    </li>
    @endrole
    @role('admin')
    <li class="nav-heading">Administrador</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('resumen') }}"><i class="fa-solid fa-chart-line"></i><span>Resumen</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('cottages') }}"><i class="fa-solid fa-house-chimney"></i><span>Cabañas</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('reservations.index') }}"><i class="fa-solid fa-calendar-check"></i><span>Lista de Reservas</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('services') }}"><i class="fa-solid fa-truck-fast"></i><span>Servicios</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('profile') }}"><i class="fa-solid fa-user"></i><span>Perfil</span></a>
    </li>
  </ul>
  @endrole
</div>
<!-- End Sidebar-->