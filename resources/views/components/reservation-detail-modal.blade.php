@props(['reservation'])

<div class="modal fade" id="reservationDetailModal{{ $reservation->id }}" tabindex="-1"
    aria-labelledby="reservationDetailModalLabel{{ $reservation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header text-white" style="background-color: rgba(23, 162, 184, 0.9)">
                <h5 class="modal-title" id="reservationDetailModalLabel{{ $reservation->id }}">Detalle de la Reserva</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush text-start">


                    <li class="list-group-item"><strong>Cliente:</strong> {{ $reservation->usuario?->name }}
                        {{ $reservation->usuario?->apellido }}
                    </li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $reservation->usuario?->email }}</li>


                    <li class="list-group-item"><strong>Vehículo:</strong> {{ $reservation->vehiculo?->marca }}
                        {{ $reservation->vehiculo?->modelo }}
                    </li>

                    <li class="list-group-item">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <strong>Fecha de Presentacion:</strong>
                                <span>{{ \Carbon\Carbon::parse($reservation->fecha_presentacion)->format('d/m/Y') }}</span>
                            </div>
                            <div class="col-md-6">
                                <strong>Hora de Presentacion:</strong>
                                <span>{{ \Carbon\Carbon::parse($reservation->hora_presentacion)->format('H:i') }} hs</span>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <strong>Estado:</strong>
                        @php
                        $claseBadge = match($reservation->estado) {
                        'Aprobado' => 'bg-success',
                        'Pendiente' => 'bg-warning text-dark',
                        'Rechazado' => 'bg-danger',
                        default => 'bg-secondary',
                        };
                        @endphp
                        <span class="badge {{ $claseBadge }}">{{ $reservation->estado }}</span>
                    </li>

                </ul>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>