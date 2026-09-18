<x-app-layout>

    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold mb-1">
                    Data Guru
                </h2>

                <p class="text-muted mb-0">
                    Kelola data guru sekolah.
                </p>

            </div>

            <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">

                <i class="bi bi-plus-lg me-1"></i>

                Tambah Guru

            </a>

        </div>

    </x-slot>


    <div class="py-5">

        <div class="container">

            {{-- PESAN SUKSES --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">

                    <i class="bi bi-check-circle me-2"></i>

                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                </div>
            @endif


            <div class="card border-0 shadow-sm">

                <div class="card-body p-0">

                    @if ($guru->count())

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                    <tr>

                                        <th width="70">
                                            No
                                        </th>

                                        <th width="100">
                                            Foto
                                        </th>

                                        <th>
                                            Nama Guru
                                        </th>

                                        <th>
                                            NIP
                                        </th>

                                        <th width="150" class="text-center">
                                            Aksi
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @foreach ($guru as $index => $item)
                                        <tr>

                                            {{-- NO --}}
                                            <td>

                                                {{ $guru->firstItem() + $index }}

                                            </td>


                                            {{-- FOTO --}}
                                            <td>

                                                @if ($item->foto)
                                                    <img src="{{ $item->fotoUrl() }}" alt="{{ $item->nama_guru }}"
                                                        style="
                                                            width:60px;
                                                            height:70px;
                                                            object-fit:cover;
                                                            border-radius:10px;
                                                        ">
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center bg-light"
                                                        style="
                                                            width:60px;
                                                            height:70px;
                                                            border-radius:10px;
                                                        ">

                                                        <i class="bi bi-person fs-3 text-secondary"></i>

                                                    </div>
                                                @endif

                                            </td>


                                            {{-- NAMA --}}
                                            <td>

                                                <strong>
                                                    {{ $item->nama_guru }}
                                                </strong>

                                            </td>


                                            {{-- NIP --}}
                                            <td>

                                                {{ $item->nip ?: '-' }}

                                            </td>


                                            {{-- AKSI --}}
                                            <td>

                                                <div class="d-flex justify-content-center gap-1">

                                                    {{-- EDIT --}}
                                                    <a href="{{ route('admin.guru.edit', $item) }}"
                                                        class="btn btn-sm btn-warning" title="Edit">

                                                        <i class="bi bi-pencil"></i>

                                                    </a>


                                                    {{-- HAPUS --}}
                                                    <form action="{{ route('admin.guru.destroy', $item) }}"
                                                        method="POST"
                                                        onsubmit="return confirm(
                                                            'Yakin ingin menghapus data guru ini?'
                                                        )">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            title="Hapus">

                                                            <i class="bi bi-trash"></i>

                                                        </button>

                                                    </form>

                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>


                        {{-- PAGINATION --}}
                        <div class="p-3">

                            {{ $guru->links() }}

                        </div>
                    @else
                        <div class="text-center py-5">

                            <i class="bi bi-people"
                                style="
                                    font-size:50px;
                                    color:#94a3b8;
                                "></i>

                            <h5 class="mt-3">
                                Belum ada data guru
                            </h5>

                            <p class="text-muted">
                                Silakan tambahkan data guru.
                            </p>

                            <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">

                                <i class="bi bi-plus-lg me-1"></i>

                                Tambah Guru

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
