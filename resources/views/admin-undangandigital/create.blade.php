@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Create', 'subtitle' => 'Undangan Digital'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('undangandigital.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body container bg-white mt-5">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Undangan Digital</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="image">Gambar <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="" value="{{ old('image') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="judul">Judul <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            placeholder="Masukkan judul" value="{{ old('judul') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="harga">Harga <span class="mandatory">*</span></label>
                                        <input type="number" class="form-control" id="harga" name="harga"
                                            placeholder="Masukkan harga" value="{{ old('harga') }}">
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="link_preview">Link Preview <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_preview" name="link_preview"
                                            placeholder="Masukkan link preview" value="{{ old('link_preview') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_pesan">Link Pesan <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_pesan" name="link_pesan"
                                            placeholder="Masukkan link pesan" value="{{ old('link_pesan') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link">Kategori <span class="mandatory">*</span></label>
                                        <select class="form-control" id="kategori" name="kategori">
                                            <option value="0" {{ old('kategori') == '0' ? 'selected' : '' }}>--Pilih
                                                Kategori--</option>
                                            <option value="1" {{ old('kategori') == '1' ? 'selected' : '' }}>Undangan
                                                Pernikahan</option>
                                            <option value="2" {{ old('kategori') == '2' ? 'selected' : '' }}>Ulang
                                                Tahun</option>
                                            <option value="3" {{ old('kategori') == '3' ? 'selected' : '' }}>Seminar
                                            </option>
                                            <option value="4" {{ old('kategori') == '4' ? 'selected' : '' }}>Akikah
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('undangandigital.index') }}" class="btn btn-secondary">Batal</a>
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
