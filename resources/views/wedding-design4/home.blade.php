<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fancybox and Jquery CDN
    This link get github repository -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="fancybox/jquery.fancybox.js"></script>
    <script>
        $("[data-fancybox]").fancybox();
    </script>
    <script src="fancybox.umd.js"></script>
    <link rel="stylesheet" href="fancybox.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!-- CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>JejakKebahagiaan</title>

    <!-- BOOTSTRAP 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS STYLE -->
    <link href="{{ asset('css/wedding-design4.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="offcanvas offcanvas-top show" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <!-- <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
    <button type="button" class="btn-close" data-coreui-dismiss="offcanvas" aria-label="Close"></button>
  </div> -->
        <div class="offcanvas-body">
            <div class="opening-undangan">
                <p>Undangan Pernikahan</p>
                <h2>{{ $data->nama_mempelai_laki }} & {{ $data->nama_mempelai_perempuan }}</h2>
            </div>
            <div class="tujuan-undangan">
                <div class="opening">
                    <p>Kepada Yth</p>
                    <p>Bapak/Ibu/Saudara/i</p>
                </div>
                <h3>{{ $nama_undangan }}</h3>
                <a type="button" id="play-pause" class="btn-primary" data-bs-dismiss="offcanvas"
                    href="{{ route('wedding-design3-preview', [
                        'nama_mempelai_laki' => $nama_mempelai_laki,
                        'nama_mempelai_perempuan' => $nama_mempelai_perempuan,
                        // 'nama_undangan' => $nama_undangan // Pastikan $nama_undangan telah diberikan nilai sebelumnya
                    ]) }}">Buka
                    Undangan</a>
            </div>
            <img class="background-offcanvas object-fit-cover" src="{{ Storage::url('' . $data->banner_img) }}" alt="background">
        </div>
    </div>
    <audio id="track">
        <source src="{{ Storage::url('' . $data->music) }}" type="audio/mpeg" />
    </audio>
    <button id="button" class="btn-float">
        <i class="bi bi-volume-up"></i>
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
    <img class="background-template object-fit-cover" src="{{ Storage::url('' . $data->foto_prewedding) }}" alt="background">
    <!-- HERO -->
    <section class="hero mw-100" id="hero">
        </div>
        <div class="title">
            <p>Pernikahan</p>
            <h2>{{ $data->nama_mempelai_laki }} & {{ $data->nama_mempelai_perempuan }}</h2>
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
            <div id="carouselExampleCaptions" class="carousel slide anm_mod bottom-bit delay"
                data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
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
        </div>
    </section>
    <!-- PERJALANAN CINTA END -->

    <!-- Gallery -->
    <section class="animation gallery" id="gallery">
        <div class="anm_mod bottom-bit fast container-gallery">
            <h3 class="anm_mod bottom-bit fast">Moment Kami</h3>
            <div id="anm_mod bottom-bit fast carouselExampleIndicators" class="carousel slide"
                data-bs-ride="carousel">
                <div class="anm_mod bottom-bit fast carousel-indicators indicators-gallery">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="indicator-gallery active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        class="indicator-gallery" aria-label="Slide 2">
                        <img src="https://user-images.githubusercontent.com/78242022/273443252-b034e050-3d70-48ef-9f0f-2d77ef9b2604.jpg"
                            class="d-block w-100 h-100 rounded object-fit-cover" alt="...">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        class="indicator-gallery" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        class="indicator-gallery" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        class="indicator-gallery" aria-label="Slide 5"></button>
                </div>
                <div class="anm_mod bottom-bit fast quotes">
                    <p>"Creating memories is a priceless gift. Memories last a lifetime; things last only a short time."
                    </p>
                    <div class="dots">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>
                <!-- Image Sliders -->
                <div class="carousel-inner gallery-inner">
                    <!-- Image one-->
                    <div class="carousel-item moment active">
                        <img src="https://user-images.githubusercontent.com/78242022/273443252-b034e050-3d70-48ef-9f0f-2d77ef9b2604.jpg"
                            class="d-block w-100 h-100 rounded object-fit-cover" alt="...">
                    </div>
                    <!-- image two -->
                    <div class="carousel-item moment">
                        <img src="https://user-images.githubusercontent.com/78242022/282697437-bb8d7140-128f-44e9-a11f-d0d5c8d29f87.png"
                            class="d-block w-100 h-100 rounded object-fit-cover" alt="...">
                    </div>
                    <!-- Image Three -->
                    <div class="carousel-item moment">
                        <img src="https://user-images.githubusercontent.com/78242022/273443248-130249b5-87b7-423d-9281-48d810bcd30d.jpg"
                            class="d-block w-100 h-100 rounded object-fit-cover" alt="...">
                    </div>

                    <!-- Image Four -->
                    <div class="carousel-item moment">
                        <img src="https://user-images.githubusercontent.com/78242022/273443251-9c210d6f-35ba-4861-885e-9b2e684ab339.jpg"
                            class="d-block w-100 h-100 rounded object-fit-cover" alt="...">
                    </div>

                    <!-- Image Five -->
                    <div class="carousel-item moment">
                        <img src="https://user-images.githubusercontent.com/78242022/282697428-7690f46f-5446-475a-be69-dbf5d8ccfacd.png"
                            class="d-block w-100 h-100 rounded object-fit-cover" alt="...">
                    </div>
                </div>
            </div>
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
        </div>
        <div class="anm_mod bottom-bit fast live-streaming">
            <div class="detail-info">
                <h3>Live Streaming</h3>
                <p>Kami mengajak anda yang tidak hadir langsung untuk bergabung pada momen spesial kami melalui
                    siaran langsung secara live virtual di platform berikut</p>
            </div>
            <a type="button" target="_blank" href="https://www.w3schools.com" class="btn-secondary">Buka
                Link</a>
        </div>
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
                        <h3>{{ $hadirCount }}</h3> <!-- Menampilkan jumlah hadir -->
                        <p>Hadir</p>
                    </div>
                    <div class="card-dashboard-tidakhadir">
                        <h3>{{ $tidakHadirCount }}</h3> <!-- Menampilkan jumlah tidak hadir -->
                        <p>Tidak Hadir</p>
                    </div>
                </div>
                <div class="container-doa-ucapan anm_mod bottom-bit fast">
                    <div class="form-input">
                        <form id="algin-form" class="rsvp-mobile3" method="POST"
                            action="{{ route('wedding-design4-post', [
                                'nama_mempelai_laki' => $nama_mempelai_laki,
                                'nama_mempelai_perempuan' => $nama_mempelai_perempuan,
                                'nama_undangan' => $nama_undangan,
                            ]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input placeholder="Masukkan nama lengkap" type="text" name="nama"
                                    id="fullname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Ucapan</label>
                                <textarea placeholder="Masukkan kalimat ucapan" name="ucapan" id="msg" cols="30" rows="5"
                                    class="form-control"></textarea>
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
                                <button type="submit" id="post" class="btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <div class="comment-list">
                        <div class="card-comment">
                            @foreach ($alt4models as $item)
                                <div class="title">
                                    <div class="name">
                                        <h4>{{ $item->nama }}</h4>
                                        <img src="{{ asset('img/hadir-icon.svg') }}" alt="hadir">
                                    </div>
                                    <span class="label">-
                                        {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM YYYY') }}

                                    </span>
                                </div>
                                <p>{!! $item->ucapan !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="kirim-hadiah anm_mod bottom-bit fast">
                <div class="info">
                    <h3>Kirim Hadiah</h3>
                    <p>Berikan hadiah kepada kedua mempelai</p>
                </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
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
                            </div>
                        </div>
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
            <h4 class="anm_mod bottom-bit fast">{{ $data->nama_mempelai_laki }} &
                {{ $data->nama_mempelai_perempuan }}</h4>
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
    <script>
        const container = document.getElementById("myCarousel");
        const options = {
            Dots: false
        };
        new Carousel(container, options, {
            Thumbs
        });
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
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
        const button = document.querySelector("#button");
        const icon = document.querySelector("#button > i");
        const audio = document.querySelector("audio");

        button.addEventListener("click", () => {
            if (audio.paused) {
                audio.volume = 1;
                audio.play();
                icon.classList.remove('bi bi-volume-up');
                icon.classList.add('bi bi-volume-mute');

            } else {
                audio.pause();
                icon.classList.remove('bi bi-volume-mute');
                icon.classList.add('bi bi-volume-up');
            }
        });
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
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.13/lottie.min.js"></script>
    <script>
        function updateTimer(tgl_akad) {
            future = Date.parse(tgl_akad);
            now = new Date();
            diff = future - now;

            if (diff <= 0) {
                // Waktu telah berlalu, atur semua nilai menjadi 0
                document.getElementById("days").innerText = "00";
                document.getElementById("hours").innerText = "00";
                document.getElementById("minutes").innerText = "00";
                document.getElementById("seconds").innerText = "00";
                return;
            }

            days = Math.floor(diff / (1000 * 60 * 60 * 24));
            hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            secs = Math.floor((diff % (1000 * 60)) / 1000);

            // Format nilai untuk menambahkan angka 0 di depan jika nilainya < 10
            days = (days < 10) ? "0" + days : days;
            hours = (hours < 10) ? "0" + hours : hours;
            mins = (mins < 10) ? "0" + mins : mins;
            secs = (secs < 10) ? "0" + secs : secs;

            document.getElementById("days").innerText = days;
            document.getElementById("hours").innerText = hours;
            document.getElementById("minutes").innerText = mins;
            document.getElementById("seconds").innerText = secs;
        }

        // Memanggil updateTimer() saat halaman dimuat dengan tanggal akad dari PHP
        updateTimer("{{ $data->tgl_akad }}");
        setInterval(updateTimer.bind(null, "{{ $data->tgl_akad }}"), 1000);
    </script>

</body>

</html>