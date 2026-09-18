@extends('layouts.public')

@section('title', 'Guru')

@section('content')

<style>

    .guru-page {
        background: #f8fafc;
        min-height: 100vh;
        padding: 50px 0 70px;
    }

    .guru-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .guru-header h1 {
        color: #16213e;
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .guru-header p {
        color: #64748b;
    }

    .guru-card {
        height: 100%;
        overflow: hidden;
        background: white;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .08);
        transition: .3s;
    }

    .guru-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(15, 23, 42, .14);
    }

    .guru-photo {
        height: 270px;
        background: #eef4ff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .guru-photo img {
        width: 180px;
        height: 220px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .12);
    }

    .guru-placeholder {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .guru-placeholder i {
        font-size: 70px;
        color: #0d6efd;
    }

    .guru-body {
        padding: 25px;
        text-align: center;
    }

    .guru-name {
        color: #16213e;
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .guru-nip {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .guru-detail {
        color: #0d6efd;
        text-decoration: none;
        font-weight: 600;
    }

    .guru-detail:hover {
        color: #084298;
    }

</style>


<div class="guru-page">

    <div class="container">

        {{-- HEADER --}}
        <div class="guru-header">

            <h1>
                Guru
            </h1>

            <p>
                Kenali guru-guru SMK Negeri 1 Cijati.
            </p>

        </div>


        {{-- DATA GURU --}}
        <div class="row g-4">

            @forelse ($guru as $item)

                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="guru-card">

                        {{-- FOTO --}}
                        <div class="guru-photo">

                            @if ($item->foto)

                                <img
                                    src="{{ $item->fotoUrl() }}"
                                    alt="{{ $item->nama_guru }}"
                                >

                            @else

                                <div class="guru-placeholder">

                                    <i class="bi bi-person"></i>

                                </div>

                            @endif

                        </div>


                        {{-- DATA --}}
                        <div class="guru-body">

                            <h3 class="guru-name">

                                {{ $item->nama_guru }}

                            </h3>


                            @if ($item->nip)

                                <div class="guru-nip">

                                    NIP: {{ $item->nip }}

                                </div>

                            @endif


                            <a
                                href="{{ route(
                                    'guru.show',
                                    $item
                                ) }}"
                                class="guru-detail"
                            >

                                Lihat Detail

                                <i class="bi bi-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        Belum ada data guru.

                    </div>

                </div>

            @endforelse

        </div>


        {{-- PAGINATION --}}
        <div class="d-flex justify-content-center mt-5">

            {{ $guru->links() }}

        </div>

    </div>

</div>

@endsection