<div class="modal fade" id="createVehicleModal" tabindex="-1" aria-labelledby="createVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-3 shadow-lg overflow-hidden bg-white">
            <div class="modal-header text-white p-4 border-bottom" style="background-color: rgba(13, 110, 253, 0.8)">
                <h5 class="modal-title fw-bold d-flex align-items-center" id="createVehicleModalLabel">
                    <i class="bi bi-car-front-fill me-2"></i> Crear Vehículo
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>

            <div class="modal-body p-5">
                <form action="{{ route('vehiculos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="vehicleStock" class="form-label fw-semibold">Stock</label>
                            <input type="number" class="form-control shadow-sm" id="vehicleStock" name="stock"
                                min="0" max="200" required />
                        </div>
                        <div class="col-md-6">
                            <label for="vehiclePrice" class="form-label fw-semibold">Precio</label>
                            <input type="number" class="form-control shadow-sm" id="vehiclePrice" name="price"
                                min="0" max="1000000" required />
                        </div>

                        <div class="col-md-6">
                            <label for="vehicleBrand" class="form-label fw-semibold">Marca</label>
                            <select class="form-select shadow-sm" id="vehicleBrand" name="brand" required>
                                <option disabled selected>Seleccione una marca</option>
                                <option>Toyota</option>
                                <option>Ford</option>
                                <option>Chevrolet</option>
                                <option>Volkswagen</option>
                                <option>Renault</option>
                                <option>Honda</option>
                                <option>BMW</option>
                                <option>Nissan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="vehicleModel" class="form-label fw-semibold">Modelo</label>
                            <select class="form-select shadow-sm" id="vehicleModel" name="model" required>
                                <option disabled selected>Seleccione un modelo</option>
                                <option>Corolla</option>
                                <option>Civic</option>
                                <option>Focus</option>
                                <option>Cruze</option>
                                <option>Jetta</option>
                                <option>F-150</option>
                                <option>X5</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="vehicleType" class="form-label fw-semibold">Tipo</label>
                            <select class="form-select shadow-sm" id="vehicleType" name="type" required>
                                <option disabled selected>Seleccione un tipo</option>
                                <option>Sedán</option>
                                <option>SUV</option>
                                <option>Pickup</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="vehicleColor" class="form-label fw-semibold">Color</label>
                            <select class="form-select shadow-sm" id="vehicleColor" name="color" required>
                                <option disabled selected>Seleccione un color</option>
                                <option>Rojo</option>
                                <option>Azul</option>
                                <option>Negro</option>
                                <option>Blanco</option>
                                <option>Gris</option>
                                <option>Plateado</option>
                                <option>Verde</option>
                                <option>Amarillo</option>
                                <option>Naranja</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="vehicleYear" class="form-label fw-semibold">Año</label>
                            <input type="number" class="form-control shadow-sm" id="vehicleYear" name="year"
                                min="1990" max="{{ date('Y') }}" required placeholder="Ej: 2023" />
                        </div>

                        <div class="col-md-6">
                            <label for="vehicleFuel" class="form-label fw-semibold">Tipo de Combustible</label>
                            <select class="form-select shadow-sm" id="vehicleFuel" name="fuel_type" required>
                                <option disabled selected>Seleccione un tipo de combustible</option>
                                <option>Nafta</option>
                                <option>Diesel</option>
                                <option>Eléctrico</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="vehiclePhoto" class="form-label fw-semibold">Foto del Vehículo</label>
                            <input type="file" class="form-control shadow-sm" id="vehiclePhoto" name="photo"
                                accept="image/*" required />
                            <div class="form-text">
                                Formatos aceptados: JPG, PNG, WEBP. Tamaño máximo recomendado: 5MB.
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-4 pt-3 border-top border-light">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn text-white px-4"
                            style="background-color: rgba(13, 110, 253, 0.8)">
                            <i class="bi bi-save me-2"></i> Guardar Vehículo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
