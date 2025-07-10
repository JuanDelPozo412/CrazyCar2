@props(['chartId', 'title', 'labels', 'data', 'colors', 'datasetLabel' => 'Datos'])

<div class="card shadow-sm rounded-4 mb-4">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>

        <div style="height: 350px; position: relative;">
            <canvas id="{{ $chartId }}"></canvas>
        </div>
    </div>
</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx{{ ucfirst(Str::camel($chartId)) }} = document.getElementById('{{ $chartId }}')
                .getContext('2d');
            const data{{ ucfirst(Str::camel($chartId)) }} = {!! json_encode($data) !!};
            const labels{{ ucfirst(Str::camel($chartId)) }} = {!! json_encode($labels) !!};
            const colors{{ ucfirst(Str::camel($chartId)) }} = {!! json_encode($colors) !!};

            new Chart(ctx{{ ucfirst(Str::camel($chartId)) }}, {
                type: 'pie',
                data: {
                    labels: labels{{ ucfirst(Str::camel($chartId)) }},
                    datasets: [{
                        label: @json($datasetLabel),
                        data: data{{ ucfirst(Str::camel($chartId)) }},
                        backgroundColor: colors{{ ucfirst(Str::camel($chartId)) }},
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // 👈 Esto es clave
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: '{{ $title }}'
                        }
                    }
                }
            });
        });
    </script>
@endpush
