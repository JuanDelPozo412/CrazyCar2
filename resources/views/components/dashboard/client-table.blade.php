@props([
    'clients' => [],
    'title' => 'Listado de Clientes',
    'searchPlaceholder' => 'Buscar cliente...',
    'tableId' => 'clients-table',
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
                {{-- <th>ID</th> --}}
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    {{-- <td>{{ $client->id }}</td> --}}
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->apellido }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->email }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm text-white" style="background-color: rgba(13, 110, 253, 0.8)"
                                data-bs-toggle="modal" data-bs-target="#vehicleDetailModal">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm text-white" style="background-color: rgba(23, 162, 184, 0.9)">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteClient">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay clientes disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
