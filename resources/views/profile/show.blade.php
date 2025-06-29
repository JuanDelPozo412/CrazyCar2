{{-- resources/views/profile/show.blade.php --}}

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de {{ $user->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-lg bg-white shadow-sm">
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ route('home') }}">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if ($user->profile_photo_path)
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto de perfil" class="rounded-circle" width="150" style="height: 150px; object-fit: cover;" />
                                @else

                                <img src="{{ asset('images/foto-perfil-default.jpg') }}" alt="Foto de perfil" class="rounded-circle" width="150" />
                                @endif
                                <div class="mt-3">
                                    <h4>{{ $user->name }} {{ $user->apellido }}</h4>
                                    <p class="text-secondary mb-1">{{ $user->rol }}</p>
                                    <p class="text-muted font-size-sm">{{ $user->direccion ?? 'Dirección no especificada' }}</p>
                                    <a class="btn btn-primary col-12" href="{{ route('profile.edit') }}">
                                        Editar Perfil
                                    </a>

                                    <a class="btn btn-primary col-12 mt-2" href="{{ route('consultas.createForClient') }}">
                                        Hacer una Consulta
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nombre completo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $user->name }} {{ $user->apellido }}</div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $user->email }}</div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">DNI</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $user->dni }}</div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Teléfono</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $user->telefono }}</div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Dirección</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $user->direccion }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Consultas Enviadas</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Asunto</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($consultas as $consulta)
                                        <tr>
                                            <td>{{ $consulta->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $consulta->asunto }}</td>
                                            <td><span class="badge bg-info text-dark">{{ $consulta->estado }}</span></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No has enviado ninguna consulta.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>