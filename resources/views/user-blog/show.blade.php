@extends('layouts.app-user')

@section('navbar')
    <section class="blog-detail" id="blog-detail">
        <div class="blog-image">
<<<<<<< HEAD
            <img class="img-fluid object-fit-cover h-100" src="{{ asset('storage/blog/' . $data->image) }}" alt=""
                style="height: 100%" width="100%">
=======
            <img class="img-fluid object-fit-cover" src="{{ asset('storage/blog/' . $data->image) }}" alt="" style="height: 100%" width="100%">
>>>>>>> parent of 007ae89 (yes)
        </div>
    </section>


    <section class="content-blog mt-5">
        <div class="container">
            <h6 class="date-blog">{{ $data->created_at->format('d F Y , H:i') }} WIB</h6>
            <h4 class="title-blog">{{ $data->judul }}</h4>
            <p>{!! $data->deskripsi !!}</p>
        </div>
    </section>
@endsection
