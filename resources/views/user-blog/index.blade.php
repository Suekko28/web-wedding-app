@extends('layouts.app-user')

@section('navbar')
    <div class="container">
        <section class="blog-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-12 col-lg-6 align-content-center">
                    <h4 class="caption">Bahwa Sumber dari Segala Kisah adalah Kasih</h4>
                    <span>Joko Pinurbo</span>
                </div>
                <div class="col-12 col-lg-6 blog-hero-img">
                </div>
            </div>
        </section>
        <section class="blog-view" id="blog-view">
            <div class="blog-cover">
                {{-- <h4 class="text-center mb-5">Blog</h4> --}}
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-sm-12 col-md-3">
                            <a href="{{ route('blog-view.show', $item->id) }}" class="card card-blog-custom">
                                <div class="card card-blog-custom">
                                    <div class="card-blog-img">
                                        <img class="rounded-4 img-fluid object-fit-cover"
                                            src="{{ asset('storage/blog/' . $item->image) }}" alt="Foto Blog" width="100%"
                                            height="100%">
                                    </div>
                                    <div class="card-blog-detail">
                                        <div class="card-blog-container-title">
                                            <div class="card-blog-date">{{ $item->created_at->format('d F Y') }}</div>
                                            <div class="card-blog-title">{{ $item->judul }}</div>
                                        </div>
                                        <div class="card-blog-paragraph">{!! $item->deskripsi !!}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="p-2">{{ $data->links() }}</div>
                </div>
            </div>
        </section>
    </div>
@endsection
