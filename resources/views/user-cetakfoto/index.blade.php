@extends('layouts.app-user')

@section('navbar')
    <div class="container">
        <section class="blog-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-12 col-lg-6 align-content-center">
                    <h4 class="text-black">Abadikan Setiap Kenanganmu!</h4>
                    <span>Mengenang setiap momen yang terabadikan dalam foto</span>
                </div>
                <div class="col-12 col-lg-6 blog-hero-img">
                    <img class="img-fluid" src="{{ asset('img/Banner_Cetak-Foto.png') }}" alt="Foto Cetak Foto">
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
                                    src="{{ asset('storage/cetakfoto/' . $item->image) }}" alt="Foto Cetak Foto"
                                    width="100%" height="100%">
                                <div class="card-produk-detail">
                                    <div class="card-produk-container-title">
                                        <div class="card-produk-title">{{ $item->judul }}
                                        </div>
                                    </div>
                                    <div class="card-produk-detail">IDR
                                        {{ number_format($item->harga, 0, ',', '.') }}
                                    </div>
                                    <div class="btn btn-primary">
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
            <img class="img" src="{{ asset('img/Contact-Us_JejakKebahagiaan.png') }}" alt="Seserahan">
        </div>
    </section>
    <!-- TANYA KAMI END -->
@endsection
