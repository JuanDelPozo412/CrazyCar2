@props(['clients'])

<div class="modal fade" id="createInquiryModal" tabindex="-1" aria-labelledby="createInquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('consultas.store') }}" method="POST">
                @csrf

                <div class="modal-header text-white p-4 border-bottom" style="background-color: rgba(23, 162, 184, 0.9)">
                    <h5 class="modal-title fw-bold d-flex align-items-center" id="createInquiryModalLabel">
                        <i class="bi bi-chat-dots me-2"></i> Crear Consulta
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>

                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label for="usuario_id" class="form-label">Cliente</label>
                        <select class="form-select" name="usuario_id" required>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }} {{ $client->apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-select" name="tipo" required>
                            <option value="">Seleccione un tipo</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                            <option value="Compra">Compra</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="horario" class="form-label">Horario</label>
                        <input type="time" class="form-control" name="horario" required>
                    </div>

                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" name="titulo" required>
                    </div>
                    <div class="col-12">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn text-white"
                        style="background-color: rgba(23, 162, 184, 0.9)">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
