@props(['consultasMensuales'])

<div class="card shadow-sm rounded-4 mb-4">
    <div class="card-body">
        <h5 class="card-title">Consultas Finalizadas</h5>
        <canvas id="consultasChart" height="100"></canvas>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxConsultas = document.getElementById('consultasChart').getContext('2d');
        const consultasMensuales = {!! $consultasMensuales !!};

        const consultasChart = new Chart(ctxConsultas, {
            type: 'bar',
            data: {
                labels: [
                    'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                ],
                datasets: [{
                    label: 'Consultas Tomadas',
                    data: consultasMensuales,
                    backgroundColor: 'rgba(23, 162, 184, 0.9)',
                    borderRadius: 5,
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    },
                },
            },
        });
    </script>
@endpush
