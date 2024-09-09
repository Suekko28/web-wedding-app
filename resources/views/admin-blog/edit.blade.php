@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Create', 'subtitle' => 'Blog'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('blog.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body container bg-white mt-5">
                            <div class="mempelai text-center fw-bold fs-5">Blog</div>
                            <div class="fs-6">
                                <div class="form-group mb-3">
                                    <label for="image">Gambar <span class="mandatory">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder=""
                                        value="{{ $data->image }}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="judul">Judul <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Masukkan judul" value="{{ $data->judul }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="deskripsi">Deskripsi <span class="mandatory">*</span></label>
                                    <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" placeholder="Masukkan isi deskripsi">{{ $data->judul }}</textarea>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('blog.index') }}" class="btn btn-danger">Batal</a>
                            </div>

                        </div>

                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
