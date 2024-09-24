@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Create', 'subtitle' => 'Wedding Design 2'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('wedding-design2.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="card-body container bg-white">
                            <div class="mempelai text-center fw-bold fs-5 mb-3">Nama Undangan</div>
                            <div class="form-group fs-3">
                                <div class="col-sm-4 mb-3">
                                    <label for="nama_undangan">Nama Undangan <span class="mandatory">*</span></label>
                                    <textarea class="form-control" rows="5" id="nama_undangan" name="nama_undangan"
                                        placeholder="Masukan nama-nama undangan"></textarea>
                                </div>
                            </div>
                        </div> --}}

                        <div class="card-body container bg-white">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Banner Image & Music</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="background_img">Background Image <span
                                                class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="background_img" name="background_img"
                                            placeholder="" value="{{ old('background_img') }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="banner_img">Foto Opening <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="banner_img" name="banner_img"
                                            placeholder="" value="{{ old('banner_img') }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="music">Music <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="music" name="music"
                                            accept=".mp3" value="{{ old('music') }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="foto_prewedding">Foto Prewedding <span
                                                class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="foto_prewedding"
                                            name="foto_prewedding" placeholder="" value="{{ old('background_img') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body container bg-white">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Mempelai</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="foto_mempelai_laki">Foto Mempelai Laki <span
                                                class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="foto_mempelai_laki"
                                            name="foto_mempelai_laki" placeholder="">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_mempelai_laki">Nama Mempelai Laki <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_mempelai_laki"
                                            name="nama_mempelai_laki" placeholder="Masukan nama mempelai laki-laki"
                                            value="{{ old('nama_mempelai_laki') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putra_dari_bpk">Putra dari Bapak <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putra_dari_bpk" name="putra_dari_bpk"
                                            placeholder="Putra dari bapak" value="{{ old('putra_dari_bpk') }}">
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="putra_dari_ibu">Putra dari Ibu <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putra_dari_ibu" name="putra_dari_ibu"
                                            placeholder="Putra dari ibu" value="{{ old('putra_dari_ibu') }}">
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_instagram1">Nama Instagram <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_instagram1"
                                            name="nama_instagram1" placeholder="Masukkan nama instagram"
                                            value="{{ old('nama_instagram1') }}">
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="link_instagram1">Link Instagram <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_instagram1"
                                            name="link_instagram1" placeholder="Masukkan link instagram"
                                            value="{{ old('link_instagram1') }}">
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="foto_mempelai_perempuan">Foto Mempelai Perempuan <span
                                                class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="foto_mempelai_perempuan"
                                            name="foto_mempelai_perempuan" placeholder="">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_mempelai_perempuan">Nama Mempelai Perempuan <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_mempelai_perempuan"
                                            name="nama_mempelai_perempuan" placeholder="Masukan nama mempelai perempuan"
                                            value="{{ old('nama_mempelai_perempuan') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putri_dari_bpk">Putri dari Bapak <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putri_dari_bpk"
                                            name="putri_dari_bpk" placeholder="Putri dari bapak"
                                            value="{{ old('putri_dari_bpk') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putri_dari_ibu">Putri dari Ibu <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putri_dari_ibu"
                                            name="putri_dari_ibu" placeholder="Putri dari ibu"
                                            value="{{ old('putri_dari_ibu') }}">
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_instagram2">Nama Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_instagram2"
                                            name="nama_instagram2" placeholder="Masukkan nama instagram"
                                            value="{{ old('nama_instagram2') }}">
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="link_instagram2">Link Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_instagram2"
                                            name="link_instagram2" placeholder="Masukkan link instagram"
                                            value="{{ old('link_instagram2') }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body container bg-white">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Love Story</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="judul_cerita1">Judul Cerita <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="judul_cerita1"
                                            name="judul_cerita1" placeholder="Masukkan Judul Ceritamu"
                                            value="{{ old('judul_cerita1') }}">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="tgl_cerita1">Tanggal <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="date" class="form-control" id="tgl_cerita1" name="tgl_cerita1"
                                            placeholder="" value="{{ old('tgl_cerita1') }}">
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <label for="perkenalan">Cerita <span class="fst-italic">(Opsional)</span><span
                                                class="fst-italic">(Maksimal 200 Karakter)</span>
                                        </label>
                                        <textarea class="form-control" rows="5" id="perkenalan" name="perkenalan"
                                            placeholder="Ceritakan perkenalan kamu dengan pasanganmu">{{ old('perkenalan') }}</textarea>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="judul_cerita2">Judul Cerita <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="judul_cerita2"
                                            name="judul_cerita2" placeholder="Masukkan Judul Ceritamu"
                                            value="{{ old('judul_cerita2') }}">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="tgl_cerita2">Tanggal <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="date" class="form-control" id="tgl_cerita2" name="tgl_cerita2"
                                            placeholder="" value="{{ old('tgl_cerita2') }}">
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <label for="jadian">Cerita <span class="fst-italic">(Opsional)</span><span
                                                class="fst-italic">(Maksimal 200 Karakter)</span>
                                        </label>
                                        <textarea class="form-control" rows="5" id="jadian" name="jadian"
                                            placeholder="Ceritakan jadian kamu dengan pasanganmu ">{{ old('jadian') }}</textarea>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="judul_cerita3">Judul Cerita <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="judul_cerita3"
                                            name="judul_cerita3" placeholder="Masukkan Judul Ceritamu"
                                            value="{{ old('judul_cerita3') }}">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="tgl_cerita3">Tanggal <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="date" class="form-control" id="tgl_cerita3" name="tgl_cerita3"
                                            placeholder="" value="{{ old('tgl_cerita3') }}">
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <label for="tunangan">Cerita <span class="fst-italic">(Opsional)</span></label>
                                        <textarea class="form-control" rows="5" id="tunangan" name="tunangan"
                                            placeholder="Ceritakan tunangan kamu dengan pasanganmu">{{ old('tunangan') }}</textarea>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="judul_cerita4">Judul Cerita <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="judul_cerita4"
                                            name="judul_cerita4" placeholder="Masukkan Judul Ceritamu"
                                            value="{{ old('judul_cerita4') }}">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="tgl_cerita4">Tanggal <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="date" class="form-control" id="tgl_cerita4" name="tgl_cerita4"
                                            placeholder="" value="{{ old('tgl_cerita4') }}">
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <label for="pernikahan">Cerita <span class="fst-italic">(Opsional)</span></label>
                                        <textarea class="form-control" rows="5" id="pernikahan" name="pernikahan"
                                            placeholder="Ceritakan rencana pernikahan kamu dengan pasanganmu">{{ old('pernikahan') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body container bg-white">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Akad</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="tgl_akad">Tanggal Akad <span class="mandatory">*</span></label>
                                        <input type="date" class="form-control" id="tgl_akad" name="tgl_akad"
                                            placeholder="" value="{{ old('tgl_akad') }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="mulai_akad">Mulai Akad <span class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="mulai_akad" name="mulai_akad"
                                            placeholder="" value="{{ old('mulai_akad') }}">
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <label for="alamat_akad">Alamat Akad <span class="mandatory">*</span></label>
                                        <textarea class="form-control" rows="5" id="alamat_akad" name="alamat_akad"
                                            placeholder="Masukan alamat akad">{{ old('alamat_akad') }}</textarea>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="tgl_resepsi">Tanggal Resepsi <span class="mandatory">*</span></label>
                                        <input type="date" class="form-control" id="tgl_resepsi" name="tgl_resepsi"
                                            placeholder="" value="{{ old('tgl_resepsi') }}">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="mulai_resepsi">Mulai Resepsi <span class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="mulai_resepsi"
                                            name="mulai_resepsi" placeholder="" value="{{ old('mulai_resepsi') }}">
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <label for="alamat_resepsi">Alamat Resepsi <span
                                                class="mandatory">*</span></label>
                                        <textarea class="form-control" rows="5" id="alamat_resepsi" name="alamat_resepsi"
                                            placeholder="Masukan alamat resepsi">{{ old('alamat_resepsi') }}</textarea>
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <label for="lokasi_gmaps">Lokasi Maps <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="lokasi_gmaps" name="lokasi_gmaps"
                                            placeholder="Masukkan link alamat maps" value="{{ old('lokasi_gmaps') }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body container bg-white">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Galeri Foto</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="galeri_img1">Foto 1 <span class="fst-italic">(Opsional)</span></label>
                                        <input type="file" class="form-control" id="galeri_img1" name="galeri_img1"
                                            placeholder="" value="{{ old('galeri_img1') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="galeri_img2">Foto 2 <span class="fst-italic">(Opsional)</span></label>
                                        <input type="file" class="form-control" id="galeri_img2" name="galeri_img2"
                                            placeholder="" value="{{ old('galeri_img2') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="galeri_img3">Foto 3 <span class="fst-italic">(Opsional)</span></label>
                                        <input type="file" class="form-control" id="galeri_img3" name="galeri_img3"
                                            placeholder="" value="{{ old('galeri_img3') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="galeri_img4">Foto 4 <span class="fst-italic">(Opsional)</span></label>
                                        <input type="file" class="form-control" id="galeri_img4" name="galeri_img4"
                                            placeholder="" value="{{ old('galeri_img4') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="galeri_img5">Foto 5 <span class="fst-italic">(Opsional)</span></label>
                                        <input type="file" class="form-control" id="galeri_img5" name="galeri_img5"
                                            placeholder="" value="{{ old('galeri_img5') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="galeri_img6">Foto 6 <span class="fst-italic">(Opsional)</span></label>
                                        <input type="file" class="form-control" id="galeri_img6" name="galeri_img6"
                                            placeholder="" value="{{ old('galeri_img6') }}">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card-body container bg-white">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Kirim Hadiah</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_rek1">Nama Rek Tertera <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="nama_rek1" name="nama_rek1"
                                            placeholder="BCA, BRI, Dll" value="{{ old('nama_rek1') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="no_rek1">No. Rek Tertera <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="no_rek1" name="no_rek1"
                                            placeholder="Masukkan nomor rekening" value="{{ old('no_rek1') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="atas_nama1">Atas Nama <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="atas_nama1" name="atas_nama1"
                                            placeholder="Rudi Hermawan" value="{{ old('atas_nama1') }}">
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_rek2">Nama Rek Tertera <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="nama_rek2" name="nama_rek2"
                                            placeholder="BCA, BRI, Dll" value="{{ old('nama_rek2') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="no_rek2">No. Rek Tertera <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="no_rek2" name="no_rek2"
                                            placeholder="Masukkan nomor rekening" value="{{ old('no_rek2') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="atas_nama2">Atas Nama <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <input type="text" class="form-control" id="atas_nama2" name="atas_nama2"
                                            placeholder="Rudi Hermawan" value="{{ old('atas_nama2') }}">
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <label for="alamat_tertera">Alamat Tertera <span
                                                class="fst-italic">(Opsional)</span></label>
                                        <textarea class="form-control" rows="5" id="alamat_tertera" name="alamat_tertera"
                                            placeholder="Masukan alamat tertera kirim hadiah">{{ old('alamat_tertera') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('wedding-design2.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>


                        <!-- /.card-body -->

                    </form>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
