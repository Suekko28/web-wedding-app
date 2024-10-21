<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5">

    <!-- Meta tags for Open Graph (OGP) -->
    <meta property="og:title" content="The Wedding Of {{ $data->InformasiDesign4->nama_pasangan }}">
    <meta property="og:description" content="Undangan Pernikahan {{ $data->InformasiDesign4->nama_pasangan }}">
    <meta property="og:image" content="{{ Storage::url('' . $data->banner_img) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="The Wedding Of {{ $data->InformasiDesign4->nama_pasangan }}">
    <meta name="twitter:description" content="Undangan Pernikahan {{ $data->InformasiDesign4->nama_pasangan }}">
    <meta name="twitter:image" content="{{ Storage::url('' . $data->banner_img) }}">

    <!-- Fancybox and Jquery CDN
    This link get github repository -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        type="text/css" media="screen" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
    </script>
    <!-- BOOTSTRAP 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS STYLE -->
    <link href="{{ asset('css/wedding-design4.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="jquery.fancybox.min.css">
    <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('img/Jejak-Kebabagiaan_Favicon_32px.svg') }}">



    <title>The Wedding Of {{ $data->InformasiDesign4->nama_pasangan }}</title>

    <!-- BOOTSTRAP 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="overlay">
        <div class="overlayDoor"></div>
        <div class="overlayContent">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player class="animation-loading" src="{{ asset('img/loading.json') }}" background="transparent"
                speed="1" style="width: 96px; height: 96px" direction="1" mode="normal" loop
                autoplay></lottie-player>
        </div>
    </div>
    @if (!session('hide_offcanvas'))
        <div class="offcanvas offcanvas-top show" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <!-- <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="offcanvas" aria-label="Close"></button>
      </div> -->
            <div class="offcanvas-body">
                <div class="opening-undangan">
                    <p>Undangan Pernikahan</p>
                    <h2>{{ $data->InformasiDesign4->nama_pasangan }}</h2>
                </div>
                <div class="tujuan-undangan">
                    <div class="opening">
                        <p>Kepada Yth</p>
                        <p>Bapak/Ibu/Saudara/i</p>
                    </div>
                    <h3>Nama Tamu</h3>
                    <button type="button" onclick="playAudio()" class="btn-primary" data-bs-dismiss="offcanvas">Buka
                        Undangan</button>
                </div>
                <img class="background-offcanvas object-fit-cover" src="{{ Storage::url('' . $data->banner_img) }}"
                    alt="background">
            </div>
        </div>
    @endif

    <audio loop id="track">
        <source src="{{ Storage::url('' . $data->music) }}" type="audio/mpeg" />
    </audio>
    <button class="btn-float">
        <img id="play" onclick="toggleAudio()" src="{{ asset('img/sound-on.svg') }}" class="img-fluid"
            alt="Responsive image">
        <img id="pause" onclick="toggleAudio()" src="{{ asset('img/sound-off.svg') }}" class="img-fluid"
            alt="Responsive image">
    </button>
    <nav class="navigation">
        <ul>
            <li>
                <a href="#hero">
                    <img src="{{ asset('img/home-icon.svg') }}" alt="hero">
                </a>
                <a href="#kedua-mempelai">
                    <img src="{{ asset('img/ring-icon.svg') }}" alt="kedua-mempelai">
                </a>
                <a href="#perjalanan-cinta">
                    <img src="{{ asset('img/perjalanan-cinta.svg') }}" alt="perjalanan-cinta">
                </a>
                <a href="#gallery">
                    <img src="{{ asset('img/gallery-icon.svg') }}" alt="gallery">
                </a>
                <a href="#jadwal-pernikahan">
                    <img src="{{ asset('img/calendar-icon.svg') }}" alt="jadwal-pernikahan">
                </a>
                <a href="#doa-ucapan">
                    <img src="{{ asset('img/chat-icon.svg') }}" alt="doa-ucapan">
                </a>
            </li>
        </ul>
    </nav>
    <img class="background-template object-fit-cover" src="{{ Storage::url('' . $data->foto_prewedding) }}"
        alt="background">
    <div class="w-100 h-100" id="animation container">
        <script>
            var animation = bodymovin.loadAnimation({
                container: document.getElementById('animation container'),
                path: 'overlay-animation.json',
                render: 'svg',
                loop: true,
                autoplay: true,
                name: 'overlay animation'
            })
        </script>
    </div>
    <!-- HERO -->
    <section class="hero mw-100" id="hero">
        </div>
        <div class="title">
            <p>Pernikahan</p>
            <h2>{{ $data->InformasiDesign4->nama_pasangan }}</h2>
        </div>
        <div class="wedding-timer">
            <div id="timer">
                <div class="container-countdown">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-3">
                                    <p id="days" class="display-4">00</p>
                                    <p>Hari</p>
                                </div>
                                <div class="col-3">
                                    <p id="hours" class="display-4">00</p>
                                    <p>Jam</p>
                                </div>
                                <div class="col-3">
                                    <p id="minutes" class="display-4">00</p>
                                    <p>Menit</p>
                                </div>
                                <div class="col-3">
                                    <p id="seconds" class="display-4">00</p>
                                    <p>Detik</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="date">
                <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_akad)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                </p>
            </div>
        </div>
        <div class="background-overlay"></div>
    </section>
    <!-- HERO END -->

    <!-- MEMPELAI -->
    <section class="animation kedua-mempelai" id="kedua-mempelai">
        <div class="anm_mod bottom-bit fast mempelai-cover">
            <div class="mempelai-wanita">
                <img class="anm_mod left fast mempelai-wanita-img"
                    src="{{ Storage::url('' . $data->foto_mempelai_perempuan) }}" alt="Seserahan">
                <div class="anm_mod bottom fast detail-mempelai-wanita">
                    <div class="data-mempelai-wanita">
                        <span class="label">PENGANTIN WANITA</span>
                        <h2>{{ $data->nama_mempelai_perempuan }}</h2>
                        <p>Anak dari bapak {{ $data->putri_dari_bpk }} dan ibu {{ $data->putri_dari_ibu }}</p>
                    </div>
                    <a href="{{ $data->link_instagram1 }}" target="_blank" class="btn-link">
                        <img src="{{ asset('img/instagram-logo.svg') }}" alt="instagram">
                        <span>{{ $data->nama_instagram1 }}</span>
                    </a>
                </div>
            </div>
            <h2 class="anm_mod bottom-bit fast">&</h2>
            <div class="mempelai-pria">
                <div class="anm_mod bottom fast detail-mempelai-pria">
                    <div class="data-mempelai-pria">
                        <span class="label">PENGANTIN PRIA</span>
                        <h2>{{ $data->nama_mempelai_laki }}</h2>
                        <p>Anak dari bapak {{ $data->putra_dari_bpk }} dan ibu {{ $data->putra_dari_ibu }}</p>
                    </div>
                    <a href="{{ $data->link_instagram2 }}" target="_blank" class="btn-link">
                        <img src="{{ asset('img/instagram-logo.svg') }}" alt="instagram">
                        <span>{{ $data->nama_instagram2 }}</span>
                    </a>
                </div>
                <img class="anm_mod right fast mempelai-wanita-img"src="{{ Storage::url('' . $data->foto_mempelai_laki) }}"
                    alt="Seserahan">
            </div>
        </div>
    </section>
    <!-- MEMPELAI END -->

    <!-- PERJALANAN CINTA -->
    <section class="animation perjalanan-cinta" id="perjalanan-cinta">
        <div class="anm_mod bottom-bit fast perjalanan-cinta-cover">
            <h3 class="anm_mod bottom-bit fast">Perjalanan Cinta Kami</h3>
            @if ($data->PerjalananCintaDesign4->isNotEmpty())
                <div id="carouselExampleCaptions" class="carousel slide anm_mod bottom-bit delay"
                    data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($data->PerjalananCintaDesign4 as $key => $perjalanan)
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}"
                                aria-current="{{ $loop->first ? 'true' : '' }}"
                                aria-label="Slide {{ $key + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($data->PerjalananCintaDesign4 as $key => $perjalanan)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ Storage::url('' . $perjalanan->image1) }}"
                                    class="d-block story-img object-fit-cover" alt="story">
                                <div class="carousel-caption d-md-block">
                                    <div class="story-detail">
                                        <span class="vertical-line"></span>
                                        <span
                                            class="label">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $perjalanan->tanggal)->format('d-m-Y') }}</span>
                                        <h3>{{ $perjalanan->judul_cerita }}</h3>
                                        <p>{{ $perjalanan->deskripsi }}</p>
                                        <span class="vertical-line"></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                </div>
            @endif
        </div>
    </section>
    <!-- PERJALANAN CINTA END -->

    <!-- Gallery -->
    <section class="animation gallery" id="gallery">
        <div class="anm_mod bottom-bit fast container-gallery">
            <h3 class="anm_mod bottom-bit fast">Moment Kami</h3>
            @if (!empty($data) && !empty($data->quote_img))
                <div id="anm_mod bottom-bit fast carouselExampleIndicators" class="carousel slide"
                    data-bs-ride="carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="anm_mod bottom-bit fast quotes">
                            <div class="carousel-inner carousel-gallery">
                                @php
                                    $quoteImages = json_decode($data->quote_img, true); // Decode the JSON to get an array
                                @endphp
                                @foreach ($quoteImages as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <a href="{{ Storage::url($image) }}" data-fancybox="gallery">
                                            <img src="{{ Storage::url($image) }}"
                                                class="d-block w-100 h-100 object-fit-cover img-fluid"
                                                alt="Image Gallery">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <p>"{{ $data->quote }}"</p>
                        </div>
                        <div class="carousel-indicators indicators-gallery w-100">
                            @foreach ($quoteImages as $index => $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $index }}"
                                    class="{{ $index === 0 ? 'active' : '' }} thumbnail rounded-2"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}">
                                    <img src="{{ Storage::url($image) }}"
                                        class="d-block w-100 h-100 object-fit-cover rounded-2" alt="...">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- GALLERY END -->

    <!-- JADWAL PERNIKAHAN -->
    <section class="animation jadwal-pernikahan" id="jadwal-pernikahan">
        <div class="anm_mod bottom-bit fast container-jadwal-pernikahan">
            <h3 class="anm_mod bottom-bit fast">Jadwal Pernikahan</h3>
            <img src="{{ Storage::url('' . $data->akad_img) }}"
                class="anm_mod bottom-bit fast d-block jadwal-img object-fit-cover" alt="story">
            <div class="akad-resepsi">
                <div class="anm_mod left fast jadwal-detail">
                    <h3>Akad<h3>
                            <div class="detail">
                                <div class="info">
                                    <img src="{{ asset('img/calendar-icon.svg') }}" alt="calendar">
                                    <div class="detail-info">
                                        <span
                                            class="label">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_akad)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                                    </div>
                                </div>
                                <div class="info">
                                    <img src="{{ asset('img/clock-icon.svg') }}" alt="calendar">
                                    <div class="detail-info">
                                        <span class="label">
                                            {{ \Carbon\Carbon::parse($data->mulai_akad)->format('H:i') }} WIB -
                                            {{ \Carbon\Carbon::parse($data->selesai_akad)->format('H:i') }} WIB</span>
                                    </div>
                                </div>
                                <div class="info">
                                    <img src="{{ asset('img/location-icon.svg') }}" alt="calendar">
                                    <div class="detail-info">
                                        <span class="label">{{ $data->lokasi_akad }}</span>
                                        <p>{{ $data->deskripsi_akad }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="button-button">
                                <a type="button" target="_blank" href="{{ $data->link_akad }}"
                                    class="btn-secondary">Lihat Lokasi</a>
                                <a type="button" target="_blank" href="{{ $data->simpan_tgl_akad }}"
                                    class="btn-primary">Simpan Tanggal</a>
                            </div>
                </div>
                <span class="vertical-line"></span>
                <div class="anm_mod right fast jadwal-detail">
                    <h3>Resepsi<h3>
                            <div class="detail">
                                <div class="info">
                                    <img src="{{ asset('img/calendar-icon.svg') }}" alt="calendar">
                                    <div class="detail-info">
                                        <span
                                            class="label">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_resepsi)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                                    </div>
                                </div>
                                <div class="info">
                                    <img src="{{ asset('img/clock-icon.svg') }}" alt="calendar">
                                    <div class="detail-info">
                                        <span class="label">
                                            {{ \Carbon\Carbon::parse($data->mulai_resepsi)->format('H:i') }} WIB -
                                            {{ \Carbon\Carbon::parse($data->selesai_resepsi)->format('H:i') }}
                                            WIB</span>
                                    </div>
                                </div>
                                <div class="info">
                                    <img src="{{ asset('img/location-icon.svg') }}" alt="calendar">
                                    <div class="detail-info">
                                        <span class="label">{{ $data->lokasi_resepsi }}</span>
                                        <p>{{ $data->deskripsi_resepsi }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="button-button">
                                <a type="button" target="_blank" href="{{ $data->link_resepsi }}"
                                    class="btn-secondary">Lihat Lokasi</a>
                                <a type="button" target="_blank" href="{{ $data->simpan_tgl_resepsi }}"
                                    class="btn-primary">Simpan Tanggal</a>
                            </div>
                </div>
            </div>
            @if (!empty($data->link_streaming))
                <div class="anm_mod bottom-bit fast live-streaming">
                    <div class="detail-info">
                        <h3>Live Streaming</h3>
                        <p>Kami mengajak anda yang tidak hadir langsung untuk bergabung pada momen spesial kami melalui
                            siaran langsung secara live virtual di platform berikut</p>
                    </div>
                    <a type="button" target="_blank" href="{{ $data->link_streaming }}" class="btn-secondary">Buka
                        Link</a>
                </div>
            @endif
        </div>
    </section>
    <!-- JADWAL PERNIKAHAN END -->

    <!-- DOA & UCAPAN -->
    <section class="animation doa-ucapan" id="doa-ucapan">
        <div class="anm_mod bottom-bit fast custom-cover">
            <h3 class="anm_mod bottom-bit fast">Doa & Ucapan</h3>
            <div class="container-inner anm_mod bottom-bit fast">
                <div class="container-dashboard anm_mod bottom-bit fast">
                    <div class="card-dashboard-hadir">
                        <h3>5</h3> <!-- Menampilkan jumlah hadir -->
                        <p>Hadir</p>
                    </div>
                    <div class="card-dashboard-tidakhadir">
                        <h3>5</h3> <!-- Menampilkan jumlah tidak hadir -->
                        <p>Tidak Hadir</p>
                    </div>
                </div>
                <div class="container-doa-ucapan anm_mod bottom-bit fast">
                    <div class="form-input">
                        <form id="algin-form" class="rsvp-mobile3" method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input placeholder="Masukkan nama lengkap" type="text" name="nama"
                                    id="fullname" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="message">Ucapan</label>
                                <textarea placeholder="Masukkan kalimat ucapan" name="ucapan" id="msg" cols="30" rows="5"
                                    class="form-control" disabled></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Konfirmasi Kehadiran</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran"
                                        id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Hadir
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran"
                                        id="flexRadioDefault2" checked value="0">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak Hadir
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="post" class="btn-primary" disabled>Kirim</button>
                            </div>
                        </form>
                    </div>
                    <div class="comment-list">
                        <div class="card-comment">
                            <div class="title">
                                <div class="name">
                                    <h4>Jhon Doe</h4>
                                    <img src="{{ asset('img/hadir-icon.svg') }}" alt="hadir">
                                </div>
                                <span class="label">20 October, 2018 | 20:00 WIB</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic
                                aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                        </div>
                        <div class="card-comment">
                            <div class="title">
                                <div class="name">
                                    <h4>Paul</h4>
                                    <img src="{{ asset('img/tidak-hadir-icon.svg') }}" alt="hadir">
                                </div>
                                <span class="label">20 Oktober, 2018 | 20:00 WIB</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic
                                aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                        </div>
                        <div class="card-comment">
                            <div class="title">
                                <div class="name">
                                    <h4>Paul</h4>
                                    <img src="{{ asset('img/tidak-hadir-icon.svg') }}" alt="hadir">
                                </div>
                                <span class="label">20 Oktober, 2018 | 20:00 WIB</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic
                                aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                        </div>
                        <div class="card-comment">
                            <div class="title">
                                <div class="name">
                                    <h4>Paul</h4>
                                    <img src="{{ asset('img/tidak-hadir-icon.svg') }}" alt="hadir">
                                </div>
                                <span class="label">20 Oktober, 2018 | 20:00 WIB</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic
                                aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="kirim-hadiah anm_mod bottom-bit fast">
                <div class="info">
                    <h3>Kirim Hadiah</h3>
                    <p>Berikan hadiah kepada kedua mempelai</p>
                </div>
                <ul class="nav nav-pills id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Direct Transfer</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Kirim Hadiah</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        @foreach ($data->DirectTransferDesign4 as $item)
                            <div class="card">
                                <div class="card-body">
                                    @if (!empty($item->bank) || !empty($item->no_rek) || !empty($item->nama_rek))
                                        @if (!empty($item->bank))
                                            <h4 class="card-title">{{ $item->bank }}</h4>
                                        @endif
                                        <div class="info-norek">
                                            @if (!empty($item->no_rek))
                                                <p id="first">{{ $item->no_rek }}</p>
                                            @endif
                                            <a id="first-button" onclick="copyText('first');" title="Copy Text"
                                                class="btn-ghost">
                                                Copy
                                            </a>
                                        </div>
                                        @if (!empty($item->nama_rek))
                                            <p class="card-text">A/N {{ $item->nama_rek }}</p>
                                        @endif
                                </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @foreach ($data->KirimHadiahDesign4 as $item)
                        <div class="card">
                            <div class="card-body">
                                @if (!empty($item->alamat) || !empty($item->deskripsi_alamat))
                                    <h4 class="card-title">{{ $item->alamat }}</h4>
                                    <p class="card-text">{{ $item->deskripsi_alamat }}</p>
                                @endif
                    @endforeach
                </div>
            </div>
        </div>

    </section>
    <!-- DOA & UCAPAN -->

    <!-- ENDING -->
    <section class="animation akhir-undangan" id="akhir-undangan">
        <div class="info">
            <p class="anm_mod bottom-bit fast">Thank You</p>
            <h4 class="anm_mod bottom-bit fast">{{ $data->InformasiDesign4->nama_pasangan }}</h4>
        </div>
        <div class="overlay-bottom"></div>
    </section>
    <!-- ENDING END -->

    <!-- FOOTER -->
    <section class="footer" id="footer">
        <div class="follow-us">
            <p>Powered By</p>
            <a href="https://www.facebook.com/jejakkebahagiaan" target="_blank">
                <img style="height:32px" src="{{ asset('img/logo-jejakkebahagiaan.svg') }}" alt="Facebook">
            </a>
        </div>
        <div class="follow-us">
            <p>Follow Us</p>
            <a href="https://www.facebook.com/jejakkebahagiaan" target="_blank">
                <img style="height:24px" src="{{ asset('img/icon-facebook.svg') }}" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/jejakkebahagiaan/" target="_blank">
                <img style="height:24px" src="{{ asset('img/icon-instagram.svg') }}" alt="Instagram">
            </a>
            <a href="https://www.tiktok.com/@jejakkebahagiaan?_t=8pjtPh8o2JL&_r=1" target="_blank">
                <img style="height:24px" src="{{ asset('img/icon-tiktok.svg') }}" alt="Tiktok">
            </a>
        </div>
    </section>
    <!-- FOOTER END -->

    <!-- BOOTSTRAP 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <!-- JS STYLE -->
    <script src="{{ asset('js/style.js') }}"></script>
    <script>
        // Get all sections that have an ID defined
        const sections = document.querySelectorAll("section[id]");

        // Add an event listener listening for scroll
        window.addEventListener("scroll", navHighlighter);

        function navHighlighter() {

            // Get current scroll position
            let scrollY = window.pageYOffset;

            // Now we loop through sections to get height, top and ID values for each
            sections.forEach(current => {
                const sectionHeight = current.offsetHeight;
                const sectionTop = current.offsetTop - 50;
                sectionId = current.getAttribute("id");

                /*
                - If our current scroll position enters the space where current section on screen is, add .active class to corresponding navigation link, else remove it
                - To know which link needs an active class, we use sectionId variable we are getting while looping through sections as an selector
                */
                if (
                    scrollY > sectionTop &&
                    scrollY <= sectionTop + sectionHeight
                ) {
                    document.querySelector(".navigation a[href*=" + sectionId + "]").classList.add("active");
                } else {
                    document.querySelector(".navigation a[href*=" + sectionId + "]").classList.remove("active");
                }
            });
        }
    </script>
    <script>
        var x = document.getElementById("track");

        function playAudio() {
            x.play();
        }

        function pauseAudio() {
            x.pause();
        }
    </script>
    <script>
        function toggleAudio() {
            var audioElement = document.getElementById('track')
            var soundOn = document.getElementById('play')
            var soundOff = document.getElementById('pause')
            if (audioElement.paused) {
                audioElement.play();
                $(soundOn).show();
                $(soundOff).hide();
            } else {
                audioElement.pause();
                $(soundOn).hide();
                $(soundOff).show();
            }
        }
    </script>
    <script>
        var myOffcanvas = document.getElementById('myOffcanvas')
        myOffcanvas.addEventListener('show.bs.offcanvas', function() {
            // do something...
        })
    </script>
    <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
        triggerTabList.forEach(function(triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function(event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    </script>
    <script>
        // Set the date we're counting down to (1 month from now)
        const countDownDate = new Date("Sep 20, 2024 22:18:00").getTime();

        // Update the countdown every 1 second
        const x = setInterval(function() {
            // Get today's date and time
            const now = new Date().getTime();

            // Find the distance between now and the countdown date
            const distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result
            document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
            document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
            document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');

            // If the countdown is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("days").innerHTML = "00";
                document.getElementById("hours").innerHTML = "00";
                document.getElementById("minutes").innerHTML = "00";
                document.getElementById("seconds").innerHTML = "00";
            }
        }, 1000);
    </script>
    <script>
        function copyText(element) {
            var $copyText = document.getElementById(element).innerText;
            var button = document.getElementById(element + '-button');
            navigator.clipboard.writeText($copyText).then(function() {
                var originalText = button.innerText;
                button.innerText = 'Copied!';
                setTimeout(function() {
                    button.innerText = originalText;
                }, 750);
            }, function() {
                button.style.cssText = "background-color: var(--red);";
                button.innerText = 'Error';
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script>
        $(window).scroll(function() {
            $(".animation .anm_mod").each(function() {
                const position = $(this).offset().top;
                const scroll = $(window).scrollTop();
                const windowHeight = $(window).height();
                if (scroll > position - windowHeight) {
                    $(this).addClass("active");
                }
                if (scroll < 100) {
                    $(this).removeClass("active");
                }
            });
        });

        $(function() {
            $('a[href^="#"]').click(function() {
                const speed = 800;
                const href = $(this).attr("href");
                const target = $(href == "#" || href == "" ? "html" : href);
                const position = target.offset().top;
                $("html, body").animate({
                    scrollTop: position
                }, speed, "swing");
                return false;
            });
        });
    </script>
    <script>
        const container = document.querySelector('#bootstrap-image-gallery');
        window.lightGallery(container, {
            selector: '.lg-item',
            plugins: [
                lgZoom,
                lgThumbnail
            ],
        });
    </script>
    <script>
        $('.thumbnail-image').click(function() {
            $('.modal-body').empty();
            $($(this).parents('div').html()).appendTo('.modal-body');
            $('#modal').modal({
                show: true
            });
        });

        $('#modal').on('show.bs.modal', function() {
            $('.col-6,.row .thumbnail-image').addClass('blur');
        })

        $('#modal').on('hide.bs.modal', function() {
            $('.col-6,.row .thumbnail-image').removeClass('blur');
        })
    </script>
    <script>
        var track = document.getElementById('track');

        var controlBtn = document.getElementById('play-pause');

        function playPause() {
            if (track.paused) {
                track.play();
                //controlBtn.textContent = "Pause";
                controlBtn.className = "pause";
            } else {
                track.pause();
                //controlBtn.textContent = "Play";
                controlBtn.className = "play";
            }
        }

        controlBtn.addEventListener("click", playPause);
        track.addEventListener("ended", function() {
            controlBtn.className = "play";
        });
    </script>
    <script>
        const html = document.querySelector('html');
        html.setAttribute('data-bs-theme', 'light');

        document.addEventListener('DOMContentLoaded', () => {
            // --- Create LightBox
            const galleryGrid = document.querySelector(".gallery-grid");
            const links = galleryGrid.querySelectorAll("a");
            const imgs = galleryGrid.querySelectorAll("img");
            const lightboxModal = document.getElementById("lightbox-modal");
            const bsModal = new bootstrap.Modal(lightboxModal);
            const modalBody = lightboxModal.querySelector(".lightbox-content");

            function createCaption(caption) {
                return `<div class="carousel-caption d-none d-md-block">
            <h4 class="m-0">${caption}</h4>
          </div>`;
            }

            function createIndicators(img) {
                let markup = "",
                    i, len;

                const countSlides = links.length;
                const parentCol = img.closest('.col');
                const curIndex = [...parentCol.parentElement.children].indexOf(parentCol);

                for (i = 0, len = countSlides; i < len; i++) {
                    markup += `
            <button type="button" data-bs-target="#lightboxCarousel"
              data-bs-slide-to="${i}"
              ${i === curIndex ? 'class="active" aria-current="true"' : ''}
              aria-label="Slide ${i + 1}">
            </button>`;
                }

                return markup;
            }

            function createSlides(img) {
                let markup = "";
                const currentImgSrc = img.closest('.gallery-item').getAttribute("href");

                for (const img of imgs) {
                    const imgSrc = img.closest('.gallery-item').getAttribute("href");
                    const imgAlt = img.getAttribute("alt");

                    markup += `
            <div class="carousel-item${currentImgSrc === imgSrc ? " active" : ""}">
              <img class="d-block img-fluid w-100" src=${imgSrc} alt="${imgAlt}">
              ${imgAlt ? createCaption(imgAlt) : ""}
            </div>`;
                }

                return markup;
            }

            function createCarousel(img) {
                const markup = `
          <!-- Lightbox Carousel -->
          <div id="lightboxCarousel" class="carousel slide carousel-fade" data-bs-ride="true">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
              ${createIndicators(img)}
            </div>
            <!-- Wrapper for Slides -->
            <div class="carousel-inner justify-content-center mx-auto">
              ${createSlides(img)}
            </div>
            <!-- Controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          `;

                modalBody.innerHTML = markup;
            }

            for (const link of links) {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    const currentImg = link.querySelector("img");
                    const lightboxCarousel = document.getElementById("lightboxCarousel");

                    if (lightboxCarousel) {
                        const parentCol = link.closest('.col');
                        const index = [...parentCol.parentElement.children].indexOf(parentCol);

                        const bsCarousel = new bootstrap.Carousel(lightboxCarousel);
                        bsCarousel.to(index);
                    } else {
                        createCarousel(currentImg);
                    }

                    bsModal.show();
                });
            }

            // --- Support Fullscreen
            const fsEnlarge = document.querySelector(".btn-fullscreen-enlarge");
            const fsExit = document.querySelector(".btn-fullscreen-exit");

            function enterFS() {
                lightboxModal.requestFullscreen().then({}).catch(err => {
                    alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
                });
                fsEnlarge.classList.toggle("d-none");
                fsExit.classList.toggle("d-none");
            }

            function exitFS() {
                document.exitFullscreen();
                fsExit.classList.toggle("d-none");
                fsEnlarge.classList.toggle("d-none");
            }

            fsEnlarge.addEventListener("click", (e) => {
                e.preventDefault();
                enterFS();
            });

            fsExit.addEventListener("click", (e) => {
                e.preventDefault();
                exitFS();
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('[data-fancybox="gallery"]').fancybox({
                buttons: [
                    "slideShow",
                    "thumbs",
                    "zoom",
                    "fullScreen",
                    "share",
                    "close"
                ],
                loop: true,
                protect: true
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.13/lottie.min.js"></script>
    @if (session('hide_offcanvas'))
        <script>
            window.location.hash = '#doa-ucapan'; // Redirect with the hash
            document.getElementById('doa-ucapan').scrollIntoView();
        </script>
    @endif

    <script>
        function updateTimer(tgl_akad) {
            const future = Date.parse(tgl_akad);
            const now = new Date();
            const diff = future - now;

            if (diff <= 0) {
                // Waktu telah berlalu, atur semua nilai menjadi 0
                document.getElementById("days").innerText = "00";
                document.getElementById("hours").innerText = "00";
                document.getElementById("minutes").innerText = "00";
                document.getElementById("seconds").innerText = "00";
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((diff % (1000 * 60)) / 1000);

            // Format nilai untuk menambahkan angka 0 di depan jika nilainya < 10
            document.getElementById("days").innerText = (days < 10 ? "0" : "") + days;
            document.getElementById("hours").innerText = (hours < 10 ? "0" : "") + hours;
            document.getElementById("minutes").innerText = (mins < 10 ? "0" : "") + mins;
            document.getElementById("seconds").innerText = (secs < 10 ? "0" : "") + secs;
        }

        // Memanggil updateTimer() saat halaman dimuat dengan tanggal akad dari PHP
        updateTimer("{{ $data->tgl_akad }}");
        setInterval(updateTimer.bind(null, "{{ $data->tgl_akad }}"), 1000); // Memperbarui setiap detik
    </script>

    <script>
        function copyText(textElementId, buttonId) {
            var text = document.getElementById(textElementId).textContent;
            var button = document.getElementById(buttonId);

            // Copy the text to clipboard
            navigator.clipboard.writeText(text).then(function() {
                // Change button text to "Copied"
                button.textContent = 'Copied';

                // Change it back to "Copy" after 2 seconds
                setTimeout(function() {
                    button.textContent = 'Copy';
                }, 2000);
            }).catch(function(error) {
                console.error('Error copying text: ', error);
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            // Users can skip the loading process if they want.
            $('.skip').click(function() {
                $('.overlay, body').addClass('loaded');
            })

            // Will wait for everything on the page to load.
            $(window).bind('load', function() {
                $('.overlay, body').addClass('loaded');
                setTimeout(function() {
                    $('.overlay').css({
                        'display': 'none'
                    })
                }, 2500)
            });

            // Will remove overlay after 1min for users cannnot load properly.
            setTimeout(function() {
                $('.overlay, body').addClass('loaded');
            }, 2000);
        })
    </script>




</body>


</html>
