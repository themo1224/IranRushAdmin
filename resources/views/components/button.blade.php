@if (isset($href))
<a href="{{ $href }}" class="btn {{ $class ?? 'btn-primary' }}">
    @isset($icon)
    <i class="{{ $icon }}"></i>
    @endisset
    {{ $slot }}
</a>
@else
<button type="{{ $type ?? 'button' }}" class="btn {{ $class ?? 'btn-primary' }}">
    @isset($icon)
    <i class="{{ $icon }}"></i>
    @endisset
    {{ $slot }}
</button>
@endif
