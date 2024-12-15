<!-- views/dashboard.blade.php -->
@extends('layouts.admaster')

@section('content')
    <div class="container-fluid" style="margin-top: 80px">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card card-custom bg-info text-white shadow-sm">
                    <div class="card-body text-center">
                        <h4>Admin</h4>
                        <h1>1</h1>
                    </div>
                    <a href="{{ route('dashboard') }}">
                        <button class="btn btn-light ms-2 mb-2">Lihat Lainnya</button>
                    </a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="" class="text-decoration-none"><i class="bi bi-person-circle me-2"></i>Admin
                                    Profile</a></li>
                            <li><a href="" class="text-decoration-none"><i class="bi bi-list-ul me-2"></i>Menus</a>
                            </li>
                            <li><a href="{{ route('admin.logout') }}" class="text-decoration-none"><i
                                        class="bi bi-box-arrow-left me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="" class="text-decoration-none"><i class="bi bi-person-circle me-2"></i>Admin
                                    Profile</a></li>
                            <li><a href="" class="text-decoration-none"><i class="bi bi-list-ul me-2"></i>Menus</a>
                            </li>
                            <li><a href="{{ route('admin.logout') }}" class="text-decoration-none"><i
                                        class="bi bi-box-arrow-left me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="" class="text-decoration-none"><i class="bi bi-person-circle me-2"></i>Admin
                                    Profile</a></li>
                            <li><a href="" class="text-decoration-none"><i class="bi bi-list-ul me-2"></i>Menus</a>
                            </li>
                            <li><a href="{{ route('admin.logout') }}" class="text-decoration-none"><i
                                        class="bi bi-box-arrow-left me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="" class="text-decoration-none"><i class="bi bi-person-circle me-2"></i>Admin
                                    Profile</a></li>
                            <li><a href="" class="text-decoration-none"><i class="bi bi-list-ul me-2"></i>Menus</a>
                            </li>
                            <li><a href="{{ route('admin.logout') }}" class="text-decoration-none"><i
                                        class="bi bi-box-arrow-left me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="" class="text-decoration-none"><i class="bi bi-person-circle me-2"></i>Admin
                                    Profile</a></li>
                            <li><a href="" class="text-decoration-none"><i class="bi bi-list-ul me-2"></i>Menus</a>
                            </li>
                            <li><a href="{{ route('admin.logout') }}" class="text-decoration-none"><i
                                        class="bi bi-box-arrow-left me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
