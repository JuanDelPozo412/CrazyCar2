<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

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

    <x-home.carousel />

    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold text-body-emphasis">MÁS ECONÓMICOS</h1>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            @foreach ($vehiculosEconomicos as $vehiculo)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/vehiculos/' . $vehiculo->imagen) }}" class="card-img-top"
                            alt="{{ $vehiculo->marca }} {{ $vehiculo->modelo }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</h5>
                            <p class="card-text flex-grow-1">
                                Año: {{ $vehiculo->anio }}<br>
                                Color: {{ $vehiculo->color }}<br>
                                Combustible: {{ $vehiculo->combustible }}<br>
                                Precio: ${{ number_format($vehiculo->precio, 2, ',', '.') }}
                            </p>
                            <button type="button" class="btn btn-primary mt-auto" data-bs-toggle="modal"
                                data-bs-target="#userVehicleDetailModal{{ $vehiculo->id }}">
                                Ver más
                            </button>
                        </div>
                    </div>

                    <x-user-vehicles-details.user-vehicle-detail-modal :vehicle="$vehiculo" />
                </div>
            @endforeach
        </div>
    </div>


    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold text-body-emphasis">MÁS VENDIDOS</h1>
    </div>

    <div class="container marketing">
    @foreach ($vehiculosMasVendidos as $vehiculo)
        <x-home.top-selling 
            :id="$vehiculo->id"
            :title="$vehiculo->marca . ' ' . $vehiculo->modelo"
            :subtitle="'¡Nuestro destacado en ' . $vehiculo->tipo . '!'"
            description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor."
            :image="'storage/vehiculos/' . $vehiculo->imagen"
            :alt="$vehiculo->marca . ' ' . $vehiculo->modelo"
            :link="'#userVehicleDetailModal' . $vehiculo->id"
            :imagePosition="$loop->iteration % 2 === 0 ? 'left' : 'right'"
        />

        <x-user-vehicles-details.user-vehicle-detail-modal :vehicle="$vehiculo" />

        <hr class="featurette-divider" />
    @endforeach
</div>

    <x-layout.footer />

</body>

</html>
