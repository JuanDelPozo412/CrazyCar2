@props(['consulta'])

@php
    $usuario = auth()->user();
    $isDisabled = (
        $usuario->rol !== 'admin' &&
        ($consulta->empleado_id && $consulta->empleado_id !== $usuario->id)
    ) || $consulta->estado === 'Finalizada';
@endphp

<form method="POST" action="{{ route('consultas.actualizar', $consulta->id) }}">
    @csrf
    @method('PUT')

    <div class="modal fade" id="inquiryDetail{{ $consulta->id }}" tabindex="-1"
        aria-labelledby="inquiryDetail{{ $consulta->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header text-white" style="background-color: rgba(23, 162, 184, 0.9)">
                    <h5 class="modal-title" id="inquiryDetail{{ $consulta->id }}Label">Detalle de la Consulta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item"><strong>Nombre y Apellido:</strong> {{ $consulta->cliente?->name }}
                            {{ $consulta->cliente?->apellido }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $consulta->cliente?->email }}</li>
                        <li class="list-group-item"><strong>Tipo de Consulta:</strong> {{ $consulta->tipo }}</li>

                        <li class="list-group-item"><strong>Título:</strong> {{ $consulta->titulo }}</li>
                        <li class="list-group-item"><strong>Descripción:</strong> {{ $consulta->descripcion }}</li>

                        <li class="list-group-item">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <strong>Fecha:</strong>
                                    <input type="date" class="form-control" name="fecha"
                                        value="{{ \Carbon\Carbon::parse($consulta->fecha)->format('Y-m-d') }}" required
                                        {{ $isDisabled ? 'disabled' : '' }}>
                                </div>
                                <div class="col-md-6">
                                    <strong>Horario:</strong>
                                    <input type="time" class="form-control" name="horario"
                                        value="{{ \Carbon\Carbon::parse($consulta->horario)->format('H:i') }}" required
                                        {{ $isDisabled ? 'disabled' : '' }}>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <strong>Estado:</strong>
                            <select class="form-select" name="estado" {{ $isDisabled ? 'disabled' : '' }}>
                                <option value="Nueva" {{ $consulta->estado === 'Nueva' ? 'selected' : '' }}>Nueva
                                </option>
                                <option value="En Proceso" {{ $consulta->estado === 'En Proceso' ? 'selected' : '' }}>
                                    En Proceso</option>
                                <option value="Finalizada" {{ $consulta->estado === 'Finalizada' ? 'selected' : '' }}>
                                    Finalizada</option>
                            </select>
                        </li>

                        @if (!$consulta->empleado_id)
                            <li class="list-group-item">
                                <strong>Tomar Consulta:</strong>
                                <select class="form-select" name="tomar" {{ $isDisabled ? 'disabled' : '' }}>
                                    <option value="">-- Seleccionar --</option>
                                    <option value="si">Tomar Consulta</option>
                                    <option value="no">No Tomar Consulta</option>
                                </select>
                            </li>
                        @else
                            <li class="list-group-item"><strong>Empleado asignado:</strong>
                                {{ $consulta->empleado?->name }}</li>
                        @endif
                    </ul>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" style="background-color: rgba(23, 162, 184, 0.9)" class="btn text-white"
                        {{ $isDisabled ? 'disabled' : '' }}>Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
