<div class="row mb-4">
    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <x-dashboard.stat-card icon="bi bi-arrow-right-circle" label="Mis Consultas En Proceso" :value="$misConsultasEnProcesoCount"
            color="rgba(255, 159, 64, 0.8)" />
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <x-dashboard.stat-card icon="bi bi-check-circle" label="Mis Consultas Finalizadas" :value="$misConsultasFinalizadasTotalCount"
            color="rgba(23, 162, 184, 0.8)" />
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-6 d-flex">
        <div class="w-100 h-100">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div style="width: 100%; height: 100%;">
                    <x-dashboard.dashboard-chart-circle chartId="proporcionConsultasChart"
                        title="Proporción de Mis Consultas" :labels="['En Proceso', 'Finalizadas']" :data="[$misConsultasEnProcesoCount, $misConsultasFinalizadasTotalCount]" :colors="['rgba(255, 159, 64, 0.8)', 'rgba(23, 162, 184, 0.8)']" />
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 d-flex flex-column justify-content-between">
        <x-dashboard.dashboard-charts chartId="misConsultasFinalizadasChart" title="Mis Consultas Finalizadas (Mensual)"
            label="Mis Consultas Finalizadas" :data="$misFinalizadasMensuales" color="rgba(23, 162, 184, 0.9)" />

        <x-dashboard.dashboard-charts chartId="misConsultasEnProcesoChart" title="Mis Consultas En Proceso (Mensual)"
            label="Mis Consultas En Proceso" :data="$misEnProcesoMensuales" color="rgba(255, 159, 64, 0.9)" />
    </div>
</div>
