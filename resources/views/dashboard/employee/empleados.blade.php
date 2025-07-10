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
                            <h2 class="mb-2">Panel Empleados</h2>
                            <p class="mb-3 fs5">Bienvenido {{ $name }}</p>

                            <button type="button" class="btn mb-3 text-white" style="background-color: #d63041"
                                data-bs-toggle="modal" data-bs-target="#createEmpleadoModal">
                                <i class="bi bi-plus-circle me-2"></i> Crear Empleado
                            </button>


                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <x-dashboard.stat-card icon="bi bi-person-fill" label="Cantidad de Empleados" :value="$empleadosCount"
                            color="#d63041" href="#EmpleadosQuantity" />
                    </div>
                </div>


                <x-dashboard.empleados-table :employees="$employees" title="Empleados registrados"
                    searchPlaceholder="Buscar por nombre, apellido o DNI" tableId="tabla-empleados" />

            </main>

            <x-dashboard.delete-modal id="confirmDeleteEmpleado"
                message="¿Está seguro de que desea eliminar este empleado?" />
        </div>
    </div>

    <x-dashboard.modal-create-empleado />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const modalEmpleado = document.getElementById('confirmDeleteEmpleado');
        modalEmpleado?.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const empleadoId = button.getAttribute('data-id');
            const form = modalEmpleado.querySelector('form');

            form.action = `/dashboard/employee/empleados/${empleadoId}`;
        });
    </script>



    @stack('scripts')
</body>

</html>
