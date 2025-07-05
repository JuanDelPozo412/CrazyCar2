<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./css/style.css" />
    <title>Crazy Cars</title>
</head>

<body>
    <x-home.navbar />

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner-Tracker.webp') }}" class="d-block w-100"
                    alt="Servicios banner Postventa" />
                <div class="carousel-caption d-none d-md-block">
                    <h4>Postventa Crazy Cars</h4>
                    <p>Vos te renovás, tu auto tambien.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/servicio-mantenimiento.webp') }}" class="d-block w-100"
                    alt="Servicios banner Taller" />
                <div class="carousel-caption d-none d-md-block">
                    <h4>Reparaciones</h4>
                    <p>Dale el mejor mantenimiento a tu coche.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/servicio-3.jpg') }}" class="d-block w-100"
                    alt="Servicios banner Mantenimiento" />
                <div class="carousel-caption d-none d-md-block">
                    <h4>Mantenimiento</h4>
                    <p>Ahorrate dolores de cabeza.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!--Sucursales-->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold text-body-emphasis">Nuestras sucursales</h1>
    </div>

    <div class="container marketing">
        <hr class="featurette-divider" />

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">
                    Av. La plata 283 <span class="text-body-secondary">Caballito</span>
                </h2>
                <p class="lead">
                    crazycarscaba@gmail.com <br />
                    (011) 1234 5678 <br />
                    Horarios de atencion:<br />
                    Lunes a Viernes de 8 a 18 hs.
                </p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="{{ asset('images/Sucursal1.jpg') }}" class="featurette-image img-fluid mx-auto" width="500"
                    height="500" alt="Sucursal 1 Caballito" />
            </div>
        </div>

        <hr class="featurette-divider" />

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading fw-normal lh-1">
                    Av. Hipólito Yrigoyen 800
                    <span class="text-body-secondary">Morón</span>
                </h2>
                <p class="lead">
                    crazycarsmoron@gmail.com <br />
                    (011) 9876 5432 <br />
                    Horarios de atencion:<br />
                    Lunes a Viernes de 8 a 18 hs.
                </p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="{{ asset('images/Sucursal2.jpg') }}" class="featurette-image img-fluid mx-auto" width="500"
                    height="500" alt="Sucursal 2 Moron" />
            </div>
        </div>

        <hr class="featurette-divider" />
    </div>

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
            <li class="nav-item">
                <a href="{{ route('guest.consultas.create') }}" class="nav-link px-2 text-body-secondary">Contacto</a>
            </li>
        </ul>
        <hr class="featurette-divider" />
        <p class="text-center text-body-secondary">© 2025 Crazy Cars</p>
    </footer>
</body>

</html>
