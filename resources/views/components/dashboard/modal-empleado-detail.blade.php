@props(['empleado'])

<div class="modal fade" id="empleadoDetailModal{{ $empleado->id }}" tabindex="-1"
    aria-labelledby="empleadoDetailModalLabel{{ $empleado->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header text-white" style="background-color: rgba(13, 110, 253, 0.8)">
                <h5 class="modal-title" id="empleadoDetailModalLabel{{ $empleado->id }}">Detalle del Empleado</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-start">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/images/' . ($empleado->imagen ?? 'icon-person.jpg')) }}"
                        alt="Imagen de {{ $empleado->name }}" class="rounded-circle shadow"
                        style="width:120px; height:120px; object-fit:cover;">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $empleado->name }}</li>
                    <li class="list-group-item"><strong>Apellido:</strong> {{ $empleado->apellido }}</li>
                    <li class="list-group-item"><strong>DNI:</strong> {{ $empleado->dni }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $empleado->email }}</li>
                    <li class="list-group-item"><strong>Teléfono:</strong> {{ $empleado->telefono ?? 'No registrado' }}
                    </li>
                    <li class="list-group-item"><strong>Dirección:</strong>
                        {{ $empleado->direccion ?? 'No registrada' }}</li>
                    <li class="list-group-item"><strong>Rol:</strong> {{ ucfirst($empleado->rol) }}</li>
                    <li class="list-group-item"><strong>Fecha de registro:</strong>
                        {{ $empleado->created_at->format('d/m/Y') }}</li>
                </ul>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
