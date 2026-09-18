<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Website resmi SMK Negeri 1 Cijati">

    <title>
        @yield('title', 'SMK Negeri 1 Cijati')
    </title>


    {{-- Bootstrap 5 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f8f9fa;
            font-family: Arial, Helvetica, sans-serif;
            color: #212529;
            margin: 0;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .school-navbar {
            background: #ffffff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .08);

            position: sticky;
            top: 0;

            z-index: 1000;
        }


        .school-navbar .container {
            min-height: 76px;
        }


        /* LOGO */

        .school-logo {
            width: 48px;
            height: 48px;

            object-fit: contain;

            border-radius: 50%;

            background: #ffffff;

            border: 1px solid #e5e7eb;

            padding: 3px;
        }


        /* NAMA SEKOLAH */

        .school-name {
            font-size: 18px;
            font-weight: 700;

            color: #0d6efd;

            line-height: 1.2;
        }


        .school-subtitle {
            font-size: 12px;
            color: #6c757d;
        }


        /* MENU */

        .navbar-nav .nav-link {
            color: #374151;

            font-weight: 500;

            padding: 25px 14px !important;

            position: relative;

            transition: all .2s ease;
        }


        .navbar-nav .nav-link:hover {
            color: #0d6efd;
        }


        .navbar-nav .nav-link.active {
            color: #0d6efd;
            font-weight: 700;
        }


        .navbar-nav .nav-link.active::after {

            content: "";

            position: absolute;

            bottom: 8px;

            left: 14px;

            right: 14px;

            height: 3px;

            background: #0d6efd;

            border-radius: 10px;
        }


        /* TOMBOL LOGIN */

        .btn-login {

            border: 1px solid #0d6efd;

            color: #0d6efd;

            border-radius: 8px;

            padding: 8px 15px;

            font-weight: 600;

            transition: .2s;
        }


        .btn-login:hover {

            background: #0d6efd;

            color: white;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            background:
                linear-gradient(
                    135deg,
                    #0d6efd,
                    #0056d6
                );

            color: white;

            padding: 55px 20px;

            margin-bottom: 45px;
        }


        .page-header h1 {

            font-size: 38px;

            font-weight: 800;

            margin-bottom: 10px;
        }


        .page-header p {

            margin-bottom: 0;

            opacity: .9;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {

            background:
                linear-gradient(
                    135deg,
                    #0d6efd,
                    #0056d6
                );

            color: white;

            padding: 90px 20px;
        }


        .hero h1 {

            font-size: 48px;

            font-weight: 800;
        }


        .hero p {

            font-size: 18px;

            opacity: .95;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .school-card {

            background: white;

            border: none;

            border-radius: 15px;

            overflow: hidden;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, .07);

            transition: all .25s ease;
        }


        .school-card:hover {

            transform: translateY(-5px);

            box-shadow:
                0 12px 30px rgba(0, 0, 0, .12);
        }


        /* =====================================================
           FOTO GURU
        ===================================================== */

        .guru-photo {

            width: 100%;

            height: 260px;

            object-fit: cover;

            object-position: center;

            background: #f1f5f9;
        }


        .guru-photo-placeholder {

            width: 100%;

            height: 260px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #eef2f7;

            color: #94a3b8;

            font-size: 60px;
        }


        /* =====================================================
           FOTO / GAMBAR UMUM
        ===================================================== */

        .school-image {

            width: 100%;

            height: 220px;

            object-fit: cover;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {

            background: #111827;

            color: white;

            margin-top: 70px;
        }


        footer .text-secondary {

            color: #9ca3af !important;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 991px) {

            .navbar-nav .nav-link {

                padding: 10px 0 !important;
            }


            .navbar-nav .nav-link.active::after {

                display: none;
            }


            .school-navbar .container {

                min-height: 70px;
            }

        }


        @media (max-width: 768px) {

            .hero {

                padding: 60px 20px;
            }


            .hero h1 {

                font-size: 32px;
            }


            .page-header h1 {

                font-size: 30px;
            }


            .guru-photo,
            .guru-photo-placeholder {

                height: 240px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


    {{-- =====================================================
         NAVBAR WEBSITE
    ====================================================== --}}

    @include('layouts.navigation')


    {{-- =====================================================
         CONTENT
    ====================================================== --}}

    <main>

        @yield('content')

    </main>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <footer class="py-5">

        <div class="container">

            <div class="row">

                {{-- SEKOLAH --}}

                <div class="col-md-6 mb-4">

                    <h5 class="fw-bold">
                        <i class="bi bi-mortarboard-fill me-2"></i>
                        SMK Negeri 1 Cijati
                    </h5>

                    <p class="text-secondary mb-0">

                        Mencetak generasi unggul,
                        kreatif, dan berkarakter.

                    </p>

                </div>


                {{-- MENU --}}

                <div class="col-md-3 mb-4">

                    <h6 class="fw-bold">
                        Menu
                    </h6>

                    <ul class="list-unstyled">

                        <li class="mb-2">

                            <a
                                href="{{ route('beranda') }}"
                                class="text-secondary text-decoration-none"
                            >
                                Beranda
                            </a>

                        </li>

                        <li class="mb-2">

                            <a
                                href="{{ route('profil.index') }}"
                                class="text-secondary text-decoration-none"
                            >
                                Profil
                            </a>

                        </li>

                        <li class="mb-2">

                            <a
                                href="{{ route('guru.index') }}"
                                class="text-secondary text-decoration-none"
                            >
                                Guru
                            </a>

                        </li>

                    </ul>

                </div>


                {{-- INFORMASI --}}

                <div class="col-md-3 mb-4">

                    <h6 class="fw-bold">
                        Informasi
                    </h6>

                    <ul class="list-unstyled">

                        <li class="mb-2">

                            <a
                                href="{{ route('jurusan.index') }}"
                                class="text-secondary text-decoration-none"
                            >
                                Jurusan
                            </a>

                        </li>

                        <li class="mb-2">

                            <a
                                href="{{ route('ekstrakurikuler.index') }}"
                                class="text-secondary text-decoration-none"
                            >
                                Ekstrakurikuler
                            </a>

                        </li>

                        <li class="mb-2">

                            <a
                                href="{{ route('artikel.index') }}"
                                class="text-secondary text-decoration-none"
                            >
                                Artikel
                            </a>

                        </li>

                    </ul>

                </div>

            </div>


            <hr class="border-secondary">


            <div class="text-center">

                <small class="text-secondary">

                    © {{ date('Y') }}
                    SMK Negeri 1 Cijati.
                    Semua hak dilindungi.

                </small>

            </div>

        </div>

    </footer>


    {{-- Bootstrap JS --}}

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    @stack('scripts')

</body>

</html>