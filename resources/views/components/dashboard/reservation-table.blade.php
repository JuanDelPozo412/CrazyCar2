@props(['reservations'])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">Lista de Reservas</h4>

    <div class="d-flex gap-2 w-50 justify-content-center justify-content-sm-end mt-3 mt-sm-0 flex-wrap">
        <form method="GET" action="{{ route('reservation') }}" class="input-group" style="min-width: 100px;">
            <input type="text" name="busqueda_reserva" class="form-control" placeholder="Buscar reserva..."
                value="{{ request('busqueda_reserva') }}" aria-label="Buscar reserva..."
                aria-describedby="search-addon" />
            <button type="submit" class="input-group-text" id="search-addon">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $index => $reservation)
                @php
                    $badge = match ($reservation->estado) {
                        'Pendiente' => '<span class="badge bg-warning text-white">Pendiente</span>',
                        'Aprobado' => '<span class="badge bg-success">Aprobado</span>',
                        'Rechazado' => '<span class="badge bg-danger">Rechazado</span>',
                        default => '<span class="badge bg-secondary">Desconocido</span>',
                    };
                @endphp
                <tr @class(['hidden-reservation-row d-none' => $index >= 6])>
                    <td>{{ $reservation->usuario->name ?? 'N/A' }}</td>
                    <td>{{ $reservation->usuario->apellido ?? 'N/A' }}</td>
                    <td>{{ $reservation->usuario->dni ?? 'N/A' }}</td>
                    <td>{{ $reservation->vehiculo->marca ?? 'N/A' }}</td>
                    <td>{{ $reservation->vehiculo->modelo ?? 'N/A' }}</td>
                    <td>
                        {{ $reservation->fecha_presentacion
                            ? \Carbon\Carbon::parse($reservation->fecha_presentacion)->format('d/m/Y')
                            : 'Sin fecha' }}
                    </td>
                    <td>
                        {{ $reservation->hora_presentacion
                            ? \Carbon\Carbon::parse($reservation->hora_presentacion)->format('H:i')
                            : 'Sin hora' }}
                    </td>
                    <td>{!! $badge !!}</td>
                    <td class="text-center">
                        <button class="btn text-white btn-sm w-100" style="background-color: rgba(13, 110, 253, 0.8)"
                            title="Ver mantenimiento" data-bs-toggle="modal"
                            data-bs-target="#reservationDetailModal{{ $reservation->id }}">
                            <i class="bi bi-eye"></i>
                        </button>
                        <x-dashboard.reservation-detail-modal :reservation="$reservation" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No hay reservas registradas</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>

@if (count($reservations) > 6)
    <div class="text-center mt-3">
        <button id="toggle-reservations-btn" class="btn text-white" style="background-color: rgba(13, 110, 253, 0.8)"
            type="button">
            Mostrar más reservas
        </button>
    </div>
@endif

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleReservationButton = document.getElementById('toggle-reservations-btn');
            let reservationExpanded = false;

            toggleReservationButton?.addEventListener('click', function() {
                const reservationRows = document.querySelectorAll('.hidden-reservation-row');
                reservationRows.forEach(row => row.classList.toggle('d-none'));

                reservationExpanded = !reservationExpanded;
                toggleReservationButton.textContent = reservationExpanded ?
                    'Ocultar reservas' :
                    'Mostrar más reservas';
            });
        });
    </script>
@endpush
