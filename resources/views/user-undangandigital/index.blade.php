@extends('layouts.app-user')

@section('navbar')
    <div class="container">
        <section class="blog-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-12 align-content-center">
                    <h4 class="text-black">Bagikan Momen Bahagiamu Dengan Mudah</h4>
                    <span>Solusi untuk undangan pernikahanmu jadi lebih mudah dengan fitur yang lengkap</span>
                </div>
                <div class="col-lg-6 col-md-6 col-12 blog-hero-img">
                </div>
            </div>
        </section>

        <section class="widgets-tabs" id="widgets-tabs">
            <h4 class="text-center mb-5">Berbagai Pilihan Desain</h4>
            <div class="d-flex justify-content-center align-items-center">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Undangan Pernikahan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Ulang Tahun</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Seminar</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
                            aria-selected="false">Akikah</button>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="row">
                            @foreach ($dataUndanganPernikahan as $item)
                                <!-- Ulangi untuk setiap kategori -->
                                <div class="col-lg-3 col-md-6 col-12"> <!-- Set ukuran kolom yang sama -->
                                    <div class="card card-blog-custom">
                                        <div class="card-blog-img">
                                            <img class="rounded-4 img-fluid object-fit-cover"
                                                src="{{ asset('storage/undangandigital/' . $item->image) }}" alt="Foto Blog"
                                                width="100%" height="100%">
                                        </div>
                                        <div class="card-blog-title">
                                            {{ $item->judul }}
                                        </div>
                                        <div class="card-blog-detail text-black">IDR
                                            {{ number_format($item->harga, 0, ',', '.') }}
                                        </div>
                                        <div class="d-flex gap-3">
                                            <div class="btn btn-text-preview">
                                                <a class="text-preview" href="{{ $item->link_preview }}"
                                                    target="__blank">Preview</a>
                                            </div>
                                            <div class="btn btn-custom-4">
                                                <a class="text-white" href="{{ $item->link_pesan }}"
                                                    target="__blank">Pesan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="p-2">{{ $dataUndanganPernikahan->links() }}</div> <!-- Pagination -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <div class="row">
                            @foreach ($dataUlangTahun as $item)
                                <!-- Ulangi untuk setiap kategori -->
                                <div class="col-lg-3 col-md-6 col-12"> <!-- Set ukuran kolom yang sama -->
                                    <div class="card card-blog-custom">
                                        <div class="card-blog-img">
                                            <img class="rounded-4 img-fluid object-fit-cover"
                                                src="{{ asset('storage/undangandigital/' . $item->image) }}" alt="Foto Blog"
                                                width="100%" height="100%">
                                        </div>
                                        <div class="card-blog-title">
                                            {{ $item->judul }}
                                        </div>
                                        <div class="card-blog-detail text-black">IDR
                                            {{ number_format($item->harga, 0, ',', '.') }}
                                        </div>
                                        <div class="d-flex gap-3">
                                            <div class="btn btn-text-preview">
                                                <a class="text-preview" href="{{ $item->link_preview }}"
                                                    target="__blank">Preview</a>
                                            </div>
                                            <div class="btn btn-custom-4">
                                                <a class="text-white" href="{{ $item->link_pesan }}"
                                                    target="__blank">Pesan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="p-2">{{ $dataUlangTahun->links() }}</div> <!-- Pagination -->
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        <div class="row">
                            @foreach ($dataSeminar as $item)
                                <div class="col-lg-3 col-md-6 col-12">
                                    <div class="card card-blog-custom">
                                        <div class="card-blog-img">
                                            <img class="rounded-4 img-fluid object-fit-cover"
                                                src="{{ asset('storage/undangandigital/' . $item->image) }}"
                                                alt="Foto Blog" width="100%" height="100%">
                                        </div>
                                        <div class="card-blog-title">
                                            {{ $item->judul }}
                                        </div>
                                        <div class="card-blog-detail text-black">IDR
                                            {{ number_format($item->harga, 0, ',', '.') }}
                                        </div>
                                        <div class="d-flex gap-3">
                                            <div class="btn btn-text-preview">
                                                <a class="text-preview" href="{{ $item->link_preview }}"
                                                    target="__blank">Preview</a>
                                            </div>

                                            <div class="btn btn-custom-4">
                                                <a class="text-white" href="{{ $item->link_pesan }}"
                                                    target="__blank">Pesan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="p-2">{{ $dataSeminar->links() }}</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                        tabindex="0">
                        <div class="row">
                            @foreach ($dataAkikah as $item)
                                <div class="col-lg-3 col-md-6 col-12">
                                    <div class="card card-blog-custom">
                                        <div class="card-blog-img">
                                            <img class="rounded-4 img-fluid object-fit-cover"
                                                src="{{ asset('storage/undangandigital/' . $item->image) }}"
                                                alt="Foto Blog" width="100%" height="100%">
                                        </div>
                                        <div class="card-blog-title">
                                            {{ $item->judul }}
                                        </div>
                                        <div class="card-blog-detail text-black">IDR
                                            {{ number_format($item->harga, 0, ',', '.') }}
                                        </div>
                                        <div class="d-flex gap-3">
                                            <div class="btn btn-text-preview">
                                                <a class="text-preview" href="{{ $item->link_preview }}"
                                                    target="__blank">Preview</a>
                                            </div>

                                            <div class="btn btn-custom-4">
                                                <a class="text-white" href="{{ $item->link_pesan }}"
                                                    target="__blank">Pesan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="p-2">{{ $dataAkikah->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="produk-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-12">
                    <h4 class="text-black">Fitur yang Tersedia di setiap undangannya</h4>
                    <p>Lengkapi website undangan digitalmu dengan beragam fitur yang dapat memenuhi kebutuhanmu.</p>
                    <div class="d-flex flex-column">
                        <div class="fitur-list">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-regular fa-circle-check"></i>
                                <h6 style="margin: 0;">Input Nama Tamu Undangan Sebanyak-banyaknya</h6>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-regular fa-circle-check"></i>
                                <h6 style="margin: 0;">Custom Musik Latar</h6>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-regular fa-circle-check"></i>
                                <h6 style="margin: 0;">Form RSVP dan Ucapan</h6>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-regular fa-circle-check"></i>
                                <h6 style="margin: 0;">Hitung Mundur Waktu Acara</h6>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-regular fa-circle-check"></i>
                                <h6 style="margin: 0;">Integrasi Google Maps</h6>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-regular fa-circle-check"></i>
                                <h6 style="margin: 0;">Galeri Foto & Video</h6>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-regular fa-circle-check"></i>
                                <h6 style="margin: 0;">Informasi Live Streaming</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 produk-hero-img">
                </div>
            </div>
        </section>

    </div>
    <section class="tanya-kami2 mt-5" id="tanya-kami2">
        <div class="container-custom">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-3 d-flex align-items-center">
                    <div class="card card-tanya-kami-custom-left">
                        <h4>Kami siap membantu kebutuhan anda</h4>
                        <div class="mb-3">
                            <!-- WhatsApp Button -->
                            <a href="https://wa.me/6281934060621" target="_blank">
                                <button type="button" class="btn btn-custom">Hubungi Kami</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="card card-tanya-kami-custom-right">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection