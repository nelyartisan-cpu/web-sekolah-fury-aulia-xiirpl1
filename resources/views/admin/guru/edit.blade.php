<x-app-layout>

    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold mb-1">

                    {{ $guru->exists
                        ? 'Edit Data Guru'
                        : 'Tambah Data Guru'
                    }}

                </h2>

                <p class="text-muted mb-0">
                    Kelola informasi guru.
                </p>

            </div>

            <a
                href="{{ route('admin.guru.index') }}"
                class="btn btn-secondary"
            >

                <i class="bi bi-arrow-left me-1"></i>

                Kembali

            </a>

        </div>

    </x-slot>


    <div class="py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body p-4">


                            {{-- ERROR --}}

                            @if ($errors->any())

                                <div class="alert alert-danger">

                                    <strong>
                                        Ada kesalahan:
                                    </strong>

                                    <ul class="mb-0 mt-2">

                                        @foreach ($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endif


                            <form
                                action="{{ $guru->exists
                                    ? route('admin.guru.update', $guru)
                                    : route('admin.guru.store')
                                }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >

                                @csrf

                                @if ($guru->exists)

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
                                        id="nama_guru"
                                        name="nama_guru"
                                        class="form-control"
                                        value="{{ old(
                                            'nama_guru',
                                            $guru->nama_guru
                                        ) }}"
                                        placeholder="Masukkan nama guru"
                                        required
                                    >

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
                                        id="nip"
                                        name="nip"
                                        class="form-control"
                                        value="{{ old(
                                            'nip',
                                            $guru->nip
                                        ) }}"
                                        placeholder="Masukkan NIP"
                                    >

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
                                        id="foto"
                                        name="foto"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.webp"
                                    >

                                    <div class="form-text">
                                        Format JPG, JPEG, PNG, WEBP.
                                        Maksimal 2 MB.
                                    </div>


                                    {{-- FOTO LAMA --}}

                                    @if ($guru->foto)

                                        <div class="mt-3">

                                            <p class="text-muted mb-2">
                                                Foto saat ini:
                                            </p>

                                            <img
                                                src="{{ $guru->fotoUrl() }}"
                                                alt="{{ $guru->nama_guru }}"
                                                style="
                                                    width:130px;
                                                    height:160px;
                                                    object-fit:cover;
                                                    border-radius:15px;
                                                "
                                            >

                                        </div>

                                    @endif

                                </div>


                                {{-- BUTTON --}}

                                <div class="d-flex gap-2">

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >

                                        <i class="bi bi-save me-1"></i>

                                        {{ $guru->exists
                                            ? 'Simpan Perubahan'
                                            : 'Simpan Guru'
                                        }}

                                    </button>


                                    <a
                                        href="{{ route(
                                            'admin.guru.index'
                                        ) }}"
                                        class="btn btn-light"
                                    >

                                        Batal

                                    </a>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>