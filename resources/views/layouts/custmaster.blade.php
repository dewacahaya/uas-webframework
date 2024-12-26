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

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-4" style="background-color: #001F54; color: white;">
        <div class="container">
            <!-- Nama Website -->
            <a class="navbar-brand text-white fw-bold" style="font-size: 30px" href="{{ route('customer.home') }}">Sri
                Ratih
                Collection</a>

            <!-- Bagian Ikon -->
            <div class="d-flex align-items-center">
                <!-- Keranjang -->
                <div class="position-relative me-3">
                    <a href="{{ route('customer.cart') }}" class="text-white">
                        <i class="bi bi-cart3" style="font-size: 1.5rem;"></i>
                    </a>
                </div>

                <!-- Tas -->
                <a href="{{ route('customer.orders') }}" class="text-white me-3">
                    <i class="bi bi-bag" style="font-size: 1.5rem;"></i>
                </a>

                {{-- DROPDOWN LOGIN/REGIS --}}
                <!-- Dropdown Trigger -->

                @if (Auth::guard('customers')->check())
                    <form method="POST" action="{{ route('customer.logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link"
                            style="display: inline; padding: 0; border: none; background: none;"> <i
                                class="bi bi-box-arrow-right" style="font-size: 1.8rem;"></i></button>
                    </form>
                @else
                    <a href="#" class="text-white me-3" data-bs-toggle="modal" data-bs-target="#authModal">
                        <i class="bi bi-list" style="font-size: 1.8rem;"></i>
                    </a>
                @endif

                <!-- filepath: /d:/INSTIKI/Semester 3/Web Framework/UAS/sri-ratih-collections/resources/views/layouts/custmaster.blade.php -->
                <!-- Modal Popup -->
                <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="authModalLabel">Login / Register</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs" id="authTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab"
                                            data-bs-target="#login" role="tab" aria-controls="login"
                                            aria-selected="true">Login</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="register-tab" data-bs-toggle="tab"
                                            data-bs-target="#register" role="tab" aria-controls="register"
                                            aria-selected="false">Register</button>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3 text-dark" id="authTabsContent">
                                    <!-- Login Form -->
                                    <div class="tab-pane fade show active" id="login" role="tabpanel"
                                        aria-labelledby="login-tab">
                                        <form method="POST" action="{{ route('customer.login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="login_email">Email</label>
                                                <input type="email" name="email" id="login_email"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="login_password">Password</label>
                                                <input type="password" name="password" id="login_password"
                                                    class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Login</button>
                                        </form>
                                    </div>
                                    <!-- Register Form -->
                                    <div class="tab-pane fade" id="register" role="tabpanel"
                                        aria-labelledby="register-tab">
                                        <form method="POST" action="{{ route('customer.register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="register_name">Name</label>
                                                <input type="text" name="name" id="register_name"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="register_email">Email</label>
                                                <input type="email" name="email" id="register_email"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="register_password">Password</label>
                                                <input type="password" name="password" id="register_password"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="register_password_confirmation">Confirm Password</label>
                                                <input type="password" name="password_confirmation"
                                                    id="register_password_confirmation" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="register_no_telp">No Telp</label>
                                                <input type="text" name="no_telp" id="register_no_telp"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="register_alamat">Alamat</label>
                                                <textarea name="alamat" id="register_alamat" class="form-control" rows="2" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success w-100">Register</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


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
