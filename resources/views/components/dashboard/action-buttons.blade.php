@props(['vehicle'])

<div class="d-flex justify-content-between gap-1">
    <button class="btn text-white btn-sm w-100" style="background-color: rgba(13, 110, 253, 0.8)" title="Ver detalles"
        data-bs-toggle="modal" data-bs-target="#vehicleSellDetailModal{{ $vehicle->id }}">
        <i class="bi bi-eye"></i>
    </button>

    <button type="button" class="btn btn-secondary btn-sm w-100" data-bs-toggle="modal"
        data-bs-target="#confirmDeleteVehicle" data-id="{{ $vehicle->id }}">
        <i class="bi bi-trash"></i>
    </button>
</div>
