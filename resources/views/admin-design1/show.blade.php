@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Wedding Design 1', 'subtitle' => 'Dashboard'])

    <section class="content">
        <div class="container-fluid">
            @include('layouts.message')
            <!-- Small boxes (Stat box) -->
            <form action="{{ url('undangan-alternative1', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                {{-- <div class="card-body container bg-white mt-5">
                    <div class="mempelai text-center fw-bold fs-5">Banner Image & Music</div>
                    <div class="fs-3">
                        <div class="form-group mb-3">
                            <label for="banner_img">Foto Prewedding <span class="mandatory">*</span></label>
                            <input disabled type="file" class="form-control" id="banner_img" name="banner_img" placeholder="" value="{{$data->banner_img}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="music">Music <span class="mandatory">*</span></label>
                            <input disabled type="file" class="form-control" id="music" name="music" accept=".mp3">
                        </div>
                        
                    </div>
                </div> --}}

                <div class="card-body container bg-white mt-5">
                    <div class="mempelai text-center fw-bold fs-5">Mempelai</div>
                    <div class="fs-3">
                        <div class="form-group mb-3">
                            <label for="foto_mempelai_laki">Foto Mempelai Laki <span class="mandatory">*</span></label>
                            <div class="img-fluid">
                                <img src="{{ Storage::url('' . $data->foto_mempelai_laki) }}" class="img-fluid"
                                    alt="Foto Mempelai Laki" width="200" height="200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_mempelai_laki">Nama Mempelai Laki <span class="mandatory">*</span></label>
                            <input disabled type="text" class="form-control" id="nama_mempelai_laki"
                                name="nama_mempelai_laki" placeholder="Masukan nama mempelai laki-laki"
                                value="{{ $data->nama_mempelai_laki }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="putra_dari_bpk">Putra dari Bapak <span class="mandatory">*</span></label>
                            <input disabled type="text" class="form-control" id="putra_dari_bpk" name="putra_dari_bpk"
                                placeholder="Putra dari bapak" value="{{ $data->putra_dari_bpk }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="putra_dari_ibu">Putra dari Ibu <span class="mandatory">*</span></label>
                            <input disabled type="text" class="form-control" id="putra_dari_ibu" name="putra_dari_ibu"
                                placeholder="Putra dari ibu" value="{{ $data->putra_dari_ibu }}">
                        </div>


                        <div class="form-group mb-3">
                            <label for="foto_mempelai_perempuan">Foto Mempelai Perempuan <span
                                    class="mandatory">*</span></label>
                            <div class="img-fluid">
                                <img src="{{ Storage::url('' . $data->foto_mempelai_perempuan) }}" class="img-fluid"
                                    alt="Foto Mempelai Perempuan" width="200" height="200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_mempelai_perempuan">Nama Mempelai Perempuan <span
                                    class="mandatory">*</span></label>
                            <input disabled type="text" class="form-control" id="nama_mempelai_perempuan"
                                name="nama_mempelai_perempuan" placeholder="Masukan nama mempelai perempuan"
                                value="{{ $data->nama_mempelai_perempuan }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="putri_dari_bpk">Putri dari Bapak <span class="mandatory">*</span></label>
                            <input disabled type="text" class="form-control" id="putri_dari_bpk" name="putri_dari_bpk"
                                placeholder="Putri dari bapak" value="{{ $data->putri_dari_bpk }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="putri_dari_ibu">Putri dari Ibu <span class="mandatory">*</span></label>
                            <input disabled type="text" class="form-control" id="putri_dari_ibu" name="putri_dari_ibu"
                                placeholder="Putri dari ibu" value="{{ $data->putri_dari_ibu }}">
                        </div>

                    </div>
                </div>

                <div class="card-body container bg-white mt-5">
                    <div class="mempelai text-center fw-bold fs-5">Akad</div>
                    <div class="fs-3">
                        <div class="form-group mb-3">
                            <label for="tgl_akad">Tanggal Akad <span class="mandatory">*</span></label>
                            <input disabled type="date" class="form-control" id="tgl_akad" name="tgl_akad"
                                placeholder="" value="{{ $data->tgl_akad }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="mulai_akad">Mulai Akad <span class="mandatory">*</span></label>
                            <input disabled type="time" class="form-control" id="mulai_akad" name="mulai_akad"
                                placeholder="" value="{{ $data->mulai_akad }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="selesai_akad">Selesai Akad <span class="mandatory">*</span></label>
                            <input disabled type="time" class="form-control" id="selesai_akad" name="selesai_akad"
                                placeholder="" value="{{ $data->selesai_akad }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat_akad">Alamat Akad <span class="mandatory">*</span></label>
                            <textarea disabled class="form-control" rows="5" id="alamat_akad" name="alamat_akad"
                                placeholder="Masukan alamat akad">{{ $data->alamat_akad }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="$data->lokasi_gmaps_akad">Lokasi Maps Resepsi <span
                                    class="mandatory">*</span></label>
                            <input disabled type="text" class="form-control" id="lokasi_gmaps_akad"
                                name="lokasi_gmaps_akad" placeholder="Masukkan link alamat maps"
                                value="{{ $data->lokasi_gmaps_akad }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="tgl_resepsi">Tanggal Resepsi <span class="mandatory">*</span></label>
                            <input disabled type="date" class="form-control" id="tgl_resepsi" name="tgl_resepsi"
                                placeholder="" value="{{ $data->tgl_resepsi }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="mulai_resepsi">Mulai Resepsi <span class="mandatory">*</span></label>
                            <input disabled type="time" class="form-control" id="mulai_resepsi" name="mulai_resepsi"
                                placeholder="" value="{{ $data->mulai_resepsi }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="selesai_resepsi">Selesai Resepsi <span class="mandatory">*</span></label>
                            <input disabled type="time" class="form-control" id="selesai_resepsi"
                                name="selesai_resepsi" placeholder="" value="{{ $data->selesai_resepsi }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamat_resepsi">Alamat Resepsi <span class="mandatory">*</span></label>
                            <textarea class="form-control" rows="5" id="alamat_resepsi" name="alamat_resepsi"
                                placeholder="Masukan alamat resepsi" disabled>{{ $data->alamat_resepsi }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="$data->lokasi_gmaps_resepsi">Lokasi Maps Resepsi <span
                                    class="mandatory">*</span></label>
                            <input disabled type="text" class="form-control" id="lokasi_gmaps"
                                name="$data->lokasi_gmaps_resepsi" placeholder="Masukkan link alamat maps"
                                value="{{ $data->lokasi_gmaps_resepsi }}">
                        </div>

                    </div>

            </form>

            <table class="table table-bordered">
                <h6>Daftar Tamu Undangan <a href="{{ route('nama-undangan-list1', ['id' => $data]) }}" target="_blank"
                        rel="noopener noreferrer" class="underline-primary"><u>Sharelink</u></a></h6>
                <thead>
                    <tr class="text-nowrap text-center">
                        <th>No</th>
                        <th>Nama Undangan</th>
                        {{-- <th>Template Message</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($nama_undangan as $item)
                        <tr class="text-center">
                            <td scope="row">{{ $i }}</td>
                            <td scope="row">{{ $item->nama_undangan }}</td>
                            {{-- Other table cells --}}
                        </tr>
                        <?php $i++; ?>
                    @endforeach

                </tbody>

            </table>

            <div class="d-flex flex-row-reverse mt-5 mb-3">
                <a href="{{ route('wedding-design1') }}" class="btn btn-primary ">Kembali</a>
            </div>
        </div>

        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- Hidden form for delete -->
@endsection

@section('scripts')
@endsection
