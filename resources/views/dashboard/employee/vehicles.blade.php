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

    <nav class="navbar navbar-dark bg-dark d-md-none">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand mb-0 fs-4 text-capitalize">{{ $role }}</span>
        </div>
    </nav>

    <div class="container-fluid flex-grow-1">
        <div class="row flex-nowrap min-vh-100">

            <x-dashboard.navbar :name="$name" :role="$role" />

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="row align-items-center mb-5" style="min-height: 170px">
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <div>
                            <h2 class="mb-2">Panel Vehículos</h2>
                            <p class="mb-3 fs5">Bienvenido {{ $name }}</p>

                            <button type="button" class="btn mb-3 text-white"
                                style="background-color: rgba(13, 110, 253, 0.8)" data-bs-toggle="modal"
                                data-bs-target="#createVehicleModal">
                                <i class="bi bi-plus-circle me-2"></i> Crear Vehículo
                            </button>
                            <button type="button" class="btn mb-3 text-white"
                                style="background-color: rgba(23, 162, 184, 0.9)" data-bs-toggle="modal"
                                data-bs-target="#createMaintenanceModal">
                                <i class="bi bi-tools me-2"></i> Crear Mantenimiento
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="row g-2">
                            <x-dashboard.stat-card icon="bi-car-front-fill" label="Vehículos a la Venta"
                                :value="$vehiclesTotalCount" color="rgba(13, 110, 253, 0.8)" href="#vehiclesQuantity" />

                            <x-dashboard.stat-card icon="bi-tools" label="En Mantenimiento" :value="$mantenimientosTotales"
                                color="rgba(23, 162, 184, 0.9)" href="#vehiclesMaintenanceCount" />
                        </div>
                    </div>
                </div>

                <x-dashboard.vehiculos.vehicle-table :vehicles="$allVehicles" />

                <x-dashboard.mantenimientos.maintenance-table :mantenimientos="$mantenimientos" />



            </main>

            <x-dashboard.delete-modal id="confirmDeleteVehicle"
                message="¿Está seguro de que desea eliminar este Vehículo?" />

            <x-dashboard.delete-modal id="confirmDeleteMaintenance"
                message="¿Está seguro de que desea eliminar este Mantenimiento?" />

            <x-dashboard.vehiculos.create-vehicle-modal />
            <x-dashboard.mantenimientos.maintenance-create-modal :clients="$clients" />

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const modalVenta = document.getElementById('confirmDeleteVehicle');
        modalVenta?.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const vehicleId = button.getAttribute('data-id');
            const form = modalVenta.querySelector('form');
            form.action = `/dashboard/employee/vehicles/${vehicleId}`;
        });

        const modalMantenimiento = document.getElementById('confirmDeleteMaintenance');
        modalMantenimiento?.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const maintenanceId = button.getAttribute('data-id');
            const form = modalMantenimiento.querySelector('form');
            form.action = `/dashboard/employee/mantenimientos/${maintenanceId}`;
        });
    </script>

    @stack('scripts')
</body>

</html>
