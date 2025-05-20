@extends('layouts.app')

@section('title', $tutorial->title)

@section('content')
    <div class="container-fluid">
        <!-- Back Button and Title Row -->
        <div class="d-flex justify-content-between align-items-center my-5">
            <h4 class="mb-0">{{ $tutorial->title }}</h4>
            <x-button :type="'button'" :class="'btn-secondary'" :href="route('tutorials.index')">
                بازگشت
            </x-button>
        </div>

        <!-- Main Content -->
        <div class="row">
            <!-- Tutorial Image and Details -->
            <div class="col-lg-8 mb-4">
                <x-card>
                    <!-- Tutorial Image -->
                    <div class="position-relative mb-4">
                        <img src="{{ Storage::url($tutorial->media->file_path) }}" 
                             alt="{{ $tutorial->title }}" 
                             class="img-fluid rounded w-100"
                             style="max-height: 500px; object-fit: cover;">
                    </div>

                    <!-- Tutorial Content -->
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h2 class="h4 mb-2">{{ $tutorial->title }}</h2>
                                <div class="text-muted">
                                    <i class="fas fa-calendar-alt ml-2"></i>
                                    {{ verta($tutorial->created_at)->format('Y/m/d') }}
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div>
                                <x-button :type="'button'" :class="'btn-primary mx-1'" :href="route('tutorials.edit', $tutorial)">
                                    <i class="fas fa-edit"></i> ویرایش
                                </x-button>
                                <form action="{{ route('tutorials.destroy', $tutorial) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-button :type="'submit'" :class="'btn-danger'" onclick="return confirm('آیا از حذف این مورد اطمینان دارید؟')">
                                        <i class="fas fa-trash"></i> حذف
                                    </x-button>
                                </form>
                            </div>
                        </div>

                        <!-- Tutorial Description -->
                        <div class="tutorial-content">
                            <div class="mb-4">
                                <h5 class="text-primary mb-3">توضیحات</h5>
                                <div class="p-3 bg-light rounded">
                                    {!! nl2br(e($tutorial->description)) !!}
                                </div>
                            </div>
                        </div>

                        <!-- Tutorial Meta Information -->
                        <div class="mt-4 pt-4 border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-2">
                                        <strong>دسته بندی:</strong>
                                        <span class="badge bg-info">{{ $tutorial->category->name ?? 'بدون دسته بندی' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2">
                                        <strong>وضعیت:</strong>
                                        <span class="badge {{ $tutorial->status ? 'bg-success' : 'bg-warning' }}">
                                            {{ $tutorial->status ? 'فعال' : 'غیرفعال' }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Author Information -->
                <x-card title="نویسنده">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/default-avatar.png') }}" 
                                 alt="نویسنده" 
                                 class="rounded-circle"
                                 style="width: 50px; height: 50px; object-fit: cover;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">{{ $tutorial->author->name ?? 'نامشخص' }}</h6>
                            <p class="text-muted mb-0">
                                <small>تاریخ انتشار: {{ verta($tutorial->created_at)->format('Y/m/d') }}</small>
                            </p>
                        </div>
                    </div>
                </x-card>

                <!-- Related Tutorials -->
                @if(isset($relatedTutorials) && $relatedTutorials->count() > 0)
                <x-card title="پست های مرتبط" class="mt-4">
                    <div class="list-group list-group-flush">
                        @foreach($relatedTutorials as $relatedTutorial)
                            <a href="{{ route('tutorials.show', $relatedTutorial) }}" 
                               class="list-group-item list-group-item-action d-flex align-items-center">
                                <img src="{{ Storage::url($relatedTutorial->media->file_path) }}" 
                                     alt="{{ $relatedTutorial->title }}"
                                     class="rounded me-3"
                                     style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-1">{{ $relatedTutorial->title }}</h6>
                                    <small class="text-muted">
                                        {{ verta($relatedTutorial->created_at)->format('Y/m/d') }}
                                    </small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </x-card>
                @endif
            </div>
        </div>
    </div>
@endsection