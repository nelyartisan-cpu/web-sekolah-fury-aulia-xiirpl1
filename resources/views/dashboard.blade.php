<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="fw-bold mb-1">
                    Dashboard Admin
                </h2>

                <p class="text-muted mb-0">
                    Kelola informasi website sekolah dari sini
                </p>
            </div>

            {{-- Tombol kembali ke beranda --}}
            <a href="{{ route('beranda') }}"
               class="btn btn-primary">
                <i class="bi bi-house-door-fill me-1"></i>
                Kembali ke Beranda
            </a>

        </div>
    </x-slot>


    <div class="py-4">

        <div class="container">

            {{-- Header Dashboard --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body d-flex align-items-center">

                    <img src="{{ asset('images/logo-smk.jpg') }}"
                         alt="Logo SMK Negeri 1 Cijati"
                         width="65"
                         height="65"
                         class="rounded-circle me-3"
                         style="object-fit: cover;">

                    <div>
                        <h4 class="fw-bold mb-1">
                            SMK Negeri 1 Cijati
                        </h4>

                        <p class="text-muted mb-0">
                            Dashboard Administrator
                        </p>
                    </div>

                </div>
            </div>


            {{-- Statistik --}}
            <div class="row g-4">

                {{-- Jurusan --}}
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">

                            <p class="text-muted mb-2">
                                Jumlah Jurusan
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ $jumlahJurusan }}
                            </h2>

                        </div>
                    </div>
                </div>


                {{-- Ekstrakurikuler --}}
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">

                            <p class="text-muted mb-2">
                                Ekstrakurikuler
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ $jumlahEkstrakurikuler }}
                            </h2>

                        </div>
                    </div>
                </div>


                {{-- Guru --}}
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">

                            <p class="text-muted mb-2">
                                Jumlah Guru
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ $jumlahGuru ?? 0 }}
                            </h2>

                        </div>
                    </div>
                </div>


                {{-- Artikel --}}
                <div class="col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">

                            <p class="text-muted mb-2">
                                Jumlah Artikel
                            </p>

                            <h2 class="fw-bold mb-0">
                                {{ $jumlahArtikel }}
                            </h2>

                        </div>
                    </div>
                </div>

            </div>


            {{-- Menu Kelola --}}
            <div class="card border-0 shadow-sm mt-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        Kelola Website
                    </h5>

                    <div class="row g-3">

                        <div class="col-md-4">
                            <a href="{{ route('admin.jurusan.index') }}"
                               class="btn btn-outline-primary w-100 py-3">
                                <i class="bi bi-mortarboard-fill me-2"></i>
                                Kelola Jurusan
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('admin.ekstrakurikuler.index') }}"
                               class="btn btn-outline-success w-100 py-3">
                                <i class="bi bi-trophy-fill me-2"></i>
                                Kelola Ekstrakurikuler
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('admin.guru.index') }}"
                               class="btn btn-outline-warning w-100 py-3">
                                <i class="bi bi-person-badge-fill me-2"></i>
                                Kelola Guru
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('admin.artikel.index') }}"
                               class="btn btn-outline-danger w-100 py-3">
                                <i class="bi bi-newspaper me-2"></i>
                                Kelola Artikel
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('admin.profil.edit') }}"
                               class="btn btn-outline-secondary w-100 py-3">
                                <i class="bi bi-building me-2"></i>
                                Kelola Profil Sekolah
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>