<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Meta tags for Open Graph (OGP) -->
    <meta property="og:title" content="The Wedding Of {{ $data->InformasiDesign8->nama_pasangan }}">
    <meta property="og:description" content="Undangan Pernikahan {{ $data->InformasiDesign8->nama_pasangan }}">
    <meta property="og:image" content="{{ Storage::url('' . $data->banner_img) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="The Wedding Of {{ $data->InformasiDesign8->nama_pasangan }}">
    <meta name="twitter:description" content="Undangan Pernikahan {{ $data->InformasiDesign8->nama_pasangan }}">
    <meta name="twitter:image" content="{{ Storage::url('' . $data->banner_img) }}">


    <!-- Fancybox and Jquery CDN
    This link get github repository -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.8/jquery.fancybox.min.css"
        type="text/css" media="screen" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.8/jquery.fancybox.min.js">
    </script>
    <title>The Wedding Of {{ $data->InformasiDesign8->nama_pasangan }}</title>

    <!-- BOOTSTRAP 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS STYLE -->
    <link href="{{ asset('css/wedding-design8.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="jquery.fancybox.min.css">
    <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('img/Jejak-Kebabagiaan_Favicon_32px.svg') }}">

</head>

<body>
    <div class="overlay">
        <div class="overlayDoor"></div>
        <div class="overlayContent">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player class="animation-loading" src="{{ asset('img/design-8/loading.json') }}"
                background="transparent" speed="1" style="width: 96px; height: 96px" direction="1" mode="normal"
                loop autoplay></lottie-player>
        </div>
    </div>
    @if (!session('hide_offcanvas'))
        <div class="offcanvas offcanvas-top show" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <!-- <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="offcanvas" aria-label="Close"></button>
        </div> -->
            <div class="offcanvas-body">
                <div class="flower-left-cover">
                    <img class="flower-left object-fit-cover" src="{{ asset('img/design-8/element-2.svg') }}"
                        alt="background">
                </div>
                <div class="flower-right-cover">
                    <img class="flower-right object-fit-cover" src="{{ asset('img/design-8/element-1.svg') }}"
                        alt="background">
                </div>
                <div class="outer-undangan">
                    <div class="opening-undangan">
                        <p>Undangan Pernikahan</p>
                        <h1>{{ $data->InformasiDesign8->nama_pasangan }}</h1>
                    </div>
                    <div class="tujuan-undangan">
                        <div class="opening">
                            <p>Kepada Yth</p>
                            <p>Bapak/Ibu/Saudara/i</p>
                        </div>
                        <h3>Nama Tamu</h3>
                        <button type="button" onclick="playAudio()" style="display:none" class="btn-primary"
                            id="buttonPage" data-bs-dismiss="offcanvas">Buka Undangan</button>
                    </div>
                </div>
                <img class="background-offcanvas object-fit-cover" src="{{ asset('img/design-8/background.jpg') }}"
                    alt="background">
            </div>
        </div>
    @endif
    <audio loop autoplay id="track">
        <source src="{{ Storage::url('' . $data->music) }}" type="audio/mpeg" />
    </audio>
    <button class="btn-float">
        <img id="play" onclick="toggleAudio()" src="{{ asset('img/design-8/sound-on.svg') }}" class="img-fluid"
            alt="Responsive image">
        <img id="pause" onclick="toggleAudio()" src="{{ asset('img/design-8/sound-off.svg') }}" class="img-fluid"
            alt="Responsive image">
    </button>
    <nav class="navigation">
        <ul>
            <li>
                <a href="#hero">
                    <img src="{{ asset('img/design-8/home-icon.svg') }}" alt="hero">
                </a>
                <a href="#kedua-mempelai">
                    <img src="{{ asset('img/design-8/ring-icon.svg') }}" alt="kedua-mempelai">
                </a>
                <!-- <a href="#perjalanan-cinta">
                        <img src="{{ asset('img/design-8/perjalanan-cinta.svg') }}" alt="perjalanan-cinta">
                    </a> -->
                @if (!empty($data->judul_cinta) && !empty($data->deskripsi_cinta) && !empty($data->image_cinta))
                    <a href="#gallery">
                        <img src="{{ asset('img/design-9/gallery-icon.svg') }}" alt="gallery">
                    </a>
                @endif
                <a href="#jadwal-pernikahan">
                    <img src="{{ asset('img/design-8/calendar-icon.svg') }}" alt="jadwal-pernikahan">
                </a>
                <a href="#doa-ucapan">
                    <img src="{{ asset('img/design-8/chat-icon.svg') }}" alt="doa-ucapan">
                </a>
            </li>
        </ul>
    </nav>
    <img class="background-template object-fit-cover" src="{{ asset('img/design-8/background.jpg') }}"
        alt="background">
    <!-- HERO -->
    <section class="hero mw-100" id="hero">
        </div>
        <div class="title">
            <img src="{{ asset('img/design-8/element-3.svg') }}" class="devider-flower" alt="devider">
            <p>Pernikahan</p>
            <h1>{{ $data->InformasiDesign8->nama_pasangan }}</h1>
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
        <!-- <div class="background-overlay"></div> -->
    </section>
    <!-- HERO END -->
    <!-- MEMPELAI -->
    <section class="animation kedua-mempelai" id="kedua-mempelai">
        <div class="anm_mod bottom-bit fast mempelai-cover">
            <div class="title">
                <h2>{{ $data->judul_pembuka }}</h2>
                <p>{{ $data->deskripsi_pembuka }}</p>
            </div>
            <div class="anm_mod bottom-bit fast inner-mempelai">
                <div class="mempelai-wanita">
                    @if (!empty($data->foto_mempelai_perempuan))
                        <div class="container-image-wanita">
                            <img class="anm_mod left fast ring-wanita-img object-fit-cover"
                                src="{{ asset('img/design-8/element-6.svg') }}" alt="mempelai-wanita">
                            <img class="anm_mod left fast mempelai-wanita-img object-fit-cover"
                                src="{{ Storage::url('' . $data->foto_mempelai_perempuan) }}" alt="mempelai-wanita">
                            <img class="anm_mod left fast ring-flower-left object-fit-cover"
                                src="{{ asset('img/design-8/element-4.svg') }}" alt="mempelai-wanita">
                        </div>
                    @endif
                    <div class="anm_mod bottom fast detail-mempelai-wanita">
                        <div class="data-mempelai-wanita">
                            <h3>{{ $data->nama_mempelai_perempuan }}</h3>
                            <p>Anak dari Bapak {{ $data->putri_dari_bpk }} dan Ibu {{ $data->putri_dari_ibu }}</p>
                        </div>
                        @if (!empty($data->link_instagram1 && $data->nama_instagram1))
                            <a href="{{ $data->link_instagram1 }}" target="_blank" class="btn-link">
                                <img style="width: 20px;" src="{{ asset('img/design-8/logo-instagram.svg') }}"
                                    alt="instagram">
                                <span>{{ $data->nama_instagram1 }}</span>
                            </a>
                        @endif
                    </div>
                </div>
                <h3 class="anm_mod bottom-bit fast">&</h3>
                <div class="mempelai-pria">
                    @if (!empty($data->foto_mempelai_laki))
                        <div class="container-image-pria">
                            <img class="anm_mod left fast ring-pria-img object-fit-cover"
                                src="{{ asset('img/design-8/element-7.svg') }}" alt="mempelai-pria">
                            <img class="anm_mod right fast mempelai-wanita-img object-fit-cover"
                                src="{{ Storage::url('' . $data->foto_mempelai_laki) }}" alt="mempelai-pria">
                            <img class="anm_mod right fast ring-flower-right object-fit-cover"
                                src="{{ asset('img/design-8/element-5.svg') }}" alt="mempelai-pria">
                        </div>
                    @endif
                    <div class="anm_mod bottom fast detail-mempelai-pria">
                        <div class="data-mempelai-pria">
                            <h3>{{ $data->nama_mempelai_laki }}</h3>
                            <p>Anak dari Bapak {{ $data->putra_dari_bpk }} dan Ibu {{ $data->putra_dari_ibu }}</p>
                        </div>
                        @if (!empty($data->link_instagram2 && $data->link_instagram2))
                            <a href="{{ $data->link_instagram2 }}" target="_blank" class="btn-link">
                                <img style="width: 20px;" src="{{ asset('img/design-8/logo-instagram.svg') }}"
                                    alt="instagram">
                                <span>{{ $data->nama_instagram2 }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MEMPELAI END -->

    <!-- Gallery -->
    @if (!empty($data->image_cinta && $data->judul_cinta && $data->deskripsi_cinta))
        <section class="animation gallery" id="gallery">
            <div class="anm_mod bottom-bit fast container-gallery">
                <div class="title">
                    <h2>{{ $data->judul_cinta }}</h2>
                    <p>{{ $data->deskripsi_cinta }}</p>
                </div>
                @php
                    $images = is_array($data->image_cinta) ? $data->image_cinta : json_decode($data->image_cinta, true);
                @endphp
                <div class="container-card-gallery">

                    @foreach ($images as $image)
                        <div class="card-gallery">
                            <a href="{{ Storage::url($image) }}" data-fancybox="gallery">
                                <img class="gallery-img object-fit-cover" src="{{ Storage::url($image) }}"
                                    alt="Image Gallery">
                            </a>
                        </div>
                    @endforeach
                </div>
        </section>
    @endif
    <!-- GALLERY END -->

    <!-- JADWAL PERNIKAHAN -->
    <section class="animation jadwal-pernikahan" id="jadwal-pernikahan">
        <div class="anm_mod bottom-bit fast container-jadwal-pernikahan">
            <h2 class="anm_mod bottom-bit fast">{{ $data->judul_jadwal }}</h2>
            @if (!empty($data->akad_img))
                <div class="container-img-jadwal anm_mod bottom-bit fast">
                    <img src="{{ Storage::url('' . $data->akad_img) }}"
                        class="anm_mod bottom-bit fast d-block jadwal-img object-fit-cover" alt="story"
                        width="328" height="328">
                    <img src="{{ asset('img/design-8/element-8.svg') }}" class="element-flower" alt="devider">
                </div>
            @endif

            <div class="akad-resepsi">
                <div class="anm_mod left fast jadwal-detail">
                    @if (!empty($data->judul_akad))
                        <h3>{{ $data->judul_akad }}<h3>
                    @endif
                    <div class="detail">
                        <div class="info">
                            <img src="{{ asset('img/design-8/calendar-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span
                                    class="label">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_akad)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                            </div>
                        </div>
                        <div class="info">
                            <img src="{{ asset('img/design-8/clock-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">
                                    {{ \Carbon\Carbon::parse($data->mulai_akad)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($data->selesai_akad)->format('H:i') }}
                                    @if ($data->zona_waktu_akad == 1)
                                        WIB
                                    @elseif ($data->zona_waktu_akad == 2)
                                        WIT
                                    @elseif ($data->zona_waktu_akad == 3)
                                        WITA
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="info">
                            <img src="{{ asset('img/design-8/location-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">{{ $data->lokasi_akad }}</span>
                                <p>{{ $data->deskripsi_akad }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="button-button">
                        <a type="button" target="_blank" href="{{ $data->link_akad }}" class="btn-secondary">Lihat
                            Lokasi</a>
                        <a type="button" target="_blank" href="{{ $data->simpan_tgl_akad }}"
                            class="btn-primary">Simpan Tanggal</a>
                    </div>
                </div>
                <span class="vertical-line"></span>
                <div class="anm_mod right fast jadwal-detail">
                    @if (!empty($data->judul_resepsi))
                        <h3>{{ $data->judul_resepsi }}<h3>
                    @endif
                    <div class="detail">
                        <div class="info">
                            <img src="{{ asset('img/design-8/calendar-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span
                                    class="label">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_resepsi)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                            </div>
                        </div>
                        <div class="info">
                            <img src="{{ asset('img/design-8/clock-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">
                                    {{ \Carbon\Carbon::parse($data->mulai_resepsi)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($data->selesai_resepsi)->format('H:i') }}
                                    @if ($data->zona_waktu_resepsi == 1)
                                        WIB
                                    @elseif ($data->zona_waktu_resepsi == 2)
                                        WIT
                                    @elseif ($data->zona_waktu_resepsi == 3)
                                        WITA
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="info">
                            <img src="{{ asset('img/design-8/location-icon.svg') }}" alt="calendar">
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
                            action="{{ route('wedding-design8-post', [
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
                        @foreach ($alt8models as $item)
                            <div class="card-comment">
                                <div class="title">
                                    <div class="name">
                                        <h4>{{ $item->nama }}</h4>
                                        @if ($item->kehadiran == 1)
                                            <img src="{{ asset('img/design-8/hadir-icon.svg') }}" alt="hadir">
                                        @else
                                            <img src="{{ asset('img/design-8/tidak-hadir-icon.svg') }}"
                                                alt="tidak hadir">
                                        @endif

                                    </div>
                                    <span class="label">
                                        {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM, YYYY | H:mm') }}
                                        WIB</span>
                                </div>
                                <p>{!! $item->ucapan !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if ($data->DirectTransferDesign8->isNotEmpty() || $data->KirimHadiahDesign8->isNotEmpty())
                <div class="kirim-hadiah anm_mod bottom-bit fast">
                    <div class="info">
                        <h3>Kirim Hadiah</h3>
                        <p>Berikan hadiah kepada kedua mempelai</p>
                    </div>

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @if ($data->DirectTransferDesign8->isNotEmpty())
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">Direct Transfer</button>
                            </li>
                        @endif
                        @if ($data->KirimHadiahDesign8->isNotEmpty())
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $data->DirectTransferDesign8->isEmpty() ? 'active' : '' }}"
                                    id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                                    type="button" role="tab" aria-controls="pills-profile"
                                    aria-selected="{{ $data->DirectTransferDesign8->isEmpty() ? 'true' : 'false' }}">
                                    Kirim Hadiah
                                </button>
                            </li>
                        @endif
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        @if ($data->DirectTransferDesign8->isNotEmpty())
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                @foreach ($data->DirectTransferDesign8 as $index => $item)
                                    <div class="card">
                                        <div class="card-body">
                                            @if (!empty($item->bank) || !empty($item->no_rek) || !empty($item->nama_rek))
                                                @if (!empty($item->bank))
                                                    <h4 class="card-title">{{ $item->bank }}</h4>
                                                @endif
                                                <div class="info-norek">
                                                    @if (!empty($item->no_rek))
                                                        <p id="norek-{{ $index }}">{{ $item->no_rek }}</p>
                                                    @endif
                                                    <a id="btn-copy-{{ $index }}"
                                                        onclick="copyText('norek-{{ $index }}', 'btn-copy-{{ $index }}');"
                                                        title="Copy Text" class="btn-ghost">
                                                        Copy
                                                    </a>
                                                </div>
                                                @if (!empty($item->nama_rek))
                                                    <p class="card-text">A/N {{ $item->nama_rek }}</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if ($data->KirimHadiahDesign8->isNotEmpty())
                            <div class="tab-pane fade {{ $data->DirectTransferDesign8->isEmpty() ? 'show active' : '' }}"
                                id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                @foreach ($data->KirimHadiahDesign8 as $item)
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
                        @endif
                    </div>
                </div>
            @endif
        </div>
        </div>
    </section>
    <!-- DOA & UCAPAN -->


    <!-- ENDING -->
    <section class="animation akhir-undangan" id="akhir-undangan">
        <div class="info">
            <p class="anm_mod bottom-bit fast">{{ $data->deskripsi_penutup }}</p>
            <h3 class="anm_mod bottom-bit fast">{{ $data->nama_mempelai_perempuan }} &
                {{ $data->nama_mempelai_laki }}</h3>
        </div>
        <img class="ending-background object-fit-cover" src="{{ asset('img/design-8/element-9.svg') }}"
            alt="background">
    </section>
    <!-- ENDING END -->

    <!-- FOOTER -->
    <section class="footer" id="footer">
        <div class="follow-us">
            <p>Powered By</p>
            <a href="https://www.facebook.com/jejakkebahagiaan" target="_blank">
                <img style="height:32px" src="{{ asset('img/design-8/logo-jejakkebahagiaan.svg') }}"
                    alt="Facebook">
            </a>
        </div>
        <div class="follow-us">
            <p>Follow Us</p>
            <a href="https://www.facebook.com/jejakkebahagiaan" target="_blank">
                <img style="height:24px" src="{{ asset('img/design-8/icon-facebook.svg') }}" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/jejakkebahagiaan/" target="_blank">
                <img style="height:24px" src="{{ asset('img/design-8/icon-instagram.svg') }}" alt="Instagram">
            </a>
            <a href="https://www.tiktok.com/@jejakkebahagiaan?_t=8pjtPh8o2JL&_r=1" target="_blank">
                <img style="height:24px" src="{{ asset('img/design-8/icon-tiktok.svg') }}" alt="Tiktok">
            </a>
        </div>
    </section>
    <!-- FOOTER END -->

    <!-- BOOTSTRAP 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN8N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K8U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh28Xc0jk="
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
        function updateTimer(tgl_akad) {
            const future = Date.parse(tgl_akad);
            const now = new Date();
            const diff = future - now;

            if (diff <= 0) {
                // Waktu telah berlalu, atur semua nilai menjadi 0
                document.getElementById("days").textContent = "00";
                document.getElementById("hours").textContent = "00";
                document.getElementById("minutes").textContent = "00";
                document.getElementById("seconds").textContent = "00";
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((diff % (1000 * 60)) / 1000);

            // Format nilai untuk menambahkan angka 0 di depan jika nilainya < 10
            document.getElementById("days").textContent = days < 10 ? "0" + days : days;
            document.getElementById("hours").textContent = hours < 10 ? "0" + hours : hours;
            document.getElementById("minutes").textContent = mins < 10 ? "0" + mins : mins;
            document.getElementById("seconds").textContent = secs < 10 ? "0" + secs : secs;
        }

        // Inisialisasi timer
        const tglAkad = "{{ $data->tgl_akad }}"; // Pastikan ini diisi dengan format tanggal yang valid
        setInterval(() => updateTimer(tglAkad), 1000);
    </script>
    <script>
        function copyText(textElementId, buttonId) {
            var textElement = document.getElementById(textElementId);
            var button = document.getElementById(buttonId);

            if (!textElement) {
                console.error("Element with ID " + textElementId + " not found.");
                return;
            }

            var text = textElement.textContent.trim();

            navigator.clipboard.writeText(text).then(function() {
                // Ubah teks tombol menjadi "Copied"
                if (button) {
                    button.textContent = 'Copied';
                    // Kembalikan teks tombol ke "Copy" setelah 2 detik
                    setTimeout(function() {
                        button.textContent = 'Copy';
                    }, 2000);
                }
            }).catch(function(error) {
                console.error('Error copying text: ', error);
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC8Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN8N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I8E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
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
        // Fancybox Config
        $('[data-fancybox="gallery"]').fancybox({
            buttons: [
                "slideShow",
                "thumbs",
                "zoom",
                "fullScreen",
                "share",
                "close"
            ],
            loop: false,
            protect: true
        });
    </script>
    <script>
        window.onload = function() {
            // code goes here
        };
        {
            $("button").show()
        };
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
        })
    </script>
    <!-- <script>
        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script> -->
    </script>
    <script>
        (function($) {
            "use strict";
            // Auto-scroll
            $('#myCarousel').carousel({
                interval: 5000
            });

            // Control buttons
            $('.next').click(function() {
                $('.carousel').carousel('next');
                return false;
            });
            $('.prev').click(function() {
                $('.carousel').carousel('prev');
                return false;
            });

            // On carousel scroll
            $("#myCarousel").on("slide.bs.carousel", function(e) {
                var $e = $(e.relatedTarget);
                var idx = $e.index();
                var itemsPerSlide = 3;
                var totalItems = $(".carousel-item").length;
                if (idx >= totalItems - (itemsPerSlide - 1)) {
                    var it = itemsPerSlide -
                        (totalItems - idx);
                    for (var i = 0; i < it; i++) {
                        // append slides to end 
                        if (e.direction == "left") {
                            $(
                                ".carousel-item").eq(i).appendTo(".carousel-inner");
                        } else {
                            $(".carousel-item").eq(0).appendTo(".carousel-inner");
                        }
                    }
                }
            });
        })
        (jQuery);
    </script>

    @if (session('hide_offcanvas'))
        <script>
            window.location.hash = '#doa-ucapan'; // Redirect with the hash
            document.getElementById('doa-ucapan').scrollIntoView();
        </script>
    @endif
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.8.13/lottie.min.js"></script>
</body>

</html>
