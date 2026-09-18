<nav class="school-navbar navbar navbar-expand-lg">

    <div class="container">


        {{-- =================================================
             LOGO + NAMA SEKOLAH
        ================================================== --}}

        <a
            href="{{ route('beranda') }}"
            class="navbar-brand d-flex align-items-center gap-3"
        >

            <img
                src="{{ asset('images/logo-smk.jpg') }}"
                alt="Logo SMK Negeri 1 Cijati"
                class="school-logo"
            >

            <div>

                <div class="school-name">
                    SMK Negeri 1 Cijati
                </div>

                <div class="school-subtitle">
                    Website Resmi Sekolah
                </div>

            </div>

        </a>


        {{-- =================================================
             TOGGLE MOBILE
        ================================================== --}}

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarWebsite"
            aria-controls="navbarWebsite"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- =================================================
             MENU
        ================================================== --}}

        <div
            class="collapse navbar-collapse"
            id="navbarWebsite"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">


                {{-- BERANDA --}}

                <li class="nav-item">

                    <a
                        href="{{ route('beranda') }}"
                        class="nav-link
                        {{ request()->routeIs('beranda') ? 'active' : '' }}"
                    >

                        <i class="bi bi-house-door me-1"></i>

                        Beranda

                    </a>

                </li>


                {{-- PROFIL --}}

                <li class="nav-item">

                    <a
                        href="{{ route('profil.index') }}"
                        class="nav-link
                        {{ request()->routeIs('profil.*') ? 'active' : '' }}"
                    >

                        <i class="bi bi-building me-1"></i>

                        Profil

                    </a>

                </li>


                {{-- GURU --}}

                <li class="nav-item">

                    <a
                        href="{{ route('guru.index') }}"
                        class="nav-link
                        {{ request()->routeIs('guru.*') ? 'active' : '' }}"
                    >

                        <i class="bi bi-person-badge me-1"></i>

                        Guru

                    </a>

                </li>


                {{-- JURUSAN --}}

                <li class="nav-item">

                    <a
                        href="{{ route('jurusan.index') }}"
                        class="nav-link
                        {{ request()->routeIs('jurusan.*') ? 'active' : '' }}"
                    >

                        <i class="bi bi-mortarboard me-1"></i>

                        Jurusan

                    </a>

                </li>


                {{-- EKSTRAKURIKULER --}}

                <li class="nav-item">

                    <a
                        href="{{ route('ekstrakurikuler.index') }}"
                        class="nav-link
                        {{ request()->routeIs('ekstrakurikuler.*') ? 'active' : '' }}"
                    >

                        <i class="bi bi-trophy me-1"></i>

                        Ekstrakurikuler

                    </a>

                </li>


                {{-- ARTIKEL --}}

                <li class="nav-item">

                    <a
                        href="{{ route('artikel.index') }}"
                        class="nav-link
                        {{ request()->routeIs('artikel.*') ? 'active' : '' }}"
                    >

                        <i class="bi bi-newspaper me-1"></i>

                        Artikel

                    </a>

                </li>


                {{-- LOGIN ADMIN --}}

                @guest

                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-login"
                        >

                            <i class="bi bi-box-arrow-in-right me-1"></i>

                            Login Admin

                        </a>

                    </li>

                @else

                    {{-- JIKA SUDAH LOGIN --}}

                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">

                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="btn btn-primary"
                        >

                            <i class="bi bi-speedometer2 me-1"></i>

                            Dashboard

                        </a>

                    </li>

                @endguest


            </ul>

        </div>

    </div>

</nav>