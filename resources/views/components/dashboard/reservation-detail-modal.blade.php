@props(['reservation'])

<div class="modal fade" id="reservationDetailModal{{ $reservation->id }}" tabindex="-1"
    aria-labelledby="reservationDetailModalLabel{{ $reservation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-3 shadow-lg overflow-hidden bg-white">
            <div
                class="modal-header bg-light text-dark p-4 d-flex justify-content-between align-items-center border-bottom">
                <h5 class="modal-title font-weight-bold" id="reservationDetailModalLabel{{ $reservation->id }}">
                    <i class="bi bi-calendar-check-fill me-2 text-secondary"></i> Detalles de Reserva <span
                        class="text-muted font-monospace">#{{ $reservation->id }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body p-5 bg-white">
                <div class="row">
                    <div class="col-12 col-md-5 d-flex flex-column align-items-center mb-4 mb-md-0">
                        <div class="mb-4 text-center">
                            @if ($reservation->vehiculo && $reservation->vehiculo->imagen)
                                <img src="{{ asset('storage/vehiculos/' . $reservation->vehiculo->imagen) }}"
                                    alt="Imagen del Vehículo"
                                    class="img-fluid rounded-3 shadow-sm border border-secondary-subtle"
                                    style="max-width: 400px; height: auto; object-fit: cover;" />
                            @else
                                <div class="d-flex flex-column justify-content-center align-items-center w-100 p-4 border border-dashed border-secondary-subtle rounded-3 bg-light text-secondary"
                                    style="min-height: 150px;">
                                    <i class="bi bi-image-fill mb-2 fs-1"></i>
                                    <p class="mb-0">No hay imagen disponible</p>
                                </div>
                            @endif
                        </div>

                        <div class="w-100">
                            <h6 class="text-secondary mb-3 text-start"><i class="bi bi-info-circle-fill me-2"></i> Datos
                                del Usuario</h6>

                            <p class="text-dark d-flex align-items-center mb-2">
                                <i class="bi bi-person-fill me-3 text-muted fs-5"></i><strong>Nombre:</strong>
                                <span class="ms-2">{{ $reservation->usuario->name ?? 'N/A' }}</span>
                            </p>
                            <p class="text-dark d-flex align-items-center mb-2">
                                <i class="bi bi-person-fill me-3 text-muted fs-5"></i><strong>Apellido:</strong>
                                <span class="ms-2">{{ $reservation->usuario->apellido ?? 'N/A' }}</span>
                            </p>
                            <p class="text-dark d-flex align-items-center mb-0">
                                <i class="bi bi-credit-card-2-front-fill me-3 text-muted fs-5"></i><strong>DNI:</strong>
                                <span class="ms-2">{{ $reservation->usuario->dni ?? 'N/A' }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
                        <div class="row row-cols-1 row-cols-md-3 g-3 mb-4">
                            <div class="col">
                                <div class="card h-100 shadow-sm border-secondary-subtle">
                                    <div class="card-body text-center">
                                        <i class="bi bi-car-front-fill text-info fs-3 mb-2"></i>
                                        <h6 class="card-title text-muted fw-bold">Vehículo</h6>
                                        <p class="card-text text-dark mb-1"><strong>Marca:</strong>
                                            {{ $reservation->vehiculo->marca ?? 'N/A' }}</p>
                                        <p class="card-text text-dark mb-0"><strong>Modelo:</strong>
                                            {{ $reservation->vehiculo->modelo ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100 shadow-sm border-secondary-subtle">
                                    <div class="card-body text-center">
                                        <i class="bi bi-calendar-event text-warning fs-3 mb-2"></i>
                                        <h6 class="card-title text-muted fw-bold">Fecha y Hora</h6>
                                        <p class="card-text text-dark mb-1">
                                            <strong>Fecha:</strong>
                                            {{ $reservation->fecha_presentacion ? \Carbon\Carbon::parse($reservation->fecha_presentacion)->format('d/m/Y') : 'Sin fecha' }}
                                        </p>
                                        <p class="card-text text-dark mb-0">
                                            <strong>Hora:</strong>
                                            {{ $reservation->hora_presentacion ? \Carbon\Carbon::parse($reservation->hora_presentacion)->format('H:i') : 'Sin hora' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100 shadow-sm border-secondary-subtle">
                                    <div class="card-body text-center">
                                        <i class="bi bi-info-circle-fill text-success fs-3 mb-2"></i>
                                        <h6 class="card-title text-muted fw-bold">Estado</h6>
                                        <p class="card-text text-dark">
                                            @php
                                                $badge = match ($reservation->estado) {
                                                    'Pendiente'
                                                        => '<span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2">Pendiente</span>',
                                                    'Aprobado'
                                                        => '<span class="badge bg-success-subtle text-success-emphasis rounded-pill px-3 py-2">Aprobado</span>',
                                                    'Rechazado'
                                                        => '<span class="badge bg-danger-subtle text-danger-emphasis rounded-pill px-3 py-2">Rechazado</span>',
                                                    default
                                                        => '<span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill px-3 py-2">Desconocido</span>',
                                                };
                                            @endphp
                                            {!! $badge !!}
                                        </p>

                                        <form action="{{ route('reservations.updateEstado', $reservation->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <select name="estado" id="estadoSelect{{ $reservation->id }}"
                                                class="form-select form-select-sm">
                                                <option value="Pendiente"
                                                    {{ $reservation->estado === 'Pendiente' ? 'selected' : '' }}>
                                                    Pendiente</option>
                                                <option value="Aprobado"
                                                    {{ $reservation->estado === 'Aprobado' ? 'selected' : '' }}>
                                                    Aprobado</option>
                                                <option value="Rechazado"
                                                    {{ $reservation->estado === 'Rechazado' ? 'selected' : '' }}>
                                                    Rechazado</option>
                                            </select>

                                            <button type="submit" class="btn btn-sm px-2 py-1 mt-3 text-white"
                                                style="background-color: rgba(13, 110, 253, 0.8)">Actualizar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-top border-secondary-subtle">
                            @php
                                $userReservations = collect();
                                if ($reservation->usuario) {
                                    $userReservations = \App\Models\UserVehicle::where(
                                        'id_usuarios',
                                        $reservation->id_usuarios,
                                    )
                                        ->where('id', '!=', $reservation->id)
                                        ->orderByDesc('created_at')
                                        ->get();
                                }
                            @endphp

                            <h6
                                class="font-weight-bold text-dark mb-4 text-center d-flex align-items-center justify-content-center">
                                <i class="bi bi-list-check me-3 text-secondary"></i> Otras Reservas de
                                <span
                                    class="text-primary ms-2">{{ $reservation->usuario ? $reservation->usuario->name . ' ' . $reservation->usuario->apellido : 'este Usuario' }}</span>:
                            </h6>
                            <div
                                class="list-group max-h-96 overflow-y-auto border border-secondary-subtle rounded-3 p-3 bg-light custom-scrollbar">
                                @forelse ($userReservations as $otherReservation)
                                    <div
                                        class="list-group-item list-group-item-action mb-3 p-4 rounded-3 shadow-sm border border-light">
                                        <p class="font-weight-bold text-dark mb-2 fs-5 d-flex align-items-center">
                                            <i class="bi bi-calendar-check-fill me-3 text-info"></i>
                                            <span
                                                class="text-primary">{{ $otherReservation->vehiculo->marca ?? 'N/A' }}
                                                {{ $otherReservation->vehiculo->modelo ?? '' }}</span> -
                                            {{ $otherReservation->fecha_presentacion ? \Carbon\Carbon::parse($otherReservation->fecha_presentacion)->format('d/m/Y') : 'Sin fecha' }}
                                        </p>
                                        <p class="text-muted mb-2">
                                            <strong>Estado:</strong>
                                            @php
                                                $otherBadge = match ($otherReservation->estado) {
                                                    'Pendiente'
                                                        => '<span class="badge bg-warning text-white rounded-pill">Pendiente</span>',
                                                    'Aprobado'
                                                        => '<span class="badge bg-success rounded-pill">Aprobado</span>',
                                                    'Rechazado'
                                                        => '<span class="badge bg-danger rounded-pill">Rechazado</span>',
                                                    default
                                                        => '<span class="badge bg-secondary rounded-pill">Desconocido</span>',
                                                };
                                            @endphp
                                            {!! $otherBadge !!}
                                        </p>
                                    </div>
                                @empty
                                    <p
                                        class="text-center text-muted p-4 bg-white rounded-3 shadow-sm border border-secondary-subtle">
                                        <i class="bi bi-exclamation-circle-fill me-2 text-warning"></i> No hay otras
                                        reservas registradas para este usuario.
                                    </p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
