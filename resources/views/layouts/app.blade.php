<!DOCTYPE html>
<html lang="en" class="dark-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template">

<head>
    @include('partials.head')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container px-5">
            <!-- Navbar -->
            @include('partials.navbar')
            <!-- / Navbar -->

            @yield('content')
        </div>
    </div>

    @include('partials.scripts')
    @yield('scripts') <!-- For injecting custom scripts -->
    @stack('scripts') <!-- For stacking scripts -->
</body>


</html>
