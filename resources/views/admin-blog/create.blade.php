@extends('layouts.master')

@section('title', 'JejakKebahagiaan')

@section('pageContent')
    <style>
        /* Increase the height and width of CKEditor */
        .ck-editor__editable {
            min-height: 400px;
            /* Adjust the height */
            width: 100%;
            /* Adjust the width */
        }
    </style>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
    @include('layouts.breadcrumb', ['title' => 'Create', 'subtitle' => 'Blog'])
    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body container bg-white mt-5">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Blog</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="image">Gambar <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="" value="{{ old('image') }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="judul">Judul <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            placeholder="Masukkan judul" value="{{ old('judul') }}">
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label for="deskripsi">Deskripsi <span class="mandatory">*</span></label>
                                        <textarea class="form-control" rows="10" id="deskripsi" name="deskripsi" placeholder="Masukkan isi deskripsi">{{ old('deskripsi') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('blog.index') }}" class="btn btn-secondary">Batal</a>
                            </div>

                        </div>

                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection

<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font,
        Alignment,
        Link,
        List,
        Image,
        ImageToolbar,
        ImageUpload,
        Table,
        TableToolbar,
        MediaEmbed,
        Clipboard // Clipboard plugin enabled
    } from 'ckeditor5';

    ClassicEditor
        .create(document.querySelector('#deskripsi'), {
            plugins: [
                Essentials, Paragraph, Bold, Italic, Font, Alignment,
                Link, List, Image, ImageToolbar, ImageUpload,
                Table, TableToolbar, MediaEmbed, Clipboard // Clipboard plugin enabled
            ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                'alignment:left', 'alignment:center', 'alignment:right', '|',
                'bulletedList', 'numberedList', '|',
                'link', 'imageUpload', 'insertTable', 'mediaEmbed', '|',
                'blockQuote'
            ],
            clipboard: {
                // Clipboard configuration (optional, but recommended for better handling of pasted content)
                removeFormatting: true, // Removes unwanted formatting from pasted content
                pastePlainTextOnly: false // Allows rich text pasting
            },
            image: {
                toolbar: [
                    'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn', 'tableRow', 'mergeTableCells'
                ]
            },
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>

<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
    window.onload = function() {
        if (window.location.protocol === 'file:') {
            alert('This sample requires an HTTP server. Please serve this file with a web server.');
        }
    };
</script>

@section('scripts')
@endsection
