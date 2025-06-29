@props(['title', 'searchPlaceholder', 'tableId', 'columns', 'vehicles'])

<div class="d-flex justify-content-between align-items-center mb-3 mt-5 flex-column flex-sm-row">
    <h4 class="text-center text-sm-start w-100">{{ $title }}</h4>

    <div class="d-flex gap-2 w-100 justify-content-center justify-content-sm-end mt-3 mt-sm-0">
        <form method="GET" action="{{ route('vehiculos') }}" class="input-group w-auto">
            <input type="text" name="busqueda_venta" class="form-control" placeholder="{{ $searchPlaceholder }}"
                value="{{ request('busqueda_venta') }}" aria-label="{{ $searchPlaceholder }}"
                aria-describedby="search-addon-{{ $tableId }}" />

            <button type="submit" class="input-group-text" id="search-addon-{{ $tableId }}">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</div>

<div class="table-responsive mb-5">
    <table id="{{ $tableId }}" class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                @foreach ($columns as $col)
                    <th>{{ $col }}</th>
                @endforeach
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    @foreach ($columns as $colKey => $colLabel)
                        @php
                            $key = strtolower(str_replace(' ', '', $colLabel));
                            $value = $vehicle->$key ?? '';
                        @endphp

                        @if ($colKey === 'Precio')
                            <td>${{ number_format($value, 2, ',', '.') }}</td>
                        @else
                            <td>{{ $value }}</td>
                        @endif
                    @endforeach

                    <td>
                        <x-dashboard.action-buttons :vehicle="$vehicle" />

                        <x-dashboard.vehicle-detail-modal :vehicle="$vehicle" modalId="vehicleSellDetailModal"
                            modalTitle="Detalles del Vehículo" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
