<footer class="py-3 my-4">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link px-2 text-body-secondary">Inicio</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/galeria') }}" class="nav-link px-2 text-body-secondary">Galería</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/servicios') }}" class="nav-link px-2 text-body-secondary">Servicios</a>
        </li>

        @guest
            <li class="nav-item">
                <a href="{{ route('guest.consultas.create') }}" class="nav-link px-2 text-body-secondary">Contacto</a>
            </li>
        @endguest
    </ul>
    <hr class="featurette-divider" />
    <p class="text-center text-body-secondary">© 2025 Crazy Cars</p>
</footer>
