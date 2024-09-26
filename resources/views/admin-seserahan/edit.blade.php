@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Edit', 'subtitle' => 'Seserahan'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('seserahan.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body container bg-white mt-5">
                            <div class="mempelai text-center fw-bold fs-5">Seserahan</div>
                            <div class="fs-3">
                                <div class="col-sm-4 mb-3">
                                    <label for="image">Gambar <span class="mandatory">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image">

                                    <!-- Tampilkan gambar lama jika ada -->
                                    @if ($data->image)
                                    <div class="d-flex flex-column">
                                    <span>Gambar saat ini:</span>
                                        <img src="{{ asset('storage/seserahan/' . $data->image) }}" alt="Foto Seserahan"
                                            class="img-thumbnail mt-2" width="150">
                                        </div>
                                    @endif
                                </div>
                                
                            </div>
    
                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('seserahan.index') }}" class="btn btn-secondary">Batal</a>
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
