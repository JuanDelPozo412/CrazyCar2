@props([
    'type' => 'text',
    'name',
    'placeholder',
    'iconSrc',
    'iconAlt',
    'iconBgClass' => 'bg-danger', 
    'mbClass' => 'mb-2' 
])

<div class="input-group {{ $mbClass }}">
    <div class="input-group-text {{ $iconBgClass }}">
        <img src="{{ $iconSrc }}" alt="{{ $iconAlt }}" style="height: 1rem;">
    </div>
    <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" class="form-control">
</div>