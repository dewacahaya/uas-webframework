<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1511164657592-59a452023479?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
        }

        .form-container {
            min-height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-card {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <div class="form-card">
            <h4 class="mb-4 fs-3 p-2 text-center fw-bold">Login Ke Dashboard</h4>
            <form method="POST" action="{{ route('login.proses') }}">
                @csrf
                <!-- Input Email -->
                <div class="mb-3 fw-semibold">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Masukkan Email">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>


                <!-- Input Password -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Masukkan Password">
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="btn btn-primary w-100 fs-5">Login</button>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Logout Berhasil',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
    @if (session('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '{{ session('failed') }}'
            });
        </script>
    @endif

</body>

</html>
