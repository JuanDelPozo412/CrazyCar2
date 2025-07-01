@props(['vehicles'])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">Lista Vehículos</h4>

    <div class="d-flex gap-2 w-50 justify-content-center justify-content-sm-end mt-3 mt-sm-0 flex-wrap">
        <form method="GET" action="{{ route('vehiculos') }}" class="input-group" style="min-width: 100px;">
            <input type="text" name="busqueda_vehiculo" class="form-control" placeholder="Buscar vehículo..."
                value="{{ request('busqueda_vehiculo') }}" aria-label="Buscar vehículo..."
                aria-describedby="search-addon" />
            <button type="submit" class="input-group-text" id="search-addon">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</div>

<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Color</th>
            <th>Tipo</th>
            <th>Combustible</th>
            <th>Stock</th>
            <th>Precio</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->marca }}</td>
                <td>{{ $vehicle->modelo }}</td>
                <td>{{ $vehicle->anio }}</td>
                <td>{{ $vehicle->color }}</td>
                <td>{{ $vehicle->tipo }}</td>
                <td>{{ $vehicle->combustible }}</td>
                <td>{{ $vehicle->stock }}</td>
                <td>${{ number_format($vehicle->precio, 2, ',', '.') }}</td>
                <td class="text-center">
                    <x-dashboard.action-buttons :vehicle="$vehicle" />
                    <x-dashboard.vehicle-detail-modal :vehicle="$vehicle" modalId="vehicleDetailModal"
                        modalTitle="Detalles del Vehículo" />

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">No hay vehículos disponibles</td>
            </tr>
        @endforelse
    </tbody>
</table>
