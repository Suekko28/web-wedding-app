@extends('layouts.app-user')

@section('navbar')
    <div class="container">
        <section class="blog-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-lg-6 col-md-6 col-12 align-content-center">
                    <h4 class="text-black">Bahwa Sumber dari Segala Kisah adalah Kasih</h4>
                    <span>Joko Pinurbo</span>
                </div>
                <div class="col-lg-6 col-md-6 col-12 blog-hero-img">
                </div>
            </div>
        </section>
        <section class="blog-view" id="blog-view">
            <div class="blog-cover">
                {{-- <h4 class="text-center mb-5">Blog</h4> --}}
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card-blog-custom">
                                <div class="card-blog-img">
                                    <!-- Wrap the image in an anchor tag to trigger the modal -->
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal"
                                        data-image="{{ asset('storage/seserahan/' . $item->image) }}">
                                        <img class="rounded-4 img-fluid"
                                            src="{{ asset('storage/seserahan/' . $item->image) }}" alt="Foto Seserahan"
                                            width="100%" height="100%">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Bootstrap Modal -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel">Gambar Seserahan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img id="modalImage" src="" alt="Seserahan" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="p-2">{{ $data->links() }}</div> --}}
                </div>
            </div>
            <div class="text-center mt-5">
                <a class="btn btn-custom-3" href="https://www.instagram.com/instagram" target="_blank">Lihat
                    Selengkapnya</a>
            </div>
        </section>

    </div>
    <section class="tanya-kami2 mt-5" id="tanya-kami2">
        <div class="container-custom">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-3 d-flex align-items-center">
                    <div class="card card-tanya-kami-custom-left">
                        <h4>Kami siap membantu kebutuhan anda</h4>
                        <div class="mb-3">
                            <!-- WhatsApp Button -->
                            <a href="https://wa.me/6281934060621" target="_blank">
                                <button type="button" class="btn btn-custom">Hubungi Kami</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="card card-tanya-kami-custom-right">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract image URL from the data-image attribute
            var imageUrl = button.getAttribute('data-image');
            // Find the image inside the modal and update its src attribute
            var modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
