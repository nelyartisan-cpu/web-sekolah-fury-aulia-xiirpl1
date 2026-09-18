@extends('layouts.public')

@section('title', 'Jurusan - Sekolah Kita')

@section('content')
<div class="container py-5">
    <h1 class="h3 mb-4">Daftar Jurusan</h1>

    <div class="row g-4">
        @forelse($jurusan as $j)
            @php
                $namaLower = strtolower($j->nama_jurusan);

                
                if ($namaLower === 'agriteknologi pengolahan hasil pertanian') {
                    $imgSrc = asset('images/logo-aphp.jpg');
                } elseif (
                    str_contains($namaLower, 'rekayasa perangkat lunak') ||
                    strtolower($j->singkatan) === 'rpl'
                ) {
                    $imgSrc = asset('images/logo-rpl.jpg');
                } elseif (
                    $namaLower === 'bisnis daring dan pemasaran' ||
                    strtolower($j->singkatan) === 'bdp'
                ) {
                    $imgSrc = asset('images/logo-bdp.jpg');
                } elseif (
                    str_contains($namaLower, 'teknik kendaraan ringan') ||
                    strtolower($j->singkatan) === 'tkr'
                ) {
                    $imgSrc = asset('images/logo-tkr.jpg');
                } elseif ($j->gambar) {
                    $imgSrc = asset('storage/' . $j->gambar);
                } else {
                    $imgSrc = 'https://via.placeholder.com/400x200?text=Jurusan';
                }
            @endphp

            <div class="col-md-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="d-flex justify-content-center align-items-center p-4" style="height: 220px; background:#f8f9fa;">
                        <img src="{{ $imgSrc }}"
                             class="img-fluid"
                             style="max-height: 180px; object-fit: contain;"
                             alt="Logo {{ $j->nama_jurusan }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $j->nama_jurusan }}
                            @if($j->singkatan)
                                ({{ $j->singkatan }})
                            @endif
                        </h5>
                        <p class="card-text">{{ Str::limit($j->deskripsi, 100) }}</p>
                        <a href="{{ route('jurusan.show', $j) }}" class="btn btn-sm btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada data jurusan.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $jurusan->links() }}
    </div>
</div>
@endsection