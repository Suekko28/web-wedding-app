<!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/svg+xml" href="{{ asset('img/Jejak-Kebabagiaan_Favicon_32px.svg') }}">
<link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('build/css/styles.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>


<!-- Core Css -->
{{-- <script src="{{ URL::asset('build/css/styles.css') }}"></script> --}}
<!-- In your Blade template -->
@vite(['resources/scss/styles.scss'])
