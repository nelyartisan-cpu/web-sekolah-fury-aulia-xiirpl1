<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1">
                    Data Artikel
                </h2>

                <p class="text-muted mb-0">
                    Kelola berita dan informasi sekolah
                </p>
            </div>

            <a
                href="{{ route('admin.artikel.create') }}"
                class="btn btn-primary"
            >
                <i class="bi bi-plus-circle me-1"></i>
                Tambah Artikel
            </a>
        </div>
    </x-slot>

    <div class="py-4">

        <div class="container-fluid">

            {{-- SUCCESS --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>
                </div>
            @endif

            {{-- ERROR --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    {{-- SEARCH --}}
                    <form
                        action="{{ route('admin.artikel.index') }}"
                        method="GET"
                        class="mb-4"
                    >

                        <div class="row g-2">

                            <div class="col-md-8">

                                <input
                                    type="text"
                                    name="q"
                                    class="form-control"
                                    placeholder="Cari judul artikel..."
                                    value="{{ request('q') }}"
                                >

                            </div>

                            <div class="col-md-4">

                                <button
                                    type="submit"
                                    class="btn btn-dark"
                                >
                                    <i class="bi bi-search me-1"></i>
                                    Cari
                                </button>

                                <a
                                    href="{{ route('admin.artikel.index') }}"
                                    class="btn btn-secondary"
                                >
                                    Reset
                                </a>

                            </div>

                        </div>

                    </form>


                    {{-- TABLE --}}

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-dark">

                                <tr>
                                    <th width="60">
                                        #
                                    </th>

                                    <th width="120">
                                        Gambar
                                    </th>

                                    <th>
                                        Judul
                                    </th>

                                    <th>
                                        Kategori
                                    </th>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th width="220">
                                        Aksi
                                    </th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($artikel as $item)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration + ($artikel->currentPage() - 1) * $artikel->perPage() }}
                                        </td>

                                        <td>

                                            @if($item->gambar)

                                                <img
                                                    src="{{ asset('images/artikel/' . $item->gambar) }}"
                                                    alt="{{ $item->judul }}"
                                                    width="90"
                                                    height="60"
                                                    style="
                                                        object-fit: cover;
                                                        border-radius: 8px;
                                                    "
                                                >

                                            @else

                                                <div
                                                    class="bg-light d-flex align-items-center justify-content-center"
                                                    style="
                                                        width:90px;
                                                        height:60px;
                                                        border-radius:8px;
                                                    "
                                                >
                                                    <i class="bi bi-image text-muted fs-4"></i>
                                                </div>

                                            @endif

                                        </td>

                                        <td>
                                            <strong>
                                                {{ $item->judul }}
                                            </strong>
                                        </td>

                                        <td>

                                            @if($item->kategori)

                                                <span class="badge bg-primary">
                                                    {{ $item->kategori->nama_kategori }}
                                                </span>

                                            @else

                                                <span class="badge bg-secondary">
                                                    Tanpa kategori
                                                </span>

                                            @endif

                                        </td>

                                        <td>
                                            {{ $item->created_at->format('d-m-Y') }}
                                        </td>

                                        <td>

                                            <a
                                                href="{{ route('admin.artikel.show', $item->id) }}"
                                                class="btn btn-sm btn-info text-white"
                                            >
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a
                                                href="{{ route('admin.artikel.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning"
                                            >
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form
                                                action="{{ route('admin.artikel.destroy', $item->id) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                >
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="6"
                                            class="text-center py-5"
                                        >

                                            <i
                                                class="bi bi-newspaper fs-1 text-muted"
                                            ></i>

                                            <h5 class="mt-3">
                                                Belum ada artikel
                                            </h5>

                                            <p class="text-muted">
                                                Silakan tambahkan artikel baru.
                                            </p>

                                            <a
                                                href="{{ route('admin.artikel.create') }}"
                                                class="btn btn-primary"
                                            >
                                                <i class="bi bi-plus-circle me-1"></i>
                                                Tambah Artikel
                                            </a>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    {{-- PAGINATION --}}

                    <div class="mt-3">

                        {{ $artikel->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>