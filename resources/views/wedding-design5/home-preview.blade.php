<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5">
        <!-- Fancybox and Jquery CDN
        This link get github repository -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
            type="text/css" media="screen" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
        </script>
        <title>Undangan Digital Pernikahan & Hias Seserahan, Konsultasi Gratis!</title>
        <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('img/Jejak-Kebabagiaan_Favicon_32px.svg') }}">
        <!-- BOOTSTRAP 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <!-- CSS STYLE -->
        <link href="{{ asset('css/wedding-design5.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="jquery.fancybox.min.css">
    </head>
<body>
<div class="overlay">
	<div class="overlayDoor"></div>
	<div class="overlayContent">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player class="animation-loading" src="{{ asset('img/loading.json') }}" background="transparent" speed="1" style="width: 96px; height: 96px" direction="1" mode="normal" loop autoplay></lottie-player>
	</div>
</div>
    <div class="offcanvas offcanvas-top show" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <!-- <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="offcanvas" aria-label="Close"></button>
        </div> -->
        <div class="offcanvas-body">
            <div class="opening-undangan">
                <p>Undangan Pernikahan</p>
                <h2>Ndaru & Lala</h2>
            </div>
            <div class="tujuan-undangan">
                <div class="opening">
                    <p>Kepada Yth</p>
                    <p>Bapak/Ibu/Saudara/i</p>
                </div>
                <h3>Nama Tamu</h3>
                <button type="button" onclick="playAudio()" style="display:none" class="btn-primary" id="buttonPage" data-bs-dismiss="offcanvas">Buka Undangan</button>
            </div>
            <img class="background-offcanvas object-fit-cover" src="{{ asset('img/cover-image.jpg') }}" alt="background">
        </div>
    </div>
    <audio loop id="track">
        <source src="{{ asset('img/sweet.mp3') }}" type="audio/mpeg" />
    </audio>
    <button class="btn-float">
        <img id="play" onclick="toggleAudio()" src="{{ asset('img/sound-on.svg') }}" class="img-fluid" alt="Responsive image">
        <img id="pause" onclick="toggleAudio()" src="{{ asset('img/sound-off.svg') }}" class="img-fluid" alt="Responsive image">
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
        <img class="background-template object-fit-cover" src="{{ asset('img/Sample-BG.jpg') }}" alt="background">
    <!-- HERO -->
     <section class="hero mw-100" id="hero">
        </div>
        <div class="title">
            <p>Pernikahan</p>
            <h2>Ndaru & Lilau</h2>
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
                <p>Kamis, 29 Oktober 2024</p>
            </div>
        </div>
        <div class="background-overlay"></div>
    </section>
    <!-- HERO END -->
     
    <!-- MEMPELAI -->
    <section class="animation kedua-mempelai" id="kedua-mempelai">
        <div class="anm_mod bottom-bit fast mempelai-cover">
            <div class="mempelai-wanita">
                <img class="anm_mod left fast mempelai-wanita-img" src="{{ asset('img/mempelai-wanita.jpg') }}" alt="Seserahan"> 
                <div class="anm_mod bottom fast detail-mempelai-wanita">
                    <div class="data-mempelai-wanita">
                        <span class="label">PENGANTIN WANITA</span>
                        <h2>Lili</h2>
                        <p>Anak dari Bapak Rudi dan Ibu Risma</p>
                    </div>
                    <a href="https://www.tokopedia.com/jejakkebahagiaan" target="_blank" class="btn-link">
                        <img src="{{ asset('img/icon-instagram-black.svg') }}" alt="instagram">
                        <span>lili</span>
                    </a>
                </div>
            </div>
            <h2 class="anm_mod bottom-bit fast">&</h2>
            <div class="mempelai-pria">
                <div class="anm_mod bottom fast detail-mempelai-pria">
                    <div class="data-mempelai-pria">
                        <span class="label">PENGANTIN PRIA</span>
                        <h2>Ndaru</h2>
                        <p>Anak dari Bapak Budi dan Ibu Irma</p>
                    </div>
                    <a href="https://www.tokopedia.com/jejakkebahagiaan" target="_blank" class="btn-link">
                        <img src="{{ asset('img/icon-instagram-black.svg') }}" alt="instagram">
                        <span>Ndaru</span>
                    </a>
                </div>
                <img class="anm_mod right fast mempelai-wanita-img" src="{{ asset('img/mempelai-pria.jpg') }}" alt="Seserahan">
            </div>
        </div>
    </section>
    <!-- MEMPELAI END -->
    
    <!-- PERJALANAN CINTA -->
    <section class="animation perjalanan-cinta" id="perjalanan-cinta">
        <div class="anm_mod bottom-bit fast perjalanan-cinta-cover">
            <h3 class="anm_mod bottom-bit fast">Perjalanan Cinta Kami</h3>
            <div id="carouselExampleCaptions" class="carousel slide anm_mod bottom-bit delay" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/mempelai-pria.jpg') }}" class="d-block story-img object-fit-cover" alt="story">
                        <div class="carousel-caption d-md-block">
                            <div class="story-detail">
                                <span class="vertical-line"></span>
                                <span class="label">12 Januari 2024</span>
                                <h3>Pertemuan Pertama</h3>
                                <p>Pertemuan pertama yang singkat tapi sangat berkesan</p>
                                <span class="vertical-line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/mempelai-wanita.jpg') }}" class="d-block story-img object-fit-cover" alt="story">
                        <div class="carousel-caption d-md-block">
                            <div class="story-detail">
                                <span class="vertical-line"></span>
                                <span class="label">12 Januari 2024</span>
                                <h3>Pertemuan Pertama</h3>
                                <p>Pertemuan pertama yang singkat tapi sangat berkesan</p>
                                <span class="vertical-line"></span>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/mempelai-pria.jpg') }}" class="d-block story-img object-fit-cover" alt="story">
                        <div class="carousel-caption d-md-block">
                            <div class="story-detail">
                                <span class="vertical-line"></span>
                                <span class="label">12 Januari 2024</span>
                                <h3>Pertemuan Pertama</h3>
                                <p>Pertemuan pertama yang singkat tapi sangat berkesan</p>
                                <span class="vertical-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
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
            <div id="anm_mod bottom-bit fast carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="anm_mod bottom-bit fast quotes">
                        <div class="carousel-inner carousel-gallery">
                            <div class="carousel-item active">
                                <a href="{{ asset('img/Sample-BG.jpg') }}" data-fancybox="gallery">
                                    <img src="{{ asset('img/Sample-BG.jpg') }}" class="d-block w-100 h-100 object-fit-cover img-fluid" alt="Image Gallery">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="https://bit.ly/34MdBRc" data-fancybox="gallery">
                                    <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-1.jpg" class="d-block w-100 h-100 object-fit-cover img-fluid" alt="Image Gallery">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="https://bit.ly/34MdBRc" data-fancybox="gallery" data-caption="Caption Images 1">
                                </a>
                            </div>
                        </div>
                        <p>"Creating memories is a priceless gift. Memories last a lifetime; things last only a short time."</p>
                    </div>
                    <div class="carousel-indicators indicators-gallery w-100">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active thumbnail rounded-2" aria-current="true" aria-label="Slide 1">
                            <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-2.jpg" class="d-block w-100 h-100 object-fit-cover rounded-2" alt="...">
                        </button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="thumbnail rounded-2" aria-label="Slide 2">
                            <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-1.jpg" class="d-block w-100 h-100 object-fit-cover rounded-2" alt="...">
                        </button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="thumbnail rounded-2" aria-label="Slide 3">
                            <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-3.jpg" class="d-block w-100 h-100 object-fit-cover rounded-2" alt="...">
                        </button>
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
            <img src="{{ asset('img/mempelai-wanita.jpg') }}" class="anm_mod bottom-bit fast d-block jadwal-img object-fit-cover" alt="story">
            <div class="akad-resepsi">
                <div class="anm_mod left fast jadwal-detail">
                    <h3>Akad<h3>
                    <div class="detail">
                        <div class="info">
                            <img src="{{ asset('img/calendar-icon-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">Sabtu, 4 Mei 2024</span>
                            </div>
                        </div>
                        <div class="info">
                            <img src="{{ asset('img/clock-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">10.00 - 12.00 WIB</span>
                            </div>
                        </div>
                        <div class="info">
                            <img src="{{ asset('img/location-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">Masjid Salman Al-Farisi</span>
                                <p>Jl. Komp. Bulog Jl. H. Ten Raya No.14 7 14, RT.14/RW.7, Kayu Putih,Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta</p>
                            </div>
                        </div>
                    </div>
                    <div class="button-button">
                        <a type="button" target="_blank" href="https://www.w3schools.com" class="btn-secondary">Lihat Lokasi</a>
                        <a type="button" target="_blank" href="https://www.w3schools.com" class="btn-primary">Simpan Tanggal</a>
                    </div>
                </div>
                <span class="vertical-line"></span>
                <div class="anm_mod right fast jadwal-detail">
                    <h3>Resepsi<h3>
                    <div class="detail">
                        <div class="info">
                            <img src="{{ asset('img/calendar-icon-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">Sabtu, 4 Mei 2024</span>
                            </div>
                        </div>
                        <div class="info">
                            <img src="{{ asset('img/clock-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">10.00 - 12.00 WIB</span>
                            </div>
                        </div>
                        <div class="info">
                            <img src="{{ asset('img/location-icon.svg') }}" alt="calendar">
                            <div class="detail-info">
                                <span class="label">Masjid Salman Al-Farisi</span>
                                <p>Jl. Komp. Bulog Jl. H. Ten Raya No.14 7 14, RT.14/RW.7, Kayu Putih,Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta</p>
                            </div>
                        </div>
                    </div>
                    <div class="button-button">
                        <a type="button" target="_blank" href="https://www.w3schools.com" class="btn-secondary">Lihat Lokasi</a>
                        <a type="button" target="_blank" href="https://www.w3schools.com" class="btn-primary">Simpan Tanggal</a>
                    </div>
                </div>
            </div>
            <div class="anm_mod bottom-bit fast live-streaming">
                <div class="detail-info">
                    <h3>Live Streaming</h3>
                    <p>Kami mengajak anda yang tidak hadir langsung untuk bergabung pada momen spesial kami melalui siaran langsung secara live virtual di platform berikut</p>
                </div>
                <a type="button" target="_blank" href="https://www.w3schools.com" class="btn-secondary">Buka Link</a>
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
                        <h3>5</h3>
                        <p>Hadir</p>
                    </div>
                    <div class="card-dashboard-tidakhadir">
                        <h3>5</h3>
                        <p>Tidak Hadir</p>
                    </div>
                </div>
                <div class="container-doa-ucapan anm_mod bottom-bit fast">
                    <div class="form-input">
                        <form id="algin-form">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input placeholder="Masukkan nama lengkap" type="text" name="name" id="fullname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Ucapan</label>
                                <textarea placeholder="Masukkan kalimat ucapan" name="msg" id=""msg cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Konfirmasi Kehadiran</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Hadir
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak Hadir
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" id="post" class="btn-primary">Kirim</button>
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
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                        </div>
                        <div class="card-comment">
                            <div class="title">
                                <div class="name">
                                    <h4>Paul</h4>
                                    <img src="{{ asset('img/tidak-hadir-icon.svg') }}" alt="hadir">
                                </div>
                                <span class="label">20 Oktober, 2018 | 20:00 WIB</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                        </div>
                        <div class="card-comment">
                            <div class="title">
                                <div class="name">
                                    <h4>Paul</h4>
                                    <img src="{{ asset('img/tidak-hadir-icon.svg') }}" alt="hadir">
                                </div>
                                <span class="label">20 Oktober, 2018 | 20:00 WIB</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                        </div>
                        <div class="card-comment">
                            <div class="title">
                                <div class="name">
                                    <h4>Paul</h4>
                                    <img src="{{ asset('img/tidak-hadir-icon.svg') }}" alt="hadir">
                                </div>
                                <span class="label">20 Oktober, 2018 | 20:00 WIB</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
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
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Direct Transfer</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Kirim Hadiah</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">BCA</h4>
                            <div class="info-norek">
                                <p id="first">0660580697</p>
                                <a id="first-button" onclick="copyText('first');" title="Copy Text" class="btn-ghost">
                                    Copy
                                </a>
                            </div>
                            <p class="card-text">A/N Eka Syafitry Dewi</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">BCA</h4>
                            <div class="info-norek">
                                <p id="second">09999</p>
                                <a id="second-button" onclick="copyText('second');" title="Copy Text" class="btn-ghost">
                                    Copy
                                </a>
                            </div>
                            <p class="card-text">A/N Eka Syafitry Dewi</p>
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Rumah</h4>
                                <p class="card-text">Jl. Hos Cokroaminoto, Kuripan Lor Gg. 16 No.5, Kec. Pekalongan Selatan, Kota Pekalongan, Jawa Tengah 51136</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- DOA & UCAPAN -->

    <!-- ENDING -->
     <section class="animation akhir-undangan" id="akhir-undangan">
        <div class="info">
            <p class="anm_mod bottom-bit fast">Thank You</p>
            <h4 class="anm_mod bottom-bit fast">Lily & Ndaru</h4>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- JS STYLE -->
    <script src="{{ asset('js/style.js') }}"></script>
    <script>// Get all sections that have an ID defined
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
    ){
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
myOffcanvas.addEventListener('show.bs.offcanvas', function () {
  // do something...
})
</script>
<script>
    var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
triggerTabList.forEach(function (triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function (event) {
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
    setTimeout(function(){
      button.innerText = originalText;
      }, 750);
  }, function() {
    button.style.cssText = "background-color: var(--red);";
    button.innerText = 'Error';
  });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
            $("html, body").animate({ scrollTop: position }, speed, "swing");
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
    $('.thumbnail-image').click(function(){
	$('.modal-body').empty();
	$($(this).parents('div').html()).appendTo('.modal-body');
	$('#modal').modal({show:true});
});

$('#modal').on('show.bs.modal', function () {
   $('.col-6,.row .thumbnail-image').addClass('blur');
})

$('#modal').on('hide.bs.modal', function () {
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

  function createCaption (caption) {
    return `<div class="carousel-caption d-none d-md-block">
        <h4 class="m-0">${caption}</h4>
      </div>`;
  }

  function createIndicators (img) {
    let markup = "", i, len;

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

  function createSlides (img) {
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

  function createCarousel (img) {
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
    link.addEventListener("click", function (e) {
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

  function enterFS () {
    lightboxModal.requestFullscreen().then({}).catch(err => {
      alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
    });
    fsEnlarge.classList.toggle("d-none");
    fsExit.classList.toggle("d-none");
  }

  function exitFS () {
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
    $(document).ready(function () {
    $("button").show()
});
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
			$('.overlay').css({'display':'none'})
		}, 2500)
	});
	
	// Will remove overlay after 1min for users cannnot load properly.
	setTimeout(function() {
		$('.overlay, body').addClass('loaded');
	}, 2000);
})
    </script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.13/lottie.min.js"></script>
</body>
</html>