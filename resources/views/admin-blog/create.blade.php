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
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />
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
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
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
        ImageResize, // Add ImageResize for resizing images
        Table,
        TableToolbar,
        MediaEmbed,
        Clipboard,
        Strikethrough,
        Underline,
        Subscript,
        Superscript,
        CodeBlock,
        Heading,
        BlockQuote,
        Highlight,
        HorizontalLine,
        SpecialCharacters,
        Indent,
        IndentBlock,
        RemoveFormat,
        Autoformat,
        FindAndReplace,
    } from 'ckeditor5';

    ClassicEditor
        .create(document.querySelector('#deskripsi'), {
            plugins: [
                Essentials, Paragraph, Bold, Italic, Font, Alignment,
                Link, List, Image, ImageToolbar, ImageUpload, 
                ImageResize, // Enable ImageResize
                Table, TableToolbar, MediaEmbed, Clipboard,
                Strikethrough, Underline, Subscript, Superscript,
                CodeBlock, Heading, BlockQuote, Highlight,
                HorizontalLine, SpecialCharacters, Indent, IndentBlock,
                RemoveFormat, Autoformat, FindAndReplace
            ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript',
                '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                'alignment:left', 'alignment:center', 'alignment:right', '|',
                'bulletedList', 'numberedList', '|',
                'link', 'imageUpload', 'insertTable', 'mediaEmbed', '|',
                'blockQuote', 'codeBlock', '|', 'highlight', 'heading', '|',
                'horizontalLine', 'specialCharacters', 'indent', 'outdent', '|',
                'removeFormat', 'findAndReplace'
            ],
            image: {
                toolbar: [
                    'imageTextAlternative', 'imageStyle:full', 'imageStyle:side', 'resizeImage'
                ],
                styles: [
                    'full', 'side'
                ],
                resizeOptions: [
                    {
                        name: 'resizeImage:original',
                        label: 'Original',
                        value: null
                    },
                    {
                        name: 'resizeImage:25',
                        label: '25%',
                        value: '25'
                    },
                    {
                        name: 'resizeImage:50',
                        label: '50%',
                        value: '50'
                    },
                    {
                        name: 'resizeImage:75',
                        label: '75%',
                        value: '75'
                    },
                    {
                        name: 'resizeImage:100',
                        label: '100%',
                        value: '100'
                    },
                    {
                        name: 'resizeImage:custom',  // Custom resize option
                        label: 'Custom',
                        value: 'custom' // This will be handled manually
                    },
                ],
                resizeUnit: 'px', // You can also use '%' for percentage-based resizing
            },
            mediaEmbed: {
                previewsInData: true
            }
        })
        .then(editor => {
            // Set up custom file upload adapter
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new MyUploadAdapter(loader);
            };

            // Add custom resizing logic
            editor.model.document.on('change:data', () => {
                const images = editor.model.document.getRoot().getChildren().filter(el => el.is('element', 'image'));

                for (let image of images) {
                    // If custom size option is selected, prompt the user to enter a custom size
                    if (image.getAttribute('resizeImage') === 'custom') {
                        const customSize = prompt('Enter custom size (in px or %):', '100px'); // Example prompt
                        
                        if (customSize) {
                            // Update the image width
                            editor.model.change(writer => {
                                writer.setAttribute('width', customSize, image);
                            });
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error(error);
        });

    // Custom Adapter for CKEditor file upload
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file
                .then(file => new Promise((resolve, reject) => {
                    const data = new FormData();
                    data.append('upload', file);

                    fetch('{{ route('ckeditor.upload') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: data
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result && result.url) {
                                resolve({
                                    default: result.url
                                });
                            } else {
                                reject(result.message || 'Upload failed');
                            }
                        })
                        .catch(error => {
                            reject('Upload failed');
                        });
                }));
        }

        abort() {
            // Logic to abort the upload process if necessary
        }
    }
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
