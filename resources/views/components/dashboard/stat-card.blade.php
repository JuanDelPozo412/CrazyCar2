@props(['icon', 'label', 'value', 'color'])

<div class="col">
    <div class="card text-white shadow-sm h-100 rounded-4 border-0 text-center"
        style="background-color: {{ $color }}">
        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-2">
            <i class="bi {{ $icon }} fs-1"></i>
            <h6 class="mb-0">{{ $label }}</h6>
            <h4 class="fw-bold mb-0">{{ $value }}</h4>
        </div>
    </div>
</div>
