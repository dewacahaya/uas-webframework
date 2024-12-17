<!-- Template layout for admin side -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sri Ratih Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FONTS --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    </style>

    {{-- CSS --}}
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        header {
            z-index: -1;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            z-index: 1040;
            min-height: 90vh;
            top: 0;
            left: 0;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }
    </style>

</head>

<body>
    {{-- NAVBAR --}}
    <header>
        <div class="px-md-3 p-4 bg-info position-fixed w-100" style="height: 70px">

        </div>
    </header>

    {{-- SIDEBAR --}}
    <section class="d-flex">
        <div class="sidebar bg-dark text-white d-flex flex-column" style="width: 250px; height: 100vh;">
            <ul class="list-unstyled flex-grow-1">
                <!-- Header Admin -->
                <li class="py-3 text-center border-bottom">
                    <a href="{{ route('dashboard') }}" class="text-decoration-none text-white fs-4 fw-bold">
                        Admin Page
                    </a>
                </li>

                <!-- Sidebar Menu -->
                <li class="py-3 {{ Request::is('admin/dashboard') ? 'bg-primary' : '' }}">
                    <a href="{{ route('dashboard') }}"
                        class="text-decoration-none text-white d-flex align-items-center ps-3">
                        <i class="bi bi-speedometer me-3 fs-5"></i> Dashboard
                    </a>
                </li>
                <li class="py-3 {{ Request::is('admin/profile') ? 'bg-primary' : '' }}">
                    <a href="{{ route('admins.profile') }}"
                        class="text-decoration-none text-white d-flex align-items-center ps-3">
                        <i class="bi bi-person-circle me-3 fs-5"></i> Profile
                    </a>
                </li>
                <li class="py-3 {{ Request::is('admin/busanas') ? 'bg-primary' : '' }}">
                    <a href="{{ route('busana.index') }}"
                        class="text-decoration-none text-white d-flex align-items-center ps-3">
                        <i class="bi bi-bag-plus me-3 fs-5"></i> Busanas
                    </a>
                </li>
                <li class="py-3 {{ Request::is('admin/orders') ? 'bg-primary' : '' }}">
                    <a href="{{ route('orders.index') }}"
                        class="text-decoration-none text-white d-flex align-items-center ps-3">
                        <i class="bi bi-cart2 me-3 fs-5"></i> Orders Page
                    </a>
                </li>
                <li class="py-3 {{ Request::is('admin/reports') ? 'bg-primary' : '' }}">
                    <a href="{{ route('reports.index') }}"
                        class="text-decoration-none text-white d-flex align-items-center ps-3">
                        <i class="bi bi-clipboard-data me-3 fs-5"></i> Sales Reports
                    </a>
                </li>

                <!-- Logout -->
                <li class="py-3 border-top mt-auto">
                    <a href="{{ route('admin.logout') }}"
                        class="text-decoration-none text-white d-flex align-items-center ps-3">
                        <i class="bi bi-box-arrow-right me-3 fs-5"></i> Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content Area -->
        <div class="content flex-grow-1 p-4">
            @yield('content')
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('js')
</body>

</html>
