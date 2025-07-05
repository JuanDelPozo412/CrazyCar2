@props(['consulta'])

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
                        {{ $consulta->cliente?->apellido }}
                    </li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $consulta->cliente?->email }}</li>
                    <li class="list-group-item"><strong>Tipo de Consulta:</strong> {{ $consulta->tipo }}</li>

                    <li class="list-group-item"><strong>Título:</strong> {{ $consulta->titulo }}</li>
                    <li class="list-group-item"><strong>Descripción:</strong> {{ $consulta->descripcion }}</li>

                    <li class="list-group-item">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <strong>Fecha:</strong>
                                <span>{{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}</span>
                            </div>
                            <div class="col-md-6">
                                <strong>Horario:</strong>
                                <span>{{ \Carbon\Carbon::parse($consulta->horario)->format('H:i') }}</span>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <strong>Estado:</strong>
                        <span class="badge bg-info text-dark">{{ $consulta->estado }}</span>
                    </li>

                    @if ($consulta->empleado_id)
                        <li class="list-group-item"><strong>Empleado asignado:</strong>
                            {{ $consulta->empleado?->name }}
                        </li>
                    @endif
                </ul>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
