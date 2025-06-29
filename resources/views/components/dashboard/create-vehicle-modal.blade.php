<div class="modal fade" id="createVehicleModal" tabindex="-1" aria-labelledby="createVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createVehicleModalLabel">
                    Crear Vehículo
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('vehiculos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="vehicleStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="vehicleStock" name="stock" min="0"
                                max="200" required />
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="vehiclePrice" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="vehiclePrice" name="price" min="0"
                                max="1000000" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="vehicleBrand" class="form-label">Marca</label>
                            <select class="form-select" id="vehicleBrand" name="brand" required>
                                <option value="" disabled selected>
                                    Seleccione una marca
                                </option>
                                <option value="Toyota">Toyota</option>
                                <option value="Ford">Ford</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Renault">Renault</option>
                                <option value="Honda">Honda</option>
                                <option value="Bmw">BMW</option>
                                <option value="Nissan">Nissan</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="vehicleModel" class="form-label">Modelo</label>
                            <select class="form-select" id="vehicleModel" name="model" required>
                                <option value="" disabled selected>
                                    Seleccione un modelo
                                </option>
                                <option value="Corolla">Toyota Corolla</option>
                                <option value="Civic">Honda Civic</option>
                                <option value="Focus">Ford Focus</option>
                                <option value="Cruze">Chevrolet Cruze</option>
                                <option value="Jetta">Volkswagen Jetta</option>
                                <option value="F-150">Ford F-150</option>
                                <option value="X5">BMW X5</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="vehicleType" class="form-label">Tipo</label>
                            <select class="form-select" id="vehicleType" name="type" required>
                                <option value="" disabled selected>
                                    Seleccione un tipo
                                </option>
                                <option value="Sedan">Sedán</option>
                                <option value="SUV">SUV</option>
                                <option value="Pickup">Pickup</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="vehicleColor" class="form-label">Color</label>
                            <select class="form-select" id="vehicleColor" name="color" required>
                                <option value="" disabled selected>
                                    Seleccione un color
                                </option>
                                <option value="Rojo">Rojo</option>
                                <option value="Azul">Azul</option>
                                <option value="Negro">Negro</option>
                                <option value="Blanco">Blanco</option>
                                <option value="Gris">Gris</option>
                                <option value="Plateado">Plateado</option>
                                <option value="Verde">Verde</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Naranja">Naranja</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="vehicleYear" class="form-label">Año</label>
                            <input type="number" class="form-control" id="vehicleYear" name="year"
                                aria-label="Año del vehiculo" min="1990" max="{{ date('Y') }}" required
                                placeholder="Ingresa el año de fabricacion" />
                            <div class="invalid-feedback">
                                Por favor, ingrese un año válido entre 1990 y el año actual.
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="vehicleFuel" class="form-label">Tipo de Combustible</label>
                            <select class="form-select" id="vehicleFuel" name="fuel_type" required>
                                <option value="" disabled selected>
                                    Seleccione un tipo de combustible
                                </option>
                                <option value="Gasolina">Nafta</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Electrico">Electrico</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="vehiclePhoto" class="form-label">Foto del Vehículo</label>
                            <input type="file" class="form-control" id="vehiclePhoto" name="photo"
                                accept="image/*" required />
                            <div class="form-text">
                                Formatos aceptados: JPG, PNG, WEBP. Tamaño máximo recomendado: 5MB.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Guardar Vehículo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
