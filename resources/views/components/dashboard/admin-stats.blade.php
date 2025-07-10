<div class="row g-4 mb-4">
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-person-circle" label="Total Clientes" :value="$stats['clientesCount']"
            color="rgba(54, 162, 235, 0.8)" />
    </div>
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-person-badge" label="Total Empleados" :value="$stats['empleadosCount']"
            color="rgba(255, 99, 132, 0.8)" />
    </div>
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-car-front" label="Vehículos a la Venta" :value="$stats['vehiclesForSaleCount']"
            color="rgba(255, 159, 64, 0.8)" />
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-clipboard-data" label="Consultas Totales" :value="$stats['consultasCount']"
            color="rgba(255, 206, 86, 0.8)" />
    </div>
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-arrow-repeat" label="Consultas En Proceso" :value="$stats['inquiriesEnProcesoCount']"
            color="rgba(75, 192, 192, 0.8)" />
    </div>
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-tools" label="Mantenimientos Totales" :value="$stats['mantenimientosCount']"
            color="rgba(153, 102, 255, 0.8)" />
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-check-circle" label="Reservas Aprobadas" :value="$stats['reservasAprobadasCount']"
            color="rgba(40, 167, 69, 0.8)" />
    </div>
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-x-circle" label="Reservas Rechazadas" :value="$stats['reservasRechazadasCount']"
            color="rgba(220, 53, 69, 0.8)" />
    </div>
    <div class="col-md-4">
        <x-dashboard.stat-card icon="bi bi-hourglass-split" label="Reservas Pendientes" :value="$stats['reservasPendientesCount']"
            color="rgba(255, 193, 7, 0.8)" />
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4 d-flex align-items-stretch mb-3">
        <div class="w-100">
            <x-dashboard.dashboard-chart-circle datasetLabel="Número de Reservas" chartId="reservasChart"
                title="Reservas por Estado (Totales)" :labels="$stats['reservasLabels']" :data="$stats['reservasData']" :colors="$stats['reservasColors']" />
        </div>
    </div>

    <div class="col-md-8 d-flex align-items-stretch mb-3">
        <div class="w-100">
            <x-dashboard.dashboard-multiple-bar :chartId="'consultasEstadosMensuales'" title="Consultas por Estado (Mensual)"
                :labels="['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']" :datasets="[
                    [
                        'label' => 'Nuevas',
                        'data' => $stats['nuevasMensuales'],
                        'backgroundColor' => 'rgba(255, 193, 7, 0.8)',
                    ],
                    [
                        'label' => 'En Proceso',
                        'data' => $stats['enProcesoMensuales'],
                        'backgroundColor' => 'rgba(75, 192, 192, 0.8)',
                    ],
                    [
                        'label' => 'Finalizadas',
                        'data' => $stats['finalizadasMensuales'],
                        'backgroundColor' => 'rgba(40, 167, 69, 0.8)',
                    ],
                ]" />
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <x-dashboard.dashboard-charts chartId="consultasFinalizadasChart" title="Consultas Finalizadas (Mensual)"
            label="Consultas Finalizadas" :data="$stats['finalizadasMensuales']" color="rgba(23, 162, 184, 0.9)" />
    </div>

    <div class="col-md-6 mb-3">
        <x-dashboard.dashboard-charts chartId="consultasEnProcesoChart" title="Consultas En Proceso (Mensual)"
            label="Consultas En Proceso" :data="$stats['enProcesoMensuales']" color="rgba(255, 159, 64, 0.9)" />
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-8 d-flex align-items-stretch mb-3">
        <div class="w-100">
            <x-dashboard.dashboard-multiple-bar :chartId="'reservasEstadosMensuales'" title="Reservas por Estado (Mensual)"
                :labels="['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']" :datasets="[
                    [
                        'label' => 'Aprobadas',
                        'data' => $stats['aprobadasMensuales'],
                        'backgroundColor' => 'rgba(40, 167, 69, 0.8)',
                    ],
                    [
                        'label' => 'Rechazadas',
                        'data' => $stats['rechazadasMensuales'],
                        'backgroundColor' => 'rgba(220, 53, 69, 0.8)',
                    ],
                    [
                        'label' => 'Pendientes',
                        'data' => $stats['pendientesMensuales'],
                        'backgroundColor' => 'rgba(255, 193, 7, 0.8)',
                    ],
                ]" />
        </div>
    </div>

    <div class="col-md-4 d-flex align-items-stretch mb-3">
        <div class="w-100">
            <x-dashboard.dashboard-chart-circle datasetLabel="Número de Reservas" chartId="reservasPorEstado"
                title="Reservas por Estado (Totales)" :labels="['Aprobadas', 'Rechazadas', 'Pendientes']" :data="[
                    $stats['reservasAprobadasCount'],
                    $stats['reservasRechazadasCount'],
                    $stats['reservasPendientesCount'],
                ]" :colors="['rgba(40, 167, 69, 0.8)', 'rgba(220, 53, 69, 0.8)', 'rgba(255, 193, 7, 0.8)']" />
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <x-dashboard.dashboard-charts chartId="reservasAprobadasChart" title="Reservas Aprobadas (Mensual)"
            label="Reservas Aprobadas" :data="$stats['aprobadasMensuales']" color="rgba(40, 167, 69, 0.8)" />
    </div>

    <div class="col-md-6 mb-3">
        <x-dashboard.dashboard-charts chartId="reservasPendientesChart" title="Reservas Pendientes (Mensual)"
            label="Reservas Pendientes" :data="$stats['pendientesMensuales']" color="rgba(255, 193, 7, 0.8)" />
    </div>
</div>
