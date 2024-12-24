<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- BOOTSTRAP --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FONTS --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    </style>

    {{-- CSS --}}
    <style></style>
    <title>Sri Ratih Collections</title>
</head>

<nav class="navbar navbar-expand-lg py-4" style="background-color: #001F54; color: white;">
    <div class="container">
        <!-- Nama Website -->
        <a class="navbar-brand text-white fw-bold" style="font-size: 30px" href="#">Sri Ratih Collection</a>

        <!-- Bagian Ikon -->
        <div class="d-flex align-items-center">
            <!-- Keranjang -->
            <div class="position-relative me-3">
                <a href="#" class="text-white">
                    <i class="bi bi-cart3" style="font-size: 1.5rem;"></i>
                </a>
                
            </div>

            <!-- Tas -->
            <a href="#" class="text-white me-3">
                <i class="bi bi-bag" style="font-size: 1.5rem;"></i>
            </a>

            <!-- Menu -->
            <a href="#" class="text-white">
                <i class="bi bi-list" style="font-size: 1.5rem;"></i>
            </a>
        </div>
    </div>
</nav>


<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('js')
</body>

<footer class="py-4" style="background-color: #6889B1; color: white; margin-top : 120px;">
    <div class="container text-center text-md-start">
        <!-- Nama dan Alamat -->
        <h5 class="fw-bold">Sri Ratih Collection</h5>
        <p class="mb-4">
            Jl. Yudistira No.10, Sukawati, Kec. Sukawati, Kabupaten Gianyar, Bali 80582
        </p>

        <!-- Ikon Media Sosial -->
        <div class="d-flex justify-content-center justify-content-md-start">
            <a href="#" class="text-white me-3" style="font-size: 1.5rem;">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="text-white me-3" style="font-size: 1.5rem;">
                <i class="bi bi-linkedin"></i>
            </a>
            <a href="#" class="text-white me-3" style="font-size: 1.5rem;">
                <i class="bi bi-youtube"></i>
            </a>
            <a href="#" class="text-white me-3" style="font-size: 1.5rem;">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
    </div>
</footer>


</html>
