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
            <span class="navbar-brand mb-0 fs-4">Empleado</span>
        </div>
    </nav>

    <div class="container-fluid flex-grow-1">
        <div class="row flex-nowrap min-vh-100">

            <x-dashboard.navbar :name="$name" :role="$role" />

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="row align-items-center mb-5" style="min-height: 170px">
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <div>
                            <h2 class="mb-2">Panel Clientes</h2>
                            <p class="mb-3">Bienvenido {{ $name }}</p>

                            <button type="button" class="btn mb-3 text-white"
                                style="background-color: rgba(13, 110, 253, 0.8)" data-bs-toggle="modal"
                                data-bs-target="#createClientModal">
                                <i class="bi bi-person-plus me-2"></i> Crear Cliente
                            </button>
                            <button type="button" class="btn mb-3 text-white"
                                style="background-color: rgba(23, 162, 184, 0.9)" data-bs-toggle="modal"
                                data-bs-target="#createInquiryModal">
                                <i class="bi bi-chat-dots"></i> Crear Consulta
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="row g-2">
                            <x-dashboard.stat-card icon="bi bi-person-fill" label="Cantidad de Clientes"
                                :value="$clientesCount" color="rgba(13, 110, 253, 0.8)" href="#vehiclesQuantity" />

                            <x-dashboard.stat-card icon="bi bi-chat-dots" label="Consultas Activas" :value="$consultasCount"
                                color="rgba(23, 162, 184, 0.9)" href="#vehiclesMaintenance" />

                        </div>
                    </div>

                </div>

                <x-dashboard.client-table :clients="$clients" title="Clientes registrados"
                    searchPlaceholder="Buscar por nombre, apellido o DNI" tableId="tabla-clientes" />

                <x-dashboard.inquiry-table :inquiries="$inquiries" title="Lista de Consultas"
                    searchPlaceholder="Buscar Cliente" tableId="inquiry" />

            </main>

            <x-dashboard.delete-modal id="confirmDeleteInquiry"
                message="¿Está seguro de que desea eliminar esta consulta?" />

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const modalInquiry = document.getElementById('confirmDeleteInquiry');
        modalInquiry?.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const inquiryId = button.getAttribute('data-id');
            const form = modalInquiry.querySelector('form');

            form.action = `/dashboard/employee/consultas/${inquiryId}`;
        });
    </script>

    @stack('scripts')
</body>

</html>
