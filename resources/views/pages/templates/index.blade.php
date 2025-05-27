@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>قالب های ایمیل</h2>
        <a href="{{ route('templates.create') }}" class="btn btn-primary">ایجاد قالب جدید</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>نام</th>
                <th>وضعیت</th>
                <th>ایجاد شده در</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($templates as $template)
                <tr>
                    <td>{{ $template->name }}</td>
                    <td>{{ $template->status }}</td>
                    <td>{{ $template->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('templates.edit', $template) }}" class="btn btn-sm btn-warning">ویرایش</a>
                        <form action="{{ route('templates.destroy', $template) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">هیچ قالبی یافت نشد.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection 