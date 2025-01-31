@extends('layouts.app')

@section('title', 'My Custom Page Title')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover" dir="rtl"> <!-- Enable RTL Support -->
    <!-- Logo -->
    <a href="{{ route('home') }}" class="auth-cover-brand d-flex align-items-center gap-2">
        <span class="app-brand-logo demo">
            <span style="color: var(--bs-primary)">
                <svg width="268" height="150" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30.0944 2.22569C29.0511 0.444187 26.7508..." fill="currentColor"/>
                    <path d="M30.171 2.22569C29.1277 0.444187 26.8274..." fill="url(#paint0_linear)" fill-opacity="0.4"/>
                </svg>
            </span>
        </span>
        <span class="app-brand-text demo text-heading fw-bold">{{ config('app.name') }}</span>
    </a>
    <!-- /Logo -->

    <div class="authentication-inner row m-0">
        <!-- Left Section -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-5 pb-2">
            <img src="{{ asset('assets/img/illustrations/auth-login-illustration-light.png') }}"
                class="auth-cover-illustration w-100"
                alt="auth-illustration"
                data-app-light-img="illustrations/auth-login-illustration-light.png"
                data-app-dark-img="illustrations/auth-login-illustration-dark.png" />
            <img src="{{ asset('assets/img/illustrations/auth-cover-login-mask-light.png') }}"
                class="authentication-image"
                alt="mask"
                data-app-light-img="illustrations/auth-cover-login-mask-light.png"
                data-app-dark-img="illustrations/auth-cover-login-mask-dark.png" />
        </div>
        <!-- /Left Section -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5 px-4 py-4">
            <div class="w-px-400 mx-auto pt-5 pt-lg-0">
                <h4 class="mb-2 fw-semibold">به {{ config('app.name') }} خوش آمدید! 👋</h4>
                <p class="mb-4">لطفا وارد حساب کاربری خود شوید</p>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-floating form-floating-outline mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="ایمیل خود را وارد کنید" value="{{ old('email') }}" autofocus required />
                        <label for="email">ایمیل</label>
                    </div>
                    <div class="mb-3">
                        <div class="form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="رمز عبور" required />
                                    <label for="password">رمز عبور</label>
                                </div>
                                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                            <label class="form-check-label" for="remember-me"> مرا به خاطر بسپار </label>
                        </div>
                        <a href="#" class="float-end mb-1">
                            <span>رمز عبور خود را فراموش کرده اید؟</span>
                        </a>
                    </div>
                    <button class="btn btn-primary d-grid w-100" type="submit">ورود</button>
                </form>

                <p class="text-center mt-2">
                    <span>حساب کاربری ندارید؟</span>
                    <a href="{{ route('register') }}">
                        <span>ثبت نام کنید</span>
                    </a>
                </p>

                <div class="divider my-4">
                    <div class="divider-text">یا</div>
                </div>

               
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection
