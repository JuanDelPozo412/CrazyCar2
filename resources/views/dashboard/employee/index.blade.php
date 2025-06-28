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

                {{-- Fila de Tarjetas de Estadísticas --}}
                <div class="row mb-4">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <x-dashboard.stat-card icon="bi bi-arrow-right-circle" label="Mis Consultas En Proceso"
                            :value="$misConsultasEnProcesoCount" color="rgba(255, 159, 64, 0.8)" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <x-dashboard.stat-card icon="bi bi-check-circle" label="Mis Consultas Finalizadas"
                            :value="$misConsultasFinalizadasTotalCount" color="rgba(23, 162, 184, 0.8)" />
                    </div>
                </div>
                <div class="row mb-4">
                    {{-- Columna izquierda: un solo gráfico circular centrado --}}
                    <div class="col-md-6 d-flex">
                        <div class="w-100 h-100">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <div style="width: 100%; height: 100%;">
                                    <x-dashboard.dashboard-chart-circle chartId="proporcionConsultasChart"
                                        title="Proporción de Mis Consultas" :labels="['En Proceso', 'Finalizadas']" :data="[$misConsultasEnProcesoCount, $misConsultasFinalizadasTotalCount]"
                                        :colors="['rgba(255, 159, 64, 0.8)', 'rgba(23, 162, 184, 0.8)']" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column justify-content-between">
                        <x-dashboard.dashboard-charts chartId="misConsultasFinalizadasChart"
                            title="Mis Consultas Finalizadas (Mensual)" label="Mis Consultas Finalizadas"
                            :data="$misFinalizadasMensuales" color="rgba(23, 162, 184, 0.9)" />

                        <x-dashboard.dashboard-charts chartId="misConsultasEnProcesoChart"
                            title="Mis Consultas En Proceso (Mensual)" label="Mis Consultas En Proceso"
                            :data="$misEnProcesoMensuales" color="rgba(255, 159, 64, 0.9)" />
                    </div>
                </div>
        </div>
    </div>


    </main>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
