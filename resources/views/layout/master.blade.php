<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/logo2.png') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    @yield('meta')

    @stack('before-styles')

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">

    @stack('after-styles')
    @if (trim($__env->yieldContent('page-styles')))
        @yield('page-styles')
    @endif
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
</head>

<body class="theme-cyanb font_JF  light_version">

<!-- Page Loader -->
<div class="page-loader-wrapper bg-info">
    <div class="loader ">
        <div class="bar1" style="background-color: #509968"></div>
        <div class="bar2" style="background-color: #4c304c"></div>
        <div class="bar3" style="background-color: #509968"></div>
        <div class="bar4" style="background-color: #4c304c"></div>
        <div class="bar5" style="background-color: #509968"></div>
    </div>
</div>

{{-- @include('layout.themesetting') --}}

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    @include('layout.navbar')

    @include('layout.sidebar')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>@yield('title')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                                @if (trim($__env->yieldContent('parentPageTitle')))
                                    <li class="breadcrumb-item">@yield('parentPageTitle')</li>
                                @endif
                                @if (trim($__env->yieldContent('title2')))
                                    <li class="breadcrumb-item">@yield('title2')</li>
                                @endif
                                @if (trim($__env->yieldContent('title')))
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                @endif
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            @yield('content')
        </div>

    </div>
</div>

{{-- <script src="{{asset('js/app.js')}}"></script> --}}


<!-- Scripts -->
@stack('before-scripts')
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>

@if (request()->session()->has('success'))
    <script>
            toastr['success']("{{session()->get('success')}}");
    </script>
@endif

@if (request()->session()->has('info'))
    <script>
            toastr['info']("{{session()->get('info')}}");
    </script>
@endif

@if (request()->session()->has('error'))
    <script>
            toastr['error']("{{session()->get('error')}}");
    </script>
@endif


@stack('after-scripts')

@if (trim($__env->yieldContent('page-script')))
    @yield('page-script')
@endif
</body>
</html>
