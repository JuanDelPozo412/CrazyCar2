@props([
    'inquiries' => [],
    'title' => 'Listado de Consultas',
    'searchPlaceholder' => 'Buscar consulta...',
    'tableId' => 'inquiries-table',
    'initialDisplayCount' => 6,
])

<div class="d-flex justify-content-between align-items-center mb-3 mt-3 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-100 justify-content-center justify-content-sm-end mt-3 mt-sm-0">
        <form method="GET" action="{{ route('clientes') }}" class="input-group w-auto">
            <input type="text" name="busqueda_consulta" class="form-control" placeholder="{{ $searchPlaceholder }}"
                value="{{ request('busqueda_consulta') }}" aria-label="{{ $searchPlaceholder }}"
                aria-describedby="search-addon-{{ $tableId }}" />

            <button type="submit" class="input-group-text" id="search-addon-{{ $tableId }}">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table id="{{ $tableId }}" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Cliente</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Horario</th>
                <th>Empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $index => $consulta)
                <tr @class([
                    'hidden-inquiry-row d-none' => $index >= $initialDisplayCount,
                ])>
                    <td>{{ $consulta->cliente?->name ?? 'No asignado' }}</td>
                    <td>{{ $consulta->cliente?->apellido ?? 'No asignado' }}</td>
                    <td>{{ $consulta->cliente?->email ?? 'No asignado' }}</td>
                    <td>{{ $consulta->tipo }}</td>
                    <td>{{ $consulta->estado ? 'Finalizado' : 'Pendiente' }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->horario)->format('H:i') ?? 'No asignado' }}</td>
                    <td>{{ $consulta->empleado?->name ?? 'No asignado' }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm text-white" style="background-color: rgba(23, 162, 184, 0.9)"
                            data-bs-toggle="modal" data-bs-target="#inquiryDetail{{ $consulta->id }}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteInquiry" data-id="{{ $consulta->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <x-dashboard.consulta-modal :consulta="$consulta" />
            @empty
                <tr>
                    <td colspan="8" class="text-center">No hay consultas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if (count($inquiries) > $initialDisplayCount)
    <div class="text-center mt-2">
        <button id="toggle-inquiries-btn" class="btn btn-primary text-white" type="button">
            Mostrar más consultas
        </button>
    </div>
@endif

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggle-inquiries-btn');
            let expanded = false;

            toggleButton?.addEventListener('click', function() {
                const rows = document.querySelectorAll('.hidden-inquiry-row');

                rows.forEach(row => row.classList.toggle('d-none'));

                expanded = !expanded;
                toggleButton.textContent = expanded ? 'Ocultar consultas' : 'Mostrar más consultas';
            });
        });
    </script>
@endpush
