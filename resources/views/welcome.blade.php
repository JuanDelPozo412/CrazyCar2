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
                        <button type="button" class="btn btn-primary mt-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#userVehicleDetailModal{{ $vehiculo->id }}">
                            Ver más
                        </button>
                    </div>
                </div>

                {{-- modal para cada vehiculo --}}
                <x-user-vehicles-details.user-vehicle-detail-modal :vehicle="$vehiculo" />
            </div>
        @endforeach
            <!--
            <x-home.offer-card :image="'images/volkswagen-polo-track.jpg'" alt="Volkswagen Polo Track" title="Volkswagen Polo Track"
                description="Eficiencia, estilo y confiabilidad. Ideal para la ciudad." price-old="$9.900.000"
                price-new="$8.790.000" link="#" />

            <x-home.offer-card :image="'images/Chevrolet-onix-joy.jpg'" alt="Chevrolet Onix Joy" title="Chevrolet Onix Joy"
                description="Tecnología y economía para el día a día." price-old="$8.500.000" price-new="$7.590.000"
                link="#" />
            <x-home.offer-card :image="'images/volkswagen-Amarok.jpg'" alt="Chevrolet Onix Joy" title="Chevrolet Onix Joy"
                description="Tecnología y economía para el día a día." price-old="$8.500.000" price-new="$7.590.000"
                link="#" />
            -->
        </div>
    </div>


    <div class="px-4 pt-5 my-5 text-center border-bottom">
        <h1 class="display-4 fw-bold text-body-emphasis">MÁS VENDIDOS</h1>
    </div>

    <div class="container marketing">
        <x-home.top-selling title="Chevrolet Tracker" subtitle="Ágil, moderno y conectado."
            description="La Chevrolet Tracker es una SUV compacta que combina diseño urbano con tecnología avanzada..."
            image="images/Chevrolet-Tracker.jpg" alt="Chevrolet Tracker" link="#" image-position="right" />

        <hr class="featurette-divider" />

        <x-home.top-selling title="Volkswagen Amarok" subtitle="Potencia que impone respeto."
            description="La Volkswagen Amarok es una pickup robusta con alma de todo terreno..."
            image="images/Volkswagen-Amarok.jpg" alt="Volkswagen Amarok" link="#" image-position="left" />

        <hr class="featurette-divider" />

        <x-home.top-selling title="Chevrolet Cruze" subtitle="Elegancia y eficiencia en cada viaje."
            description="El Chevrolet Cruze es un sedán moderno que combina diseño aerodinámico, tecnología avanzada..."
            image="images/Chevrolet-Cruze.webp" alt="Chevrolet Cruze" link="#" image-position="right" />
    </div>

    <x-layout.footer />

</body>

</html>
