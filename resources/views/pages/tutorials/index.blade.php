@extends('layouts.app')

@section('title', 'حرفه ای شو')

@section('content')
<!-- Add Create Tag Button -->
<div class="d-flex justify-content-between align-items-center my-5">
    <h4 class="mb-0"> حرفه ای شو</h4>
    <x-button :type="'button'" :class="'btn-primary'" :href="route('tutorials.create')">
        اضافه کردن پست
    </x-button>
</div>

<x-card title="پست ها">
    @foreach ($tutorials as $tutorial) 
        <div class="col">
            <div class="card h-100 rounded">
                <img class="card-img-top" src="{{ Storage::url($tutorial->media->file_path) }}" alt="{{ $tutorial->title }}" style="max-height: 35vh; object-fit: cover;" />
                <div class="card-body bg-light rounded">
                    <h5 class="card-title">{{ $tutorial->title }}</h5>
                    <p class="card-text">{{ Str::limit($tutorial->text_area, 100) }}</p>
                    <x-button :type="'button'" :class="'btn-info'" :href="route('tutorials.show', $tutorial)">
                        مشاهده
                    </x-button>
                    
                </div>
            </div>
        </div>
    @endforeach
    {{-- <x-slot name="pagination">
        {{ $tutorials->links() }}
    </x-slot> --}}
</x-card>

@endsection
