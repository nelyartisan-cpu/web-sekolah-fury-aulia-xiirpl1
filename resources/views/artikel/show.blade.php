@extends('layouts.public')

@section('title', $artikel->judul)

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            {{-- KEMBALI --}}
            <a
                href="{{ route('artikel.index') }}"
                class="text-decoration-none"
            >

                <i class="bi bi-arrow-left"></i>

                Kembali ke Artikel

            </a>


            {{-- KATEGORI --}}
            @if($artikel->kategori)

                <div class="mt-4 mb-3">

                    <span class="badge bg-primary">

                        {{ $artikel->kategori->nama_kategori }}

                    </span>

                </div>

            @endif


            {{-- JUDUL --}}
            <h1 class="fw-bold mb-3">

                {{ $artikel->judul }}

            </h1>


            {{-- TANGGAL --}}
            <p class="text-muted mb-4">

                <i class="bi bi-calendar3"></i>

                {{ $artikel->created_at
                    ? $artikel->created_at->format('d M Y')
                    : '-' }}

            </p>


            {{-- GAMBAR --}}
            @if(!empty($artikel->gambar))

                <img
                    src="{{ asset('images/artikel/' . $artikel->gambar) }}"
                    alt="{{ $artikel->judul }}"
                    class="img-fluid rounded shadow-sm w-100 mb-4"
                    style="
                        max-height: 500px;
                        object-fit: cover;
                    "
                >

            @endif


            {{-- ISI ARTIKEL --}}
            <div
                class="article-content"
                style="
                    font-size: 18px;
                    line-height: 1.9;
                    color: #333;
                "
            >

                {!! nl2br(e($artikel->isi)) !!}

            </div>


            {{-- KEMBALI --}}
            <div class="mt-5">

                <a
                    href="{{ route('artikel.index') }}"
                    class="btn btn-outline-primary"
                >

                    <i class="bi bi-arrow-left"></i>

                    Kembali ke Artikel

                </a>

            </div>

        </div>

    </div>

</div>

@endsection