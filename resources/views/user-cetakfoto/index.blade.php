@extends('layouts.app-user')

@section('navbar')
    <div class="container">
        <section class="blog-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-12 align-content-center">
                    <h4 class="text-black">Abadikan Setiap Kenganganmu!</h4>
                    <span>Mengenang setiap momen yang terabadikan dalam foto</span>
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
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card card-blog-custom">
                                <div class="card-blog-img">
                                    <img class="rounded-4 img-fluid object-fit-cover"
                                        src="{{ asset('storage/cetakfoto/' . $item->image) }}" alt="Foto Blog" width="100%"
                                        height="100%">
                                </div>
                                <div class="card-blog-title">
                                    {{ $item->judul }}
                                </div>
                                <div class="card-blog-detail text-black">IDR {{ number_format($item->harga, 0, ',', '.') }}
                                </div>
                                <div class="btn btn-custom-4" style="width: 100%">
                                    <a class="text-white" href="{{ $item->link }}" target="__blank">Pesan</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="p-2">{{ $data->links() }}</div>
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