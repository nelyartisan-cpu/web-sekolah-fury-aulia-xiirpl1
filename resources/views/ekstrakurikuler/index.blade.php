@extends('layouts.public')

@section('title', 'Ekstrakurikuler - Sekolah Kita')

@section('content')

<style>
    .eskul-hero {
        background: linear-gradient(
            135deg,
            #0d6efd,
            #084298
        );
        color: white;
        padding: 70px 20px;
        text-align: center;
    }

    .eskul-hero h1 {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .eskul-hero p {
        font-size: 18px;
        margin: 0;
    }

    .eskul-section {
        padding: 60px 0;
        background: #f8f9fa;
    }

    .eskul-card {
        height: 100%;
        background: white;
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        transition: .3s;
    }

    .eskul-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .13);
    }

    .eskul-image {
        height: 190px;
        background: #eef4ff;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .eskul-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .eskul-icon {
        width: 90px;
        height: 90px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
    }

    .eskul-icon i {
        font-size: 42px;
        color: #0d6efd;
    }

    .eskul-body {
        padding: 25px;
    }

    .eskul-title {
        font-size: 21px;
        font-weight: 700;
        color: #212529;
        margin-bottom: 12px;
    }

    .eskul-pembina {
        color: #6c757d;
        margin-bottom: 18px;
    }

    .eskul-button {
        display: inline-block;
        text-decoration: none;
        color: #0d6efd;
        font-weight: 600;
    }

    .eskul-button:hover {
        color: #084298;
    }

    .empty-data {
        padding: 80px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    }

    .empty-icon i {
        font-size: 45px;
        color: #0d6efd;
    }
</style>


{{-- HERO --}}
<section class="eskul-hero">

    <div class="container">

        <h1>
            Ekstrakurikuler
        </h1>

        <p>
            Kembangkan bakat, minat, dan kreativitas siswa
            melalui berbagai kegiatan ekstrakurikuler di sekolah.
        </p>

    </div>

</section>


{{-- DATA --}}
<section class="eskul-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Daftar Ekstrakurikuler
            </h2>

            <p class="text-muted">
                Pilih kegiatan ekstrakurikuler
                yang sesuai dengan minat dan bakatmu.
            </p>

        </div>


        @if($ekstrakurikulers->count() > 0)

            <div class="row g-4">

                @foreach($ekstrakurikulers as $eskul)

                    <div class="col-md-6 col-lg-4">

                        <div class="eskul-card">

                            <div class="eskul-image">

                                @if($eskul->logo)

                                    <img
                                        src="{{ asset('storage/' . $eskul->logo) }}"
                                        alt="{{ $eskul->nama_eskul }}"
                                    >

                                @else

                                    <div class="eskul-icon">

                                        <i class="bi bi-trophy"></i>

                                    </div>

                                @endif

                            </div>


                            <div class="eskul-body">

                                <div class="eskul-title">

                                    {{ $eskul->nama_eskul }}

                                </div>


                                @if($eskul->pembina)

                                    <div class="eskul-pembina">

                                        <i class="bi bi-person-badge me-2"></i>

                                        {{ $eskul->pembina }}

                                    </div>

                                @endif


                                @if($eskul->guru)

                                    <div class="eskul-pembina">

                                        <i class="bi bi-person me-2"></i>

                                        {{ $eskul->guru->nama_guru }}

                                    </div>

                                @endif


                                <a
                                    href="{{ route('ekstrakurikuler.show', $eskul->id) }}"
                                    class="eskul-button"
                                >

                                    Lihat Detail
                                    <i class="bi bi-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- PAGINATION --}}
            <div class="d-flex justify-content-center mt-5">

                {{ $ekstrakurikulers->links() }}

            </div>

        @else

            <div class="empty-data">

                <div class="empty-icon">

                    <i class="bi bi-trophy"></i>

                </div>

                <h3 class="fw-bold">
                    Belum Ada Ekstrakurikuler
                </h3>

                <p class="text-muted">
                    Data ekstrakurikuler belum tersedia.
                </p>

            </div>

        @endif

    </div>

</section>

@endsection