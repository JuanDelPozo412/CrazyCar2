@props([
    'vehicles' => [],
    'title' => 'Vehículos en Mantenimiento',
    'searchPlaceholder' => 'Buscar vehículo en mantenimiento...',
    'tableId' => 'vehicles-maintenance-table',
])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-100 justify-content-center justify-content-sm-end mt-3 mt-sm-0">
        <form method="GET" action="{{ route('vehiculos') }}" class="input-group w-auto">
            <input type="text" name="busqueda_mantenimiento" class="form-control"
                placeholder="{{ $searchPlaceholder }}"
                value="{{ request('busqueda_mantenimiento') }}"
                aria-label="{{ $searchPlaceholder }}"
                aria-describedby="search-addon-{{ $tableId }}" />

            <button type="submit" class="input-group-text" id="search-addon-{{ $tableId }}">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</div>

<div class="table-responsive mb-5">
    <table id="{{ $tableId }}" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Patente</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Color</th>
                <th>Año</th>
                <th>Combustible</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->patente }}</td>
                    <td>{{ $vehicle->marca }}</td>
                    <td>{{ $vehicle->modelo }}</td>
                    <td>{{ $vehicle->tipo }}</td>
                    <td>{{ $vehicle->color }}</td>
                    <td>{{ $vehicle->año }}</td>
                    <td>{{ $vehicle->combustible }}</td>
                    <td>
                        @switch($vehicle->estado)
                            @case('Pendiente')
                                <span class="badge bg-danger text-white">Pendiente</span>
                                @break
                            @case('En Proceso')
                                <span class="badge bg-warning text-white">En Proceso</span>
                                @break
                            @case('Completado')
                                <span class="badge bg-success">Completado</span>
                                @break
                            @default
                                {{ $vehicle->estado }}
                        @endswitch
                    </td>
                    <td>
                        <x-dashboard.action-buttons :vehicle="$vehicle" maintenance />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No hay vehículos en mantenimiento.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
