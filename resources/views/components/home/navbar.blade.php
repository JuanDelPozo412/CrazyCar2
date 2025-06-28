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
            <li><a href="{{ url('/') }}" class="nav-link px-2 link-secondary">Inicio</a></li>
            <li><a href="{{ url('/galeria') }}" class="nav-link px-2">Galería</a></li>
            <li><a href="{{ url('/servicios') }}" class="nav-link px-2">Servicios</a></li>
            {{-- <li><a href="{{ url('/contacto') }}" class="nav-link px-2">Contacto</a></li> --}}
        </ul>

        @if(Auth::check())
            <div class="col-md-3 text-end">
                <a href="{{ route('profile.show') }}" class="btn btn-primary text-white">Dashboard</a>
            </div>
        @else
        <div class="col-md-3 text-end">
            <a href="{{ url('/login') }}" class="btn btn-outline-primary me-2">Iniciar Sesión</a>
            <a href="{{ url('/register') }}" class="btn btn-primary text-white">Registrarse</a>
        </div>
        @endif
    </header>
</div>
