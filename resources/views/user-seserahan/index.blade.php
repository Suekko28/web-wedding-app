@extends('layouts.app-user')

@section('navbar')
    <div class="container">
        <section class="blog-hero" id="blog-hero">
            <div class="d-flex flex-wrap">
                <div class="col-12 col-lg-6 align-content-center">
                    <h4 class="text-black">Bahwa Sumber dari Segala Kisah adalah Kasih</h4>
                    <span>Joko Pinurbo</span>
                </div>
                <div class="col-12 col-lg-6 blog-hero-img">
                    <img class="img-fluid" src="{{ asset('img/Banner_Seserahan.png') }}" alt="Foto Seserahan">
                </div>
            </div>
        </section>
        <section class="blog-view" id="blog-view">
            <div class="blog-cover">
                <h4 class="text-center mb-5">Portofolio Kami</h4>
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-sm-12 col-md-3">
                            <div class="card-produk-custom">
                                <img class="card-produk-img object-fit-cover"
                                    src="{{ asset('storage/seserahan/' . $item->image) }}" alt="Foto Seserahan"
                                    width="100%" height="100%" data-bs-toggle="modal" data-bs-target="#imageModal"
                                    data-image="{{ asset('storage/seserahan/' . $item->image) }}">
                            </div>
                        </div>
                    @endforeach

                    <!-- Bootstrap Modal -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img id="modalImage" src="" alt="Seserahan"
                                        class="img-fluid justify-content-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center d-flex justify-content-center mt-5 btn-portofolio">
                <a class="btn btn-secondary" href="https://www.instagram.com/kasihbyzr/" target="_blank">Lihat
                    Selengkapnya</a>
            </div>
        </section>

    </div>

    <!-- TANYA KAMI -->
    <section class="tanya-kami" id="tanya-kami">
        <div class="container-custom">
            <div class="title">
                <h4>Kami siap membantu kebutuhan anda</h4>
                <a href="https://wa.me/6281934060621" target="_blank" class="btn btn-primary">Hubungi Kami</a>
            </div>
            <img class="img" src="{{ asset('img/Contact-Us_JejakKebahagiaan.png') }}" alt="Seserahan">
        </div>
    </section>
    <!-- TANYA KAMI END -->

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
