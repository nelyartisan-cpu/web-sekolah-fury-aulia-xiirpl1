@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col items-center py-10">

    <h1 class="text-2xl font-semibold text-gray-700 mb-8">Profil Guru</h1>

    <div class="bg-white rounded-2xl shadow-md w-full max-w-2xl overflow-hidden">

        {{-- Foto Profil --}}
        <div class="flex justify-center py-10 bg-gray-50">
            @if($guru->foto)
                <img src="{{ asset('storage/'.$guru->foto) }}" 
                     alt="Foto Guru" 
                     class="w-32 h-32 rounded-full object-cover border">
            @else
                <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
                    </svg>
                </div>
            @endif
        </div>

        {{-- Detail Guru (di-tengahkan) --}}
        <div class="px-8 py-6 space-y-5 text-center">

            <div>
                <h2 class="text-xl font-bold text-gray-800">{{ $guru->nama ?? '-' }}</h2>
            </div>

            <div>
                <p class="text-sm text-blue-500 font-medium">NIP</p>
                <p class="text-gray-800">{{ $guru->nip ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-blue-500 font-medium">Jabatan</p>
                <p class="text-gray-800">{{ $guru->jabatan ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-blue-500 font-medium">Email</p>
                <p class="text-gray-800">{{ $guru->email ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-blue-500 font-medium">No. HP</p>
                <p class="text-gray-800">{{ $guru->no_hp ?? '-' }}</p>
            </div>

        </div>

        {{-- Tombol Kembali --}}
        <div class="px-8 pb-8 flex justify-center">
            <a href="{{ url()->previous() }}" 
               class="inline-block px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                Kembali
            </a>
        </div>

    </div>
</div>
@endsection