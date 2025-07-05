@props(['reservations'])

<div class="mb-4">
    <h4 class="text-center text-sm-start w-100">Lista de Reservas</h4>

    <form method="GET" action="{{ route('reservation') }}"
        class="row gy-3 gx-3 align-items-center justify-content-between">
        <div class="col-12 col-md-4">
            <input type="search" name="busqueda_reserva" class="form-control border-0 bg-light  px-4 py-2 rounded-pill"
                placeholder="Buscar por nombre, apellido, DNI o marca" value="{{ request('busqueda_reserva') }}" />
        </div>

        <div class="col-12 col-md-3">
            <select name="estado" class="form-select border-0 bg-light  px-4 py-2 rounded-pill">
                <option value="" hidden>Estado</option>
                <option value="">Todos</option>
                <option value="Pendiente" {{ request('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Aprobado" {{ request('estado') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="Rechazado" {{ request('estado') == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>

        <div class="col-auto d-flex align-items-center">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="proximas" name="proximas" value="1"
                    {{ request('proximas') == '1' ? 'checked' : '' }}>
                <label class="form-check-label fw-light" for="proximas">Solo futuras</label>
            </div>
        </div>

        <div class="col-auto d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">Filtrar</button>
            <a href="{{ route('reservation') }}"
                class="btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm">Limpiar</a>
        </div>
    </form>
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
