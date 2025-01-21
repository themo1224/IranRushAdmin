@extends('layouts.app')

@section('title', 'Create Tag')

@section('content')
<div class="container my-5">
    <h4 class="mb-4">اضافه کردن تگ جدید</h4>

    <x-alert />

    <x-form :action="route('tags.store')" :buttonText="'اضافه کردن تگ'">
        <div class="mb-3">
            <label for="name" class="form-label">نام تگ</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">اسلاگ</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <x-button :type="'submit'" :class="'btn-primary'">
            <i class="mdi mdi-plus"></i> ذخیره تگ
        </x-button>
    </x-form>
</div>
@endsection
