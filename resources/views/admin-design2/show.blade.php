@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Wedding Design 2', 'subtitle' => 'Dashboard'])

    <section class="content">
        <div class="container-fluid">
            @include('layouts.message')
            <div class="card">
                <div class="card-body">
                <form action="{{ url('undangan-alternative2', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body container bg-white mt-5">
                        <div class="mempelai text-center fw-bold fs-5">Mempelai</div>
                        <div class="fs-3">
                            <div class="form-group mb-3">
                                <label for="foto_mempelai_laki">Foto Mempelai Laki <span class="mandatory">*</span></label>
                                <div class="img-fluid">
                                    <img src="{{ Storage::url('' . $data->foto_mempelai_laki) }}" alt="Foto Mempelai Laki"
                                        class="img-fluid" width="200" height="200">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_mempelai_laki">Nama Mempelai Laki <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="nama_mempelai_laki" name="nama_mempelai_laki"
                                    placeholder="Masukan nama mempelai laki-laki" value="{{ $data->nama_mempelai_laki }}"
                                    disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="putra_dari_bpk">Putra dari Bapak <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="putra_dari_bpk" name="putra_dari_bpk"
                                    placeholder="Putra dari bapak" value="{{ $data->putra_dari_bpk }}" disabled>
                            </div>

                            <div class="form-group mb-3">
                                <label for="putra_dari_ibu">Putra dari Ibu <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="putra_dari_ibu" name="putra_dari_ibu"
                                    placeholder="Putra dari ibu" value="{{ $data->putra_dari_ibu }}" disabled>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nama_instagram1">Nama Instagram <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="nama_instagram1" name="nama_instagram1"
                                    placeholder="Masukkan nama instagram" value="{{ $data->nama_instagram1 }}" disabled>
                            </div>

                            <div class="form-group mb-3">
                                <label for="link_instagram1">Link Instagram <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="link_instagram1" name="link_instagram1"
                                    placeholder="Masukkan link instagram"value="{{ $data->link_instagram1 }}" disabled>
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
                                <input type="text" class="form-control" id="nama_mempelai_perempuan"
                                    name="nama_mempelai_perempuan" placeholder="Masukan nama mempelai perempuan"
                                    value="{{ $data->nama_mempelai_perempuan }}" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="putri_dari_bpk">Putri dari Bapak <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="putri_dari_bpk" name="putri_dari_bpk"
                                    placeholder="Putri dari bapak" value="{{ $data->putri_dari_bpk }}" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="putri_dari_ibu">Putri dari Ibu <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="putri_dari_ibu" name="putri_dari_ibu"
                                    placeholder="Putri dari ibu" value="{{ $data->putri_dari_ibu }}" disabled>
                            </div>

                            <div class="form-group mb-3">
                                <label for="nama_instagram2">Nama Instagram <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="nama_instagram2" name="nama_instagram2"
                                    placeholder="Masukkan nama instagram" value="{{ $data->nama_instagram2 }}" disabled>
                            </div>

                            <div class="form-group mb-3">
                                <label for="link_instagram2">Link Instagram <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="link_instagram2" name="link_instagram2"
                                    placeholder="Masukkan link instagram" value="{{ $data->link_instagram2 }}" disabled>
                            </div>

                        </div>
                    </div>

                    <div class="card-body container bg-white mt-5">
                        <div class="mempelai text-center fw-bold fs-5">Akad</div>
                        <div class="fs-3">
                            <div class="form-group mb-3">
                                <label for="tgl_akad">Tanggal Akad <span class="mandatory">*</span></label>
                                <input type="date" class="form-control" id="tgl_akad" name="tgl_akad"
                                    placeholder="" value="{{ $data->tgl_akad }}" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="mulai_akad">Mulai Akad <span class="mandatory">*</span></label>
                                <input type="time" class="form-control" id="mulai_akad" name="mulai_akad"
                                    placeholder="" value="{{ $data->mulai_akad }}" disabled>
                            </div>

                            <div class="form-group mb-3">
                                <label for="alamat_akad">Alamat Akad <span class="mandatory">*</span></label>
                                <textarea class="form-control" rows="5" id="alamat_akad" name="alamat_akad" placeholder="Masukan alamat akad"
                                    disabled>{{ $data->alamat_akad }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tgl_resepsi">Tanggal Resepsi <span class="mandatory">*</span></label>
                                <input type="date" class="form-control" id="tgl_resepsi" name="tgl_resepsi"
                                    placeholder="" value="{{ $data->tgl_resepsi }}" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="mulai_resepsi">Mulai Resepsi <span class="mandatory">*</span></label>
                                <input type="time" class="form-control" id="mulai_resepsi" name="mulai_resepsi"
                                    placeholder="" value="{{ $data->mulai_resepsi }}" disabled>
                            </div>


                            <div class="form-group mb-3">
                                <label for="alamat_resepsi">Alamat Resepsi <span class="mandatory">*</span></label>
                                <textarea class="form-control" rows="5" id="alamat_resepsi" name="alamat_resepsi"
                                    placeholder="Masukan alamat resepsi" disabled>{{ $data->alamat_resepsi }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="lokasi_gmaps">Lokasi Maps <span class="mandatory">*</span></label>
                                <input type="text" class="form-control" id="lokasi_gmaps" name="lokasi_gmaps"
                                    placeholder="Masukkan link alamat maps" value="{{ $data->lokasi_gmaps }}" disabled>
                            </div>
                        </div>
                </form>

                <table class="table table-bordered">
                    <h6>Daftar Tamu Undangan <a class="badge btn-primary"
                            href="{{ route('nama-undangan-list2', ['id' => $data]) }}" target="_blank"
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
                    <a href="{{ route('wedding-design2.index') }}" class="btn btn-secondary ">Kembali</a>
                </div>
            </div>
        </div>
    </div>

        </div>
    </section>
@endsection

@section('scripts')
@endsection
