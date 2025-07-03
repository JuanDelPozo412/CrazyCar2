<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservar Vehículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-primary">Reservar Vehículo</h1>
            <a href="{{ route('clientes') }}" class="btn btn-outline-secondary">Volver al Perfil</a>
        </div>
        <hr />

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Formulario de Reserva</div>
                    <div class="card-body">
                        {{-- Mensajes de éxito o error --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="#" method="POST">
                            @csrf

                            {{-- Datos del vehículo --}}
                            <h5>Datos del Vehículo</h5>
                            <div class="row g-3">
                                <!-- Imagen del vehiculo
                                <div class="col-12 mb-3 text-center">
                                    <img src="{{ $vehiculo->imagen ? asset('storage/' . $vehiculo->imagen) : asset('images/auto2.png') }}"
                                        class="img-fluid rounded" style="max-height: 200px;"
                                        alt="{{ $vehiculo->marca }} {{ $vehiculo->modelo }}">
                                </div>
                                -->
                                <div class="col-md-4">
                                    <label class="form-label">Marca</label>
                                    <input type="text" name="marca" class="form-control" value="{{ $vehiculo->marca }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Modelo</label>
                                    <input type="text" name="modelo" class="form-control" value="{{ $vehiculo->modelo }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Año</label>
                                    <input type="text" name="anio" class="form-control" value="{{ $vehiculo->anio }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Color</label>
                                    <input type="text" name="color" class="form-control" value="{{ $vehiculo->color }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Tipo</label>
                                    <input type="text" name="tipo" class="form-control" value="{{ $vehiculo->tipo }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Combustible</label>
                                    <input type="text" name="combustible" class="form-control" value="{{ $vehiculo->combustible }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Precio</label>
                                    <input type="text" name="precio" class="form-control" value="{{ $vehiculo->precio }}" readonly>
                                </div>
                            </div>

                            <hr>

                            {{-- Datos del usuario --}}
                            <h5>Datos del Usuario</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{ $usuario->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" value="{{ $usuario->apellido }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">DNI</label>
                                    <input type="text" name="dni" class="form-control" value="{{ old('dni') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Fecha de Solicitud</label>
                                    <input type="date" name="fecha_solicitud" class="form-control" value="{{ old('fecha_solicitud', date('Y-m-d')) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Fecha de Presentación</label>
                                    <input type="date" name="fecha_presentacion" class="form-control" value="{{ old('fecha_presentacion') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Hora de Presentación</label>
                                    <input type="time" name="hora_presentacion" class="form-control" value="{{ old('hora_presentacion') }}">
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Solicitar Reserva</button>
                                <a href="{{ route('clientes') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
