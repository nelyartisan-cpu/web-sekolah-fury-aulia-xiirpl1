<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="fw-bold mb-1">
                Tambah Artikel
            </h2>

            <p class="text-muted mb-0">
                Tambahkan berita atau informasi sekolah
            </p>
        </div>

    </x-slot>


    <div class="py-4">

        <div class="container">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.artikel.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf


                        {{-- KATEGORI --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Kategori
                            </label>

                            <select
                                name="kategori_artikel_id"
                                class="form-select @error('kategori_artikel_id') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                @foreach($kategori as $item)

                                    <option
                                        value="{{ $item->id }}"
                                        {{ old('kategori_artikel_id') == $item->id ? 'selected' : '' }}
                                    >
                                        {{ $item->nama_kategori }}
                                    </option>

                                @endforeach

                            </select>

                            @error('kategori_artikel_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- JUDUL --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Judul Artikel
                            </label>

                            <input
                                type="text"
                                name="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul') }}"
                                placeholder="Masukkan judul artikel"
                                required
                            >

                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- GAMBAR --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Gambar Artikel
                            </label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control @error('gambar') is-invalid @enderror"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            <small class="text-muted">
                                Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                            </small>

                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- ISI --}}

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Isi Artikel
                            </label>

                            <textarea
                                name="isi"
                                rows="10"
                                class="form-control @error('isi') is-invalid @enderror"
                                placeholder="Tuliskan isi artikel..."
                                required
                            >{{ old('isi') }}</textarea>

                            @error('isi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- BUTTON --}}

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <i class="bi bi-save me-1"></i>
                                Simpan Artikel
                            </button>

                            <a
                                href="{{ route('admin.artikel.index') }}"
                                class="btn btn-secondary"
                            >
                                Kembali
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>