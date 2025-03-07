<form method="{{ $method ?? 'POST' }}" action="{{ $action }}" enctype="multipart/form-data" {{ $attributes }}>
    @csrf
    @isset($methodField)
    @method($methodField)
    @endisset

    {{ $slot }}
</form>
