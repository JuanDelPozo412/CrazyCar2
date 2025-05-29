<div class="row featurette my-5">
    <div class="col-md-7 {{ $imagePosition === 'left' ? 'order-md-2' : '' }} mb-4">
        <h2 class="featurette-heading fw-normal lh-1">
            {{ $title }}
            <span class="text-body-secondary">{{ $subtitle }}</span>
        </h2>
        <p class="lead">{{ $description }}</p>
        <a class="btn btn-primary btn-lg" href="{{ $link }}" role="button">Ver más</a>
    </div>
    <div class="col-md-5 {{ $imagePosition === 'left' ? 'order-md-1' : '' }}">
        <img src="{{ asset($image) }}" class="featurette-image img-fluid mx-auto" width="500" height="500"
            alt="{{ $alt }}">
    </div>
</div>
