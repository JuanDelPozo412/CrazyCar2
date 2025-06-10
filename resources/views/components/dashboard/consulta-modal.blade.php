@props(['consulta'])

<form method="POST" action="{{ route('consultas.actualizar', $consulta->id) }}">
    @csrf
    <div class="modal fade" id="inquiryDetail{{ $consulta->id }}" tabindex="-1"
        aria-labelledby="inquiryDetail{{ $consulta->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
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
                        <li class="list-group-item"><strong>Fecha:</strong>
                            {{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}</li>
                        <li class="list-group-item"><strong>Título:</strong> {{ $consulta->titulo }}</li>
                        <li class="list-group-item"><strong>Descripción:</strong> {{ $consulta->descripcion }}</li>

                        <li class="list-group-item">
                            <strong>Estado:</strong>
                            <select class="form-select" name="estado">
                                <option value="en-proceso" {{ !$consulta->estado ? 'selected' : '' }}>En proceso
                                </option>
                                <option value="finalizado" {{ $consulta->estado ? 'selected' : '' }}>Finalizada
                                </option>
                            </select>
                        </li>

                        @if (!$consulta->empleado_id)
                            <li class="list-group-item">
                                <strong>Tomar Consulta:</strong>
                                <select class="form-select" name="tomar">
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
