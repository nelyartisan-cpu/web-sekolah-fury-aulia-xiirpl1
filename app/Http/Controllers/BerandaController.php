<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;
use App\Models\Artikel;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil sebagian data untuk ditampilkan sekilas di halaman beranda
        $jurusan = Jurusan::latest()->take(3)->get();
        $ekstrakurikuler = Ekstrakurikuler::latest()->take(3)->get();
        $artikel = Artikel::with('kategori')->latest()->take(3)->get();

        return view('beranda', compact('jurusan', 'ekstrakurikuler', 'artikel'));
    }
}
