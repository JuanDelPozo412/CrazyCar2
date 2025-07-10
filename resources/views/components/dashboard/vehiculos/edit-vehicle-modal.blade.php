@props(['vehicle'])

<div class="modal fade" id="editVehicleModal{{ $vehicle->id }}" tabindex="-1"
    aria-labelledby="editVehicleModalLabel{{ $vehicle->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-3 shadow-lg overflow-hidden bg-white">
            <div class="modal-header text-white p-4 border-bottom" style="background-color: rgba(23, 162, 184, 0.9)">
                <h5 class="modal-title fw-bold d-flex align-items-center" id="editVehicleModalLabel{{ $vehicle->id }}">
                    <i class="bi bi-pencil-square me-2"></i> Editar Vehículo
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>

            <div class="modal-body p-5">
                <form action="{{ route('vehiculos.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="vehicleStock{{ $vehicle->id }}" class="form-label fw-semibold">Stock</label>
                            <input type="number" class="form-control shadow-sm" id="vehicleStock{{ $vehicle->id }}"
                                name="stock" min="0" max="200" required value="{{ $vehicle->stock }}" />
                        </div>
                        <div class="col-md-6">
                            <label for="vehiclePrice{{ $vehicle->id }}" class="form-label fw-semibold">Precio</label>
                            <input type="number" class="form-control shadow-sm" id="vehiclePrice{{ $vehicle->id }}"
                                name="price" min="0" max="1000000" required value="{{ $vehicle->precio }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="vehicleBrand{{ $vehicle->id }}" class="form-label fw-semibold">Marca</label>
                            <select class="form-select shadow-sm" id="vehicleBrand{{ $vehicle->id }}" name="brand" required>
                                <option disabled>Seleccione una marca</option>
                                @foreach (['Toyota','Ford','Chevrolet','Volkswagen','Renault','Honda','BMW','Nissan'] as $brand)
                                    <option value="{{ $brand }}" {{ $vehicle->marca == $brand ? 'selected' : '' }}>
                                        {{ $brand }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="vehicleModel{{ $vehicle->id }}" class="form-label fw-semibold">Modelo</label>
                            <select class="form-select shadow-sm" id="vehicleModel{{ $vehicle->id }}" name="model" required>
                                <option disabled>Seleccione un modelo</option>
                                @foreach (['Corolla','Civic','Focus','Cruze','Jetta','F-150','X5'] as $model)
                                    <option value="{{ $model }}" {{ $vehicle->modelo == $model ? 'selected' : '' }}>
                                        {{ $model }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="vehicleType{{ $vehicle->id }}" class="form-label fw-semibold">Tipo</label>
                            <select class="form-select shadow-sm" id="vehicleType{{ $vehicle->id }}" name="type" required>
                                <option disabled>Seleccione un tipo</option>
                                @foreach (['Sedán','SUV','Pickup'] as $type)
                                    <option value="{{ $type }}" {{ $vehicle->tipo == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="vehicleColor{{ $vehicle->id }}" class="form-label fw-semibold">Color</label>
                            <select class="form-select shadow-sm" id="vehicleColor{{ $vehicle->id }}" name="color" required>
                                <option disabled>Seleccione un color</option>
                                @foreach (['Rojo','Azul','Negro','Blanco','Gris','Plateado','Verde','Amarillo','Naranja'] as $color)
                                    <option value="{{ $color }}" {{ $vehicle->color == $color ? 'selected' : '' }}>
                                        {{ $color }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="vehicleYear{{ $vehicle->id }}" class="form-label fw-semibold">Año</label>
                            <input type="number" class="form-control shadow-sm" id="vehicleYear{{ $vehicle->id }}"
                                name="year" min="1990" max="{{ date('Y') }}" required
                                value="{{ $vehicle->anio }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="vehicleFuel{{ $vehicle->id }}" class="form-label fw-semibold">Tipo de Combustible</label>
                            <select class="form-select shadow-sm" id="vehicleFuel{{ $vehicle->id }}" name="fuel_type" required>
                                <option disabled>Seleccione un tipo de combustible</option>
                                @foreach (['Nafta','Diesel','Eléctrico'] as $fuel)
                                    <option value="{{ $fuel }}" {{ $vehicle->combustible == $fuel ? 'selected' : '' }}>
                                        {{ $fuel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="vehiclePhoto{{ $vehicle->id }}" class="form-label fw-semibold">Foto del Vehículo</label>
                            <input type="file" class="form-control shadow-sm" id="vehiclePhoto{{ $vehicle->id }}"
                                name="photo" accept="image/*" />
                            <div class="form-text">
                                Formatos aceptados: JPG, PNG, WEBP. Tamaño máximo recomendado: 5MB.
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-4 pt-3 border-top border-light">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn text-white px-4" style="background-color: rgba(23, 162, 184, 0.9)">
                            <i class="bi bi-save me-2"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>