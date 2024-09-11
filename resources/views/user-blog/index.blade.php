@extends('layouts.app-user')

@section('navbar')
    <div class="container">
        <section class="blog-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-12 align-content-center">
                    <h4 class="text-black">Bahwa Sumber dari Segala Kisah adalah Kasih</h4>
                    <span>Joko Pinurbo</span>
                </div>
                <div class="col-lg-6 col-md-6 col-12 blog-hero-img">
                </div>
            </div>
        </section>
        <section class="blog-view" id="blog-view">
            <div class="blog-cover">
                {{-- <h4 class="text-center mb-5">Blog</h4> --}}
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-lg-3 col-md-6 col-12 mb-5">
                            <div class="card card-blog-custom">
                                <div class="card-blog-img">
                                    <img class="rounded-4 img-fluid" src="{{ asset('storage/blog/' . $item->image) }}"
                                        alt="Foto Blog" width="100%" height="100%">
                                </div>
                                <div class="card-blog-date">{{ $item->created_at->format('d F Y') }}</div>
                                <div class="card-blog-title">
                                    <a href="{{ route('blog-view.show', $item->id) }}"
                                        class="text-black">{{ $item->judul }}</a>
                                </div>
                                <div class="card-blog-detail">{{ $item->deskripsi }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="p-2">{{ $data->links() }}</div>
                </div>
            </div>
        </section>
    </div>
@endsection
