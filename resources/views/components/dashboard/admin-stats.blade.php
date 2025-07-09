@php
    $reservasLabels = ['Aprobadas', 'Rechazadas', 'Pendientes'];
    $reservasData = [$reservasAprobadasCount, $reservasRechazadasCount, $reservasPendientesCount];
    $reservasColors = ['rgba(40, 167, 69, 0.8)', 'rgba(220, 53, 69, 0.8)', 'rgba(255, 193, 7, 0.8)'];
@endphp

<div class="row mb-4">
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-person-circle" label="Total Clientes" :value="$clientesCount"
            color="rgba(54, 162, 235, 0.8)" />
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-person-badge" label="Total Empleados" :value="$empleadosCount"
            color="rgba(255, 99, 132, 0.8)" />
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-clipboard-data" label="Consultas Totales" :value="$consultasCount"
            color="rgba(255, 206, 86, 0.8)" />
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-arrow-repeat" label="Consultas En Proceso" :value="$inquiriesEnProcesoCount"
            color="rgba(75, 192, 192, 0.8)" />
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-tools" label="Mantenimientos Totales" :value="$mantenimientosCount"
            color="rgba(153, 102, 255, 0.8)" />
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-car-front" label="Vehículos a la Venta" :value="$vehiclesForSaleCount"
            color="rgba(255, 159, 64, 0.8)" />
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-check-circle" label="Reservas Aprobadas" :value="$reservasAprobadasCount"
            color="rgba(40, 167, 69, 0.8)" />
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-x-circle" label="Reservas Rechazadas" :value="$reservasRechazadasCount"
            color="rgba(220, 53, 69, 0.8)" />
    </div>
    <div class="col-md-6 col-lg-3 mb-3">
        <x-dashboard.stat-card icon="bi bi-hourglass-split" label="Reservas Pendientes" :value="$reservasPendientesCount"
            color="rgba(255, 193, 7, 0.8)" />
    </div>
</div>

<div class="row mb-4">
    {{-- <div class="col-md-6 mb-4 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <x-dashboard.dashboard-chart-circle chartId="proporcionConsultasChart" title="Proporción de Consultas"
                    :labels="['En Proceso', 'Finalizadas']" :data="[$consultasEnProcesoCount, $consultasFinalizadasCount]" :colors="['rgba(255, 159, 64, 0.8)', 'rgba(23, 162, 184, 0.8)']" />
            </div>
        </div>
    </div> --}}

    <div class="col-md-12 mb-4 d-flex flex-row justify-content-between">
        <div class="col-6 px-2">
            <x-dashboard.dashboard-charts chartId="consultasFinalizadasChart" title="Consultas Finalizadas (Mensual)"
                label="Consultas Finalizadas" :data="$finalizadasMensuales" color="rgba(23, 162, 184, 0.9)" />
        </div>
        <div class="col-6 px-2">
            <x-dashboard.dashboard-charts chartId="consultasEnProcesoChart" title="Consultas En Proceso (Mensual)"
                label="Consultas En Proceso" :data="$enProcesoMensuales" color="rgba(255, 159, 64, 0.9)" />
        </div>
    </div>

    <div class="col-6 px-2">
        <x-dashboard.dashboard-chart-circle chartId="reservasChart" title="Estado de Reservas" :labels="$reservasLabels"
            :data="$reservasData" :colors="$reservasColors" />
    </div>



</div>
