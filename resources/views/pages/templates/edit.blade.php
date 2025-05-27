@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ویرایش قالب ایمیل</h2>
    <form action="{{ route('templates.update', $template) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">نام</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $template->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">محتوا</label>
            <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $template->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">وضعیت</label>
            <select name="status" id="status" class="form-control">
                <option value="active" {{ old('status', $template->status) == 'active' ? 'selected' : '' }}>فعال</option>
                <option value="inactive" {{ old('status', $template->status) == 'inactive' ? 'selected' : '' }}>غیرفعال</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">به روز رسانی</button>
        <a href="{{ route('templates.index') }}" class="btn btn-secondary">لغو</a>
    </form>
</div>
@endsection
