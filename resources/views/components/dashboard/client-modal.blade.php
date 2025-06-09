@props(['client'])

<div class="modal fade" id="clientDetailModal{{ $client->id }}" tabindex="-1"
    aria-labelledby="clientDetailModalLabel{{ $client->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="clientDetailModalLabel{{ $client->id }}">Detalle del Cliente</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-start">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $client->name }}</li>
                    <li class="list-group-item"><strong>Apellido:</strong> {{ $client->apellido }}</li>
                    <li class="list-group-item"><strong>DNI:</strong> {{ $client->dni }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $client->email }}</li>
                </ul>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
