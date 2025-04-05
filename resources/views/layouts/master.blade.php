<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="@yield('theme', 'light')" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    @include('layouts.head')
    <title>@yield('title', 'JejakKebahagiaan')</title>
    @yield('css')
    <link rel="website icon" type="png" href="{{ 'img/small-logo.jpg' }}">
</head>

</head>

<body class="link-sidebar">
    <!-- Preloader -->
    {{-- <div class="preloader">
        <img src="{{ asset('img/small-logo.jpg') }}" alt="loader" class="lds-ripple img-fluid" />
    </div> --}}
    <div id="main-wrapper">

        <div id="main-wrapper">
            @if (
                !request()->routeIs(
                    'nama-undangan-list1',
                    'nama-undangan-create1',
                    'nama-undangan-edit1',
                    'nama-undangan-list2',
                    'nama-undangan-create2',
                    'nama-undangan-edit2',
                    'nama-undangan-list3',
                    'nama-undangan-create3',
                    'nama-undangan-edit3',
                    'nama-undangan-list4',
                    'nama-undangan-create4',
                    'nama-undangan-edit4',
                    'nama-undangan-list5',
                    'nama-undangan-create5',
                    'nama-undangan-edit5',
                    'nama-undangan-list6',
                    'nama-undangan-create6',
                    'nama-undangan-edit6',))
                <!-- Sidebar will not be displayed for this route -->
                <!-- Sidebar only for other routes -->
                <aside class="left-sidebar with-vertical">
                    <div>@include('layouts.sidebar')</div>
                </aside>
            @endif
            @if (
                !request()->routeIs(
                    'nama-undangan-list1',
                    'nama-undangan-create1',
                    'nama-undangan-edit1',
                    'nama-undangan-list2',
                    'nama-undangan-create2',
                    'nama-undangan-edit2',
                    'nama-undangan-list3',
                    'nama-undangan-create3',
                    'nama-undangan-edit3',
                    'nama-undangan-list4',
                    'nama-undangan-create4',
                    'nama-undangan-edit4',
                    'nama-undangan-list5',
                    'nama-undangan-create5',
                    'nama-undangan-edit5',
                    'nama-undangan-list6',
                    'nama-undangan-create6',
                    'nama-undangan-edit6',))
                <div class="page-wrapper">
                    <!-- Header Start -->
                    <header class="topbar">
                        <div class="with-vertical">@include('layouts.header')</div>
                        <div class="app-header with-horizontal">@include('layouts.horizontal-header')</div>
                    </header>
            @endif

            <!-- Header End -->

            @if (
                !request()->routeIs(
                    'nama-undangan-list1',
                    'nama-undangan-create1',
                    'nama-undangan-edit1',
                    'nama-undangan-list2',
                    'nama-undangan-create2',
                    'nama-undangan-edit2',
                    'nama-undangan-list3',
                    'nama-undangan-create3',
                    'nama-undangan-edit3',
                    'nama-undangan-list4',
                    'nama-undangan-create4',
                    'nama-undangan-edit4',
                    'nama-undangan-list5',
                    'nama-undangan-create5',
                    'nama-undangan-edit5',
                    'nama-undangan-list6',
                    'nama-undangan-create6',
                    'nama-undangan-edit6',))
                <!-- Horizontal Sidebar -->
                <aside class="left-sidebar with-horizontal">
                    @include('layouts.horizontal-sidebar')
                </aside>
            @endif

            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('pageContent')
                </div>
            </div>
            @include('layouts.customizer')
        </div>

        <x-headers.dd-searchbar />
        <x-headers.dd-shopping-cart />
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    @include('layouts.scripts')
    @yield('scripts')
</body>

</html>
