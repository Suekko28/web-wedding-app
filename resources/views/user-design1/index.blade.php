@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/prismjs/themes/prism-okaidia.min.css') }}">
@endsection

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Dashboard', 'subtitle' => 'Home'])
    <!-- Row -->
   <main>
        <div class="container-xxl flex-grow-1 container-p-y">
            <a class="btn btn-primary mb-3" href="{{ route('nama-undangan-create', ['id' => $weddingDesign1->id]) }}">+
                Nama
                Undangan</a>
            @include('layouts.message')
            <!-- Responsive Table -->
            <div class="card">
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
                    <form id="deleteForm" action="{{ route('nama-undangan.destroy', ['id' => $weddingDesign1->id]) }}"
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
                                            <div class="btn-group-vertical">
                                                <a href="{{ url('nama-undangan/alt1/' . $item->id) . '/edit' }}"
                                                    class="btn btn-warning mb-2 rounded"><i class="fa fa-pen-to-square"
                                                        style="color:white;"></i></a>
                                                <button class="btn btn-danger delete-btn rounded mb-2"
                                                    nama_undangan-id="{{ $item->id }}"><i
                                                        class="fa fa-trash"></i></button>
                                                <a href="#exampleModal{{ $item->id }}"
                                                    class="btn btn-primary rounded mb-2" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $item->id }}">
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
                    @foreach ($nama_undangan as $item)
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item->id }}">Template
                                            Message</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="radio_group">
                                            <input type="radio" name="kehadiran" value="1"
                                                id="radio1{{ $item->id }}"
                                                data-nama-undangan="{{ $item->nama_undangan }}"
                                                data-item-id="{{ $item->id }}">
                                            <label for="radio1{{ $item->id }}" class="radio_label">1</label>

                                            <input type="radio" name="kehadiran" value="2"
                                                id="radio2{{ $item->id }}"
                                                data-nama-undangan="{{ $item->nama_undangan }}"
                                                data-item-id="{{ $item->id }}">
                                            <label for="radio2{{ $item->id }}" class="radio_label">2</label>

                                            <input type="radio" name="kehadiran" value="3"
                                                id="radio3{{ $item->id }}"
                                                data-nama-undangan="{{ $item->nama_undangan }}"
                                                data-item-id="{{ $item->id }}">
                                            <label for="radio3{{ $item->id }}" class="radio_label">3</label>
                                        </div>
                                        <textarea class="form-control mt-3" rows="20" id="nama_undangan{{ $item->id }}" name="nama_undangan"
                                            placeholder="Silahkan pilih template message terlebih dahulu" readonly></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#shareModal{{ $item->id }}"
                                            data-nama-undangan="{{ $item->nama_undangan }}"
                                            id="shareButton{{ $item->id }}" disabled>Share</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="p-2">{{ $nama_undangan->links() }}</div>
                </div>

                @foreach ($nama_undangan as $item)
                    <div class="modal fade" id="shareModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="shareModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="shareModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Isi modal -->
                                    <p>Content of your modal goes here...</p>
                                    <div>
                                        {{-- <button class="btn btn-primary"
                                            onclick="copyLink('{{ $item->id }}', '{{ $weddingDesign1->nama_mempelai_laki }}', '{{ $weddingDesign1->nama_mempelai_perempuan }}', '{{ $item->nama_undangan }}')">
                                            <i class="fas fa-copy"></i> Copy Link
                                        </button> --}}
                                        <a href="#" class="btn btn-primary" id="shareOptionWhatsApp"
                                            data-nama-undangan="{{ $item->nama_undangan }}"
                                            id="shareButton{{ $item->id }}" class="btn btn-primary"
                                            onclick="shareOnWhatsApp('{{ $item->nama_undangan }}', '{{ $item->id }}')">
                                            <i class="fab fa-whatsapp"></i> Share on WhatsApp
                                        </a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

    </main>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/js/widget/ui-card-init.js') }}"></script>
@endsection
