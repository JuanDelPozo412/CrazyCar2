<div class="row mb-4">
    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <x-dashboard.stat-card icon="bi bi-arrow-right-circle" label="Mis Consultas En Proceso" :value="$stats['misConsultasEnProcesoCount']"
            color="rgba(255, 159, 64, 0.8)" />
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <x-dashboard.stat-card icon="bi bi-check-circle" label="Mis Consultas Finalizadas" :value="$stats['misConsultasFinalizadasTotalCount']"
            color="rgba(23, 162, 184, 0.8)" />
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6 d-flex align-items-stretch mb-3">
        <div class="w-100">
            <x-dashboard.dashboard-chart-circle datasetLabel="Número de Consultas" chartId="proporcionConsultasChart"
                title="Proporción de Mis Consultas" :labels="['En Proceso', 'Finalizadas']" :data="[$stats['misConsultasEnProcesoCount'], $stats['misConsultasFinalizadasTotalCount']]" :colors="['rgba(255, 159, 64, 0.8)', 'rgba(23, 162, 184, 0.8)']" />
        </div>
    </div>

    <div class="col-md-6 d-flex align-items-stretch mb-3">
        <div class="w-100">
            <x-dashboard.dashboard-multiple-bar :chartId="'misConsultasEstadosMensuales'" title="Mis Consultas por Estado (Mensual)"
                :labels="['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']" :datasets="[
                    [
                        'label' => 'Finalizadas',
                        'data' => $stats['misFinalizadasMensuales'],
                        'backgroundColor' => 'rgba(23, 162, 184, 0.8)',
                    ],
                    [
                        'label' => 'En Proceso',
                        'data' => $stats['misEnProcesoMensuales'],
                        'backgroundColor' => 'rgba(255, 159, 64, 0.8)',
                    ],
                ]" />
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6 d-flex flex-column justify-content-between">
        <x-dashboard.dashboard-charts chartId="misConsultasFinalizadasChart" title="Mis Consultas Finalizadas (Mensual)"
            label="Mis Consultas Finalizadas" :data="$stats['misFinalizadasMensuales']" color="rgba(23, 162, 184, 0.9)" />
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-between">
        <x-dashboard.dashboard-charts chartId="misConsultasEnProcesoChart" title="Mis Consultas En Proceso (Mensual)"
            label="Mis Consultas En Proceso" :data="$stats['misEnProcesoMensuales']" color="rgba(255, 159, 64, 0.9)" />
    </div>
</div>
