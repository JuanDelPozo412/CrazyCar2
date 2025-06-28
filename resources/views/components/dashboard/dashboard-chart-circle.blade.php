@props(['chartId', 'title', 'labels', 'data', 'colors'])

<div class="card shadow-sm rounded-4 mb-4">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <canvas id="{{ $chartId }}" height="150"></canvas> {{-- Aumentamos la altura para mejor visibilidad --}}
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
                type: 'pie', // Tipo de gráfico: 'pie'
                data: {
                    labels: labels{{ ucfirst(Str::camel($chartId)) }},
                    datasets: [{
                        label: 'Número de Consultas',
                        data: data{{ ucfirst(Str::camel($chartId)) }},
                        backgroundColor: colors{{ ucfirst(Str::camel($chartId)) }},
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top', // Leyenda en la parte superior
                        },
                        title: {
                            display: false, // El título ya está en h5.card-title
                            text: '{{ $title }}'
                        }
                    }
                }
            });
        });
    </script>
@endpush
