<!-- ======= Sidebar ======= -->
  <div id="sidebar" class="sidebar">
  <br><br>
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Resumen</span>
        </a>
      </li>
      <li class="nav-heading">Turista</li>
      <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('profile') }}"><i class="bi bi-envelope"></i><span>Perfil</span></a></li>

      <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('bookings') }}"><i class="bi bi-envelope"></i><span>Mis Reservas</span></a></li>
      </li>
      <li class="nav-heading">Administrador</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('cottages') }}">
          <i class="bi bi-envelope"></i>
          <span>Cabañas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('services') }}">
          <i class="bi bi-card-list"></i>
          <span>Servicios</span>
        </a>
      </li>
    </ul>
</div>
<!-- End Sidebar-->