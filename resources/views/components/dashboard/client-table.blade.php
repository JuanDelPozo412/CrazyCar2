@props([
    'clients' => [],
    'title' => 'Listado de Clientes',
    'searchPlaceholder' => 'Buscar cliente...',
    'tableId' => 'clients-table',
])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-100 justify-content-center justify-content-sm-end mt-3 mt-sm-0">
        <form method="GET" action="{{ route('clientes') }}" class="input-group w-auto">
            <input type="text" name="busqueda" class="form-control"
                placeholder="{{ $searchPlaceholder }}"
                value="{{ request('busqueda') }}"
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
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Email</th>
                <th class="text-center" style="width: 1%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->apellido }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->email }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm text-white btn-primary" data-bs-toggle="modal"
                            data-bs-target="#clientDetailModal{{ $client->id }}">
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>
                </tr>

                <x-dashboard.client-modal :client="$client" />
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay clientes disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
