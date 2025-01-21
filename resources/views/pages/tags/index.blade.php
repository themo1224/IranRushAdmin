@extends('layouts.app')

@section('title', 'My Custom Page Title')

@section('content')
<!-- Add Create Tag Button -->
<div class="d-flex justify-content-between align-items-center my-5">
    <h4 class="mb-0">مدیریت تگ ها</h4>
    <x-button :type="'button'" :class="'btn-primary'" :href="route('tags.create')">
        اضافه کردن تگ
    </x-button>
</div>

<!-- Example of using the table component for tags -->
<x-table :headers=" ['نام تگ', 'اسلاگ' , 'مدیریت' ]" :title="'Tags List'" :pagination="$tags->links()">
    @foreach ($tags as $tag)
    <tr>
        <td>{{ $tag->name }}</td>
        <td>{{ $tag->slug }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('tags.edit', $tag->id) }}">ویرایش</a>
                    <form method="POST" action="{{ route('tags.destroy', $tag->id) }}" onsubmit="return confirm('Are you sure you want to delete this tag?');">
                        @csrf
                        @method('delete')
                        <button class="dropdown-item" type="submit">حذف</button>
                    </form>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
</x-table>
@endsection
