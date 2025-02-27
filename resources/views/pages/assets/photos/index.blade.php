@extends('layouts.app')

@section('title', 'عکس ها')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">گالری تصاویر</h2>
    <x-alert />

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @forelse($photos as $photo)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ $photo->file_path }}" alt="{{ $photo->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $photo->name ?? 'بدون عنوان' }}</h5>
                        
                        <!-- Status Badge -->
                        <p class="text-center">
                            @if($photo->status == 'در انتظار بررسی')
                                <span class="badge bg-warning text-dark">📌 در انتظار بررسی</span>
                            @elseif($photo->status == 'تایید شده')
                                <span class="badge bg-success">✅ تایید شده</span>
                            @elseif($photo->status == 'رد شده')
                                <span class="badge bg-danger">❌ رد شده</span>
                            @else
                                <span class="badge bg-secondary">نامشخص</span>
                            @endif
                        </p>
    
                        <p class="card-text">
                            {{ $photo->description ? Str::limit($photo->description, 100) : 'بدون توضیح' }}
                        </p>
                        <p class="text-muted"><small>آپلود شده توسط: {{ $photo->user->name ?? 'ناشناس' }}</small></p>
                        <p class="text-muted"><small>ابعاد: {{ $photo->width }}x{{ $photo->height }}</small></p>
                        <p class="text-muted"><small>قیمت: {{ number_format($photo->price, 0) }} تومان</small></p>
    
                        <div class="d-flex justify-content-between align-items-center my-5">
                            <x-button :type="'button'" :class="'btn-primary'" :href="route('photo.show', ['photo' => $photo->id])">
                                دیدن عکس
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <h5 class="text-muted">هیچ عکسی برای نمایش وجود ندارد.</h5>
            </div>
        @endforelse
    </div>
    
        <!-- Pagination -->
        <nav class="mt-2">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    {{ $photos->links() }}
                </li>
            </ul>
        </nav>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
@endsection
