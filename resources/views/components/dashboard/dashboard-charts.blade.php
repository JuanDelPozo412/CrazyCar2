<div class="card shadow-sm mb-4 rounded-4">
    <div class="card-body">
        <h5 class="card-title">Vehículos Vendidos por Mes</h5>
        <canvas id="salesChart" height="100"></canvas>
    </div>
</div>

<div class="card shadow-sm rounded-4 mb-4">
    <div class="card-body">
        <h5 class="card-title">Consultas Aceptadas</h5>
        <canvas id="consultasChart" height="100"></canvas>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxSales = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctxSales, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                datasets: [{
                    label: 'Vehículos Vendidos',
                    data: [12, 19, 8, 15, 20],
                    backgroundColor: 'rgba(13, 110, 253, 0.8)',
                    borderRadius: 5,
                }, ],
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
                            stepSize: 5
                        }
                    },
                },
            },
        });

        const ctxConsultas = document.getElementById('consultasChart').getContext('2d');
        const consultasChart = new Chart(ctxConsultas, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                datasets: [{
                    label: 'Consultas Tomadas',
                    data: [5, 9, 6, 8, 12],
                    backgroundColor: 'rgba(23, 162, 184, 0.9)',
                    borderRadius: 5,
                }, ],
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
                            stepSize: 2
                        }
                    },
                },
            },
        });
    </script>
@endpush
