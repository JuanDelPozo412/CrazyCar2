@props(['empleado'])

<div class="modal fade" id="employeeEditModal{{ $empleado->id }}" tabindex="-1"
    aria-labelledby="employeeEditModalLabel{{ $empleado->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('empleados.update', $empleado->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header border-0">
                    <h5 class="modal-title" id="employeeEditModalLabel{{ $empleado->id }}">
                        Editar Empleado
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body pt-0">
                    <div class="text-center mb-4 position-relative">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('storage/images/' . ($empleado->imagen ?? 'icon-person.jpg')) }}"
                                alt="Imagen empleado" class="rounded-circle border border-5 border-white shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover;">

                            <label for="imagen{{ $empleado->id }}"
                                class="position-absolute bottom-0 end-0 rounded-circle d-flex justify-content-center align-items-center border border-2 border-white shadow-sm"
                                style="width: 36px; height: 36px; cursor: pointer; transform: translate(25%, 25%); background-color: rgba(23, 162, 184, 0.9);">
                                <i class="bi bi-pencil-fill text-white "></i>
                            </label>
                            <input type="file" class="d-none" id="imagen{{ $empleado->id }}" name="imagen"
                                accept="image/*">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name{{ $empleado->id }}" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name{{ $empleado->id }}" name="name"
                                value="{{ old('name', $empleado->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido{{ $empleado->id }}" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido{{ $empleado->id }}" name="apellido"
                                value="{{ old('apellido', $empleado->apellido) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dni{{ $empleado->id }}" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni{{ $empleado->id }}" name="dni"
                                value="{{ old('dni', $empleado->dni) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email{{ $empleado->id }}" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email{{ $empleado->id }}" name="email"
                                value="{{ old('email', $empleado->email) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono{{ $empleado->id }}" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono{{ $empleado->id }}" name="telefono"
                                value="{{ old('telefono', $empleado->telefono) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="direccion{{ $empleado->id }}" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion{{ $empleado->id }}"
                                name="direccion" value="{{ old('direccion', $empleado->direccion) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="rol{{ $empleado->id }}" class="form-label">Rol</label>
                            <select class="form-select" id="rol{{ $empleado->id }}" name="rol" required>
                                <option value="admin" {{ old('rol', $empleado->rol) == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                                <option value="empleado"
                                    {{ old('rol', $empleado->rol) == 'empleado' ? 'selected' : '' }}>Empleado</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn text-white"
                        style="background-color: rgba(23, 162, 184, 0.9)">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
