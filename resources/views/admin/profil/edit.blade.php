@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')

<div class="container-fluid px-0">


    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Profil Sekolah
            </h2>

            <p class="text-muted mb-0">
                Kelola informasi sekolah.
            </p>

        </div>


        <i class="bi bi-building fs-1 text-primary"></i>

    </div>


    <div class="admin-card">


        <form
            action="{{ route('admin.profil.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- NAMA --}}

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Nama Sekolah
                </label>

                <input
                    type="text"
                    name="nama_sekolah"
                    class="form-control"
                    value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                    required
                >

            </div>


            {{-- SEJARAH --}}

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Sejarah
                </label>

                <textarea
                    name="sejarah"
                    rows="5"
                    class="form-control"
                >{{ old('sejarah', $profil->sejarah) }}</textarea>

            </div>


            {{-- VISI --}}

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Visi
                </label>

                <textarea
                    name="visi"
                    rows="4"
                    class="form-control"
                >{{ old('visi', $profil->visi) }}</textarea>

            </div>


            {{-- MISI --}}

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Misi
                </label>

                <textarea
                    name="misi"
                    rows="6"
                    class="form-control"
                >{{ old('misi', $profil->misi) }}</textarea>

            </div>


            {{-- ALAMAT --}}

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    rows="3"
                    class="form-control"
                >{{ old('alamat', $profil->alamat) }}</textarea>

            </div>


            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">
                        Telepon
                    </label>

                    <input
                        type="text"
                        name="telepon"
                        class="form-control"
                        value="{{ old('telepon', $profil->telepon) }}"
                    >

                </div>


                <div class="col-md-6 mb-4">

                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $profil->email) }}"
                    >

                </div>

            </div>


            {{-- LOGO --}}

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Logo Sekolah
                </label>


                @if($profil->logo)

                    <div class="mb-3">

                        <img
                            src="{{ asset('storage/' . $profil->logo) }}"
                            alt="Logo"
                            width="120"
                            height="120"
                            style="
                                object-fit: contain;
                                border: 1px solid #ddd;
                                border-radius: 12px;
                                padding: 8px;
                            "
                        >

                    </div>

                @endif


                <input
                    type="file"
                    name="logo"
                    class="form-control"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small class="text-muted">
                    Maksimal 2 MB.
                </small>

            </div>


            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('beranda') }}"
                    class="btn btn-outline-secondary"
                >

                    Kembali

                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-save me-1"></i>

                    Simpan Perubahan

                </button>

            </div>


        </form>

    </div>

</div>

@endsection