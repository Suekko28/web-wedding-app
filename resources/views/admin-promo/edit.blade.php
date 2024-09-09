@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Create', 'subtitle' => 'Promo'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body p-4">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('promo.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body container bg-white mt-5">
                            <div class="mempelai text-center fw-bold fs-5">Promo</div>
                            <div class="fs-3">
                                <div class="form-group mb-3">
                                    <label for="image">Gambar <span class="mandatory">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="" value="{{$data->image}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="link">Link <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Masukkan link" value="{{ $data->link }}">
                                </div>
                            </div>
    
                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('promo.index') }}" class="btn btn-danger">Batal</a>
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
