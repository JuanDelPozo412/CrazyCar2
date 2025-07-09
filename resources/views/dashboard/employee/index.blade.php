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

                @if ($role === 'admin')
                    <x-dashboard.admin-stats :clientes-count="$clientesCount" :consultas-count="$consultasCount" :inquiries-en-proceso-count="$inquiriesEnProcesoCount" :empleados-count="$empleadosCount"
                        :mantenimientos-count="$mantenimientosCount" :vehicles-for-sale-count="$vehiclesForSaleCount" :reservas-aprobadas-count="$reservasAprobadasCount" :reservas-rechazadas-count="$reservasRechazadasCount" :reservas-pendientes-count="$reservasPendientesCount"
                        :consultas-finalizadas-count="$consultasFinalizadasCount" :finalizadas-mensuales="$finalizadasMensuales" :en-proceso-mensuales="$enProcesoMensuales" />
                @elseif ($role === 'empleado')
                    <x-dashboard.employee-stats :mis-consultas-en-proceso-count="$misConsultasEnProcesoCount" :mis-consultas-finalizadas-total-count="$misConsultasFinalizadasTotalCount" :mis-finalizadas-mensuales="$misFinalizadasMensuales"
                        :mis-en-proceso-mensuales="$misEnProcesoMensuales" />
                @endif

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
