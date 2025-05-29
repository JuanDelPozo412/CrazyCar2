<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('images/banner-Tracker.webp') }}" class="d-block w-100"
                style="max-height: 650px; object-fit: cover" alt="Ford Raptor">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('images/Volkswagen-Amarok-banner.jpg') }}" class="d-block w-100"
                style="max-height: 650px; object-fit: cover" alt="Chevrolet Onix">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/Ford-Maverick-Banner.jpg') }}" class="d-block w-100"
                style="max-height: 650px; object-fit: cover" alt="Toyota Hilux">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>
