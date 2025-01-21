<form method="{{ $method ?? 'POST' }}" action="{{ $action }}" {{ $attributes }}>
    @csrf
    @isset($methodField)
    @method($methodField)
    @endisset

    {{ $slot }}
</form>
