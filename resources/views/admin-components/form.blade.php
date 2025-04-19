@extends('layouts.admin')

@section('content')
    <form action="{{ route('form-design6.store', ['id' => $informasiDesign6Id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="informasi_design6_id" value="{{ $informasiDesign6->id }}">
        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign6->nama_pasangan }}">
        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign6->tgl_pernikahan }}">
        <input type="hidden" name="id" id="perjalananCintaId">
        <div class="card-body container bg-white">
            <div class="mempelai fw-bold fs-5 mb-4">Cover Undangan</div>
            <div class="form-group form-group fs-3">
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <label for="banner_img">Upload Image<span class="mandatory">*</span></label>
                        <input type="file" class="form-control" id="banner_img" name="banner_img"
                            placeholder="Rhoma Irama" value="{{ old('banner_img') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="nama_pasangan">Nama Couple<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" placeholder=""
                            disabled value="{{ $informasiDesign6->nama_pasangan }}">
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
                        <label for="foto_prewedding">Upload Image<span class="mandatory">*</span></label>
                        <input type="file" class="form-control" id="foto_prewedding" name="foto_prewedding"
                            placeholder="Rhoma Irama" value="{{ old('foto_prewedding') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="nama_pasangan">Nama Couple<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" placeholder=""
                            disabled value="{{ $informasiDesign6->nama_pasangan }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="tgl_pernikahan">Tanggal Pernikahan<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="tgl_pernikahan" name="tgl_pernikahan" placeholder=""
                            disabled
                            value="{{ \Carbon\Carbon::parse($informasiDesign6->tgl_pernikahan)->format('d-m-Y') }}">
                    </div>
                    <div class="col-sm-4">
                        <label for="music">Music <span class="mandatory">*</span></label>
                        <input type="file" class="form-control" id="music" name="music" accept=".mp3"
                            value="{{ old('music') }}">
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
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="nama_mempelai_perempuan">Nama Mempelai Perempuan <span
                                class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="nama_mempelai_perempuan"
                            name="nama_mempelai_perempuan" placeholder="Masukan nama mempelai perempuan"
                            value="{{ old('nama_mempelai_perempuan') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="putri_dari_bpk">Putri dari Bapak <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="putri_dari_bpk" name="putri_dari_bpk"
                            placeholder="Putri dari bapak" value="{{ old('putri_dari_bpk') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="putri_dari_ibu">Putri dari Ibu <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="putri_dari_ibu" name="putri_dari_ibu"
                            placeholder="Putri dari ibu" value="{{ old('putri_dari_ibu') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="nama_instagram2">Nama Instagram <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="nama_instagram1" name="nama_instagram1"
                            placeholder="Masukkan nama instagram" value="{{ old('nama_instagram1') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="link_instagram1">Link Instagram <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="link_instagram1" name="link_instagram1"
                            placeholder="Masukkan link instagram" value="{{ old('link_instagram1') }}">
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
                        <label for="foto_mempelai_laki">Foto Mempelai Laki <span class="mandatory">*</span></label>
                        <input type="file" class="form-control" id="foto_mempelai_laki" name="foto_mempelai_laki"
                            placeholder="">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="nama_mempelai_laki">Nama Mempelai Laki <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="nama_mempelai_laki" name="nama_mempelai_laki"
                            placeholder="Masukan nama mempelai laki-laki" value="{{ old('nama_mempelai_laki') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="putra_dari_bpk">Putra dari Bapak <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="putra_dari_bpk" name="putra_dari_bpk"
                            placeholder="Putra dari bapak" value="{{ old('putra_dari_bpk') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="putra_dari_ibu">Putra dari Ibu <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="putra_dari_ibu" name="putra_dari_ibu"
                            placeholder="Putra dari ibu" value="{{ old('putra_dari_ibu') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="nama_instagram2">Nama Instagram <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="nama_instagram2" name="nama_instagram2"
                            placeholder="Masukkan nama instagram" value="{{ old('nama_instagram2') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="link_instagram2">Link Instagram <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="link_instagram2" name="link_instagram2"
                            placeholder="Masukkan link instagram" value="{{ old('link_instagram2') }}">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body container bg-white">
            <div class="mempelai fw-bold fs-5 mb-4">Perjalanan Cinta</div>
            <div class="d-flex">
                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnPerjalananCinta"
                    data-bs-toggle="modal" data-bs-target="#modalPerjalananCinta">
                    Tambah Cerita
                </button>
            </div>
            <div class="table-responsive mb-4 border rounded-1">
                <table class="table text-nowrap mb-0 align-middle text-center" id="tablePerjalananCinta">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $dataPerjalananCinta->firstItem(); ?>
                        @foreach ($dataPerjalananCinta as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                                <td>
                                    <div class="d-flex flex-column justify-center align-items-center">
                                        @foreach (json_decode($item->image) as $image)
                                            <img src="{{ Storage::url($image) }}" alt="Perjalanan Cinta Image"
                                                class="img-thumbnail mt-2" width="150" height="150">
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0)"
                                        class="btn btn-warning mb-2 rounded edit-btn-perjalanan-cinta"
                                        data-id="{{ $item->id }}" data-deskripsi="{{ $item->deskripsi }}"
                                        data-image='@json(collect(json_decode($item->image))->map(fn($img) => Storage::url($img)))'>
                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger delete-btn-perjalanan-cinta rounded mb-2"
                                        data-id="{{ $item->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body container bg-white">
            <div class="mempelai fw-bold fs-5 mb-4">Informasi Akad & Resepsi</div>
            <div class="form-group fs-3">
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <label for="akad_img">Upload Image <span class="mandatory">*</span></label>
                        <input type="file" class="form-control" id="akad_img" name="akad_img" placeholder=""
                            value="{{ old('akad_img') }}">
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
                            value="{{ old('tgl_akad') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="mulai_akad">Mulai Akad <span class="mandatory">*</span></label>
                        <input type="time" class="form-control" id="mulai_akad" name="mulai_akad"
                            value="{{ old('mulai_akad') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="selesai_akad">Selesai Akad <span class="mandatory">*</span></label>
                        <input type="time" class="form-control" id="selesai_akad" name="selesai_akad"
                            value="{{ old('selesai_akad') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="lokasi_akad">Lokasi<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="lokasi_akad" name="lokasi_akad"
                            placeholder="Masukkan lokasi" value="{{ old('lokasi_akad') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="deskripsi_akad">Detail<span class="mandatory">*</span></label>
                        <textarea class="form-control" rows="5" id="deskripsi_akad" name="deskripsi_akad"
                            placeholder="Masukan alamat">{{ old('deskripsi_akad') }}</textarea>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="link_akad">Lokasi Gmaps<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="link_akad" name="link_akad"
                            placeholder="Masukkan link gmaps" value="{{ old('link_akad') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="simpan_tgl_akad">Simpan Tanggal<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="simpan_tgl_akad" name="simpan_tgl_akad"
                            placeholder="Masukkan link" value="{{ old('simpan_tgl_akad') }}">
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
                            value="{{ old('tgl_resepsi') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="mulai_resepsi">Mulai Resepsi <span class="mandatory">*</span></label>
                        <input type="time" class="form-control" id="mulai_resepsi" name="mulai_resepsi"
                            value="{{ old('mulai_resepsi') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="selesai_resepsi">Selesai Resepsi <span class="mandatory">*</span></label>
                        <input type="time" class="form-control" id="selesai_resepsi" name="selesai_resepsi"
                            value="{{ old('selesai_resepsi') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="lokasi_resepsi">Lokasi<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="lokasi_resepsi" name="lokasi_resepsi"
                            placeholder="Masukkan lokasi" value="{{ old('lokasi_resepsi') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="deskripsi_resepsi">Detail<span class="mandatory">*</span></label>
                        <textarea class="form-control" rows="5" id="deskripsi_resepsi" name="deskripsi_resepsi"
                            placeholder="Masukan alamat">{{ old('deskripsi_resepsi') }}</textarea>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="link_resepsi">Lokasi Gmaps<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="link_resepsi" name="link_resepsi"
                            placeholder="Masukkan link gmaps" value="{{ old('link_resepsi') }}">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="simpan_tgl_resepsi">Simpan Tanggal<span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="simpan_tgl_resepsi" name="simpan_tgl_resepsi"
                            placeholder="Masukkan link" value="{{ old('simpan_tgl_resepsi') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body container bg-white">
            <div class="mempelai fw-bold fs-5 mb-4">Direct Transfer</div>
            <div class="d-flex">
                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnDirectTransfer"
                    data-bs-toggle="modal" data-bs-target="#modalDirectTransfer">
                    Tambah Data
                </button>
            </div>
            <div class="table-responsive mb-4 border rounded-1">
                <table class="table text-nowrap mb-0 align-middle text-center" id="tableDirectTransfer">
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
                        <?php $i = $dataDirectTransfer->firstItem(); ?>
                        @foreach ($dataDirectTransfer as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->bank }}</td>
                                <td>{{ $item->no_rek }}</td>
                                <td>{{ $item->nama_rek }}</td>
                                <td>
                                    <a href="javascript:void(0)"
                                        class="btn btn-warning mb-2 rounded edit-btn-direct-transfer"
                                        data-id="{{ $item->id }}" data-bank="{{ $item->bank }}"
                                        data-no_rek="{{ $item->no_rek }}" data-nama_rek="{{ $item->nama_rek }}">
                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger delete-btn-direct-transfer rounded mb-2"
                                        data-id="{{ $item->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-2">{{ $dataDirectTransfer->links() }}</div>
        </div>

        <div class="card-body container bg-white">
            <div class="mempelai fw-bold fs-5 mb-4">Kirim Hadiah</div>
            <div class="d-flex">
                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnKirimHadiah" data-bs-toggle="modal"
                    data-bs-target="#modalKirimHadiah">
                    Tambah Data
                </button>
            </div>
            <div class="table-responsive mb-4 border rounded-1">
                <table class="table text-nowrap mb-0 align-middle text-center" id="tableKirimHadiah">
                    <thead>
                        <tr class="text-nowrap">
                            <th>No</th>
                            <th>Alamat</th>
                            <th>Detail Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $dataKirimHadiah->firstItem(); ?>
                        @foreach ($dataKirimHadiah as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ Str::limit($item->deskripsi_alamat, 100) }}</td>
                                <td>
                                    <a href="javascript:void(0)"
                                        class="btn btn-warning mb-2 rounded edit-btn-kirim-hadiah"
                                        data-id="{{ $item->id }}" data-alamat="{{ $item->alamat }}"
                                        data-deskripsi_alamat="{{ $item->deskripsi_alamat }}">
                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger delete-btn-kirim-hadiah rounded mb-2"
                                        data-id="{{ $item->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-2">{{ $dataKirimHadiah->links() }}</div>
        </div>

        <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
            <a href="{{ route('wedding-design6.index') }}" class="btn btn-secondary">Batal</a>
        </div>

    </form>
@endsection
