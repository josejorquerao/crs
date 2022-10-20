<header id="header" class="fixed-top header-transparent">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
      <h1 class="text-light"><a href="#"><span>Altos del Chucao</span></a></h1>
    </div>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#welcome">Inicio</a></li>
        <li><a class="nav-link scrollto" href="#about">El lugar</a></li>
        <li><a class="nav-link scrollto" href="#services">Reservar</a></li>
        <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
      </ul>

      <!-- Autenticacion DE USUARIO -->
      @guest
      @if (Route::has('login'))
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
        </li>
      </ul>
      @endif
      @if (Route::has('register'))
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
        </li>
      </ul>
      @endif
      @else
      <div class="dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Perfil</a></li>
          <li><a class="dropdown-item" href="{{ route('dashboard') }}">Configuración</a></li>
        </ul>
      </div>
      <div class="navbar-nav" aria-labelledby="navbarDropdown">
        <a class="nav-link badge bg-success text-wrap" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
      @endguest
    </nav>
  </div>
</header>