@extends('layouts.public')

@section('title', 'Artikel')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="text-center mb-5">

        <h1 class="fw-bold display-5">
            Berita & Informasi
        </h1>

        <p class="text-muted fs-5">
            Temukan berbagai informasi terbaru dari SMK Negeri 1 Cijati.
        </p>

    </div>


    {{-- JIKA DATA ADA --}}
    @if($artikels->count() > 0)

        <div class="row g-4">

            @foreach($artikels as $artikel)

                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm overflow-hidden">

                        {{-- GAMBAR --}}
                        @if(!empty($artikel->gambar))

                            <img
                                src="{{ asset('images/artikel/' . $artikel->gambar) }}"
                                alt="{{ $artikel->judul }}"
                                class="card-img-top"
                                style="
                                    height: 230px;
                                    object-fit: cover;
                                "
                            >

                        @else

                            {{-- GAMBAR DEFAULT --}}
                            <div
                                class="d-flex align-items-center justify-content-center bg-light"
                                style="
                                    height: 230px;
                                "
                            >

                                <i
                                    class="bi bi-newspaper text-primary"
                                    style="
                                        font-size: 70px;
                                    "
                                ></i>

                            </div>

                        @endif


                        {{-- ISI CARD --}}
                        <div class="card-body d-flex flex-column p-4">

                            {{-- KATEGORI --}}
                            @if($artikel->kategori)

                                <div class="mb-2">

                                    <span class="badge bg-primary">
                                        {{ $artikel->kategori->nama_kategori }}
                                    </span>

                                </div>

                            @endif


                            {{-- JUDUL --}}
                            <h4 class="fw-bold mb-2">

                                {{ $artikel->judul }}

                            </h4>


                            {{-- TANGGAL --}}
                            <div class="text-muted small mb-3">

                                <i class="bi bi-calendar3"></i>

                                {{ $artikel->created_at
                                    ? $artikel->created_at->format('d M Y')
                                    : '-' }}

                            </div>


                            {{-- ISI SINGKAT --}}
                            <p class="text-muted">

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($artikel->isi),
                                    140
                                ) }}

                            </p>


                            {{-- BUTTON --}}
                            <div class="mt-auto pt-3">

                                <a
                                    href="{{ route('artikel.show', $artikel->id) }}"
                                    class="btn btn-primary"
                                >

                                    Baca Selengkapnya

                                    <i class="bi bi-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- PAGINATION --}}
        <div class="d-flex justify-content-center mt-5">

            {{ $artikels->links() }}

        </div>


    @else

        {{-- JIKA DATA KOSONG --}}
        <div class="text-center py-5">

            <i
                class="bi bi-newspaper text-primary"
                style="
                    font-size: 70px;
                "
            ></i>

            <h2 class="fw-bold mt-4">
                Belum Ada Artikel
            </h2>

            <p class="text-muted">
                Artikel sekolah belum tersedia.
            </p>

        </div>

    @endif

</div>

@endsection