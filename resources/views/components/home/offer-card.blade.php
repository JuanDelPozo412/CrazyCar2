<div class="col-md-4 mb-4">
    <div class="card h-100">
        <img src="{{ asset($image) }}" class="card-img-top" alt="{{ $alt }}" />
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text flex-grow-1">{{ $description }}</p>
            <p class="card-text">
                <strong>
                    <s class="text-muted">{{ $priceOld }}</s><br>
                    Ahora: <span class="text-success">{{ $priceNew }}</span>
                </strong>
            </p>
            <a href="{{ $link }}" class="btn btn-primary mt-auto">Ver más</a>
        </div>
    </div>
</div>
