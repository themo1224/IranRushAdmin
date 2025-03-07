@extends('layouts.app')

@section('title', 'حرفه ای شو')

@section('content')
<!-- Add Create Tag Button -->
<div class="container my-3">

    <h5 class="card-header">ایجاد آموزش</h5>
    <div class="card-body mt-2">
        <x-form method="POST" action="{{ route('tutorials.store') }}">
            <div class="mb-3">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label class="form-label">نامک (Slug)</label>
                <input type="text" name="slug" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label class="form-label">لینک آپارات</label>
                <input type="url" name="embed_aparat_url" class="form-control">
            </div>
    
            <div class="mb-3">
                <label class="form-label">محتوا</label>
                <textarea name="text_area" class="form-control" rows="5"></textarea>
            </div>
    
            <div class="mb-3">
                <label class="form-label">عنوان متا</label>
                <input type="text" name="meta_title" class="form-control">
            </div>
    
            <div class="mb-3">
                <label class="form-label">توضیحات متا</label>
                <textarea name="meta_description" class="form-control" rows="3"></textarea>
            </div>
    
            <div class="mb-3">
                <label class="form-label">کلمات کلیدی متا (با کاما جدا کنید)</label>
                <input type="text" name="meta_keywords" class="form-control">
            </div>
    
            <div class="mb-3">
                <label class="form-label">لینک کانونیکال</label>
                <input type="url" name="canonical_url" class="form-control">
            </div>
    
            <div class="mb-3">
                <label class="form-label">قابل ایندکس</label>
                <select name="indexable" class="form-control">
                    <option value="1" selected>بله</option>
                    <option value="0">خیر</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label class="form-label">آپلود تصویر</label>
                <input type="file" name="image" class="form-control">
            </div>
    
            <button type="submit" class="btn btn-primary">ایجاد آموزش</button>
        </x-form>
    </div>
    </div>    
@endsection
