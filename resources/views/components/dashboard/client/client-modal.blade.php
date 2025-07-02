@props(['client'])

<div class="modal fade" id="clientDetailModal{{ $client->id }}" tabindex="-1"
    aria-labelledby="clientDetailModalLabel{{ $client->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header text-white" style="background-color: rgba(13, 110, 253, 0.8)">
                <h5 class="modal-title" id="clientDetailModalLabel{{ $client->id }}">Detalle del Cliente</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-start">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/images/' . ($client->imagen ?? 'icon-person.jpg')) }}"
                        alt="Imagen de {{ $client->name }}" class="rounded-circle shadow"
                        style="width:120px; height:120px; object-fit:cover;">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $client->name }}</li>
                    <li class="list-group-item"><strong>Apellido:</strong> {{ $client->apellido }}</li>
                    <li class="list-group-item"><strong>DNI:</strong> {{ $client->dni }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $client->email }}</li>
                    <li class="list-group-item"><strong>Teléfono:</strong> {{ $client->telefono ?? 'No registrado' }}
                    </li>
                    <li class="list-group-item"><strong>Dirección:</strong> {{ $client->direccion ?? 'No registrada' }}
                    </li>
                    <li class="list-group-item"><strong>Fecha de registro:</strong>
                        {{ $client->created_at->format('d/m/Y') }}</li>
                </ul>

            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
