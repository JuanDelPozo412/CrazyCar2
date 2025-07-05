@props(['vehicles'])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">Lista Vehículos</h4>

    <div class="d-flex gap-2 w-50 justify-content-center justify-content-sm-end mt-3 mt-sm-0 flex-wrap">
        <form method="GET" action="{{ route('vehiculos') }}" class="input-group" style="min-width: 250px;">
            <input type="text" name="busqueda_vehiculo"
                class="form-control border-0 bg-light rounded-start-pill px-4 py-2"
                style="box-shadow: none !important; outline: none !important;" placeholder="Buscar vehículo..."
                value="{{ request('busqueda_vehiculo') }}" />

            <button type="submit"
                class="btn btn-primary rounded-end-pill px-3 py-2 d-flex align-items-center justify-content-center shadow-sm"
                id="search-addon" style="box-shadow: none !important; outline: none !important;">
                <i class="bi bi-search"></i>
            </button>

        </form>
    </div>

</div>

<div class="table-responsive">
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
            @forelse ($vehicles as $index => $vehicle)
                <tr @class(['hidden-vehicle-row d-none' => $index >= 6])>
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
                        <x-dashboard.vehiculos.vehicle-detail-modal :vehicle="$vehicle" modalId="vehicleDetailModal"
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
</div>

@if (count($vehicles) > 6)
    <div class="text-center mt-3">
        <button id="toggle-vehicles-btn" class="btn text-white" style="background-color: rgba(13, 110, 253, 0.8)"
            type="button">
            Mostrar más vehículos
        </button>
    </div>
@endif

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleVehicleButton = document.getElementById('toggle-vehicles-btn');
            let vehicleExpanded = false;

            toggleVehicleButton?.addEventListener('click', function() {
                const vehicleRows = document.querySelectorAll('.hidden-vehicle-row');
                vehicleRows.forEach(row => row.classList.toggle('d-none'));

                vehicleExpanded = !vehicleExpanded;
                toggleVehicleButton.textContent = vehicleExpanded ?
                    'Ocultar vehículos' :
                    'Mostrar más vehículos';
            });
        });
    </script>
@endpush
