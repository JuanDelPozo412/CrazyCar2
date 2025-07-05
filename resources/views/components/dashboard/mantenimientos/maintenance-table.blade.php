@props(['mantenimientos'])

<div class="mb-4">
    <h4 class="text-center text-sm-start w-100">Filtrar Mantenimientos</h4>

    <form method="GET" action="{{ route('vehiculos') }}"
        class="row gy-3 gx-3 align-items-center justify-content-between">

        <div class="col-12 col-md-4">
            <input type="search" name="busqueda_mantenimiento"
                class="form-control border-0 bg-light px-4 py-2 rounded-pill"
                placeholder="Buscar por patente, motivo o cliente" value="{{ request('busqueda_mantenimiento') }}" />
        </div>

        <div class="col-12 col-md-3">
            <select name="estado" class="form-select border-0 bg-light px-4 py-2 rounded-pill">
                <option value="" hidden>Estado</option>
                <option value="">Todos</option>
                <option value="Nuevo" {{ request('estado') == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                <option value="En Proceso" {{ request('estado') == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                <option value="Finalizado" {{ request('estado') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select>
        </div>

        <div class="col-auto d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">Filtrar</button>
            <a href="{{ route('vehiculos') }}"
                class="btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm">Limpiar</a>
        </div>
    </form>
</div>


<div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Usuario</th>
                <th>Patente</th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mantenimientos as $index => $mantenimiento)
                @php
                    $usuario = $mantenimiento->usuario;
                    $badge = match ($mantenimiento->estado) {
                        'Nuevo' => '<span class="badge bg-danger">Nuevo</span>',
                        'En Proceso' => '<span class="badge bg-warning text-white">En Proceso</span>',
                        'Finalizado' => '<span class="badge bg-success">Finalizado</span>',
                        default => '<span class="badge bg-secondary">Desconocido</span>',
                    };
                @endphp
                <tr @class(['hidden-maintenance-row d-none' => $index >= 6])>
                    <td>{{ $usuario ? $usuario->name . ' ' . $usuario->apellido : 'Sin usuario' }}</td>
                    <td>{{ $mantenimiento->patente ?? 'N/A' }}</td>
                    <td>{{ $mantenimiento->motivo }}</td>
                    <td>{!! $badge !!}</td>
                    <td>{{ $mantenimiento->fecha_inicio ? \Carbon\Carbon::parse($mantenimiento->fecha_inicio)->format('d/m/Y') : '—' }}
                    </td>
                    <td>{{ $mantenimiento->fecha_fin ? \Carbon\Carbon::parse($mantenimiento->fecha_fin)->format('d/m/Y') : '— En curso —' }}
                    </td>
                    <td class="text-center">
                        <x-dashboard.action-buttons :maintenance="$mantenimiento" />
                    </td>
                </tr>
                <x-dashboard.mantenimientos.maintenance-detail-modal :maintenance="$mantenimiento" />
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay mantenimientos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if (count($mantenimientos) > 6)
    <div class="text-center mt-3">
        <button id="toggle-maintenance-btn" class="btn text-white" style="background-color: rgba(13, 110, 253, 0.8)"
            type="button">
            Mostrar más mantenimientos
        </button>
    </div>
@endif

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleMaintenanceButton = document.getElementById('toggle-maintenance-btn');
            let maintenanceExpanded = false;

            toggleMaintenanceButton?.addEventListener('click', function() {
                const maintenanceRows = document.querySelectorAll('.hidden-maintenance-row');
                maintenanceRows.forEach(row => row.classList.toggle('d-none'));

                maintenanceExpanded = !maintenanceExpanded;
                toggleMaintenanceButton.textContent = maintenanceExpanded ?
                    'Ocultar mantenimientos' :
                    'Mostrar más mantenimientos';
            });
        });
    </script>
@endpush
