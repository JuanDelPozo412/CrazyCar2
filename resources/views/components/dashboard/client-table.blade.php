@props([
    'clients' => [],
    'title' => 'Listado de Clientes',
    'searchPlaceholder' => 'Buscar cliente...',
    'tableId' => 'clients-table',
    'initialDisplayCount' => 6,
])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-100 justify-content-center justify-content-sm-end mt-3 mt-sm-0">
        <form method="GET" action="{{ route('clientes') }}" class="input-group w-auto">
            <input type="text" name="busqueda" class="form-control" placeholder="{{ $searchPlaceholder }}"
                value="{{ request('busqueda') }}" aria-label="{{ $searchPlaceholder }}"
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
                @if ($index < $initialDisplayCount)
                    <tr>
                        <td class="text-center">
                            <img src="{{ asset('storage/images/' . ($client->imagen ?? 'icon-person.jpg')) }}"
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
                        </td>
                    </tr>
                    <x-dashboard.client-modal :client="$client" />
                @else
                    <tr class="collapse" id="collapseClientRow{{ $client->id }}"
                        data-bs-parent="#{{ $tableId }}-body-collapse">
                        <td class="text-center">
                            <img src="{{ asset('storage/images/' . ($client->imagen ?? 'icon-person.jpg')) }}"
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
                        </td>
                    </tr>
                    <x-dashboard.client-modal :client="$client" />
                @endif
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
        <button id="toggle-clients-btn" class="btn btn-primary text-white" type="button">
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
                const rows = document.querySelectorAll('tr.collapse');

                rows.forEach(row => {
                    if (expanded) {
                        row.classList.remove('show');
                    } else {
                        row.classList.add('show');
                    }
                });

                expanded = !expanded;
                toggleButton.textContent = expanded ? 'Ocultar clientes' : 'Mostrar más clientes';
            });
        });
    </script>
@endpush
