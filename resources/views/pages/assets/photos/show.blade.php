@extends('layouts.app')

@section('title', $photo->name ?? 'نمایش عکس')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar Section (Photo Owner Info) -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    اطلاعات مالک عکس
                </div>
                <div class="card-body text-center">
                    <img src="{{ $photo->user->profile_photo_path ?? asset('assets/img/default-user.png') }}"
                         class="rounded-circle mb-3" width="120" height="120" alt="User Avatar">
                    <h5 class="card-title">{{ $photo->user->name ?? 'نامشخص' }}</h5>
                    <p class="text-muted">ایمیل: {{ $photo->user->email ?? '---' }}</p>
                    <p class="text-muted">تاریخ عضویت: {{ \Carbon\Carbon::parse($photo->user->created_at)->translatedFormat('Y/m/d') }}</p>
                    <p class="text-muted">شماره تلفن: {{ $photo->user->phone_number ?? '---' }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content Section (Photo Details) -->
        <div class="col-md-8">
            <div class="card">
                <img class="card-img-top" src="{{ $photo->file_path }}" alt="{{ $photo->name }}">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $photo->name ?? 'بدون عنوان' }}</h5>
                    <p class="card-text">
                        {{ $photo->description ? Str::limit($photo->description, 200) : 'بدون توضیح' }}
                    </p>
                    <p class="text-muted"><small>ابعاد: {{ $photo->width ?? 'نامشخص' }}x{{ $photo->height ?? 'نامشخص' }}</small></p>
                    <p class="text-muted"><small>قیمت: {{ number_format($photo->price, 0) }} تومان</small></p>

                    <!-- Approve & Reject Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <form action="{{ route('photo.approve', $photo->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">تایید عکس</button>
                        </form>

                        <form action="{{ route('photo.reject', $photo->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">رد کردن</button>
                        </form>
                    </div>

                    <!-- Back to Gallery Button -->
                    <div class="text-center mt-4">
                        <a href="{{ route('photo.index') }}" class="btn btn-secondary">بازگشت به گالری</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
@endsection
