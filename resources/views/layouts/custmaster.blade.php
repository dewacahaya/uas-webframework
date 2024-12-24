<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sri Ratih Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1; /* Membuat bagian konten fleksibel untuk mengisi ruang */
        }
        .header {
            background-color: #1D3557;
            color: white;
        }
        .header .logo {
            font-size: 20px;
            font-weight: bold;
        }
        .header input {
            max-width: 300px;
        }
        .footer {
            background-color: #457B9D;
            color: white;
            padding: 20px 0;
        }
        .footer p, .footer a {
            font-size: 14px;
            margin: 0;
            color: white;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="header py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">Sri Ratih Collection</div>
        <div class="d-flex align-items-center">
            <input type="text" class="form-control me-3" placeholder="Cari Barang...">
            <a href="#" class="text-white me-3"><i class="bi bi-cart"></i></a>
            <a href="#" class="text-white"><i class="bi bi-person-circle"></i></a>
        </div>
    </div>
</header>

<!-- Content -->
<div class="content">
    <div class="container my-5">
        @yield('content')
    </div>
</div>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <p>Sri Ratih Collection</p>
        <p>Jl. Yudistira No.16, Sukawati, Gianyar, Bali 80582</p>
        <p>
            <a href="#">Instagram</a> |
            <a href="#">Facebook</a> |
            <a href="#">WhatsApp</a>
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
