<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-primary">Editar perfil</h1>
            <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">Volver al perfil</a>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12 personal-info">

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h3>Información Personal</h3>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')

                    <div class="row">

                        <div class="col-md-3">
                            <div class="text-center">

                                @if ($user->imagen)
                                  <img src="{{ asset('storage/images/' . $user->imagen) }}" alt="Foto de perfil"
                                        class="rounded-circle" width="150"
                                        style="height: 150px; object-fit: cover;" />
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="Foto de perfil"
                                        class="rounded-circle" width="150" />
                                @endif
                                <h6 class="mt-2">Cargar una nueva foto</h6>
                                <input type="file" name="imagen" class="form-control">

                                @error('avatar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </form>


                <div class="col-md-9">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Nombre:</label>
                        <input class="form-control" type="text" name="name"
                            value="{{ old('name', $user->name) }}" />
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Apellido:</label>
                        <input class="form-control" type="text" name="apellido"
                            value="{{ old('apellido', $user->apellido) }}" />
                        @error('apellido')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">dni:</label>
                        <input class="form-control" type="number" name="dni"
                            value="{{ old('dni', $user->dni) }}" />
                        @error('dni')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Teléfono:</label>
                        <input class="form-control" type="number" name="telefono"
                            value="{{ old('telefono', $user->telefono) }}" />
                        @error('telefono')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Dirección:</label>
                        <input class="form-control" type="text" name="direccion"
                            value="{{ old('direccion', $user->direccion) }}" />
                        @error('direccion')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Email (no se puede cambiar):</label <input
                            class="form-control" type="email" value="{{ $user->email }}" disabled />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mt-3" type="submit">Guardar Cambios</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
```
