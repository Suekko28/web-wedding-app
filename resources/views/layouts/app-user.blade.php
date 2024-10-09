<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/styles.scss'])

    <!-- Meta Title -->
    <title>Undangan Digital Pernikahan & Hias Seserahan, Konsultasi Gratis!</title>

    <!-- Meta Description -->
    <meta name="description"
        content="Solusi terbaik dalam persiapan pernikahan dari Hias Seserahan & Undangan Digital. Dapatkan konsultasi gratis untuk merancang seserahan dan undangan digital sesuai dengan keinginan Anda.">

    <!-- Meta Keywords -->
    <meta name="keywords"
        content="Undangan Digital, Pernikahan, Hias Seserahan, Konsultasi Gratis, Undangan Online, Persiapan Pernikahan, Seserahan Custom">

    <!-- Meta Author -->
    <meta name="author" content="JejakKebahagiaan">

    <!-- Open Graph for Social Media Sharing -->
    <meta property="og:title" content="Undangan Digital Pernikahan & Hias Seserahan, Konsultasi Gratis!">
    <meta property="og:description"
        content="Solusi terbaik dalam persiapan pernikahan dari Hias Seserahan & Undangan Digital.">
    <meta property="og:image" content="{{ asset('img/Jejak-Kebahagiaan_Favicon_64px.svg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Undangan Digital Pernikahan & Hias Seserahan, Konsultasi Gratis!">
    <meta name="twitter:description"
        content="Solusi terbaik dalam persiapan pernikahan dari Hias Seserahan & Undangan Digital.">
    <meta name="twitter:image" content="{{ asset('img/Jejak-Kebahagiaan_Favicon_64px.svg') }}">

    <!-- BOOTSTRAP 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS STYLE -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/Jejak-Kebahagiaan_Favicon_64px.svg') }}"
        alt="Logo JejakKebahagiaan - Undangan Digital dan Hias Seserahan" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="nav-link trigger" href="{{ url('/') }}">
                <img src="{{ asset('img/Jejak-Kebahagiaan_Logo-Full.svg') }}" alt="logo">
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
                    <!-- resources/views/layouts/navbar.blade.php -->

                    <ul class="navbar-nav ms-auto">
                        @if (Request::is('/'))
                            <!-- Navbar untuk Landing Page -->
                            <li class="nav-item">
                                <a class="nav-link trigger {{ Request::is('/') ? 'active' : '' }}"
                                    href="#hero">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link trigger {{ Request::is('#promo') ? 'active' : '' }}"
                                    href="#promo">Promo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link trigger {{ Request::is('#produk') ? 'active' : '' }}"
                                    href="#produk">Produk Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link trigger {{ Request::is('#blog') ? 'active' : '' }}"
                                    href="#blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link trigger {{ Request::is('#tanya-kami') ? 'active' : '' }}"
                                    href="#tanya-kami">Tanya Kami</a>
                            </li>
                        @else
                            <!-- Navbar untuk Blog View dan lainnya -->
                            <li class="nav-item">
                                <a class="nav-link trigger" href="{{ url('/') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link trigger" href="{{ url('/') }}">Promo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link trigger" href="{{ url('/') }}">Produk Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link trigger" href="{{ url('/') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link trigger" href="{{ url('/') }}">Tanya Kami</a>
                            </li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>
    </nav>
    @yield('navbar')

    @include('layouts.footer')
</body>
<!-- BOOTSTRAP 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<!-- JS STYLE -->
<script src="{{ asset('js/style.js') }}"></script>
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WeddingEvent",
      "name": "Undangan Digital & Hias Seserahan",
      "description": "Konsultasi gratis untuk undangan digital pernikahan dan hias seserahan.",
      "image": "{{ asset('img/Jejak-Kebahagiaan_Favicon_64px.svg') }}",
      "url": "{{ url()->current() }}",
      "organizer": {
        "@type": "Organization",
        "name": "JejakKebahagiaan",
        "url": "{{ url('/') }}"
      }
    }
    </script>



</html>
