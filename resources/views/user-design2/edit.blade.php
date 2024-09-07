@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/prismjs/themes/prism-okaidia.min.css') }}">
@endsection

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Dashboard', 'subtitle' => 'Home'])
    <!-- Row -->
    <main>

        <section class="content">
            <div class="container-fluid">
                @include('layouts.message')
                <!-- Small boxes (Stat box) -->
                <form action="{{ route('nama-undangan-update',['weddingDesign2Id' => $weddingDesign2Id, 'id' => $data->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="wedding_design2_id" value="{{ $weddingDesign2Id }}">
                    <div class="card-body container bg-white mt-5">
                        <div class="mempelai text-center fw-bold fs-5">Nama Undangan</div>
                        <div class="fs-3">
                            <div class="form-group mb-3">
                                <label for="nama_undangan">Nama Undangan <span class="mandatory">*</span></label>
                                <textarea class="form-control" rows="5" id="nama_undangan" name="nama_undangan"
                                    placeholder="Masukan nama-nama undangan">{{$data->nama_undangan}}</textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse mt-5">
                            <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                            <a href="{{ route('nama-undangan-list2', ['id' => $weddingDesign2Id]) }}"
                                class="btn btn-danger">Batal</a>
                        </div>

                    </div>




                    <!-- /.card-body -->

                </form>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
    </main>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/js/widget/ui-card-init.js') }}"></script>
@endsection
