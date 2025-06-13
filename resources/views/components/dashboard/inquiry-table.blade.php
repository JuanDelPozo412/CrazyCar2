@props([
    'inquiries' => [],
    'title' => 'Listado de Consultas',
    'searchPlaceholder' => 'Buscar consulta...',
    'tableId' => 'inquiries-table',
])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-100 justify-content-center justify-content-sm-end mt-3 mt-sm-0">
        <form method="GET" action="{{ route('clientes') }}" class="input-group w-auto">
            <input type="text" name="busqueda_consulta" class="form-control"
                placeholder="{{ $searchPlaceholder }}"
                value="{{ request('busqueda_consulta') }}"
                aria-label="{{ $searchPlaceholder }}"
                aria-describedby="search-addon-{{ $tableId }}" />

            <button type="submit" class="input-group-text" id="search-addon-{{ $tableId }}">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table id="{{ $tableId }}" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Cliente</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $consulta)
                <tr>
                    <td>{{ $consulta->cliente?->name ?? 'No asignado' }}</td>
                    <td>{{ $consulta->cliente?->apellido ?? 'No asignado' }}</td>
                    <td>{{ $consulta->cliente?->email ?? 'No asignado' }}</td>
                    <td>{{ $consulta->tipo }}</td>
                    <td>{{ $consulta->estado ? 'Finalizado' : 'Pendiente' }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $consulta->empleado?->name ?? 'No asignado' }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#inquiryDetail{{ $consulta->id }}">
                            <i class="bi bi-eye"></i>
                        </button>


                        @foreach ($inquiries as $consulta)
                            <x-dashboard.consulta-modal :consulta="$consulta" />
                        @endforeach

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No hay consultas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
