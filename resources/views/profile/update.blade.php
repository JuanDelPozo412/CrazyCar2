<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Editar Perfil</title>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-primary mt-3">Editar perfil</h1>
        <a href="{{ route('profile.show') }}">Volver al perfil</a>
        <hr />
        <div class="row">
            <div class="col-md-12 personal-info">

                {{-- Mensaje de éxito después de actualizar --}}
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
                                <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://via.placeholder.com/150' }}" class="avatar img-circle img-thumbnail mb-2" alt="avatar" />
                                <h6>Cargar una nueva foto</h6>
                                <input type="file" name="avatar" class="form-control">
                                @error('avatar')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="form-group mb-3">
                                <label class="form-label">Nombre:</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}" />
                                @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Apellido:</label>                                                                                                                                                                             
                                <input class="form-control" type="text" name="apellido" value="{{ old('apellido', $user->apellido) }}" />
                                @error('apellido')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Teléfono:</label>
                                <input class="form-control" type="text" name="telefono" value="{{ old('telefono', $user->telefono) }}" />
                                @error('telefono')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                             <div class="form-group mb-3">
                                <label class="form-label">Dirección:</label>
                                <input class="form-control" type="text" name="direccion" value="{{ old('direccion', $user->direccion) }}" />
                                @error('direccion')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email (no se puede cambiar):</label>
                                <input class="form-control" type="email" value="{{ $user->email }}" disabled />
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