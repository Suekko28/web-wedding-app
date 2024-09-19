@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Create', 'subtitle' => 'Cetak Foto'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('cetakfoto.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body container bg-white mt-5">
                            <div class="mempelai text-center fw-bold fs-5">Cetak Foto</div>
                            <div class="fs-3">
                                <div class="form-group mb-3">
                                    <label for="image">Gambar <span class="mandatory">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder=""
                                        value="{{ old('image') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="judul">Judul <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Masukkan judul" value="{{ old('judul') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="harga">Harga <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control" id="harga" name="harga"
                                        placeholder="Masukkan harga" value="{{ old('harga') }}"
                                        onkeyup="formatRupiah(this)">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="link">Link <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Masukkan link" value="{{ old('link') }}">
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('cetakfoto.index') }}" class="btn btn-secondary">Batal</a>
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
