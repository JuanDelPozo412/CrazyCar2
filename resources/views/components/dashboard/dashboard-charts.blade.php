@props(['chartId', 'title', 'label', 'data', 'color'])

<div class="card shadow-sm rounded-4 mb-4">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <canvas id="{{ $chartId }}" height="120"></canvas>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx{{ ucfirst(Str::camel($chartId)) }} = document.getElementById('{{ $chartId }}')
                .getContext('2d');
            const data{{ ucfirst(Str::camel($chartId)) }} = {!! json_encode($data) !!};

            new Chart(ctx{{ ucfirst(Str::camel($chartId)) }}, {
                type: 'bar',
                data: {
                    labels: [
                        'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                        'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                    ],
                    datasets: [{
                        label: '{{ $label }}',
                        data: data{{ ucfirst(Str::camel($chartId)) }},
                        backgroundColor: '{{ $color }}',
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
        });
    </script>
@endpush
