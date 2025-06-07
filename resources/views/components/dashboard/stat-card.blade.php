@props(['icon', 'label', 'value', 'color', 'href' => null])

<div class="col">
    @if ($href)
        <a href="{{ $href }}" class="text-decoration-none">
    @endif

    <div class="card text-white shadow-sm h-100 rounded-4 border-0 text-center"
        style="background-color: {{ $color }}; height: 150px;">
        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-2">
            <i class="bi {{ $icon }} fs-4"></i>
            <h6 class="mb-0 small text-truncate" style="max-width: 100%">{{ $label }}</h6>
            <h5 class="fw-bold mb-0">{{ $value }}</h5>
        </div>
    </div>

    @if ($href)
        </a>
    @endif
</div>
