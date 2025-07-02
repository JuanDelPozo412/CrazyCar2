@props(['clients'])

<div class="modal fade" id="createMaintenanceModal" tabindex="-1" aria-labelledby="createMaintenanceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow-lg overflow-hidden bg-white">
            <div class="modal-header text-white p-4 border-bottom" style="background-color: rgba(23, 162, 184, 0.9)">
                <h5 class="modal-title fw-bold d-flex align-items-center" id="createMaintenanceModalLabel">
                    <i class="bi bi-tools me-2"></i> Crear Mantenimiento
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>

            <form action="{{ route('mantenimientos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body p-5">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="usuario_id" class="form-label fw-semibold">Cliente</label>
                            <select name="usuario_id" class="form-select shadow-sm" required>
                                <option value="" disabled selected>Seleccione un cliente</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }} {{ $client->apellido }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="patente" class="form-label fw-semibold">Patente</label>
                            <input type="text" name="patente" id="patente" class="form-control shadow-sm"
                                maxlength="10" required>
                        </div>

                        <div class="col-md-6">
                            <label for="marca" class="form-label fw-semibold">Marca</label>
                            <input type="text" name="marca" id="marca" class="form-control shadow-sm"
                                maxlength="50" required>
                        </div>

                        <div class="col-md-6">
                            <label for="modelo" class="form-label fw-semibold">Modelo</label>
                            <input type="text" name="modelo" id="modelo" class="form-control shadow-sm"
                                maxlength="50" required>
                        </div>

                        <div class="col-md-6">
                            <label for="motivo" class="form-label fw-semibold">Motivo</label>
                            <select class="form-select shadow-sm" name="motivo" id="motivo" required>
                                <option value="" disabled selected>Seleccione un motivo</option>
                                <option value="Cambio de Aceite">Cambio de Aceite</option>
                                <option value="Alineacion y Balanceo">Alineación y Balanceo</option>
                                <option value="Cambio de Filtro">Cambio de Filtro</option>
                                <option value="Revision de Frenos">Revisión de Frenos</option>
                                <option value="Mantenimiento General">Mantenimiento General</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_inicio" class="form-label fw-semibold">Fecha de Inicio</label>
                            <input type="date" class="form-control shadow-sm" name="fecha_inicio" id="fecha_inicio"
                                value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="imagen" class="form-label fw-semibold">Imagen (opcional)</label>
                            <input type="file" name="imagen" id="imagen" accept="image/*"
                                class="form-control shadow-sm">
                            <div class="form-text">
                                Formatos aceptados: JPG, PNG, WEBP. Tamaño máximo recomendado: 5MB.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer mt-4 pt-3 border-top border-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn text-white px-4"
                        style="background-color: rgba(23, 162, 184, 0.9)">
                        <i class="bi bi-save me-2"></i> Crear Mantenimiento
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
