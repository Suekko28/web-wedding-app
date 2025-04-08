@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Edit', 'subtitle' => 'Wedding Design 6'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <form
                        action="{{ route('form-design6.update', ['informasiDesign6Id' => $data->informasi_design6_id, 'id' => $data->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="informasi_design6_id" value="{{ $informasiDesign6->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign6->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign6->tgl_pernikahan }}">
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
                                            placeholder="" disabled value="{{ $informasiDesign6->nama_pasangan }}">
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
                                            placeholder="" disabled value="{{ $informasiDesign6->nama_pasangan }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="tgl_pernikahan">Tanggal Pernikahan<span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="tgl_pernikahan" name="tgl_pernikahan"
                                            placeholder="" disabled
                                            value="{{ \Carbon\Carbon::parse($informasiDesign6->tgl_pernikahan)->format('d-m-Y') }}">
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
                                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnPerjalananCinta"
                                    data-bs-toggle="modal" data-bs-target="#modalPerjalananCinta">
                                    Tambah Cerita
                            </div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center" id="tablePerjalananCinta">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = $dataPerjalananCinta->firstItem(); ?>
                                        @foreach ($dataPerjalananCinta as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><img class="img-thumbnail" src="{{ Storage::url($item->image) }}"
                                                        alt="Image 1" width="120"></td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-warning mb-2 rounded edit-btn-perjalanan-cinta"
                                                        data-id="{{ $item->id }}"
                                                        data-image="{{ Storage::url($item->image) }}">
                                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                                    </a>

                                                    <button type="button"
                                                        class="btn btn-danger delete-btn-perjalanan-cinta rounded mb-2"
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
                                        <label for="link_streaming">Link Streaming<span class="fst-italic">
                                                (Opsional)</span></label>
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
                                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnDirectTransfer"
                                    data-bs-toggle="modal" data-bs-target="#modalDirectTransfer">
                                    Tambah Data
                                </button>
                            </div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center">
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
                                                        data-no_rek="{{ $item->no_rek }}"
                                                        data-nama_rek="{{ $item->nama_rek }}">
                                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                                    </a>
                                                    <button class="btn btn-danger delete-btn-direct-transfer rounded mb-2"
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
                                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnKirimHadiah"
                                    data-bs-toggle="modal" data-bs-target="#modalKirimHadiah">
                                    Tambah Data
                                </button>
                            </div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center">
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
                                                <td>{{ $item->deskripsi_alamat }}</td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-warning mb-2 rounded edit-btn-kirim-hadiah"
                                                        data-id="{{ $item->id }}" data-alamat="{{ $item->alamat }}"
                                                        data-deskripsi_alamat="{{ $item->deskripsi_alamat }}">
                                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                                    </a>
                                                    <button class="btn btn-danger delete-btn-kirim-hadiah rounded mb-2"
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
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>

    <!-- Modal Buat dan Edit Perjalanan Cinta -->
    <div class="modal fade" id="modalPerjalananCinta" tabindex="-1" aria-labelledby="modalPerjalananCintaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Judul yang bisa berubah -->
                    <h5 class="modal-title" id="modalPerjalananCintaLabel">Buat Perjalanan Cinta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formPerjalananCinta"
                        action="{{ route('perjalanancinta-design6.store', ['id' => $informasiDesign6->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="perjalananCintaId" id="perjalananCintaId">
                        <input type="hidden" name="wedding_design6_id" value="{{ $informasiDesign6->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign6->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign6->tgl_pernikahan }}">

                        <div class="form-group mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="image">Foto<span class="mandatory">*</span></label>
                                <button type="button" class="btn btn-tertiary">+ Tambah Foto</button>
                            </div>
                            <input type="file" name="image" id="image" class="form-control">
                            <img id="currentimage" class="img-thumbnail mt-2" src="" alt="Current Image"
                                width="120" style="display: none;">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="formPerjalananCinta">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Buat dan Edit DirectTransfer -->
    <div class="modal fade" id="modalDirectTransfer" tabindex="-1" aria-labelledby="modalDirectTransferLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDirectTransferLabel">Buat/Edit Direct Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formDirectTransfer"
                        action="{{ route('directtransfer-design6.store', ['id' => $informasiDesign6->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethodDirectTransfer" value="POST">
                        <input type="hidden" name="directTransferId" id="directTransferId">
                        <input type="hidden" name="wedding_design6_id" value="{{ $informasiDesign6->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign6->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign6->tgl_pernikahan }}">

                        <!-- Form Fields -->
                        <div class="form-group mb-2">
                            <label for="bank">Bank<span class="mandatory">*</span></label>
                            <input type="text" name="bank" id="bank" class="form-control"
                                value="{{ old('bank') }}" placeholder="Masukkan nama bank">
                        </div>

                        <div class="form-group mb-2">
                            <label for="no_rek">No.Rekening<span class="mandatory">*</span></label>
                            <input type="number" name="no_rek" id="no_rek" class="form-control"
                                value="{{ old('no_rek') }}" placeholder="161293912">
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama_rek">Pemilik Rekening<span class="mandatory">*</span></label>
                            <input type="text" name="nama_rek" id="nama_rek" class="form-control"
                                value="{{ old('nama_rek') }}" placeholder="Masukkan nama pemilik rekening">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="formDirectTransfer">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Buat dan Edit Kirim Hadiah -->
    <div class="modal fade" id="modalKirimHadiah" tabindex="-1" aria-labelledby="modalKirimHadiahLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKirimHadiahLabel">Buat/Edit Kirim Hadiah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formKirimHadiah"
                        action="{{ route('kirimhadiah-design6.store', ['id' => $informasiDesign6->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- This will be updated dynamically in JS --}}
                        <input type="hidden" name="_method" id="formMethodKirimHadiah" value="POST">
                        <input type="hidden" name="kirimHadiahId" id="kirimHadiahId">
                        <input type="hidden" name="wedding_design6_id" value="{{ $informasiDesign6->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign6->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign6->tgl_pernikahan }}">

                        <div class="form-group mb-2">
                            <label for="alamat">Alamat<span class="mandatory">*</span></label>
                            <input type="text" name="alamat" id="alamat" class="form-control"
                                value="{{ old('alamat') }}" placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group mb-2">
                            <label for="deskripsi_alamat">Alamat Detail<span class="mandatory">*</span></label>
                            <textarea class="form-control" rows="10" id="deskripsi_alamat" name="deskripsi_alamat"
                                placeholder="Masukkan alamat detail">{{ old('deskripsi_alamat') }}</textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="formKirimHadiah">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hidden form for delete -->
    <form id="deleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>


    <!-- Modal JS Perjalanan Cinta -->
    <script>
        // Ketika tombol "Tambah Cerita" diklik
        $('#btnPerjalananCinta').on('click', function() {
            $('#modalPerjalananCintaLabel').text('Buat Perjalanan Cinta');
            $('#formMethod').val('POST');
            $('#formPerjalananCinta').attr('action',
                '{{ route('perjalanancinta-design6.store', ['id' => $informasiDesign6->id]) }}');
            $('#formPerjalananCinta')[0].reset();
            $('#perjalananCintaId').val('');
            $('#currentimage').hide().attr('src', '');
        });

        // Ketika tombol Edit diklik
        $(document).on('click', '.edit-btn-perjalanan-cinta', function() {
            const id = $(this).data('id');
            const imageUrl = $(this).data('image');

            $('#modalPerjalananCintaLabel').text('Edit Perjalanan Cinta');
            $('#perjalananCintaId').val(id);
            $('#formMethod').val('PUT');
            $('#currentimage').attr('src', imageUrl).show();

            const updateUrl = `/wedding-design6/${id}/update-perjalanan-cinta`;
            $('#formPerjalananCinta').attr('action', updateUrl);

            const modalEdit = new bootstrap.Modal(document.getElementById('modalPerjalananCinta'));
            modalEdit.show();
        });

        // Submit form (tambah/edit)
        $('#formPerjalananCinta').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = new FormData(this);
            const id = $('#perjalananCintaId').val();
            const isEdit = id !== '';

            if (isEdit) {
                formData.append('_method', 'PUT');
            }

            $.ajax({
                url: form.attr('action'),
                type: 'POST', // tetap POST meski update (karena kita override pakai _method)
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    Swal.fire('Sukses!', res.message, 'success');
                    const modal = bootstrap.Modal.getInstance(document.getElementById(
                        'modalPerjalananCinta'));
                    modal.hide();

                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('#formPerjalananCinta')[0].reset();
                    $('#perjalananCintaId').val('');
                    $('#currentimage').hide().attr('src', '');

                    $('#tablePerjalananCinta').load(location.href + " #tablePerjalananCinta>*", "");
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors;
                    let errorMsg = 'Terjadi kesalahan.';
                    if (errors) {
                        errorMsg = Object.values(errors).join('<br>');
                    }
                    Swal.fire('Gagal!', errorMsg, 'error');
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.delete-btn-perjalanan-cinta', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/wedding-design6') }}/" + id + "/delete-perjalanan-cinta",
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            Swal.fire('Terhapus!', res.message, 'success');
                            $('#tablePerjalananCinta').load(location.href +
                                " #tablePerjalananCinta>*", "");
                        },
                        error: function(xhr) {
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus.', 'error');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>


    <!-- Modal JS Direct Transfer -->
    <script>
        document.getElementById('btnDirectTransfer').addEventListener('click', function() {
            // Reset the form for new entries
            document.getElementById('formDirectTransfer').reset();
            document.getElementById('directTransferId').value = ''; // Reset hidden field for ID
            document.getElementById('formMethodDirectTransfer').value = 'POST'; // Set method for creating

            // Set the action to the store route
            document.getElementById('formDirectTransfer').action =
                "{{ route('directtransfer-design6.store', ['id' => $informasiDesign6->id]) }}";
            document.getElementById('modalDirectTransferLabel').textContent = 'Tambah Direct Transfer';
        });

        document.querySelectorAll('.edit-btn-direct-transfer').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var bank = this.getAttribute('data-bank');
                var no_rek = this.getAttribute('data-no_rek');
                var nama_rek = this.getAttribute('data-nama_rek');

                // Populate form with existing data
                document.getElementById('directTransferId').value = id;
                document.getElementById('bank').value = bank;
                document.getElementById('no_rek').value = no_rek;
                document.getElementById('nama_rek').value = nama_rek;

                // Set the form action to the update route
                document.getElementById('formDirectTransfer').action =
                    `/wedding-design6/${id}/update-direct-transfer`;
                document.getElementById('formMethodDirectTransfer').value =
                    'PUT'; // Set method for updating
                document.getElementById('modalDirectTransferLabel').textContent = 'Edit Direct Transfer';

                // Show the modal
                var modal = new bootstrap.Modal(document.getElementById('modalDirectTransfer'));
                modal.show();
            });
        });
    </script>



    <!-- Modal JS Kirim Hadiah -->
    <script>
        document.getElementById('btnKirimHadiah').addEventListener('click', function() {
            // Reset the form for new entries
            document.getElementById('formKirimHadiah').reset();
            document.getElementById('kirimHadiahId').value = ''; // Reset hidden field for ID
            document.getElementById('formMethod').value = 'POST'; // Set method for creating

            // Set the action to the store route
            document.getElementById('formKirimHadiah').action =
                "{{ route('kirimhadiah-design6.store', ['id' => $informasiDesign6->id]) }}";
            document.getElementById('modalKirimHadiahLabel').textContent = 'Tambah Kirim Hadiah';
        });

        document.querySelectorAll('.edit-btn-kirim-hadiah').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var alamat = this.getAttribute('data-alamat');
                var deskripsi_alamat = this.getAttribute('data-deskripsi_alamat');

                // Populate form with existing data
                document.getElementById('kirimHadiahId').value = id; // Set ID
                document.getElementById('alamat').value = alamat;
                document.getElementById('deskripsi_alamat').value = deskripsi_alamat;

                // Set the form action to the update route
                document.getElementById('formKirimHadiah').action =
                    `/wedding-design6/${id}/update-kirim-hadiah`;
                document.getElementById('formMethodKirimHadiah').value = 'PUT'; // Set method for updating
                document.getElementById('modalKirimHadiahLabel').textContent = 'Edit Kirim Hadiah';

                // Show the modal
                var modal = new bootstrap.Modal(document.getElementById('modalKirimHadiah'));
                modal.show();
            });
        });
    </script>


    <script>
        document.querySelectorAll('.delete-btn-perjalanan-cinta, .delete-btn-kirim-hadiah, .delete-btn-direct-transfer')
            .forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var itemId = this.getAttribute('data-id');
                    var type;

                    // Determine the type based on the button class
                    if (this.classList.contains('delete-btn-perjalanan-cinta')) {
                        type = "perjalanan-cinta";
                    } else if (this.classList.contains('delete-btn-kirim-hadiah')) {
                        type = "kirim-hadiah";
                    } else if (this.classList.contains('delete-btn-direct-transfer')) {
                        type = "direct-transfer";
                    }

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Set the form action to the delete URL
                            var deleteForm = document.getElementById('deleteForm');
                            deleteForm.action = "/wedding-design6/" + itemId + "/" + type + "/delete";

                            // Submit the form
                            deleteForm.submit();
                        }
                    });
                });
            });
    </script>
@endsection
@section('scripts')
@endsection
