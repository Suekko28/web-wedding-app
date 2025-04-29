@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Create', 'subtitle' => 'Promo'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('promo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body container bg-white mt-5">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Promo</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="image">Gambar <span class="mandatory">*</span></label>
                                    <input type="file" accept="image/*" class="form-control" id="image" name="image"
                                        placeholder="" value="{{old('image')}}">
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <label for="link">Link <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Masukkan link" value="{{ old('link') }}">
                                </div>
                            </div>
                        </div>
    
                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('promo.index') }}" class="btn btn-secondary">Batal</a>
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
