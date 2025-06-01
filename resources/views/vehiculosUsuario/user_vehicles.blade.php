<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./css/style.css" />
    <title>Crazy Cars</title>
  </head>
  <body>
    <!--navbar-->
    <div class="container">
      <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <a
            href="../../../index.html"
            class="d-inline-flex link-body-emphasis text-decoration-none">
            <img
              src="./imagenes/luxury-car-sketch-png-5693248.png"
              alt="Logo coche"
              width="80"
              height="80" />
          </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li>
            <a href="../../../index.html" class="nav-link px-2">Inicio</a>
          </li>
          <li>
            <a href="./user_vehicles.html" class="nav-link px-2 link-secondary"
              >Galeria</a
            >
          </li>
          <li>
            <a href="./user_services.html" class="nav-link px-2">Servicios</a>
          </li>
          <li>
            <a href="./user_contact.html" class="nav-link px-2">Contacto</a>
          </li>
        </ul>

        <div class="col-md-3 text-end">
          <button type="button" class="btn btn-outline-primary me-2">
            <a href="../auth/login.html" class="nav-link px-2"
              >Iniciar Sesion</a
            >
          </button>
          <button type="button" class="btn btn-primary">
            <a
              style="text-decoration: none"
              class="text-white"
              href="../auth/register.html"
              >Registrarse</a
            >
          </button>
        </div>
      </header>
    </div>

    <!--Vehiculos-->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
      <h1 class="display-4 fw-bold text-body-emphasis">Autos compactos</h1>
    </div>

    <div class="container my-5">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card" style="width: 100%">
            <img
              src="./imagenes/volkswagen-polo-track.jpg"
              class="card-img-top"
              alt="Auto oferta Volkswagen Polo Track" />
            <div class="card-body">
              <h5 class="card-title">Volkswagen Polo Track</h5>
              <p class="card-text">
                Diseñado para quienes buscan eficiencia sin sacrificar estilo,
                el Polo Track ofrece un motor ágil, excelente consumo de
                combustible y toda la confiabilidad de Volkswagen. Ideal para la
                ciudad, con un diseño moderno y funcional.
              </p>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card" style="width: 100%">
            <img
              src="./imagenes/Chevrolet-onix-joy.jpg"
              class="card-img-top"
              alt="Auto oferta Chevrolet Onix joy" />
            <div class="card-body">
              <h5 class="card-title">Chevrolet Onix Joy</h5>
              <p class="card-text">
                El Onix Joy combina tecnología, economía y confort. Equipado con
                un motor eficiente y un diseño práctico, es perfecto para el día
                a día. Bajo mantenimiento y gran rendimiento hacen de este una
                de las mejores opciones
              </p>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Vehiculo Pick-Ups (Camioneta)-->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
      <h1 class="display-4 fw-bold text-body-emphasis">Pick-Ups</h1>
    </div>

    <div class="container my-5">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card" style="width: 100%">
            <img
              src="./imagenes/Ford-Maverick.jpg"
              class="card-img-top"
              alt="Camioneta Ford Maverick" />
            <div class="card-body">
              <h5 class="card-title">Ford Maverick</h5>
              <p class="card-text">
                La Ford Maverick es una camioneta compacta con un diseño robusto
                y detalles característicos de Ford. Cuenta con tecnologías de
                asistencia a la conducción y un sistema de monitorización del
                consumo de combustible.
              </p>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card" style="width: 100%">
            <img
              src="./imagenes/Ford-Ranger-Rapotor2.jpg"
              class="card-img-top"
              alt="Camioneta Ford Ranger Raptor" />
            <div class="card-body">
              <h5 class="card-title">Ford Ranger Raptor</h5>
              <p class="card-text">
                La Ford Maverick es una camioneta compacta con un diseño robusto
                y detalles característicos de Ford. Cuenta con tecnologías de
                asistencia a la conducción y un sistema de monitorización del
                consumo de combustible.
              </p>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card" style="width: 100%">
            <img
              src="./imagenes/Volkswagen-Amarok.jpg"
              class="card-img-top"
              alt="Camioneta Volkswagen Amarok" />
            <div class="card-body">
              <h5 class="card-title">Volkswagen Amarok</h5>
              <p class="card-text">
                La Ford Maverick es una camioneta compacta con un diseño robusto
                y detalles característicos de Ford. Cuenta con tecnologías de
                asistencia a la conducción y un sistema de monitorización del
                consumo de combustible.
              </p>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Vehiculos Autos Sedan-->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
      <h1 class="display-4 fw-bold text-body-emphasis">Autos Sedan</h1>
    </div>
    <div class="container my-5">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card" style="width: 100%">
            <img
              src="./imagenes/Chevrolet-Cruze.webp"
              class="card-img-top"
              alt="Auto Sedan Chevrolet Cruze" />
            <div class="card-body">
              <h5 class="card-title">Chevrolet Cruze</h5>
              <p class="card-text">
                El Chevrolet Cruze es un sedán moderno que combina elegancia,
                eficiencia y tecnología. Ofrece un andar suave, buen consumo de
                combustible y un interior cómodo. Ideal para quienes buscan
                estilo y funcionalidad en un solo auto.
              </p>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Vehiculos SUVs-->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
      <h1 class="display-4 fw-bold text-body-emphasis">SUVs</h1>
    </div>

    <div class="container my-5">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card" style="width: 100%">
            <img
              src="imagenes/Chevrolet-Tracker.jpg"
              class="card-img-top"
              alt="SUVs Chevrolet Tracker" />
            <div class="card-body">
              <h5 class="card-title">Chevrolet Tracker</h5>
              <p class="card-text">
                La Chevrolet Tracker es una SUV compacta con diseño moderno y
                espíritu urbano. Equipada con tecnología de conectividad y
                seguridad, brinda un manejo ágil y cómodo. Perfecta para quienes
                buscan versatilidad y estilo en la ciudad o en ruta.
              </p>
              <a href="#" class="btn btn-primary">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Footer-->
    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item">
            <a href="/index.html" class="nav-link px-2 text-body-secondary"
              >Inicio</a
            >
          </li>
          <li class="nav-item">
            <a
              href="../user/user_vehicles.html"
              class="nav-link px-2 text-body-secondary"
              >Galeria</a
            >
          </li>
          <li class="nav-item">
            <a
              href="../user/user_services.html"
              class="nav-link px-2 text-body-secondary"
              >Servicios</a
            >
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">Contacto</a>
          </li>
        </ul>
        <p class="text-center text-body-secondary">© 2025 Crazy Cars</p>
      </footer>
    </div>
  </body>
</html>
