<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>

    <!-- BOOTSTRAP 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS STYLE -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="nav-link trigger" href="#hero">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link trigger active" aria-current="page" href="#hero">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link trigger" href="#promo">Promo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link trigger" href="#produk">Produk Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link trigger" href="#blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link trigger" href="#tanya-kami">Tanya Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @yield('navbar')
</body>
