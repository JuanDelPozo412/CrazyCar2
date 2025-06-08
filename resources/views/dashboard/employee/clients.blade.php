<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Empleado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>

<body class="min-vh-100 d-flex flex-column">
    <div class="container-fluid flex-grow-1">
        <div class="row flex-nowrap min-vh-100">

            <x-dashboard.navbar :name="$name" :role="$role" />

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="row align-items-center mb-5" style="min-height: 170px">
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <div>
                            <h2 class="mb-2">Panel Clientes</h2>
                            <p class="mb-3">Bienvenido {{ $name }}</p>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="row g-2">
                            <x-dashboard.stat-card icon="bi bi-person-fill" label="Cantidad de Clientes" value="250"
                                color="rgba(13, 110, 253, 0.8)" href="#vehiclesQuantity" />

                            <x-dashboard.stat-card icon="bi bi-chat-dots" label="Cantidad de Consultas" value="35"
                                color="rgba(23, 162, 184, 0.9)" href="#vehiclesMaintenance" />
                        </div>
                    </div>

                </div>

                <x-dashboard.client-table :clients="$clients" title="Clientes registrados"
                    searchPlaceholder="Buscar por nombre, apellido o DNI" tableId="tabla-clientes" />

                <x-dashboard.inquiry-table :inquiries="$inquiries" title="Lista de Consultas"
                    searchPlaceholder="Buscar Cliente" tableId="inquiry" />

            </main>

            <x-dashboard.delete-modal id="confirmDeleteClient"
                message="¿Está seguro de que desea eliminar este Cliente?" />

            <x-dashboard.delete-modal id="confirmDeleteInquiry"
                message="¿Está seguro de que desea eliminar esta Consulta?" />
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</div>
</div>
</body>

</html>
