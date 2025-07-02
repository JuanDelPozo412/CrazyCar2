@props(['maintenance'])

<div class="modal fade" id="maintenanceDetailModal{{ $maintenance->id }}" tabindex="-1"
    aria-labelledby="maintenanceDetailModalLabel{{ $maintenance->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded-3 shadow-lg overflow-hidden bg-white">
            <div
                class="modal-header bg-light text-dark p-4 d-flex justify-content-between align-items-center border-bottom">
                <h5 class="modal-title font-weight-bold" id="maintenanceDetailModalLabel{{ $maintenance->id }}">
                    <i class="bi bi-tools me-2 text-secondary"></i> Detalles de Mantenimiento <span
                        class="text-muted font-monospace">#{{ $maintenance->id }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 bg-white">
                <div class="row">
                    <div class="col-12 col-md-5 d-flex flex-column align-items-center mb-4 mb-md-0">
                        <div class="mb-4 text-center">
                            @if ($maintenance->imagen)
                                <img src="{{ asset('storage/vehiculos/' . $maintenance->imagen) }}"
                                    alt="Imagen del Mantenimiento"
                                    class="img-fluid rounded-3 shadow-sm border border-secondary-subtle"
                                    style="max-width: 400px; height: auto; object-fit: cover;" />
                            @else
                                <div class="d-flex flex-column justify-content-center align-items-center w-100 p-4 border border-dashed border-secondary-subtle rounded-3 bg-light text-secondary"
                                    style="min-height: 150px;">
                                    <i class="bi bi-image-fill mb-2 fs-1"></i>
                                    <p class="mb-0">No hay imagen disponible</p>
                                </div>
                            @endif

                        </div>

                        <div class="w-100">
                            <h6 class="text-secondary mb-3"><i class="bi bi-info-circle-fill me-2"></i> Detalles de
                                Mantenimiento Actual</h6>

                            @php
                                if (!$maintenance->relationLoaded('usuario') && $maintenance->usuario_id) {
                                    $maintenance->load('usuario');
                                }
                            @endphp

                            <p class="text-dark d-flex align-items-center mb-2">
                                <i class="bi bi-person-fill me-3 text-muted fs-5"></i><strong
                                    class="font-weight-bold">Usuario:</strong>
                                <span
                                    class="ms-2">{{ $maintenance->usuario ? $maintenance->usuario->name . ' ' . $maintenance->usuario->apellido : 'N/A' }}</span>
                            </p>
                            <p class="text-dark d-flex align-items-center mb-2">
                                <i class="bi bi-car-front-fill me-3 text-muted fs-5"></i>
                                <strong class="font-weight-bold">Patente:</strong>
                                <span class="ms-2">{{ $maintenance->patente ?? 'N/A' }}</span>
                            </p>
                            <p class="text-dark d-flex align-items-center mb-2">
                                <i class="bi bi-tag-fill me-3 text-muted fs-5"></i><strong
                                    class="font-weight-bold">Marca:</strong>
                                <span class="ms-2">{{ $maintenance->marca ?? 'N/A' }}</span>
                            </p>
                            <p class="text-dark d-flex align-items-center mb-0">
                                <i class="bi bi-box-seam-fill me-3 text-muted fs-5"></i><strong
                                    class="font-weight-bold">Modelo:</strong>
                                <span class="ms-2">{{ $maintenance->modelo ?? 'N/A' }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 d-flex flex-column justify-content-between">
                        <div class="row row-cols-1 row-cols-md-3 g-3 mb-4">
                            <div class="col">
                                <div class="card h-100 shadow-sm border-secondary-subtle">
                                    <div class="card-body text-center">
                                        <i class="bi bi-info-circle-fill text-info fs-3 mb-2"></i>
                                        <h6 class="card-title text-muted fw-bold">Motivo</h6>
                                        <p class="card-text text-dark">{{ $maintenance->motivo }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 shadow-sm border-secondary-subtle">
                                    <div class="card-body text-center">
                                        <i class="bi bi-hourglass-split text-warning fs-3 mb-2"></i>
                                        <h6 class="card-title text-muted fw-bold">Estado</h6>
                                        <p class="card-text text-dark">
                                            @php
                                                $badge = match ($maintenance->estado) {
                                                    'Nuevo'
                                                        => '<span class="badge bg-danger-subtle text-danger-emphasis rounded-pill px-3 py-2">Nuevo</span>',
                                                    'En Proceso'
                                                        => '<span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2">En Proceso</span>',
                                                    'Finalizado'
                                                        => '<span class="badge bg-success-subtle text-success-emphasis rounded-pill px-3 py-2">Finalizado</span>',
                                                    default
                                                        => '<span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill px-3 py-2">Desconocido</span>',
                                                };
                                            @endphp
                                            {!! $badge !!}
                                        </p>

                                        <form action="{{ route('mantenimiento.updateEstado', $maintenance->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <select name="estado" id="estadoSelect{{ $maintenance->id }}"
                                                class="form-select form-select-sm">
                                                <option value="Nuevo"
                                                    {{ $maintenance->estado === 'Nuevo' ? 'selected' : '' }}>Nuevo
                                                </option>
                                                <option value="En Proceso"
                                                    {{ $maintenance->estado === 'En Proceso' ? 'selected' : '' }}>En
                                                    Proceso</option>
                                                <option value="Finalizado"
                                                    {{ $maintenance->estado === 'Finalizado' ? 'selected' : '' }}>
                                                    Finalizado</option>
                                            </select>

                                            <button type="submit" class="btn btn-sm px-2 py-1 mt-3 text-white"
                                                style="background-color: rgba(13, 110, 253, 0.8)">Actualizar</button>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card h-100 shadow-sm border-secondary-subtle">
                                    <div class="card-body text-center">
                                        <i class="bi bi-calendar-check-fill text-success fs-3 mb-2"></i>
                                        <h6 class="card-title text-muted fw-bold">Fechas</h6>
                                        <p class="card-text text-dark mb-1">
                                            Inicio:
                                            {{ $maintenance->fecha_inicio ? \Carbon\Carbon::parse($maintenance->fecha_inicio)->format('d/m/Y') : '—' }}
                                        </p>
                                        <p class="card-text text-dark mb-0">
                                            Fin:
                                            {{ $maintenance->fecha_fin ? \Carbon\Carbon::parse($maintenance->fecha_fin)->format('d/m/Y') : '— En curso —' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-top border-secondary-subtle">
                            @php
                                $userMaintenances = collect();
                                if ($maintenance->usuario) {
                                    $userMaintenances = \App\Models\Mantenimiento::where(
                                        'usuario_id',
                                        $maintenance->usuario_id,
                                    )
                                        ->where('id', '!=', $maintenance->id)
                                        ->orderByDesc('created_at')
                                        ->get();
                                }
                            @endphp

                            <h6
                                class="font-weight-bold text-dark mb-4 text-center d-flex align-items-center justify-content-center">
                                <i class="bi bi-list-check me-3 text-secondary"></i> Otros Mantenimientos de
                                <span
                                    class="text-primary ms-2">{{ $maintenance->usuario ? $maintenance->usuario->name . ' ' . $maintenance->usuario->apellido : 'este Usuario' }}</span>:
                            </h6>
                            <div
                                class="list-group max-h-96 overflow-y-auto border border-secondary-subtle rounded-3 p-3 bg-light custom-scrollbar">
                                @forelse ($userMaintenances as $otherMaintenance)
                                    <div
                                        class="list-group-item list-group-item-action mb-3 p-4 rounded-3 shadow-sm border border-light transition-all duration-300 hover:shadow-lg last:mb-0">
                                        <p class="font-weight-bold text-dark mb-2 fs-5 d-flex align-items-center">
                                            <i class="bi bi-patch-check-fill me-3 text-info"></i>
                                            <span class="text-primary">{{ $otherMaintenance->patente ?? 'N/A' }}</span>
                                            - {{ $otherMaintenance->motivo }}
                                        </p>
                                        <p class="text-muted mb-2 d-flex align-items-center gap-2">
                                            <span class="font-weight-semibold">Estado:</span>
                                            @php
                                                $otherBadge = match ($otherMaintenance->estado) {
                                                    'Nuevo'
                                                        => '<span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Nuevo</span>',
                                                    'En Proceso'
                                                        => '<span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">En Proceso</span>',
                                                    'Finalizado'
                                                        => '<span class="badge bg-success-subtle text-success-emphasis rounded-pill">Finalizado</span>',
                                                    default
                                                        => '<span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Desconocido</span>',
                                                };
                                            @endphp
                                            {!! $otherBadge !!}
                                        </p>
                                        <p class="text-muted d-flex align-items-center">
                                            <span class="font-weight-semibold">Fechas:</span>
                                            <span
                                                class="ms-2">{{ $otherMaintenance->fecha_inicio ? \Carbon\Carbon::parse($otherMaintenance->fecha_inicio)->format('d/m/Y') : '—' }}</span>
                                            <i class="bi bi-arrow-right-short mx-1 text-secondary"></i>
                                            <span
                                                class="ms-1">{{ $otherMaintenance->fecha_fin ? \Carbon\Carbon::parse($otherMaintenance->fecha_fin)->format('d/m/Y') : '— En curso —' }}</span>
                                        </p>
                                    </div>
                                @empty
                                    <p
                                        class="text-center text-muted p-4 bg-white rounded-3 shadow-sm border border-secondary-subtle">
                                        <i class="bi bi-exclamation-circle-fill me-2 text-warning"></i> No hay otros
                                        mantenimientos registrados para este usuario.
                                    </p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 12px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f0f2f5;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #adb5bd;
        border-radius: 10px;
        border: 3px solid #f0f2f5;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #6c757d;
    }

    .max-h-96 {
        max-height: 24rem;
    }
</style>
