@props(['vehicle', 'modalId' => 'userVehicleDetailModal', 'modalTitle' => 'Detalles del Vehículo'])

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
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        <div class="border rounded p-2 d-flex align-items-center justify-content-center"
                            style="height: 300px; overflow: hidden;">
                            <img src="{{ asset('storage/vehiculos/' . $vehicle->imagen) }}" alt="Imagen del Vehículo"
                                class="img-fluid rounded w-100 h-100 object-fit-cover" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h6>Detalles del Vehículo:</h6>
                        <ul class="list-group list-group-flush small">
                            <li class="list-group-item px-0 py-1"><strong>Marca:</strong> {{ $vehicle->marca ?? 'N/A' }}
                            </li>
                            <li class="list-group-item px-0 py-1"><strong>Modelo:</strong>
                                {{ $vehicle->modelo ?? 'N/A' }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Año:</strong> {{ $vehicle->anio ?? 'N/A' }}
                            </li>
                            <li class="list-group-item px-0 py-1"><strong>Color:</strong> {{ $vehicle->color ?? 'N/A' }}
                            </li>
                            <li class="list-group-item px-0 py-1"><strong>Tipo:</strong> {{ $vehicle->tipo ?? 'N/A' }}
                            </li>
                            <li class="list-group-item px-0 py-1"><strong>Combustible:</strong>
                                {{ $vehicle->combustible ?? 'N/A' }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Stock:</strong>
                                {{ $vehicle->stock ?? 'N/A' }}</li>
                            <li class="list-group-item px-0 py-1"><strong>Precio:</strong>
                                ${{ number_format($vehicle->precio ?? 0, 2, ',', '.') }}</li>

                            @if ($vehicle->patente)
                                <li class="list-group-item px-0 py-1"><strong>Patente:</strong> {{ $vehicle->patente }}
                                </li>
                            @endif

                            @if ($vehicle->propietario)
                                <li class="list-group-item px-0 py-1">
                                    <strong>Propietario:</strong> {{ $vehicle->propietario->name ?? 'N/A' }}
                                    {{ $vehicle->propietario->apellido ?? '' }}
                                </li>
                            @endif
                        </ul>

                        {{-- BOTÓN DE COMPRAR --}}
                        <!--Eliminar de aca-->

                        <button type="submit" class="btn btn-success w-100">
                            Comprar este vehículo
                        </button>

                        <!--a aca (para hacer pruebas)-->
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
