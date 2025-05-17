@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Wedding Design 10', 'subtitle' => 'Dashboard'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" id="btnBuatUndangan" data-bs-toggle="modal"
                data-bs-target="#modalBuatUndangan">
                + Buat Undangan
            </button>
            @include('layouts.message')
            <div class="search">
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                </div>
                <div id="noDataMessage" class="alert alert-warning" style="display: none;">
                    Data tidak ditemukan.
                </div>
            </div>
            <div class="table-responsive mb-6 border rounded-1">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr class="text-nowrap text-center">
                            <th>No</th>
                            <th>Id Wedding</th>
                            <th>Nama Pasangan</th>
                            <th>Tanggal Pernikahan</th>
                            <th>Konten Undangan</th>
                            <th>Tamu Undangan</th>
                            <th>Created Date</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem(); ?>
                        @foreach ($data as $item)
                            <tr class="text-center">
                                <td scope="row">{{ $i }}</td>
                                <td>{{ $item->id_weddingdesign10 }}</td>
                                <td>
                                    {{ $item->nama_pasangan }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl_pernikahan)->format('d-m-Y') }}
                                </td>
                                <td>
                                    @if ($item->KontenDesign10->isEmpty())
                                        <a class="btn btn-primary"
                                            href="{{ route('form-design10.create', ['id' => $item->id]) }}">Buat
                                            Konten</a>
                                    @else
                                        <a class="btn btn-secondary"
                                            href="{{ route('form-design10.edit', ['informasiDesign10Id' => $item->KontenDesign10->first()->informasi_design10_id, 'id' => $item->KontenDesign10->first()->id]) }}">
                                            Edit Konten
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->KontenDesign10->isNotEmpty())
                                        <a class="btn btn-primary"
                                            href="{{ route('nama-undangan-list10', ['weddingDesign10Id' => $item->KontenDesign10->first()->id]) }}"
                                            target="_blank">
                                            Buat Tamu
                                        </a>
                                    @else
                                        <a class="btn btn-primary disabled">
                                            Buat Tamu
                                        </a>
                                    @endif
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i A') }}
                                </td>
                                <td>
                                    <div class="btn-group-horizontal">
                                        <a href="javascript:void(0)" class="btn btn-warning mb-2 rounded edit-btn"
                                            data-id="{{ $item->id }}" data-nama-pasangan="{{ $item->nama_pasangan }}"
                                            data-tgl-pernikahan="{{ $item->tgl_pernikahan }}">
                                            <i class="fa fa-pen-to-square" style="color:white;"></i>
                                        </a>
                                        <button class="btn btn-danger delete-btn rounded mb-2"
                                            data-id="{{ $item->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="{{ $item->KontenDesign10->first() && $item->KontenDesign10->first()->id
                                            ? route('wedding-design10.show', ['wedding_design10' => $item->KontenDesign10->first()->id])
                                            : '#' }}"
                                            class="btn btn-info rounded mb-2 
                                          {{ !$item->KontenDesign10->first() || !$item->KontenDesign10->first()->nama_mempelai_laki || !$item->KontenDesign10->first()->nama_mempelai_perempuan ? 'disabled' : '' }}">
                                            <i class="fa fa-circle-info" style="color:white;"></i>
                                        </a>
                                        @php
                                            $isDisabled =
                                                !$item->KontenDesign10->first() ||
                                                !$item->slug_nama_pasangan ||
                                                !$item->id_weddingdesign10;

                                            // Ambil hanya angka belakang dari ID, misal: 0001
                                            $matches = [];
                                            preg_match('/WDDS10-\d{8}-(\d+)/', $item->id_weddingdesign10, $matches);
                                            $id_angka = $matches[1] ?? '0000'; // hanya 0001, tanpa WDDS10 prefix

                                            $slug_nama_pasangan = str_replace(' ', '-', $item->slug_nama_pasangan);
                                        @endphp
                                        <a class="btn btn-primary mb-2 {{ $isDisabled ? 'disabled' : '' }}"
                                            href="{{ $isDisabled
                                                ? '#'
                                                : route('wedding-design10-home-preview', [
                                                    'id_weddingdesign10' => $id_angka,
                                                    'slug_nama_pasangan' => $slug_nama_pasangan,
                                                ]) }}"
                                            target="_blank">
                                            <i class="fa fa-eye" style="color:white;"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-2">{{ $data->links() }}</div>

        </div>
    </div>

    <!-- Modal Buat dan Edit Undangan -->
    <div class="modal fade" id="modalBuatUndangan" tabindex="-1" aria-labelledby="modalBuatUndanganLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalBuatUndanganLabel">Buat/Edit Undangan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formBuatUndangan" action="{{ route('wedding-design10.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="undanganId">
                        <div class="form-group">
                            <label for="nama_pasangan">Nama Pasangan<span class="mandatory">*</span></label>
                            <input type="text" name="nama_pasangan" id="nama_pasangan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pernikahan">Tanggal Pernikahan<span class="mandatory">*</span></label>
                            <input type="date" name="tgl_pernikahan" id="tgl_pernikahan" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="formBuatUndangan">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Hidden form for delete -->
    <form id="deleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        // Event listener untuk tombol "Buat Undangan"
        document.getElementById('btnBuatUndangan').addEventListener('click', function() {
            // Reset form action ke route store dan kosongkan field input
            document.getElementById('formBuatUndangan').reset();
            document.getElementById('formBuatUndangan').action = "{{ route('wedding-design10.store') }}";

            // Ubah title modal jadi "Buat Undangan Baru"
            document.getElementById('modalBuatUndanganLabel').textContent = 'Buat Undangan Baru';
        });

        // Event listener untuk tombol edit
        document.querySelectorAll('.edit-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                var id = this.getAttribute('data-id');
                var nama_pasangan = this.getAttribute('data-nama-pasangan');
                var tgl_pernikahan = this.getAttribute('data-tgl-pernikahan');

                // Set form action untuk update
                document.getElementById('formBuatUndangan').action = '/wedding-design10/' + id + '/update';

                // Isi form dengan data dari tombol edit
                document.getElementById('undanganId').value = id;
                document.getElementById('nama_pasangan').value = nama_pasangan;
                document.getElementById('tgl_pernikahan').value = tgl_pernikahan;

                // Ubah title modal jadi "Edit Undangan"
                document.getElementById('modalBuatUndanganLabel').textContent = 'Edit Undangan';

                // Buka modal
                var modal = new bootstrap.Modal(document.getElementById('modalBuatUndangan'));
                modal.show();
            });
        });
    </script>



    <script>
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var itemId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#3096d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Set the action URL for the delete form
                        document.getElementById('deleteForm').action =
                            "{{ url('wedding-design10') }}/" + itemId;
                        // Submit the form
                        document.getElementById('deleteForm').submit();
                        Swal.fire({
                                title: 'Terhapus',
                                text: "Data berhasil dihapus",
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            }

                        );
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('.table tbody tr');
        const noDataMessage = document.getElementById('noDataMessage');

        searchInput.addEventListener('input', function() {
            const searchText = this.value.toLowerCase();
            let found = false;

            tableRows.forEach(function(row) {
                const rowData = row.innerText.toLowerCase();
                if (rowData.includes(searchText)) {
                    row.style.display = '';
                    found = true;
                } else {
                    row.style.display = 'none';
                }
            });

            noDataMessage.style.display = found ? 'none' : 'block';
        });
    </script>

@endsection

@section('scripts')
@endsection
