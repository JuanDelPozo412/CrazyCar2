@props(['client'])

<div class="modal fade" id="clientEditModal{{ $client->id }}" tabindex="-1"
    aria-labelledby="clientEditModalLabel{{ $client->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('clientes.update', $client->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header border-0">
                    <h5 class="modal-title" id="clientEditModalLabel{{ $client->id }}">
                        Editar Cliente
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body pt-0">
                    <div class="text-center mb-4 position-relative">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('storage/images/' . ($client->imagen ?? 'icon-person.jpg')) }}"
                                alt="Imagen cliente" class="rounded-circle border border-5 border-white shadow-sm"
                                style="width: 120px; height: 120px; object-fit: cover;">

                            <label for="imagen{{ $client->id }}"
                                class="position-absolute bottom-0 end-0 bg-primary rounded-circle d-flex justify-content-center align-items-center border border-2 border-white shadow-sm"
                                style="width: 36px; height: 36px; cursor: pointer; transform: translate(25%, 25%);">
                                <i class="bi bi-pencil-fill text-white "></i>
                            </label>
                            <input type="file" class="d-none" id="imagen{{ $client->id }}" name="imagen"
                                accept="image/*">
                        </div>
                    </div>

                    <!-- Campos de formulario -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name{{ $client->id }}" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name{{ $client->id }}" name="name"
                                value="{{ old('name', $client->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido{{ $client->id }}" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido{{ $client->id }}" name="apellido"
                                value="{{ old('apellido', $client->apellido) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dni{{ $client->id }}" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni{{ $client->id }}" name="dni"
                                value="{{ old('dni', $client->dni) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email{{ $client->id }}" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email{{ $client->id }}" name="email"
                                value="{{ old('email', $client->email) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono{{ $client->id }}" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono{{ $client->id }}" name="telefono"
                                value="{{ old('telefono', $client->telefono) }}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
