@extends('layouts.app-user')

@section('navbar')
    <div class="container">
        <section class="blog-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-12 align-content-center">
                    <h4 class="text-black">Bikin Doi Makin Happy Bersama Kami</h4>
                    <span>Undangan Digital</span>
                </div>
                <div class="col-lg-6 col-md-6 col-12 blog-hero-img">
                </div>
            </div>
        </section>

        <section class="blog-view" id="blog-view">
            <div class="blog-cover">
                <h4 class="text-center mb-5">Produk yang Tersedia</h4>
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-sm-12 col-md-3">
                            <div class="card card-produk-custom">
                                <img class="card-produk-img object-fit-cover"
                                    src="{{ asset('storage/gambarin/' . $item->image) }}" alt="Foto Gambarin" width="100%"
                                    height="100%">
                                <div class="card-produk-detail">
                                    <div class="card-produk-container-title">
                                        <div class="card-produk-title">{{ $item->judul }}
                                        </div>
                                    </div>
                                    <div class="card-produk-detail">IDR
                                        {{ number_format($item->harga, 0, ',', '.') }}
                                    </div>
                                    <div class="btn btn-custom-4">
                                        <a class="text-white" href="{{ $item->link }}" target="__blank">Pesan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="p-2">{{ $data->links() }}</div>
                </div>
            </div>
        </section>
    </div>


    <!-- TANYA KAMI -->
    <section class="tanya-kami" id="tanya-kami">
        <div class="container-custom">
            <div class="title">
                <h4>Kami siap membantu kebutuhan anda</h4>
                <a href="https://wa.me/62895321816795" target="_blank" class="btn btn-primary">Hubungi Kami</a>
            </div>
            <img class="img" src="{{ asset('img/Jejakkebahagiaan_Hubungi.jpg') }}" alt="Seserahan">
        </div>
    </section>
    <!-- TANYA KAMI END -->
@endsection
