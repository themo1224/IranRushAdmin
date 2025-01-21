@extends('layouts.app')

@section('title', 'My Custom Page Title')

@section('content')
<!-- Add Create Tag Button -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Tags Management</h4>
    <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">اضافه کردن تگ</a>
</div>

<!-- Example of using the table component for tags -->
<x-table :headers="['Tag Name', 'Slug', 'Actions']" :title="'Tags List'" :pagination="$tags->links()">
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
                    <a class="dropdown-item" href="{{ route('admin.tag.edit', $tag->id) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.tag.delete', $tag->id) }}" onsubmit="return confirm('Are you sure you want to delete this tag?');">
                        @csrf
                        @method('delete')
                        <button class="dropdown-item" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
</x-table>
@endsection
