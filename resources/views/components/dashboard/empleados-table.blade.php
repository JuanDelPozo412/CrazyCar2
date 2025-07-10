@props([
    'employees' => [],
    'title' => 'Listado de Empleados',
    'searchPlaceholder' => 'Buscar empleado...',
    'tableId' => 'employees-table',
    'initialDisplayCount' => 6,
])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-50 justify-content-center justify-content-sm-end mt-3 mt-sm-0 flex-wrap">
        <form method="GET" action="{{ route('empleados') }}" class="input-group" style="min-width: 250px;">
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
                <th>Rol</th>
                <th class="text-center" style="width: 1%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $index => $employee)
                <tr @class([
                    'hidden-employee-row d-none' => $index >= $initialDisplayCount,
                ])>
                    <td class="text-center">
                        <img src="{{ asset('storage/images/' . ($employee->imagen ?? 'user-image.png')) }}"
                            alt="Imagen de {{ $employee->name }}" class="rounded-circle"
                            style="width:40px; height:40px; object-fit:cover;">
                    </td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->apellido }}</td>
                    <td>{{ $employee->dni }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ ucfirst($employee->rol) }}</td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-sm text-white btn-primary" data-bs-toggle="modal"
                                data-bs-target="#employeeDetailModal{{ $employee->id }}">
                                <i class="bi bi-eye"></i>
                            </button>

                            <button class="btn btn-sm text-white" style="background-color: rgba(23, 162, 184, 0.9)"
                                data-bs-toggle="modal" data-bs-target="#employeeEditModal{{ $employee->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>

                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteEmpleado" data-id="{{ $employee->id }}">
                                <i class="bi bi-trash"></i>
                            </button>

                        </div>
                    </td>
                </tr>

                {{-- Puedes crear componentes modales para detalles y edición si quieres --}}
                {{-- <x-dashboard.employee.employee-modal :employee="$employee" /> --}}
                {{-- <x-dashboard.employee.employee-edit-modal :employee="$employee" /> --}}

            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay empleados disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if (count($employees) > $initialDisplayCount)
    <div class="text-center mt-3">
        <button id="toggle-employees-btn" class="btn text-white" style="background-color: #d63041" type="button">
            Mostrar más empleados
        </button>
    </div>
@endif

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggle-employees-btn');
            let expanded = false;

            toggleButton?.addEventListener('click', function() {
                const rows = document.querySelectorAll('.hidden-employee-row');

                rows.forEach(row => row.classList.toggle('d-none'));

                expanded = !expanded;
                toggleButton.textContent = expanded ? 'Ocultar empleados' : 'Mostrar más empleados';
            });
        });
    </script>
@endpush
