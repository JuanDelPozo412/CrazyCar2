<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="{{ url('/') }}" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="{{ asset('images/luxury-car-sketch-png-5693248.png') }}" alt="Logo Crazy Cars" width="80"
                    height="80" />
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ url('/') }}" class="nav-link px-2 {{ request()->is('/') ? 'link-secondary' : '' }}">Inicio</a></li>
            <li><a href="{{ url('/galeria') }}" class="nav-link px-2 {{ request()->is('galeria') ? 'link-secondary' : '' }}">Galería</a></li>
            <li><a href="{{ url('/servicios') }}" class="nav-link px-2 {{ request()->is('servicios') ? 'link-secondary' : '' }}">Servicios</a></li>
            {{-- <li><a href="{{ url('/contacto') }}" class="nav-link px-2">Contacto</a></li> --}}
        </ul>

    <div class="col-md-3 text-end">

  
    @guest
        <a href="{{ url('/login') }}" class="btn btn-outline-primary me-2">Iniciar Sesión</a>
        <a href="{{ url('/register') }}" class="btn btn-primary text-white">Registrarse</a>
    @endguest


    @auth
        <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary me-2">Mi Perfil</a>
        <a href="{{ route('logout') }}"
           class="btn btn-outline-secondary" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar Sesión
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endauth

</div>
    </header>
</div>
