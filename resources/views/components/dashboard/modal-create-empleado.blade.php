<div class="modal fade" id="createEmpleadoModal" tabindex="-1" aria-labelledby="createEmpleadoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header text-white p-4 border-bottom" style="background-color: rgba(13, 110, 253, 0.8)">
                <h5 class="modal-title fw-bold d-flex align-items-center" id="createEmpleadoModalLabel">
                    <i class="bi bi-person-plus me-2"></i> Crear Nuevo Empleado
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" required
                            value="{{ old('apellido') }}">
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" required
                        value="{{ old('email') }}">
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" required>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" name="dni" id="dni" class="form-control" required
                            value="{{ old('dni') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control"
                            value="{{ old('telefono') }}">
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control"
                        value="{{ old('direccion') }}">
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen (opcional)</label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select name="rol" id="rol" class="form-select" required>
                        <option value="empleado" {{ old('rol') == 'empleado' ? 'selected' : '' }}>Empleado</option>
                        <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn text-white" style="background-color: rgba(13, 110, 253, 0.8)">
                    Crear Empleado
                </button>
            </div>
        </form>
    </div>
</div>
