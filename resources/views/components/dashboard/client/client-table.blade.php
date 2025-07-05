@props([
    'clients' => [],
    'title' => 'Listado de Clientes',
    'searchPlaceholder' => 'Buscar cliente...',
    'tableId' => 'clients-table',
    'initialDisplayCount' => 6,
])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-50 justify-content-center justify-content-sm-end mt-3 mt-sm-0 flex-wrap">
        <form method="GET" action="{{ route('clientes') }}" class="input-group" style="min-width: 250px;">
            <input type="text" name="busqueda" class="form-control border-0 bg-light rounded-start-pill px-4 py-2"
                placeholder="{{ $searchPlaceholder }}" value="{{ request('busqueda') }}"
                aria-label="{{ $searchPlaceholder }}" aria-describedby="search-addon-{{ $tableId }}"
                style="box-shadow: none !important; outline: none !important;" />

            <button type="submit"
                class="btn btn-primary rounded-end-pill px-3 py-2 d-flex align-items-center justify-content-center shadow-sm"
                id="search-addon-{{ $tableId }}" style="box-shadow: none !important; outline: none !important;">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

</div>

<div class="table-responsive">
    <table id="{{ $tableId }}" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Email</th>
                <th class="text-center" style="width: 1%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $index => $client)
                <tr @class([
                    'hidden-client-row d-none' => $index >= $initialDisplayCount,
                ])>
                    <td class="text-center">
                        <img src="{{ asset('storage/images/' . ($client->imagen ?? 'user-image.png')) }}"
                            alt="Imagen de {{ $client->name }}" class="rounded-circle"
                            style="width:40px; height:40px; object-fit:cover;">

                    </td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->apellido }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->email }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm text-white btn-primary" data-bs-toggle="modal"
                            data-bs-target="#clientDetailModal{{ $client->id }}">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-sm text-white" style="background-color: rgba(23, 162, 184, 0.9)"
                            data-bs-toggle="modal" data-bs-target="#clientEditModal{{ $client->id }}">
                            <i class="bi bi-pencil"></i>
                        </button>

                    </td>
                </tr>
                <x-dashboard.client.client-modal :client="$client" />
                <x-dashboard.client.client-edit-modal :client="$client" />

            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay clientes disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if (count($clients) > $initialDisplayCount)
    <div class="text-center mt-3">
        <button id="toggle-clients-btn" class="btn text-white" style="background-color: rgba(13, 110, 253, 0.8)"
            type="button">
            Mostrar más clientes
        </button>
    </div>
@endif

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggle-clients-btn');
            let expanded = false;

            toggleButton?.addEventListener('click', function() {
                const rows = document.querySelectorAll('.hidden-client-row');

                rows.forEach(row => row.classList.toggle('d-none'));

                expanded = !expanded;
                toggleButton.textContent = expanded ? 'Ocultar clientes' : 'Mostrar más clientes';
            });
        });
    </script>
@endpush
