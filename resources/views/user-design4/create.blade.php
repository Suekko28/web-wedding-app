@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/prismjs/themes/prism-okaidia.min.css') }}">
@endsection

@section('pageContent')

    <main>
        <section class="content">
            <div class="container-fluid">
                @include('layouts.message')
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('nama-undangan-store4', ['id' => $weddingDesign4->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="wedding_design4_id" value="{{ $weddingDesign4->id }}">
                            <div class="card-body container bg-white mt-5">
                                <div class="mempelai text-center fw-bold fs-5">Nama Undangan</div>
                                <div class="fs-3">
                                    <div class="form-group mb-3">
                                        <label for="nama_undangan">Nama Undangan <span class="mandatory">*</span></label>
                                        <textarea class="form-control" rows="5" id="nama_undangan" name="nama_undangan"
                                            placeholder="Masukan nama-nama undangan"></textarea>
                                    </div>
                                </div>

                                <div class="d-flex flex-row-reverse mt-5">
                                    <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                    <a href="{{ route('nama-undangan-list4', ['weddingDesign4Id' => $weddingDesign4->id]) }}"
                                        class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/js/widget/ui-card-init.js') }}"></script>
@endsection
