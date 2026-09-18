<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelola Ekstrakurikuler
            </h2>

            <a href="{{ route('admin.ekstrakurikuler.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent
                      rounded-md font-semibold text-xs text-white uppercase tracking-widest
                      hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900
                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                      transition ease-in-out duration-150">
                + Tambah Ekstrakurikuler
            </a>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Pesan berhasil --}}
            @if(session('success'))
                <div class="mb-6 rounded-lg bg-green-100 border border-green-300
                            px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Pesan error --}}
            @if(session('error'))
                <div class="mb-6 rounded-lg bg-red-100 border border-red-300
                            px-4 py-3 text-red-800">
                    {{ session('error') }}
                </div>
            @endif


            {{-- Error validasi --}}
            @if($errors->any())
                <div class="mb-6 rounded-lg bg-red-100 border border-red-300
                            px-4 py-3 text-red-800">

                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif


            {{-- Card tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-50">

                                <tr>

                                    <th class="px-6 py-3 text-left text-xs font-medium
                                               text-gray-500 uppercase tracking-wider">
                                        No
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium
                                               text-gray-500 uppercase tracking-wider">
                                        Logo
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium
                                               text-gray-500 uppercase tracking-wider">
                                        Nama Ekstrakurikuler
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium
                                               text-gray-500 uppercase tracking-wider">
                                        Pembina
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium
                                               text-gray-500 uppercase tracking-wider">
                                        Guru
                                    </th>

                                    <th class="px-6 py-3 text-center text-xs font-medium
                                               text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="bg-white divide-y divide-gray-200">

                                @forelse($ekstrakurikulers as $index => $ekstrakurikuler)

                                    <tr class="hover:bg-gray-50">

                                        {{-- Nomor --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $ekstrakurikulers->firstItem() + $index }}
                                        </td>


                                        {{-- Logo --}}
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            @if($ekstrakurikuler->logo)

                                                <img
                                                    src="{{ asset('storage/' . $ekstrakurikuler->logo) }}"
                                                    alt="{{ $ekstrakurikuler->nama_eskul }}"
                                                    class="w-16 h-16 object-cover rounded-lg border"
                                                >

                                            @else

                                                <div class="w-16 h-16 bg-gray-100 rounded-lg
                                                            flex items-center justify-center
                                                            text-gray-400 text-xs">
                                                    Tidak ada
                                                </div>

                                            @endif

                                        </td>


                                        {{-- Nama --}}
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            <div class="text-sm font-semibold text-gray-900">
                                                {{ $ekstrakurikuler->nama_eskul }}
                                            </div>

                                            @if($ekstrakurikuler->deskripsi)

                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ \Illuminate\Support\Str::limit($ekstrakurikuler->deskripsi, 60) }}
                                                </div>

                                            @endif

                                        </td>


                                        {{-- Pembina --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $ekstrakurikuler->pembina }}
                                        </td>


                                        {{-- Guru --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">

                                            @if($ekstrakurikuler->guru)
                                                {{ $ekstrakurikuler->guru->nama_guru }}
                                            @else
                                                -
                                            @endif

                                        </td>


                                        {{-- Aksi --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-center">

                                            <div class="flex justify-center gap-2">

                                                {{-- Edit --}}
                                                <a
                                                    href="{{ route('admin.ekstrakurikuler.edit', $ekstrakurikuler) }}"
                                                    class="inline-flex items-center px-3 py-2
                                                           bg-blue-600 text-white rounded-md
                                                           text-xs font-semibold
                                                           hover:bg-blue-700">
                                                    Edit
                                                </a>


                                                {{-- Hapus --}}
                                                <form
                                                    action="{{ route('admin.ekstrakurikuler.destroy', $ekstrakurikuler) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="inline-flex items-center px-3 py-2
                                                               bg-red-600 text-white rounded-md
                                                               text-xs font-semibold
                                                               hover:bg-red-700">
                                                        Hapus
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="6"
                                            class="px-6 py-12 text-center text-gray-500"
                                        >
                                            <div class="text-lg font-semibold">
                                                Belum ada data ekstrakurikuler
                                            </div>

                                            <div class="text-sm mt-1">
                                                Silakan tambahkan data ekstrakurikuler terlebih dahulu.
                                            </div>

                                            <a
                                                href="{{ route('admin.ekstrakurikuler.create') }}"
                                                class="inline-block mt-4 px-4 py-2
                                                       bg-blue-600 text-white rounded-md
                                                       text-sm font-semibold hover:bg-blue-700"
                                            >
                                                + Tambah Ekstrakurikuler
                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Pagination --}}
                    @if($ekstrakurikulers->hasPages())

                        <div class="mt-6">

                            {{ $ekstrakurikulers->links() }}

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>