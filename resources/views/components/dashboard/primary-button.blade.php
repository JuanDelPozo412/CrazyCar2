<button type="button" class="btn mb-3 text-white" style="background-color: {{ $color ?? 'rgba(0, 123, 255, 0.9)' }}"
    {{ $attributes }}>
    @if ($icon)
        <i class="bi {{ $icon }} me-2"></i>
    @endif
    {{ $text }}
</button>
