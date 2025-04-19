@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/prismjs/themes/prism-okaidia.min.css') }}">
@endsection

@section('pageContent')

    <style>
        .manual-backdrop {
            display: none;
            /* Secara default tidak ditampilkan */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 1);
            /* Warna dan transparansi backdrop */
            z-index: -1;
            /* Pastikan backdrop berada di belakang modal */
        }

        .modal-body,
        .modal-header {
            color: #000;
            /* Atur warna teks menjadi hitam atau warna yang lebih kontras */
        }

        .modal {
            z-index: 1050;
            /* Setel z-index agar modal berada di atas elemen lainnya */
        }

        .modal-backdrop {
            z-index: 1040;
            /* Pastikan backdrop berada tepat di belakang modal */
        }

        .modal-backdrop.show,
        .modal-backdrop.fade {
            display: none;
        }
    </style>

    {{-- @include('layouts.breadcrumb', ['title' => 'Nama Undangan', 'subtitle' => 'Dashboard'])
    <!-- Row --> --}}

    <main>
        <div class="container-xxl flex-grow-1 container-p-y">
            <a class="btn btn-primary mb-3"
                href="{{ route('nama-undangan-create8', [
                    'id' => $weddingDesign8->id, // This is the weddingDesign8 ID (e.g., 2)
                ]) }}">
                + Nama Undangan
            </a>

            @include('layouts.message')
            <!-- Responsive Table -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header">List Nama Undangan</h5>
                    <div class="p-3">
                        <div class="mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                        </div>
                        <div id="noDataMessage" class="alert alert-warning" style="display: none;">
                            Nama Undangan tidak ditemukan.
                        </div>
                    </div>

                    <div class="table-responsive text-nowrap p-3">
                        <form id="deleteForm" action="{{ route('nama-undangan.destroy8', ['id' => $weddingDesign8->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <table class="table table-bordered">
                                {{-- <button type="submit" class="btn btn-danger mb-3" id="deleteSelected">Hapus yang
                                Dipilih</button> --}}
                                <thead>
                                    <tr class="text-nowrap text-center">
                                        {{-- <th><input type="checkbox" id="selectAll"></th> --}}
                                        <th>No</th>
                                        <th>Nama Undangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = $nama_undangan->firstItem(); ?>
                                    @foreach ($nama_undangan as $item)
                                        <tr class="text-center">
                                            {{-- <td><input type="checkbox" class="delete-checkbox" name="selected[]"
                                                value="{{ $item->id }}"></td> --}}
                                            <td scope="row">{{ $i }}</td>
                                            <td scope="row">{{ $item->nama_undangan }}</td>
                                            <td>
                                                <div class="btn-group-horizontal">
                                                    <a href="{{ url('nama-undangan/premium-green/' . $item->id) . '/edit' }}"
                                                        class="btn btn-warning mb-2 rounded"><i class="fa fa-pen-to-square"
                                                            style="color:white;"></i></a>
                                                    <button class="btn btn-danger delete-btn rounded mb-2"
                                                        nama_undangan-id="{{ $item->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                    <a href="#exampleModalToggle{{ $item->id }}"
                                                        class="btn btn-primary rounded mb-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalToggle{{ $item->id }}">
                                                        <i class="fa fa-link" style="color:white;"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>


                        <div class="p-2">{{ $nama_undangan->links() }}</div>
                    </div>


                </div>
            </div>

            @foreach ($nama_undangan as $item)
                <div class="modal fade manual-backdrop" id="exampleModalToggle{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalToggleLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{ $item->id }}">
                                    Template
                                    Message</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="radio_group">
                                    <input type="radio" name="kehadiran" value="1" id="radio1{{ $item->id }}"
                                        data-nama-undangan="{{ $item->nama_undangan }}"
                                        data-item-id="{{ $item->id }}">
                                    <label for="radio1{{ $item->id }}" class="radio_label">1</label>

                                    <input type="radio" name="kehadiran" value="2" id="radio2{{ $item->id }}"
                                        data-nama-undangan="{{ $item->nama_undangan }}"
                                        data-item-id="{{ $item->id }}">
                                    <label for="radio2{{ $item->id }}" class="radio_label">2</label>

                                    <input type="radio" name="kehadiran" value="3" id="radio3{{ $item->id }}"
                                        data-nama-undangan="{{ $item->nama_undangan }}"
                                        data-item-id="{{ $item->id }}">
                                    <label for="radio3{{ $item->id }}" class="radio_label">3</label>
                                </div>
                                <textarea class="form-control mt-3" rows="20" id="nama_undangan{{ $item->id }}" name="nama_undangan"
                                    placeholder="Silahkan pilih template message terlebih dahulu" readonly></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggleToggle2{{ $item->id }}"
                                    data-nama-undangan="{{ $item->nama_undangan }}" id="shareButton{{ $item->id }}"
                                    disabled>Share</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($nama_undangan as $item)
                <div class="modal fade manual-backdrop" id="exampleModalToggleToggle2{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalToggleToggle2Label{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleToggle2Label">Share Link</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a href="#" class="btn btn-primary" id="shareOptionWhatsApp"
                                    data-nama-undangan="{{ $item->nama_undangan }}" id="shareButton{{ $item->id }}"
                                    onclick="shareOnWhatsApp('{{ $item->nama_undangan }}', '{{ $item->id }}')">
                                    <i class="fab fa-whatsapp"></i> Share on WhatsApp
                                </a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


    </main>

    <script>
        document.querySelectorAll('input[name="kehadiran"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                var radioButton = this.value;
                var namaUndangan = this.getAttribute('data-nama-undangan');
                var itemId = this.getAttribute('data-item-id');

                updateMessage(radioButton, namaUndangan, itemId);
                toggleShareButton(itemId); // Panggil fungsi untuk menyesuaikan status tombol "Share"
            });
        });

        function toggleShareButton(itemId) {
            var shareButton = document.getElementById('shareButton' + itemId);
            var selectedRadio = document.querySelector('input[name="kehadiran"]:checked');
            if (selectedRadio) {
                shareButton.removeAttribute('disabled');
            } else {
                shareButton.setAttribute('disabled', 'disabled');
            }
        }

        function updateMessage(radioButton, namaUndangan, itemId) {
            var message = '';
            if (radioButton === '1') {
                message = "Assalamu'alaikum Wr. Wb\n" +
                    "Bismillahirahmanirrahim\n" +
                    "Yth. " + namaUndangan + ",\n\n" +
                    "Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami:\n\n" +
                    namaUndangan + "\n\n" +
                    "Berikut link undangan kami untuk informasi lengkap tentang acara dapat dilihat di sini:\n\n" +
                    "jejakkebahagiaan.com/{{ $weddingDesign8->nama_mempelai_laki }}&{{ $weddingDesign8->nama_mempelai_perempuan }}/untukmu=" +
                    namaUndangan + "\n\n" +
                    "Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\n" +
                    "Mohon maaf perihal undangan hanya dibagikan melalui pesan ini. Terima kasih banyak atas perhatiannya.\n\n" +
                    "\n\n" +
                    "Terima Kasih.";
            } else if (radioButton === '2') {
                message = "Shalom\n" +
                    "Yth. " + namaUndangan + ",\n\n" +
                    "Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami:\n\n" +
                    namaUndangan + "\n\n" +
                    "Berikut link undangan kami untuk informasi lengkap tentang acara dapat dilihat di sini:\n\n" +
                    "jejakkebahagiaan.com/{{ $weddingDesign8->nama_mempelai_laki }}&{{ $weddingDesign8->nama_mempelai_perempuan }}/untukmu=" +
                    namaUndangan + "\n\n" +
                    "Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\n" +
                    "Mohon maaf perihal undangan hanya dibagikan melalui pesan ini. Terima kasih banyak atas perhatiannya.\n\n" +
                    "\n\n" +
                    "Terima Kasih.";
            } else if (radioButton === '3') {
                message =
                    "Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i Aldi untuk menghadiri acara kami.\n\n" +
                    "Berikut link undangan kami, untuk info lengkap dari acara bisa kunjungi :\n\n" +
                    "jejakkebahagiaan.com/{{ $weddingDesign8->nama_mempelai_laki }}&{{ $weddingDesign8->nama_mempelai_perempuan }}/untukmu=" +
                    namaUndangan + "\n\n" +
                    "Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.\n\n" +
                    "Mohon maaf perihal undangan hanya di bagikan melalui pesan ini.\n\n" +
                    "Dan agar selalu menjaga kesehatan bersama serta datang pada waktu yang telah ditentukan.*\n\n" +
                    "Terima kasih banyak atas perhatiannya.";
            }

            document.getElementById('nama_undangan' + itemId).value = message;
        }

        function shareOnWhatsApp(namaUndangan, itemId) {
            var message = document.getElementById('nama_undangan' + itemId).value;
            var encodedMessage = encodeURIComponent(message);
            var whatsappLink = "https://wa.me/?text=" + encodedMessage;
            window.open(whatsappLink, '_blank');
        }



        // Fitur Delete by id menggunakan swal 
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var itemId = this.getAttribute(
                    'nama_undangan-id'); // Corrected the attribute to 'nama_undangan-id'
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#3088d8",
                    cancelButtonColor: "#d33",
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Replace the delete form action with the correct route and ID
                        document.getElementById('deleteForm').action =
                            "{{ route('nama-undangan.destroy8', ['id' => ':id']) }}".replace(':id',
                                itemId);
                        document.getElementById('deleteForm').submit();
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil dihapus.',
                            'success'
                        );
                    }
                });
            });
        });


        // Fitur Search
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
    </script>

@endsection

{{-- @section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/js/widget/ui-card-init.js') }}"></script>
@endsection --}}
