@extends('layouts.public')

@section('title', 'Profil Sekolah')

@section('content')

<section class="hero">

    <div class="container text-center">

        <h1 class="mb-3">
            Profil Sekolah
        </h1>

        <p class="lead">
            Mengenal lebih dekat SMK Negeri 1 Cijati
        </p>

    </div>

</section>


<div class="container py-5">


    @if($profil)


        {{-- NAMA --}}

        <div class="school-card bg-white p-4 mb-4">

            <h2 class="fw-bold text-primary">
                {{ $profil->nama_sekolah }}
            </h2>

            <p class="text-muted mb-0">
                Informasi resmi sekolah.
            </p>

        </div>


        {{-- SEJARAH --}}

        <div class="school-card bg-white p-4 mb-4">

            <h4 class="fw-bold">

                <i class="bi bi-clock-history text-primary me-2"></i>

                Sejarah

            </h4>

            <hr>

            <p style="white-space: pre-line;">
                {{ $profil->sejarah ?: 'Belum ada informasi sejarah.' }}
            </p>

        </div>


        <div class="row">


            {{-- VISI --}}

            <div class="col-md-6 mb-4">

                <div class="school-card bg-white p-4 h-100">

                    <h4 class="fw-bold">

                        <i class="bi bi-eye text-primary me-2"></i>

                        Visi

                    </h4>

                    <hr>

                    <p style="white-space: pre-line;">
                        {{ $profil->visi ?: 'Belum ada visi.' }}
                    </p>

                </div>

            </div>


            {{-- MISI --}}

            <div class="col-md-6 mb-4">

                <div class="school-card bg-white p-4 h-100">

                    <h4 class="fw-bold">

                        <i class="bi bi-list-check text-primary me-2"></i>

                        Misi

                    </h4>

                    <hr>

                    <p style="white-space: pre-line;">
                        {{ $profil->misi ?: 'Belum ada misi.' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- KONTAK --}}

        <div class="school-card bg-white p-4">

            <h4 class="fw-bold mb-4">

                <i class="bi bi-geo-alt text-primary me-2"></i>

                Informasi Kontak

            </h4>


            <p>

                <i class="bi bi-geo-alt-fill text-primary me-2"></i>

                {{ $profil->alamat ?: '-' }}

            </p>


            <p>

                <i class="bi bi-telephone-fill text-primary me-2"></i>

                {{ $profil->telepon ?: '-' }}

            </p>


            <p>

                <i class="bi bi-envelope-fill text-primary me-2"></i>

                {{ $profil->email ?: '-' }}

            </p>

        </div>


    @else


        <div class="alert alert-warning">

            Data profil sekolah belum tersedia.

        </div>


    @endif


</div>

@endsection