<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link rel="stylesheet" href="{{ asset('./css/home-mufli.css') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Cormorant Infant:wght@400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rouge Script:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant Garamond:wght@700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Marck Script:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Optima:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Serif Display:wght@400&display=swap" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=NanumMyeongjo:wght@400;700;800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Besley:wght@400;700&display=swap" />
</head>

<body>
    <div class="home3">
        <div class="navigation3">
            <div class="menu" id="menu15">
                <img class="home-icon3" loading="lazy" alt="" src="{{ asset('./assets/home.svg') }}" />
            </div>
            <div class="menu" id="menu16">
                <div class="love3">
                    <img class="vector-stroke-icon3" loading="lazy" alt=""
                        src="{{ asset('./assets/vector-stroke.svg') }}" />

                    <div class="badge34">
                        <div class="div52">12</div>
                    </div>
                </div>
            </div>
            <div class="menu" id="menu17">
                <img class="calendar-icon3" loading="lazy" alt="" src="{{ asset('./assets/calendar.svg') }}" />
            </div>
            <div class="menu" id="menu18">
                <img class="image-icon3" loading="lazy" alt="" src="{{ asset('./assets/image.svg') }}" />
            </div>
            <div class="menu" id="menu19">
                <img class="image-icon3" loading="lazy" alt="" src="{{ asset('./assets/vector-1.svg') }}" />
            </div>
        </div>
        <section class="banner-image" data-scroll-to='BannerImage'
            style="background-image: url('{{ Storage::url('' . $data->foto_prewedding) }}');">

            <div class="card-list12">
                <div class="card-item">
                    <div class="the-wedding-of2">THE WEDDING OF</div>
                    <h1 class="alexnor-exafator1">{{ $data->nama_mempelai_laki }} & {{ $data->nama_mempelai_perempuan }}
                    </h1>
                </div>
                <!-- <button class="Primary-button">Lihat Detail
                    <div class="mail27">
                        <img class="vector-icon30" alt="" src="{{ asset('./assets/vector.svg') }}" />
                        <div class="badge33">
                            <div class="div51">12</div>
                        </div>
                    </div>
                    <img class="add-icon27" alt="" src="{{ asset('./assets/add.svg') }}" />
                </button> -->
            </div>
            <div class="input-name-field">
                <div class="input-message-field">
                </div>

                <audio autoplay loop controls id="myAudio" src="{{ Storage::url('' . $data->music) }}"></audio>

                <button class="floating-button" id="floatingButton">
                    <div class="whatsapp-video-2024-01-30-at-1"></div>
                    <img class="play-icon" alt="" src="{{ asset('./assets/play.svg') }}" />
                    <img class="pause-1-icon" alt="" src="{{ asset('./assets/Pause.gif') }}" />
                </button>

            </div>
        </section>

        <section class="doa-hadiah-container" data-scroll-to="DoaHadiahContainer">
            <div class="kedua-mempelai">
                <div class="header-frame">
                    <div class="month-selection">
                        <div class="year-selection">
                            <b class="b40">بسم الله الرحمن الرحيم</b>
                            <b class="assalamualaikum-wrwb">Assalamualaikum wr.wb</b>
                        </div>
                        <div class="tanpa-mengurangi-rasa-container">
                            <p class="tanpa-mengurangi-rasa">
                                Tanpa mengurangi rasa hormat. Kami mengundang
                                Bapak/Ibu/Saudara/i serta kerabat sekalian untuk menghadiri acara pernikahan anak kami:
                            </p>
                        </div>
                    </div>
                    <div class="mempelai-pria">
                        <div class="mempelai-info">
                            <div class="day-of-week">
                                <h1 class="alexnor">{{ $data->nama_mempelai_laki }}</h1>
                                <div class="putra-pertama-dari">
                                    Putra pertama dari bapak {{ $data->putra_dari_bpk }} & ibu
                                    {{ $data->putra_dari_ibu }}
                                </div>
                            </div>
                            <a target="_blank" class="button-link" href="{{ $data->link_instagram1 }}"
                                target="_blank" style="text-direction:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                    viewBox="0 0 20 21" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.75 6C1.75 3.92893 3.42893 2.25 5.5 2.25H14.5C16.5711 2.25 18.25 3.92893 18.25 6V15C18.25 17.0711 16.5711 18.75 14.5 18.75H5.5C3.42893 18.75 1.75 17.0711 1.75 15V6ZM5.5 3.75C4.25736 3.75 3.25 4.75736 3.25 6V15C3.25 16.2426 4.25736 17.25 5.5 17.25H14.5C15.7426 17.25 16.75 16.2426 16.75 15V6C16.75 4.75736 15.7426 3.75 14.5 3.75H5.5Z"
                                        fill="#1D1C16" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 7.5625C8.37766 7.5625 7.0625 8.87766 7.0625 10.5C7.0625 12.1223 8.37766 13.4375 10 13.4375C11.6223 13.4375 12.9375 12.1223 12.9375 10.5C12.9375 8.87766 11.6223 7.5625 10 7.5625ZM5.5625 10.5C5.5625 8.04924 7.54924 6.0625 10 6.0625C12.4508 6.0625 14.4375 8.04924 14.4375 10.5C14.4375 12.9508 12.4508 14.9375 10 14.9375C7.54924 14.9375 5.5625 12.9508 5.5625 10.5Z"
                                        fill="#1D1C16" />
                                    <path
                                        d="M15.6875 5.8125C15.6875 6.36478 15.2398 6.8125 14.6875 6.8125C14.1352 6.8125 13.6875 6.36478 13.6875 5.8125C13.6875 5.26022 14.1352 4.8125 14.6875 4.8125C15.2398 4.8125 15.6875 5.26022 15.6875 5.8125Z" />
                                </svg>
                                {{ $data->nama_instagram1 }}
                            </a>
                        </div>
                        <div class="profile-container">
                            <div class="profile-pict-man">
                                <img class="profile-pict-man"
                                    src="{{ Storage::url('' . $data->foto_mempelai_laki) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="mempelai-wanita">
                        <div class="profile-container">
                            <div class="profile-pict-woman">
                                <img class="profile-pict-man"
                                    src="{{ Storage::url('' . $data->foto_mempelai_perempuan) }}" alt="">
                            </div>
                        </div>
                        <div class="info-mempelai-wanita">
                            <div class="venue-name">
                                <h1 class="nama-wanita">{{ $data->nama_mempelai_perempuan }}</h1>
                                <div class="putra-pertama-dari1">
                                    Putra pertama dari Bapak {{ $data->putri_dari_bpk }} & Ibu
                                    {{ $data->putri_dari_ibu }}
                                </div>
                            </div>
                            <a target="_blank" class="button-link" href="{{ $data->link_instagram2 }}"
                                target="_blank" style="text-direction:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                    viewBox="0 0 20 21" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.75 6C1.75 3.92893 3.42893 2.25 5.5 2.25H14.5C16.5711 2.25 18.25 3.92893 18.25 6V15C18.25 17.0711 16.5711 18.75 14.5 18.75H5.5C3.42893 18.75 1.75 17.0711 1.75 15V6ZM5.5 3.75C4.25736 3.75 3.25 4.75736 3.25 6V15C3.25 16.2426 4.25736 17.25 5.5 17.25H14.5C15.7426 17.25 16.75 16.2426 16.75 15V6C16.75 4.75736 15.7426 3.75 14.5 3.75H5.5Z"
                                        fill="#1D1C16" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 7.5625C8.37766 7.5625 7.0625 8.87766 7.0625 10.5C7.0625 12.1223 8.37766 13.4375 10 13.4375C11.6223 13.4375 12.9375 12.1223 12.9375 10.5C12.9375 8.87766 11.6223 7.5625 10 7.5625ZM5.5625 10.5C5.5625 8.04924 7.54924 6.0625 10 6.0625C12.4508 6.0625 14.4375 8.04924 14.4375 10.5C14.4375 12.9508 12.4508 14.9375 10 14.9375C7.54924 14.9375 5.5625 12.9508 5.5625 10.5Z"
                                        fill="#1D1C16" />
                                    <path
                                        d="M15.6875 5.8125C15.6875 6.36478 15.2398 6.8125 14.6875 6.8125C14.1352 6.8125 13.6875 6.36478 13.6875 5.8125C13.6875 5.26022 14.1352 4.8125 14.6875 4.8125C15.2398 4.8125 15.6875 5.26022 15.6875 5.8125Z" />
                                </svg>
                                {{ $data->nama_instagram2 }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="love-story" style="background-image: url('{{ Storage::url('' . $data->background_img) }}');">
                <div class="content">
                    <b class="love-story3">Love Story</b>
                    <div class="card-story-list">
                        @if (!empty($data->perkenalan) && !empty($data->tgl_cerita1) && !empty($data->judul_cerita1))
                            <div class="card-story">
                                <span class="title-story">{{ $data->judul_cerita1 }}</span>
                                <div class="body-card">
                                    <span
                                        class="story-date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_cerita1)->locale('id')->isoFormat('MMMM, YYYY') }}</span>
                                    <span class="detail-story">
                                        {{ $data->perkenalan }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="card-story" style="display: none"></div>
                        @endif
                        @if (!empty($data->jadian) && !empty($data->tgl_cerita2) && !empty($data->judul_cerita2))
                            <div class="card-story">
                                <span class="title-story">{{ $data->judul_cerita2 }}</span>
                                <div class="body-card">
                                    <span
                                        class="story-date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_cerita2)->locale('id')->isoFormat('MMMM, YYYY') }}</span>
                                    <span class="detail-story">
                                        {{ $data->jadian }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="card-story" style="display: none"></div>
                        @endif

                        @if (!empty($data->tunangan) && !empty($data->tgl_cerita3) && !empty($data->judul_cerita3))
                            <div class="card-story">
                                <span class="title-story">{{ $data->judul_cerita3 }}</span>
                                <div class="body-card">
                                    <span
                                        class="story-date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_cerita3)->locale('id')->isoFormat('MMMM, YYYY') }}</span>
                                    <span class="detail-story">
                                        {{ $data->tunangan }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="card-story" style="display: none"></div>
                        @endif

                        @if (!empty($data->pernikahan) && !empty($data->tgl_cerita4) && !empty($data->judul_cerita4))
                            <div class="card-story">
                                <span class="title-story">{{ $data->judul_cerita4 }}</span>
                                <div class="body-card">
                                    <span
                                        class="story-date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_cerita4)->locale('id')->isoFormat('MMMM, YYYY') }}</span>
                                    <span class="detail-story">
                                        {{ $data->pernikahan }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="card-story" style="display: none"></div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="wedding-date" data-scroll-to="date">
            <span class="title">Wedding Time
            </span>
            <div id="timer"></div>
            <div class="main-frame">
                <div class="info-akad">
                    <span class="title">Akad Nikah</span>
                    <span class="paragraph">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_akad)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                        | {{ \Carbon\Carbon::parse($data->mulai_akad)->format('H:i') }} WIB

                    </span>
                    <span class="paragraph">
                        {{ $data->alamat_akad }}
                    </span>
                </div>
                <img class="layer-2-icon" loading="lazy" alt=""
                    src="{{ asset('./assets/layer-2.svg') }}" />
                <div class="info-resepsi">
                    <span class="title">Resepsi</span>
                    <span class="paragraph">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_resepsi)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                        | {{ \Carbon\Carbon::parse($data->mulai_resepsi)->format('H:i') }} WIB
                    </span>
                    <span class="paragraph">
                        {{ $data->alamat_resepsi }}
                    </span>
                </div>
                <a target="_blank" class="Primary-button" href="{{ $data->lokasi_gmaps }}" target="_blank">
                    Lihat Lokasi
                    <!-- <a class="lihat-lokasi2" href="https://www.google.com/maps" target="_blank">Lihat
                                Lokasi</a> -->
                    <!-- <img class="add-icon29" alt="" src="{{ asset('./assets/add.svg') }}" /> -->
                </a>
                <img class="flower-right" alt="" src="{{ asset('./assets/Flower-right.png') }}" />
                <img class="flower-left" alt="" src="{{ asset('./assets/Flower-left.png') }}" />
            </div>
        </section>

        <section class="gallery-foto" data-scroll-to="GalleryFoto">
            <span class="title">Galeri Foto</span>
            <div class="noapplicabledataforthesenodes">
                @if ($data->galeri_img1 && Storage::exists($data->galeri_img1))
                    <img class="noapplicabledataforthesenodes-icon" loading="lazy" alt=""
                        src="{{ Storage::url($data->galeri_img1) }}" />
                @else
                    <div class="noapplicabledataforthesenodes-icon" style="display: none"></div>
                @endif
                @if ($data->galeri_img2 && Storage::exists($data->galeri_img2))
                    <img class="noapplicabledataforthesenodes-icon" loading="lazy" alt=""
                        src="{{ Storage::url($data->galeri_img2) }}" />
                @else
                    <div class="noapplicabledataforthesenodes-icon" style="display: none"></div>
                @endif

                @if ($data->galeri_img3 && Storage::exists($data->galeri_img3))
                    <img class="noapplicabledataforthesenodes-icon" loading="lazy" alt=""
                        src="{{ Storage::url($data->galeri_img3) }}" />
                @else
                    <div class="noapplicabledataforthesenodes-icon" style="display: none"></div>
                @endif

                @if ($data->galeri_img4 && Storage::exists($data->galeri_img4))
                    <img class="noapplicabledataforthesenodes-icon" loading="lazy" alt=""
                        src="{{ Storage::url($data->galeri_img4) }}" />
                @else
                    <div class="noapplicabledataforthesenodes-icon" style="display: none"></div>
                @endif
                @if ($data->galeri_img5 && Storage::exists($data->galeri_img5))
                    <img class="noapplicabledataforthesenodes-icon" loading="lazy" alt=""
                        src="{{ Storage::url($data->galeri_img5) }}" />
                @else
                    <div class="noapplicabledataforthesenodes-icon" style="display: none"></div>
                @endif
                @if ($data->galeri_img6 && Storage::exists($data->galeri_img6))
                    <img class="noapplicabledataforthesenodes-icon" loading="lazy" alt=""
                        src="{{ Storage::url($data->galeri_img6) }}" />
                @else
                    <div class="noapplicabledataforthesenodes-icon" style="display: none"></div>
                @endif
            </div>
        </section>

        <section class="doa-hadiah" data-scroll-to="DoaHadiah">
            <div class="kirim-hadiah15">
                <div class="question7">
                    <div class="noapplicabledataforthesenodes1">
                        <span class="title">Kirim Hadiah</span>
                        <span class="paragraph">
                            Jika kamu tidak bisa hadir, kami bersedia untuk menerima hadiah
                            dalam bentuk :
                        </span>
                    </div>
                    <div class="payment-methods">
                        <button class="button48">Transfer ke no. rekening tertera</button>
                        <div class="button49">
                            <div class="mail30">
                                <div class="badge38">
                                    <div class="div59">12</div>
                                </div>
                            </div>
                            <button class="kirim-kado-ke6">
                                Kirim kado ke alamat tertera</button>

                            <img class="add-icon30" alt="" src="{{ asset('./assets/add.svg') }}" />
                        </div>
                    </div>
                </div>
                @if (!empty($data->nama_rek1) || !empty($data->no_rek1) || !empty($data->atas_nama1))
                    <div class="card-list15">
                        <div class="card">
                            <span class="title">{{ $data->nama_rek1 }}</span>
                            <div class="rekening-no">
                                <button class="button-link" onclick="myFunction()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.25 6.5C4.25 5.25736 5.25736 4.25 6.5 4.25H16C17.2426 4.25 18.25 5.25736 18.25 6.5V16C18.25 17.2426 17.2426 18.25 16 18.25H6.5C5.25736 18.25 4.25 17.2426 4.25 16V6.5ZM6.5 5.75C6.08579 5.75 5.75 6.08579 5.75 6.5V16C5.75 16.4142 6.08579 16.75 6.5 16.75H16C16.4142 16.75 16.75 16.4142 16.75 16V6.5C16.75 6.08579 16.4142 5.75 16 5.75H6.5Z" />
                                        <path
                                            d="M5.5 1.75H10.5C10.9142 1.75 11.25 2.08579 11.25 2.5C11.25 2.91421 10.9142 3.25 10.5 3.25H5.5C4.25736 3.25 3.25 4.25736 3.25 5.5V10.5C3.25 10.9142 2.91421 11.25 2.5 11.25C2.08579 11.25 1.75 10.9142 1.75 10.5V5.5C1.75 3.42893 3.42893 1.75 5.5 1.75Z" />
                                    </svg>
                                </button>
                                <input type="text" disabled="disabled" value="{{ $data->no_rek1 }}"
                                    id="myInput">
                            </div>
                            <span class="paragraph">{{ $data->atas_nama1 }}</span>
                        @else
                            <div class="card-list15" style="display: none"></div>
                        </div>
                @endif

                @if (!empty($data->nama_rek2) || !empty($data->no_rek2) || !empty($data->atas_nama2))
                    <div class="card-list15">
                        <div class="card">
                            <span class="title">{{ $data->nama_rek2 }}</span>
                            <div class="rekening-no">
                                <button class="button-link" onclick="myFunction()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.25 6.5C4.25 5.25736 5.25736 4.25 6.5 4.25H16C17.2426 4.25 18.25 5.25736 18.25 6.5V16C18.25 17.2426 17.2426 18.25 16 18.25H6.5C5.25736 18.25 4.25 17.2426 4.25 16V6.5ZM6.5 5.75C6.08579 5.75 5.75 6.08579 5.75 6.5V16C5.75 16.4142 6.08579 16.75 6.5 16.75H16C16.4142 16.75 16.75 16.4142 16.75 16V6.5C16.75 6.08579 16.4142 5.75 16 5.75H6.5Z" />
                                        <path
                                            d="M5.5 1.75H10.5C10.9142 1.75 11.25 2.08579 11.25 2.5C11.25 2.91421 10.9142 3.25 10.5 3.25H5.5C4.25736 3.25 3.25 4.25736 3.25 5.5V10.5C3.25 10.9142 2.91421 11.25 2.5 11.25C2.08579 11.25 1.75 10.9142 1.75 10.5V5.5C1.75 3.42893 3.42893 1.75 5.5 1.75Z" />
                                    </svg>
                                </button>
                                <input type="text" disabled="disabled" value="{{ $data->no_rek2 }}"
                                    id="myInput">
                            </div>
                            <span class="paragraph">{{ $data->atas_nama2 }}</span>
                        @else
                            <div class="card-list15" style="display: none"></div>
                        </div>
                @endif


            </div>


    </div>
    <form class="send-prayers" disabled data-scroll-to="SendPrayers">
        <b class="kirimkan-doa-dan">Kirimkan Doa dan Ucapan</b>
        <div class="input-name-pesan">
            <div class="frame-nama-pesan">
                <div class="nama6">Nama</div>
                <div class="field24">
                    <input class="masukkan-nama" placeholder="Masukkan nama" type="text" name="nama"
                        disabled />
                </div>
            </div>
            <div class="ucapan-doa-container">
                <div class="ucapan-doa9">Pesan Untuk Mempelai</div>
                <textarea class="field35" name="ucapan" placeholder="Kirim pesan untuk mempelai" rows="6" cols="28"
                    disabled></textarea>
            </div>
            <div class="akan-hadir">
                <div class="akan-hadir1">Akan Hadir?</div>
                <div class="radio_group">
                    <input type="radio" name="kehadiran" value="1" id="radio1">
                    <label for="radio1" class="radio_label">Ya</label>

                    <input type="radio" name="kehadiran" value="0" id="radio2">
                    <label for="radio2" class="radio_label">Tidak</label>
                </div>
            </div>
        </div>
        <button class="button50" type="submit">
            <div class="mail31">
                <img class="vector-icon35" alt="" src="./public/vector.svg" />

                <div class="badge39">
                    <div class="div60">12</div>
                </div>
            </div>
            <div class="kirim6">Kirim</div>
            <img class="add-icon31" alt="" src="./public/add.svg" />
        </button>
        {{-- <div class="gallery-title">
                    <b class="kata-mereka">Kata Mereka</b>
                    <div class="card-parent">
                        @foreach ($data as $item)
                        <div class="card32">
                            <b class="mufli-ahmad">{{$item->nama}}</b>
                            <div class="selamat-ya-boy-container">
                                <p class="selamat-ya-boy">{{$item->ucapan}}</p>
                                <p class="blank-line19">&nbsp;</p>
                            </div>
                        </div>

                        @endforeach
                     
                    </div>
                </div> --}}
        <footer class="atas-doa-container">
            <p class="atas-doa">Atas doa & ucapan bapak/ibu/saudara/i, Kami</p>
            <p class="mengucapkan-terima-kasih">mengucapkan terima kasih.</p>
        </footer>
    </form>
    </section>

    </div>

    <script src="{{ asset('./home-mufli.js') }}"></script>


    <script>
        var menu15 = document.getElementById("menu15");
        if (menu15) {
            menu15.addEventListener("click", function() {
                var anchor = document.querySelector(
                    "[data-scroll-to='BannerImage']"
                );
                if (anchor) {
                    anchor.scrollIntoView({
                        block: "start",
                        behavior: "smooth"
                    });
                }
            });
        }

        var menu16 = document.getElementById("menu16");
        if (menu16) {
            menu16.addEventListener("click", function() {
                var anchor = document.querySelector("[data-scroll-to='DoaHadiahContainer']");
                if (anchor) {
                    anchor.scrollIntoView({
                        block: "start",
                        behavior: "smooth"
                    });
                }
            });
        }

        var menu17 = document.getElementById("menu17");
        if (menu17) {
            menu17.addEventListener("click", function() {
                var anchor = document.querySelector("[data-scroll-to='date']");
                if (anchor) {
                    anchor.scrollIntoView({
                        block: "start",
                        behavior: "smooth"
                    });
                }
            });
        }

        var menu18 = document.getElementById("menu18");
        if (menu18) {
            menu18.addEventListener("click", function() {
                var anchor = document.querySelector("[data-scroll-to='GalleryFoto']");
                if (anchor) {
                    anchor.scrollIntoView({
                        block: "start",
                        behavior: "smooth"
                    });
                }
            });
        }

        var menu19 = document.getElementById("menu19");
        if (menu19) {
            menu19.addEventListener("click", function() {
                var anchor = document.querySelector("[data-scroll-to='SendPrayers']");
                if (anchor) {
                    anchor.scrollIntoView({
                        block: "start",
                        behavior: "smooth"
                    });
                }
            });
        }

        var detail = document.getElementById("detail");
        if (detail) {
            detail.addEventListener("click", function() {
                var anchor = document.querySelector("[data-scroll-to='DoaHadiahContainer']");
                if (anchor) {
                    anchor.scrollIntoView({
                        block: "start",
                        behavior: "smooth"
                    });
                }
            });
        }


        // var floatingButton = document.getElementById("floatingButton");
        // if (floatingButton) {
        //     floatingButton.addEventListener("click", function(e) {
        //         // Please sync "Home" to the project
        //     });
        // }

        document.addEventListener("DOMContentLoaded", function() {
            var playIcon = document.querySelector(".play-icon");
            var pauseIcon = document.querySelector(".pause-1-icon");
            var audio = document.getElementById("myAudio");


            playIcon.addEventListener("click", function() {
                // Mengganti gambar play dengan gambar pause
                playIcon.style.display = "none";
                pauseIcon.style.display = "inline-block";

                // Memutar musik
                audio.play();
            });

            pauseIcon.addEventListener("click", function() {
                // Mengganti gambar pause dengan gambar play
                pauseIcon.style.display = "none";
                playIcon.style.display = "inline-block";

                // Memberhentikan musik
                audio.pause();
            });
        });

        // document.addEventListener("DOMContentLoaded", function() {
        //     var playIcon = document.querySelector(".play-icon");
        //     var pauseIcon = document.querySelector(".pause-1-icon");
        //     var audio = document.getElementById("myAudio");

        //     function playAudio() {
        //         // Memutar musik
        //         audio.play().then(() => {
        //             // Mengganti gambar play dengan gambar pause
        //             playIcon.style.display = "none";
        //             pauseIcon.style.display = "inline-block";
        //         }).catch(error => {
        //             console.error("Pemutaran otomatis gagal:", error);
        //         });
        //     }

        //     // Memainkan audio saat pengguna berinteraksi
        //     document.addEventListener("click", function() {
        //         playAudio();
        //         // Setelah interaksi pertama, hapus event listener ini agar tidak dipanggil lagi.
        //         document.removeEventListener("click", playAudio);
        //     });

        //     // Tombol play/pause
        //     playIcon.addEventListener("click", function() {
        //         playAudio();
        //     });

        //     pauseIcon.addEventListener("click", function() {
        //         console.log("Tombol pause diklik"); // Periksa apakah event listener dipanggil
        //         // Mengganti gambar pause dengan gambar play
        //         pauseIcon.style.display = "none";
        //         playIcon.style.display = "inline-block";

        //         // Memberhentikan musik
        //         audio.pause();
        //     });
        // });

        document.addEventListener("DOMContentLoaded", function() {
            // Mendapatkan elemen yang akan disalin
            var copyText = document.getElementById("copyText");

            // Mendapatkan tombol yang akan mengaktifkan fungsi penyalinan
            var copyButton = document.getElementById("copyButton");

            // Menambahkan event listener ke tombol
            copyButton.addEventListener("click", function() {
                // Membuat sebuah elemen textarea sementara
                var textarea = document.createElement("textarea");

                // Mengatur isi teks textarea dengan teks yang ingin disalin
                textarea.value = copyText.innerText;

                // Menyembunyikan textarea di luar jendela tampilan
                textarea.style.position = "fixed";
                textarea.style.top = 0;
                textarea.style.left = 0;
                textarea.style.opacity = 0;

                // Menambahkan elemen textarea ke dalam dokumen
                document.body.appendChild(textarea);

                // Memilih teks di dalam textarea
                textarea.select();

                // Menyalin teks ke dalam papan klip
                document.execCommand("copy");

                // Menghapus textarea yang sementara dibuat
                document.body.removeChild(textarea);

                // Memberi tahu pengguna bahwa teks telah disalin
                alert("Teks telah disalin: " + copyText.innerText);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Mendapatkan elemen yang akan disalin
            var copyText = document.getElementById("copyText2");

            // Mendapatkan tombol yang akan mengaktifkan fungsi penyalinan
            var copyButton = document.getElementById("copyButton2");

            // Menambahkan event listener ke tombol
            copyButton.addEventListener("click", function() {
                // Membuat sebuah elemen textarea sementara
                var textarea = document.createElement("textarea");

                // Mengatur isi teks textarea dengan teks yang ingin disalin
                textarea.value = copyText.innerText;

                // Menyembunyikan textarea di luar jendela tampilan
                textarea.style.position = "fixed";
                textarea.style.top = 0;
                textarea.style.left = 0;
                textarea.style.opacity = 0;

                // Menambahkan elemen textarea ke dalam dokumen
                document.body.appendChild(textarea);

                // Memilih teks di dalam textarea
                textarea.select();

                // Menyalin teks ke dalam papan klip
                document.execCommand("copy");

                // Menghapus textarea yang sementara dibuat
                document.body.removeChild(textarea);

                // Memberi tahu pengguna bahwa teks telah disalin
                alert("Teks telah disalin: " + copyText.innerText);
            });
        });



        // Mendapatkan elemen tombol "Transfer ke no. rekening tertera"
        var transferRekening = document.querySelector('.button48');

        // Mendapatkan elemen tombol "Kirim kado ke alamat tertera"
        var kirimAlamatButton = document.querySelector('.button49');

        // Mendapatkan elemen div "card-list15"
        var cardList = document.querySelector('.card-list15');

        // Simpan konten asli dari cardList
        var originalCardListContent = cardList.innerHTML;

        var button49Text = document.querySelector('.button49 .kirim-kado-ke6');


        // Menambahkan event listener untuk tombol transferRekening
        transferRekening.addEventListener('click', function() {
            // Mengembalikan cardList ke konten aslinya
            cardList.innerHTML = originalCardListContent;

            transferRekening.style.backgroundColor = '#605a4c';
            // Mengubah warna teks tombol kirimAlamatButtonText menjadi putih
            transferRekening.style.color = 'white';

            button49Text.style.color = '#605a4c';

            kirimAlamatButton.style.backgroundColor = 'white';
            kirimAlamatButton.style.border = '1px solid #605a4c';
            kirimAlamatButton.style.color = '#605a4c';


        });

        // Menambahkan event listener untuk tombol kirimAlamatButton
        kirimAlamatButton.addEventListener('click', function() {
            // Mengubah konten elemen cardList menjadi alamat
            cardList.innerHTML =
                '<div class="card"><span class="title">Alamat</span><span class="paragraph">{{ $data->alamat_tertera }}</span></div>';
            // Mengubah warna latar belakang tombol kirimAlamatButton
            kirimAlamatButton.style.backgroundColor = '#605a4c';
            // Mengubah warna teks tombol kirimAlamatButtonText menjadi putih
            kirimAlamatButton.style.color = 'white';

            // Mengubah warna teks pada button49 menjadi putih

            button49Text.style.color = 'white';

            // Mengubah gaya tombol button48
            transferRekening.style.backgroundColor = 'white';
            transferRekening.style.border = '1px solid #605a4c';
            transferRekening.style.color = '#605a4c';
        });


        function updateTimer(tgl_akad) {
            future = Date.parse(tgl_akad);
            now = new Date();
            diff = future - now;

            if (diff <= 0) {
                // Waktu telah berlalu, atur semua nilai menjadi 0
                document.getElementById("timer").innerHTML =
                    '<div>00<span>Hari</span></div>' +
                    '<div>00<span>Jam</span></div>' +
                    '<div>00<span>Menit</span></div>' +
                    '<div>00<span>Detik</span></div>';
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

            document.getElementById("timer")
                .innerHTML =
                '<div>' + days + '<span>Hari</span></div>' +
                '<div>' + hours + '<span>Jam</span></div>' +
                '<div>' + mins + '<span>Menit</span></div>' +
                '<div>' + secs + '<span>Detik</span></div>';
        }

        // Memanggil updateTimer() saat halaman dimuat dengan tanggal akad dari PHP
        updateTimer("{{ $data->tgl_akad }}");
        setInterval(updateTimer.bind(null, "{{ $data->tgl_akad }}"), 1000); // Memperbarui setiap detik
    </script>
</body>

</html>
