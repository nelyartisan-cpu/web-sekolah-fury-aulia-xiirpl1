<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="fw-bold mb-1">
                Edit Artikel
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi artikel
            </p>
        </div>

    </x-slot>


    <div class="py-4">

        <div class="container">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.artikel.update', $artikel->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        @method('PUT')


                        {{-- KATEGORI --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Kategori
                            </label>

                            <select
                                name="kategori_artikel_id"
                                class="form-select"
                                required
                            >

                                @foreach($kategori as $item)

                                    <option
                                        value="{{ $item->id }}"
                                        {{ $artikel->kategori_artikel_id == $item->id ? 'selected' : '' }}
                                    >
                                        {{ $item->nama_kategori }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- JUDUL --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Judul Artikel
                            </label>

                            <input
                                type="text"
                                name="judul"
                                class="form-control"
                                value="{{ old('judul', $artikel->judul) }}"
                                required
                            >

                        </div>


                        {{-- GAMBAR LAMA --}}

                        @if($artikel->gambar)

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Gambar Saat Ini
                                </label>

                                <br>

                                <img
                                    src="{{ asset('images/artikel/' . $artikel->gambar) }}"
                                    alt="{{ $artikel->judul }}"
                                    style="
                                        width:250px;
                                        height:150px;
                                        object-fit:cover;
                                        border-radius:10px;
                                    "
                                >

                            </div>

                        @endif


                        {{-- GAMBAR BARU --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Ganti Gambar
                            </label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control"
                                accept="image/jpeg,image/png,image/webp"
                            >

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti gambar.
                            </small>

                        </div>


                        {{-- ISI --}}

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Isi Artikel
                            </label>

                            <textarea
                                name="isi"
                                rows="12"
                                class="form-control"
                                required
                            >{{ old('isi', $artikel->isi) }}</textarea>

                        </div>


                        {{-- BUTTON --}}

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <i class="bi bi-save me-1"></i>
                                Update Artikel
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