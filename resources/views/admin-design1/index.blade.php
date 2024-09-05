@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Wedding Design 1', 'subtitle' => 'Dashboard'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Basic Table</h4>
        </div>
        <div class="card-body p-4">
            <a class="btn btn-primary mb-3" href="{{ url('wedding-design1/create') }}">+ Buat Undangan</a>
            @include('layouts.message')
            <div class="search">
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                </div>
                <div id="noDataMessage" class="alert alert-warning" style="display: none;">
                    Data tidak ditemukan.
                </div>
            </div>
            <div class="table-responsive mb-4 border rounded-1">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">No</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Mempelai</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Tanggal Pernikahan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem(); ?>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $i }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 fw-normal fs-4">{{ $item->nama_mempelaki_laki_laki }} &
                                        {{ $item->nama_mempelai_perempuan }}
                                    </p>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl_akad)->format('d-m-Y') }}
                                </td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <a href="{{ url('undangan-alternative1/' . $item->id) . '/edit' }}"
                                            class="btn btn-warning mb-2 rounded"><i class="fa fa-pen-to-square"
                                                style="color:white;"></i></a>
                                        <button class="btn btn-danger delete-btn rounded mb-2"
                                            data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                        <a href="{{ route('undangan-alternative1-view', ['id' => $item->id]) }}"
                                            class="btn btn-info rounded mb-2">
                                            <i class="fa fa-eye" style="color:white;"></i>
                                        </a>
                                        {{-- <a href="{{ route('undangan-alt1-home', [
                                            'nama_mempelai_laki' => $item->nama_mempelai_laki,
                                            'nama_mempelai_perempuan' => $item->nama_mempelai_perempuan,
                                        ]) }}"
                                            target="_blank" class="btn btn-primary rounded mb-2">
                                            <i class="fa fa-link" style="color:white;"></i>
                                        </a> --}}
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Fungsi untuk menangani pemilihan semua checkbox
        //     document.getElementById('selectAll').addEventListener('change', function() {
        //         var checkboxes = document.querySelectorAll('.delete-checkbox');
        //         checkboxes.forEach(function(checkbox) {
        //             checkbox.checked = document.getElementById('selectAll').checked;
        //         });
        //     });

        // // Menangani klik pada tombol delete
        // var deleteButtons = document.querySelectorAll('.delete-btn');
        // deleteButtons.forEach(function(button) {
        //     button.addEventListener('click', function(event) {
        //         event.preventDefault();
        //         var itemId = this.getAttribute('data-id');
        //         Swal.fire({
        //             title: "Are you sure?",
        //             text: "You won't be able to revert this!",
        //             icon: "warning",
        //             showCancelButton: true,
        //             confirmButtonColor: "#3085d6",
        //             cancelButtonColor: "#d33",
        //             confirmButtonText: "Yes, delete it!"
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 document.getElementById('deleteForm').action =
        //                     "{{ url('undangan-alternative1') }}/" + itemId;
        //                 document.getElementById('deleteForm').submit();
        //                 Swal.fire(
        //                     'Deleted',
        //                     'Your file has been deleted',
        //                     'success'
        //                 )
        //             }
        //         });
        //     });
        // });

        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var itemId = this.getAttribute('data-id');
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
                        document.getElementById('deleteForm').action =
                            "{{ url('undangan-alternative1') }}/" + itemId;
                        document.getElementById('deleteForm').submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    }
                });
            });
        });

        // Menangani pencarian
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

            if (!found) {
                noDataMessage.style.display = 'block';
            } else {
                noDataMessage.style.display = 'none';
            }
        });

        // // Menangani penghapusan saat tombol "Hapus yang Dipilih" ditekan
        // document.getElementById('deleteSelected').addEventListener('click', function(event) {
        // event.preventDefault();

        // // Cek apakah ada setidaknya satu checkbox yang dicentang
        // var anyChecked = false;
        // var checkboxes = document.querySelectorAll('.delete-checkbox');
        // checkboxes.forEach(function(checkbox) {
        //     if (checkbox.checked) {
        //         anyChecked = true;
        //     }
        // });

        // if (anyChecked) {
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: "You won't be able to revert this!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Yes, delete it!"
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // Di sini kamu bisa menambahkan logika untuk penghapusan multiple
        //             // Lakukan pengiriman form di sini
        //             document.getElementById('deleteForm').submit();
        //             Swal.fire(
        //                 'Deleted',
        //                 'Your file has been deleted',
        //                 'success'
        //             )
        //         }
        //     });
        // } else {
        //     Swal.fire(
        //         'No checkbox selected',
        //         'Please select at least one item to delete',
        //         'error'
        //     );
        // }
        // });
    </script>
@endsection

@section('scripts')
@endsection
