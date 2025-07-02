@props(['vehicle', 'modalId' => 'vehicleDetailModal', 'modalTitle' => 'Detalles del Vehículo'])

<div class="modal fade" id="{{ $modalId }}{{ $vehicle->id }}" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label{{ $vehicle->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-3 shadow-lg overflow-hidden bg-white">
            <div
                class="modal-header bg-light text-dark p-4 d-flex justify-content-between align-items-center border-bottom">
                <h5 class="modal-title font-weight-bold d-flex align-items-center"
                    id="{{ $modalId }}Label{{ $vehicle->id }}">
                    <i class="bi bi-car-front-fill me-2 text-secondary"></i> {{ $modalTitle }}
                    <span class="text-muted font-monospace ms-2">#{{ $vehicle->id }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body p-5 bg-white">
                <div class="row">
                    <div class="col-12 row">
                        <div class="col-8 col-md-5 d-flex flex-column align-items-center mb-4 mb-md-0">
                            <div class="mb-4 text-center">
                                @if ($vehicle->imagen)
                                    <img src="{{ asset('storage/vehiculos/' . $vehicle->imagen) }}"
                                        alt="Imagen del Vehículo"
                                        class="img-fluid rounded-3 shadow-sm border border-secondary-subtle"
                                        style="width: 400px; min-height: 400px; object-fit: contain;" />
                                @else
                                    <div class="d-flex flex-column justify-content-center align-items-center w-100 p-4 border border-dashed border-secondary-subtle rounded-3 bg-light text-secondary"
                                        style="min-height: 150px;">
                                        <i class="bi bi-image-fill mb-2 fs-1"></i>
                                        <p class="mb-0">No hay imagen disponible</p>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="col-4 col-md-7 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="text-secondary mb-3">
                                <i class="bi bi-info-circle-fill me-2"></i> Detalles del Vehículo
                            </h5>
                            <div class="row row-cols-1 row-cols-md-2 g-3 mb-4 ">
                                <div class="w-100 ">
                                    <p class="text-dark d-flex align-items-center mb-2">
                                        <i class="bi bi-car-front-fill me-3 text-muted fs-5"></i>
                                        <strong class="font-weight-bold">Marca:</strong>
                                        <span class="ms-2">{{ $vehicle->marca ?? 'N/A' }}</span>
                                    </p>

                                    <p class="text-dark d-flex align-items-center mb-2">
                                        <i class="bi bi-box-seam-fill me-3 text-muted fs-5"></i>
                                        <strong class="font-weight-bold">Modelo:</strong>
                                        <span class="ms-2">{{ $vehicle->modelo ?? 'N/A' }}</span>
                                    </p>

                                    <p class="text-dark d-flex align-items-center mb-2">
                                        <i class="bi bi-calendar-event-fill me-3 text-muted fs-5"></i>
                                        <strong class="font-weight-bold">Año:</strong>
                                        <span class="ms-2">{{ $vehicle->anio ?? 'N/A' }}</span>
                                    </p>

                                    <p class="text-dark d-flex align-items-center mb-2">
                                        <i class="bi bi-palette-fill me-3 text-muted fs-5"></i>
                                        <strong class="font-weight-bold">Color:</strong>
                                        <span class="ms-2">{{ $vehicle->color ?? 'N/A' }}</span>
                                    </p>

                                    <p class="text-dark d-flex align-items-center mb-0">
                                        <i class="bi bi-fuel-pump-fill me-3 text-muted fs-5"></i>
                                        <strong class="font-weight-bold">Combustible:</strong>
                                        <span class="ms-2">{{ $vehicle->combustible ?? 'N/A' }}</span>
                                    </p>

                                    <p class="text-dark d-flex align-items-center mb-2">
                                        <i class="bi bi-stack me-3 text-muted fs-5"></i>
                                        <strong class="font-weight-bold">Stock:</strong>
                                        <span class="ms-2">{{ $vehicle->stock ?? '0' }}</span>
                                    </p>

                                    <p class="text-dark d-flex align-items-center mb-2">
                                        <i class="bi bi-currency-dollar me-3 text-muted fs-5"></i>
                                        <strong class="font-weight-bold">Precio:</strong>
                                        <span
                                            class="ms-2">${{ number_format($vehicle->precio, 0, ',', '.') ?? 'N/A' }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-secondary px-4 py-2" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
