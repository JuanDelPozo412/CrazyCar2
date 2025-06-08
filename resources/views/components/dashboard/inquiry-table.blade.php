@props([
    'inquiries' => [],
    'title' => 'Listado de Consultas',
    'searchPlaceholder' => 'Buscar consulta...',
    'tableId' => 'inquiries-table',
])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-100 justify-content-center justify-content-sm-end mt-3 mt-sm-0">
        <div class="input-group w-auto">
            <input type="text" class="form-control" placeholder="{{ $searchPlaceholder }}"
                aria-label="{{ $searchPlaceholder }}" aria-describedby="search-addon-{{ $tableId }}" />
            <span class="input-group-text" id="search-addon-{{ $tableId }}">
                <i class="bi bi-search"></i>
            </span>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="{{ $tableId }}" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Patente</th>
                <th>Empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $consulta)
                <tr>
                    <td>{{ $consulta->id }}</td>
                    <td>{{ $consulta->cliente?->nombre ?? 'No asignado' }}</td>
                    <td>{{ $consulta->tipo }}</td>
                    <td>{{ $consulta->estado ? 'Finalizado' : 'Pendiente' }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $consulta->patente }}</td>
                    <td>{{ $consulta->empleado?->nombre ?? 'No asignado' }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#inquiryDetailModal">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-info text-white">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteInquiry">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
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
