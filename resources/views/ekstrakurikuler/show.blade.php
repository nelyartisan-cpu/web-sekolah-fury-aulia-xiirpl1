@extends('layouts.public')

@section('title', $ekstrakurikuler->nama_eskul . ' - Sekolah Kita')

@section('content')

{{-- HEADER --}}
<section
    class="py-5"
    style="background: linear-gradient(135deg, #0d6efd, #084298);"
>

    <div class="container">

        <div class="text-center text-white">

            <h1 class="fw-bold">
                {{ $ekstrakurikuler->nama_eskul }}
            </h1>

            <p class="mb-0">
                Informasi kegiatan ekstrakurikuler sekolah
            </p>

        </div>

    </div>

</section>


{{-- DETAIL --}}
<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="card-body p-4 p-md-5">

                        <div class="row align-items-center">

                            {{-- LOGO --}}
                            <div class="col-md-4 text-center mb-4 mb-md-0">

                                @if($ekstrakurikuler->logo)

                                    <img
                                        src="{{ asset('storage/' . $ekstrakurikuler->logo) }}"
                                        alt="{{ $ekstrakurikuler->nama_eskul }}"
                                        class="img-fluid"
                                        style="
                                            width: 200px;
                                            height: 200px;
                                            object-fit: contain;
                                        "
                                    >

                                @else

                                    <div
                                        class="mx-auto bg-light rounded-circle d-flex align-items-center justify-content-center"
                                        style="
                                            width: 200px;
                                            height: 200px;
                                        "
                                    >

                                        <i
                                            class="bi bi-trophy-fill text-primary"
                                            style="font-size: 80px;"
                                        ></i>

                                    </div>

                                @endif

                            </div>


                            {{-- INFORMASI --}}
                            <div class="col-md-8">

                                <h2 class="fw-bold mb-4">
                                    {{ $ekstrakurikuler->nama_eskul }}
                                </h2>


                                @if($ekstrakurikuler->pembina)

                                    <div class="mb-3">

                                        <i class="bi bi-person-fill text-primary me-2"></i>

                                        <strong>Pembina:</strong>

                                        {{ $ekstrakurikuler->pembina }}

                                    </div>

                                @endif


                                @if($ekstrakurikuler->guru)

                                    <div class="mb-3">

                                        <i class="bi bi-person-badge-fill text-primary me-2"></i>

                                        <strong>Guru:</strong>

                                        {{ $ekstrakurikuler->guru->nama_guru }}

                                    </div>

                                @endif


                                @if($ekstrakurikuler->deskripsi)

                                    <div class="mt-4">

                                        <h5 class="fw-bold">
                                            Deskripsi
                                        </h5>

                                        <p class="text-muted">

                                            {{ $ekstrakurikuler->deskripsi }}

                                        </p>

                                    </div>

                                @endif

                            </div>

                        </div>


                        <hr class="my-5">


                        <a
                            href="{{ route('ekstrakurikuler.index') }}"
                            class="btn btn-outline-primary rounded-pill px-4"
                        >

                            <i class="bi bi-arrow-left me-1"></i>

                            Kembali ke Ekstrakurikuler

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection