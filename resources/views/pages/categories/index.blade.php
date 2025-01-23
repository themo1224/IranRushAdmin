@extends('layouts.app')

@section('title', 'دسته‌بندی‌ها')

@section('content')
<style>
    table td {
        vertical-align: middle;
    }

    table td:first-child {
        text-align: right;
        /* For RTL alignment */
    }
</style>
<div class="container my-5">
    <h4 class="mb-4 text-center">دسته‌بندی‌ها</h4>

    <x-alert />

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>نام دسته‌بندی</th>
                    <th>نام دسته‌بندی والد</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $parent)
                @if (!$parent->parent_id) <!-- Display only parent categories -->
                <tr>
                    <td><strong>{{ $parent->name }}</strong></td>
                    <td>-</td> <!-- Parent has no parent -->
                    <td>
                        <a href="{{ route('categories.edit', $parent->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                        <form method="POST" action="{{ route('categories.destroy', $parent->id) }}" class="d-inline" onsubmit="return confirm('آیا مطمئن هستید؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>

                <!-- Display Child Categories -->
                @if ($parent->childrenRecursive->count())
                @foreach ($parent->childrenRecursive as $child)
                <tr>
                    <td>{{ str_repeat('— ', 1) }}{{ $child->name }}</td>
                    <td>{{ $parent->name }}</td> <!-- Parent name -->
                    <td>
                        <a href="{{ route('categories.edit', $child->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                        <form method="POST" action="{{ route('categories.destroy', $child->id) }}" class="d-inline" onsubmit="return confirm('آیا مطمئن هستید؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>

                <!-- Display Sub-Child Categories -->
                @if ($child->childrenRecursive->count())
                @foreach ($child->childrenRecursive as $subChild)
                <tr>
                    <td>{{ str_repeat('— ', 2) }}{{ $subChild->name }}</td>
                    <td>{{ $child->name }}</td> <!-- Parent (child) name -->
                    <td>
                        <a href="{{ route('categories.edit', $subChild->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                        <form method="POST" action="{{ route('categories.destroy', $subChild->id) }}" class="d-inline" onsubmit="return confirm('آیا مطمئن هستید؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
                @endforeach
                @endif
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
