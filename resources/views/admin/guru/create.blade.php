@extends('layouts.admin') {{-- sesuaikan dengan layout admin kamu --}}

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Tambah Data Guru</h5>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Guru</label>
                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" placeholder="Masukkan nama guru" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" id="nip" name="nip" class="form-control @error('nip') is-invalid @enderror"
                           value="{{ old('nip') }}" placeholder="Masukkan NIP" required>
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror"
                           accept="image/*" onchange="previewFoto(event)">
                    <div class="form-text">Format: JPG, PNG. Maks. 2MB.</div>
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <img id="previewFotoImg" src="#" alt="Preview Foto"
                         class="mt-2 rounded d-none" width="150">
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewFoto(event) {
        const preview = document.getElementById('previewFotoImg');
        const file = event.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('d-none');
        } else {
            preview.classList.add('d-none');
        }
    }
</script>
@endsection