@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Edit', 'subtitle' => 'Wedding Design 4'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <form
                        action="{{ route('form-design4.update', ['informasiDesign4Id' => $data->informasi_design4_id, 'id' => $data->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="informasi_design4_id" value="{{ $informasiDesign4->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign4->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign4->tgl_pernikahan }}">
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Cover Undangan</div>
                            <div class="form-group form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="banner_img">Upload Foto<span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="banner_img" name="banner_img"
                                            placeholder="Rhoma Irama" value="{{ old('banner_img') }}">
                                        @if ($data->banner_img)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->banner_img) }}" alt="Foto Banner Image"
                                                    class="img-thumbnail mt-2" width="150">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_pasangan">Nama Couple<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
                                            placeholder="" disabled value="{{ $informasiDesign4->nama_pasangan }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Cover Undangan</div>
                            <div class="form-group form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="foto_prewedding">Upload Foto<span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="foto_prewedding"
                                            name="foto_prewedding" placeholder="Rhoma Irama"
                                            value="{{ old('foto_prewedding') }}">
                                        @if ($data->foto_prewedding)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->foto_prewedding) }}" alt="Foto Prewedding"
                                                    class="img-thumbnail mt-2" width="150">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_pasangan">Nama Couple<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
                                            placeholder="" disabled value="{{ $informasiDesign4->nama_pasangan }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="tgl_pernikahan">Tanggal Pernikahan<span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="tgl_pernikahan" name="tgl_pernikahan"
                                            placeholder="" disabled
                                            value="{{ \Carbon\Carbon::parse($informasiDesign4->tgl_pernikahan)->format('d-m-Y') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="music">Music <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="music" name="music"
                                            accept=".mp3" value="{{ old('music') }}">
                                        @if ($data->music)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Musik saat ini:</span>
                                                <audio controls class="mt-2">
                                                    <source src="{{ Storage::url($data->music) }}" type="audio/mpeg">
                                                    Your browser does not support the audio tag.
                                                </audio>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Mempelai Wanita</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="foto_mempelai_perempuan">Foto Mempelai Perempuan <span
                                                class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="foto_mempelai_perempuan"
                                            name="foto_mempelai_perempuan" placeholder="">
                                        @if ($data->foto_mempelai_perempuan)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->foto_mempelai_perempuan) }}"
                                                    alt="Foto Mempelai Perempuan" class="img-thumbnail mt-2"
                                                    width="150">
                                            </div>
                                        @endif
                                        <!-- Input file tidak memiliki value -->
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_mempelai_perempuan">Nama Mempelai Perempuan <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_mempelai_perempuan"
                                            name="nama_mempelai_perempuan" placeholder="Masukan nama mempelai perempuan"
                                            value="{{ $data->nama_mempelai_perempuan }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putri_dari_bpk">Putri dari Bapak <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putri_dari_bpk"
                                            name="putri_dari_bpk" placeholder="Putri dari bapak"
                                            value="{{ $data->putri_dari_bpk }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putri_dari_ibu">Putri dari Ibu <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putri_dari_ibu"
                                            name="putri_dari_ibu" placeholder="Putri dari ibu"
                                            value="{{ $data->putri_dari_ibu }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_instagram1">Nama Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_instagram1"
                                            name="nama_instagram1" placeholder="Masukkan nama instagram"
                                            value="{{ $data->nama_instagram1 }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_instagram1">Link Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_instagram1"
                                            name="link_instagram1" placeholder="Masukkan link instagram"
                                            value="{{ $data->link_instagram1 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Mempelai Pria</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="foto_mempelai_laki">Foto Mempelai Laki <span
                                                class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="foto_mempelai_laki"
                                            name="foto_mempelai_laki" placeholder="">
                                        @if ($data->foto_mempelai_laki)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->foto_mempelai_laki) }}"
                                                    alt="Foto Mempelai Laki" class="img-thumbnail mt-2" width="150">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_mempelai_laki">Nama Mempelai Laki <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_mempelai_laki"
                                            name="nama_mempelai_laki" placeholder="Masukan nama mempelai laki-laki"
                                            value="{{ $data->nama_mempelai_laki }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putra_dari_bpk">Putra dari Bapak <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putra_dari_bpk"
                                            name="putra_dari_bpk" placeholder="Putra dari bapak"
                                            value="{{ $data->putra_dari_bpk }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putra_dari_ibu">Putra dari Ibu <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putra_dari_ibu"
                                            name="putra_dari_ibu" placeholder="Putra dari ibu"
                                            value="{{ $data->putra_dari_ibu }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_instagram2">Nama Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_instagram2"
                                            name="nama_instagram2" placeholder="Masukkan nama instagram"
                                            value="{{ $data->nama_instagram2 }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_instagram2">Link Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_instagram2"
                                            name="link_instagram2" placeholder="Masukkan link instagram"
                                            value="{{ $data->link_instagram2 }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Perjalanan Cinta</div>
                            <div class="d-flex">
                                <a class="btn btn-primary mb-3 ms-auto" href="">Tambah Data</a>
                            </div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>foto_mempelai_perempuan</th>
                                            <th>Foto</th>
                                            <th>Tanggal</th>
                                            <th>Judul Cerita</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Moment</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="quote">Quoted <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="quote" name="quote"
                                            placeholder="Masukkan Quote" value="{{ $data->quote }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="quote_img">Upload Images <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="quote_img" name="quote_img[]"
                                            multiple>
                                        @if ($data->quote_img)
                                            <div class="d-flex flex-column">
                                                <span>Gambar kutipan saat ini:</span>
                                                @foreach (json_decode($data->quote_img) as $image)
                                                    <img src="{{ Storage::url($image) }}" alt="Quote Image"
                                                        class="img-thumbnail mt-2" width="150">
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Informasi Akad & Resepsi</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="akad_img">Upload Foto <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="akad_img" name="akad_img"
                                            placeholder="" value="{{ old('akad_img') }}">
                                        @if ($data->akad_img)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->akad_img) }}" alt="Foto Akad"
                                                    class="img-thumbnail mt-2" width="150">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Informasi Akad</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="tgl_akad">Tanggal Akad <span class="mandatory">*</span></label>
                                        <input type="date" class="form-control" id="tgl_akad" name="tgl_akad"
                                            value="{{ $data->tgl_akad }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="mulai_akad">Mulai Akad <span class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="mulai_akad" name="mulai_akad"
                                            value="{{ date('H:i', strtotime($data->mulai_akad)) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="selesai_akad">Selesai Akad <span class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="selesai_akad" name="selesai_akad"
                                            value="{{ date('H:i', strtotime($data->selesai_akad)) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="lokasi_akad">Lokasi<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="lokasi_akad" name="lokasi_akad"
                                            placeholder="Masukkan lokasi" value="{{ $data->lokasi_akad }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="deskripsi_akad">Detail<span class="mandatory">*</span></label>
                                        <textarea class="form-control" rows="5" id="deskripsi_akad" name="deskripsi_akad"
                                            placeholder="Masukan alamat">{{ $data->deskripsi_akad }}</textarea>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_akad">Lokasi Gmaps<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_akad" name="link_akad"
                                            placeholder="Masukkan link gmaps" value="{{ $data->link_akad }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="simpan_tgl_akad">Simpan Tanggal<span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="simpan_tgl_akad"
                                            name="simpan_tgl_akad" placeholder="Masukkan link"
                                            value="{{ $data->simpan_tgl_akad }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Informasi Resepsi</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="tgl_resepsi">Tanggal Resepsi<span class="mandatory">*</span></label>
                                        <input type="date" class="form-control" id="tgl_resepsi" name="tgl_resepsi"
                                            value="{{ $data->tgl_resepsi }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="mulai_resepsi">Mulai Resepsi <span class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="mulai_resepsi"
                                            name="mulai_resepsi"
                                            value="{{ date('H:i', strtotime($data->mulai_resepsi)) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="selesai_resepsi">Selesai Resepsi <span
                                                class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="selesai_resepsi"
                                            name="selesai_resepsi"
                                            value="{{ date('H:i', strtotime($data->selesai_resepsi)) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="lokasi_resepsi">Lokasi<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="lokasi_resepsi"
                                            name="lokasi_resepsi" placeholder="Masukkan lokasi"
                                            value="{{ $data->lokasi_resepsi }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="deskripsi_resepsi">Detail<span class="mandatory">*</span></label>
                                        <textarea class="form-control" rows="5" id="deskripsi_resepsi" name="deskripsi_resepsi"
                                            placeholder="Masukan alamat">{{ $data->deskripsi_resepsi }}</textarea>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_resepsi">Lokasi Gmaps<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_resepsi" name="link_resepsi"
                                            placeholder="Masukkan link gmaps" value="{{ $data->link_resepsi }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="simpan_tgl_resepsi">Simpan Tanggal<span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="simpan_tgl_resepsi"
                                            name="simpan_tgl_resepsi" placeholder="Masukkan link"
                                            value="{{ $data->simpan_tgl_resepsi }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Live Streaming</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_streaming">Link Streaming<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_streaming"
                                            name="link_streaming" placeholder="Masukkan link"
                                            value="{{ $data->link_streaming }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Direct Transfer</div>
                            <div class="d-flex">
                                <a class="btn btn-primary mb-3 ms-auto" href="">Tambah Data</a>
                            </div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Bank</th>
                                            <th>No.Rekening</th>
                                            <th>Pemilik Rekening</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Kirim Hadiah</div>
                            <div class="d-flex">
                                <a class="btn btn-primary mb-3 ms-auto" href="">Tambah Data</a>
                            </div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Bank</th>
                                            <th>No.Rekening</th>
                                            <th>Pemilik Rekening</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                            <a href="{{ route('wedding-design4.index') }}" class="btn btn-secondary">Batal</a>
                        </div>

                    </form>
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
