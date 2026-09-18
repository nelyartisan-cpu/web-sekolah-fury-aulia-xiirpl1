@extends('layouts.app')

@section('title', 'Kontak - Sekolah Kita')

@section('content')
<div class="container py-5">
    <h1 class="h3 mb-4">Hubungi Kami</h1>

    <div class="row">
        <div class="col-md-6">

            @if(session('sukses'))
                <div class="alert alert-success">{{ session('sukses') }}</div>
            @endif

            <form action="{{ route('kontak.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Pesan</label>
                    <textarea name="pesan" rows="5" class="form-control @error('pesan') is-invalid @enderror">{{ old('pesan') }}</textarea>
                    @error('pesan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>

        <div class="col-md-6">
            <h5>Informasi Kontak</h5>
            <p>Alamat: Jl. Contoh No. 123, Kota Anda</p>
            <p>Telepon: (022) 1234-5678</p>
            <p>Email: info@sekolahkita.sch.id</p>
        </div>
    </div>
</div>
@endsection
