@props(['vehicle', 'maintenance' => false])

<div class="d-flex justify-content-between gap-1">
    <button class="btn text-white btn-sm w-100" style="background-color: rgba(13, 110, 253, 0.8)" title="Ver detalles"
        data-bs-toggle="modal"
        data-bs-target="{{ $maintenance ? '#vehicleDetailMaintenance' : '#vehicleSellDetailModal' }}">
        <i class="bi bi-eye"></i>
    </button>

    <button class="btn text-white btn-sm w-100" style="background-color: rgba(23, 162, 184, 0.9)">
        <i class="bi bi-pencil"></i>
    </button>

    <button class="btn btn-secondary btn-sm w-100" data-bs-toggle="modal"
        data-bs-target="{{ $maintenance ? '#confirmDeleteMaintenance' : '#confirmDeleteVehicle' }}"
        data-id="{{ $vehicle->id }}">
        <i class="bi bi-trash"></i>
    </button>

</div>
