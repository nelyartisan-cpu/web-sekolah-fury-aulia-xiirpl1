@extends('layouts.public')

@section('title', $jurusan->nama_jurusan . ' - Sekolah Kita')

@section('content')
<div class="container py-5">
    <a href="{{ route('jurusan.index') }}" class="btn btn-sm btn-outline-secondary mb-4">&larr; Kembali</a>

    <div class="row">
        <div class="col-md-5">
            <img src="{{ $jurusan->gambar ? asset('storage/'.$jurusan->gambar) : 'https://via.placeholder.com/500x350?text=Jurusan' }}" class="img-fluid rounded shadow-sm" alt="{{ $jurusan->nama_jurusan }}">
        </div>
        <div class="col-md-7">
            <h1 class="h3">{{ $jurusan->nama_jurusan }} @if($jurusan->singkatan)<small class="text-muted">({{ $jurusan->singkatan }})</small>@endif</h1>
            <p class="mt-3">{{ $jurusan->deskripsi }}</p>
        </div>
    </div>
</div>
@endsection
