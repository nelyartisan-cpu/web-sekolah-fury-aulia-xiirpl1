@extends('layouts.public')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center p-5">

                    {{-- FOTO --}}
                    @if ($guru->foto)

                        <img
                            src="{{ asset('storage/' . $guru->foto) }}"
                            alt="{{ $guru->nama_guru }}"
                            class="rounded-circle shadow mb-4"
                            style="
                                width: 180px;
                                height: 180px;
                                object-fit: cover;
                            "
                        >

                    @else

                        <div
                            class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-4"
                            style="
                                width: 180px;
                                height: 180px;
                            "
                        >
                            <i class="bi bi-person-fill text-secondary"
                               style="font-size: 90px;">
                            </i>
                        </div>

                    @endif

                    {{-- NAMA --}}
                    <h2 class="fw-bold">
                        {{ $guru->nama_guru }}
                    </h2>

                    {{-- NIP --}}
                    <p class="text-muted">
                        NIP: {{ $guru->nip ?? '-' }}
                    </p>

                    <a
                        href="{{ route('guru.index') }}"
                        class="btn btn-secondary mt-3"
                    >
                        Kembali
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection