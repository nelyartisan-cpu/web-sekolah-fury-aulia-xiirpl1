@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Edit Artikel</h1>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-sm btn-outline-secondary">&larr; Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $artikel->judul) }}"
                           class="form-control @error('judul') is-invalid @enderror" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" @selected(old('kategori_id', $artikel->kategori_id) == $k->id)>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="gambar" class="form-label">Gambar Artikel</label>

                        @if($artikel->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="{{ $artikel->judul }}"
                                     width="120" class="rounded border">
                            </div>
                        @endif

                        <input type="file" name="gambar" id="gambar" accept="image/*"
                               class="form-control @error('gambar') is-invalid @enderror">
                        <div class="form-text">Kosongkan jika tidak ingin mengganti gambar. Maks 2MB.</div>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Artikel <span class="text-danger">*</span></label>
                    <textarea name="isi" id="isi" rows="10"
                              class="form-control @error('isi') is-invalid @enderror" required>{{ old('isi', $artikel->isi) }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update
                    </button>
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection