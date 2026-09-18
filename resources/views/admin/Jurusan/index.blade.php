<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Kelola Jurusan
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Tambah, edit, dan hapus data jurusan sekolah.
                </p>
            </div>

            {{-- Tombol Tambah --}}
            <a href="{{ route('admin.jurusan.create') }}"
               class="inline-flex items-center px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">

                + Tambah Jurusan

            </a>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Pesan sukses --}}
            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-5 py-4 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif


            {{-- Pesan error --}}
            @if($errors->any())

                <div class="mb-6 bg-red-100 border border-red-300 text-red-800 px-5 py-4 rounded-lg">

                    <ul class="list-disc ml-5">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>

                                <tr class="border-b border-gray-200 text-left">

                                    <th class="px-5 py-4 font-semibold text-gray-700">
                                        No
                                    </th>

                                    <th class="px-5 py-4 font-semibold text-gray-700">
                                        Gambar
                                    </th>

                                    <th class="px-5 py-4 font-semibold text-gray-700">
                                        Nama Jurusan
                                    </th>

                                    <th class="px-5 py-4 font-semibold text-gray-700">
                                        Singkatan
                                    </th>

                                    <th class="px-5 py-4 font-semibold text-gray-700">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($jurusans as $jurusan)

                                    <tr class="border-b border-gray-100 hover:bg-gray-50">

                                        {{-- Nomor --}}
                                        <td class="px-5 py-4 text-gray-700">

                                            {{ $jurusans->firstItem() + $loop->index }}

                                        </td>


                                        {{-- Gambar --}}
                                        <td class="px-5 py-4">

                                            @if($jurusan->gambar)

                                                <img
                                                    src="{{ asset('storage/' . $jurusan->gambar) }}"
                                                    alt="{{ $jurusan->nama_jurusan }}"
                                                    class="w-20 h-20 object-cover rounded-lg border"
                                                >

                                            @else

                                                <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-sm">

                                                    Tidak ada

                                                </div>

                                            @endif

                                        </td>


                                        {{-- Nama Jurusan --}}
                                        <td class="px-5 py-4">

                                            <div class="font-semibold text-gray-800">
                                                {{ $jurusan->nama_jurusan }}
                                            </div>

                                            @if($jurusan->deskripsi)

                                                <div class="text-sm text-gray-500 mt-1 max-w-md">

                                                    {{ Str::limit($jurusan->deskripsi, 100) }}

                                                </div>

                                            @endif

                                        </td>


                                        {{-- Singkatan --}}
                                        <td class="px-5 py-4">

                                            <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-700 rounded-full font-medium">

                                                {{ $jurusan->singkatan }}

                                            </span>

                                        </td>


                                        {{-- Aksi --}}
                                        <td class="px-5 py-4">

                                            <div class="flex items-center gap-2">

                                                {{-- EDIT --}}
                                                <a
                                                    href="{{ route('admin.jurusan.edit', $jurusan) }}"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition"
                                                >
                                                    Edit
                                                </a>


                                                {{-- HAPUS --}}
                                                <form
                                                    action="{{ route('admin.jurusan.destroy', $jurusan) }}"
                                                    method="POST"
                                                    class="inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus jurusan {{ $jurusan->nama_jurusan }}?')"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition"
                                                    >
                                                        Hapus
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="5"
                                            class="px-5 py-10 text-center text-gray-500"
                                        >

                                            <div class="text-4xl mb-3">
                                                📚
                                            </div>

                                            <p class="font-medium">
                                                Belum ada data jurusan.
                                            </p>

                                            <a
                                                href="{{ route('admin.jurusan.create') }}"
                                                class="inline-block mt-4 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                                            >
                                                + Tambah Jurusan
                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Pagination --}}
                    @if($jurusans->hasPages())

                        <div class="mt-6">

                            {{ $jurusans->links() }}

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>