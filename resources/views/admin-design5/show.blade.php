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
                        action="{{ route('form-design5.update', ['informasiDesign5Id' => $data->informasi_design5_id, 'id' => $data->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="informasi_design5_id" value="{{ $informasiDesign5->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign5->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign5->tgl_pernikahan }}">
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Cover Undangan</div>
                            <div class="form-group form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="banner_img">Upload Foto<span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="banner_img" name="banner_img"
                                            placeholder="Rhoma Irama" value="{{ old('banner_img') }}" disabled>
                                        @if ($data->banner_img)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->banner_img) }}" alt="Foto Banner Image"
                                                    class="img-thumbnail mt-2" width="150" disabled>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_pasangan">Nama Couple<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
                                            placeholder="" disabled value="{{ $informasiDesign5->nama_pasangan }}">
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
                                            value="{{ old('foto_prewedding') }}" disabled>
                                        @if ($data->foto_prewedding)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->foto_prewedding) }}" alt="Foto Prewedding"
                                                    class="img-thumbnail mt-2" width="150" disabled>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_pasangan">Nama Couple<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan"
                                            placeholder="" disabled value="{{ $informasiDesign5->nama_pasangan }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="tgl_pernikahan">Tanggal Pernikahan<span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="tgl_pernikahan" name="tgl_pernikahan"
                                            placeholder="" disabled
                                            value="{{ \Carbon\Carbon::parse($informasiDesign5->tgl_pernikahan)->format('d-m-Y') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="music">Music <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="music" name="music"
                                            accept=".mp3" value="{{ old('music') }}" disabled>
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
                                            name="foto_mempelai_perempuan" placeholder="" disabled>
                                        @if ($data->foto_mempelai_perempuan)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->foto_mempelai_perempuan) }} "
                                                    alt="Foto Mempelai Perempuan" class="img-thumbnail mt-2"
                                                    width="150" disabled>
                                            </div>
                                        @endif
                                        <!-- Input file tidak memiliki value -->
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_mempelai_perempuan">Nama Mempelai Perempuan <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_mempelai_perempuan"
                                            name="nama_mempelai_perempuan" placeholder="Masukan nama mempelai perempuan"
                                            value="{{ $data->nama_mempelai_perempuan }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putri_dari_bpk">Putri dari Bapak <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putri_dari_bpk"
                                            name="putri_dari_bpk" placeholder="Putri dari bapak"
                                            value="{{ $data->putri_dari_bpk }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putri_dari_ibu">Putri dari Ibu <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putri_dari_ibu"
                                            name="putri_dari_ibu" placeholder="Putri dari ibu"
                                            value="{{ $data->putri_dari_ibu }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_instagram1">Nama Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_instagram1"
                                            name="nama_instagram1" placeholder="Masukkan nama instagram"
                                            value="{{ $data->nama_instagram1 }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_instagram1">Link Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_instagram1"
                                            name="link_instagram1" placeholder="Masukkan link instagram"
                                            value="{{ $data->link_instagram1 }}" disabled>
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
                                            name="foto_mempelai_laki" placeholder="" disabled>
                                        @if ($data->foto_mempelai_laki)
                                            <div class="d-flex flex-column mt-2">
                                                <span>Gambar saat ini:</span>
                                                <img src="{{ Storage::url($data->foto_mempelai_laki) }}"
                                                    alt="Foto Mempelai Laki" class="img-thumbnail mt-2" width="150"
                                                    disabled>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_mempelai_laki">Nama Mempelai Laki <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_mempelai_laki"
                                            name="nama_mempelai_laki" placeholder="Masukan nama mempelai laki-laki"
                                            value="{{ $data->nama_mempelai_laki }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putra_dari_bpk">Putra dari Bapak <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putra_dari_bpk"
                                            name="putra_dari_bpk" placeholder="Putra dari bapak"
                                            value="{{ $data->putra_dari_bpk }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="putra_dari_ibu">Putra dari Ibu <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="putra_dari_ibu"
                                            name="putra_dari_ibu" placeholder="Putra dari ibu"
                                            value="{{ $data->putra_dari_ibu }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama_instagram2">Nama Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama_instagram2"
                                            name="nama_instagram2" placeholder="Masukkan nama instagram"
                                            value="{{ $data->nama_instagram2 }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_instagram2">Link Instagram <span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_instagram2"
                                            name="link_instagram2" placeholder="Masukkan link instagram"
                                            value="{{ $data->link_instagram2 }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Perjalanan Cinta</div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center">
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
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Moment</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="quote">Quoted <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="quote" name="quote"
                                            placeholder="Masukkan Quote" value="{{ $data->quote }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="quote_img">Upload Images <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="quote_img" name="quote_img[]"
                                            multiple disabled>
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
                                            placeholder="" value="{{ old('akad_img') }}" disabled>
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
                                            value="{{ $data->tgl_akad }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="mulai_akad">Mulai Akad <span class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="mulai_akad" name="mulai_akad"
                                            value="{{ date('H:i', strtotime($data->mulai_akad)) }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="selesai_akad">Selesai Akad <span class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="selesai_akad" name="selesai_akad"
                                            value="{{ date('H:i', strtotime($data->selesai_akad)) }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="lokasi_akad">Lokasi<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="lokasi_akad" name="lokasi_akad"
                                            placeholder="Masukkan lokasi" value="{{ $data->lokasi_akad }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="deskripsi_akad">Detail<span class="mandatory">*</span></label>
                                        <textarea class="form-control" rows="5" id="deskripsi_akad" name="deskripsi_akad"
                                            placeholder="Masukan alamat" disabled>{{ $data->deskripsi_akad }}</textarea>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_akad">Lokasi Gmaps<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_akad" name="link_akad"
                                            placeholder="Masukkan link gmaps" value="{{ $data->link_akad }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="simpan_tgl_akad">Simpan Tanggal<span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="simpan_tgl_akad"
                                            name="simpan_tgl_akad" placeholder="Masukkan link"
                                            value="{{ $data->simpan_tgl_akad }}" disabled>
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
                                            value="{{ $data->tgl_resepsi }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="mulai_resepsi">Mulai Resepsi <span class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="mulai_resepsi"
                                            name="mulai_resepsi"
                                            value="{{ date('H:i', strtotime($data->mulai_resepsi)) }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="selesai_resepsi">Selesai Resepsi <span
                                                class="mandatory">*</span></label>
                                        <input type="time" class="form-control" id="selesai_resepsi"
                                            name="selesai_resepsi"
                                            value="{{ date('H:i', strtotime($data->selesai_resepsi)) }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="lokasi_resepsi">Lokasi<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="lokasi_resepsi"
                                            name="lokasi_resepsi" placeholder="Masukkan lokasi"
                                            value="{{ $data->lokasi_resepsi }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="deskripsi_resepsi">Detail<span class="mandatory">*</span></label>
                                        <textarea class="form-control" rows="5" id="deskripsi_resepsi" name="deskripsi_resepsi"
                                            placeholder="Masukan alamat" disabled>{{ $data->deskripsi_resepsi }}</textarea>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_resepsi">Lokasi Gmaps<span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="link_resepsi" name="link_resepsi"
                                            placeholder="Masukkan link gmaps" value="{{ $data->link_resepsi }}" disabled>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="simpan_tgl_resepsi">Simpan Tanggal<span
                                                class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="simpan_tgl_resepsi"
                                            name="simpan_tgl_resepsi" placeholder="Masukkan link"
                                            value="{{ $data->simpan_tgl_resepsi }}" disabled>
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
                                            value="{{ $data->link_streaming }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Direct Transfer</div>

                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Bank</th>
                                            <th>No.Rekening</th>
                                            <th>Pemilik Rekening</th>
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

                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body container bg-white">
                            <div class="mempelai fw-bold fs-5 mb-4">Kirim Hadiah</div>

                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Alamat</th>
                                            <th>Alamat Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = $dataKirimHadiah->firstItem(); ?>
                                        @foreach ($dataKirimHadiah as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->deskripsi_alamat }}</td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </form>
                    <table class="table table-bordered">
                        <h6>Daftar Tamu Undangan</h6>
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
                    <!-- Small boxes (Stat box) -->
                    <!-- /.row (main row) -->
                    <div class="d-flex flex-row-reverse">
                        <a href="{{ route('wedding-design5.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
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
                    <h5 class="modal-title" id="modalPerjalananCintaLabel">Buat/Edit Direct Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formPerjalananCinta"
                        action="{{ route('perjalanancinta-design5.store', ['id' => $informasiDesign5->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="perjalananCintaId" id="perjalananCintaId">
                        <input type="hidden" name="wedding_design5_id" value="{{ $informasiDesign5->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign5->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign5->tgl_pernikahan }}">

                        <div class="form-group mb-2">
                            <label for="image1">Image<span class="mandatory">*</span></label>
                            <input type="file" name="image1" id="image1" class="form-control">
                            <!-- Current Image Preview -->
                            <img id="currentImage1" class="img-thumbnail mt-2" src="" alt="Current Image 1"
                                width="120" style="display: none;">
                        </div>

                        <div class="form-group mb-2">
                            <label for="image2">Foto<span class="mandatory">*</span></label>
                            <input type="file" name="image2" id="image2" class="form-control">
                            <!-- Current Image Preview -->
                            <img id="currentImage2" class="img-thumbnail mt-2" src="" alt="Current Image 2"
                                width="120" style="display: none;">
                        </div>

                        <div class="form-group mb-2">
                            <label for="tanggal">Tanggal<span class="mandatory">*</span></label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ old('tanggal') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="judul_cerita">Judul Cerita<span class="mandatory">*</span></label>
                            <input type="text" name="judul_cerita" id="judul_cerita" class="form-control"
                                value="{{ old('judul_cerita') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="deskripsi">Detail<span class="mandatory">*</span></label>
                            <textarea class="form-control" rows="10" id="deskripsi" name="deskripsi" placeholder="Masukkan isi deskripsi">{{ old('deskripsi') }}</textarea>
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
                        action="{{ route('directtransfer-design5.store', ['id' => $informasiDesign5->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- This will be updated dynamically in JS --}}
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="directTransferId" id="directTransferId">
                        <input type="hidden" name="wedding_design5_id" value="{{ $informasiDesign5->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign5->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign5->tgl_pernikahan }}">

                        <div class="form-group mb-2">
                            <label for="bank">Bank<span class="mandatory">*</span></label>
                            <input type="text" name="bank" id="bank" class="form-control"
                                value="{{ old('bank') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="no_rek">No.Rekening<span class="mandatory">*</span></label>
                            <input type="number" name="no_rek" id="no_rek" class="form-control"
                                value="{{ old('no_rek') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama_rek">Pemilik Rekening<span class="mandatory">*</span></label>
                            <input type="text" name="nama_rek" id="nama_rek" class="form-control"
                                value="{{ old('nama_rek') }}">
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
                    <h5 class="modal-title" id="modalKirimHadiahLabel">Buat/Edit Direct Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formKirimHadiah"
                        action="{{ route('kirimhadiah-design5.store', ['id' => $informasiDesign5->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- This will be updated dynamically in JS --}}
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="kirimHadiahId" id="kirimHadiahId">
                        <input type="hidden" name="wedding_design5_id" value="{{ $informasiDesign5->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $informasiDesign5->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $informasiDesign5->tgl_pernikahan }}">

                        <div class="form-group mb-2">
                            <label for="bank">Bank<span class="mandatory">*</span></label>
                            <input type="text" name="bank" id="bank" class="form-control"
                                value="{{ old('bank') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="no_rek">No.Rekening<span class="mandatory">*</span></label>
                            <input type="number" name="no_rek" id="no_rek" class="form-control"
                                value="{{ old('no_rek') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama_rek">Pemilik Rekening<span class="mandatory">*</span></label>
                            <input type="text" name="nama_rek" id="nama_rek" class="form-control"
                                value="{{ old('nama_rek') }}">
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
        document.getElementById('btnPerjalananCinta').addEventListener('click', function() {
            // Reset the form for new entries
            document.getElementById('formPerjalananCinta').reset();
            document.getElementById('perjalananCintaId').value = ''; // Reset hidden field for ID
            document.getElementById('formMethod').value = 'POST'; // Set method for creating

            // Set the action to the store route
            document.getElementById('formPerjalananCinta').action =
                "{{ route('perjalanancinta-design5.store', ['id' => $informasiDesign5->id]) }}";
            document.getElementById('modalPerjalananCintaLabel').textContent = 'Tambah Cerita';
        });

        document.querySelectorAll('.edit-btn-perjalanan-cinta').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var tanggal = this.getAttribute('data-tanggal');
                var judul_cerita = this.getAttribute('data-judul');
                var deskripsi = this.getAttribute('data-deskripsi');
                var image1 = this.getAttribute('data-image1'); // Add this line
                var image2 = this.getAttribute('data-image2'); // Add this line

                // Populate form with existing data
                document.getElementById('perjalananCintaId').value = id; // Set ID
                document.getElementById('tanggal').value = tanggal;
                document.getElementById('judul_cerita').value = judul_cerita;
                document.getElementById('deskripsi').value = deskripsi;

                // Set the image previews
                var currentImage1 = document.getElementById('currentImage1');
                var currentImage2 = document.getElementById('currentImage2');

                currentImage1.src = image1; // Set current image src
                currentImage1.style.display = image1 ? 'block' : 'none'; // Show if image exists
                currentImage2.src = image2; // Set current image src
                currentImage2.style.display = image2 ? 'block' : 'none'; // Show if image exists

                // Set the form action to the update route
                document.getElementById('formPerjalananCinta').action =
                    `/wedding-design5/${id}/update-perjalanan-cinta`;
                document.getElementById('formMethod').value = 'PUT'; // Set method for updating
                document.getElementById('modalPerjalananCintaLabel').textContent = 'Edit Cerita';

                // Show the modal
                var modal = new bootstrap.Modal(document.getElementById('modalPerjalananCinta'));
                modal.show();
            });
        });
    </script>

    <!-- Modal JS Direct Transfer -->
    <script>
        document.getElementById('btnDirectTransfer').addEventListener('click', function() {
            // Reset the form for new entries
            document.getElementById('formDirectTransfer').reset();
            document.getElementById('directTransferId').value = ''; // Reset hidden field for ID
            document.getElementById('formMethod').value = 'POST'; // Set method for creating

            // Set the action to the store route
            document.getElementById('formDirectTransfer').action =
                "{{ route('directtransfer-design5.store', ['id' => $informasiDesign5->id]) }}";
            document.getElementById('modalDirectTransferLabel').textContent = 'Tambah Direct Transfer';
        });

        document.querySelectorAll('.edit-btn-direct-transfer').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var bank = this.getAttribute('data-bank');
                var no_rek = this.getAttribute('data-no_rek');
                var nama_rek = this.getAttribute('data-nama_rek');

                // Populate form with existing data
                document.getElementById('directTransferId').value = id; // Set ID
                document.getElementById('bank').value = bank;
                document.getElementById('no_rek').value = no_rek;
                document.getElementById('nama_rek').value = nama_rek;

                // Set the form action to the update route
                document.getElementById('formDirectTransfer').action =
                    `/wedding-design5/${id}/update-direct-transfer`;
                document.getElementById('formMethod').value = 'PUT'; // Set method for updating
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
                "{{ route('kirimhadiah-design5.store', ['id' => $informasiDesign5->id]) }}";
            document.getElementById('modalKirimHadiahLabel').textContent = 'Tambah Kirim Hadiah';
        });

        document.querySelectorAll('.edit-btn-kirim-hadiah').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var bank = this.getAttribute('data-bank');
                var no_rek = this.getAttribute('data-no_rek');
                var nama_rek = this.getAttribute('data-nama_rek');

                // Populate form with existing data
                document.getElementById('kirimHadiahId').value = id; // Set ID
                document.getElementById('bank').value = bank;
                document.getElementById('no_rek').value = no_rek;
                document.getElementById('nama_rek').value = nama_rek;

                // Set the form action to the update route
                document.getElementById('formKirimHadiah').action =
                    `/wedding-design5/${id}/update-kirim-hadiah`;
                document.getElementById('formMethod').value = 'PUT'; // Set method for updating
                document.getElementById('modalKirimHadiahLabel').textContent = 'Edit Direct Transfer';

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
                            deleteForm.action = "/wedding-design5/" + itemId + "/" + type + "/delete";

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
