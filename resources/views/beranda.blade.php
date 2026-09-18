@extends('layouts.public')

@section('title', 'Beranda - Sekolah Kita')

@section('content')

    <section class="text-white text-center py-5" style="
        background-image: linear-gradient(rgba(13, 71, 161, 0.75), rgba(13, 71, 161, 0.75)), url('{{ asset('images/gerbang.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    ">
        <div class="container">
            <img src="{{ asset('images/logo-smk.jpg') }}" alt="Logo SMK Negeri 1 Cijati" style="width: 100px; height: auto; margin-bottom: 15px;">
            <h1 class="display-5 fw-bold">Selamat Datang di SMK Negri 1 Cijati</h1>
            <p class="lead">Mencetak generasi unggul, kreatif, dan berkarakter.</p>
        </div>
    </section>

    <section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Jurusan</h2>
        <a href="{{ route('jurusan.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
    </div>
    <div class="row g-4">
        @forelse($jurusan as $j)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    @php
                        $gambarManual = match($j->singkatan) {
                            'TKR' => 'images/logo-tkr.jpg',
                            'RPL' => 'images/logo-rpl.jpg',
                            'APHP'=> 'images/logo-aphp.jpg',
                            'BDP' => 'images/logo-bdp.jpg',
                            default => 'https://via.placeholder.com/90x200?text=Jurusan',
                        };
                    @endphp
                    <img src="{{ asset($gambarManual) }}" class="card-img-top" alt="{{ $j->nama_jurusan }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $j->nama_jurusan }} @if($j->singkatan)({{ $j->singkatan }})@endif</h5>
                        <p class="card-text">{{ Str::limit($j->deskripsi, 100) }}</p>
                        <a href="{{ route('jurusan.show', $j) }}" class="btn btn-sm btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada data jurusan.</p>
        @endforelse
    </div>
</section>

    <section class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">Artikel Terbaru</h2>
            <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
        </div>
        <div class="row g-4">
            @forelse($artikel as $a)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $a->gambar ? asset('images/artikel/'.$a->gambar) : 'https://via.placeholder.com/400x200?text=Artikel' }}" class="card-img-top" alt="{{ $a->judul }}">
                        <div class="card-body">
                            @if($a->kategori)
                                <span class="badge bg-secondary mb-2">{{ $a->kategori->nama_kategori }}</span>
                            @endif
                            <h5 class="card-title">{{ $a->judul }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($a->isi), 90) }}</p>
                            <a href="{{ route('artikel.show', $a) }}" class="btn btn-sm btn-primary">Baca</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada artikel.</p>
            @endforelse
        </div>
    </section>

@endsection