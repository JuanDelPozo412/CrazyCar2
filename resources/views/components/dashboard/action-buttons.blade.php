@props(['vehicle' => null, 'maintenance' => null])

<div class="d-flex justify-content-between gap-1">
    @if ($vehicle)
        <button class="btn text-white btn-sm w-100" style="background-color: rgba(13, 110, 253, 0.8)" title="Ver detalles"
            data-bs-toggle="modal" data-bs-target="#vehicleDetailModal{{ $vehicle->id }}"">
            <i class="bi bi-eye"></i>
        </button>

        @if (auth()->user()->rol === 'admin')
            <button type="button" class="btn text-white btn-sm w-100" style="background-color: rgba(23, 162, 184, 0.9)"
                data-bs-toggle="modal" data-bs-target="#editVehicleModal{{ $vehicle->id }}">
                <i class="bi bi-pencil"></i>
            </button>
        @endif

        <button type="button" class="btn btn-secondary btn-sm w-100" data-bs-toggle="modal"
            data-bs-target="#confirmDeleteVehicle" data-id="{{ $vehicle->id }}">
            <i class="bi bi-trash"></i>
        </button>
    @elseif ($maintenance)
        <button class="btn text-white btn-sm w-100" style="background-color: rgba(13, 110, 253, 0.8)"
            title="Ver mantenimiento" data-bs-toggle="modal"
            data-bs-target="#maintenanceDetailModal{{ $maintenance->id }}">
            <i class="bi bi-eye"></i>
        </button>

        <button type="button" class="btn btn-secondary btn-sm w-100" data-bs-toggle="modal"
            data-bs-target="#confirmDeleteMaintenance" data-id="{{ $maintenance->id }}">
            <i class="bi bi-trash"></i>
        </button>
    @else
        <span>No hay datos para mostrar acciones.</span>
    @endif
</div>
