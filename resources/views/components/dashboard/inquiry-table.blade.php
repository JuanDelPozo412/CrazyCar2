@props([
    'inquiries' => [],
    'title' => 'Listado de Consultas',
    'searchPlaceholder' => 'Buscar...',
    'tableId' => 'inquiries-table',
])


<div class="table-responsive">
    <div class="d-flex justify-content-between align-items-center mb-3 mt-3 flex-column flex-sm-row">
        <h4 class="mt-2 text-center text-sm-start w-100">Lista de Consultas</h4>

        <div class="d-flex gap-2 w-100 justify-content-center justify-content-sm-end mt-3 mt-sm-0">
            <div class="input-group w-auto">
                <input type="text" class="form-control" placeholder="Buscar Cliente" />
                <span class="input-group-text"><i class="bi bi-search"></i></span>
            </div>
        </div>
    </div>

    <table id="inquiry" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Cliente</th>
                <th>T. Consulta</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Patente</th>
                <th>Asignada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $inq)
                <tr>
                    <td>{{ $inq->cliente }}</td>
                    <td>{{ $inq->tipo }}</td>
                    <td>
                        @php
                            $estadoColors = [
                                'En Proceso' => 'warning',
                                'Nueva' => 'danger',
                                'Finalizada' => 'success',
                            ];
                        @endphp
                        <span class="badge bg-{{ $estadoColors[$inq->estado] ?? 'secondary' }} text-white">
                            {{ $inq->estado }}
                        </span>
                    </td>
                    <td>{{ $inq->fecha }}</td>
                    <td class="text-center">{{ $inq->patente ?? '-' }}</td>
                    <td class="text-center">
                        @if ($inq->asignada)
                            <span class="badge text-white" style="background-color: rgba(23, 162, 184, 0.9)">
                                {{ $inq->asignada }}
                            </span>
                        @else
                            <span class="badge bg-secondary text-white">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm text-white" style="background-color: rgba(13, 110, 253, 0.8)">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm text-white" style="background-color: rgba(23, 162, 184, 0.9)">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteInquiry">
                                <i class="bi bi-trash"></i>
                            </button>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay consultas disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
