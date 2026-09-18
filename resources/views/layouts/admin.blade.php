{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin - SMK Negeri 1 Cijati')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FIX: hapus ".min" karena file itu tidak ada di CDN, bikin semua ikon hilang --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
        }

        /* NAVBAR */
        .admin-navbar {
            background: linear-gradient(135deg, #0d6efd, #084298);
            min-height: 65px;
            box-shadow: 0 3px 15px rgba(0,0,0,.12);
        }

        .admin-navbar .navbar-brand {
            font-size: 20px;
        }

        .admin-user-badge {
            background: rgba(255,255,255,.15);
            color: #fff;
            border-radius: 999px;
            padding: 6px 14px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* SIDEBAR */
        .admin-sidebar {
            min-height: calc(100vh - 65px);
            background: white;
            border-right: 1px solid #e5e7eb;
            box-shadow: 3px 0 12px rgba(0,0,0,.04);
            padding: 20px !important;
        }

        .admin-sidebar-title {
            font-size: 12px;
            font-weight: 700;
            color: #9ca3af;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .admin-sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #374151;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 5px;
            font-weight: 500;
            transition: .2s;
        }

        .admin-sidebar .nav-link i {
            width: 22px;
            font-size: 18px;
        }

        .admin-sidebar .nav-link:hover {
            background: #eef5ff;
            color: #0d6efd;
            transform: translateX(3px);
        }

        .admin-sidebar .nav-link.active {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            color: white;
            box-shadow: 0 4px 10px rgba(13,110,253,.25);
        }

        /* CONTENT */
        .admin-content {
            min-height: calc(100vh - 65px);
            padding: 30px !important;
        }

        /* CARD */
        .admin-card {
            background: white;
            border: none;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
        }

        /* FIX: sidebar bisa di-toggle di mobile, tidak lagi selalu terbuka penuh */
        @media (max-width: 767px) {
            .admin-sidebar {
                min-height: auto;
                border-right: none;
                border-bottom: 1px solid #ddd;
                display: none;
            }

            .admin-sidebar.show-mobile {
                display: block;
            }

            .admin-content {
                padding: 20px !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark admin-navbar">
    <div class="container-fluid px-4">

        <button class="btn btn-outline-light btn-sm d-md-none me-2" type="button" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <a href="{{ route('admin.dashboard') }}" class="navbar-brand fw-bold">
            <i class="bi bi-mortarboard-fill me-2"></i>
            Admin Sekolah Kita
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <div class="ms-auto d-flex align-items-center gap-2 mt-3 mt-lg-0">

                <a href="{{ route('beranda') }}" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-globe me-1"></i> Website
                </a>

                <a href="{{ route('admin.profil.edit') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-building me-1"></i> Profil Sekolah
                </a>

                @auth
                    <div class="dropdown">
                        <button class="admin-user-badge border-0" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle fs-5"></i>
                            {{ Auth::user()->name }}
                            <i class="bi bi-caret-down-fill small"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        {{-- SIDEBAR --}}
        <aside class="col-md-3 col-lg-2 admin-sidebar" id="adminSidebar">

            <div class="admin-sidebar-title">MENU ADMIN</div>

            <nav class="nav flex-column">

                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>

                <a href="{{ route('admin.guru.index') }}"
                   class="nav-link {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                    <i class="bi bi-person-workspace"></i> Guru
                </a>

                <a href="{{ route('admin.jurusan.index') }}"
                   class="nav-link {{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard-fill"></i> Jurusan
                </a>

                <a href="{{ route('admin.ekstrakurikuler.index') }}"
                   class="nav-link {{ request()->routeIs('admin.ekstrakurikuler.*') ? 'active' : '' }}">
                    <i class="bi bi-trophy-fill"></i> Ekstrakurikuler
                </a>

                <a href="{{ route('admin.artikel.index') }}"
                   class="nav-link {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Artikel
                </a>

                <hr>

                <a href="{{ route('admin.profil.edit') }}"
                   class="nav-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> Profil Sekolah
                </a>

                <a href="{{ route('beranda') }}" class="nav-link">
                    <i class="bi bi-house"></i> Kembali ke Website
                </a>

            </nav>
        </aside>

        {{-- CONTENT --}}
        <main class="col-md-9 col-lg-10 admin-content">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleSidebar() {
        document.getElementById('adminSidebar').classList.toggle('show-mobile');
    }
</script>

@stack('scripts')

</body>

</html>