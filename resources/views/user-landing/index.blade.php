@extends('layouts.app-user')
@section('navbar')
    <!-- HERO -->
    <section class="hero" id="hero">
        <h4>Bikin Doi Makin Happy Terus</h4>
        <p>Undangan Digital</p>
        <a href="#produk" class="trigger btn btn-custom">lihat Layanan</a>
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
                            <div class="card card-promo-custom">
                                <a href="{{ $item->link }}" target="_blank">
                                    <img class="rounded-4 object-fit-cover"
                                        src="{{ asset('storage/promo/' . $item->image) }}" alt="Foto Promo" width="100%" height="100%">
                                </a>
                            </div>
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
                            <div class="card-produk-img"></div>
                            <div class="card-produk-title">Undangan Digital</div>
                            <div class="card-produk-detail">Undangan Digital</div>
                            <a href="#" class="btn btn-custom-2 mt-2 mb-4">Lihat Detail</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="card card-produk-custom">
                            <div class="card-produk-img"></div>
                            <div class="card-produk-title">Cetak Foto & Figura</div>
                            <div class="card-produk-detail">Undangan Digital</div>
                            <a href="#" class="btn btn-custom-2 mt-2 mb-4">Lihat Detail</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="card card-produk-custom">
                            <div class="card-produk-img"></div>
                            <div class="card-produk-title">Gambarin & Figura</div>
                            <div class="card-produk-detail">Undangan Digital</div>
                            <a href="#" class="btn btn-custom-2 mt-2 mb-4">Lihat Detail</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="card card-produk-custom">
                            <div class="card-produk-img"></div>
                            <div class="card-produk-title">Seserahan</div>
                            <div class="card-produk-detail">Undangan Digital</div>
                            <a href="#" class="btn btn-custom-2 mt-2 mb-4">Lihat Detail</a>
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
            <div class="over">
                @foreach ($dataBlog as $item)
                    <div class="card card-blog-custom">
                        <div class="card-blog-img">
                            <img class="rounded-4 img-fluid" src="{{ asset('storage/blog/' . $item->image) }}"
                                alt="Foto Blog" width="100%" height="100%">
                        </div>
                        <div class="card-blog-date">{{ $item->created_at->format('d F Y') }}</div>
                        <div class="card-blog-title">
                            <a href="{{ route('blog-view.show', $item->id) }}" class="text-black">{{ $item->judul }}</a>
                        </div>
                        <div class="card-blog-detail">{{ $item->deskripsi }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <a href="{{ route('blog-view.index') }}" class="btn btn-custom-3 my-4">Lihat Selengkapnya</a>
            </div>
        </div>
    </section>
    <!-- BLOG END -->

    <!-- TANYA KAMI -->
    <section class="tanya-kami" id="tanya-kami">
        <div class="container-custom">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-3 d-flex align-items-center">
                    <div class="card card-tanya-kami-custom-left">
                        <h4>Kami siap membantu kebutuhan anda</h4>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-custom">Hubungi Kami</button>
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
    <!-- TANYA KAMI END -->

    <!-- MARKET PLACE -->
    <section class="market-place" id="market-pace">
        <div class="container-custom">
            <h4>Market Place</h4>
            <div class="market-place-button-container mt-3">
                <a href="#" class="btn-market-place">
                    <img src="{{ asset('img/tokopedia.png') }}" alt="tokopedia">
                    <span>tokopedia</span>
                </a>
                <a href="#" class="btn-market-place">
                    <img src="{{ asset('img/shopee.png') }}" alt="shopee">
                    <span>Shopee</span>
                </a>
                <a href="#" class="btn-market-place">
                    <img src="{{ asset('img/tiktok.png') }}" alt="tiktok">
                    <span>Tiktok Shop</span>
                </a>
            </div>
        </div>
    </section>
    <!-- MARKET PLACE END -->
@endsection
