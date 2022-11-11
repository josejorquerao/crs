<header id="header" class="fixed-top header-transparent">

  <div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
      <h1 class="text-light"><a href="#welcome"><span>Altos del Chucao</span></a></h1>
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
          <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalLogin">Entrar</a>
        </li>
      </ul>
      @endif
      @if (Route::has('register'))
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Registrar</a>
        </li>
      </ul>
      @endif
      @else
      <div class="dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('profile') }}">Perfil</a></li>
          <li><a class="dropdown-item" href="{{ route('dashboard') }}">Configuración</a></li>
        </ul>
      </div>
      <div class="navbar-nav" aria-labelledby="navbarDropdown">
        <button id="botonLogout" class="nav-link btn bt-success btn-sm badge text-wrap" href="{{ route('logout') }} " onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket" style="font-size: 2em;"></i></button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
      @endguest
    </nav>
  </div>
</header>
