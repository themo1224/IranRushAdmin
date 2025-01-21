@extends('layouts.app')

@section('title', 'Edit Tag')

@section('content')
<div class="container my-5">
    <h4 class="mb-4">ویرایش تگ</h4>

    <x-alert />

    <x-form :action="route('tags.update', $tag->id)" :methodField="'PUT'" :buttonText="'بروزرسانی تگ'">
        <div class="mb-3">
            <label for="name" class="form-label">نام تگ</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $tag->name) }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">اسلاگ</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $tag->slug) }}" required>
            @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <x-button :type="'submit'" :class="'btn-primary'">
            <i class="mdi mdi-content-save"></i> ذخیره تغییرات
        </x-button>
    </x-form>
</div>
@endsection
