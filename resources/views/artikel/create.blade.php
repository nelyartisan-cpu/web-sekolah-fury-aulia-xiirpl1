<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Artikel
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-lg shadow p-6">

                <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Judul Artikel</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               class="w-full rounded-lg border-gray-300">
                        @error('judul')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Kategori</label>
                        <select name="kategori_artikel_id" class="w-full rounded-lg border-gray-300">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" @selected(old('kategori_artikel_id') == $k->id)>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_artikel_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Gambar</label>
                        <input type="file" name="gambar" accept="image/*"
                               class="w-full rounded-lg border-gray-300">
                        @error('gambar')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium mb-1">Isi Artikel</label>
                        <textarea name="isi" rows="10"
                                  class="w-full rounded-lg border-gray-300">{{ old('isi') }}</textarea>
                        @error('isi')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            Simpan
                        </button>
                        <a href="{{ route('admin.artikel.index') }}"
                           class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">
                            Batal
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>