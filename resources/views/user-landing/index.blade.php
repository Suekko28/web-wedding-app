@extends('layouts.app-user')
@section('navbar')
    <style>
        .card-blog-paragraph img {
            display: none;
            /* Menyembunyikan semua gambar di dalam elemen card-blog-paragraph */
        }
    </style>
    <!-- HERO -->
    <section class="hero" id="hero">
        <div class="title">Siap Membantu Kamu Dalam Membahagiakan Orang Tersayangmu</div>
        <p>Mulai dari Undangan Digital, Cetak Foto, Kreasi Foto dan Seserahan menjadi solusi dalam membahagiakan orang
            tersayangmu</p>
        <a href="#produk" class="trigger btn btn-primary">lihat Layanan</a>
    </section>
    <!-- HERO END -->

    <!-- PROMO -->
    <section class="promo" id="promo">
        <div class="promo-cover">
            <div class="container-custom">
                <h4>Promo Saat Ini</h4>
                <div class="row">
                    @foreach ($dataPromo as $item)
                        <div class="col-sm-12 col-md-4">
                            <a href="{{ $item->link }}" target="_blank">
                                <img class="card card-promo-custom" src="{{ asset('storage/promo/' . $item->image) }}"
                                    alt="Foto Promo">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- PROMO END -->

    <!-- PRODUK -->
    <section class="produk" id="produk">
        <div class="produk-cover">
            <div class="container-custom">
                <h4>Produk Kami</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="card card-produk-custom">
                            <img class="card-produk-img"
                                src="{{ asset('img/JejakKebahagiaan_Tumbnail_Undangan-Digital.jpg') }}" alt="Seserahan">
                            <div class="card-produk-detail">
                                <div class="card-produk-container-title">
                                    <div class="card-produk-title">Undangan Digital</div>
                                </div>
                                <div class="card-produk-detail">Buat website undangan digital</div>
                                <div class="action-button">
                                    <a href="{{ route('undangandigital-list.index') }}" class="btn btn-secondary">Lihat
                                        Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="card card-produk-custom">
                            <img class="card-produk-img" src="{{ asset('img/JejakKebahagiaan_Tumbnail_Cetak-Foto.jpg') }}"
                                alt="Seserahan">
                            <div class="card-produk-detail">
                                <div class="card-produk-container-title">
                                    <div class="card-produk-title">Paket Cetak Foto</div>
                                </div>
                                <div class="card-produk-detail">Cetak dan simpan moment spesialmu di dalam bingkai foto
                                </div>
                                <div class="action-button">
                                    <a href="{{ route('cetakfoto-list.index') }}" class="btn btn-secondary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="card card-produk-custom">
                            <img class="card-produk-img" src="{{ asset('img/JejakKebahagiaan_Tumbnail_Gambarin.jpg') }}"
                                alt="Seserahan">
                            <div class="card-produk-detail">
                                <div class="card-produk-container-title">
                                    <div class="card-produk-title">Paket Cetak Kreasi Foto</div>
                                </div>
                                <div class="card-produk-detail">Cetak dan simpan hasil kreasi momentmu di dalam bingkai foto
                                </div>
                                <div class="action-button">
                                    <a href="{{ route('gambarin-list.index') }}" class="btn btn-secondary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="card card-produk-custom">
                            <img class="card-produk-img" src="{{ asset('img/JejakKebahagiaan_Tumbnail_Seserahan.jpeg') }}"
                                alt="Seserahan">
                            <div class="card-produk-detail">
                                <div class="card-produk-container-title">
                                    <div class="card-produk-title">Seserahan</div>
                                </div>
                                <div class="card-produk-detail">Pilih dekorasi seserahan sesuai dengan kebutuhanmu</div>
                                <div class="action-button">
                                    <a href="{{ route('seserahan-list.index') }}" class="btn btn-secondary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PRODUK END -->

    <!-- BLOG -->
    <section class="blog" id="blog">
        <div class="container-custom">
            <h4>Blog</h4>
            <div class="row">
                @foreach ($dataBlog as $item)
                    <div class="col-sm-12 col-md-3">
                        <a href="{{ route('blog-list.show', $item->judul) }}" class="card card-blog-custom">
                            <div class="card card-blog-custom">
                                <div class="card-blog-img">
                                    <img class="rounded-4 img-fluid object-fit-cover h-100"
                                        src="{{ asset('storage/blog/' . $item->image) }}" alt="Foto Blog" width="100%"
                                        height="100%">
                                </div>
                                <div class="card-blog-detail">
                                    <div class="card-blog-container-title">
                                        <div class="card-blog-date">
                                            {{ $item->created_at->locale('id')->translatedFormat('d F Y') }}</div>
                                        <div class="card-blog-title">{{ $item->judul }}</div>
                                    </div>
                                    <div class="card-blog-paragraph">{!! $item->deskripsi !!}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


                <div class="action-button">
                    <a href="{{ route('blog-list.index') }}" class="btn btn-secondary">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG END -->

    <!-- TANYA KAMI -->
    <section class="tanya-kami" id="tanya-kami">
        <div class="container-custom">
            <div class="title">
                <h4>Kami siap membantu kebutuhan anda</h4>
                <a href="https://wa.me/62895321816795" target="_blank" class="btn btn-primary">Hubungi Kami</a>
            </div>
            <img class="img" src="{{ asset('img/Contact-Us_JejakKebahagiaan.png') }}" alt="Seserahan">
        </div>
    </section>
    <!-- TANYA KAMI END -->

    <!-- MARKET PLACE -->
    <section class="market-place" id="market-pace">
        <div class="container-custom">
            <h4>Market Place</h4>
            <div class="market-place-button-container mt-3">
                <a href="https://www.tokopedia.com/jejakkebahagiaan" target="_blank" class="btn-market-place">
                    <img src="{{ asset('img/Jejak-Kebahagiaan_Tokopedia.svg') }}" alt="tokopedia">
                    <span>tokopedia</span>
                </a>
                <a href="https://id.shp.ee/45Rpy1g" target="_blank" class="btn-market-place">
                    <img src="{{ asset('img/Jejak-Kebahagiaan_Shopee.svg') }}" alt="shopee">
                    <span>Shopee</span>
                </a>
            </div>
        </div>
    </section>
    <!-- MARKET PLACE END -->
@endsection
