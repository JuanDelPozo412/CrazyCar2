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

            <x-dashboard.navbar name="Marcos Gutierrez" role="Empleado" />

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="row align-items-center mb-5" style="min-height: 170px">
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <div>
                            <h2 class="mb-2">Panel Vehículos</h2>
                            <p class="mb-3">Bienvenido Marcos Gutierrez</p>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="row g-2">
                            <x-dashboard.stat-card icon="bi-car-front-fill" label="Vehículos a la Venta" value="120"
                                color="rgba(13, 110, 253, 0.8)" href="#vehiclesQuantity" />

                            <x-dashboard.stat-card icon="bi-tools" label="En Mantenimiento" value="18"
                                color="rgba(23, 162, 184, 0.9)" href="#vehiclesMaintenance" />
                        </div>
                    </div>
                </div>

                <x-dashboard.vehicle-table title="Vehículos en Venta" searchPlaceholder="Buscar Vehículo"
                    tableId="vehiclesQuantity" :columns="[
                        'ID',
                        'Patente',
                        'Stock',
                        'Precio',
                        'Marca',
                        'Modelo',
                        'Tipo',
                        'Color',
                        'Año',
                        'Combustible',
                    ]" :vehicles="$vehiclesForSale" />

                <x-dashboard.vehicle-table title="Vehículos en Mantenimiento" searchPlaceholder="Buscar Mantenimiento"
                    tableId="vehiclesMaintenance" :columns="[
                        'ID',
                        'Patente',
                        'Marca',
                        'Modelo',
                        'Tipo',
                        'Color',
                        'Año',
                        'Motivo de Mantenimiento',
                        'Fecha de Inicio',
                        'Estado',
                    ]" :vehicles="$vehiclesInMaintenance" :maintenance="true" />
            </main>

            <x-dashboard.delete-modal id="confirmDeleteVehicle"
                message="¿Está seguro de que desea eliminar este Vehículo?" />

            <x-dashboard.delete-modal id="confirmDeleteMaintenance"
                message="¿Está seguro de que desea eliminar este Mantenimiento?" />
</body>

</html>
