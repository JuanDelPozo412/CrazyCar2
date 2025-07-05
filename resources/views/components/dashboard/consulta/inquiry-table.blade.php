@props([
    'inquiries' => [],
    'title' => 'Listado de Consultas',
    'searchPlaceholder' => 'Buscar consulta...',
    'tableId' => 'inquiries-table',
    'initialDisplayCount' => 6,
])

<div class="mb-4">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <form method="GET" action="{{ route('clientes') }}" class="row gy-3 gx-3 align-items-center justify-content-between">
        <div class="col-12 col-md-5">
            <input type="search" name="busqueda_consulta" class="form-control border-0 bg-light rounded-pill px-4 py-2"
                placeholder="{{ $searchPlaceholder }}" value="{{ request('busqueda_consulta') }}" />
        </div>

        <div class="col-12 col-md-3">
            <select name="estado" class="form-select border-0 bg-light rounded-pill px-4 py-2">
                <option value="" hidden>Estado</option>
                <option value="">Todos</option>
                <option value="Nueva" {{ request('estado') == 'Nueva' ? 'selected' : '' }}>Nueva</option>
                <option value="En Proceso" {{ request('estado') == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                <option value="Finalizada" {{ request('estado') == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
            </select>
        </div>

        <div class="col-auto d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">Filtrar</button>
            <a href="{{ route('clientes') }}"
                class="btn btn-outline-secondary rounded-pill px-4 py-2 shadow-sm">Limpiar</a>
        </div>
    </form>
</div>

<div class="table-responsive">
    <table id="{{ $tableId }}" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Cliente</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Horario</th>
                <th>Empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $index => $consulta)
                <tr @class([
                    'hidden-inquiry-row d-none' => $index >= $initialDisplayCount,
                ])>
                    <td>
                        @php
                            $nombre = $consulta->cliente?->name ?? $consulta->nombre_guest;
                            $apellido = $consulta->cliente?->apellido ?? $consulta->apellido_guest;
                        @endphp

                        {{ $nombre && $apellido ? "$nombre $apellido" : 'No asignado' }}
                    </td>

                    <td>@php
                        $email = $consulta->cliente?->email ?? $consulta->email_guest;
                    @endphp
                        {{ $email ?? 'No asignado' }}

                    <td>{{ $consulta->tipo }}</td>
                    <td>
                        @switch($consulta->estado)
                            @case('Nueva')
                                <span class="badge bg-danger">Nueva</span>
                            @break

                            @case('En Proceso')
                                <span class="badge bg-warning text-white">En Proceso</span>
                            @break

                            @case('Finalizada')
                                <span class="badge bg-success">Finalizada</span>
                            @break

                            @default
                                {{ $consulta->estado }}
                        @endswitch
                    </td>
                    <td>{{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->horario)->format('H:i') ?? 'No asignado' }}</td>
                    <td>
                        @if ($consulta->empleado)
                            @if ($consulta->empleado->id === auth()->id())
                                <span class="badge"
                                    style="background-color: rgba(13, 110, 253, 0.8)">{{ $consulta->empleado->name }}</span>
                            @else
                                <span class="badge"
                                    style="background-color: #c5c5c5">{{ $consulta->empleado->name }}</span>
                            @endif
                        @else
                            <span class="badge" style="background-color: #a4a4a4;">No asignado</span>
                        @endif
                    </td>

                    <td class="text-center">
                        <button class="btn btn-sm text-white" style="background-color: rgba(23, 162, 184, 0.9)"
                            data-bs-toggle="modal" data-bs-target="#inquiryDetail{{ $consulta->id }}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteInquiry" data-id="{{ $consulta->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <x-dashboard.consulta.consulta-edit-modal :consulta="$consulta" />
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay consultas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if (count($inquiries) > $initialDisplayCount)
        <div class="text-center mt-2">
            <button id="toggle-inquiries-btn" class="btn text-white" type="button"
                style="background-color: rgba(13, 110, 253, 0.8)">
                Mostrar más consultas
            </button>
        </div>
    @endif

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleButton = document.getElementById('toggle-inquiries-btn');
                let expanded = false;

                toggleButton?.addEventListener('click', function() {
                    const rows = document.querySelectorAll('.hidden-inquiry-row');

                    rows.forEach(row => row.classList.toggle('d-none'));

                    expanded = !expanded;
                    toggleButton.textContent = expanded ? 'Ocultar consultas' : 'Mostrar más consultas';
                });
            });
        </script>
    @endpush
