<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Empleado</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>

<body class="min-vh-100 d-flex flex-column">
    <div class="container-fluid flex-grow-1">
        <div class="row flex-nowrap min-vh-100">
            {{-- Sidebar y navbar --}}
            <x-dashboard.navbar name="Marcos Gutierrez" role="Empleado" />

            {{-- Contenido principal --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4 mb-4">
                    <x-dashboard.stat-card icon="bi-cash-stack" label="Mis Vendidos" value="74"
                        color="rgba(13, 110, 253, 0.7)" />

                    <x-dashboard.stat-card icon="bi-chat-dots" label="Mis Consultas" value="40"
                        color="rgba(23, 162, 184, 0.8)" />
                </div>

                {{-- Gráficos u otro contenido --}}
                <x-dashboard.dashboard-charts />
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
