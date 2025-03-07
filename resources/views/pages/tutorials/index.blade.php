@extends('layouts.app')

@section('title', 'حرفه ای شو')

@section('content')
<!-- Add Create Tag Button -->
<div class="d-flex justify-content-between align-items-center my-5">
    <h4 class="mb-0">مدیریت  پست ها</h4>
    <x-button :type="'button'" :class="'btn-primary'" :href="route('tutorials.create')">
        اضافه کردن پست
    </x-button>
</div>

<x-card title="Tutorials">
    @foreach ($tutorials as $tutorial)
        <div class="col">
            <div class="card h-100">
                <img class="card-img-top" src="{{ $tutorial->image }}" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">{{ $tutorial->title }}</h5>
                    <p class="card-text">{{ Str::limit($tutorial->description, 100) }}</p>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <x-slot name="pagination">
        {{ $tutorials->links() }}
    </x-slot> --}}
</x-card>

@endsection
