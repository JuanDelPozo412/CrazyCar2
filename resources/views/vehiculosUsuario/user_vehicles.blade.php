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

    <div class="container my-5">

        @foreach ($vehiculosPorTipo as $tipo => $vehiculos)
            <div class="px-4 pt-5 my-5 text-center border-bottom">
                <h1 class="display-4 fw-bold text-body-emphasis">{{ $tipo }}</h1>
            </div>

            <div class="row g-4">
                @foreach ($vehiculos as $vehiculo)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/vehiculos/' . $vehiculo->imagen) }}" class="card-img-top"
                                alt="{{ $vehiculo->marca }} {{ $vehiculo->modelo }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</h5>
                                <p class="card-text">
                                    Año: {{ $vehiculo->anio }} <br>
                                    Color: {{ $vehiculo->color }} <br>
                                    Combustible: {{ $vehiculo->combustible }} <br>
                                    Precio: ${{ number_format($vehiculo->precio, 2) }}
                                </p>
                                <button type="button" class="btn btn-primary"data-bs-toggle="modal"
                                    data-bs-target="#userVehicleDetailModal{{ $vehiculo->id }}">Ver más</button>
                            </div>
                        </div>
                        <x-user-vehicles-details.user-vehicle-detail-modal :vehicle="$vehiculo" />
                    </div>
                @endforeach
            </div>
        @endforeach

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
