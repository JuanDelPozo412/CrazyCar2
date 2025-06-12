@props(['vehicle', 'modalId' => 'vehicleDetailModal', 'modalTitle' => 'Detalles del Vehículo'])

<div class="modal fade" id="{{ $modalId }}{{ $vehicle->id }}" tabindex="-1" aria-labelledby="vehicleDetailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="vehicleDetailModalLabel">
                    {{ $modalTitle }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 text-center mb-3 mb-md-0">
                        <div class="border rounded p-2 d-flex align-items-center justify-content-center"
                            style="height: 300px; overflow: hidden;"> <img
                                src="{{ Storage::url($vehicle->imagen) ?: asset('images/auto2.png') }}"
                                alt="Imagen del Vehículo" class="img-fluid rounded w-100 h-100 object-fit-cover" />
                        </div>
                    </div>

                    <div class="col-md-7">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Patente:</strong> <span>{{ $vehicle->patente ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Marca:</strong> <span>{{ $vehicle->marca ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Modelo:</strong> <span>{{ $vehicle->modelo ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Año:</strong> <span>{{ $vehicle->anio ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Tipo:</strong> <span>{{ $vehicle->tipo ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Color:</strong> <span>{{ $vehicle->color ?? 'N/A' }}</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Tipo de Combustible:</strong> <span>{{ $vehicle->combustible ?? 'N/A' }}</span>
                            </li>
                            @if ($vehicle->estado === 'Mantenimiento')
                                <li class="list-group-item">
                                    <strong>Fecha de Inicio del Mantenimiento:</strong>
                                    <span>{{ $vehicle->fechadeinicio ?? 'N/A' }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Propietario:</strong>
                                    <span>{{ $vehicle->propietario->name ?? 'N/A' }}
                                        ({{ $vehicle->propietario->email ?? 'N/A' }})</span>
                                </li>
                            @endif
                            @if ($vehicle->estado === 'Venta')
                                <li class="list-group-item">
                                    <strong>Stock:</strong> <span>{{ $vehicle->stock ?? 'N/A' }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Precio:</strong>
                                    <span>{{ $vehicle->precio ? '$' . number_format($vehicle->precio, 2, ',', '.') : 'N/A' }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
