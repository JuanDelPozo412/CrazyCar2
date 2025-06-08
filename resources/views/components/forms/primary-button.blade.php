@props(['type' => 'submit', 'onClick' => null])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-danger']) }}
    @if($onClick) onclick="{{ $onClick }}" @endif>
    {{ $slot }}
</button>