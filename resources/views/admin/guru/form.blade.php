<x-app-layout>

    <x-slot name="header">

        <h2 class="fw-bold">

            {{ $guru->exists ? 'Edit Guru' : 'Tambah Guru' }}

        </h2>

    </x-slot>


    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">


                        <form
                            action="{{ $guru->exists
                                ? route('admin.guru.update', $guru)
                                : route('admin.guru.store') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            @if($guru->exists)

                                @method('PUT')

                            @endif


                            {{-- NAMA --}}

                            <div class="mb-4">

                                <label
                                    class="form-label fw-semibold"
                                    for="nama_guru"
                                >

                                    Nama Guru

                                </label>


                                <input
                                    type="text"
                                    name="nama_guru"
                                    id="nama_guru"
                                    class="form-control @error('nama_guru') is-invalid @enderror"
                                    value="{{ old('nama_guru', $guru->nama_guru) }}"
                                    placeholder="Masukkan nama guru"
                                    required
                                >


                                @error('nama_guru')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>



                            {{-- NIP --}}

                            <div class="mb-4">

                                <label
                                    class="form-label fw-semibold"
                                    for="nip"
                                >

                                    NIP

                                </label>


                                <input
                                    type="text"
                                    name="nip"
                                    id="nip"
                                    class="form-control @error('nip') is-invalid @enderror"
                                    value="{{ old('nip', $guru->nip) }}"
                                    placeholder="Masukkan NIP"
                                    required
                                >


                                @error('nip')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>



                            {{-- FOTO --}}

                            <div class="mb-4">

                                <label
                                    class="form-label fw-semibold"
                                    for="foto"
                                >

                                    Foto Guru

                                </label>


                                <input
                                    type="file"
                                    name="foto"
                                    id="foto"
                                    class="form-control @error('foto') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >


                                <small class="text-muted">

                                    JPG, JPEG, PNG, WEBP.
                                    Maksimal 2 MB.

                                </small>


                                @error('foto')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror


                                @if($guru->foto)

                                    <div class="mt-3">

                                        <p class="small text-muted">
                                            Foto saat ini:
                                        </p>


                                        <img
                                            src="{{ asset('storage/' . $guru->foto) }}"
                                            alt="{{ $guru->nama_guru }}"
                                            width="130"
                                            height="130"
                                            style="
                                                object-fit:cover;
                                                border-radius:20px;
                                            "
                                        >

                                    </div>

                                @endif

                            </div>



                            {{-- BUTTON --}}

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('admin.guru.index') }}"
                                    class="btn btn-secondary"
                                >

                                    Kembali

                                </a>


                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >

                                    <i class="bi bi-save me-1"></i>

                                    {{ $guru->exists
                                        ? 'Update Guru'
                                        : 'Simpan Guru'
                                    }}

                                </button>

                            </div>


                        </form>


                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>