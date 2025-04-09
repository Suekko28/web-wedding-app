@extends('layouts.app-user')

@section('navbar')
    <style>
        .image .image-resized {
            width: none !important;
        }

        .image_resized {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100% !important;
        }

        .image_resized img {
            width: 350px;
            height: 350px;
            object-fit: cover;
            border-radius: 24px
        }
    </style>


    <section class="blog-detail" id="blog-detail">
        <div class="blog-image">
            <img class="img-fluid object-fit-cover h-100" src="{{ asset('storage/blog/' . $data->image) }}" alt=""
                style="height: 100%" width="100%">
        </div>
    </section>


    <section class="content-blog mt-5">
        <div class="container">
            <h6 class="date-blog">{{ $data->created_at->locale('id')->translatedFormat('d F Y, H:i') }} WIB</h6>
            <h4 class="title-blog">{{ $data->judul }}</h4>
            <p>{!! $data->deskripsi !!}</p>
        </div>
    </section>
@endsection
