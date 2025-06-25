@props(['consulta'])

<div class="modal fade" id="deleteInquiryModal{{ $consulta->id }}" tabindex="-1"
    aria-labelledby="deleteInquiryModalLabel{{ $consulta->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('consultas.destroy', $consulta->id) }}">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteInquiryModalLabel{{ $consulta->id }}">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar la consulta del cliente
                    <strong>{{ $consulta->cliente?->name ?? 'Desconocido' }}</strong> con fecha
                    <strong>{{ \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') }}</strong>?
                    Esta acción no se puede deshacer.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
