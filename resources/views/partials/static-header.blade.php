<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <h1 class="text-light"><a href="{{ route('index') }}"><span>Altos del Chucao</span></a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          @guest
          @if (Route::has('dashboard'))
          <li><a class="nav-link scrollto active" href="{{ route('index') }}">Resumen</a></li>
          @endif
          @else
          <li><a class="nav-link scrollto active" href="{{ route('index') }}">Inicio</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}">El lugar</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}">Reservar</a></li>
          <li><a class="nav-link scrollto" href="{{ route('index') }}">Contacto</a></li>
        </ul>
        @endguest
        
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
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 {{ Auth::user()->name }}
              </a> 
               <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="#">Perfil</a></li>
               <li><a class="dropdown-item" href="{{ route('dashboard') }}">Configuración</a></li>
              </ul>
            </div>
            <!-- Salir -->
            <div class="navbar-nav" aria-labelledby="navbarDropdown">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('x') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
            <!-- Fin Salir -->
          @endguest
        <!-- Fin Autenticacion -->
      </nav>
    </div>
  </header>