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
            <a href="./user_vehicles.html" class="nav-link px-2">Galeria</a>
          </li>
          <li>
            <a href="./user_services.html" class="nav-link px-2 link-secondary"
              >Servicios</a
            >
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

    <!--Banner carrousel 2-->
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"></button>
        <button
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="./imagenes/banner-Tracker.webp"
            class="d-block w-100"
            alt="Servicios banner Postventa" />
          <div class="carousel-caption d-none d-md-block">
            <h4>Postventa Crazy Cars</h4>
            <p>Vos te renovás, tu auto tambien.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="./imagenes/servicio-mantenimiento.webp"
            class="d-block w-100"
            alt="Servicios banner Taller" />
          <div class="carousel-caption d-none d-md-block">
            <h4>Reparaciones</h4>
            <p>Dale el mejor mantenimiento a tu coche.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="./imagenes/servicio-3.jpg"
            class="d-block w-100"
            alt="Servicios banner Mantenimiento" />
          <div class="carousel-caption d-none d-md-block">
            <h4>Mantenimiento</h4>
            <p>Ahorrate dolores de cabeza.</p>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!--Sucursales-->
    <div class="px-4 pt-5 my-5 text-center border-bottom">
      <h1 class="display-4 fw-bold text-body-emphasis">Nuestras sucursales</h1>
    </div>

    <div class="container marketing">
      <hr class="featurette-divider" />

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading fw-normal lh-1">
            Av. La plata 283 <span class="text-body-secondary">Caballito</span>
          </h2>
          <p class="lead">
            crazycarscaba@gmail.com <br />
            (011) 1234 5678 <br />
            Horarios de atencion:<br />
            Lunes a Viernes de 8 a 18 hs.
          </p>
        </div>
        <div class="col-md-5 order-md-1">
          <img
            src="./imagenes/Sucursal1.jpg"
            class="featurette-image img-fluid mx-auto"
            width="500"
            height="500"
            alt="Sucursal 1 Caballito" />
        </div>
      </div>

      <hr class="featurette-divider" />

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading fw-normal lh-1">
            Av. Hipólito Yrigoyen 800
            <span class="text-body-secondary">Morón</span>
          </h2>
          <p class="lead">
            crazycarsmoron@gmail.com <br />
            (011) 9876 5432 <br />
            Horarios de atencion:<br />
            Lunes a Viernes de 8 a 18 hs.
          </p>
        </div>
        <div class="col-md-5 order-md-1">
          <img
            src="./imagenes/Sucursal2.jpg"
            class="featurette-image img-fluid mx-auto"
            width="500"
            height="500"
            alt="Sucursal 2 Moron" />
        </div>
      </div>

      <hr class="featurette-divider" />
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
              href="/src/views/user/user_vehicles.html"
              class="nav-link px-2 text-body-secondary"
              >Galeria</a
            >
          </li>
          <li class="nav-item">
            <a
              href="/src/views/user/user_services.html"
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
