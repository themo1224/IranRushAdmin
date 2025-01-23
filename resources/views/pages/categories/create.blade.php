@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="container my-5">
    <h4 class="mb-4">اضافه کردن دسته‌بندی جدید</h4>

    <x-alert />

    <x-form :action="route('categories.store')" :method="'POST'" :buttonText="'ذخیره دسته‌بندی'">
        <div class="mb-3">
            <label for="name" class="form-label">نام دسته‌بندی</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">توضیحات</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="card mb-4">
            <h5 class="card-header">تنظیمات سئو</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <div class="form-floating form-floating-outline mb-4">
                    <input
                        type="text"
                        name="meta_title"
                        value="{{old('meta_title')}}"
                        class="form-control"
                        id="InputMetaTitle"
                        placeholder="عنوان متا را وارد کنید ..." />
                    <label for="InputMetaTitle">عنوان متا</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <textarea name="meta_description" class="form-control h-px-100" id="InputMetaDescription" placeholder="توضیحات متا را وارد کنید ...">{{old('meta_description')}}</textarea>
                    <label for="InputMetaDescription">توضیحات متا</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                    <input id="TagifyBasic" class="form-control" name="meta_keyword" value="{{old('meta_keyword')}}" />
                    <label for="TagifyBasic">کلمات کلیدی</label>
                </div>
            </div>
        </div>


        <div class="mb-3">
            <label for="parent" class="form-label">دسته‌بندی والد</label>
            <select name="parent" id="parent" class="form-control @error('parent') is-invalid @enderror">
                <option value="">بدون والد</option>
                @foreach ($parent_categories as $parent)
                <option value="{{ $parent->id }}" {{ old('parent') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
                @endforeach
            </select>
            @error('parent')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="media" class="form-label">تصویر</label>
            <input type="file" name="media" id="media" class="form-control @error('media') is-invalid @enderror">
            @error('media')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <x-button :type="'submit'" :class="'btn-primary'">
            <i class="mdi mdi-content-save"></i> ذخیره
        </x-button>
    </x-form>
</div>

@endsection

@push('scripts')
{{-- <script src="{{ asset('assets/js/ckeditor5.js') }}"></script>--}}
<script src="{{ asset('assets/vendor/libs/ckeditor/ckeditor.js') }}"></script>
<script src="{{asset('assets/js/forms-editors.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script>
    CKEDITOR.replace('editor', {
        filebrowserImageBrowseUrl: '/file-manager/ckeditor',
        contentsLangDirection: 'rtl'
    });
    // ClassicEditor
    //     .create( document.querySelector( '#editor' ), {
    //         filebrowserImageBrowseUrl: '/file-manager/ckeditor',
    //         language: {
    //             ui: 'fa',
    //             content: 'fa'
    //         }
    //     } )
</script>

@endpush
