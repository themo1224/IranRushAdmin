@extends('layouts.app')

@section('title', 'ویرایش دسته‌بندی')

@section('content')
<div class="container my-5">
    <h4 class="mb-4 text-center">ویرایش دسته‌بندی</h4>

    <x-alert />

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Category Name -->
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="InputName"
                value="{{ old('name', $category->name) }}" required>
            <label for="InputName">نام دسته‌بندی</label>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Parent Category -->
        <div class="form-floating form-floating-outline mb-4">
            <select name="parent" id="InputParent" class="form-control @error('parent') is-invalid @enderror">
                <option value="">بدون والد</option>
                @foreach ($parent_categories as $parent)
                <option value="{{ $parent->id }}" {{ old('parent', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
                @endforeach
            </select>
            <label for="InputParent">دسته‌بندی والد</label>
            @error('parent')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Meta Title -->
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" id="InputMetaTitle"
                value="{{ old('meta_title', $category->meta_title) }}">
            <label for="InputMetaTitle">متا عنوان</label>
            @error('meta_title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Meta Description -->
        <div class="form-floating form-floating-outline mb-4">
            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="InputMetaDescription" rows="4">
            {{ old('meta_description', $category->meta_description) }}
            </textarea>
            <label for="InputMetaDescription">توضیحات متا</label>
            @error('meta_description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Meta Keywords -->
        <div class="form-floating form-floating-outline mb-4">
            <input id="TagifyMetaKeywords" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords"
                value="{{ old('meta_keywords', $category->meta_keywords) }}">
            <label for="TagifyMetaKeywords">کلمات کلیدی</label>
            @error('meta_keywords')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success">
                <i class="mdi mdi-content-save"></i> ذخیره تغییرات
            </button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize Tagify for meta keywords
        const input = document.querySelector('#TagifyMetaKeywords');
        new Tagify(input, {
            enforceWhitelist: false,
            dropdown: {
                enabled: 0
            }
        });
    });
</script>
@endpush
