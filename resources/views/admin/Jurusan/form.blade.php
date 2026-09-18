<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $jurusan->exists ? 'Edit Jurusan' : 'Tambah Jurusan' }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-lg shadow p-6">

                <form
                    action="{{ $jurusan->exists
                        ? route('admin.jurusan.update', $jurusan)
                        : route('admin.jurusan.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    @if($jurusan->exists)
                        @method('PUT')
                    @endif

                    <div class="mb-5">
                        <label class="block font-medium mb-2">
                            Nama Jurusan
                        </label>

                        <input type="text"
                               name="nama_jurusan"
                               value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                               class="w-full rounded-lg border-gray-300">

                        @error('nama_jurusan')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium mb-2">
                            Singkatan
                        </label>

                        <input type="text"
                               name="singkatan"
                               value="{{ old('singkatan', $jurusan->singkatan) }}"
                               class="w-full rounded-lg border-gray-300">

                        @error('singkatan')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium mb-2">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi"
                                  rows="5"
                                  class="w-full rounded-lg border-gray-300">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium mb-2">
                            Gambar
                        </label>

                        <input type="file"
                               name="gambar"
                               class="w-full">

                        @if($jurusan->gambar)
                            <img src="{{ asset('storage/' . $jurusan->gambar) }}"
                                 class="mt-3 w-32 h-32 object-cover rounded-lg">
                        @endif
                    </div>

                    <div class="flex gap-3">

                        <button type="submit"
                                class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            {{ $jurusan->exists ? 'Simpan Perubahan' : 'Tambah Jurusan' }}
                        </button>

                        <a href="{{ route('admin.jurusan.index') }}"
                           class="px-5 py-3 bg-gray-200 rounded-lg hover:bg-gray-300">
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>