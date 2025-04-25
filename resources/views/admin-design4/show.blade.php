@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Show', 'subtitle' => 'Wedding Design 4'])

    @php
        $defaultDeskripsiPenutup = 'Thank You';
        $defaultJudulJadwal = 'Jadwal Pernikahan';
        $defaultJudulAkad = 'Akad';
        $defaultJudulResepsi = 'Resepsi';

    @endphp

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
                        <input disabled type="hidden" name="informasi_design4_id" value="{{ $informasiDesign4->id }}">
                        <input disabled type="hidden" name="nama_pasangan" value="{{ $informasiDesign4->nama_pasangan }}">
                        <input disabled type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign4->tgl_pernikahan }}">
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Cover Undangan</div>
                            <div class="form-group form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="banner_img">Upload Foto<span class="mandatory">*</span></label>
                                        <input disabled type="file" class="form-control" id="banner_img" name="banner_img"
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
                                        <input disabled type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
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
                                        <input disabled type="file" class="form-control" id="foto_prewedding"
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
                                        <input disabled type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
                                            placeholder="" disabled value="{{ $informasiDesign4->nama_pasangan }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="tgl_pernikahan">Tanggal Pernikahan<span
                                                class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="tgl_pernikahan" name="tgl_pernikahan"
                                            placeholder="" disabled
                                            value="{{ \Carbon\Carbon::parse($informasiDesign4->tgl_pernikahan)->format('d-m-Y') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="music">Music <span class="mandatory">*</span></label>
                                        <input disabled type="file" class="form-control" id="music" name="music"
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
                                                class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="file" class="form-control" id="foto_mempelai_perempuan"
                                            name="foto_mempelai_perempuan" placeholder="">
                                        @if ($data->foto_mempelai_perempuan)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->foto_mempelai_perempuan) }}"
                                                    alt="Foto Mempelai Perempuan" class="img-thumbnail mt-2"
                                                    width="150">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_mempelai_perempuan">Nama Mempelai Perempuan <span
                                                class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="nama_mempelai_perempuan"
                                            name="nama_mempelai_perempuan" placeholder="Masukan nama mempelai perempuan"
                                            value="{{ $data->nama_mempelai_perempuan }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putri_dari_bpk">Putri dari Bapak <span
                                                class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="putri_dari_bpk"
                                            name="putri_dari_bpk" placeholder="Putri dari bapak"
                                            value="{{ $data->putri_dari_bpk }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putri_dari_ibu">Putri dari Ibu <span
                                                class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="putri_dari_ibu"
                                            name="putri_dari_ibu" placeholder="Putri dari ibu"
                                            value="{{ $data->putri_dari_ibu }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_instagram1">Nama Instagram <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="text" class="form-control" id="nama_instagram1"
                                            name="nama_instagram1" placeholder="Masukkan nama instagram"
                                            value="{{ $data->nama_instagram1 }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_instagram1">Link Instagram <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="text" class="form-control" id="link_instagram1"
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
                                        <label for="foto_mempelai_laki">Foto Mempelai Laki <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="file" class="form-control" id="foto_mempelai_laki"
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
                                        <input disabled type="text" class="form-control" id="nama_mempelai_laki"
                                            name="nama_mempelai_laki" placeholder="Masukan nama mempelai laki-laki"
                                            value="{{ $data->nama_mempelai_laki }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putra_dari_bpk">Putra dari Bapak <span
                                                class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="putra_dari_bpk"
                                            name="putra_dari_bpk" placeholder="Putra dari bapak"
                                            value="{{ $data->putra_dari_bpk }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putra_dari_ibu">Putra dari Ibu <span
                                                class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="putra_dari_ibu"
                                            name="putra_dari_ibu" placeholder="Putra dari ibu"
                                            value="{{ $data->putra_dari_ibu }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_instagram2">Nama Instagram <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="text" class="form-control" id="nama_instagram2"
                                            name="nama_instagram2" placeholder="Masukkan nama instagram"
                                            value="{{ $data->nama_instagram2 }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_instagram2">Link Instagram <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="text" class="form-control" id="link_instagram2"
                                            name="link_instagram2" placeholder="Masukkan link instagram"
                                            value="{{ $data->link_instagram2 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Perjalanan Cinta</div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center" id="tablePerjalananCinta">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Tanggal</th>
                                            <th>Judul Cerita</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = $dataPerjalananCinta->firstItem(); ?>
                                        @foreach ($dataPerjalananCinta as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><img class="img-thumbnail" src="{{ Storage::url($item->image1) }}"
                                                        alt="Image 1" width="120"></td>
                                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                                <td>{{ $item->judul_cerita }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Moment</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="quote">Quoted <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="text" class="form-control" id="quote" name="quote"
                                            placeholder="Masukkan Quote" value="{{ $data->quote }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="quote_img">Upload Images <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="file" class="form-control" id="quote_img" name="quote_img[]"
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
                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Informasi Akad & Resepsi</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="judul_jadwal">Judul<span class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="judul_jadwal" name="judul_jadwal"
                                            placeholder="Judul ucapan pembuka"
                                            value="{{ old('judul', $data->judul_jadwal ?? $defaultJudulJadwal) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="akad_img">Upload Image <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="file" class="form-control" id="akad_img" name="akad_img"
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
                                        <label for="judul_akad">Judul Akad <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="text" class="form-control" id="judul_akad" name="judul_akad"
                                            value="{{ old('judul_akad', $data->judul_akad ?? $defaultJudulAkad) }}"
                                            placeholder="Masukkan judul akad">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="tgl_akad">Tanggal Akad <span class="mandatory">*</span></label>
                                        <input disabled type="date" class="form-control" id="tgl_akad" name="tgl_akad"
                                            value="{{ $data->tgl_akad }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="zona_waktu_akad">Zona Waktu <span class="mandatory">*</span></label>
                                        <select disabled class="form-control" name="zona_waktu_akad" id="zona_waktu_akad">
                                            <option value="0" disabled
                                                {{ $data->zona_waktu_akad == 0 ? 'select disableded' : '' }}>--Pilih Zona Waktu--
                                            </option>
                                            @foreach ($zonaWaktuOptions as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ $data->zona_waktu_akad == $key ? 'select disableded' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="mulai_akad">Mulai Akad <span class="mandatory">*</span></label>
                                        <input disabled type="time" class="form-control" id="mulai_akad" name="mulai_akad"
                                            value="{{ date('H:i', strtotime($data->mulai_akad)) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="selesai_akad">Selesai Akad <span class="mandatory">*</span></label>
                                        <input disabled type="time" class="form-control" id="selesai_akad" name="selesai_akad"
                                            value="{{ date('H:i', strtotime($data->selesai_akad)) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="lokasi_akad">Lokasi<span class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="lokasi_akad" name="lokasi_akad"
                                            placeholder="Masukkan lokasi" value="{{ $data->lokasi_akad }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="deskripsi_akad">Detail<span class="mandatory">*</span></label>
                                        <textarea disabled class="form-control" rows="5" id="deskripsi_akad" name="deskripsi_akad"
                                            placeholder="Masukan alamat">{{ $data->deskripsi_akad }}</textarea disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_akad">Lokasi Gmaps<span class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="link_akad" name="link_akad"
                                            placeholder="Masukkan link gmaps" value="{{ $data->link_akad }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="simpan_tgl_akad">Simpan Tanggal<span
                                                class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="simpan_tgl_akad"
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
                                        <label for="judul_resepsi">Judul Resepsi <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input disabled type="text" class="form-control" id="judul_resepsi"
                                            name="judul_resepsi"
                                            value="{{ old('judul_resepsi', $data->judul_resepsi ?? $defaultJudulResepsi) }}"
                                            placeholder="Masukkan judul resepsi">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="tgl_resepsi">Tanggal Resepsi<span class="mandatory">*</span></label>
                                        <input disabled type="date" class="form-control" id="tgl_resepsi" name="tgl_resepsi"
                                            value="{{ $data->tgl_resepsi }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="zona_waktu_resepsi">Zona Waktu <span
                                                class="mandatory">*</span></label>
                                        <select disabled class="form-control" name="zona_waktu_resepsi" id="zona_waktu_resepsi">
                                            <option value="0" disabled
                                                {{ $data->zona_waktu_resepsi == 0 ? 'select disableded' : '' }}>--Pilih Zona Waktu--
                                            </option>
                                            @foreach ($zonaWaktuOptions as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ $data->zona_waktu_resepsi == $key ? 'select disableded' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="mulai_resepsi">Mulai Resepsi <span class="mandatory">*</span></label>
                                        <input disabled type="time" class="form-control" id="mulai_resepsi"
                                            name="mulai_resepsi"
                                            value="{{ date('H:i', strtotime($data->mulai_resepsi)) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="selesai_resepsi">Selesai Resepsi <span
                                                class="mandatory">*</span></label>
                                        <input disabled type="time" class="form-control" id="selesai_resepsi"
                                            name="selesai_resepsi"
                                            value="{{ date('H:i', strtotime($data->selesai_resepsi)) }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="lokasi_resepsi">Lokasi<span class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="lokasi_resepsi"
                                            name="lokasi_resepsi" placeholder="Masukkan lokasi"
                                            value="{{ $data->lokasi_resepsi }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="deskripsi_resepsi">Detail<span class="mandatory">*</span></label>
                                        <textarea disabled class="form-control" rows="5" id="deskripsi_resepsi" name="deskripsi_resepsi"
                                            placeholder="Masukan alamat">{{ $data->deskripsi_resepsi }}</textarea disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_resepsi">Lokasi Gmaps<span class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="link_resepsi" name="link_resepsi"
                                            placeholder="Masukkan link gmaps" value="{{ $data->link_resepsi }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="simpan_tgl_resepsi">Simpan Tanggal<span
                                                class="mandatory">*</span></label>
                                        <input disabled type="text" class="form-control" id="simpan_tgl_resepsi"
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
                                        <input disabled type="text" class="form-control" id="link_streaming"
                                            name="link_streaming" placeholder="Masukkan link"
                                            value="{{ $data->link_streaming }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
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
                                                        class="btn btn-warning mb-2 rounded Show-btn-direct-transfer"
                                                        data-id="{{ $item->id }}" data-bank="{{ $item->bank }}"
                                                        data-no_rek="{{ $item->no_rek }}"
                                                        data-nama_rek="{{ $item->nama_rek }}">
                                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                                    </a>
                                                    <button type="button"
                                                        class="btn btn-danger delete-btn-direct-transfer rounded mb-2"
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
                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Kirim Hadiah</div>
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnKirimHadiah"
                                    data-bs-toggle="modal" data-bs-target="#modalKirimHadiah">
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
                                                        class="btn btn-warning mb-2 rounded Show-btn-kirim-hadiah"
                                                        data-id="{{ $item->id }}" data-alamat="{{ $item->alamat }}"
                                                        data-deskripsi_alamat="{{ $item->deskripsi_alamat }}">
                                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                                    </a>
                                                    <button type="button"
                                                        class="btn btn-danger delete-btn-kirim-hadiah rounded mb-2"
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
                        <hr>
                        <div class="card-body container bg-white">
                            <div class="ucapan-pembuka fw-bold fs-5 mb-4">Ucapan Penutup</div>
                            <div class="form-group form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="deskripsi_penutup">Deskripsi<span class="mandatory">*</span></label>
                                        <textarea disabled class="form-control" rows="5" id="deskripsi_penutup" name="deskripsi_penutup"
                                            placeholder="Deskripsi">{{ old('deskripsi_penutup', $data->deskripsi_penutup ?? $defaultDeskripsiPenutup) }}</textarea disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                            <a href="{{ route('wedding-design4.index') }}" class="btn btn-secondary">Batal</a>
                        </div>

                    </form>
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>

    <!-- Modal Buat dan Show Perjalanan Cinta -->
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
                        action="{{ route('perjalanancinta-design4.store', ['id' => $informasiDesign4->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input disabled type="hidden" name="_method" id="formMethodPerjalananCinta" value="POST">
                        <input disabled type="hidden" name="perjalananCintaId" id="perjalananCintaId">
                        <input disabled type="hidden" name="wedding_design4_id" value="{{ $informasiDesign4->id }}">
                        <input disabled type="hidden" name="nama_pasangan" value="{{ $informasiDesign4->nama_pasangan }}">
                        <input disabled type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign4->tgl_pernikahan }}">

                        <div class="form-group mb-2">
                            <label for="image1">Foto<span class="mandatory">*</span></label>
                            <input disabled type="file" name="image1" id="image1" class="form-control" accept="image/*">
                            <!-- Current Image Preview -->
                            <img id="currentImage1" class="img-thumbnail mt-2" src="" alt="Current Image 1"
                                width="120" style="display: none;">
                        </div>

                        <div class="form-group mb-2">
                            <label for="tanggal">Tanggal<span class="mandatory">*</span></label>
                            <input disabled type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ old('tanggal') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="judul_cerita">Judul Cerita<span class="mandatory">*</span></label>
                            <input disabled type="text" name="judul_cerita" id="judul_cerita" class="form-control"
                                value="{{ old('judul_cerita') }}" placeholder="Masukkan judul cerita">
                        </div>

                        <div class="form-group mb-2">
                            <label for="deskripsi">Detail<span class="mandatory">*</span></label>
                            <textarea disabled class="form-control" rows="10" id="deskripsi" name="deskripsi" placeholder="Masukkan isi deskripsi">{{ old('deskripsi') }}</textarea disabled>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="btnBatal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="formPerjalananCinta">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Buat dan Show DirectTransfer -->
    <div class="modal fade" id="modalDirectTransfer" tabindex="-1" aria-labelledby="modalDirectTransferLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDirectTransferLabel">Buat/Show Direct Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formDirectTransfer"
                        action="{{ route('directtransfer-design4.store', ['id' => $informasiDesign4->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input disabled type="hidden" name="_method" id="formMethodDirectTransfer" value="POST">
                        <input disabled type="hidden" name="directTransferId" id="directTransferId">
                        <input disabled type="hidden" name="wedding_design4_id" value="{{ $informasiDesign4->id }}">
                        <input disabled type="hidden" name="nama_pasangan" value="{{ $informasiDesign4->nama_pasangan }}">
                        <input disabled type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign4->tgl_pernikahan }}">

                        <!-- Form Fields -->
                        <div class="form-group mb-2">
                            <label for="bank">Bank<span class="mandatory">*</span></label>
                            <input disabled type="text" name="bank" id="bank" class="form-control"
                                value="{{ old('bank') }}" placeholder="Masukkan nama bank">
                        </div>

                        <div class="form-group mb-2">
                            <label for="no_rek">No.Rekening<span class="mandatory">*</span></label>
                            <input disabled type="number" name="no_rek" id="no_rek" class="form-control"
                                value="{{ old('no_rek') }}" placeholder="161293912">
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama_rek">Pemilik Rekening<span class="mandatory">*</span></label>
                            <input disabled type="text" name="nama_rek" id="nama_rek" class="form-control"
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

    <!-- Modal Buat dan Show Kirim Hadiah -->
    <div class="modal fade" id="modalKirimHadiah" tabindex="-1" aria-labelledby="modalKirimHadiahLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKirimHadiahLabel">Buat/Show Kirim Hadiah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formKirimHadiah"
                        action="{{ route('kirimhadiah-design4.store', ['id' => $informasiDesign4->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- This will be updated dynamically in JS --}}
                        <input disabled type="hidden" name="_method" id="formMethodKirimHadiah" value="POST">
                        <input disabled type="hidden" name="kirimHadiahId" id="kirimHadiahId">
                        <input disabled type="hidden" name="wedding_design4_id" value="{{ $informasiDesign4->id }}">
                        <input disabled type="hidden" name="nama_pasangan" value="{{ $informasiDesign4->nama_pasangan }}">
                        <input disabled type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign4->tgl_pernikahan }}">

                        <div class="form-group mb-2">
                            <label for="alamat">Alamat<span class="mandatory">*</span></label>
                            <input disabled type="text" name="alamat" id="alamat" class="form-control"
                                value="{{ old('alamat') }}" placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group mb-2">
                            <label for="deskripsi_alamat">Alamat Detail<span class="mandatory">*</span></label>
                            <textarea disabled class="form-control" rows="10" id="deskripsi_alamat" name="deskripsi_alamat"
                                placeholder="Masukkan alamat detail">{{ old('deskripsi_alamat') }}</textarea disabled>
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

    <!-- Modal JS Perjalanan Cinta -->
    <script>
        function resetFormPerjalananCinta() {
            $('#formPerjalananCinta')[0].reset();
            $('#formMethodPerjalananCinta').val('POST');
            $('#perjalananCintaId').val('');
            $('#currentImage1').hide().attr('src', '');
        }

        $('#btnPerjalananCinta').on('click', function() {
            $('#modalPerjalananCintaLabel').text('Buat Perjalanan Cinta');
            $('#formPerjalananCinta').attr('action',
                '{{ route('perjalanancinta-design4.store', ['id' => $informasiDesign4->id]) }}');
            resetFormPerjalananCinta();
        });

        $(document).on('click', '.Show-btn-perjalanan-cinta', function() {
            const id = $(this).data('id');
            const tanggal = $(this).data('tanggal');
            const judul = $(this).data('judul');
            const deskripsi = $(this).data('deskripsi');
            const imageUrl = $(this).data('image1');

            $('#modalPerjalananCintaLabel').text('Show Perjalanan Cinta');
            $('#perjalananCintaId').val(id);
            $('#formMethodPerjalananCinta').val('PUT');
            $('#tanggal').val(tanggal);
            $('#judul_cerita').val(judul);
            $('#deskripsi').val(deskripsi);

            if (imageUrl) {
                $('#currentImage1').attr('src', imageUrl).show();
            } else {
                $('#currentImage1').hide();
            }

            const updateUrl = `/wedding-design4/${id}/update-perjalanan-cinta`;
            $('#formPerjalananCinta').attr('action', updateUrl);

            new bootstrap.Modal(document.getElementById('modalPerjalananCinta')).show();
        });

        $('#formPerjalananCinta').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const id = $('#perjalananCintaId').val();
            const isShow = id !== '';

            if (isShow) {
                formData.append('_method', 'PUT');
            }

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    Swal.fire('Sukses!', res.message, 'success');

                    bootstrap.Modal.getInstance(document.getElementById('modalPerjalananCinta')).hide();
                    resetFormPerjalananCinta();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('#formDirectTransfer')[0].reset();
                    $('#directTransferId').val('');
                    $('#tablePerjalananCinta').load(location.href + " #tablePerjalananCinta>*", "");
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON?.errors;
                    const errorMsg = errors ? Object.values(errors).join('<br>') : 'Terjadi kesalahan.';
                    Swal.fire('Gagal!', errorMsg, 'error');
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.delete-btn-perjalanan-cinta', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Data ini akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/wedding-design4/${id}/delete-perjalanan-cinta`,
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

        $('#btnBatal').on('click', function() {
            resetFormPerjalananCinta();
        });
    </script>

    <!-- Modal JS Direct Transfer -->
    <script>
        // Function Reset Form
        function resetFormDirectTransfer() {
            $('#formDirectTransfer')[0].reset(); // reset semua input disabled
            $('#directTransferId').val('');
        }
        // Ketika tombol "Tambah Cerita" diklik
        $('#btnDirectTransfer').on('click', function() {
            $('#modalDirectTransferLabel').text('Buat Direct Transfer');
            $('#formMethodDirectTransfer').val('POST');
            $('#formDirectTransfer').attr('action',
                '{{ route('directtransfer-design4.store', ['id' => $informasiDesign4->id]) }}');
            $('#formDirectTransfer')[0].reset();
            $('#directTransferId').val('');

            resetFormDirectTransfer();
        });

        // Ketika tombol Show diklik
        $(document).on('click', '.Show-btn-direct-transfer', function() {
            const id = $(this).data('id');
            const bank = $(this).data('bank');
            const no_rek = $(this).data('no_rek');
            const nama_rek = $(this).data('nama_rek');

            $('#modalDirectTransferLabel').text('Show Direct Transfer');
            $('#formMethodDirectTransferDirectTransfer').val('PUT'); // ini hidden input disabled _method
            $('#directTransferId').val(id);

            // Set nilai ke input disabled form
            $('#bank').val(bank);
            $('#no_rek').val(no_rek);
            $('#nama_rek').val(nama_rek);

            const updateUrl = `/wedding-design4/${id}/update-direct-transfer`;
            $('#formDirectTransfer').attr('action', updateUrl);

            const modalShow = new bootstrap.Modal(document.getElementById('modalDirectTransfer'));
            modalShow.show();
        });

        // Submit form (tambah/Show)
        $('#formDirectTransfer').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = new FormData(this);
            const id = $('#directTransferId').val();
            const isShow = id !== '';

            if (isShow) {
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
                        'modalDirectTransfer'));
                    modal.hide();

                    resetFormDirectTransfer();

                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('#formDirectTransfer')[0].reset();
                    $('#directTransferId').val('');

                    $('#tableDirectTransfer').load(location.href + " #tableDirectTransfer>*", "");
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

        $(document).on('click', '.delete-btn-direct-transfer', function() {
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
                        url: "{{ url('/wedding-design4') }}/" + id + "/delete-direct-transfer",
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            Swal.fire('Terhapus!', res.message, 'success');
                            $('#tableDirectTransfer').load(location.href +
                                " #tableDirectTransfer>*", "");
                        },
                        error: function(xhr) {
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus.', 'error');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });


        $('#btnBatal').on('click', function() {
            resetFormDirectTransfer();
        });
    </script>


    <!-- Modal JS Kirim Hadiah -->
    <script>
        // Function Reset Form
        function resetFormKirimHadiah() {
            $('#formKirimHadiah')[0].reset(); // reset semua input disabled
            $('#kirimHadiahId').val('');
        }
        // Ketika tombol "Tambah Cerita" diklik
        $('#btnKirimHadiah').on('click', function() {
            $('#modalKirimHadiahLabel').text('Buat Direct Transfer');
            $('#formMethodKirimHadiah').val('POST');
            $('#formKirimHadiah').attr('action',
                '{{ route('kirimhadiah-design4.store', ['id' => $informasiDesign4->id]) }}');
            $('#formKirimHadiah')[0].reset();
            $('#kirimHadiahId').val('');

            resetFormKirimHadiah();
        });

        // Ketika tombol Show diklik
        $(document).on('click', '.Show-btn-kirim-hadiah', function() {
            const id = $(this).data('id');
            const alamat = $(this).data('alamat');
            const deskripsi_alamat = $(this).data('deskripsi_alamat');

            $('#modalKirimHadiahLabel').text('Show Direct Transfer');
            $('#formMethodKirimHadiahKirimHadiah').val('PUT'); // ini hidden input disabled _method
            $('#kirimHadiahId').val(id);

            // Set nilai ke input disabled form
            $('#alamat').val(alamat);
            $('#deskripsi_alamat').val(deskripsi_alamat);

            const updateUrl = `/wedding-design4/${id}/update-kirim-hadiah`;
            $('#formKirimHadiah').attr('action', updateUrl);

            const modalShow = new bootstrap.Modal(document.getElementById('modalKirimHadiah'));
            modalShow.show();
        });

        // Submit form (tambah/Show)
        $('#formKirimHadiah').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = new FormData(this);
            const id = $('#kirimHadiahId').val();
            const isShow = id !== '';

            if (isShow) {
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
                        'modalKirimHadiah'));
                    modal.hide();

                    resetFormKirimHadiah();

                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('#formKirimHadiah')[0].reset();
                    $('#KirimHadiahId').val('');

                    $('#tableKirimHadiah').load(location.href + " #tableKirimHadiah>*", "");
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

        $(document).on('click', '.delete-btn-kirim-hadiah', function() {
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
                        url: "{{ url('/wedding-design4') }}/" + id + "/delete-kirim-hadiah",
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            Swal.fire('Terhapus!', res.message, 'success');
                            $('#tableKirimHadiah').load(location.href +
                                " #tableKirimHadiah>*", "");
                        },
                        error: function(xhr) {
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus.', 'error');
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });


        $('#btnBatal').on('click', function() {
            resetFormKirimHadiah();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
@section('scripts')
@endsection
