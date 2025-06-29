<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Nueva Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-primary">Crear Nueva Consulta</h1>

            <a href="{{ route('clientes') }}" class="btn btn-outline-secondary">Volver al Perfil</a>
        </div>
        <hr />

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de Consulta</div>
                    <div class="card-body">

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <form action="{{ route('consultas.storeForClient') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="tipo" class="form-label">Tipo de Consulta</label>
                                    <select class="form-select @error('tipo') is-invalid @enderror" name="tipo" id="tipo" required>
                                        <option value="">Seleccione un tipo</option>
                                        <option value="Mantenimiento" {{ old('tipo') == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                                        <option value="Compra" {{ old('tipo') == 'Compra' ? 'selected' : '' }}>Compra</option>

                                    </select>
                                    @error('tipo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="titulo" class="form-label">Título</label>
                                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}" required maxlength="255">
                                    @error('titulo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required>
                                    @error('fecha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="horario" class="form-label">Horario</label>
                                    <input type="time" class="form-control @error('horario') is-invalid @enderror" id="horario" name="horario" value="{{ old('horario') }}" required>
                                    @error('horario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Enviar Consulta</button>
                                    <a href="{{ route('clientes') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>