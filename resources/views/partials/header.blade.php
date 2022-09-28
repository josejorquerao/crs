<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <h1 class="text-light"><a href="#"><span>Altos del Chucao</span></a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
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
           <ul class="navbar-nav ms-auto">
             <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 {{ Auth::user()->name }}
               </a>
               
              </li>
            </ul>
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