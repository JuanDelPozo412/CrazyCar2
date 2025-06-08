@props(['name', 'role'])

<!-- Navbar mobile -->
<nav class="navbar navbar-dark bg-dark d-md-none">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand mb-0 h1">Empleado</span>
    </div>
</nav>

<!-- Sidebar Desktop -->
<nav class="col-md-3 col-lg-2 d-none d-md-flex bg-dark text-white sidebar p-0 flex-column min-vh-100">
    <div class="d-flex align-items-center gap-2 p-3 pb-3 flex-shrink-0">
        <i class="bi bi-person-circle fs-3"></i>
        <div>
            <strong>{{ $name }}</strong><br />
            <span class="badge bg-info">{{ $role }}</span>
        </div>
    </div>

    <div class="flex-grow-1 d-flex flex-column">
        <a href="{{ route('dashboard') }}"
            class="text-white py-2 px-3 d-flex align-items-center text-decoration-none active">
            <i class="bi bi-speedometer2 me-2"></i>
            Dashboard
        </a>
        <a href="{{ route('clientes') }}" class="text-white py-2 px-3 d-flex align-items-center text-decoration-none">
            <i class="bi bi-people-fill me-2"></i>
            Clientes
        </a>
        <a href="{{ route('vehiculos') }}" class="text-white py-2 px-3 d-flex align-items-center text-decoration-none">
            <i class="bi bi-truck-front-fill me-2"></i>
            Vehículos
        </a>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="mt-auto p-3">
        @csrf
        <button type="submit" class="btn btn-link text-white d-flex align-items-center w-100 text-start"
            style="text-decoration:none;">
            <i class="bi bi-box-arrow-right me-2"></i>
            <span class="small">Cerrar Sesión</span>
        </button>
    </form>
</nav>

<!-- Sidebar mobile -->
<div class="offcanvas offcanvas-start d-md-none bg-dark text-white" tabindex="-1" id="sidebarMenu"
    aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <div class="d-flex align-items-center gap-2 pt-3">
            <i class="bi bi-person-circle fs-3"></i>
            <div>
                <strong>{{ $name }}</strong><br />
                <span class="badge bg-info">{{ $role }}</span>
            </div>
        </div>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-2 text-decoration-none text-white">
            <i class="bi bi-speedometer2 me-2"></i>
            Dashboard
        </a>
        <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-white">
            <i class="bi bi-truck-front-fill me-2"></i>
            Vehículos
        </a>
        <a href="#" class="d-flex align-items-center mb-2 text-decoration-none text-white">
            <i class="bi bi-people-fill me-2"></i>
            Clientes
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-white d-flex align-items-center w-100 text-start"
                style="text-decoration:none;">
                <i class="bi bi-box-arrow-right me-2"></i>
                <span class="small">Cerrar Sesión</span>
            </button>
        </form>
    </div>
</div>
